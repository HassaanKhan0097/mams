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
                            <h5 class="mb-4" style="display: inline;">Accounts Receivable</h5>
                            <div class="top-right-button-container mb-2">
                                <div class="btn-group">
                                <a href="<?php echo base_url();?>PdfReport/accountingStatement/<?php echo $cl_single->cl_id; ?>" class="btn btn-primary">Generate Statement</a>

                                    
                                </div>
                            </div>

                           
                            <table class="table_total mt-2" style="width:100%">
                                <thead>
                                <tr>
                                    <th colspan="4"><h3>Client Information</h3></th>
                                </tr>
                                <tr>
                                    <th width="20%">Total Owed By This Client</th>
                                    <th>Client Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>

                                </tr>
                                </thead>
                                <tr>
                                    <td id="totalClient">$<?php $total = 0; echo $total; ?> </td>
                                    <td><?php echo $cl_single->cl_name; ?></td>
                                    <td><?php echo $cl_single->cl_email; ?></td>
                                    <td><?php echo $cl_single->cl_phone; ?></td>
                                </tr>
                            </table>

                            <br><br>
                          
                            <!-- <form action="<?php echo base_url(); ?>Order/advanceFilter" method="post"> -->
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Check No:</label>
                                            <input type="text" class="form-control" name="checkNo" placeholder="Enter Check Number">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Payment Description:</label>
                                            <input type="text" class="form-control" name="paymentDesc" placeholder="Enter Payment Description">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Payment Date</label>
                                            <div class="input-group date">
                                                <input type="text" class="form-control" name="paymentDate"  value="<?php echo date( "m/d/Y"); ?>" required>
                                                <span class="input-group-text input-group-append input-group-addon">
                                                    <i class="simple-icon-calendar"></i>
                                                </span>
                                                <span class="helper-text"><?php echo form_error('order_date'); ?></span>    
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <!-- </form> -->

                            <hr>
                            <table id="table_accounting_detail" class="table table-bordered">
                                <thead >
                                    <tr>
                                        <th colspan="8">Unpaid Jobs</th>                                        
                                    </tr>
                                    <tr>
                                        <th>Files To Pay</th>
                                        <th>Order Number</th>
                                        <th>Invoice</th>
                                        <th>Property Address</th>
                                        <th>Payment Method</th>
                                        <th>City</th>
                                        <th>Borrower</th>
                                        <th>Appraiser</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php $i=0;foreach($acc_cl as $a) {  $total+= floatval($a->order_revenue); ?>
                                    <tr>                                        
                                        <td><label
                                        class="custom-control custom-checkbox mb-1 align-self-center data-table-rows-check">
                                        <input type="checkbox" id="check<?php echo $i; $i++;?>" class="custom-control-input">
                                        <span class="custom-control-label">&nbsp;</span>
                                        </label></td>
                                        <td class="table_id"><a href="<?php echo base_url();?>order/update/<?php echo $a->order_number; ?>"><?php echo $a->order_number; ?><a></td>
                                        <td class="table_id"><a href="<?php echo base_url();?>PdfReport/singleInvoice/<?php echo $a->order_number; ?>"> $<?php echo $a->order_revenue;?></a></td>
                                        <td><?php echo $a->order_address; ?></td>
                                        <td><?php echo $a->order_paymentmethod; ?></td>
                                        <td><?php echo $a->city_name; ?></td>
                                        <td><?php echo $a->order_borrower; ?></td>
                                        <td><?php echo $a->app_name; ?></td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                            </table>

                            <br><br>

                            <button type="button" class="btn btn-outline-primary btn-lg" onclick="selectedPaid();">Mark Selected As Paid</button>

                            <br><br><br><br>
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
                                            <td class="table_id"><a href="<?php echo base_url();?>accounting/voucher/<?php echo $v->v_number; ?>/<?php echo $cl_single->cl_id; ?>"><?php echo $v->v_number; ?></a> </td>
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



    <!-- Modal -->

    <div id="modalProceed" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body text-center">
                    <form action="<?php echo base_url()?>Accounting/create_cl_voucher/<?php echo $cl_single->cl_id; ?>" method="post">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Check No:</label>
                                    <input type="text" class="form-control" name="modalcheckNo" placeholder="Enter Check Number">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Payment Description:</label>
                                    <input type="text" class="form-control" name="modalpaymentDesc" placeholder="Enter Payment Description">
                                </div>
                            </div>


                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Payment Date</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" name="modalpaymentDate"  >
                                        <span class="input-group-text input-group-append input-group-addon">
                                            <i class="simple-icon-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Order To Be Paid:</label>
                                    <h6 id="orderNumbers"></h6>
                                    <input type="text" name="inputorderNumbers" style="display:none">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Total Amount:</label>
                                    <h2 id="totalAmount"></h2>
                                    <input type="text" name="inputtotalAmount" style="display:none">
                                </div>
                            </div>



                            <!-- <div class="col-sm-12">
                                
                                <br><br>
                                <p>Total: <h4 id="totalAmount"></h4> </p>
                            </div> -->
                          
                        </div>
                                    
                        <p>Are you Sure You want to Proceed?</p>
                        <button type="submit" class="btn btn-primary" >Submit</button>
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
   $("#totalClient").html("$<?php echo $total; ?>");
   </script>
    <script>


    function selectAllCheckbox(){

        for(i=0; i < $("#table_accounting_detail tbody tr").length ; i++){
            $("#check"+i).prop('checked', true);
        }
        
    }

    function selectedPaid(){
        // var currentRow=$(this).closest("tr");
        // var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
        //  var col2=currentRow.find("td:eq(1)").text(); // get current row 2nd TD
        //  var col3=currentRow.find("td:eq(2)").text();
        total = 0;
        totalOrder = "";

        if($("input[name=checkNo]").val() == ""){
            alert("Kindly Enter Check Number");
        }else{
            for(i=0; i < $("#table_accounting_detail tbody tr").length ; i++){
                if($("#check"+i).is(":checked")){
                    cr = $("#check"+i).closest("tr");
                    o = cr.find("td:eq(1)").text();
                    rev = cr.find("td:eq(2)").text();
                    rev = rev.substring(1);



                    console.log("rev-> ", rev);
                    total+= parseFloat(rev);
                    totalOrder += o + "<br>";

                    
                }
            }
            console.log("total-> ", total);
            totalOrder = totalOrder.substring(0,totalOrder.length-4);
            $("#totalAmount").html(total);
            $("#orderNumbers").html(totalOrder);

            $("input[name=inputtotalAmount]").val(total);
            $("input[name=inputorderNumbers]").val(totalOrder);

            $("input[name=modalcheckNo]").val($("input[name=checkNo]").val());
            $("input[name=modalpaymentDesc]").val($("input[name=paymentDesc]").val());
            $("input[name=modalpaymentDate]").val($("input[name=paymentDate]").val());

            
            $("#modalProceed").modal('show');
        }
    }

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

        $(document).ready(function() {
            setTimeout(function(){ console.log("Ready"); $("#order_number").click(); $("#order_number").click(); }, 3000);
        });


        function edit_file(id){
            window.location.href= "<?php echo base_url(); ?>file/edit/"+id;
        }
    </script>
</body>

</html>