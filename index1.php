<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">

    <head>
         <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>KPP Madya Pekanbaru</title>
        <!-- css table datatables/dataTables -->
        <link rel="stylesheet" href="datatables/dataTables.bootstrap.css"/>
        <link type="text/css" href="css/bootstrap.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

         <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />

    <!-- Page-Level CSS -->
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    </head>
    <body>
         <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                  KPP Madya Pekanbaru
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
              
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="assets/img/user.jpg" alt="">
                            </div>
                            <div class="user-info">
                                <div>Admin <strong></strong></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="sidebar-search">
                       
                   
                    </li>
                    <li class="">
                        <a href="awal.php"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
                   <li>
                        <a href="#"><i class="fa fa-table fa-fw"></i> Input Data<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="input.php">SPT Tahunan</a>
                            </li>
                            <li>
                                <a href="input1.php">Spt Masa</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i>Data<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="index.php">SPT Tahunan</a>
                            </li>
                            <li>
                                <a href="index1.php">SPT Masa</a>
                            </li>
                        
                        </ul>
                        <!-- second-level-items -->
                    </li>
                   
                    <li class="">
                        <a href="ceklogout.php"><i class="fa fa-wrench fa-fw"></i>Logout</a>
                    </li>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">

                            <?php
             if(isset($_GET['hal']) == 'hapus'){
				$kd_dept = $_GET['kd'];
				$cek = mysql_query("SELECT * FROM masa WHERE id='$kd_dept'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$delete = mysql_query("DELETE FROM masa WHERE id='$kd_dept'");
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
				}
			}
			?>
            <div class="row">
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                 <!-- end  page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>SPT Masa</strong> 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                    <table id="lookup" class="table table-bordered table-hover">  
                                       <thead bgcolor="#eeeeee" align="center">
                                        <tr>
	  
                                        <th>ID</th>
	                                    <th>NPWP</th>
                                        <th>Jenis Pajak </th>
                                        <th>Tahun</th>
                                        <th>Bulan</th>
                                        <th>Rincian</th>
	                                    <th class="text-center"> Action  </th> 
	  
                                       </tr>
                                     </thead>
                                        <tbody>
                                        <?php
                              
                   $sql = mysql_query("select * from masa");
                   $no = 1;
                    while ($r = mysql_fetch_array($sql)) {

                  echo "<tr>
                    <td>$r[id]</td>   
                    <td>$r[npwp]</td>
                    <td>$r[jenis]</td>
                    <td>$r[tahun]</td>
                    <td>$r[bulan]</td>
                    <td>$r[rincian]</td>
                    <td><a href='edit1.php?kd=$r[id]'><i class='menu-icon icon-pencil'></i></a> | <a href='index1.php?hal=hapus&kd=$r[id]'><i class='menu-icon icon-trash'></a></td>        
                               
                            </tr>";
                      $no++;
                    }                    
                    ?>
                                        </tbody>
                                    </table>
                                    
                                  </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
            
            </div>
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end
        <!--/.wrapper--><br />
        
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
        <script>
        $(document).ready(function() {
				var dataTable = $('#lookup').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"ajax-grid-data1.php", // json datasour
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".lookup-error").html("");
							$("#lookup").append('');
							$("#lookup_processing").css("display","none");
							
						}
					}
				} );
			} );
        </script>
      
      
    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
   <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
    </body>
</html>
