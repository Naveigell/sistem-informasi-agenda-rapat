<?php

namespace App\Auth\Guard;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionGuard implements Guard {

    protected $request;
    protected $provider;

    public function __construct(UserProvider $provider, Request $request){
        $this->request = $request;
        $this->provider = $provider;
    }

    public function role(){
        return Session::get('role');
    }

    public function check() {
        return Session::get('id') != null && Session::get('role') != null;
    }

    public function guest() {

    }

    public function user() {

    }

    public function id() {
        return Session::get('id');
    }

    public function destroy() {
        Session::forget('id');
        Session::forget('role');

        return Session::get('id') == null && Session::get('role') == null;
    }

    public function store(string $id, string $role) {
        Session::put('id', $id);
        Session::put('role', $role);
    }

    public function validate(array $credentials = []) {
        if (empty($credentials['email']) || empty($credentials['password'])) {
            return false;
        }

        return true;
    }

    public function setUser(Authenticatable $user) {

    }
}
