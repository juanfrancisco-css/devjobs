<?php

namespace App\Models;

use App\Models\User;
use App\Models\Salario;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacante extends Model
{
    use HasFactory;
    
   // protected $dates = ['ultimo_dia'];
   protected $casts = [
    'ultimo_dia' => 'datetime'
];

    protected $fillable = [
        'titulo',
        'salario_id',
        'categoria_id',
        'empresa',
        'ultimo_dia',
        'descripcion',
        'imagen',
        'user_id'
    ];

    //Ahora puedo acceder a sus campos
    
    //la vacante le pertenece una categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

     //la vacante le pertenece un salario
    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }

    //en una vacante hay muchos candidatos
    public function candidatos()
    {
            return $this->hasMany(Candidato::class)->orderBy('created_at','DESC');
    }

    //**************************añadido por mi*************************/
    public function checkcandidato(User $user)
    {
        return $this->candidatos->contains('user_id',$user->id);

        //devuelve true si ya se postulo
        //si hay coincidencia
    }
/***********************************fin******************************* */
    
public function reclutador() 
{
    //al salir de las convenciones debemos de especificar la fk
    //podriamos ponerle user() y evistar espeficar donde esta la fk pero queremos dejar mas claro nuestro codigo
    return $this->belongsTo(User::class,'user_id');
}
    

   

}
