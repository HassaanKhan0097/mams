<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Loan Types</title>
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
                    <h1>Loan Types</h1>
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
                            <h5 class="mb-4">Add New Loan Types</h5>
                            <form action="<?php echo base_url(); ?>LoanType/create" method="post">
                                <div class="form-group">
                                    <label>Loan Type Name</label>
                                    <input type="text" class="form-control" name="loan_name"
                                        placeholder="Enter Loan Types">
                                    <span class="helper-text"><?php echo form_error('loan_name'); ?></span>
                                </div>

                                <div class="form-group">
                                    <label>Loan Type Description</label>
<!-- 
                                    <textarea  class="form-control" name="order_instruction" placeholder="Enter Special Instruction" rows="2" cols="50"></textarea>                                     -->

                                    <input type="text" class="form-control" name="loan_desc"
                                        placeholder="Enter Loan Types Description">
                                    <span class="helper-text"><?php echo form_error('loan_desc'); ?></span>
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
                            <h5 class="mb-4" style="display: inline;">Loan Types List</h5>
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
                            <table id="Table_Order">
                                <thead>
                                    <tr>
                                        <th>Loan Types Id</th>
                                        <th>Loan Types Name</th>
                                        <th>Loan Types Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                <?php
                                    foreach ($loan_types_list as $loan) { ?>           

                                        <tr>
                                            <td><?php echo $loan->loan_id; ?></td>
                                            <td><?php echo $loan->loan_name; ?></td>
                                            <td><?php echo $loan->loan_desc; ?></td>
                                            <td> <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#editModal<?php echo $loan->loan_id; ?>">Edit</button>&nbsp;<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $loan->loan_id; ?>">Delete</button> </td>
                                        </tr>


                                        <div id="deleteModal<?php echo $loan->loan_id; ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-body text-center">
                                                    <form method="post" action="<?php echo base_url(); ?>LoanType/delete/<?php echo $loan->loan_id; ?>">
                                                            <p>Are you Sure You want to Delete this item?</p>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                            <button type="button" class="btn btn-grey" data-dismiss="modal">Cancel</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div id="editModal<?php echo $loan->loan_id; ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Loan Types</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url(); ?>LoanType/update/<?php echo $loan->loan_id; ?>" method="post">
                                                            <div class="form-group">
                                                                <label>Loan Types</label>
                                                                <input type="text" class="form-control" name="update_loan_name" placeholder="Enter Types" value="<?php echo $loan->loan_name; ?>">
                                                                <span class="helper-text"><?php echo form_error('update_loan_name'); ?></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Loan Types</label>
                                                                <input type="text" class="form-control" name="update_loan_desc" placeholder="Enter Types" value="<?php echo $loan->loan_desc; ?>">
                                                                <span class="helper-text"><?php echo form_error('update_loan_desc'); ?></span>
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
                                        <td>Single Family</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Exterior </td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Exterior/Interior</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Condo</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Two-Four Unit</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Mixed Use</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Drive-By</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Multifamily</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Field Review</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Desk Review</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>Single Family</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>Exterior </td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>Exterior/Interior</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>14</td>
                                        <td>Condo</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>15</td>
                                        <td>Two-Four Unit</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>16</td>
                                        <td>Mixed Use</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>17</td>
                                        <td>Drive-By</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>18</td>
                                        <td>Multifamily</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>19</td>
                                        <td>Field Review</td>
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>
                                    <tr>
                                        <td>20</td>
                                        <td>Desk Review</td>
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
            Modal content
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

             Modal content
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Order Types</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Order Types</label>
                            <input type="text" class="form-control" name="ass_types" placeholder="Enter Types">
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
        var $Table_Order = $("#Table_Order").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
            "columns": [
                { "data": "loantype_id" },
                { "data": "loantype_name" },
                { "data": "loantype_desc" },
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
            $Table_Order.buttons(0).trigger();
        });
        $("#dataTablesCsv").on("click", function (event) {
            event.preventDefault();
            $Table_Order.buttons(1).trigger();
        });
        $("#dataTablesPdf").on("click", function (event) {
            event.preventDefault();
            $Table_Order.buttons(2).trigger();
        });
    </script>
</body>

</html>