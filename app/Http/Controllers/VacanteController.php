<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
            $this->authorize('viewAny', Vacante::class);

              
           
            //lo hago llamar y le paso el modelo de vacante
            //esto previene el acceso a todo lo relacionado con ese modelo 
            //si se cumple la regla 
       
            return view('vacantes.index');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('create', Vacante::class);
        return view('vacantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacante $vacante)
    {
        return view('vacantes.show',[
            'vacante'=>$vacante
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacante $vacante)
    {
        //
       //dd($vacante);
        /*
             Hago la llamada del methodo diciendole cual es y pasandole la variable 
        */
       $this->authorize('update',$vacante);

        return view('vacantes.edit',[
            'vacante'=>$vacante
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
