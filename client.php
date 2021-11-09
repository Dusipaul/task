<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>
<?php 
    include 'db_connect.php';
    ob_start();
  if(!isset($_SESSION['system'])){

    $system = $conn->query("SELECT * FROM system_settings")->fetch_array();
    foreach($system as $k => $v){
      $_SESSION['system'][$k] = $v;
    }
  }
  ob_end_flush();

  include 'headerclient.php' 
?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <?php include 'topbarclient.php' ?>
  <?php include 'sidebarclient.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-body text-white">
      </div>
    </div>
    <div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <?php 
            $page = isset($_GET['page']) ? $_GET['page'] : 'homeclient';
            if(!file_exists($page.".php")){
                include '404.html';
            }else{
            include $page.'.php';

            }
          ?>
      </div><!--/. container-fluid -->
    </section>
    </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 </strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b><?php echo $_SESSION['system']['name'] ?></b>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- Bootstrap -->
<?php include 'footer.php' ?>
</body>
</html>
