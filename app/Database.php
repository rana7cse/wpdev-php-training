<?php
namespace Crud\App;

class Database {
    private $filePath = __DIR__.'/../storage/database';
    private $data = [];
    private $isOpened = false;

    public function __construct()
    {
        $this->readFile();
    }

    public function readFile()
    {
        $content = file_get_contents($this->filePath);
        $this->data = json_decode($content, true);
        return $this;
    }

    public function saveData($data)
    {
        $this->data[] = $data;
        $this->saveContent();
    }


    public function updateData($id, $data)
    {
        $existingData = $this->data;

        $this->data = array_map(function ($user) use ($id, $data) {
            if($user['id'] === $id) {
                $data['id'] = $id;
                return $data;
            }
            return $user;
        }, $existingData);

        $this->saveContent();
    }

    public function saveContent()
    {
        $content = json_encode($this->data, JSON_PRETTY_PRINT);
        file_put_contents($this->filePath, $content);
    }

    public function getData()
    {
        return $this->data;
    }
}
