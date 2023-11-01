<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    //solo tienen un method 
    //solo queremos acceder a la lista de notificacioness
    public function __invoke(Request $request)
    {
        //obtener las notificaciones no leidas
       $notificaciones= auth()->user()->unreadNotifications;

       //limpiar las notificaciones
       auth()->user()->unreadNotifications->markAsRead();//tan solo recargar la pagina se liempia la vista

       // dd('Desde notificacion controller');

       return view('notificaciones.index',[
               
                  'notificaciones'=> $notificaciones
                    
       ]);
    }

    
}
