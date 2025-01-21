<?php


// app/Modules/User/Repositories/UserRepositoryInterface.php
namespace App\Modules\User\Repositories;

interface UserRepositoryInterface
{
    public function getByRole($role);
    public function find($id);
    public function findByEmail($email);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
