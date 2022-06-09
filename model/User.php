<?php

require_once __DIR__ . '/../configuration/Config.php';
require_once __DIR__ . '/../connection/Connection.php';

class UserModel
{
    private function url(): string
    {
        return Config::getUrl();
    }

    public function getUsers()
    {
        return Connection::connectToRest($this->url(), 'get');
    }

    public function createUser(array $data)
    {
        Connection::$user_data = $data;

        return Connection::connectToRest($this->url(), 'post');
    }

    public function updateUser(int $id, array $data)
    {
        Connection::$user_data = $data;

        return Connection::connectToRest($this->url() . $id, 'put');
    }

    public function deleteUser(int $id)
    {
        return Connection::connectToRest($this->url() . $id, 'delete');
    }
}
