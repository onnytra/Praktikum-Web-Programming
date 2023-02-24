<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <?php ?>
    <h1>Login-Form</h1>
    <form action="../action/aksi-login.php?op=in" method="POST">
        <table>
            <tr>
                <a href="register-form.php"><h4>Register[+]</h4></a>
            </tr>
            <tr>
                <td>Username :</td>
                <td><input type="text" name="user" id=""></td>
            </tr>
            <tr>
                <td>Password :</td>
                <td><input type="password" name="pass" id=""></td>
            </tr>
            <tr>
                <td><input type="submit" value="LOGIN"></td>
            </tr>
        </table>
    </form>
</body>
</html>