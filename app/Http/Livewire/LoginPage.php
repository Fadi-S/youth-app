<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoginPage extends Component
{

    public $email;
    public $password;

    public $rules = [
        'email' => 'required|email|string',
        'password' => 'required|string',
    ];

    public function render()
    {
        return view('livewire.login-page')
            ->layout('components.auth');
    }

    public function login()
    {
        $this->validate();

        if($this->attemptLogin()) {
            $this->redirect('/');

            return;
        }

        /** TODO send error message to user */

    }

    private function attemptLogin()
    {
        return auth()->attempt([
            'email' => $this->email,
            'password' => $this->password
        ], true);
    }
}
