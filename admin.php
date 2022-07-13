<?php

include ("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;

$table = new UsersTable(new MySQL());
$all = $table->getAll();

$auth = Auth::check();
// echo $auth->value;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div style="float: right">
            <a href="profile.php">Profile</a> |
            <a href="_actions/logout.php" class="text-danger">Logout</a>
        </div>

        <h1 class="mt-5 mb-5">
            Manage Users
            <span class="badge bg-danger text-white">
                <?= count($all) ?>
            </span>
        </h1>

        <table class="table table-striped table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($all as $user): ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->phone ?></td>
                    <td>
                        <?php if($user->value === 1): ?>
                            <span class="badge bg-secondary">
                                <?= $user->role ?>
                            </span>
                        <?php elseif($user->value === 2): ?>
                            <span class="badge bg-primary">
                                <?= $user->role ?>
                            </span>
                        <?php else: ?>
                            <span class="badge bg-success">
                                <?= $user->role ?>
                            </span>
                        <?php endif ?>
                    </td>
                    <td>
                        <?php if($auth->value > 1): ?>
                        <div class="btn-group dropdown">
                            <a href="#" class="btn btn-sm
                                    btn-outline-primary
                                    dropdown-toggle"
                                    data-bs-toggle="dropdown" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                Change Role
                            </a>
                            <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">                               
                                <a href="_actions/role.php?id=<?= $user->id ?>&role=1"
                                    class="dropdown-item">User
                                </a>
                                <a href="_actions/role.php?id=<?= $user->id ?>&role=2"
                                    class="dropdown-item">Manager
                                </a>
                                <a href="_actions/role.php?id=<?= $user->id ?>&role=3"
                                    class="dropdown-item">Admin
                                </a>
                            </div>

                            <?php if($user->suspended): ?>
                                <a href="_actions/unsuspend.php?id=<?= $user->id ?>"
                                class="btn btn-sm btn-danger">Suspended</a>
                            <?php else: ?>
                                <a href="_actions/suspend.php?id=<?= $user->id ?>"
                                class="btn btn-sm btn-outline-success">Active</a>
                            <?php endif ?>
                            <?php if($user->id !== $auth->id): ?>
                                <a href="_actions/delete.php?id=<?= $user->id ?>"
                                class="btn btn-sm btn-outline-danger"
                                onClick="return confirm('Are you sure?')">Delete</a>
                            <?php endif ?>
                        </div>

                        <?php else: ?>
                            ###
                        <?php endif ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    
</body>
</html>