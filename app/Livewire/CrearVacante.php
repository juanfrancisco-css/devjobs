<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{

    public $titulo; //definimos la propiedad titulo
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads; //extension para habilitar subir imagenes

    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:1024',
    ];
    //maximoun mega

    public function CrearVacante ()
    {
              //validar los datos
        $datos= $this->validate();//ya tiene a todo ese request validado

        //almacenar la imagen
        $imagen=$this->imagen->store('public/vacantes');//nos devuelve la ubicacion
        //$nombre_imagen=str_replace('public/vacantes/','',$imagen);
        $datos['imagen']=str_replace('public/vacantes/','',$imagen);//reescribir
        //buscar , sustituir por espacios en blanco,de donde
       // dd( $nombre_imagen);

       //crear la vacante
       //importar el modelo
       Vacante::create([
        'titulo'       =>  $datos['titulo'],
        'salario_id'   =>  $datos['salario'],
        'categoria_id' =>  $datos['categoria'],
        'empresa'      =>  $datos['empresa'],
        'ultimo_dia'   =>  $datos['ultimo_dia'],
        'descripcion'  =>  $datos['descripcion'],
        'imagen'       =>  $datos['imagen'], //$nombre_imagen pero como hemos reescrito
        'user_id'      =>   auth()->user()->id
       ]);

        //crear un mensaje
        session()->flash('mensaje','La Vacante se publico correctamente');

       //redireccionar 
       return redirect()->route('vacantes.index');

      
    }
  
    public function render()
    {
        //no necesito rellenar el fillable del modelo pues no voy a registrar datos solo extraerlos
        //consultar BBDD
        $salarios=Salario::all(); //traernos todos los registros
        $categorias=Categoria::all(); //traernos todos los registros
        //es una consulta a la BBDD
        return view('livewire.crear-vacante',[
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
