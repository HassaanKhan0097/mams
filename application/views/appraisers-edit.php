<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Appraiser</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font/simple-line-icons/css/simple-line-icons.css" />

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
                    <h1>Edit Appraiser</h1>
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4">Edit Appraiser</h5>
                            <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="app_name" value="Appraiser Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="app_email" value="email@email.com">
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <select class="form-control select2-single" data-width="100%">
                                            <option value=""></option>
                                            <option value="1">Appraiser</option>
                                            <option value="2">Senior Appraiser</option>
                                            <option value="3">CREA</option>
                                        </select>                                    
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>License Number</label>
                                        <input type="text" class="form-control" name="app_license" value="123456789" >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Cell Phone</label>
                                        <input type="number" class="form-control" name="app_phone" value="4567894132" >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Home Number</label>
                                        <input type="number" class="form-control" name="app_home" value="213123123" >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Fax Number</label>
                                        <input type="number" class="form-control" name="app_fax" value="78654123" >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Pager</label>
                                        <input type="number" class="form-control" name="app_pager" value="876543234214" >
                                    </div>
                                </div>
                            </div>

                                <div class="form-group">
                                   
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1"
                                            name="jQueryCheckbox" checked>
                                        <label class="custom-control-label" for="customCheck1">Active</label>
                                    </div>                                  
                                    
                                </div>
                                <button type="submit" class="btn btn-primary mb-0">Edit</button>
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
    <script src="<?php echo base_url(); ?>assets/js/vendor/select2.full.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/mousetrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dore.script.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>


    
</body>

</html>