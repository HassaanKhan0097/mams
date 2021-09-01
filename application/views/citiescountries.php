<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cities / Countries</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font/simple-line-icons/css/simple-line-icons.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/datatables.responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/select2.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/select2-bootstrap.min.css" />
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
                    <h1>Cities / Countries</h1>
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
                <div class="col-lg-5 col-md-12 mb-4">
                    <div class="card pb-5">
                        <div class="card-body pb-5">
                            <h5 class="mb-4">Add New Country</h5>
                            <form action="<?php echo base_url(); ?>CitiesCountries/createCountry" method="post" class="mb-2">
                                <div class="form-group">
                                    <label>Country Name</label>
                                    <input type="text" class="form-control" name="country_name" placeholder="Enter Country Name">
                                    <span class="helper-text"><?php echo form_error('country_name'); ?></span>
                                </div>
                                <button type="submit" class="btn btn-primary mb-0">Submit</button>

                                <?php
                                if( $this->session->flashdata('message_success_country') ) { ?>

                                    <div class="col-12 mt-4">
                                        <div class="alert alert-success" role="alert">
                                            <?php echo $this->session->flashdata('message_success_country'); ?>
                                        </div>
                                    </div>
                                    
                                <?php }
                                ?>

                                <?php
                                if( $this->session->flashdata('message_error_country') ) { ?>

                                    <div class="col-12 mt-4">
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $this->session->flashdata('message_error_country'); ?>
                                        </div>
                                    </div>
                                    
                                <?php }
                                ?>


                            </form>
                        </div>
                    </div><!-- card mb-4 End -->
                  </div><!-- Col 6 end-->



                  <div class="col-lg-7 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-4">Add New City</h5>
                            <form action="<?php echo base_url(); ?>CitiesCountries/createCity" method="post">
                            <div class="form-group">
                                    <label>Select Country</label>
                                    <select class="form-control select2-single" data-width="100%" name="city_country_id">
                                    <?php
                                foreach ($country_list as $country) { ?> 
                                
                                <option value="<?php echo $country->country_id; ?>"><?php echo $country->country_name; ?></option>

                                <?php }?>
                                    </select>                                    
                                </div>
                                <div class="form-group">
                                    <label>City Name</label>
                                    
                                    <input type="text" class="form-control" name="city_name"
                                        placeholder="Enter City Name">
                                        <span class="helper-text"><?php echo form_error('city_name'); ?></span>
                                </div>
                                <button type="submit" class="btn btn-primary mb-0">Submit</button>

                                <?php
                                if( $this->session->flashdata('message_success_city') ) { ?>

                                    <div class="col-12 mt-4">
                                        <div class="alert alert-success" role="alert">
                                            <?php echo $this->session->flashdata('message_success_city'); ?>
                                        </div>
                                    </div>
                                    
                                <?php }
                                ?>

                                <?php
                                if( $this->session->flashdata('message_error_city') ) { ?>

                                    <div class="col-12 mt-4">
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $this->session->flashdata('message_error_city'); ?>
                                        </div>
                                    </div>
                                    
                                <?php }
                                ?>
                            </form>
                        </div>
                    </div><!-- card mb-4 End -->
                  </div><!-- Col 6 end-->


                  <div class="col-lg-5 col-md-12 mb-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4" style="display: inline;">Countries List</h5>
                            <div class="top-right-button-container">
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary btn-lg dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        EXPORT
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" id="country_dataTablesExcel" href="#">Excel</a>
                                        <a class="dropdown-item" id="country_dataTablesCsv" href="#">Csv</a>
                                        <a class="dropdown-item" id="country_dataTablesPdf" href="#">Pdf</a>
                                    </div>
                                </div>
                            </div>
                            <br><br><br><br>

                            <!-- data-table Table_status -->
                            <table id="Table_country">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Country Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                foreach ($country_list as $country) { ?>           

                                    <tr>
                                        <td><?php echo $country->country_id; ?></td>
                                        <td><?php echo $country->country_name; ?></td>
                                        <td> <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#editModalCountry<?php echo $country->country_id; ?>">Edit</button>&nbsp;<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalCountry<?php echo $country->country_id; ?>">Delete</button> </td>
                                    </tr>


                                    <div id="deleteModalCountry<?php echo $country->country_id; ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                <form method="post" action="<?php echo base_url(); ?>CitiesCountries/deleteCountry/<?php echo $country->country_id; ?>">
                                                        <p>Are you Sure You want to Delete this item?</p>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                        <button type="button" class="btn btn-grey" data-dismiss="modal">Cancel</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div id="editModalCountry<?php echo $country->country_id; ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Country</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo base_url(); ?>CitiesCountries/updateCountry/<?php echo $country->country_id; ?>" method="post">


                                                        <div class="form-group">
                                                            <label>Country Name</label>
                                                            <input type="text" class="form-control" name="upd_country_name" placeholder="Enter Country" value="<?php echo $country->country_name; ?>">
                                                            <span class="helper-text"><?php echo form_error('upd_country_name'); ?></span>
                                                        </div>
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
                                        <td>USA</td>                                      
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#edit_count_Modal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#delete_count_Modal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Canada</td>                                        
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#edit_count_Modal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#delete_count_Modal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Mexico</td>                                       
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#edit_count_Modal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#delete_count_Modal">Delete</button> </td>
                                    </tr> -->
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--- Table end -->

                    </div><!-- Col 6 end-->





                    <div class="col-lg-7 col-md-12 mb-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4" style="display: inline;">Cities List</h5>
                            <div class="top-right-button-container">
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary btn-lg dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        EXPORT
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" id="city_dataTablesExcel" href="#">Excel</a>
                                        <a class="dropdown-item" id="city_dataTablesCsv" href="#">Csv</a>
                                        <a class="dropdown-item" id="city_dataTablesPdf" href="#">Pdf</a>
                                    </div>
                                </div>
                            </div>
                            <br><br><br><br>

                            <!-- data-table Table_status -->
                            <table id="Table_city">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Country Name</th>
                                        <th>City Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                <?php
                                foreach ($city_list as $city) { ?>           

                                    <tr>
                                        <td><?php echo $city->city_id; ?></td>
                                        <td><?php echo $city->country_name; ?></td>
                                        <td><?php echo $city->city_name; ?></td>
                                        <td> <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#editModalCity<?php echo $city->city_id; ?>">Edit</button>&nbsp;<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalCity<?php echo $city->city_id; ?>">Delete</button> </td>
                                    </tr>


                                    <div id="deleteModalCity<?php echo $city->city_id; ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                <form method="post" action="<?php echo base_url(); ?>CitiesCountries/deleteCity/<?php echo $city->city_id; ?>">
                                                        <p>Are you Sure You want to Delete this item?</p>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                        <button type="button" class="btn btn-grey" data-dismiss="modal">Cancel</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div id="editModalCity<?php echo $city->city_id; ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit City</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">

                                                   

                                                    <form action="<?php echo base_url(); ?>CitiesCountries/updateCity/<?php echo $city->city_id; ?>" method="post">
                    <div class="form-group">
                                    <label>Country</label>
                                    <select class="form-control select2-single" data-width="100%" name="upd_city_country_id">
                                    <?php
                                 foreach ($country_list as $country) { ?> 
                                 <option value="<?php echo $country->country_id ; ?>" <?php echo ( $city->city_country_id ==  $country->country_id) ?  'Selected' :  ''; ?>><?php echo $country->country_name ; ?></option>
                                <!-- <option value="<?php //echo $city->city_id; ?>"><?php //echo $city->country_name; ?></option> -->
                                <!--  -->
                                <?php }?>
                                   <!-- foreach () -->
                                 
                                        <!-- <option value="1">USA</option>
                                        <option value="2">Canada</option>
                                        <option value="3">Mexico</option> -->
                                    </select>                                    
                                </div>
                                <div class="form-group">
                                    <label>City Name</label>                                    
                                    <input type="text" class="form-control" name="upd_city_name"
                                        placeholder="Enter City Name" value="<?php echo $city->city_name; ?>">
                                        <span class="helper-text"><?php echo form_error('upd_city_name'); ?></span>
                                </div>
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
                                        <td>USA</td>
                                        <td>New York</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>USA</td>
                                        <td>Los Angeles</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--- Table end -->

                    </div><!-- Col 6 end-->


                
            </div>
            <!--Row end-->
        </div>
    </main>





    <!-- Modal Cities -->



    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit City</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                    <div class="form-group">
                                    <label>Country</label>
                                    <select class="form-control select2-single" data-width="100%">
                                        <option value=""></option>
                                        <option value="1">USA</option>
                                        <option value="2">Canada</option>
                                        <option value="3">Mexico</option>
                                    </select>                                    
                                </div>
                                <div class="form-group">
                                    <label>City Name</label>                                    
                                    <input type="text" class="form-control" name="city_name"
                                        placeholder="Enter City Name">
                                </div>
                        <button type="submit" class="btn btn-primary mb-0">Edit</button>
                        <button type="button" class="btn btn-grey" data-dismiss="modal">Cancel</button>
                    </form>
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
    var $Table_country = $("#Table_country").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
            "columns": [
                { "data": "id" },
                { "data": "country_name" },                
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
              {
                extend: 'excel',
                title: "Countries List"
              },
              {
                extend: 'csv',
                title: "Countries List"
              },
              {
                extend: 'pdf',
                title: "Countries List"
              }
            ]
        });
        $("#country_dataTablesExcel").on("click", function (event) {
            event.preventDefault();
            $Table_country.buttons(0).trigger();
        });
        $("#country_dataTablesCsv").on("click", function (event) {
            event.preventDefault();
            $Table_country.buttons(1).trigger();
        });
        $("#country_dataTablesPdf").on("click", function (event) {
            event.preventDefault();
            $Table_country.buttons(2).trigger();
        });








        var $Table_city = $("#Table_city").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
            "columns": [
                { "data": "id" },
                { "data": "country_name" },
                { "data": "city_name" },
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
              {
                extend: 'excel',
                title: "Cities List"
              },
              {
                extend: 'csv',
                title: "Cities List"
              },
              {
                extend: 'pdf',
                title: "Cities List"
              }                
            ]
        });
        $("#city_dataTablesExcel").on("click", function (event) {
            event.preventDefault();
            $Table_city.buttons(0).trigger();
        });
        $("#city_dataTablesCsv").on("click", function (event) {
            event.preventDefault();
            $Table_city.buttons(1).trigger();
        });
        $("#city_dataTablesPdf").on("click", function (event) {
            event.preventDefault();
            $Table_city.buttons(2).trigger();
        });
    </script>
</body>

</html>