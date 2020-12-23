<?php
include "vendor/autoload.php";
include "database.php";
$statement = null;

if (!empty($_REQUEST)) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $statement = $db->con->query("
        INSERT into users 
        (`name`, `email`, `password`) 
        VALUES 
        ('{$name}', '{$email}', '{$password}')
    ");
}

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
    <script>
        <?php if ($statement) : ?>
        alert("User added saksessfully");
        <?php endif; ?>
    </script>
</head>
<body>
<div class="container">
    <a href="index.php" class="btn btn-success">All user</a>
    <form action="insert_user.php" method="post">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" required placeholder="Name">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" required placeholder="Email">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" required placeholder="Pass">
        </div>
        <button>Submit</button>
    </form>
</div>
</body>
</html>
