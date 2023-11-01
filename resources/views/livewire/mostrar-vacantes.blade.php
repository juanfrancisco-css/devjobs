<div class="space-y-7">
   
   
    <div class="mb-5">
                    <h3 
                    class="font-bold text-3xl text-grey-800 my-3"
                    >
                    {{ $vacante->titulo}}
                    </h3>
    <div class="md:grid md:grid-cols-2 bg-gray-50 py-4 my-3">
        <p class="font-bold text-sm uppercase text-gray-800 my-3">
            Empresa
            <span class="normal-case font-normal">
                {{ $vacante->empresa}}
            </span>
        </p>
        <p class="font-bold text-sm uppercase text-gray-800 my-3">
            Ultimo dia para postularse
            <span class="normal-case font-normal">
                {{ $vacante->ultimo_dia->toFormattedDateString()}}
            </span>
        </p>
        <p class="font-bold text-sm uppercase text-gray-800 my-3">
            Categoria
            <span class="normal-case font-normal">
                {{ $vacante->categoria->categoria}}
            </span>
            {{-- Accedemos al method que nos trae la informacion 
                al invocar el method nos situaremos en la tabla
                y tan solo tenemos q llamar su campo
             --}}
        </p>
        <p class="font-bold text-sm uppercase text-gray-800 my-3">
            Salario
            <span class="normal-case font-normal">
                {{ $vacante->salario->salario}}
            </span>
        </p>
       

   </div>
   <div class="md:grid md:grid-cols-6 gap-7"> 
    <div class="md:col-span-2">
        <img src="{{asset('storage/vacantes/'.$vacante->imagen) }}" 
        alt="imagen Vacante  {{$vacante->titulo}} "
        class=""
        >
    </div>
    <div class="md:col-span-4">
       <h2 class="text-2xl font-bold mb-5"> Descripcion del Puesto</h2>
        <p class="normal-case font-normal">
            {{ $vacante->descripcion}}
        </p>
    </div>
   </div>
  
    </div>

  {{--
    @can('create',App\Models\Vacante::class)
        <p>Este es un reclutador</p>
    @else
         <livewire:postular-vacante />
    @endcan
--}}
<!-- 
    Para postularse 
    es un desarrollador buscando empleo 
-->
@cannot('create',App\Models\Vacante::class)
                    @auth
                    <livewire:postular-vacante :vacante="$vacante" />
                    @endauth
                   
@endcannot
    @guest
            <div 
            class="md:grid gap-4 text-center">
                    <p class="">
                        <span class="">¿Deseas aplicar a esta vacante?</span>
                                <a 
                                class="font-bold text-indigo-600"
                                href="{{route('register')}}">
                                Obtener una cuenta y aplica a esta y a otras vacantes
                                </a>
                    </p>
            </div>
    @endguest
</div>
