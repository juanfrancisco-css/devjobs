<?php

namespace App\Livewire;

use Livewire\Component;

class MostrarVacantes extends Component
{

    public $vacante;
    
    public function render()
    {
        return view('livewire.mostrar-vacantes');
    }
}
