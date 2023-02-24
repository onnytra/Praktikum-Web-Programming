<?php
session_start();
include "../koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if (!isset($_SESSION['username'])) {
    echo "<script> 
    alert('Who Are You !');
    document.location.href = 'login.php';
</script>";
}
$username = $_SESSION['username'];
$sql2 = "SELECT * FROM account WHERE username='$username'";
$query2 = mysqli_query($koneksi, $sql2);
$data2 = mysqli_fetch_assoc($query2);
$id_user = $data2['id_user'];
$level = $_SESSION['level'];
if ($level != 'user') {
    echo "<script> 
            alert('Who Are You !');
            document.location.href = 'login.php';
        </script>";
}
include "header-u.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Cart</title>
</head>

<body>
    <div class="m-md-4">
        <h2>Your Account</h2>
        <img src="../assets/<?php echo $data2["var_foto"] ?>" alt="Account" width="250px" height="200px"> <br><br>
        <table>
            <tr>
                <td><label for="exampleInputPassword1" class="form-label fs-5">Username</label></td>
                <td>:</td>
                <td><label for="exampleInputPassword1" class="form-label fs-5"><?php echo $data2['username'] ?></label></td>
            </tr>
            <tr>
                <td><label for="exampleInputPassword1" class="form-label fs-5">Phone Number</label></td>
                <td>:</td>
                <td><label for="exampleInputPassword1" class="form-label fs-5"><?php echo $data2['phone'] ?></label></td>
            </tr>
            <tr>
                <td><label for="exampleInputPassword1" class="form-label fs-5">Email <Address></Address></label></td>
                <td>:</td>
                <td><label for="exampleInputPassword1" class="form-label fs-5"><?php echo $data2['email'] ?></label></td>
            </tr>
        </table>
        <a href="update_akun.php?id= <?php echo $data2['id_user'] ?>" class="btn btn-primary me-2">Edit Account</a>
    </div>
</body>
<footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#" class="btn btn-sm btn-outline-secondary">Back to top</a>
            </p>
            <p class="mb-1">Ini Footer &copy;Onny Putra Alamsyah</p>
        </div>
    </footer>

</html>