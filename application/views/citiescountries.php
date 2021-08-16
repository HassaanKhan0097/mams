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
                </div>
            </div>

            <div class="row">
                <div class="col-lg-5 col-md-12 mb-4">
                    <div class="card pb-5">
                        <div class="card-body pb-5">
                            <h5 class="mb-4">Add New Country</h5>
                            <form action="" method="post" class="mb-2">
                                <div class="form-group">
                                    <label>Country Name</label>
                                    <input type="text" class="form-control" name="country_name" placeholder="Enter Country Name">
                                </div>
                                <button type="submit" class="btn btn-primary mb-0">Submit</button>
                            </form>
                        </div>
                    </div><!-- card mb-4 End -->
                  </div><!-- Col 6 end-->



                  <div class="col-lg-7 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-4">Add New City</h5>
                            <form action="" method="post">
                            <div class="form-group">
                                    <label>Select Country</label>
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
                                <button type="submit" class="btn btn-primary mb-0">Submit</button>
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
                                    <tr>
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
                                    </tr>
                                    
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
                                    <tr>
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
                                    <tr>
                                        <td>3</td>
                                        <td>USA</td>
                                        <td>Chicago</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>USA</td>
                                        <td>Houston</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>USA</td>
                                        <td>Phoenix</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>USA</td>
                                        <td>Philadelphia</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>USA</td>
                                        <td>San Antonio</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>USA</td>
                                        <td>San Diego</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Canada</td>
                                        <td>Alberta</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Canada</td>
                                        <td>Manitoba</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>Canada</td>
                                        <td>Nova Scotia</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>Canada</td>
                                        <td>Quebec</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>Canada</td>
                                        <td>Nunavut</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>14</td>
                                        <td>Canada</td>
                                        <td>Yukon</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>15</td>
                                        <td>Mexico</td>
                                        <td>Tijuana</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>16</td>
                                        <td>Mexico</td>
                                        <td>Leon</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>17</td>
                                        <td>Mexico</td>
                                        <td>Zapopan</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>18</td>
                                        <td>Mexico</td>
                                        <td>Multifamily</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>19</td>
                                        <td>Mexico</td>
                                        <td>Puebia</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>20</td>
                                        <td>Mexico</td>
                                        <td>Monterrey</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
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



    <!-- Modal Country-->

    <div id="delete_count_Modal" class="modal fade" role="dialog">
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



    <div id="edit_count_Modal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Country</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">                    
                                <div class="form-group">
                                    <label>Country Name</label>                                    
                                    <input type="text" class="form-control" name="country_name"
                                        placeholder="Enter Country Name">
                                </div>
                        <button type="submit" class="btn btn-primary mb-0">Edit</button>
                        <button type="button" class="btn btn-grey" data-dismiss="modal">Cancel</button>
                    </form>
                </div>

            </div>

        </div>
    </div>






    <!-- Modal Cities -->

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