<?php
session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
  include("connect.php");
  $username = $_SESSION["username"];
  $password = $_SESSION["password"];
  $status = $_SESSION["status"];

  $query = "SELECT * FROM indicators_user WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_array($result)) {  // preparing an array
    $name = "$row[name]";
  }

  $year = $_GET['id'];
  $quarter = $_GET['id2'];


  if ($quarter == '5') {
    $indicators_name = 'รายงานแผนยุทธศาสตร์โรงพยาบาลค่ายพ่อขุนผาเมือง';
  } else {
    $query = "SELECT * FROM indicators_sum where indicators_year = '$year' and indicators_quarter = '$quarter' ";
    $result = mysqli_query($conn, $query) or die("3.ไม่สามารถประมวลผลคำสั่งได้") . $mysqli_error;
    while ($row = mysqli_fetch_array($result)) {  // preparing an array
      $indicators_year = "$row[indicators_year]";
      $indicators_name = "$row[indicators_name]";
    }
  }

  for ($x = 1; $x <= 4; $x++) {
    $query = "SELECT * FROM indicators_sum where indicators_year = '$year' 
    and indicators_quarter = '$x'";
    $result = mysqli_query($conn, $query) or die("3.ไม่สามารถประมวลผลคำสั่งได้") . $mysqli_error;
    while ($row = mysqli_fetch_array($result)) {  // preparing an array
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
  <!DOCTYPE html>
  <html>

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
    <!-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> -->
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/LOGO-PKPM.png" />

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <?php include('head.php'); ?>

  </head>

  <body>
    <style type="text/css">
      input[type='text'] {
        -webkit-appearance: none;
        width: 70px;
        height: 30px;
        border: 1px solid darkgray;

        outline: none;
        box-shadow: 0 0 5px 0px gray inset;
      }

      input[type='text']:hover {
        box-shadow: 0 0 5px 0px orange inset;
      }

      input[type='text']:before {
        content: '';
        display: block;
        width: 60%;
        height: 60%;
        margin: 20% auto;
        border-radius: 50%;
      }
    </style>
    </head>

    <body>
      <div class="container-fluid" style="background-color:#2C3E50">
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-xs-12 col-md-11">

          </div>
        </div>
      </div>

      <!--start article-->

      <div class="container">
        <div class="row">

          <div class="col-md-12"> <br />
            <h3 align="center">
              <br> <?= $indicators_name ?>
            </h3>
            <br>
            <form action="sql_strategic_plan.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
              <table id="myTable" width="90%" border="1" align="center" cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
                <input type="hidden" name="quarter" value="<?= $quarter ?>">
                <input type="hidden" name="year" value="<?= $year ?>">
                <input type="hidden" name="id_user" value="<?= $id_user ?>">
                <tr>
                  <td width="50%" rowspan="2" align="center" style="background-color:#DCDCDC;">
                    <br>
                    <strong>แผนยุทธศาสตร์โรงพยาบาลค่ายพ่อขุนผาเมือง</strong>
                  </td>
                </tr>
                <tr>
                  <td width="10%" align="center" style="background-color:#DCDCDC;"><strong>ไตรมาสที่ 1 </strong></td>
                  <td width="10%" align="center" style="background-color:#DCDCDC;"><strong>ไตรมาสที่ 2 </strong></td>
                  <td width="10%" align="center" style="background-color:#DCDCDC;"><strong>ไตรมาสที่ 3 </strong></td>
                  <td width="10%" align="center" style="background-color:#DCDCDC;"><strong>ไตรมาสที่ 4 </strong></td>
                  <td width="10%" align="center" style="background-color:#DCDCDC;"><strong>เฉลี่ย / รวม</strong>
                    <br>
                    <strong>รายปี</strong>
                  </td>
                </tr>
                <!-- ข้อมูลแบ่งตามข้อๆ -->
                <tr>
                  <td height="30" colspan="6" style="background-color:#F5F5F5;">&nbsp;G 1.1 การรักษาพยาบาลที่มีมาตรฐาน และก้าวทันโรค</td>
                </tr>
                <tr>
                  <td height="55%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    1. อัตราการควบคุมโรคของผู้ป่วยโรคเรื้อรังอยู่ในเกณฑ์ดี</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n1[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n1" id="n1" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n1[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n1" id="n1" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n1[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n1" id="n1" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n1[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n1" id="n1" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n1[1] + $n1[2] + $n1[3] + $n1[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="55%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    2. อัตราการดูแลผู้ป่วยกลุ่ม Emergency Fast-track ได้ตามมาตรฐานที่กำหนดไว้</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n2[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n2" id="n2" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n2[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n2" id="n2" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n2[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n2" id="n2" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n2[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n2" id="n2" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n2[1] + $n2[2] + $n2[3] + $n2[4]) / 4 ?></td>
                </tr>
                <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  3. อุบัติการณ์การเสียชีวิตโดยไม่ได้คาดคิดในโรงพยาบาล</td>
                <td width="10%" height="30" align="center"><input value="<?= $n3[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n3" id="n3" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                <td width="10%" height="30" align="center"><input value="<?= $n3[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n3" id="n3" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                <td width="10%" height="30" align="center"><input value="<?= $n3[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n3" id="n3" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                <td width="10%" height="30" align="center"><input value="<?= $n3[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n3" id="n3" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                <td width="10%" height="30" align="center"><?= ($n3[1] + $n3[2] + $n3[3] + $n3[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30" colspan="6" style="background-color:#F5F5F5;">&nbsp;G 1.2 การรักษาพยาบาลที่มีมาตรฐาน และก้าวทันโรค</td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    4. อัตราการคัดกรองโรคเรื้อรังในชุมชน</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n4[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n4" id="n4" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n4[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n4" id="n4" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n4[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n4" id="n4" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n4[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n4" id="n4" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n4[1] + $n4[2] + $n4[3] + $n4[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    5. อัตราการเกิดโรคเรื้อรังของประชากรกลุ่มเสี่ยง</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n5[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n5" id="n5" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n5[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n5" id="n5" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n5[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n5" id="n5" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n5[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n5" id="n5" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n5[1] + $n5[2] + $n5[3] + $n5[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30" colspan="6" style="background-color:#F5F5F5;">&nbsp;G 1.3 การป้องกันโรคอย่าง ทันเวลา และมีประสิทธิภาพ</td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    6. อุบัติการณ์การเสียชีวิตและพิการ จาก Heat stroke ในหน่วยทหาร</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n6[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n6" id="n6" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n6[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n6" id="n6" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n6[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n6" id="n6" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n6[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n6" id="n6" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n6[1] + $n6[2] + $n6[3] + $n6[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    7. อุบัติการณ์การเสียชีวิตด้วยโรคไข้เลือดออกในชุมชนค่ายพ่อขุนผาเมือง</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n7[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n7" id="n7" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n7[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n7" id="n7" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n7[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n7" id="n7" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n7[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n7" id="n7" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n7[1] + $n7[2] + $n7[3] + $n7[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    8. อัตราโรคระบาดได้รับการควบคุมถูกต้องทันเวลา
                    <!-- <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                    (TB, DF,Flu,โรคมือเท้าปาก,Diarrhea และโรคระบาดที่รุนแรงตามฤดูกาล )
                  </td>
                  <td width="10%" height="30" align="center"><input value="<?= $n8[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n8" id="n8" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n8[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n8" id="n8" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n8[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n8" id="n8" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n8[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n8" id="n8" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n8[1] + $n8[2] + $n8[3] + $n8[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30" colspan="6" style="background-color:#F5F5F5;">&nbsp;G 1.4 การฟื้นฟู ที่มีมาตรฐาน</td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    9. คะแนนคุณภาพชีวิตของผู้ป่วยโรคเรื้อรังที่ได้รับการเยี่ยมบ้าน > 80 คะแนน</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n9[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n9" id="n9" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n9[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n9" id="n9" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n9[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n9" id="n9" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n9[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n9" id="n9" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n9[1] + $n9[2] + $n9[3] + $n9[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    10. อัตราการเยี่ยมบ้านกลุ่มผู้ป่วยติดเตียง ผู้พิการและผู้ป่วย โรคเรื้อรังที่ควบคุมโรคไม่ได้</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n10[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n10" id="n10" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n10[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n10" id="n10" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n10[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n10" id="n10" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n10[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n10" id="n10" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n10[1] + $n10[2] + $n10[3] + $n10[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30" colspan="6" style="background-color:#F5F5F5;">&nbsp;G 2.1. ผู้รับบริการมีความพึงพอใจสูงสุดต่อระบบริการ</td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    11. อัตราความพึงพอใจของผู้รับบริการ</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n11[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n11" id="n11" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n11[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n11" id="n11" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n11[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n11" id="n11" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n11[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n11" id="n11" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n11[1] + $n11[2] + $n11[3] + $n11[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    12. อุบัติการณ์การเกิดข้อร้องเรียนเกี่ยวกับระบบบริการ</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n12[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n12" id="n12" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n12[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n12" id="n12" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n12[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n12" id="n12" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n12[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n12" id="n12" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n12[1] + $n12[2] + $n12[3] + $n12[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    13. ระยะเวลารอคอยของผู้รับบริการแผนกตรวจโรคผู้ป่วยนอก</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n13[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n13" id="n13" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n13[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n13" id="n13" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n13[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n13" id="n13" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n13[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n13" id="n13" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n13[1] + $n13[2] + $n13[3] + $n13[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30" colspan="6" style="background-color:#F5F5F5;">&nbsp;G 2.2 ผู้รับบริการมีความผูกพันกับโรงพยาบาล</td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    14. อัตราความผูกพันของผู้รับบริการที่มีต่อโรงพยาบาล</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n14[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n14" id="n14" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n14[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n14" id="n14" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n14[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n14" id="n14" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n14[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n14" id="n14" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n14[1] + $n14[2] + $n14[3] + $n14[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30" colspan="6" style="background-color:#F5F5F5;">&nbsp;G 3.1 การเงินโปร่งใส</td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    15. ผลการประเมินการตรวจสอบภายในรายรับสถานพยาบาล (สตน.)</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n15[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n15" id="n15" <?php } else { ?> readonly <?php } ?> maxlength="20" onkeypress="isInputChar(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n15[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n15" id="n15" <?php } else { ?> readonly <?php } ?> maxlength="20" onkeypress="isInputChar(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n15[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n15" id="n15" <?php } else { ?> readonly <?php } ?> maxlength="20" onkeypress="isInputChar(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n15[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n15" id="n15" <?php } else { ?> readonly <?php } ?> maxlength="20" onkeypress="isInputChar(event)"></td>
                  <!-- <td width="10%" height="30" align="center"></td> -->
                </tr>
                <tr>
                  <td height="30" colspan="6" style="background-color:#F5F5F5;">&nbsp;G 3.2 มีระบบการจัดการความเสี่ยงอย่างมีประสิทธิภาพ</td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    16. อัตราความเสี่ยง ระดับ E และระดับ 2 ขึ้นไป ได้รับการทำ RCA</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n16[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n16" id="n16" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n16[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n16" id="n16" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n16[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n16" id="n16" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n16[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n16" id="n16" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n16[1] + $n16[2] + $n16[3] + $n16[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    17. อุบัติการณ์ความเสี่ยงระดับ Sentinel Event ไม่ได้รับการรายงานในเวลาที่กำหนด</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n17[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n17" id="n17" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n17[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n17" id="n17" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n17[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n17" id="n17" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n17[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n17" id="n17" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n17[1] + $n17[2] + $n17[3] + $n17[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    18. อัตราการเกิดความเสี่ยงซ้ำของความเสี่ยงที่ได้รับการแก้ไขแล้ว </td>
                  <td width="10%" height="30" align="center"><input value="<?= $n18[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n18" id="n18" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n18[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n18" id="n18" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n18[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n18" id="n18" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n18[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n18" id="n18" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n18[1] + $n18[2] + $n18[3] + $n18[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30" colspan="6" style="background-color:#F5F5F5;">&nbsp;G 3.3 การบริหารทรัพยากรบุคคลอย่างมีประสิทธิภาพ</td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    19. ร้อยละของหน่วยงานในโรงพยาบาลมีบุคลากรเพียงพอและเหมาะสมตามเกณฑ์</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n19[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n19" id="n19" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n19[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n19" id="n19" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n19[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n19" id="n19" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n19[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n19" id="n19" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n19[1] + $n19[2] + $n19[3] + $n19[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    20. อัตราการจัดทำ CQI และนวตกรรม ของหน่วยงานในองค์กร</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n20[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n20" id="n20" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n20[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n20" id="n20" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n20[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n20" id="n20" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n20[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n20" id="n20" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n20[1] + $n20[2] + $n20[3] + $n20[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    21. อุบัติการณ์การการทำผิดวินัยทางทหารร้ายแรงและ การทำผิด พรบ. วิชาชีพ</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n21[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n21" id="n21" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n21[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n21" id="n21" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n21[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n21" id="n21" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n21[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n21" id="n21" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n21[1] + $n21[2] + $n21[3] + $n21[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    22. ร้อยละความพึงพอใจในคุณภาพชีวิตต่อการทำงาน</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n22[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n22" id="n22" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n22[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n22" id="n22" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n22[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n22" id="n22" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n22[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n22" id="n22" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n22[1] + $n22[2] + $n22[3] + $n22[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30" colspan="6" style="background-color:#F5F5F5;">&nbsp;G 3.4 อุปกรณ์เครื่องมือทางการแพทย์มีมาตรฐาน และเพียงพอ</td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    23. อุบัติการณ์เครื่องมือและอุปกรณ์ทางการแพทย์ที่มีความเสี่ยงสูงไม่พร้อมใช้งาน</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n23[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n23" id="n23" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n23[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n23" id="n23" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n23[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n23" id="n23" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n23[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n23" id="n23" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n23[1] + $n23[2] + $n23[3] + $n23[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    24. อัตราเครื่องมือทางการแพทย์ได้รับการสอบเทียบ</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n24[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n24" id="n24" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n24[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n24" id="n24" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n24[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n24" id="n24" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n24[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n24" id="n24" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n24[1] + $n24[2] + $n24[3] + $n24[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30" colspan="6" style="background-color:#F5F5F5;">&nbsp;G 3.5 มีสิ่งแวดล้อมที่ปลอดภัย สถานที่สะอาด สะดวก เพียงพอ</td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    25. ผ่านเกณฑ์รับรองคุณภาพการประเมินความเสี่ยงจากการทำงานของบุคลากรในระดับ ดี จากกระทรวงสาธารณสุข</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n25[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n25" id="n25" <?php } else { ?> readonly <?php } ?> maxlength="20" onkeypress="isInputChar(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n25[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n25" id="n25" <?php } else { ?> readonly <?php } ?> maxlength="20" onkeypress="isInputChar(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n25[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n25" id="n25" <?php } else { ?> readonly <?php } ?> maxlength="20" onkeypress="isInputChar(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n25[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n25" id="n25" <?php } else { ?> readonly <?php } ?> maxlength="20" onkeypress="isInputChar(event)"></td>
                  <td width="10%" height="30" align="center"></td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    26. เป็นโรงพยาบาลน่าอยู่น่าทำงาน ตามเกณฑ์ของกรมแพทย์ทหารบก</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n26[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n26" id="n26" <?php } else { ?> readonly <?php } ?> maxlength="20" onkeypress="isInputChar2(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n26[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n26" id="n26" <?php } else { ?> readonly <?php } ?> maxlength="20" onkeypress="isInputChar2(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n26[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n26" id="n26" <?php } else { ?> readonly <?php } ?> maxlength="20" onkeypress="isInputChar2(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n26[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n26" id="n26" <?php } else { ?> readonly <?php } ?> maxlength="20" onkeypress="isInputChar2(event)"></td>
                  <td width="10%" height="30" align="center"></td>
                </tr>
                <tr>
                  <td height="30" colspan="6" style="background-color:#F5F5F5;">&nbsp;G 3.6 มีระบบเทคโนโลยีที่ทันสมัยและมีประสิทธิภาพตอบสนองต่อการทำงาน</td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    27. อุบัติการณ์การเกิด information systems downtime ของระบบ Hos-xp</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n27[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n27" id="n27" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n27[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n27" id="n27" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n27[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n27" id="n27" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n27[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n27" id="n27" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n27[1] + $n27[2] + $n27[3] + $n27[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    28. อัตราความเพียงพอของระบบคอมพิวเตอร์ และระบบเทคโนโลยีของหน่วยงานต่างๆ</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n28[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n28" id="n28" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n28[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n28" id="n28" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n28[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n28" id="n28" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n28[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n28" id="n28" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n28[1] + $n28[2] + $n28[3] + $n28[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30" colspan="6" style="background-color:#F5F5F5;">&nbsp;G 4.1 การสนับสนุนภารกิจด้านการแพทย์ต่อกองทัพบกมีประสิทธิภาพสูงสุด</td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    29. ระดับความสำเร็จการพัฒนาศูนย์ความเป็นเลิศทางการแพทย์/ศูนย์แพทย์เฉพาะทาง รพ.ทบ.ตามบริบทของหน่วยได้ตามเกณฑ์ที่กรมแพทย์กำหนด</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n29[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n29" id="n29" <?php } else { ?> readonly <?php } ?> maxlength="20" onkeypress="isInputChar2(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n29[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n29" id="n29" <?php } else { ?> readonly <?php } ?> maxlength="20" onkeypress="isInputChar2(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n29[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n29" id="n29" <?php } else { ?> readonly <?php } ?> maxlength="20" onkeypress="isInputChar2(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n29[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n29" id="n29" <?php } else { ?> readonly <?php } ?> maxlength="20" onkeypress="isInputChar2(event)"></td>
                  <td width="10%" height="30" align="center"></td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    30. อัตราการตอบสนองต่อการขอรับการสนับสนุนทางการแพทย์ต่อหน่วยทหารในค่าย</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n30[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n30" id="n30" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n30[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n30" id="n30" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n30[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n30" id="n30" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n30[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n30" id="n30" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n30[1] + $n30[2] + $n30[3] + $n30[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30" colspan="6" style="background-color:#F5F5F5;">&nbsp;G 4.2 กำลังพลปฏิบัติภารกิจชายแดนมีสมรรถภาพสูง</td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    31. อัตรากำลังพลที่ปฏิบัติราชการสนามได้รับการตรวจสุขภาพ และคัดกรองสุขภาพจิต ก่อนออกปฏิบัติภารกิจชายแดน</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n31[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n31" id="n31" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n31[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n31" id="n31" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n31[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n31" id="n31" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n31[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n31" id="n31" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n31[1] + $n31[2] + $n31[3] + $n31[4]) / 4 ?></td>
                </tr>
                <tr>
                  <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    32. อัตรากำลังผลได้รับความรู้ในการดูแลสุขภาพเพื่อป้องกันโรคขณะออกปฏิบัติภารกิจชายแดน</td>
                  <td width="10%" height="30" align="center"><input value="<?= $n32[1] ?>" class="form-control" type="text" <?php if ($quarter == '1') { ?> name="n32" id="n32" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n32[2] ?>" class="form-control" type="text" <?php if ($quarter == '2') { ?> name="n32" id="n32" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n32[3] ?>" class="form-control" type="text" <?php if ($quarter == '3') { ?> name="n32" id="n32" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><input value="<?= $n32[4] ?>" class="form-control" type="text" <?php if ($quarter == '4') { ?> name="n32" id="n32" <?php } else { ?> readonly <?php } ?> maxlength="5" onkeypress="isInputNumber(event)"></td>
                  <td width="10%" height="30" align="center"><?= ($n32[1] + $n32[2] + $n32[3] + $n32[4]) / 4 ?></td>
                </tr>
              </table>
              <?php
              if ($quarter == '5') { ?>
                <div class="footer d-flex justify-content-center">
                  <!-- <a href="report.php"><span class="btn btn-sm btn-primary fa fas-plus float-right "><i class="fas fa-plus"> Excel </i></a> -->
                  <a href="report.php"><button class="btn btn-primary btn-lg" type="button" name="btnExcel" id="btnExcel" value="Excel">รายงาน Excel</button></a>&nbsp;&nbsp;
                  <button class="btn btn-danger btn-lg" type="button" onClick="window.history.back()" name="btnBack" id="btnBack" value="กลับ">กลับ</button>
                </div>
              <?php  } else { ?>
                <div class="footer d-flex justify-content-center">
                  <button class="btn btn-success btn-lg" type="submit" name="btnedit" id="btnedit" value="บันทึก">บันทึก</button>&nbsp;
                  <button class="btn btn-danger btn-lg" type="button" onClick="window.history.back()" name="btnBack" id="btnBack" value="กลับ">กลับ</button>
                  <!-- <button class="btn btn-danger" type="reset" onclick="window.history.back()" name="btnCancel" id="btnCancel" value="ยกเลิก">ยกเลิก</button> -->
                </div>
              <?php } ?>
              <br>
              <br>
            </form>
          </div>
        </div>
    </body>

  </html>
<?php
} else {
  echo "<script> alert('กรุณา ล็อกอินเข้าสู่ระบบ'); window.location='frm_login.php';</script>";
  exit();
}
?>