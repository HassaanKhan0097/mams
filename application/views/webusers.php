<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Web Users</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font/simple-line-icons/css/simple-line-icons.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/datatables.responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/bootstrap.rtl.only.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/component-custom-switch.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/perfect-scrollbar.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css" />
</head>

<body id="app-container" class="menu-default show-spinner">


    <!-- Header -->

    <?php include_once('header.php'); ?>

    <!-- Header End -->


    <!-- Sidebar -->

    <?php include_once('sidebar.php'); ?>

    <!-- Sidebar End -->



    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Web Users</h1>
                    <div class="separator mb-5"></div>

                    <?php
                    if( $this->session->flashdata('update_message_error') ) { ?>

                        <div class="col-12 mt-4">
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->session->flashdata('update_message_error'); ?>
                            </div>
                        </div>
                        
                    <?php }
                    ?>


                    <?php
                    if( $this->session->flashdata('delete_message_error') ) { ?>

                        <div class="col-12 mt-4">
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->session->flashdata('delete_message_error'); ?>
                            </div>
                        </div>
                        
                    <?php }
                    ?>


                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4">Add New Web User</h5>
                            <form action="<?php echo base_url(); ?>Webusers/create" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="user_username" placeholder="Enter Username" required>
                                    
                                </div>
                                <div class="form-group">
                                    <label>User Email</label>
                                    <input type="email" class="form-control" name="user_email" placeholder="Enter Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="user_password" placeholder="Enter Password" required>
                                </div>
                                <div class="form-group">
                                    <label>User Role</label>
                                    <select class="form-control" data-width="100%" name="user_role" onchange="roleChange()" required>
                                        <option value=""></option>
                                        <option value="appraiser">Appraiser</option>
                                        <?php if($this->session->userdata['loggedUser']['user_role'] == "owner"){ ?> 
                                            <option value="manager">Manager</option>
                                            <option value="owner">Owner</option>
                                        <?php }?>
                                        
                                    </select>
                                    <!-- <input type="number" class="form-control" name="web_seclevel" placeholder="Enter Sec Level"> -->
                                    <!-- <span class="helper-text"><?php echo form_error('web_seclevel'); ?></span> -->
                                </div>


                                <div class="form-group" id="appraiserSelect" style="display:none">
                                    <label>Select Appraiser</label>
                                    <select class="form-control" data-width="100%" name="user_app"  >
                                        <option value=""></option>
                                        <?php
                                            foreach($appraiser_list as $app){
                                        ?>                                            
                                        <option value="<?php echo $app->app_id ?>" > <?php echo $app->app_name ?></option>
                                        <?php } ?>
                                    </select>

                                    <!-- <?php echo ( $order_single->order_appraiser_id ==  $app->app_id ) ?  'Selected' :  ''; ?>  -->
                                    <!-- <input type="number" class="form-control" name="web_seclevel" placeholder="Enter Sec Level"> -->
                                    <!-- <span class="helper-text"><?php echo form_error('web_seclevel'); ?></span> -->
                                </div>
                                
                                <button type="submit" class="btn btn-primary mb-0">Submit</button>

                                <?php
                                if( $this->session->flashdata('message_success') ) { ?>

                                    <div class="col-12 mt-4">
                                        <div class="alert alert-success" role="alert">
                                            <?php echo $this->session->flashdata('message_success'); ?>
                                        </div>
                                    </div>
                                    
                                <?php }
                                ?>

                                <?php
                                if( $this->session->flashdata('message_error') ) { ?>

                                    <div class="col-12 mt-4">
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $this->session->flashdata('message_error'); ?>
                                        </div>
                                    </div>
                                    
                                <?php }
                                ?>


                            </form>
                        </div>
                    </div><!-- card mb-4 End -->


                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4" style="display: inline;">Web User List</h5>
                            <div class="top-right-button-container">
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary btn-lg dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        EXPORT
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" id="dataTablesExcel" href="#">Excel</a>
                                        <a class="dropdown-item" id="dataTablesCsv" href="#">Csv</a>
                                        <a class="dropdown-item" id="dataTablesPdf" href="#">Pdf</a>
                                    </div>
                                </div>
                            </div>
                            <br><br><br><br>

                            <!-- data-table Table_status -->
                            <table id="Table_webuser" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>User Id</th>
                                        <th>Username</th>
                                        <th>User Email</th>
                                        <!-- <th>Password</th> -->
                                        <th>User Role</th>
                                        <th>User Appraiser</th>
                                        <th>Last Login Ip</th>
                                        <th>Last Login</th>
                                        <!--  <th>Description</th>
                                       <th>Last Login</th>
                                        <th>Last Login Date</th>
                                        <th>Active</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                    foreach ($webuser_list as $web) { ?>  


                                        <?php if($this->session->userdata['loggedUser']['user_role'] == "manager" && $web->user_role == 'appraiser'){ ?> 
                                            <tr>
                                                <td><?php echo $web->user_id; ?></td>
                                                <td><?php echo $web->user_username; ?></td>
                                                <td><?php echo $web->user_email; ?></td>
                                                <td><?php echo $web->user_role; ?></td>
                                                <td><?php echo $web->app_name; ?></td>
                                                <td><?php echo $web->user_lastlogin; ?></td>
                                                <td><?php echo $web->user_logintime; ?></td>                                           
                                                <td> <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#editModal<?php echo $web->user_id; ?>">Edit</button>&nbsp;<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $web->user_id; ?>">Delete</button> </td>
                                            </tr>
                                        <?php } else if($this->session->userdata['loggedUser']['user_role'] == "owner"){  ?>
                                            <tr>
                                                <td><?php echo $web->user_id; ?></td>
                                                <td><?php echo $web->user_username; ?></td>
                                                <td><?php echo $web->user_email; ?></td>
                                                <td><?php echo $web->user_role; ?></td>
                                                <td><?php echo $web->app_name; ?></td>
                                                <td><?php echo $web->user_lastlogin; ?></td>
                                                <td><?php echo $web->user_logintime; ?></td>                                           
                                                <td> <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#editModal<?php echo $web->user_id; ?>">Edit</button>&nbsp;<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $web->user_id; ?>">Delete</button> </td>
                                            </tr>



                                        <?php } ?>

                                        


                                        <div id="deleteModal<?php echo $web->user_id; ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-body text-center">
                                                    <form method="post" action="<?php echo base_url(); ?>Webusers/delete/<?php echo $web->user_id; ?>">
                                                            <p>Are you Sure You want to Delete this item?</p>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                            <button type="button" class="btn btn-grey" data-dismiss="modal">Cancel</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div id="editModal<?php echo $web->user_id; ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Web Users</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        
                                                        <form action="<?php echo base_url(); ?>Webusers/update/<?php echo $web->user_id; ?>" method="post">
                                                


                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" name="upd_user_username" placeholder="Enter Username" value="<?php echo $web->user_username; ?>" required>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label>User Email</label>
                                                    <input type="email" class="form-control" name="upd_user_email"  value="<?php echo $web->user_email; ?>" placeholder="Enter Email">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="text" class="form-control" name="upd_user_password" placeholder="Enter Password"  value="<?php echo $web->user_pass; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>User Role</label>
                                                    <select class="form-control" data-width="100%" name="upd_user_role" onchange="roleChangeEdit('<?php echo $web->user_id; ?>')">
                                                        <option value=""></option>
                                                        <option value="appraiser"  <?php echo ( $web->user_role ==  "appraiser") ?  'Selected' :  ''; ?>>Appraiser</option>
                                                        
                                                        <?php if($this->session->userdata['loggedUser']['user_role'] == "owner"){ ?> 
                                                        <option value="manager"<?php echo ( $web->user_role ==  "manager") ?  'Selected' :  ''; ?> >Manager</option>
                                                        <option value="owner"<?php echo ( $web->user_role ==  "owner") ?  'Selected' :  ''; ?> >Owner</option>

                                                        <?php }?>
                                                    </select>
                                                </div>



                                                <div class="form-group" id="appraiserSelect<?php echo $web->user_id; ?>">
                                                    <label>Select Appraiser</label>
                                                    <select class="form-control" data-width="100%" name="upd_user_app">
                                                        <option value=""></option>
                                                        <?php
                                                            foreach($appraiser_list as $app){
                                                        ?>        
                                                        ;                                    
                                                        <option 
                                                        value="<?php echo $app->app_id ?>" 
                                                        <?php $user_id = (int) $web->user_app; echo ( $user_id ==  $app->app_id) ?  'Selected' :  ''; ?>
                                                        > <?php echo $app->app_name ?></option>                                                       
                                                        <?php } ?>
                                                    </select>
                                                </div>



                                                                <!-- <label>Username</label>
                                                                <input type="text" class="form-control" name="upd_web_username" placeholder="Enter Username" value="<?php echo $web->user_username; ?>">
                                                                <span class="helper-text"><?php echo form_error('upd_web_username'); ?></span> -->
                                                            
                                                            <!-- <div class="form-group">
                                                                <label>Login</label>
                                                                <input type="text" class="form-control" name="upd_web_login" placeholder="Enter Login" value="<?php echo $web->user_login; ?>">
                                                                <span class="helper-text"><?php echo form_error('upd_web_login'); ?></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input type="text" class="form-control" name="upd_web_password" placeholder="Enter Password" value="<?php echo $web->web_pass; ?>">
                                                                <span class="helper-text"><?php echo form_error('upd_web_password'); ?></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Sec Level</label>
                                                                <input type="number" class="form-control" name="upd_web_seclevel" placeholder="Enter Sec Level" value="<?php echo $web->web_seclevel; ?>">
                                                                <span class="helper-text"><?php echo form_error('upd_web_seclevel'); ?></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Description</label>
                                                                <textarea  class="form-control" name="upd_web_desc" placeholder="Enter Description" rows="2" cols="50" ><?php echo $web->web_description; ?></textarea>      
                                                                               
                                                            </div>

                                                            <div class="form-group">
                                                            <label
                                                                class="custom-control custom-checkbox mb-1 align-self-center data-table-rows-check">
                                                                <input type="checkbox" name="upd_web_active" class="custom-control-input" <?php echo $web->web_active; ?>>
                                                                <span class="custom-control-label">&nbsp;</span></label>
                                                            </div> -->
                                                    <button type="submit" class="btn btn-primary mb-0">Edit</button>
                                                    <button type="button" class="btn btn-grey" data-dismiss="modal">Cancel</button>
                                                </form>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                        <?php }
                                    ?>


                                    <!-- <tr>
                                        <td>1</td>
                                        <td>marty</td>
                                        <td>martylogin</td>
                                        <td>martyqwe!</td>
                                        <td>1</td>
                                        <td>Description here</td>
                                        <td>68.74.114.177</td>
                                        <td>24/07/2020</td>
                                        <td><label
                                        class="custom-control custom-checkbox mb-1 align-self-center data-table-rows-check">
                                        <input type="checkbox" class="custom-control-input" checked>
                                        <span class="custom-control-label">&nbsp;</span>
                                    </label></td>                                        
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>john</td>
                                        <td>johnlogin</td>
                                        <td>johnqwe!</td>
                                        <td>1</td>
                                        <td>Description here</td>
                                        <td>18.14.114.177</td>
                                        <td>24/07/2020</td>
                                        <td><label
                                        class="custom-control custom-checkbox mb-1 align-self-center data-table-rows-check">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-label">&nbsp;</span>
                                    </label></td>                                        
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>michael</td>
                                        <td>michaellogin</td>
                                        <td>michaelqwe!</td>
                                        <td>2</td>
                                        <td>Description here</td>
                                        <td>74.25.114.177</td>
                                        <td>24/07/2020</td>
                                        <td><label
                                        class="custom-control custom-checkbox mb-1 align-self-center data-table-rows-check">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-label">&nbsp;</span>
                                    </label></td>                                        
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr> -->
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--- Table end -->


                </div>
            </div>
            <!--Row end-->
        </div>
    </main>



    <!-- Modal -->

    <!-- <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
        
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p>Are you Sure You want to Delete this item?</p>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
                    <button type="button" class="btn btn-grey" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>



    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Web Users</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                    <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="web_username" placeholder="Enter Username">
                                </div>
                                <div class="form-group">
                                    <label>Login</label>
                                    <input type="text" class="form-control" name="web_login" placeholder="Enter Login">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" name="web_password" placeholder="Enter Password">
                                </div>
                                <div class="form-group">
                                    <label>Sec Level</label>
                                    <input type="number" class="form-control" name="web_seclevel" placeholder="Enter Sec Level">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea  class="form-control" name="web_desc" placeholder="Enter Description" rows="2" cols="50"></textarea>                                    
                                </div>
                        <button type="submit" class="btn btn-primary mb-0">Edit</button>
                        <button type="button" class="btn btn-grey" data-dismiss="modal">Cancel</button>
                    </form>
                </div>

            </div>

        </div>
    </div> -->






    <!-- Modal End -->

    <!-- Footer -->

    <?php include_once('footer.php'); ?>

    <!-- Footer End -->


    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/mousetrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dore.script.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>


    <script>


        function roleChange(){
            role_id = $("select[name=user_role]").find(':selected').val();

            if(role_id == 'appraiser'){
                $("#appraiserSelect").show();
            }
        }

        
        function roleChangeEdit(id){
            console.log("roleChangeEdit")
            role_id = $("select[name=upd_user_role]").find(':selected').val();

            if(role_id == 'appraiser'){

                $("#appraiserSelect"+id).show();
            }else{
                $("#appraiserSelect"+id).hide();
            }
        }



        var $Table_webuser = $("#Table_webuser").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
            "columns": [
                { "data": "user_id" },
                { "data": "user_username" },
                { "data": "user_login" },
                { "data": "user_password" },
                { "data": "user_seclevel" },
                { "data": "user_desc" },
                { "data": "user_lastlogin" },
                { "data": "user_logindate" },
                { "data": "user_active" },                
                { "data": "action" }
            ],
            drawCallback: function () {
                $($(".dataTables_wrapper .pagination li:first-of-type"))
                    .find("a")
                    .addClass("prev");
                $($(".dataTables_wrapper .pagination li:last-of-type"))
                    .find("a")
                    .addClass("next");

                $(".dataTables_wrapper .pagination").addClass("pagination-sm");
            },
            language: {
                paginate: {
                    previous: "<i class='simple-icon-arrow-left'></i>",
                    next: "<i class='simple-icon-arrow-right'></i>"
                },
                search: "_INPUT_",
                searchPlaceholder: "Search...",
                lengthMenu: "Items Per Page _MENU_"
            },
            buttons: [
                'excel',
                'csv',
                'pdf'
            ]
        });
        $("#dataTablesExcel").on("click", function (event) {
            event.preventDefault();
            $Table_webuser.buttons(0).trigger();
        });
        $("#dataTablesCsv").on("click", function (event) {
            event.preventDefault();
            $Table_webuser.buttons(1).trigger();
        });
        $("#dataTablesPdf").on("click", function (event) {
            event.preventDefault();
            $Table_webuser.buttons(2).trigger();
        });
    </script>
</body>

</html>