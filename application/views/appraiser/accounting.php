<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Accounting </title>
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
                            <h5 class="mb-4" style="display: inline;">Accounts</h5>
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
                                    <th colspan="5"><h3>About Me</h3></th>
                                </tr>
                                <tr>
                                    <th>Total Owed on Unpaid</th>
                                    <th>Total Owed This Pay Period</th>
                                    <th>Appraiser</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                </tr>
                                </thead>
                                <tr>
                                    <td id="totalOwedUnpaid">$<?php $totalU = 0; echo $totalU; ?> </td>
                                    <td id="totalOwedPaid">$<?php $totalP = 0; echo $totalP; ?> </td>
                                    <td><?php echo $appraiser_single->app_name; ?></td>
                                    <td><?php echo $appraiser_single->app_email; ?></td>
                                    <td><?php echo $appraiser_single->app_phone; ?></td>
                                </tr>
                            </table>

                            <br><br>
                          
                           

                            <hr>
                            <table id="table_accounting_detail" class="table table-bordered">
                                <thead >
                                    <tr>
                                        <th colspan="10">Unpaid Jobs</th>                                        
                                    </tr>
                                    <tr>
                                      
                                        <th>Order Number</th>
                                        <th>Client Paid</th>
                                        <th>Client</th>                                        
                                        <th>Property Address</th>                                        
                                        <th>City</th>
                                        <th>Borrower</th>                                        
                                        <th>Exp Amount</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php $i=0;foreach($acc_app as $a) { 
                                    $paid = "Paid";
                                    $totalU += floatval($a->order_expense);                                    
                                    if(strlen($a->order_v_client) == 0){
                                        $paid = "Unpaid";
                                    }else{
                                        $totalP += floatval($a->order_expense);  
                                    }
                                    
                                ?>
                                    <tr>                                        
                                      
                                        <td class="table_id"><a href="<?php echo base_url();?>appraiserpages/Log/logView/<?php echo $a->order_number; ?>"><?php echo $a->order_number; ?><a></td>

                                        <td><?php echo $paid; ?></td>
                                        <td><?php echo $a->cl_name; ?></td>
                                        <td><?php echo $a->order_address; ?></td>                                        
                                        <td><?php echo $a->city_name; ?></td>
                                        <td><?php echo $a->order_borrower; ?></td>                                       
                                        <td>$<?php echo $a->order_expense; ?></td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                            </table>

                            <br><br>


                            <br><br>
                            <table id="table_voucher" class="table table-bordered">
                                <thead >
                                    <tr>
                                        <th colspan="3">Paid Jobs</th>                                        
                                    </tr>
                                    <tr>
                                        <th>Voucher Number</th>
                                        <th>Date</th>
                                        <th>Voucher Total</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($voucher_list as $v){?>
                                        <tr>
                                            <td class="table_id"><a href="<?php echo base_url();?>appraiser/voucher/<?php echo $v->v_number; ?>/<?php echo $appraiser_single->app_id; ?>"><?php echo $v->v_number; ?></a> </td>
                                            <td><?php echo $v->v_date; ?></td>
                                            <td>$<?php echo $v->v_total; ?></td>
                                        </tr>
                                    <?php } ?>
                                    
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
   $("#totalOwedUnpaid").html("$<?php echo $totalU; ?>");
   $("#totalOwedPaid").html("$<?php echo $totalP; ?>");
   </script>
    <script>




    

        var $table_accounting_detail = $("#table_accounting_detail").DataTable({
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
            $table_accounting_detail.buttons(0).trigger();
        });
        $("#dataTablesCsv").on("click", function (event) {
            event.preventDefault();
            $table_accounting_detail.buttons(1).trigger();
        });
        $("#dataTablesPdf").on("click", function (event) {
            event.preventDefault();
            $table_accounting_detail.buttons(2).trigger();
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

        // $(document).ready(function() {
        //     setTimeout(function(){ console.log("Ready"); $("#order_number").click(); $("#order_number").click(); }, 3000);
        // });


        
    </script>
</body>

</html>