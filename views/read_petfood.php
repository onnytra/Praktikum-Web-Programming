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
include "header-k.php";
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
        <h1>Data Pet Food</h1>
        <a href="input_petfood.php" class="btn btn-info me-2">New Pet Food</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Pet Food</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Hewan</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT pet_food.id_food, pet_food.nama_food,
                pet_food.desk,
                pet_food.harga,
                pet_food.stock,
                hewan.hewan,
                brand.brand
        FROM (pet_food INNER JOIN hewan ON (pet_food.id_hewan = hewan.id_hewan))
                INNER JOIN brand ON (pet_food.id_brand = brand.id_brand)";
                $query = mysqli_query($koneksi, $sql);
                $no = 1;
                while ($data = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $data['nama_food'] . "</td>";
                    echo "<td>" . substr($data['desk'], 0, 60) . "...</td>";
                    echo "<td>" . $data['harga'] . "</td>";
                    echo "<td>" . $data['stock'] . "</td>";
                    echo "<td>" . $data['hewan'] . "</td>";
                    echo "<td>" . $data['brand'] . "</td>";
                    echo "<td>";
                    echo "<a href='update_petfood.php?id=" . $data['id_food'] . "' class='btn btn-primary me-2'> Edit </a>";
                    echo "<a href='../action/proses-delete-petfood.php?id=" . $data['id_food'] . "' class='btn btn-danger me-2'> Delete </a>";
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