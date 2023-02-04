<?php 
session_start();
require_once 'config/koneksi.php'; 

if(!isset($_SESSION['username']) == 0) { 
    header('Location: ../login.php');
}

    $username = $_POST['username']; 
    $password = $_POST['password'];
   
    $stmt = $database_connection->prepare("SELECT * FROM akun WHERE email = ? AND password = SHA1(?)");
    $stmt->execute([$username,$password]);
    $user = $stmt->fetchAll();

if($user) {
    $_SESSION['username'] = $username; 
    $response = array(
        'status' => 1,
        'message' => 'login success',
        'data' => $user
    );
} else {
    
    $response = array(
        'status' => 0,
        'message' => 'username atau password salah'
    );
}


echo json_encode($response);

?>