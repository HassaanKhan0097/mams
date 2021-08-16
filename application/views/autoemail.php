<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Auto Email</title>
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
                    <h1>Auto Email</h1>
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4">Emails</h5>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>From Name</label>
                                    <input type="text" class="form-control" name="em_name" placeholder="Enter From Name">
                                </div>
                                <div class="form-group">
                                    <label>From Email</label>
                                    <input type="email" class="form-control" name="em_email" placeholder="Enter From Email">
                                </div>

                                <div class="separator my-5"></div>

                                <div class="form-group">
                                    <label>Select Event/Status</label>
                                    <select class="form-control select2-single" data-width="100%">
                                        <option value=""></option>
                                        <option value="1">New Order</option>
                                        <option value="2">Appointment Status</option>
                                        <option value="3">Appraisal Type</option>
                                    </select>                                    
                                </div>
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" class="form-control" name="em_subject" value="A new order has been assigned to you" >
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea  class="form-control" name="em_message" placeholder="Enter Message" rows="2" cols="50">The above referenced order has been assigned to you.</textarea>                                    
                                </div>

                                <div class="separator my-5"></div>

                                <div class="form-group">
                                   
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1"
                                            name="jQueryCheckbox">
                                        <label class="custom-control-label" for="customCheck1">Check Send e-mail to office whenever an appraiser adds notes.</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2"
                                            name="jQueryCheckbox">
                                        <label class="custom-control-label" for="customCheck2">Send e-mail to office whenever a client adds notes.</label>
                                    </div>
                                    
                                </div>
                                <button type="submit" class="btn btn-primary mb-0">Update</button>
                            </form>
                        </div>
                    </div><!-- card mb-4 End -->


                          


                </div>
            </div>
            <!--Row end-->
        </div>
    </main>






    <!-- Modal End -->

    <!-- Footer -->

    <?php include_once('footer.php'); ?>

    <!-- Footer End -->


    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/datatables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/select2.full.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/mousetrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dore.script.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>


    
</body>

</html>