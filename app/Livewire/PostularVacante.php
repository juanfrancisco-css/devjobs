<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use App\Models\Candidato;
use App\Notifications\NuevoCandidato;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class PostularVacante extends Component
{

    use WithFileUploads; //extension para habilitar subir imagenes y archivos
    public $cv;
    public $vacante;
    public $ispostulated;

   

    protected $rules=[
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
          //   dd($vacante);

          $this->vacante=$vacante; //cojo el modelo
         // Candidato::where('user_id',$user->id);

         //$this->ispostulated = $this->vacante->candidatos()->where('user_id',auth()->user()->id);
        /* $ispostulated = DB::table('candidatos')
         ->join('users', 'candidatos.user_id', '=', 'users.id')
         ->join('vacantes', 'candidatos.vacante_id', '=', 'vacantes.id')
         ->where('candidatos.user_id', auth()->user()->id)
         ->where('candidatos.vacante_id', $this->vacante->id)
         ->count();
*/
/*$this->ispostulated = Candidato::where('user_id', auth()->user()->id)
    ->where('vacante_id',$this->vacante->id )
    ->exists();
    */
 // devuelve true si exiten 
 //si hay coincidencia devuelve true
 //si no hay devuelve false
        

    }

    public function postularme()
    {
            
        //validar
        $datos= $this->validate();//ya tiene a todo ese request validado

        //almacenar CV en el disco duro
        $cv=$this->cv->store('public/cv');//nos devuelve la ubicacion
        //$nombre_imagen=str_replace('public/vacantes/','',$imagen);
        $datos['cv']=str_replace('public/cv/','',$cv);//reescribir
        //buscar , sustituir por espacios en blanco,de donde

    // if(!$this->ispostulated){
        if(!$this->vacante->checkcandidato(auth()->user())){

        //crear el candidato 
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv'      =>  $datos['cv']
          ]);
          //para acceder a los methodos que tiene candidatos()
     }
     else{
        session()->flash('mensaje','Ya te has postulado a esta vacante');
        return redirect()->back();

     }
        

        //crear notoficacion y email para el reclutador
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id , $this->vacante->titulo,auth()->user()->id));
        //me situo en la tabla de usuario

        //mostrar al usuario un mensaje q de se postulo a esa vacante
             session()->flash('mensaje','Te has postulado a esta vacante ¡Muchas Suerte!');
             return redirect()->back();

    }
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
