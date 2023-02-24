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
    <title>PetTutor</title>
</head>

<body>
    <div class="m-md-4">
        <h1>Data Pet Tutor</h1>
        <a href="input_pettutor.php" class="btn btn-info me-2">New Pet Tutor</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Link</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Hewan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT pet_tutor.id_tutor,
                pet_tutor.judul,
                pet_tutor.link,
                pet_tutor.tanggal,
                hewan.hewan
                FROM pet_tutor
                INNER JOIN hewan
                ON (pet_tutor.id_hewan = hewan.id_hewan)";
                $query = mysqli_query($koneksi, $sql);
                $no = 1;
                while ($data = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . substr($data['judul'], 0, 50) . "...</td>";
                    echo "<td>" . substr($data['link'], 0, 50) . "...</td>";
                    echo "<td>" . $data['tanggal'] . "</td>";
                    echo "<td>" . $data['hewan'] . "</td>";
                    echo "<td>";
                    echo "<a href='update_pettutor.php?id=" . $data['id_tutor'] . "' class='btn btn-primary me-2'> Edit </a>";
                    echo "<a href='../action/proses-delete-pettutor.php?id=" . $data['id_tutor'] . "' class='btn btn-danger me-2'> Delete </a>";
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