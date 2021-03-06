<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pipeline Reports</title>
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
                    <h1>Legacy Pipeline Reports</h1>
                    
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">                    
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4" style="display: inline;"> Legacy Pipeline Reports Menu</h5> 
                            <br>                          
                          
                            


                            <div class="form-group">                                
                                <select class="form-control select2-single" data-width="100%" name="legacyPipeline" onchange="legacyChange()">
                                    <option value="Office" <?php echo ($leg == "Office")? "selected": "" ;?>>Office</option>
                                    <option value="Appraiser" <?php echo ($leg == "Appraiser")? "selected": "" ;?>>Appraiser</option>
                                    <option value="Client" <?php echo ($leg == "Client")? "selected": "" ;?>>Client By</option>                                    
                                </select>    
                            </div>
                            
                            <br>
                            
                            <!-- data-table Table_status -->

                            
                            
                            <?php if($leg == "Office"){ ?>

                                <button type="button" class="btn btn-outline-primary" onclick="range('Year')">Year</button>
                            <button type="button" class="btn btn-outline-primary" onclick="range('Quarter')">Quarter</button>
                            <button type="button" class="btn btn-outline-primary" onclick="range('Month')">Month</button>
                            <button type="button" class="btn btn-outline-primary" onclick="range('Week')">Week</button>
                            <button type="button" class="btn btn-outline-primary" onclick="range('Day')">Day</button>
                            <br><br>
                                <table id="Table_office" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th id="office_label"><?php echo $range; ?></th>
                                            <th>Total Orders</th>
                                            <?php if($this->session->userdata['loggedUser']['user_role'] == "owner"){ ?>
                                            <th>Total Revenue</th>
                                            <th>Total Expense</th>
                                            <th>Net Profit</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $to = $tr = $te = $tn = (float) 0;
                                        foreach($legacy as $l ){ ?>
                                            <tr>   
                                                
                                                <td  class="table_id"><?php 
                                                $d = "";
                                                $r = "";
                                                if($range == 'Day') {
                                                    $date = DateTime::createFromFormat('Y/m/d',$l->order_date);
                                                    $d = $date->format('l, F jS, Y');
                                                } else if($range == 'Week') {
                                                    $date = DateTime::createFromFormat('Y-m-d',$l->order_date);
                                                    $d = "Week of: " . $date->format('Y/m/d');
                                                } else if($range == 'Month') {
                                                    $date = DateTime::createFromFormat('Y/m/d',$l->order_date);
                                                    $d =  $date->format('F, Y');
                                                } else if($range == 'Quarter') {
                                                    $date = DateTime::createFromFormat('Y/m/d',$l->order_date);
                                                    $d =  $date->format('n');
                                                    $month = date($d);
                                                    //Calculate the year quarter.
                                                    $yearQuarter = ceil($month / 3);
                                                    //Print it out
                                                    $d =  $date->format('Y') .", " . "Quarter $yearQuarter ";
                                                    
                                                } else if($range == 'Year') {
                                                    $date = DateTime::createFromFormat('Y/m/d',$l->order_date);
                                                    $d =  $date->format('Y');
                                                }
                                                // echo $d ; 
                                                $legacy = "legacy_detail('".$l->order_date."','".$range."')";
                                                echo '<a href="javascript:void(0)" onclick="'.$legacy.'">'.$d.'</a>';
                                                
                                                // $this->config->item('base_url')
                                                
                                                ?></td>
                                                <td><?php $to+= floatval($l->total); echo $l->total;?></td>
                                                <?php if($this->session->userdata['loggedUser']['user_role'] == "owner"){ ?>
                                                <td>$<?php $tr+= floatval($l->revenue); echo $l->revenue;?></td>
                                                <td>$<?php $te+= floatval($l->expense); echo $l->expense;?></td>
                                                <td>$<?php $tn+= floatval(floatval($l->revenue) - floatval($l->expense)); echo floatval($l->revenue) - floatval($l->expense); ?></td>
                                                <?php } ?>
                                            </tr>
                                        <?php }?> 
                                        
                                        
                                    </tbody>
                                </table>

                                <br><br>
                                <?php if($this->session->userdata['loggedUser']['user_role'] == "owner"){ ?> 
                                <table class="table_total mt-2 " style="width:100%">
                                    <thead>
                                    <tr>
                                        <th colspan="4"><h3>Total</h3></th>
                                    </tr>
                                    <tr>
                                        <th width="20%">Total Orders</th>
                                        <th>Total Revenue</th>
                                        <th>Total Expense</th>
                                        <th>Total Net Profit</th>

                                    </tr>
                                    </thead>
                                    <tr>
                                        <td><?php echo $to; ?> </td>
                                        <td>$<?php echo $tr; ?></td>
                                        <td>$<?php echo $te; ?></td>
                                        <td>$<?php echo $tn; ?></td>
                                    </tr>
                                </table>
                                <?php } ?> 
                            <?php } ?>    

                            <?php if($leg == "Appraiser"){ ?>
                                

                                <div class="row">
                                    <div class="col-md-5">
                                        <button type="button" class="btn btn-outline-primary" onclick="range_app('Year')">Year</button>
                                        <button type="button" class="btn btn-outline-primary" onclick="range_app('Quarter')">Quarter</button>
                                        <button type="button" class="btn btn-outline-primary" onclick="range_app('Month')">Month</button>
                                        <button type="button" class="btn btn-outline-primary" onclick="range_app('Week')">Week</button>
                                        <button type="button" class="btn btn-outline-primary" onclick="range_app('Day')">Day</button>
                                    </div>
                                    <div class="col-md-1  px-0 mt-1">
                                  
                                        <div class="form-group">  
                                            <input type="text" class="form-control"  name="appRange" value="<?php echo $range;?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <div class="form-group">          
                                      
                                        <select class="form-control select2-single"  name="app_list" >
                                        <option value="">Select Appraiser to show all orders assigned</option>
                                            <?php foreach($app_list as $app){ ?>  
                                                <option value="<?php echo $app->app_id;?>"  <?php echo ($app_id == $app->app_id)? "selected": "" ;?>><?php echo $app->app_name;?></option>
                                            <?php } ?>                       
                                        </select>    
                                        </div>
                                    </div>
                                    <div class="col-md-2"> 
                                        <button type="button" class="btn btn-primary" onclick="appraiserSearch()">Search</button>
                                     </div>
                                </div>
                                <br><br>
                                


                                <table id="Table_office" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th id="office_label"><?php echo $range; ?></th>
                                            <th>Total Orders</th>
                                            <?php if($this->session->userdata['loggedUser']['user_role'] == "owner"){ ?> 
                                            <th>Total Revenue</th>
                                            <th>Total Expense</th>
                                            <th>Net Profit</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $to = $tr = $te = $tn = (float) 0;
                                        foreach($legacy as $l ){ ?>
                                            <tr>   
                                                
                                            
                                                

                                                <td  class="table_id"><?php 
                                                    $d = "";
                                                    $r = "";
                                                    if($range == 'Day') {
                                                        $date = DateTime::createFromFormat('Y/m/d',$l->order_date);
                                                        $d = $date->format('l, F jS, Y');
                                                    } else if($range == 'Week') {
                                                        $date = DateTime::createFromFormat('Y-m-d',$l->order_date);
                                                        $d = "Week of: " . $date->format('Y/m/d');
                                                    } else if($range == 'Month') {
                                                        $date = DateTime::createFromFormat('Y/m/d',$l->order_date);
                                                        $d =  $date->format('F, Y');
                                                    } else if($range == 'Quarter') {
                                                        $date = DateTime::createFromFormat('Y/m/d',$l->order_date);
                                                        $d =  $date->format('n');
                                                        $month = date($d);
                                                        //Calculate the year quarter.
                                                        $yearQuarter = ceil($month / 3);
                                                        //Print it out
                                                        $d =  $date->format('Y') .", " . "Quarter $yearQuarter ";
                                                        
                                                    } else if($range == 'Year') {
                                                        $date = DateTime::createFromFormat('Y/m/d',$l->order_date);
                                                        $d =  $date->format('Y');
                                                    }
                                                    // echo $d ; 
                                                    $legacy = "legacy_detail('".$l->order_date."','".$range."')";
                                                    echo '<a href="javascript:void(0)" onclick="'.$legacy.'">'.$d.'</a>';
                                                    
                                                    // $this->config->item('base_url')
                                                
                                                ?></td>
                                                <td><?php $to+= floatval($l->total); echo $l->total;?></td>
                                                <?php if($this->session->userdata['loggedUser']['user_role'] == "owner"){ ?> 
                                                    <td>$<?php $tr+= floatval($l->revenue); echo $l->revenue;?></td>
                                                    <td>$<?php $te+= floatval($l->expense); echo $l->expense;?></td>
                                                    <td>$<?php $tn+= floatval(floatval($l->revenue) - floatval($l->expense)); echo floatval($l->revenue) - floatval($l->expense); ?></td>
                                                <?php }?> 
                                            </tr>
                                        <?php }?> 
                                        
                                        
                                    </tbody>
                                </table>

                                <br><br>
                                <?php if($this->session->userdata['loggedUser']['user_role'] == "owner"){ ?> 
                                <table class="table_total mt-2" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th colspan="4"><h3>Total</h3></th>
                                    </tr>
                                    <tr>
                                        <th width="20%">Total Orders</th>
                                        <th>Total Revenue</th>
                                        <th>Total Expense</th>
                                        <th>Total Net Profit</th>

                                    </tr>
                                    </thead>
                                    <tr>
                                        <td><?php echo $to; ?> </td>
                                        <td>$<?php echo $tr; ?></td>
                                        <td>$<?php echo $te; ?></td>
                                        <td>$<?php echo $tn; ?></td>
                                    </tr>
                                </table>
                                <?php }?> 


                            <?php }?>


                            <?php if($leg == "Client"){ ?>
                                

                                <div class="row">
                                    <div class="col-md-5">
                                        <button type="button" class="btn btn-outline-primary" onclick="range_cl('Year')">Year</button>
                                        <button type="button" class="btn btn-outline-primary" onclick="range_cl('Quarter')">Quarter</button>
                                        <button type="button" class="btn btn-outline-primary" onclick="range_cl('Month')">Month</button>
                                        <button type="button" class="btn btn-outline-primary" onclick="range_cl('Week')">Week</button>
                                        <button type="button" class="btn btn-outline-primary" onclick="range_cl('Day')">Day</button>
                                    </div>
                                    <div class="col-md-1  px-0 mt-1">
                                  
                                        <div class="form-group">  
                                            <input type="text" class="form-control"  name="clRange" value="<?php echo $range;?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <div class="form-group">          
                                        <select class="form-control select2-single"  name="cl_list" >
                                        <option value="">Select Client to show all orders assigned</option>
                                            <?php foreach($cl_list as $cl){ ?>  
                                                <option value="<?php echo $cl->cl_id;?>"  <?php echo ($cl_id == $cl->cl_id)? "selected": "" ;?>><?php echo $cl->cl_name;?></option>
                                            <?php } ?>                       
                                        </select>    
                                        </div>
                                    </div>
                                    <div class="col-md-2"> 
                                        <button type="button" class="btn btn-primary" onclick="clientSearch()">Search</button>
                                     </div>
                                </div>
                                <br><br>
                                


                                <table id="Table_office" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th id="office_label"><?php echo $range; ?></th>
                                            <th>Total Orders</th>
                                            <?php if($this->session->userdata['loggedUser']['user_role'] == "owner"){ ?> 
                                            <th>Total Revenue</th>
                                            <th>Total Expense</th>
                                            <th>Net Profit</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $to = $tr = $te = $tn = (float) 0;
                                        foreach($legacy as $l ){ ?>
                                            <tr>   
                                                
                                                <!-- <td><?php 
                                                // if($range == 'Day') {
                                                //     $date = DateTime::createFromFormat('Y/m/d',$l->order_date);
                                                //     echo $date->format('l, F jS, Y');
                                                // } else if($range == 'Week') {
                                                //     $date = DateTime::createFromFormat('Y-m-d',$l->order_date);
                                                //     echo "Week of: " . $date->format('Y/m/d');
                                                // } else if($range == 'Month') {
                                                //     $date = DateTime::createFromFormat('Y/m/d',$l->order_date);
                                                //     echo $date->format('F, Y');
                                                // } else if($range == 'Quarter') {
                                                //     $date = DateTime::createFromFormat('Y/m/d',$l->order_date);
                                                //     $d =  $date->format('n');
                                                //     $month = date($d);
                                                //     //Calculate the year quarter.
                                                //     $yearQuarter = ceil($month / 3);
                                                //     //Print it out
                                                //     echo $date->format('Y') .", " . "Quarter $yearQuarter ";
                                                    
                                                // } else if($range == 'Year') {
                                                //     $date = DateTime::createFromFormat('Y/m/d',$l->order_date);
                                                //     echo $date->format('Y');
                                                // }
                                                
                                                ?></td> -->

                                                <td  class="table_id"><?php 
                                                    $d = "";
                                                    $r = "";
                                                    if($range == 'Day') {
                                                        $date = DateTime::createFromFormat('Y/m/d',$l->order_date);
                                                        $d = $date->format('l, F jS, Y');
                                                    } else if($range == 'Week') {
                                                        $date = DateTime::createFromFormat('Y-m-d',$l->order_date);
                                                        $d = "Week of: " . $date->format('Y/m/d');
                                                    } else if($range == 'Month') {
                                                        $date = DateTime::createFromFormat('Y/m/d',$l->order_date);
                                                        $d =  $date->format('F, Y');
                                                    } else if($range == 'Quarter') {
                                                        $date = DateTime::createFromFormat('Y/m/d',$l->order_date);
                                                        $d =  $date->format('n');
                                                        $month = date($d);
                                                        //Calculate the year quarter.
                                                        $yearQuarter = ceil($month / 3);
                                                        //Print it out
                                                        $d =  $date->format('Y') .", " . "Quarter $yearQuarter ";
                                                        
                                                    } else if($range == 'Year') {
                                                        $date = DateTime::createFromFormat('Y/m/d',$l->order_date);
                                                        $d =  $date->format('Y');
                                                    }
                                                    // echo $d ; 
                                                    $legacy = "legacy_detail('".$l->order_date."','".$range."')";
                                                    echo '<a href="javascript:void(0)" onclick="'.$legacy.'">'.$d.'</a>';
                                                    
                                                    // $this->config->item('base_url')
                                                
                                                ?></td>
                                                <td><?php $to+= floatval($l->total); echo $l->total;?></td>

                                                <?php if($this->session->userdata['loggedUser']['user_role'] == "owner"){ ?> 
                                                <td>$<?php $tr+= floatval($l->revenue); echo $l->revenue;?></td>
                                                <td>$<?php $te+= floatval($l->expense); echo $l->expense;?></td>
                                                <td>$<?php $tn+= floatval(floatval($l->revenue) - floatval($l->expense)); echo floatval($l->revenue) - floatval($l->expense); ?></td>
                                                <?php } ?>
                                            </tr>
                                        <?php }?> 
                                        
                                        
                                    </tbody>
                                </table>

                                <br><br>
                                <?php if($this->session->userdata['loggedUser']['user_role'] == "owner"){ ?> 
                                <table class="table_total mt-2" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th colspan="4"><h3>Total</h3></th>
                                    </tr>
                                    <tr>
                                        <th width="20%">Total Orders</th>
                                        <th>Total Revenue</th>
                                        <th>Total Expense</th>
                                        <th>Total Net Profit</th>

                                    </tr>
                                    </thead>
                                    <tr>
                                        <td><?php echo $to; ?> </td>
                                        <td>$<?php echo $tr; ?></td>
                                        <td>$<?php echo $te; ?></td>
                                        <td>$<?php echo $tn; ?></td>
                                    </tr>
                                </table>
                                <?php }?>

                            <?php }?>






                        </div>
                    </div>
                    <!--- Table end -->


                </div>

              
               
            </div>
            <!--Row end-->


        </div>
    </main>


    <form action="<?php echo base_url()?>Report/legacy_change" style="display:none;" method="post">
        <input type="text" name="legacy" >
        <input type="text" name="range" value="Day">
        <input type="text" name="appraiser" value="<?php echo $app_id;?>">
        <input type="text" name="client" value="<?php echo $cl_id;?>">

        <button type="submit" id="formLegacy">submit</button>
        <input type="submit" >
    </form>



    <form action="<?php echo base_url()?>Report/legacy_detail" method="post" style="display:none">
        <input type="text" name="legacyDetail" >
        <input type="text" name="dateDetail" >
        <input type="text" name="rangeDetail" value="Day">
        <input type="text" name="appraiserDetail" value="<?php echo $app_id;?>">
        <input type="text" name="clientDetail" value="<?php echo $cl_id;?>">

        <button type="submit" id="formLegacyDetail">submit</button>

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

    function legacyChange (){
        $('input[name=legacy').val($('select[name=legacyPipeline]').val())

        $("#formLegacy").click();
        // formLegacy
    }   
    function range(r){
        l = $('select[name=legacyPipeline]').val();
        $('input[name=legacy').val(l)

        $('input[name=range').val(r)
        $("#formLegacy").click();
    }

    function range_app(r){
        $('input[name=range').val(r)
        $('input[name=appRange').val(r)
        $('input[name=legacy').val($('select[name=legacyPipeline]').val())
        if($('select[name=app_list]').val() != ""){
            $("#formLegacy").click();
        }
    }    

    function appraiserSearch(){

        $('input[name=appraiser').val($('select[name=app_list]').val());
        $('input[name=legacy').val($('select[name=legacyPipeline]').val())
        $("#formLegacy").click();
        
    }

    function range_cl(r){
        $('input[name=range').val(r)
        $('input[name=clRange').val(r)
        $('input[name=legacy').val($('select[name=legacyPipeline]').val())
        if($('select[name=cl_list]').val() != ""){
            $("#formLegacy").click();
        }
    }    

    function clientSearch(){

        $('input[name=client').val($('select[name=cl_list]').val());
        $('input[name=legacy').val($('select[name=legacyPipeline]').val())
        $("#formLegacy").click();
        
    }


    function legacy_detail(dat,r){
        
        $('input[name=dateDetail').val(dat);
        $('input[name=rangeDetail').val(r);
        $('input[name=legacyDetail').val($('select[name=legacyPipeline]').val());


        if(r == "Week"){
            curr = new Date(dat);
            var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
            var last = first + 6; // last day is the first day + 6

            var firstday = new Date(curr.setDate(first)).toUTCString();
            var lastday = new Date(curr.setDate(last)).toUTCString();

            d = new Date(firstday);
            gd = d.getDate();
            if(gd <10){gd = "0" + gd;}
            gm = d.getMonth();
            gm+=1;
            if(gm <10){gm = "0" + gm;}
            gy = d.getFullYear();
            firstday = gy + "/" + gm + "/" + gd ;

            d = new Date(lastday);
            gd = d.getDate();
            if(gd <10){gd = "0" + gd;}
            gm = d.getMonth();
            gm+=1;
            if(gm <10){gm = "0" + gm;}
            gy = d.getFullYear();
            lastday = gy + "/" + gm + "/" + gd ;

            $('input[name=dateDetail').val(firstday + "," + lastday);
        }else if(r == "Month"){

            d = new Date(dat);
            gm = d.getMonth();
            gm+=1;
            if(gm <10){gm = "0" + gm;}
            gy = d.getFullYear();

            // console.log(gy + "/" + gm);

            $('input[name=dateDetail').val(gy + "/" + gm);
        }else if (r == "Quarter"){
            d = new Date(dat);
            gm = d.getMonth();
            
            fm = "", lm = "";
            if(gm>=0 && gm<=2){ fm="01"; lm="03"; }
            else if(gm>=3 && gm<=5){ fm="04"; lm="06"; }
            else if(gm>=6 && gm<=8){ fm="07"; lm="09"; }
            else if(gm>=9 && gm<=11){ fm="10"; lm="12"; }

            gy = d.getFullYear();
            $('input[name=dateDetail').val(gy+"/"+fm + "/"+"01" +"," + gy+"/"+lm + "/"+"31" );

        }else if (r == "Year"){
            d = new Date(dat);
            $('input[name=dateDetail').val(d.getFullYear());
        }


        if($('select[name=legacyPipeline]').val() == "Appraiser"){
            $('input[name=appraiserDetail').val($('select[name=app_list]').val());
        }else if($('select[name=legacyPipeline]').val() == "Client"){            
            $('input[name=clientDetail').val($('select[name=cl_list]').val());
        }
        
        

        $("#formLegacyDetail").click();

    }

    
         $("#Table_office").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
            "columns": [
                { "data": "day" },
                { "data": "total" },
                <?php if($this->session->userdata['loggedUser']['user_role'] == "owner"){ ?> 
                { "data": "revenue" },
                { "data": "expense" },
                { "data": "net" }
                <?php } ?>
            ],
            "order": [],
            "columnDefs": [
            { "orderable": false, "targets": 0 }
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