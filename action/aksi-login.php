<?php 
    session_start();
    include "../koneksi.php";
    $op = $_GET['op'];
    if ($op == "in"){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $sql = "SELECT * FROM account WHERE
        username='$user' AND password='$pass'";
        $query = mysqli_query($koneksi, $sql);
        if (mysqli_num_rows($query)==1){
            $data = mysqli_fetch_assoc($query);
            $_SESSION['username'] = $data['username'];
            $_SESSION['level'] = $data['level'];
            if($data['level'] == "admin"){
                header("location: ../views/read_account.php");
            }else if($data['level'] == "user"){
                header("location: ../views/view_petfood.php");
            }else if($data['level'] == "kary"){
                header("location: ../views/read_petfood.php");
            }
        }else{
            die("Password Salah <a href=\"javascript:history.back()\">Kembali</a>");
        }
    }else if ($op == "out"){
        unset($_SESSION['username']);
        unset($_SESSION['level']);
        header("location:../views/login.php");
    }
?>
