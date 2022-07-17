<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
unset($_SESSION["status"]);
session_destroy();
?>
<script language="javascript">
    window.location = 'frm_login.php';
</script>
