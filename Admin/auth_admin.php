<?php
    session_start();
    include ('../connect.php');
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $myusername = mysqli_real_escape_string($conn,$_POST['username']);
        $mypassword = mysqli_real_escape_string($conn,$_POST['password']);
        $login = "SELECT * FROM tb_admin WHERE nama = '$myusername' and sandi = '$mypassword'";
        $result = mysqli_query($conn,$login);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $id = $row['id_admin'];
        $count = mysqli_num_rows($result);
        if($count == 1) {
            $_SESSION['login_admin'] = $myusername;
            $_SESSION['login_pass'] = $mypassword;
            $_SESSION['uid'] = $id;
            header("location: Data-Dosen/");
        }else {
            echo "Your Username or Password is Invalid";
        }
    }
?>