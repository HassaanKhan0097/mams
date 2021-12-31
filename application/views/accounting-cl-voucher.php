<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Accounting Client Detail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font/simple-line-icons/css/simple-line-icons.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/datatables.responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/bootstrap-datepicker3.min.css" />
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
                    
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4" style="display: inline;">Voucher Detail</h5>
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

                            
                            <table class="table_total" style="width:100%">
                                <thead>
                                <tr>
                                    <th colspan="4"><h3>Current Payment</h3></th>
                                </tr>
                                <tr>
                                    <th width="20%">Client Name </th>
                                    <th>Payment Date </th>
                                    <th>Description </th>
                                    <th>Paid</th>

                                </tr>
                                </thead>
                                <tr>
                                    <td id="totalClient"><?php  echo $cl_single->cl_name; ?> </td>
                                    <td><?php echo $voucher_single->v_date; ?></td>
                                    <td><?php echo $voucher_single->v_desc; ?></td>
                                    <td>PAID</td>
                                </tr>
                            </table>

                            <br><br>
                          <div class="row">
                              <div class="col-md-12">
                              <button type="button" class="btn btn-danger btn-sm float-right " onclick="unpay();">Unpay Voucher</button>
                              </div>
                          </div>

                            <hr>
                            <table id="table_detail" class="table table-bordered">
                                <thead >
                                    <tr>
                                        <th colspan="7">Detail</th>                                        
                                    </tr>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>Client Name</th>
                                        <th>Property Address</th>
                                        <th>City</th>
                                        <th>Borrower</th>
                                        <th>Status</th>
                                        <th>Expense</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php foreach($order_list as $a){?>
                                    <tr>
                                        <td><?php echo $a->order_number; ?></td>
                                        <td><?php echo $a->cl_name; ?></td>
                                        <td><?php echo $a->order_address; ?></td>
                                        <td><?php echo $a->city_name; ?></td>
                                        <td><?php echo $a->order_borrower; ?></td>
                                        <td><?php echo $a->st_name; ?></td>
                                        <td class="table_id"><a href="<?php echo base_url();?>PdfReport/singleInvoice/<?php echo $a->order_number; ?>"> $<?php echo $a->order_revenue;?></a></td>
                                    </tr>


                                <?php } ?>
                               
                            </tbody>
                            </table>

                           
                            <br><br><br><br>
                            <table id="table_voucher" class="table table-bordered">
                                <thead >
                                    <tr>
                                        <th colspan="2">Summary</th>                                        
                                    </tr>
                                    <tr>
                                        <th>Voucher Number</th>                                        
                                        <th>Total Paid</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td><?php echo $voucher_single->v_number; ?></td>
                                        <td><?php echo $voucher_single->v_total; ?></td>
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

    <div id="modalProceed" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body text-center">
                    <form action="<?php echo base_url()?>Accounting/unpayClient/<?php echo $voucher_single->v_number; ?>" method="post">
                        
                                    
                        <p>Are you Sure You want to Unpay this Voucher?</p>
                        <button type="submit" class="btn btn-primary" >Unpay</button>
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
    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap-datepicker.js"></script>
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
   $("#totalClient").html("<?php echo $total; ?>");
   </script>
    <script>

    function unpay(){                            
            $("#modalProceed").modal('show');
        
    }

        var $table_detail = $("#table_detail").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
            "columns": [
                { "data": "files_to_pay" },
                { "data": "order_number" },
                { "data": "invoice" },
                { "data": "property_address" },
                { "data": "payment_method" },
                { "data": "city" },
                { "data": "borrower" },
                { "data": "appraiser" },
                // { "data": "Unpaid" }
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
            "scrollX": true,
            buttons: [
                'excel',
                'csv',
                'pdf'
            ]
        });
        $("#dataTablesExcel").on("click", function (event) {
            event.preventDefault();
            $table_detail.buttons(0).trigger();
        });
        $("#dataTablesCsv").on("click", function (event) {
            event.preventDefault();
            $table_detail.buttons(1).trigger();
        });
        $("#dataTablesPdf").on("click", function (event) {
            event.preventDefault();
            $table_detail.buttons(2).trigger();
        });

        $( document ).ready(function() {
            setTimeout(function(){ console.log("Ready"); $("#order_number").click(); $("#order_number").click(); }, 3000);
        });




        var $table_voucher = $("#table_voucher").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
            "columns": [
                { "data": "vouchers" },
                { "data": "date" },
                { "data": "total" }
          
                // { "data": "Unpaid" }
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
            "scrollX": true,
            buttons: [
                'excel',
                'csv',
                'pdf'
            ]
        });
        $("#dataTablesExcel").on("click", function (event) {
            event.preventDefault();
            $table_voucher.buttons(0).trigger();
        });
        $("#dataTablesCsv").on("click", function (event) {
            event.preventDefault();
            $table_voucher.buttons(1).trigger();
        });
        $("#dataTablesPdf").on("click", function (event) {
            event.preventDefault();
            $table_voucher.buttons(2).trigger();
        });

        $(document).ready(function() {
            setTimeout(function(){ console.log("Ready"); $("#order_number").click(); $("#order_number").click(); }, 3000);
        });


        function edit_file(id){
            window.location.href= "<?php echo base_url(); ?>file/edit/"+id;
        }
    </script>
</body>

</html>