<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New Client</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font/simple-line-icons/css/simple-line-icons.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/datatables.responsive.bootstrap4.min.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/select2.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/select2-bootstrap.min.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/dropzone.min.css" />

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
                    <h1>New Client</h1>
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- <div class="mb-4">
                            <button class="btn btn-primary mb-1 mr-2" type="button" onclick="new_client_collapse();">
                                New Client
                            </button>
                            <button class="btn btn-primary mb-1" type="button" onclick="new_loan_collapse();">
                                New Loan Officers/Processors for this Client
                            </button>
                    </div> -->
                

                    <div class="card mb-4" id="new_client">
                        <div class="card-body">
                            <h5 class="mb-4">Add New Client</h5>
                            <form action="<?php echo base_url(); ?>clients/create_client" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Client Name</label>
                                        <input type="text" class="form-control" name="cl_name" placeholder="Enter Client Name">
                                        <span class="helper-text"><?php echo form_error('cl_name'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Contact</label>
                                        <input type="number" class="form-control" name="cl_contact" placeholder="Enter Contact">
                                        <span class="helper-text"><?php echo form_error('cl_contact'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="cl_address" placeholder="Enter Address" >

                                        <span class="helper-text"><?php echo form_error('cl_address'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Address 2</label>
                                        <input type="text" class="form-control" name="cl_address2" placeholder="Enter Address 2" >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Select Country</label>
                                        <select class="form-control select2-single" data-width="100%" name="cl_country" id="cl_country">
                                        <option value=""></option>
                                            <?php
                                            foreach ($country_list as $country) { ?> 
                                            
                                            <option value="<?php echo $country->country_id; ?>"><?php echo $country->country_name; ?></option>
                                        <?php } ?>
                                           
                                        </select>                                    
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Select City</label>
                                        <select class="form-control select2-single" data-width="100%" name="cl_city" id="cl_city">
                                        <option value=""></option>
                                        <?php
                                            foreach ($city_list as $city) { ?> 
                                            
                                            <option value="<?php echo $city->city_id; ?>"><?php echo $city->city_name; ?></option>
                                        <?php } ?>
                                            <!-- <option value=""></option>
                                            <option value="1">Chicago</option>
                                            <option value="2">New York</option>
                                            <option value="3">Los Angeles</option> -->
                                        </select>                                    
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" class="form-control" name="cl_state" placeholder="Enter State" >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Zip Code</label>
                                        <input type="number" class="form-control" name="cl_zipcode" placeholder="Enter Zip Code" >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="number" class="form-control" name="cl_phone" placeholder="Enter Phone Number" >
                                        <span class="helper-text"><?php echo form_error('cl_phone'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Fax Number</label>
                                        <input type="number" class="form-control" name="cl_fax" placeholder="Enter Fax Number" >
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Select Client Type</label>
                                        <select class="form-control select2-single" data-width="100%" name="cl_type">
                                            <option value=""></option>
                                            <option value="Bank">Bank</option>
                                            <option value="Broker">Broker</option>
                                            <option value="Attorney">Attorney</option>
                                            <option value="Property Owner">Property Owner</option>
                                        </select>                                    
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Select AMC</label>
                                        <select class="form-control select2-single" data-width="100%" name="cl_amc">
                                            <option value=""></option>
                                            <option value="AMC">AMC</option>
                                            <option value="No AMC">No AMC</option>                                            
                                        </select>                                    
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="cl_email" placeholder="Enter Email" >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email 2</label>
                                        <input type="email" class="form-control" name="cl_email2" placeholder="Enter Email 2" >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="type" class="form-control" name="cl_website" placeholder="Enter Website" >
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Special instructions concerning this client</label>
                                        <textarea  class="form-control" name="cl_ins" placeholder="Enter Special Instruction" rows="2" cols="50"></textarea>                                    
                                    </div>
                                </div>

                                <div class="col-sm-12 mb-4">
                                    
                                    <!-- <div class="card-body"> -->
                                        <h5 class="mb-4">Attach File</h5>
                                        <!-- <form action="#"> -->
                                            <div class="dropzone">
                                            </div>
                                        <!-- </form> -->
                                    <!-- </div> -->
                                
                                </div>

                                <div class="col-sm-12 mb-4">
                                    <div class="form-group">
                                    
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="cl_active" checked>
                                            <label class="custom-control-label" for="customCheck1">Active</label>
                                        </div>                                  
                                        
                                    </div>
                                </div>



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



                    <div class="card mb-4" id="new_officer">
                        <div class="card-body">
                            <h5 class="mb-4">Add New Loan Officers/Processors for this Client</h5>
                            <form action="" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="loan_name" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="number" class="form-control" name="loan_phone" placeholder="Enter Phone">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Ext</label>
                                        <input type="number" class="form-control" name="loan_ext" placeholder="Enter Ext" >
                                    </div>
                                </div>

                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Phone 2</label>
                                        <input type="number" class="form-control" name="loan_phone2" value="Enter Phone 2" >
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Ext</label>
                                        <input type="number" class="form-control" name="loan_ext2" placeholder="Enter Ext 2" >
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Select Type</label>
                                        <select class="form-control select2-single" data-width="100%">
                                            <option value=""></option>
                                            <option value="1">Loan Officer</option>
                                            <option value="2">Processor</option>
                                        </select>                                    
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Fax</label>
                                        <input type="text" class="form-control" name="loan_fax" placeholder="Enter Fax" >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="loan_email" value="Enter Email" >
                                    </div>
                                </div>

                                

                                

                            </div>
                               
                                <button type="submit" class="btn btn-primary mb-0">Submit</button>
                               
                            </form>
                        </div>
                    </div>
                    <!-- card mb-4 End -->




                    <div class="card mb-4" id="officer_table">
                        <div class="card-body">
                            <h5 class="mb-4" style="display: inline;">List of Loan Officers/Processors for this Client</h5>
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
                            <table id="Table_officer" class="responsive">
                                <thead>
                                    <tr>
                                        <th>Loan Officer Id</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Ext</th>
                                        <th>Phone2</th>
                                        <th>Ext2</th>
                                        <th>Fax</th>
                                        <th>Type</th>
                                        <th>Email</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Michael</td>
                                        <td>12345679</td>
                                        <td>54</td>
                                        <td>45654623</td>
                                        <td>876</td>
                                        <td>5132489</td>
                                        <td>Loan Officer</td>
                                        <td>michael@email.com</td>                                        
                                        <td><button type="button" class="btn btn-primary mr-2" onclick="edit_loanOfficer(1)">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>                                    
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

    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p>Are you Sure You want to Delete this item?</p>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
                    <button type="button" class="btn btn-grey" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal End -->

    <!-- Footer -->

    <?php include_once('footer.php'); ?>

    <!-- Footer End -->


    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/select2.full.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/datatables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/dropzone.min.js"></script>

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
        var $Table_officer = $("#Table_officer").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
            "columns": [
                { "data": "loanofficer_id" },
                { "data": "name" },
                { "data": "phone" },
                { "data": "ext" },
                { "data": "phone2" },
                { "data": "ext2" },
                { "data": "fax" },
                { "data": "type" },
                { "data": "email" },
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
            $Table_officer.buttons(0).trigger();
        });
        $("#dataTablesCsv").on("click", function (event) {
            event.preventDefault();
            $Table_officer.buttons(1).trigger();
        });
        $("#dataTablesPdf").on("click", function (event) {
            event.preventDefault();
            $Table_officer.buttons(2).trigger();
        });



        function edit_loanOfficer(id){
            window.location.href= "<?php echo base_url(); ?>clients/edit/"+id;
        }

        $("#new_officer").hide();
            $("#officer_table").hide();
        function new_client_collapse(){
            $("#new_client").show();
            $("#new_officer").hide();
            $("#officer_table").hide();
        }

        function new_loan_collapse(){
            $("#new_client").hide();
            $("#new_officer").show();
            $("#officer_table").show();
        }

        // $('#cl_country').on('change', function() {
        //     console.log( this.value );
        //     selectCity(this.value);
        // });
        //selectCity();
//         function selectCity($id){

//             var arr = [,];


//             <?php foreach ($city_list as $city): ?>
//             arr.push(<?php $city->city_id; ?>,<?php $city->city_name; ?>);
// <?php endforeach; ?>



          
//             console.log($id);
//             console.log(arr);
//         }

    </script>
    
</body>

</html>