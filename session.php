<?php
ob_start();
session_start();
if (isset($_SESSION['username']) === false) {
    header('Location: login.php');
}
ob_end_clean();
?>