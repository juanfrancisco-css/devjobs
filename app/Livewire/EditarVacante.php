<?php

namespace App\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;


class EditarVacante extends Component
{
   // public $id;//palabra reservada 
   public $vacante_id;
   //public  $vacante; en el caso de q no hubiera constructor
   public $titulo;
   public $salario;
   public $categoria;
   public $empresa;
   public  $ultimo_dia;
   public $descripcion;
   public $imagen;
   public $imagen_nueva;

   public $vacante;

   use WithFileUploads; //extension para habilitar subir imagenes

   protected $rules = [
    'titulo' => 'required|string',
    'salario' => 'required',
    'categoria' => 'required',
    'empresa' => 'required',
    'ultimo_dia' => 'required',
    'descripcion' => 'required',
   //la imagen no va hacer obligatoria
   'imagen_nueva' => 'nullable|image|max:1024'
];

   public function mount (Vacante $vacante) //es igual cuando se instancia , cuando se hace llamar se instancia estos atributos
   {      /*
           $this->id      = $vacante->id;  [ESTO NO VA A FUNCIONAR]
        
            PORQUE?
            Es una palabra reservada ese (id), puedes renombrar la funcion a $vacante_id
            */
            //input             obj de la BBDD
            $this->vacante_id =$vacante->id; //nevesito el id de la vacante para poder filtrarla y saber cual es
            $this->titulo   =  $vacante->titulo; 
            $this->salario  =  $vacante->salario_id; //porque cojo el valuue que es un numero 
            $this->categoria=  $vacante->categoria_id;
            $this->empresa  =  $vacante->empresa;
            $this->ultimo_dia= Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');//nos piden un formato
            $this->descripcion = $vacante->descripcion;
            $this->imagen = $vacante->imagen;


   }

   public function EditarVacante ()//la funcion que va en el formulario encargada
   {
    $datos= $this->validate();//ya tiene a todo ese request validado

    //si hay una nueva imagen
    if($this->imagen_nueva){
        $imagen= $this->imagen_nueva->store('public/vacantes'); //nos devuelve la ruta y el id de esa imagen q se guardo
       //almacenamos
        $datos['imagen'] = str_replace('public/vacantes/','',$imagen);//para cortar y solo nos quede la referencia
                                    //  buscar            sustituir por nada  de cual variable    
    }

    //Encontrar la vacante a editar
    $vacante = Vacante::find($this->vacante_id);

    //Asignar los valores
    //bbdd                  input
  $vacante->titulo       = $datos['titulo'];
  $vacante->salario_id   = $datos['salario'];
  $vacante->categoria_id = $datos['categoria'];
  $vacante->empresa      = $datos['empresa'];
  $vacante->ultimo_dia   = $datos['ultimo_dia'];
  $vacante->descripcion  = $datos['descripcion'];
  //imagen
  $vacante->imagen       =  $datos['imagen'] ?? $vacante->imagen;
  

    //Guardar los valores
$vacante->save();

    //redireccionar
    session()->flash('mensaje','La Vacante se actualizo correctamente');
    return redirect()->route('vacantes.index');
   }

    public function render()
    {
       

        //traere los datos de esas tablas
        //no necesito rellenar el fillable del modelo pues no voy a registrar datos solo extraerlos
        //consultar BBDD
        $salarios=Salario::all(); //traernos todos los registros
        $categorias=Categoria::all(); //traernos todos los registros
        //es una consulta a la BBDD
        //enviarlos hacia esa ruta
        return view('livewire.editar-vacante',[
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
