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
$level = $_SESSION['level'];
if ($level != 'admin') {
    echo "<script> 
            alert('Who Are You !');
            document.location.href = 'login.php';
        </script>";
}
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Account</title>
</head>
<body>
<div class="m-md-4">
<h1>Data Account</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Username</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Level</th>  
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
            $sql = "SELECT * FROM account";
            $query = mysqli_query($koneksi,$sql);
            $no = 1;
            while($data = mysqli_fetch_assoc($query)){
                echo "<tr>";
                echo "<td>".$no."</td>";
                echo "<td>".$data['username']."</td>";
                echo "<td>".$data['phone']."</td>";
                echo "<td>".$data['email']."</td>";
                echo "<td>".$data['level']."</td>";
                echo "<td>";
                echo "<a href='update_account.php?id=".$data['id_user']."' class='btn btn-primary me-2'> Edit </a>";
                echo "<a href='../action/proses-delete-account.php?id=".$data['id_user']."' class='btn btn-danger me-2'> Delete </a>";
                echo "</td>";
                echo "</tr>";
                $no++;
            }
        ?>
    </tbody>
</table>
</div>
</body>
</html>
