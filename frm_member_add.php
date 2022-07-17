<?php
session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
    include("connect.php");
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    $status = $_SESSION["status"];

    // $sql = "SELECT * FROM indicators_user where name NOT IN ('ADMIN','Admin','admin','USER','User','user'); ";
    // $result = mysqli_query($conn, $sql);
    $sql = "SELECT * FROM indicators_user ";
    $result = mysqli_query($conn, $sql);

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>ระบบรายงานตัวชี้วัด</title>

        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="css/fonts.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <!-- Custom styles for this page -->
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="img/LOGO-PKPM.png" />

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php if ($status == "0") {
                include('admin_menu.php');
            } else {
                include('user_menu.php');
            } ?>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <?php include('navbar.php'); ?>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">เพิ่มข้อมูลสมาชิก</h1><br>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">

                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="sql_member.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                        <div class="container text-dark " style="width: 60%; height: auto;">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">ชื่อ:</label>
                                                <input name="name" id="name" class="form-control" required type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">username:</label>
                                                <input name="username" id="name" class="form-control" onkeypress="isInputPassword(event)" required type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">password:</label>
                                                <input name="password" id="password" class="form-control" onkeypress="isInputPassword(event)" required type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">สถานะ:</label>
                                                <label for="recipient-name" class="col-form-label">ผู้ดูแลระบบ:</label>
                                                <input type="radio" name="status" id="status" value="0" />&nbsp;&nbsp;
                                                <label for="recipient-name" class="col-form-label">ผู้ใช้ทั่วไป:</label>
                                                <input type="radio" name="status" id="status" value="1" checked="checked" />
                                            </div>
                                            <div class="footer d-flex justify-content-center">
                                                <button class="btn btn-success btn-lg" type="submit" name="btnsave" id="btnsave" value="บันทึก">บันทึก</button>&nbsp;
                                                <button class="btn btn-danger btn-lg" type="button" onClick="window.history.back()" name="btnBack" id="btnBack" value="กลับ">กลับ</button>
                                                <!-- <button class="btn btn-danger" type="reset" onclick="window.history.back()" name="btnCancel" id="btnCancel" value="ยกเลิก">ยกเลิก</button> -->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
                <!-- Footer -->
                <?php include('footer.php'); ?>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->
        <?php include('frm_logout.php'); ?>
        <!-- Scroll to Top Button-->
        <?php include('scr.php'); ?>

    </body>

    </html>
<?php
} else {
    echo "<script> alert('Please Login'); window.location='frm_login.php';
	</script>";
    exit();
}
?>