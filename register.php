<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .wrap {
        width: 100%;
        max-width: 400px;
        margin: 40px auto;
        }
</style>
</head>
<body class="text-center">
    <div class="wrap">
        <h1 class="h3 mb-3">Register</h1>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-warning">
                Cannot create account. Please try again.
            </div>
        <?php endif ?>

        <form action="_actions/create.php" method="post">
            <input type="text" name="name" class="form-control mb-2"
                placeholder="Name" required>
            <input type="email" name="email" class="form-control mb-2"
                placeholder="Email" required>
            <input type="text" name="phone" class="form-control mb-2"
                placeholder="Phone" required>
            <textarea name="address" class="form-control mb-2"
                placeholder="Address" required></textarea>
            <input type="password" name="password" class="form-control mb-2"
                placeholder="Password" required>
            <button type="submit" class="w-100 btn btn-lg btn-primary">
                Register
            </button>
        </form>
        <br>
        
        <a href="index.php">Login</a>
    </div>
</body>
</html>