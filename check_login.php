<?php
include("db.php");

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Aquí deberías encriptar la contraseña antes de compararla con la base de datos
    // $password = hash('sha256', $password);

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = sqlsrv_query($conn, $query);

    if($result === false){
        die(print_r(sqlsrv_errors(), true));
    }

    if(sqlsrv_has_rows($result)){
        $_SESSION['user'] = $username;
        header("Location: home.php");
    } else {
        $_SESSION['message'] = 'Wrong username or password';
        $_SESSION['message_type'] = 'danger';
        header("Location: index.php");
    }
}
?>