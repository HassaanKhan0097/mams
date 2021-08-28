<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Company Info</title>
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
                    <h1>Company Info</h1>
                    <div class="separator mb-5"></div>


                    <?php
                    if( $this->session->flashdata('update_message_error') ) { ?>

                        <div class="col-12 mt-4">
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->session->flashdata('update_message_error'); ?>
                            </div>
                        </div>
                        
                    <?php }
                    ?>


                </div>
            </div>

            <div class="row">
                <div class="col-12">
                <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4" style="display: inline;">Company Information</h5>
                            
                            

                            <!-- data-table Table_status -->
                            <table id="Table_company">
                                <thead>
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Zip Code</th>
                                        <th>Phone Number</th>
                                        <th>Fax Number</th>
                                        <th>Email Address</th>
                                        <th>Web Address</th>
                                        <th>Statement</th>
                                    </tr>
                                </thead>
                                <tbody>
                               
                                <tr>
                                    <td><?php echo $company_list->company_name; ?></td>
                                    <td><?php echo $company_list->company_address; ?></td>
                                    <td><?php echo $company_list->company_city; ?></td>
                                    <td><?php echo $company_list->company_state; ?></td>
                                    <td><?php echo $company_list->company_zip; ?></td>
                                    <td><?php echo $company_list->company_phone; ?></td>
                                    <td><?php echo $company_list->company_fax; ?></td>
                                    <td><?php echo $company_list->company_email; ?></td>
                                    <td><?php echo $company_list->company_web; ?></td>
                                    <td><?php echo $company_list->company_statement; ?></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--- Table end -->



                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4">Edit Company Information</h5>
                            <form action="<?php echo base_url(); ?>CompanyInfo/update" method="post">
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input type="text" class="form-control" name="company_name" value="<?php echo $company_list->company_name; ?>">
                                    <span class="helper-text"><?php echo form_error('company_name'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="company_address" value="<?php echo $company_list->company_address; ?>">
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="company_city" value="<?php echo $company_list->company_city; ?>">
                                </div>
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" class="form-control" name="company_state" value="<?php echo $company_list->company_state; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <input type="text" class="form-control" name="company_zip" value="<?php echo $company_list->company_zip; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" name="company_phone" value="<?php echo $company_list->company_phone; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Fax number</label>
                                    <input type="text" class="form-control" name="company_fax" value="<?php echo $company_list->company_fax; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" name="company_email" value="<?php echo $company_list->company_email; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Web Address</label>
                                    <input type="text" class="form-control" name="company_web" value="<?php echo $company_list->company_web; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Statement</label>
                                    <input type="text" class="form-control" name="company_statement" value="<?php echo $company_list->company_statement; ?>">
                                </div>
                                <button type="submit" class="btn btn-primary mb-0">Edit</button>

                                <?php
                                if( $this->session->flashdata('message_success') ) { ?>

                                    <div class="col-12 mt-4">
                                        <div class="alert alert-success" role="alert">
                                            <?php echo $this->session->flashdata('message_success'); ?>
                                        </div>
                                    </div>
                                    
                                <?php }
                                ?>

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
    <script src="<?php echo base_url(); ?>assets/js/vendor/mousetrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dore.script.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>

    <script>
    
    $("#Table_company").DataTable({searching: false, paging: false, info: false});
       
    </script>
</body>

</html>