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
                    <div class="text-zero top-right-button-container">
                    <a href="<?php echo base_url(); ?>PdfReport/appraiserReport/<?php echo $appraiser_single->app_id; ?>" class="btn btn-primary btn-lg top-right-button mr-1" >Get PDF</a>

                            <button type="button" class="btn btn-danger btn-lg top-right-button mr-1" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button>
                        </div>
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4">Edit Appraiser</h5>


                            <?php
                                if( $this->session->flashdata('update_message_error') ) { ?>

                                    <div class="col-12 mt-4">
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $this->session->flashdata('update_message_error'); ?>
                                        </div>
                                    </div>
                                    
                                <?php }
                                ?>

                            <form action="<?php echo base_url(); ?>Appraisers/update_appraiser/<?php echo $appraiser_single->app_id; ?>" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="upd_app_name" value="<?php echo $appraiser_single->app_name?>">
                                        <span class="helper-text"><?php echo form_error('upd_app_name'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="upd_app_email" value="<?php echo $appraiser_single->app_email?>">
                                        <span class="helper-text"><?php echo form_error('upd_app_email'); ?></span>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <select class="form-control select2-single" data-width="100%" name="upd_app_title">
                                            <option value=""></option>
                                            <option value="Appraiser" <?php echo ( $appraiser_single->app_title == 'Appraiser') ?  'Selected' :  ''; ?>>Appraiser</option>
                                            <option value="Senior Appraiser" <?php echo ( $appraiser_single->app_title == 'Senior Appraiser') ?  'Selected' :  ''; ?>>Senior Appraiser</option>
                                            <option value="CREA" <?php echo ( $appraiser_single->app_title == 'CREA') ?  'Selected' :  ''; ?>>CREA</option>
                                        </select>     

                                        <span class="helper-text"><?php echo form_error('upd_app_title'); ?></span>                               
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>License Number</label>
                                        <input type="number" class="form-control" name="upd_app_license" value="<?php echo $appraiser_single->app_license?>" >
                                    </div>
                                    <span class="helper-text"><?php echo form_error('upd_app_license'); ?></span>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Cell Phone</label>
                                        <input type="number" class="form-control" name="upd_app_phone" value="<?php echo $appraiser_single->app_phone?>" >
                                        <span class="helper-text"><?php echo form_error('upd_app_phone'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Home Number</label>
                                        <input type="number" class="form-control" name="upd_app_home" value="<?php echo $appraiser_single->app_home?>" >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Fax Number</label>
                                        <input type="number" class="form-control" name="upd_app_fax" value="<?php echo $appraiser_single->app_fax?>" >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Pager</label>
                                        <input type="number" class="form-control" name="upd_app_pager" value="<?php echo $appraiser_single->app_pager?>" >
                                    </div>
                                </div>
                            </div>

                                <div class="form-group">
                                   
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1"
                                            name="jQueryCheckbox" <?php echo $appraiser_single->app_active?>>
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



 <!-- Modal -->

 <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body text-center">
                <form method="post" action="<?php echo base_url(); ?>Appraisers/delete/<?php echo $appraiser_single->app_id; ?>">
                    <p>Are you Sure You want to Delete this item?</p>
                    <button type="submit" class="btn btn-danger">Delete</button>
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
    <script src="<?php echo base_url(); ?>assets/js/vendor/mousetrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dore.script.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>


    
</body>

</html>