<?php


// app/Modules/User/Repositories/UserRepository.php
namespace App\Modules\User\Repositories;

use App\Modules\User\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getByRole($role)
    {
        return User::where('role', $role)->get();
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function findByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function update($id, array $data)
    {
        $user = User::find($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        return User::destroy($id);
    }
}
