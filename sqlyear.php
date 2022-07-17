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
        //**************************************INSERT*********************************************************** */
        if (isset($_POST['btnsave'])) {
            $indicators_year = $_POST['indicators_year'];

            if ((empty($indicators_year))) {
                $msg = "";
                if (!$indicators_year) $msg = $msg . " ปี";
                echo "<script>Swal.fire({
			type: 'error',
			title: 'กรุณากรอก{$msg}',
			showConfirmButton: true,
			timer: 1500
		  }).then(() => { 
			 window.history.back()
			});
		  </script>";
            } else {
                $query = "SELECT * FROM indicators_sum
            WHERE (indicators_year = '$indicators_year')";
                $result = mysqli_query($conn, $query);
                $total = mysqli_num_rows($result);
                if ($total != 0) {
                    echo "<script>Swal.fire({
          type: 'error',
          title: 'ข้อมูลนี้มีอยู่แล้ว',
          showConfirmButton: true,
          timer: 1500
          }).then(() => { 
           window.history.back()
          });
          </script>";
                } else {
                    if ($total == 0) {
                        for ($i = 1; $i <= 4; $i++) {
                            // $indicators_year1 = $indicators_year + 1;
                            // ('$indicators_year','$i','แผนยุทธศาสตร์โรงพยาบาลค่ายพ่อขุนผาเมือง $indicators_year-$indicators_year1',
                            $query = "INSERT INTO indicators_sum (indicators_year,indicators_quarter,indicators_name,
                        n1 , n2 , n3 , n4 , n5 , n6 , n7 , n8 , n9 , n10 , n11 , n12 , n13 , n14 , n15 , n16 , n17 , n18 , n19 , n20 ,
                        n21 , n22 , n23 , n24 , n25 , n26 , n27 , n28 , n29 , n30 , n31 ,n32) VALUES 
                        ('$indicators_year','$i','แผนยุทธศาสตร์โรงพยาบาลค่ายพ่อขุนผาเมือง',
                        '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '-', '0', '0', '0', '0', '0',
                        '0', '0', '0', '0', '-', '-', '0', '0', '-', '0','0','0' )";
                            mysqli_query($conn, $query);
                            echo "<script>Swal.fire({
                        type: 'success',
                        title: 'บันทึกข้อมูลเรียบร้อย',
                        showConfirmButton: true,
                        timer: 1500
                        }).then(() => { 
                        window.location = 'frm_indicators.php'
                        });
                    </script>";
                        }
                    }
                }
            }
        }
        ?>
        <!-- window.location = 'frm_indicators.php' -->
    </body>

    </html>
<?php
} else {
    echo "<script> alert('กรุณา ล็อกอินเข้าสู่ระบบ'); window.location='frm_login.php';</script>";
    exit();
}
?>