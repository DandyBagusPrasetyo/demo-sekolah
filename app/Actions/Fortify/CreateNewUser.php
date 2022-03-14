<?php

namespace App\Actions\Fortify;

use App\Models\Siswa;
use App\Models\User;
use App\Notifications\WelcomeEmailNotification;
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
            'nik' => ['required', 'numeric'],
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'phone' => ['required'],
            'password' => $this->passwordRules(),
        ])->validate();

        $siswa = Siswa::create([
            'nik' => $input['nik'],
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
        ]);

        $siswa->notify(new WelcomeEmailNotification($siswa));

        return User::create([
            'nik' => $input['nik'],
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
