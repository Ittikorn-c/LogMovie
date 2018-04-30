<?php

namespace App\Policies;

use App\User;
use App\UserReview;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserReviewPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(User $user){
        return $user->id === "user";
    }

    public function view(User $user, UserReview $userreview){
        return  true;
    }
        
    public function update(User $user, UserReview $userreview){
        return $user->id === $userreview->user_id;
    }
}
