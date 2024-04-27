<?php

namespace App\Http\Controllers;

use App\Models\Users; // Certifique-se de importar a model Users
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getUsersByType(Request $request, $type)
    {
        $query = Users::filter($request)->get();

        $usersArray = $query->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'state' => $user->state,
                'age' => $user->age,
                'address' => $user->address,
            ];
        });

        $response = [
            'data' => $usersArray,
            'meta' => [
                'total' => count($usersArray)
            ]
        ];

        return response()->json($response);
    }

    public function getUsersByTypeDetails(Request $request)
    {
        $query = Users::filter($request);
        $query = $query->paginate(10);

        $usersArray = $query->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'state' => $user->state,
                'age' => $user->age,
                'address' => $user->address,
            ];
        });

        $response = [
            'data' => $usersArray,
            'meta' => [
                'total' => $query->total(),
                'per_page' => $query->perPage(),
                'current_page' => $query->currentPage(),
                'last_page' => $query->lastPage(),
            ]
        ];

        return response()->json($response);
    }
}
