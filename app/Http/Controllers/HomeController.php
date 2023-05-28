<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index()
    {
        return true;
    }

    /**
     * @param Collection<User> $users
     * @return bool
     */
    private function areUsersRegistered(Collection $users): bool
    {
        /** @var User $foo */
        $foo = $users->first;
        $foo->hasEmail();
        foreach ($users as $user) {
            if (!$user->hasEmail()) {
                return false;
            }
        }
        return true;
    }
}
