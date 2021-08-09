<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dore jQuery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font/simple-line-icons/css/simple-line-icons.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/bootstrap.rtl.only.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/bootstrap-float-label.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css" />
</head>

<body class="background show-spinner no-footer">
    <div class="fixed-background"></div>
    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card" style="width: 60%">
                        <div class="form-side">
                            <a href="<?php echo base_url(); ?>">
                                <span class="logo-singlee"><h3><b>Marquee Appraiser Management System</b></h3></span>
                            </a>
                            <h6 class="mb-4">Login</h6>
                            <form method="post" action="<?php echo base_url(); ?>signin_submit">
                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" name="user_username" value="<?php echo set_value('user_username'); ?>"/>
                                    <span>Username</span>
                                </label>
                                <span class="helper-text"><?php echo form_error('user_username'); ?></span>

                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" type="password" placeholder="" name="user_pass" value="<?php echo set_value('user_pass'); ?>"/>
                                    <span>Password</span>
                                </label>
                                <span class="helper-text"><?php echo form_error('user_pass'); ?></span>

                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="#">Forget password?</a>
                                    <button class="btn btn-primary btn-lg btn-shadow" type="submit">LOGIN</button>
                                </div>

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
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dore.script.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
</body>

</html>