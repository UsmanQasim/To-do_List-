<?php
    session_start();
    include 'db.php';
    if(isset($_POST['email'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $sel_user = "SELECT * FROM users WHERE email  = '$email' ";
        $run_user = mysqli_query($conn , $sel_user );
        if(mysqli_num_rows($run_user) == 1){
            while($user = mysqli_fetch_assoc($run_user)){
                if($user['password'] === $pass){
                    $_SESSION['email'] = $email;
                    echo 'good';
                    
                }else{
                    echo 'nopass/';
                }
            }
        }else{
            echo 'NOT_FOUND';
        }
    }



