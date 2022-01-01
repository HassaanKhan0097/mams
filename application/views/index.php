<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manager | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font/simple-line-icons/css/simple-line-icons.css" />

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
                    <h1>Home</h1>
                    <!-- <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb pt-0">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Library</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data</li>
                        </ol>
                    </nav> -->
                    <div class="separator mb-5"></div>
                </div>



                <!-- <div class="col-lg-12 col-xl-4">
                    <div class="icon-cards-row">
                        <div class="glide dashboard-numbers">
                            <div class="glide__track" data-glide-el="track">
                                <ul class="glide__slides">
                                    <li class="glide__slide">
                                        <a href="#" class="card">
                                            <div class="card-body text-center">
                                                <i class="iconsminds-clock"></i>
                                                <p class="card-text mb-0">Pending Orders</p>
                                                <p class="lead text-center">16</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="glide__slide">
                                        <a href="#" class="card">
                                            <div class="card-body text-center">
                                                <i class="iconsminds-basket-coins"></i>
                                                <p class="card-text mb-0">Completed Orders</p>
                                                <p class="lead text-center">32</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="glide__slide">
                                        <a href="#" class="card">
                                            <div class="card-body text-center">
                                                <i class="iconsminds-arrow-refresh"></i>
                                                <p class="card-text mb-0">Refund Requests</p>
                                                <p class="lead text-center">2</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->


            </div>





            <div class="row">
            <!-- col-xl-6 col-lg-6  -->
                <div class="mb-4 home_card" style="width: 19%">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">By Appraiser</h5>
                            <table class="data-table data-table-standard responsive nowrap table table-bordered"
                                data-order="[[ 1, &quot;desc&quot; ]]">
                                <thead>
                                    <tr>
                                        <th>WIP By Appraiser</th>
                                        <th>Total Files</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                    foreach($by_appraiser as $ba){?>
                                        <tr>
                                            <td>
                                                <p class="list-item-heading"> <a href="<?php echo base_url(); ?>order/byappraiser/<?php echo $ba->app_id; ?>"> <u><?php echo $ba->app_name; ?></u> </a> </p>
                                            </td>
                                            <td>
                                                <p class="text-muted"><?php echo $ba->files; ?></p>
                                            </td>
                                        </tr>
                                <?php }?>
                                       

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- col-xl-6 col-lg-6  -->
                <div class="mb-4 home_card"  style="width: 28%">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">By Client</h5>
                            <table class="data-table data-table-standard responsive nowrap table table-bordered"
                                data-order="[[ 1, &quot;desc&quot; ]]">
                                <thead>
                                    <tr>
                                        <th>Client</th>
                                        <th>Total Files</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach($by_client as $bc){?>
                                        <tr>
                                            <td>
                                                <p class="list-item-heading"><a href="<?php echo base_url(); ?>order/byclient/<?php echo $bc->cl_id; ?>"> <u><?php echo $bc->cl_name; ?></u> </a></p>
                                                
                                            </td>
                                            <td>
                                                <p class="text-muted"><?php echo $bc->files; ?></p>
                                            </td>
                                        </tr>
                                <?php }?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- col-xl-4 col-lg-4 -->
                <div class=" mb-4 home_card" >
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">By Status</h5>
                            <table class="data-table data-table-standard responsive nowrap table table-bordered"
                                data-order="[[ 1, &quot;desc&quot; ]]">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Total Files</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                    foreach($by_status as $bs){?>
                                        <tr>
                                            <td>
                                                <p class="list-item-heading"><a href="<?php echo base_url(); ?>order/bystatus/<?php echo $bs->st_id; ?>"> <u><?php echo $bs->st_name; ?></u> </a></p>
                                            </td>
                                            <td>
                                                <p class="text-muted"><?php echo $bs->files; ?></p>
                                            </td>
                                        </tr>
                                <?php }?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- col-xl-4 col-lg-4  -->
                <div class="mb-4 home_card">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">By Due Date</h5>
                            <table class="data-table data-table-standard responsive nowrap table table-bordered"
                                data-order="[[ 1, &quot;desc&quot; ]]">
                                <thead>
                                    <tr>
                                        <th>Date Due</th>
                                        <th>Total Files</th>
                                    </tr>
                                </thead>
                                <tbody>

                                

                                <?php
                                    foreach($by_due_date as $bdd){?>
                                        <tr>
                                            <td>
                                                <p class="list-item-heading"><a href="<?php echo base_url(); ?>order/byduedate/<?php echo strtotime($bdd->order_duedate); ?>"> <u><?php echo $bdd->order_duedate; ?></u> </a></p>
                                                
                                            </td>
                                            <td>
                                                <p class="text-muted"><?php echo $bdd->files; ?></p>
                                            </td>
                                        </tr>
                                <?php }?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- col-xl-4 col-lg-4  -->
                <div class="mb-4 home_card">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">By Action Required</h5>
                            <table class="data-table data-table-standard responsive nowrap table table-bordered"
                                data-order="[[ 1, &quot;desc&quot; ]]">
                                <thead>
                                    <tr>
                                        <th>Action Required</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                    foreach($by_action_required as $bar){?>
                                        <tr>
                                            <td>
                                                <p class="list-item-heading"><a href="<?php echo base_url(); ?>order/update/<?php echo $bar->order_number; ?>"> <u><?php echo $bar->order_number; ?></u> </a></p>
                                                
                                            </td>
                                            <td>
                                                <p class="text-muted">View</p>
                                            </td>
                                        </tr>
                                <?php }?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>




            <!-- <div class="container-fluid"> -->
            <!-- <div class="row">    
                <div class="col-md-12 col-lg-12 col-xl-12"> 
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="mb-4">Files</h5>
                        <div class="row">
                            <div class="col-lg-6 mb-5">
                                <h6 class="mb-4">By Status</h6>
                                <div class="chart-container chart">
                                    <canvas id="productChart"></canvas>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-5">
                                <h6 class="mb-4">By Client</h6>
                                <div class="chart-container chart">
                                    <canvas id="productChartNoShadow"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
            </div> -->



        </div>
    </main>

	<!-- Footer -->

	<?php include_once('footer.php'); ?>

	<!-- Footer End -->


    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/datatables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/mousetrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dore.script.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/Chart.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/chartjs-plugin-datalabels.js"></script>
</body>

</html>