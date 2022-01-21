<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pipeline Report</title>
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
                    <h1>Pipeline Report</h1>
                    
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">                    
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4" style="display: inline;"> By Payment Method</h5>                           
                          

                            <!-- data-table Table_status -->
                            <table id="Table_payment" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Method</th>
                                        <th>#</th>
                                        <?php if($this->session->userdata['loggedUser']['user_role'] == "owner"){ ?> 
                                        <th>Revenue</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($payment as $p ){ ?>
                                        <tr>   
                                            <td class="table_id"><a href="javascript:void(0)" onclick="pipeline_detail('<?php echo $p->order_paymentmethod;?>','payment')"> <?php echo $p->order_paymentmethod;?></a></td>
                                            <td><?php echo $p->files;?></td>
                                            <?php if($this->session->userdata['loggedUser']['user_role'] == "owner"){ ?> 
                                            <td>$<?php echo $p->amount;?></td>
                                            <?php } ?>
                                        </tr>
                                    <?php }?> 
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--- Table end -->


                </div>

                <div class="col-4">                    
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4" style="display: inline;"> COD status</h5>                           
                          

                            <!-- data-table Table_status -->
                            <table id="Table_cod" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Status COD</th>
                                        <th>#</th>
                                        <?php if($this->session->userdata['loggedUser']['user_role'] == "owner"){ ?> 
                                        <th>Revenue</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($cod_status as $s ){ ?>
                                        <tr>   
                                        <td class="table_id"><a href="javascript:void(0)" onclick="pipeline_detail('<?php echo $s->st_id;?>','cod')"> <?php echo $s->st_name;?></a></td>
                                            <!-- <td><?php echo $s->st_name;?></td> -->
                                            <td><?php echo $s->files;?></td>
                                            <?php if($this->session->userdata['loggedUser']['user_role'] == "owner"){ ?> 
                                            <td>$<?php echo $s->amount;?></td>
                                            <?php } ?>
                                        </tr>
                                    <?php }?>                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--- Table end -->
                </div>

                <div class="col-4">                    
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4" style="display: inline;"> Status</h5>                           
                          

                            <!-- data-table Table_status -->
                            <table id="Table_status" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>#</th>
                                        <?php if($this->session->userdata['loggedUser']['user_role'] == "owner"){ ?> 
                                        <th>Revenue</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($status as $s ){ ?>
                                        <tr>   
                                            <td class="table_id"><a href="javascript:void(0)" onclick="pipeline_detail('<?php echo $s->st_id;?>','status')"> <?php echo $s->st_name;?></a></td>

                                            <!-- <td><?php echo $s->st_name;?></td> -->
                                            <td><?php echo $s->files;?></td>
                                            <?php if($this->session->userdata['loggedUser']['user_role'] == "owner"){ ?> 
                                            <td>$<?php echo $s->amount;?></td>
                                            <?php } ?>
                                        </tr>
                                    <?php }?>                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--- Table end -->
                </div>
            </div>
            <!--Row end-->


            <div class="row">
                <div class="col-6">                    
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4" style="display: inline;"> By Appraiser</h5>                           
                          

                            <!-- data-table Table_status -->
                            <table id="Table_appraiser" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Appraiser</th>
                                        <th>#</th>
                                        <?php if($this->session->userdata['loggedUser']['user_role'] == "owner"){ ?> 
                                            <th>Revenue</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($app as $a ){ ?>
                                        <tr>   
                                            <td class="table_id"><a href="javascript:void(0)" onclick="pipeline_detail('<?php echo $a->app_id;?>','appraiser')"> <?php echo $a->app_name;?></a></td>

                                            <!-- <td><?php echo $a->app_name;?></td> -->
                                            <td><?php echo $a->files;?></td>
                                            <?php if($this->session->userdata['loggedUser']['user_role'] == "owner"){ ?> 
                                                <td>$<?php echo $a->amount;?></td>
                                            <?php } ?>
                                        </tr>
                                    <?php }?>                                     
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--- Table end -->


                </div>

                <div class="col-6">                    
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4" style="display: inline;">  By Client</h5>                           
                          

                            <!-- data-table Table_status -->
                            <table id="Table_client" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Client</th>
                                        <th>#</th>
                                        <?php if($this->session->userdata['loggedUser']['user_role'] == "owner"){ ?> 
                                        <th>Revenue</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($cl as $c ){ ?>
                                        <tr>   
                                            <td class="table_id"><a href="javascript:void(0)" onclick="pipeline_detail('<?php echo $c->cl_id;?>','client')"> <?php echo $c->cl_name;?></a></td>

                                            <!-- <td><?php echo $c->cl_name;?></td> -->
                                            <td><?php echo $c->files;?></td>
                                            <?php if($this->session->userdata['loggedUser']['user_role'] == "owner"){ ?> 
                                            <td>$<?php echo $c->amount;?></td>
                                            <?php } ?>
                                        </tr>
                                    <?php }?>                                    
                                    
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


    <form action="<?php echo base_url();?>Report/pipeline_detail" method="post" style="display:none">
                                        

        <input type="text" name="r" >
        <input type="text" name="t" >

        <button type="submit" id="s">Submit</button>
    </form>


    <!-- Modal End -->

    <!-- Footer -->

    <?php include_once('footer.php'); ?>

    <!-- Footer End -->


    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
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



    function pipeline_detail(r,t){

        $("input[name=r]").val(r);
        $("input[name=t]").val(t);

        $("#s").click();
    }


         $("#Table_payment").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
            "columns": [
                { "data": "type" },
                { "data": "number" },
                { "data": "amount" }
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
            "scrollX": true,
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

        $("#Table_cod").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
            "columns": [
                { "data": "type" },
                { "data": "number" },
                { "data": "amount" }
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
            "scrollX": true,
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


        $("#Table_status").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
            "columns": [
                { "data": "type" },
                { "data": "number" },
                { "data": "amount" }
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
            "scrollX": true,
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


        $("#Table_appraiser").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
            "columns": [
                { "data": "type" },
                { "data": "number" },
                { "data": "amount" }
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
            "scrollX": true,
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


        $("#Table_client").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
            "columns": [
                { "data": "type" },
                { "data": "number" },
                { "data": "amount" }
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
            "scrollX": true,
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