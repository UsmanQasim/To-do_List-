<?php
    session_start();
include 'db.php';
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $sel_user = "SELECT * FROM users WHERE email  = '$email' ";
    $run_user = mysqli_query($conn, $sel_user);
    if (mysqli_num_rows($run_user) == 0) {
        $upload_user = "INSERT INTO users ( name, email, password) VALUES ( '$username', '$email', '$pass');";
        if ($run_user = mysqli_query($conn, $upload_user)) {
            echo 'Success';
            $_SESSION['email'] = $email;
        } else {
            echo 'Worthless';
        }
    }else{
        echo 'Already Exist';
    }
}
