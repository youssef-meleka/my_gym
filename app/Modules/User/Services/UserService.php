<?php

// app/Modules/User/Services/UserService.php
namespace App\Modules\User\Services;

use App\Modules\User\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUsersByRole($role)
    {
        return $this->userRepository->getByRole($role);
    }

    public function updateProfile($id, array $data)
    {
        $user = $this->userRepository->find($id);

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        return $this->userRepository->update($id, $data);
    }

    public function registerUser(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->userRepository->create($data);
    }

    public function verifyEmail($id)
    {
        return $this->userRepository->update($id, ['email_verified_at' => now()]);
    }

    public function resetPassword($email, $newPassword)
    {
        $user = $this->userRepository->findByEmail($email);
        $user->password = Hash::make($newPassword);
        $user->save();
        return $user;
    }
}
