<?php


class Database
{
    private $host = "localhost";
    private $user = "root";
    private $password = "123456";
    private $dbName = "training";

    public $con;

    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->dbName);
    }

    public function close()
    {
        $this->con->close();
    }
}

$db = new Database();

$createUserTable = "
    CREATE TABLE `users` (
	`id` INT unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(100) NOT NULL,
	`email` VARCHAR(100) UNIQUE NOT NULL,
	`password` VARCHAR(100) NOT NULL
    );
";

$insertAUser = "
    INSERT into users 
    (`name`, `email`, `password`) 
    VALUES 
    ('Jamilk', 'jamilk@gmail.com', '123456')
";

$selectAllUsers = "
    SELECT * FROM users
";