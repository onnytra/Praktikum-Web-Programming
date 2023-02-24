<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Register</title>
</head>

<body>
    <div class="m-md-4">
        <form action="../action/proses-register.php" method="post" enctype="multipart/form-data">
            <h3>REGISTER</h3>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Username</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="user">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Re-Type Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="upass">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Phone Number</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="phone">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Your Photo Profile</label>
                <input class="form-control" type="file" id="formFile" name="file" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="login.php" class="btn btn-secondary me-2"> Cancel </a>
        </form>
    </div>
</body>

</html>