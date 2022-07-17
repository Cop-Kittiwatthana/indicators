<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <?php include("head.php"); ?>
</head>

<body>

    <?php
    $TH_Month = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
    $nMonth = date("n") - 1;
    $date = date("j");
    $year = date("Y") + 543;
    $time = date("H:i:s");
    $_SESSION['DATE_LOGIN'] = $date . '-' . $TH_Month[$nMonth] . '-' . $year . '&nbsp;' . $time;
    //include('connect.php');
    session_start();
    if (isset($_POST['username']) && isset($_POST['password'])) {
    include("connect.php");
        $username = $_POST['username'];
        $password = $_POST['password'];
       
        $query = "SELECT * FROM indicators_user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['status'] = $row['status'];
            $_SESSION['DATE_LOGIN'] = $date . '-' . $TH_Month[$nMonth] . '-' . $year . '&nbsp;' . $time;
            //แอดมิน
            if ($_SESSION['status'] == '0') {
                echo "<script>Swal.fire({
                        type: 'success',
                        title: 'ยินดีต้อนรับผู้ดูแลระบบเข้าสู่ระบบ',
                        showConfirmButton: true,
                        timer: 1500
                        }).then(() => { 
                            window.location = 'index.php'
                            });
                            </script>";
                exit();
            }
            //อาจารย์
            if ($_SESSION['status'] == '1') {
                echo "<script>Swal.fire({
                        type: 'success',
                        title: 'ยินดีต้อนรับเข้าสู่ระบบ',
                        showConfirmButton: true,
                        timer: 1500
                        }).then(() => { 
                            window.location = 'frm_indicators_user.php'
                            });
                            </script>";
                exit();
            }
        } else {
            echo "<script>Swal.fire({
                            type: 'error',
                            title: 'Not Found',
                            showConfirmButton: true,
                            timer: 1500
                          }).then(() => { 
                              window.history.go(-1)
                            });
                         
                          </script>";
            exit();
        }
    } else {
        echo "<script>Swal.fire({
                type: 'error',
                title: 'ไม่มี ผู้ใช้ นี้ในระบบ!!!',
                showConfirmButton: true,
                timer: 1500
              }).then(() => { 
                window.history.go(-1)
                });
              </script>";
        exit();
    }
    ?>
</body>

</html>