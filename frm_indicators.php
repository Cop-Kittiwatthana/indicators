<?php
session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
    include("connect.php");
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    $status = $_SESSION["status"];

    $sql = "SELECT indicators_sum.* FROM indicators_sum 
    group by indicators_year";
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
        <meta http-equiv="refresh" content="60"/>

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
                        <h1 class="h3 mb-2 text-gray-800">รายงานข้อมูลตัวชี้วัดแผนยุทธศาสตร์</h1><br>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    <!-- <a href="frm_addyear.php"><span class="btn btn-sm btn-primary fa fas-plus float-right "><i class="fas fa-plus"> เพิ่มปีงบประมาณ </i></a> -->

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                                        เพิ่มปีงบประมาณ
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มปี</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="sqlyear.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <br>
                                                            <?php $date = date('Y') + 543; ?>
                                                            <label for="provinces_name_th" class="col-form-label">ปี:</label>
                                                            <select class="form-control" name="indicators_year" id="indicators_year" oninvalid="this.setCustomValidity('กรุณาเลือกสถานประกอบกา')" oninput="setCustomValidity('')">
                                                                <option value="<?= $date ?>" selected> <?= $date ?> </option>
                                                                <?php for ($i = 1; $i < 3; $i++) {
                                                                    $de_year = date('Y', strtotime($i . 'year')); ?>
                                                                    <option value="<?= $de_year + 543 ?>"><?= $de_year + 543 ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <!-- <input class="form-control" placeholder="-กรอกปี-" onkeypress="isInputChar(event)" required type="text" name="indicators_year" id="indicators_year"> -->
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-success btn-lg" type="submit" name="btnsave" id="btnsave" value="บันทึก">บันทึก</button>
                                                        <button class="btn btn-danger btn-lg" data-dismiss="modal" type="reset" name="btnCancel" id="btnCancel" value="ยกเลิก">ยกเลิก</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </h6>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <td align="center" width="10%">ลำดับ</td>
                                                <td align="center" width="30%">ชื่อผู้ประเมิน</td>
                                                <td align="center" width="10%">ปี</td>
                                                <td align="center" width="10%">ไตรมาส 1</td>
                                                <td align="center" width="10%">ไตรมาส 2</td>
                                                <td align="center" width="10%">ไตรมาส 3</td>
                                                <td align="center" width="10%">ไตรมาส 4</td>
                                                <td align="center" width="10%">รายงาน</td>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($rs = mysqli_fetch_array($result)) {
                                                for ($x = 1; $x <= 4; $x++) {
                                                    $query_sum = "SELECT * FROM indicators_sum where indicators_year = '$rs[indicators_year]' 
                                                and indicators_quarter = '$x'";
                                                    $result_sum = mysqli_query($conn, $query_sum) or die("3.ไม่สามารถประมวลผลคำสั่งได้") . $mysqli_error;
                                                    while ($row = mysqli_fetch_array($result_sum)) {  // preparing an array
                                                        $n1[$x] = "$row[n1]";
                                                        $n2[$x] = "$row[n2]";
                                                        $n3[$x] = "$row[n3]";
                                                        $n4[$x] = "$row[n4]";
                                                        $n5[$x] = "$row[n5]";
                                                        $n6[$x] = "$row[n6]";
                                                        $n7[$x] = "$row[n7]";
                                                        $n8[$x] = "$row[n8]";
                                                        $n9[$x] = "$row[n9]";
                                                        $n10[$x] = "$row[n10]";
                                                        $n11[$x] = "$row[n11]";
                                                        $n12[$x] = "$row[n12]";
                                                        $n13[$x] = "$row[n13]";
                                                        $n14[$x] = "$row[n14]";
                                                        $n15[$x] = "$row[n15]";
                                                        $n16[$x] = "$row[n16]";
                                                        $n17[$x] = "$row[n17]";
                                                        $n18[$x] = "$row[n18]";
                                                        $n19[$x] = "$row[n19]";
                                                        $n20[$x] = "$row[n20]";
                                                        $n21[$x] = "$row[n21]";
                                                        $n22[$x] = "$row[n22]";
                                                        $n23[$x] = "$row[n23]";
                                                        $n24[$x] = "$row[n24]";
                                                        $n25[$x] = "$row[n25]";
                                                        $n26[$x] = "$row[n26]";
                                                        $n27[$x] = "$row[n27]";
                                                        $n28[$x] = "$row[n28]";
                                                        $n29[$x] = "$row[n29]";
                                                        $n30[$x] = "$row[n30]";
                                                        $n31[$x] = "$row[n31]";
                                                        $n32[$x] = "$row[n32]";
                                                    }
                                                }

                                            ?>
                                                <tr>
                                                    <td align="center" width="10%"><?php echo "$i"; ?></td>
                                                    <td align="center" width="30%"><?php echo "$rs[indicators_name]"; ?></td>
                                                    <td align="center" width="10%"><?php echo "$rs[indicators_year]"; ?></td>

                                                    <td align="center" width="10%"><?php echo "<a href=\"frm_strategic_plan.php?id=$rs[indicators_year]&&id2=1 \">";
                                                                                    if (
                                                                                        $n1[1] != "0" && $n2[1] != "0" && $n3[1] != "0" && $n4[1] != "0" && $n5[1] != "0" && $n6[1] != "0"
                                                                                        && $n7[1] != "0" && $n8[1] != "0" && $n9[1] != "0" && $n10[1] != "0" && $n11[1] != "0" && $n12[1] != "0"
                                                                                        && $n13[1] != "0" && $n14[1] != "0" && $n15[1] != "0" && $n16[1] != "0" && $n17[1] != "0" && $n18[1] != "0"
                                                                                        && $n19[1] != "0" && $n20[1] != "0" && $n21[1] != "0" && $n22[1] != "0" && $n23[1] != "0" && $n24[1] != "0"
                                                                                        && $n25[1] != "0" && $n26[1] != "0" && $n27[1] != "0" && $n28[1] != "0" && $n29[1] != "0" && $n30[1] != "0"
                                                                                        && $n31[1] != "0" && $n32[1] != "0"
                                                                                    ) { ?>
                                                            <img src="img/correct.png" width="30" height="30" id="O"><?php } else { ?>
                                                            <img src="img/warning.png" width="30" height="30" id="O"> <?php }
                                                                                                                    echo "</a>"; ?>
                                                    </td>
                                                    <td align="center" width="10%"><?php echo "<a href=\"frm_strategic_plan.php?id=$rs[indicators_year]&&id2=2 \">";
                                                                                    if (
                                                                                        $n1[2] != "0" && $n2[2] != "0" && $n3[2] != "0" && $n4[2] != "0" && $n5[2] != "0" && $n6[2] != "0"
                                                                                        && $n7[2] != "0" && $n8[2] != "0" && $n9[2] != "0" && $n10[2] != "0" && $n11[2] != "0" && $n12[2] != "0"
                                                                                        && $n13[2] != "0" && $n14[2] != "0" && $n15[2] != "0" && $n16[2] != "0" && $n17[2] != "0" && $n18[2] != "0"
                                                                                        && $n19[2] != "0" && $n20[2] != "0" && $n21[2] != "0" && $n22[2] != "0" && $n23[2] != "0" && $n24[2] != "0"
                                                                                        && $n25[2] != "0" && $n26[2] != "0" && $n27[2] != "0" && $n28[2] != "0" && $n29[2] != "0" && $n30[2] != "0"
                                                                                        && $n31[2] != "0" && $n32[2] != "0"
                                                                                    ) { ?>
                                                            <img src="img/correct.png" width="30" height="30" id="O"><?php } else { ?>
                                                            <img src="img/warning.png" width="30" height="30" id="O"> <?php }
                                                                                                                    echo "</a>"; ?>
                                                    </td>
                                                    <td align="center" width="10%"><?php echo "<a href=\"frm_strategic_plan.php?id=$rs[indicators_year]&&id2=3 \">";
                                                                                    if (
                                                                                        $n1[3] != "0" && $n2[3] != "0" && $n3[3] != "0" && $n4[3] != "0" && $n5[3] != "0" && $n6[3] != "0"
                                                                                        && $n7[3] != "0" && $n8[3] != "0" && $n9[3] != "0" && $n10[3] != "0" && $n11[3] != "0" && $n12[3] != "0"
                                                                                        && $n13[3] != "0" && $n14[3] != "0" && $n15[3] != "0" && $n16[3] != "0" && $n17[3] != "0" && $n18[3] != "0"
                                                                                        && $n19[3] != "0" && $n20[3] != "0" && $n21[3] != "0" && $n22[3] != "0" && $n23[3] != "0" && $n24[3] != "0"
                                                                                        && $n25[3] != "0" && $n26[3] != "0" && $n27[3] != "0" && $n28[3] != "0" && $n29[3] != "0" && $n30[3] != "0"
                                                                                        && $n31[3] != "0" && $n32[3] != "0"
                                                                                    ) { ?>
                                                            <img src="img/correct.png" width="30" height="30" id="O"><?php } else { ?>
                                                            <img src="img/warning.png" width="30" height="30" id="O"> <?php }
                                                                                                                    echo "</a>"; ?>
                                                    </td>
                                                    <td align="center" width="10%"><?php echo "<a href=\"frm_strategic_plan.php?id=$rs[indicators_year]&&id2=4 \">";
                                                                                    if (
                                                                                        $n1[4] != "0" && $n2[4] != "0" && $n3[4] != "0" && $n4[4] != "0" && $n5[4] != "0" && $n6[4] != "0"
                                                                                        && $n7[4] != "0" && $n8[4] != "0" && $n9[4] != "0" && $n10[4] != "0" && $n11[4] != "0" && $n12[4] != "0"
                                                                                        && $n13[4] != "0" && $n14[4] != "0" && $n15[4] != "0" && $n16[4] != "0" && $n17[4] != "0" && $n18[4] != "0"
                                                                                        && $n19[4] != "0" && $n20[4] != "0" && $n21[4] != "0" && $n22[4] != "0" && $n23[4] != "0" && $n24[4] != "0"
                                                                                        && $n25[4] != "0" && $n26[4] != "0" && $n27[4] != "0" && $n28[4] != "0" && $n29[4] != "0" && $n30[4] != "0"
                                                                                        && $n31[4] != "0" && $n32[4] != "0"
                                                                                    ) { ?>
                                                            <img src="img/correct.png" width="30" height="30" id="O"><?php } else { ?>
                                                            <img src="img/warning.png" width="30" height="30" id="O"> <?php }
                                                                                                                    echo "</a>"; ?>
                                                    </td>
                                                    <td align="center" width="10%"><?php echo "<a href=\"frm_strategic_plan.php?id=$rs[indicators_year]&&id2=5 \">"; ?>
                                                        <button type="button" class="btn btn-info">รายงาน</button><?php echo "</a>"; ?>
                                                    </td>
                                                </tr>

                                            <?php
                                                $i++;
                                            }

                                            ?>
                                        </tbody>

                                    </table>
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