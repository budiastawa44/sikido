<?php 
    include("connect.php");
    session_start();
    if(isset($_SESSION['login_mhs'])){
        $user_check = $_SESSION['login_mhs'];
        $user_pass = $_SESSION['login_pass'];
        $id_user = $_SESSION['uid'];
        $ses_sql = mysqli_query($conn,"SELECT * FROM tb_mhs WHERE nim = '$user_check' and password = '$user_pass'");
        $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
        header("location: data-dosen/");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="bower_components/font-awesome/css/font-awesome.min.css">
    <style type="text/css">
        .text-h1{
            color: white;
            margin-top: 90px;
            padding-bottom: 20px;
            font-family: ubuntu;
        }

        .body{
            width: 380px;
            height: 300px;
            border-radius: 20px;
            margin: auto;
            background: #fff;
        }

        .input{
            width: 130%;
            padding: 10px;
            margin-top: 30px;
            border: none;
        }

        .button{
            padding: 10px 55px;
            border-radius: 5px;
            margin: auto 110px;
            border: none;
            margin-top: 30px;
            cursor: pointer;
            background: #ff8600;
            font-weight: bold;
            color: #fff;
            font-size: 18px;
        }

        .table i{
            padding-left: 40px;
            font-size: 30px;
            padding-top: 25px;
            color: #808080;
        }

        .input::placeholder{
            color: #808080;
            font-size: 20px;
            font-family: ubuntu;
        }
    </style>
</head>
<body background="img/bg2.jpg">
    <center><h1 class="text-h1">LOGIN</h1></center>
    <div class="body">
        <form action="auth_mhs.php" method="POST">
            <table class="table">
                <tr>
                    <th><i class="fa fa-user-o awesome"></i></th>
                    <th><input type="text" name="username" class="input" placeholder="Username"></th>
                </tr>
                <tr>
                    <th><i class="fa fa-lock awesome"></i></th>
                    <th><input type="password" name="password" class="input" placeholder="Password"></th>
                </tr>               
            </table>
            <button class="button" type="submit">LOGIN</button>
            <center><p style="margin-top: 40px; font-family: ubuntu; color: #7f8c8d">Sistem Informasi Kompetensi Dosen Kimia</p></center>
        </form>
    </div>

</body>
</html>