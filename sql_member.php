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
            $name = $_POST['name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $status = $_POST['status'];

            if ((empty($name)) || (empty($username)) || (empty($password))) {
                $msg = "";
                if (!$name) $msg = $msg . " กรุณากรอก ชื่อ";
                if (!$username) $msg = $msg . " กรุณากรอก username";
                if (!$password) $msg = $msg . " กรุณากรอก password";
                echo "<script>Swal.fire({
                type: 'error',
                title: '{$msg}',
                showConfirmButton: true,
                timer: 1500
            }).then(() => { 
                window.history.back()
                });
            </script>";
            } else {
                $query = "SELECT * FROM indicators_user
                WHERE name = '$name' or username = '$username'";
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
                    $query = "INSERT INTO indicators_user (name,username,password,status) VALUES 
                        ('$name','$username','$password' ,'$status')";
                    mysqli_query($conn, $query);
                    echo "<script>Swal.fire({
                        type: 'success',
                        title: 'บันทึกข้อมูลเรียบร้อย',
                        showConfirmButton: true,
                        timer: 1500
                        }).then(() => { 
                        window.location = 'frm_member.php' 
                        });
                    </script>";
                }
            }
        }

        //**************************************UPDATE*********************************************************** */
        if (isset($_POST['btnedit'])) {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $status = $_POST['status'];
            $id = $_POST['id'];

            if ((empty($name)) || (empty($username)) || (empty($password))) {
                $msg = "";
                if (!$name) $msg = $msg . " กรุณากรอก ชื่อ";
                if (!$username) $msg = $msg . " กรุณากรอก username";
                if (!$password) $msg = $msg . " กรุณากรอก password";
                echo "<script>Swal.fire({
            type: 'error',
            title: '{$msg}',
            showConfirmButton: true,
            timer: 1500
        }).then(() => { 
            window.history.back()
            });
        </script>";
            } else {
                $query = "SELECT * FROM indicators_user
            WHERE (name = '$name' or username = '$username') and (id != '$id')";
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
                    $query = "UPDATE indicators_user set name='$name',username='$username',
                password='$password',status='$status' WHERE id = '$id'";
                    mysqli_query($conn, $query);
                    echo "<script>Swal.fire({
                    type: 'success',
                    title: 'บันทึกข้อมูลเรียบร้อย',
                    showConfirmButton: true,
                    timer: 1500
                    }).then(() => { 
                    window.location = 'frm_member.php' 
                    });
                </script>";
                }
            }
        }
        //**************************************DELETE*********************************************************** */
        if (isset($_POST['btndelete'])) {
            $id = $_POST['id'];
            $query = "DELETE FROM indicators_user WHERE id = '$id'";
            mysqli_query($conn, $query);
            echo "<script>Swal.fire({
        type: 'success',
        title: 'ลบข้อมูลเรียบร้อย',
        showConfirmButton: true,
        timer: 1500
        }).then(() => { 
            window.location = 'frm_member.php' 
        });
        </script>";
        }



        ?>
        <!-- window.location = 'frm_member.php' -->
    </body>

    </html>
<?php
} else {
    echo "<script> alert('กรุณา ล็อกอินเข้าสู่ระบบ'); window.location='frm_login.php';</script>";
    exit();
}
?>