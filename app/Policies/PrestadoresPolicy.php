<?php

namespace App\Policies;

use App\Models\user;
use App\Models\prestadores;
use Illuminate\Auth\Access\HandlesAuthorization;

class PrestadoresPolicy
{
    use HandlesAuthorization;

    public function view(user $user, prestadores $prestadores)
    {   
        // dd($prestadores);
        return $user->id === $prestadores->ID_USUARIO;
    }

}
