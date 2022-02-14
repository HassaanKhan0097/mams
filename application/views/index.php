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
                    <!-- <?php if($this->session->userdata['loggedUser']['user_role'] == "owner"){ echo "Yes";}else{echo "No";} ?> -->
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
                <!-- col-xl-4 col-lg-4 -->
                <div class=" mb-4 home_card custom_col_4" >
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">By Status</h5>
                            <table class="-standard responsive nowrap table table-bordered byStatus">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Total Files</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- data-order="[[ 1, &quot;desc&quot; ]]"
                                    data-table data-table
                                 -->
                                    
                                <?php
                                // echo "<pre>";
                                // print_r($by_status);
                                    foreach($by_status as $bs){
                                        
                                        


                                        ?>
                                    

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
            <!-- col-xl-6 col-lg-6  -->
                <div class="mb-4 home_card custom_col_4" style="width: 19%">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">By Appraiser</h5>
                            <table class="data-table data-table-standard responsive nowrap table table-bordered byAppraiser"
                                data-order="[[ 1, &quot;desc&quot; ]]">
                                <thead>
                                    <tr>
                                        <th id="by_appraiser_th">By Appraiser</th>
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
                <div class="mb-4 home_card custom_col_4"  style="width: 28%">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">By Client</h5>
                            <table class="data-table data-table-standard responsive nowrap table table-bordered byClient"
                                data-order="[[ 1, &quot;desc&quot; ]]">
                                <thead>
                                    <tr>
                                        <th id="by_client_th">Client</th>
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
                
                <!-- <tr>
                                            <td>
                                                <p class="list-item-heading"><a href="<?php echo base_url(); ?>order/byduedate/<?php echo strtotime($bdd->order_duedate); ?>"> <u><?php echo $bdd->order_duedate; ?></u> </a></p>
                                                
                                            </td>
                                            <td>
                                                <p class="text-muted"><?php echo $bdd->files; ?></p>
                                            </td>
                                        </tr> -->

                                             <!-- <input type="text" id="st" value="<?php echo $bdd->order_status_id; ?>" style="display:none;">
                                        <input type="text" id="app" value="<?php echo $bdd->order_appraiser_id; ?>" style="display:none;">
                                        <input type="text" id="cl" value="<?php echo $bdd->order_client_id; ?>" style="display:none;"> -->

                                <!-- <script>                                       
                                        duedate = <?php echo $bdd->order_duedate; ?>
                                        status = <?php echo $bdd->order_status_id; ?>
                                        appraiser = <?php echo $bdd->order_appraiser_id; ?>
                                        client = <?php echo $bdd->order_client_id; ?>



                                </script> -->


                <!-- col-xl-4 col-lg-4  -->
                <!-- data-table data-table-standard -->
                <div class="mb-4 home_card custom_col_6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">By Due Date</h5>
                            <table class="data-table data-table-standard responsive nowrap table table-bordered byDuedate"
                                data-order="[[ 1, &quot;desc&quot; ]]">
                                <thead>
                                    <tr>
                                        <th id="byduedateid">Date Due</th>
                                        <th>Total Files</th>
                                    </tr>
                                </thead>
                                <tbody>


                                
                                <script>
                                var duedate = status = appraiser = client = [];
                                </script>

                                    

                                <?php
                                    $dd = $st = $app = $cl = "";
                                    foreach($by_due_date as $bdd){ ?>



                                        <?php
                                        

                                        $dd .=  "," . $bdd->order_duedate;
                                        $st .=  "," . $bdd->order_status_id;
                                        $app .=  "," . $bdd->order_appraiser_id;
                                        $cl .=  "," . $bdd->order_client_id;

                               
                                    }?>


                                <input type="text" id="dd" value="<?php echo $dd; ?>" style="display:none">
                                <input type="text" id="st" value="<?php echo $st; ?>"  style="display:none">
                                <input type="text" id="app" value="<?php echo $app; ?>"  style="display:none">
                                <input type="text" id="cl" value="<?php echo $cl; ?>" style="display:none">
                                <input type="text" id="base_url" value="<?php echo base_url(); ?>" style="display:none">
                                

                                

                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- col-xl-4 col-lg-4  -->
                <div class="mb-4 home_card custom_col_6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">By Action Required</h5>
                            <table class="data-table data-table-standard responsive nowrap table table-bordered"
                                data-order="[[ 1, &quot;desc&quot; ]]">
                                <thead>
                                    <tr>
                                        <th>Action Required</th>
                                        <th class="d-none">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                    foreach($by_action_required as $bar){?>
                                        <tr>
                                            <td>
                                                <p class="list-item-heading"><a href="<?php echo base_url(); ?>order/update/<?php echo $bar->order_number; ?>"> <u><?php echo $bar->order_number; ?></u> </a></p>
                                                
                                            </td>
                                            <td class="d-none"">
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

    <script>
   
   setTimeout(function(){
 	// alert("Sup!"); 
     $("#by_appraiser_th").click();
     $("#by_client_th").click();

}, 700);//wait 2 seconds
        // $(window).on('load', function() {
        // });

                                duedate = $("#dd").val();
                                status = $("#st").val();
                                appraiser = $("#app").val();
                                client = $("#cl").val();

                                duedate = duedate.substring(1).split(",");
                                sta = status.substring(1).split(",");
                                appraiser = appraiser.substring(1).split(",");
                                client = client.substring(1).split(",");

                                const d = new Date();
                                var m = d.getMonth()+1; m = m.toString();
                                if(m.length == 1){m= "0"+m;}
                                var dt = d.getDate(); dt = dt.toString();
                                if(dt.length == 1){dt= "0"+dt;}
                                var y = d.getFullYear();
                                currDate = m + "/" + dt + "/" + y;

                                orange = [];
                                red = [];

                                duedate.forEach((item, index)=>{

                                    if(item == currDate){
                                        orange.push(index);
                                    }
                                    if(sta[index] == '13'){
                                        orange.push(index);
                                    }
                                    var selectedDate = new Date(item);                                   
                                    d.setHours(0,0,0,0);
                                    if (selectedDate < d) {
                                        red.push(index);
                                    }
                                                                              

                                })

                              /*
                                ====================================== 
                                STATUS STARTING
                                ======================================
                              */
                                temp_st = [];
                                temp_st_red = [];
                                orange.forEach((item, index)=>{
                                    temp_st.push(sta[item]);
                                })
                                red.forEach((item,index)=>{
                                    temp_st_red.push(sta[item]);
                                })
                             
                                $(".byStatus tbody tr td p.list-item-heading a u").each(function() {                                                                         
                                    st = $(this).closest('a')[0].href.split("/");
                                    st = st[st.length -1]; 
                                    
                                    if(temp_st.includes(st)){ $(this).css("color","#F6931D"); } 
                                    if(temp_st_red.includes(st)){ $(this).css("color","red"); } 
                                });
                                /*
                                ====================================== 
                                STATUS ENDING
                                ======================================
                              */



                              /*
                                ====================================== 
                                APPRAISER STARTING
                                ======================================
                              */       

                              temp_app = [];
                                temp_app_red = [];
                                orange.forEach((item, index)=>{
                                    temp_app.push(appraiser[item]);
                                })
                                red.forEach((item,index)=>{
                                    temp_app_red.push(appraiser[item]);
                                })

                                $(".byAppraiser tbody tr td p.list-item-heading a u").each(function() { 
                                    app = $(this).closest('a')[0].href.split("/");
                                    app = app[app.length -1];  
                                   
                                    if(temp_app.includes(app)){
                                        $(this).css("color","#F6931D");
                                    } 
                                    if(temp_app_red.includes(app)){
                                        $(this).css("color","red");
                                    } 
                                });
                                /*
                                ====================================== 
                                APPRAISER ENDING
                                ======================================
                              */


                              /*
                                ====================================== 
                                CLIENT STARTING
                                ======================================
                              */
                              temp_cl = [];
                                temp_cl_red = [];
                                orange.forEach((item, index)=>{

                                    temp_cl.push(client[item]);
                                })
                                red.forEach((item,index)=>{
                                    temp_cl_red.push(client[item]);
                                })

                                $(".byClient tbody tr td p.list-item-heading a u").each(function() { 

                                   
                                    // console.log($(this).closest("a")[0].href.split("/"));
                                    cl = $(this).closest('a')[0].href.split("/");
                                    
                                    cl = cl[cl.length -1];  
                                   
                                    if(temp_cl.includes(cl)){
                                        // console.log("app==> ", app)
                                        $(this).css("color","#F6931D");
                                    } 
                                    if(temp_cl_red.includes(cl)){
                                        $(this).css("color","red");
                                    } 
                                });
                                /*
                                ====================================== 
                                CLIENT ENDING
                                ======================================
                              */


                                /*
                                ====================================== 
                                DUE DATE STARTING
                                ======================================
                              */

                              temp_dd = [];
                                temp_dd_red = [];
                                orange.forEach((item, index)=>{

                                    temp_dd.push(duedate[item]);
                                })
                                red.forEach((item,index)=>{
                                    temp_dd_red.push(duedate[item]);
                                })


                              var dd_count = {};
                              duedate.forEach(function(x) { dd_count[x] = (dd_count[x] || 0)+1; });

                              for (var element in dd_count) {
                                console.log(element + ' = ' + dd_count[element]);

                                style = "";

                                if(temp_dd.includes(element)){
                                    style="color:#F6931D";
                                } 
                                if(temp_dd_red.includes(element)){
                                    style="color:red";
                                } 



                                // if(element == currDate){
                                //     style="color:#F6931D";
                                //     }
                                    
                                //     var selectedDate = new Date(element);                                   
                                //     d.setHours(0,0,0,0);
                                //     if (selectedDate < d) {
                                //         style="color:red";
                                //     }style="`+style+`"
                                var str = element + " GMT"
                                // var strtotime =new Date(element).getTime();
                                strtotime =  Date.parse(str) / 1000;

                                var base_url = $("#base_url").val();
                                // document.write(d.getTime() + " milliseconds since 1970/01/01");

                                $(".byDuedate tbody").append(`
                                <tr>
                                    <td>
                                        <p class="list-item-heading"><a href="`+base_url+`order/byduedate/`+strtotime+`"> <u style="`+style+`">`+element+`</u> </a></p>
                                        
                                    </td>
                                    <td>
                                        <p class="text-muted">`+dd_count[element]+`</p>
                                    </td>
                                </tr>
                                `);

                                } 

                                $(".byDuedate").DataTable({
                                    bLengthChange: false,
                                    searching: false,
                                    destroy: true,
                                    info: false,
                                    sDom: '<"row view-filter"<"col-sm-12"<"float-left"l><"float-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
                                    pageLength: 6,
                                    language: {
                                    paginate: {
                                        previous: "<i class='simple-icon-arrow-left'></i>",
                                        next: "<i class='simple-icon-arrow-right'></i>"
                                    }
                                    },
                                    drawCallback: function () {
                                    $($(".dataTables_wrapper .pagination li:first-of-type"))
                                        .find("a")
                                        .addClass("prev");
                                    $($(".dataTables_wrapper .pagination li:last-of-type"))
                                        .find("a")
                                        .addClass("next");

                                    $(".dataTables_wrapper .pagination").addClass("pagination-sm");
                                    }
                                });



                                

                                $(".byDuedate tbody tr td p.list-item-heading a u").each(function() { 

                                   // $(".byDuedate tbody tr td p.list-item-heading a u").each(function() { console.log( $(this)[0].innerHTML) });

                                    dd_style = $(this)[0].innerHTML;

                                    
                                    
                                // console.log($(this).closest("a")[0].href.split("/"));
                                // dd = $(this).closest('a')[0].href.split("/");

                                // dd = dd[dd.length -1];  

                                // if(temp_dd.includes(dd)){
                                //     // console.log("app==> ", app)
                                //     $(this).css("color","#F6931D");
                                // } 
                                // if(temp_dd_red.includes(dd)){
                                //     $(this).css("color","red");
                                // } 
                                });


                              $("#byduedateid").click();




                               /*
                                ====================================== 
                                DUE DATE ENDING
                                ======================================
                              */
                                
                                </script>
</body>

</html>