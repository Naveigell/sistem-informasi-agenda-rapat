<?php
namespace App\Traits;

trait Routes {

    /**
     * Check if routes is permitted to current user
     *
     * @param string $role
     * @param string $path
     * @return bool
     */
    public function permitted(string $role, string $path) {

        $permittedRoute = explode('/', $path)[0];

        return $role == $permittedRoute;
    }
}

