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
if ($level != 'kary') {
    echo "<script> 
            alert('Who Are You !');
            document.location.href = 'login.php';
        </script>";
}
$petfood = $_GET['id'];
$sql = "SELECT aksi_beli.total, pembayaran.status, pembayaran.var_foto
        FROM uas_pweb.pembayaran pembayaran
        INNER JOIN uas_pweb.aksi_beli aksi_beli
        ON (pembayaran.id_pembayaran = aksi_beli.id_beli) WHERE id_pembayaran=$petfood";
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
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                <img src="../assets/<?php echo $data["var_foto"] ?>" alt="PetFood" width="300px" height="350px">
                </div>
            </div>
        </section>
        <form action="../action/proses-update-bukti.php" method="post">
            <div class="mb-3">
                <input type="hidden" class="form-control" id="exampleInputPassword1" name="id" value=" <?php echo $petfood?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Status</label>
                <select class="form-select" aria-label="Default select example" name="status">
                    <option value="WAITING">Waiting</option>
                    <option value="SENDING">Sending</option>
                    <option value="FALSE">Pembayaran Salah</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="read_beli.php" class="btn btn-secondary me-2"> Cancel </a>
        </form>
    </div>
</body>

</html>