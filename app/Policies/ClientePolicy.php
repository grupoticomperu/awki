<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Cliente;

class ClientePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */

    public function misclientes(User $user, Cliente $cliente)
    {
        if($user->id == $cliente->user_id){
            return true;
        }else{
            return false;
        }
        //
    }     


     

}
