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
$sql2 = "SELECT id_user FROM account WHERE username='$username'";
$query2 = mysqli_query($koneksi, $sql2);
$data2 = mysqli_fetch_assoc($query2);
$level = $_SESSION['level'];
if ($level != 'user') {
    echo "<script> 
            alert('Who Are You !');
            document.location.href = 'login.php';
        </script>";
}
$petfood = $_GET['id'];
$sql = "SELECT id_food,nama_food, harga FROM pet_food WHERE id_food=$petfood";
$query = mysqli_query($koneksi,$sql);
$data = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>PetFood</title>
</head>

<body>
    <div class="m-md-4">
        <form action="../action/proses-input-beli.php" method="post">
            <h3>Data Beli</h3>
            <div class="mb-3">
                <input type="hidden" class="form-control" id="exampleInputPassword1" name="tanggal" value=" <?php echo date("Y-m-d"); ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Pet Food</label>
                <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $data['nama_food'] ?>" disabled>
                <input type="hidden" name="petfood" value="<?php echo $data['id_food'] ?>">
                <input type="hidden" name="harga" value="<?php echo $data['harga'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="jumlah">
            </div>
            <input type="hidden" class="form-control" id="exampleInputPassword1" name="user" value="<?php echo $data2['id_user'] ?>">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="view_petfood.php" class="btn btn-secondary me-2"> Cancel </a>
        </form>
    </div>
</body>

</html>