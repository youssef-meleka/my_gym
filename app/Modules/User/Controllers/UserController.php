<?php

namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\User\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getUsersByRole($role)
    {
        $users = $this->userService->getUsersByRole($role);
        return response()->json($users);
    }

    public function updateProfile(Request $request, $id)
    {
        $user = $this->userService->updateProfile($id, $request->all());
        return response()->json($user);
    }

    public function register(Request $request)
    {
        $user = $this->userService->registerUser($request->all());
        return response()->json($user, 201);
    }

    public function verifyEmail($id)
    {
        $user = $this->userService->verifyEmail($id);
        return response()->json($user);
    }

    public function resetPassword(Request $request)
    {
        $user = $this->userService->resetPassword($request->email, $request->newPassword);
        return response()->json($user);
    }
}
