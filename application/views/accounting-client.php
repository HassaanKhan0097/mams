<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Accounting Client</title>
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
                            <div class="top-right-button-container">
                                <div class="btn-group">
                                <a href="<?php echo base_url();?>Accounting/load_search_cl" class="btn btn-outline-primary float-right">Search Receivable</a>
                                </div>
                            </div>

                            <?php 

                            $totalR = 0;
                            $tableTr = ``;
                                
                                $totalR = $t0 = $t30 = $t60 = $t90 = 0;
                                $arr = $acc_client_list;
                                $acc_cl2 = array();
                                for($i=0; $i<sizeof($arr); $i++){
                                $totalR += $arr[$i]->order_revenue;
                                $date1 = $arr[$i]->order_duedate;
                                $date2 = date('Y/m/d');
                                $diff = strtotime($date2) - strtotime($date1);
                                $days= abs(round($diff / 86400));
                                $totalOwed =  $count0 = $count30 = $count60 = $count90 = 0;
                                $countTotal = 1;
                                if($days >= 0 && $days <= 29){$count0=1; $t0 += $arr[$i]->order_revenue; } 
                                else if($days >= 30 && $days <= 59){$count30=1; $t30 += $arr[$i]->order_revenue; } 
                                else if($days >= 60 && $days <= 89){$count60=1; $t60 += $arr[$i]->order_revenue; } 
                                else if($days >= 90 ){$count90=1; $t90 += $arr[$i]->order_revenue;}

                                if($i!=0){
                                    if($arr[$i]->order_client_id != $arr[$i-1]->order_client_id){
                                    
                                    $obj =  new stdClass();
                                    $obj->order_client_id = $arr[$i]->order_client_id;
                                    $obj->cl_name = $arr[$i]->cl_name;
                                    $obj->total_owed = $arr[$i]->order_revenue;
                                    $obj->count_total = $countTotal;
                                    $obj->count_0 = $count0;
                                    $obj->count_30 = $count30;
                                    $obj->count_60 = $count60;
                                    $obj->count_90 = $count90;   
                                    
                                    array_push($acc_cl2,$obj);
                                    }else{
                                        $j = sizeof($acc_cl2)-1;

                                        $acc_cl2[$j]->total_owed += $arr[$i]->order_revenue;
                                        $acc_cl2[$j]->count_total += 1;
                                        $acc_cl2[$j]->count_0 += $count0;
                                        $acc_cl2[$j]->count_30 += $count30;
                                        $acc_cl2[$j]->count_60 += $count60;
                                        $acc_cl2[$j]->count_90 += $count90;

                                    }
                                }else{
                                $obj =  new stdClass();
                                $obj->order_client_id = $arr[$i]->order_client_id;
                                $obj->cl_name = $arr[$i]->cl_name;
                                $obj->total_owed = $arr[$i]->order_revenue;
                                $obj->count_total = $countTotal;
                                $obj->count_0 = $count0;
                                $obj->count_30 = $count30;
                                $obj->count_60 = $count60;
                                $obj->count_90 = $count90;   
                                
                                array_push($acc_cl2,$obj);

                                }
                                                                    
                                }



                                ?>
                         
                            <!-- <div class="row">
                                <div class="col-sm-6">
                                    <table class="table_total">
                                        <thead>
                                        <tr>
                                            <th colspan="2"><h3>Total Receivable</h3></th>
                                        </tr>
                                        </thead>
                                        <tr>
                                            <td>Total Accounts Receivable</td>
                                            <td>$<?php echo $totalR ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                <a href="<?php echo base_url();?>Accounting/search_cl" class="btn btn-primary float-right">Search Receivable</a>

                                </div>
                            </div> -->
                           


                            
                            <!-- <button type="button" class="btn btn-outline-primary btn-lg" onclick="selectedPaid();">Mark Selected As Paid</button> -->

                            
                            <table class="table_total mt-4" style="width:100%;">
                                <thead>
                                <tr>
                                    <th colspan="5" style="text-align: center;"><h3>Receivable Aging</h3></th>
                                </tr>
                                <tr>
                                    <th>Aging Total</th>
                                    <th>0 to 29 Days</th>
                                    <th>30 to 59 Days</th>
                                    <th>60 to 89 Days</th>
                                    <th>90+ Days</th>
                                </tr>
                                </thead>
                                <tr>
                                    <td>$<?php echo $totalR ?></td>
                                    <td>$<?php echo $t0 ?></td>
                                    <td>$<?php echo $t30 ?></td>
                                    <td>$<?php echo $t60 ?></td>
                                    <td>$<?php echo $t90 ?></td>
                                    
                                </tr>
                            </table>

                            <br><br>
                          
                        
                            <table id="table_accounting" class="table table-bordered">
                                <thead >
                                    <tr>
                                        <th width="25%">Client</th>
                                        <th>Total Owed</th>
                                        <th>Count</th>
                                        <th colspan="4" style="text-align: center">Aging Count (Days)</th>
                                        <th></th>                                      
                                    </tr>
                                    <tr>
                                        <th colspan="3"></th>
                                        <th>0-29</th>
                                        <th>30-59</th>
                                        <th>60-89</th>
                                        <th>90+</th>
                                        <th>Print Statement</th>
                                        <!-- <th>COD</th> -->
                                    </tr>
                                </thead>
                                <tbody>   
                                <?php

                                
                                foreach($acc_cl2 as $a){
                                    ?>
                                    
                                    <tr>
                                        <td class="table_id"><a href="<?php echo base_url(); ?>accounting/client_detail/<?php echo $a->order_client_id; ?>"><?php echo $a->cl_name ?></a></td>
                                        <td>$<?php echo $a->total_owed ?></td>
                                        <td><?php echo $a->count_total ?></td>
                                        <td><?php echo $a->count_0 ?></td>
                                        <td><?php echo $a->count_30 ?></td>
                                        <td><?php echo $a->count_60 ?></td>
                                        <td><?php echo $a->count_90 ?></td>
                                        <td><a href="<?php echo base_url();?>PdfReport/accountingStatement/<?php echo $a->order_client_id; ?>" class="btn btn-primary">Print</a>
</td>

                                        <!-- <td>0</td> -->
                                    </tr>
                                
                                <?php } ?>
                            </tbody>
                            </table>

                            <br><br>
                           


                                
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
        var $table_accounting = $("#table_accounting").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
            "columns": [
                { "data": "Client" },
                { "data": "Total Owed" },
                { "data": "Count" },
                { "data": "Age0-29" },
                { "data": "Age30-59" },
                { "data": "Age60-89" },
                { "data": "Age90+" },
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
      
            
        });
       
    </script>
</body>

</html>