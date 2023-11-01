<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionHistorialController extends Controller
{
    //

    public function index(){

        $notificaciones= auth()->user()->readNotifications; //mostrar las leidas

        return view('notificacioneshistorial.index',[
               
            'notificaciones'=> $notificaciones
              
            ]);
    }
}
