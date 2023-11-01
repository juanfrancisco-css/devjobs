<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{

    public $termino;
    public $salario;
    public $categoria;

    protected $listeners=['terminosbusqueda' => 'buscar'];

    public  function buscar($termino ,  $categoria , $salario){
       // dd("en el componente padre");

       $this->termino  = $termino;
       $this->salario  = $salario;
       $this->categoria= $categoria;

      // dd($this->termino);
    }
    public function render()
    {

        //$vacantes=Vacante::all();
//where cuanod existe 
//pero when lo q hace es verificar si hay algo en $this->termino , si tiene algo procede a la busqueda

        $vacantes= Vacante::when($this->termino, function ($query){
                                                 $query->where('titulo','LIKE',"%".$this->termino."%");
        
                             })
                             ->when($this->categoria, function($query){
                                $query->orWhere('empresa','LIKE',"%".$this->termino."%");
                            })
                            ->when($this->categoria, function($query){
                                    $query->where('categoria_id',$this->categoria);
                            })
                             ->when($this->salario, function($query){
                                    $query->where('salario_id',$this->salario);
                            })
                             ->paginate(10);

        return view('livewire.home-vacantes',[
            "vacantes" => $vacantes
        ]);
    }
}
