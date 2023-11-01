<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacante extends Component
{
    
    /*
    NO FUNCIONA LA CONEXION DE JS Y LKIVEWIRE MEDINATE EMIT
    EN LA VERSION 3 DEBE DE SER CON DISPACTH

    */

protected $listeners = ['prueba','EliminarVacante','vacanteId']; //siempre q declaras un emit
  

public function prueba(Vacante $vacante)
{
   

    dd('Desde prueba ' . $vacante->id);

}

public function EliminarVacante(Vacante $vacante) //ahora si funciona
{
   // dd('desde eliminar vacante '.$vacante->id);
   $vacante->delete();
   return redirect()->route('vacantes.index')->with('mensaje_eliminada',' La Vacante ha sido eliminada');

}

public function EliminarVacante2(Vacante $vacante)
{

      // dd("Eliminar la vacante cuyo id es ".$vacante->id . $vacante->titulo );
      $vacante->delete();

      return redirect()->route('vacantes.index')->with('mensaje_eliminada',' La Vacante ha sido eliminada');
}
    public function render()
    {

       
        //hago una consulta
        //la mejor manera de hacer una consulta es a traves del modelo
        //quiero sacar todas las vacantes que haya hecho el usuario autenticado , 

        $vacantes=Vacante::where('user_id',auth()->user()->id)->paginate(10);
        //Para la paginacion pues si hago la relacion de eloquent no puedo acceder a esa propiedad
        //un usuario puede tener muchas vacantes 1:N
        return view('livewire.mostrar-vacante',[
            'vacantes'=>$vacantes
        ]);
    }
}
