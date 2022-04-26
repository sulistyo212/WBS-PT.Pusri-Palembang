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
                    <a class="dropdown-toggle" data-toggle="dropdown" href="<?= base_url('login_Admin/logout');?>">
                        <i class="btn btn-danger">LOGOUT</i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?= base_url('login_Admin/logout');?>">Logout</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
  </header>
<body style="background-image:url('<?php echo base_url()?>/images/bg-blue.jpg');">
   <section id="contact">
    <div class="container">
      <div class="row">
       <!--  <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `adminmenu`.id,`menu`
                      FROM `adminmenu` JOIN `admin_access_menu`
                      ON `adminmenu`.id = `admin_access_menu`.`menu_id`
                      WHERE `admin_access_menu`.`role_id` = $role_id
                      ORDER BY `admin_access_menu`.`menu_id` ASC
        ";
          $menu = $this->db->query($queryMenu)->result_array();
        ?> -->
                <!-- Page Header -->
      <div class="col-lg-10">
        <h1 class="page-header" style="color: #ffffff ; margin-top: -1%">Tables Pelaporan</h1>

          </div>
            </div>
      <div class="row">
        <div class="col-lg-12">
                    <!-- Advanced Tables -->
          <div class="panel panel-default">
            <div class="panel-heading">
              Advanced Tables
            </div>
 <div class="col-lg-10">
                    <h1 class="page-header"></h1>
                </div>   
            <div class="panel-body">
              <div class="table-responsive">
                  
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                   <thead>
                     <tr>

                        <th>No</th> 
                          <th>ID User</th>
                            <th>No Pelaporan</th>
                              <th>Jenis Pelaporan</th>
                                <th>Waktu Pelaporan</th>
                              <th>Status Pelaporan</th>
                              <th>Bukti</th>
                            <th>Edit</th>
                    </tr>
                   </thead>

                <tbody>
                    <?php if($semua_pengguna->num_rows() > 0): ?>
                      <?php $index = 1; ?>
                        <?php foreach($semua_pengguna->result() as $data_laporan): ?>
                <tr>
                
                 <td style="text-align: center;"><?php echo $index++; ?></td>

                  <td>
                    <a href = "admin/lihatdetailadm/<?php echo $data_laporan->kode_unik; ?>">
                    <?= $data_laporan->kode_unik; ?>
                  </td>
                        <td>
                          <?php echo $data_laporan->no_pelaporan;?></td>
                    <td><?php echo $data_laporan->jenis_pelaporaan;?></td>
                      <td><?= $data_laporan->date_created;?></td>
                          <td><?= $data_laporan->statuspelaporan;?></td>
                       <td> <a href="user/download">
                          <?php echo $data_laporan->foto; ?> </td>
                 <td>
                  <a class="btn btn-xs btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $data_laporan->kode_unik;?>">Status Laporan</a>
                  <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal_comment<?php echo $data_laporan->kode_unik;?>"> Comment</a>  
                </td>
                </tr>
                    
               <?php endforeach; ?>
                <?php else: ?>
               
               <tr>
                    
               <td colspan="6" style="text-align: center;">Data tidak tersedia</td>
               
               </tr>
               <?php endif; ?>
            </tbody>                    
            </table>
              <br>
              <br>
                  <div style="float: right;">
                    <form action="<?= base_url('laporanpdf');?>">
                      <button class="btn btn-xs btn-info" >cetak laporan</button></form>
                        </div>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
        </div>
        </div>

      <?php
        foreach($semua_pengguna->result_array() as $i):
            $kode_unik=$i['kode_unik'];
            $statuspelaporan=$i['statuspelaporan'];?>   
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/editstatus'?>">
            <div class="row">
              <div class="modal fade" id="modal_edit<?= $kode_unik;?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
       
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Edit Status</h3>
                    </div>
        
                <div class="modal-body">       
                  <div class="form-group">
                    <label class="control-label col-xs-3" >Kode Unik</label>
                      <div class="col-xs-8">
                        <input name="kode_unik" value="<?php echo $kode_unik;?>" class="form-control" type="text" placeholder="Kode Barang..." readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-xs-3" >Status Pelaporan </label>
                        <div class="col-xs-8">   
                          <input type="radio" name="statuspelaporan" value="Sudah di proses"> Sudah di terima<br>
                          <input type="radio" name="statuspelaporan" value="Sudah di proses"> Sudah selesai<br>
                          
                          
                          <input type="radio" name="statuspelaporan" value="Sudah di proses"> Sudah di proses<br>
                            <input type="radio" name="statuspelaporan" value="Laporan Tidak Memenuhi Kriteria"> Laporan tidak memenuhi kriteria
                            <br>
                            </div>
                          </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Update</button>
                </div>
                  </div>
                    </div>




                      </div>
                        </div>
                          </div>
                            </form>
                              <?php endforeach;?>
<!--END MODAL ADD BARANG-->

<!-- comment -->

      <?php
        foreach($semua_pengguna->result_array() as $i):
         $kode_unik=$i['kode_unik'];
          $statuspelaporan=$i['statuspelaporan'];?>   
           
        <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/editkomentar'?>">
         <div class="row">
          <div class="modal fade" id="modal_comment<?= $kode_unik;?>">
           <div class="modal-dialog">
            <div class="modal-content">
             <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                 <h3 class="modal-title" id="myModalLabel">Edit Status</h3>
             </div>     

                <div class="modal-body">
                  <div class="form-group">
                    <label class="control-label col-xs-3" >Kode Unik</label>
                      <div class="col-xs-8">
                        <input name="kode_unik" value="<?php echo $kode_unik;?>" class="form-control" type="text" placeholder="Kode Barang..." readonly>
                      </div>
                        </div>

                    <div class="form-group">
                      <label class="control-label col-xs-3" >Komentar </label>
                        <div class="col-xs-8">   
                          <input type="text" name="komentar" class="form-control"> <br>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Update</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </form>

        <?php endforeach;?>
        </section> 
        <!-- end page-wrapper -->

    <!-- end wrapper -->
 <footer id="footer">
    <div class="footer-bottom">
      <br>
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
