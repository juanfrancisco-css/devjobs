<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacante;
use Illuminate\Auth\Access\Response;

class VacantePolicy
{
   
    public function viewAny(User $user)
    {
        return $user->rol === 2;
        //true si coincide
        //el rol de recrutador , osea puede administrar las vacantes
        //si es verdadero , si se cumple esta autorizado
    }

     
    public function create(User $user)
    {
        return $user->rol === 2;
        //true si coincide
        //el rol de recrutador , osea puede administrar las vacantes
        //si es verdadero , si se cumple esta autorizado
    }
    
    public function update(User $user, Vacante $vacante)
    {
        
        return $user->id === $vacante->user_id;
        //Ya viene por defecto asociado con el modelo user 
        //nosotros le asociamos el modelo vacante
        //el usuario autenticado es igual al usuario que creo la vacante 
        //devuelve true si si coincide 
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Vacante $vacante)
    {
        //
    }

    
}
