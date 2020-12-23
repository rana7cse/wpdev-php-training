<?php
include "vendor/autoload.php";
include "database.php";
$id = $_GET['id'];

if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $statement = $db->con->query("
        UPDATE users 
        SET `name` = '{$name}', `email` = '{$email}', `password` = '{$password}'
        where `id` = {$id}
    ");
    if ($statement) {
        echo "update hoye geche";
    } else {
        dump($db->con->error);
    }
}

$stmt = $db->con->query("SELECT * FROM users where id = {$id}");
$user = $stmt->fetch_object();
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
    <a href="index.php" class="btn btn-success">All user</a>
    <form action="" method="post">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" value="<?= $user->name ?>" name="name" required placeholder="Name">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" value="<?= $user->email ?>" name="email" required placeholder="Email">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" value="<?= $user->password ?>" name="password" required placeholder="Pass">
        </div>
        <button>Submit</button>
    </form>
</div>
</body>
</html>
