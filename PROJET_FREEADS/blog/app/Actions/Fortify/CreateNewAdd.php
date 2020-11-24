<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'title' => [
                'required', 
                'string', 
                'max:255'
            ],
            'description' => [
                'required',
                'string',
                'description',
                'max:555',
            ],
            'image' => 
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'role_id' => intval($input['role_id']),
            'password' => Hash::make($input['password']),
        ]);
    }
}