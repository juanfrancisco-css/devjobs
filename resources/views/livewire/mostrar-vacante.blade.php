<div>
    @if (count($vacantes) > 0) 
        
   
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @foreach ($vacantes as $vacante)
        <div class="p-6 text-gray-900 dark:text-gray-100 border-b border-gray-300 md:flex justify-between md:items-center">
                    <div class="leading-10">
                         <a 
                         href="{{route('vacantes.show',$vacante->id)}}"
                         class="text-xl font-bold "
                         >
                         {{$vacante->titulo}}
                         </a>
                         <p
                         class="text-sm text-gray-500 font-bold"
                         >
                            {{ $vacante->empresa}}
                         </p>
                         <p>
                            Ultimo dia {{ $vacante->ultimo_dia->format('d/m/Y')}}
                         </p>
                    </div>

                    <div class="flex  flex-col  md:flex-row gap-3 items-strech md:mt-0"> 
                        @if (count($vacante->candidatos))
                        <a 
                        href="{{route('candidatos.index',$vacante->id)}}"
                        class="bg-slate-800 py-3 px-4 rounded-lg text-sm text-white font-bold uppercase text-center"
                        >
                        Candidatos
                        </a>
                        @else
                        <a 
                        href="{{route('candidatos.index',$vacante->id)}}"
                        class="bg-slate-300 py-3 px-4 rounded-lg text-sm text-white font-bold uppercase text-center cursor-not-allowed"
                        >
                       Candidatos
                        </a>
                        @endif
                       

                        <a 
                        href="{{route('vacantes.edit',$vacante->id)}}"
                        class="bg-blue-800 py-3 px-4 rounded-lg text-sm text-white font-bold uppercase text-center"
                        >
                        Editar
                        </a>

               
                        <button
                       
                       wire:click="$dispatch('MostrarVacante', { vacante: {{ $vacante->id }} })"
                       type="button"
                       id="btn_delete"
                        class="bg-red-600 py-3 px-4 rounded-lg text-sm text-white font-bold uppercase text-center cursor-not-allowed"
                        >
                        Eliminar
                        </button>
                {{--
                        <button
                         wire:click="EliminarVacante2({{ $vacante->id}})"
                         type="button"
                          class="bg-red-600 py-3 px-4 rounded-lg text-sm text-white font-bold uppercase text-center"
                          >
                          Eliminar 
                          </button>
                --}}
                    </div>
          
        </div>
        @endforeach
       

    </div>
    @else
            <p 
            class="p-3 text-center text-sm text-grey-600"
            >
            No hay Vacantes
        </p>
    @endif
  
            <div class=" mt-10">
                   {{$vacantes->links()}}
            </div>

          
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  
  Livewire.on('MostrarVacante', (data) => {
        // Acciones a realizar cuando se dispare el evento
    //  console.log(data); // Aquí puedes acceder a los datos del evento, como data.vacante
    Swal.fire({
                title: '¿Eliminar Vacante?',
                text: "Una vacante eliminada no se puede recuperar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar!'
                }).then((result) => {
                if (result.isConfirmed) {
                    //eliminar la vacante
                  
                Livewire.dispatch('EliminarVacante', data);
                    Swal.fire(
                    'Eliminada!',
                    'La vacante ha sido eliminada exitosamente.',
                    'success'
                    )
                }
                })
    });

  

</script>

@endpush
