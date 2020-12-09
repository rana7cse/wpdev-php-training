<?php
namespace Crud\App;

include 'Database.php';

class User
{
    private $name;
    private $age;
    private $village;

    private $db;

    public function __construct($name, $age, $village)
    {
        $this->name = $name;
        $this->age = $age;
        $this->village = $village;
        $this->db = new Database();
    }

    public function registration()
    {
        $this->db->saveData([
            'id' => uniqid(),
            'name' => $this->name,
            'age' => $this->age,
            'village' => $this->village
        ]);
    }

    public function update($id, $newData)
    {
        $this->db->updateData($id, $newData);
    }
}