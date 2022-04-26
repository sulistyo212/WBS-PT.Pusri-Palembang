<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUSRI - WHISTLE BLOWING SYSTEM</title>
    <!-- Core CSS - Include with every page -->
        <link rel="shortcut icon" type="image/icon" href="<?php echo base_url()?>/images/logopusri.png"/>
    <link href="<?php echo base_url()?>/assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>/assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>/assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>/assets/css/main-style.css" rel="stylesheet" />
        <link href="<?php echo base_url()?>/css/style.css" rel="stylesheet">
    <!-- Page-Level CSS -->
     <link href="<?php echo base_url()?>/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
   <header id="footer" style="color: #ffffff; font-size: 160%" >
  <div class="col-md-20 col-sm-9 col-xs-16">
          <div class="wow fadeInLeft">
                <div class="row" style="margin-top: 2% ; margin-bottom: 1% ; margin-left: 3%"  >
             <img src="<?php echo base_url()?>/images/logopusri.png" width="70px" height="100%"> Pusri Whistle Blower Sistem
           </div></div>
      </div>
             <ul style="float: right;margin-right: 4%; margin-top: 3%">
                    <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="btn btn-danger">KEMBALI</i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?= base_url('admin');?>"><i class="fa fa-sign-out fa-fw"></i>Kembali</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
         
  </header>
<body style="background-image:url('<?php echo base_url()?>/images/bg-blue.jpg');">
    <div class="container";>
      <div class>
        
        
        <!-- query menu -->

    
<br>
                <div class="col-lg-10">
                    <h1 style="color: #ffffff">Tables Pelaporan</h1>
                </div>
                <!--End Page Header -->

    
                 <!-- end  page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                           <div class="panel-heading">
                           
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                              <ul>
                            
                              </ul>

                           <?php if($semua_penggunaa->num_rows() > 0): ?>
                           <?php $index = 1; ?>
                           <?php foreach($semua_penggunaa->result() as $file): ?>
                                          <tr>
                                            <th>Id User</th> 
                                            <td><?= $file->kode_unik;?></td>
                                          </tr>
                                          <tr>
                                            <th>
                                              No Pelaporan
                                            </th>
                                            <td>
                                              <?=$file->no_pelaporan;?>
                                            </td>
                                          </tr>
                                          <tr>     
                                            <th>Jenis Pelaporan</th>
                                            <td><?php echo $file->jenis_pelaporaan; ?></td>
                                           </tr>
                                            <tr>
                                            <th>Waktu Pelaporan</th> 
                                            <td><?php echo $file->date_created;?></td>
                                            </tr>
                                            <tr>
                                            <th>Nama Terlapor</th>
                                            <td><?php echo $file->nama_terlapor; ?></td>
                                            <tr>
                                            <th>Uraian</th>
                                            <td><?php echo $file->uraian_pelapor; ?></td>  
                                            <tr>
                                            <th>Bukti</th>  
                                             <td> 
                                              <a href="<?php echo base_url().'user/download' ?>">
                                              <?php echo $file->foto; ?>
                                            </td>
                                            <tr>
                                            <th>Status Pelaporan</th>                       
                                            <td><?= $file->statuspelaporan?></td>
                                            <tr>
                                            <th>Komentar</th>                       
                                            <td><?= $file->komentar?></td>   </tr>
                                            <tr>
                                             <th>Detail Pelanggaran</th>                       
                                            <td><?= $file->detail_pelanggaran?></td></tr>
                                            <tr>
                                             <th>Jabatan/Unit Kerja</th>                       
                                            <td><?= $file->jabatan_unitkerja?></td></tr>
                                     
                            
                 
        </tr>
                    
               <?php endforeach; ?>
          <?php else: ?>
           <tr>
                <td colspan="6" style="text-align: center;">Data tidak tersedia</td>
           </tr>
      <?php endif; ?>



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
        </section> 


        <!-- end page-wrapper -->

    </div>
  <script type="text/javascript">
   $(document).ready(function() {
    $('table.display').DataTable();
   } );
  </script>
    <!-- end wrapper -->
    <br>
    <br>
    <br>
    <br>
    <br>
 <footer id="footer">
    <div class="footer-bottom">
      <p>
        <img src="<?php echo base_url()?>/images/logopusri.png" width="20px" />
      ©Desember 2019 PT Pupuk Sriwidjaja, Palembang</a></p>
    </div>
  </footer>
    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo base_url()?>/assets/plugins/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/pace/pace.js"></script>
    <script src="<?php echo base_url()?>/assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="<?php echo base_url()?>/assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/dataTables/jquery.dataTables.js"></script>


<script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>

</body>

</html>
