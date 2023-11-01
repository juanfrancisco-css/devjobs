
<div class="bg-gray-100 p-5 mt-10 flex-cols justify-center items-center">
   
   <h3 class="text-center text-2xl font-bold my-4">
    Postularme a esta vacante
   </h3>
@if(session()->has('mensaje'))
   <div class= " uppercase bg-green-500 text-white border-green-700 border-solid p-2 text-center justify-center rounded">
        {{ session('mensaje')}}
        
   </div>
@else
<form class="w-95 mt-5" wire:submit.prevent='postularme'>
    <div class="mb-4 ">
        <x-input-label for="cv" :value="__('Curriculum o Hoja de Vida (PDF)')" />
        <x-text-input 
        id="cv" 
        class="block mt-1 w-full" 
        type="file" 
        wire:model="cv"
        accept=".pdf"
        />
        @error('cv')
                     
                      <!--
                           Le pasamos la variable de error pero debemos de declararla en la clase
                      -->
                      <livewire:mostrar-alerta :mensaje="$message" />
        @enderror
    </div>
    {{--
    @if(!$ispostulated)
            <x-primary-button 
            class="w-full justify-center" 
            >
                {{ __('Postularse') }}
            </x-primary-button > 
    @else
            <x-primary-button 
            class="w-full justify-center bg-indigo-500 cursor-not-allowed  " 
          
            >
                {{ __('Ya se postulo') }}
            </x-primary-button> 
    @endif
  --}}

      
    @if ($vacante->checkcandidato(auth()->user()))
    <!--
        Ya se ha postulado a esa vacante  
    -->
    <x-primary-button class="w-full justify-center bg-indigo-300 cursor-not-allowed  " >
        {{ __('Ya te has postulado') }}
    </x-primary-button> 
    @else
     <!--
       No se ha postulado
    -->
    <x-primary-button class="w-full justify-center" >
                {{ __('Postularse') }}
    </x-primary-button > 
                
    @endif

   
</form>


@endif
  
</div>
