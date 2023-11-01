<?php

namespace App\Livewire;

use Livewire\Component;

class MostrarAlerta extends Component
{
    public $mensaje;//debemos de declararlo para poder usarla 
    public function render()
    {
        return view('livewire.mostrar-alerta');
    }
}
