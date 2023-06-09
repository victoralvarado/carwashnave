<?php

namespace App\Actions\Jetstream;

use App\Models\User;
use Laravel\Jetstream\Contracts\DeletesUsers;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     */
    public function delete(User $user): void
    {
        /*$user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->delete();*/
        // Actualiza el campo 'estado' a 'i'
        //$user->estado = 'i';
        //$user->save();
        $userId = $user->id;
        if ($userId === 1) {
            return ;
        }else{
            $user->estado = 'i';
            $user->save();
        }
    }
}
