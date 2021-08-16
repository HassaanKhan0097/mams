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
                                        <td>Company Name</td>
                                        <td>Address</td>
                                        <td>City</td>
                                        <td>State</td>
                                        <td>4521</td>
                                        <td>1234567890</td>
                                        <td>1234567890</td>                                       
                                        <td>email@email.com</td>
                                        <td>www.website.com</td>
                                        <td>Statement</td>

                                    </tr>
                                    

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--- Table end -->



                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4">Edit Company Information</h5>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input type="text" class="form-control" name="com_name" value="Company Name">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="com_address" value="Address">
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="com_city" value="City">
                                </div>
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" class="form-control" name="com_state" value="State">
                                </div>
                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <input type="number" class="form-control" name="com_zip" value="4521">
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="number" class="form-control" name="com_phone" value="1234567890">
                                </div>
                                <div class="form-group">
                                    <label>Fax number</label>
                                    <input type="number" class="form-control" name="com_fax" value="1234567890">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" name="com_email" value="email@email.com">
                                </div>
                                <div class="form-group">
                                    <label>Web Address</label>
                                    <input type="text" class="form-control" name="com_web" value="www.website.com">
                                </div>
                                <div class="form-group">
                                    <label>Statement</label>
                                    <input type="text" class="form-control" name="com_statement" value="Statement">
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
    <script src="<?php echo base_url(); ?>assets/js/vendor/datatables.min.js"></script>    
    <script src="<?php echo base_url(); ?>assets/js/vendor/mousetrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dore.script.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>

    <script>
    
    $("#Table_company").DataTable({searching: false, paging: false, info: false});
       
    </script>
</body>

</html>