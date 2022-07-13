<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
        <h1 class="h3 mb-3">Login</h1>

        <?php if ( isset($_GET['incorrect']) ) : ?>
            <div class="alert alert-warning">
            Incorrect Email or Password
            </div>
        <?php endif ?>

        <?php if (isset($_GET['registered'])): ?>
            <div class="alert alert-success">
            Account created. Please login.
            </div>
        <?php endif ?>
        <?php if (isset($_GET['suspended'])): ?>
            <div class="alert alert-danger">
            Your account is suspended.
            </div>
        <?php endif ?>

        <form action="_actions/login.php" method="post">
            <input
            type="email" name="email"
            class="form-control mb-2"
            placeholder="Email" required
            >
            <input
            type="password" name="password"
            class="form-control mb-2"
            placeholder="Password" required
            >
            <button type="submit"
            class="w-100 btn btn-lg btn-primary">
            Login
            </button>
        </form>
        <br>
        <a href="register.php">Register</a>
    </div>
</body>
</html>