<?php
session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
  include("connect.php");
  $username = $_SESSION["username"];
  $password = $_SESSION["password"];
  $status = $_SESSION["status"];

?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <?php include("head.php") ?>
  </head>

  <body>
    <?php
    include("connect.php");
    //**************************************UPDATE*********************************************************** */
    if (isset($_POST['btnedit'])) {
      $quarter = $_POST['quarter'];
      $year = $_POST['year'];
      // $id_user = $_POST['id_user'];
      // if ($quarter == '1') {
      $n1 = $_POST['n1'];
      $n2 = $_POST['n2'];
      $n3 = $_POST['n3'];
      $n4 = $_POST['n4'];
      $n5 = $_POST['n5'];
      $n6 = $_POST['n6'];
      $n7 = $_POST['n7'];
      $n8 = $_POST['n8'];
      $n9 = $_POST['n9'];
      $n10 = $_POST['n10'];
      $n11 = $_POST['n11'];
      $n12 = $_POST['n12'];
      $n13 = $_POST['n13'];
      $n14 = $_POST['n14'];
      $n15 = $_POST['n15'];
      $n16 = $_POST['n16'];
      $n17 = $_POST['n17'];
      $n18 = $_POST['n18'];
      $n19 = $_POST['n19'];
      $n20 = $_POST['n20'];
      $n21 = $_POST['n21'];
      $n22 = $_POST['n22'];
      $n23 = $_POST['n23'];
      $n24 = $_POST['n24'];
      $n25 = $_POST['n25'];
      $n26 = $_POST['n26'];
      $n27 = $_POST['n27'];
      $n28 = $_POST['n28'];
      $n29 = $_POST['n29'];
      $n30 = $_POST['n30'];
      $n31 = $_POST['n31'];
      $n32 = $_POST['n32'];
      $n32 = $_POST['n32'];


      //echo $amphure_id,'/',$province_id,'/',$district_name_th,'/',$zip_code,'/',$district_id;
      $query = "UPDATE indicators_sum SET 
    n1 ='$n1', n2 ='$n2', n3 ='$n3', n4 ='$n4', n5 ='$n5', n6 ='$n6', n7 ='$n7', n8 ='$n8', n9 ='$n9', n10 ='$n10', 
    n11 ='$n11', n12 ='$n12', n13 ='$n13', n14 ='$n14', n15 ='$n15', n16 ='$n16', n17 ='$n17', n18 ='$n18', n19 ='$n19', n20 ='$n20',
    n21 ='$n21', n22 ='$n22', n23 ='$n23', n24 ='$n24', n25 ='$n25', n26 ='$n26', n27 ='$n27', n28 ='$n28', n29 ='$n29', n30 ='$n30',
    n31 ='$n31',n32 ='$n32'
    where indicators_year = '$year' and indicators_quarter = '$quarter'";
      mysqli_query($conn, $query);
      if ($status == '0') {
        echo "<script>
        Swal.fire({
          type: 'success',
          title: 'บันทึกข้อมูลเรียบร้อย',
          showConfirmButton: true,
          timer: 1500
        }).then(() => {
          window.location = 'frm_indicators.php'
        });
      </script>";
      } else {
        echo "<script>
          Swal.fire({
            type: 'success',
            title: 'บันทึกข้อมูลเรียบร้อย',
            showConfirmButton: true,
            timer: 1500
          }).then(() => {
            window.location = 'frm_indicators_user.php'
          });
        </script>";
      }
    }
    ?>
    <!-- window.location = 'frm_indicators_user.php' -->
  </body>

  </html>
<?php
} else {
  echo "<script> alert('กรุณา ล็อกอินเข้าสู่ระบบ'); window.location='frm_login.php';</script>";
  exit();
}
?>