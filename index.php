<?php
    include "vendor/autoload.php";
    include "database.php";
    $statement = $db->con->query("SELECT * FROM users");
    $sn = 1;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User list</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <a href="insert_user.php" class="btn btn-success">Add user</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($user = $statement->fetch_object()): ?>
            <tr>
                <td><?= $sn++ ?></td>
                <td><?= $user->name ?></td>
                <td><?= $user->email ?></td>
                <td><?= $user->password ?></td>
                <td><a href="edit_user.php?id=<?= $user->id ?>" class="btn btn-sm btn-warning">Edit</a></td>
            </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
