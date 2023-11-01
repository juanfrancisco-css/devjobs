<div>
   <form class="space-y-7" wire:submit.prevent='CrearVacante'>
    <div>
     {{-- Titulo de la Vacante--}}
          <x-input-label for="titulo" :value="__('Titulo de la Vacante')" />
          <x-text-input 
          id="titulo" 
          class="block mt-1 w-full" 
          type="text" 
          wire:model="titulo"
          :value="old('titulo')" 
           placeholder="Titulo Vacante"
          />
          <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
          @error('titulo')
               <p>Hay errores</p>
               <livewire:mostrar-alerta :mensaje="$message" />
          @enderror
     </div>   
     <div>
          {{-- Salario Mensual--}}
               <x-input-label for="salario" :value="__('Salario Mensual')" />
               <select
                    id="salario"
                    wire:model="salario"
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
               >
                  <option value="">-- Seleccione -- </option>
                  <!--
                    Paso de datos a travez de la clase de livewire

                  -->
                         @foreach ($salarios as $salario)
                         <option value="{{$salario->id}}">{{$salario->salario}} </option>
                         @endforeach  
               </select>
               <x-input-error :messages="$errors->get('salario')" class="mt-2" />
                    @error('salario')
                    <p>Hay errores</p>
                    <!--
                         Le pasamos la variable de error pero debemos de declararla en la clase
                    -->
                    <livewire:mostrar-alerta :mensaje="$message" />
               @enderror
     </div>

     <div>
          {{-- categoria --}}
               <x-input-label for="categoria" :value="__('Categoria')" />
               <select
                    id="categoria"
                    wire:model="categoria"
                    class="border-gray-300 text-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
               >
               <option value="">-- Seleccione -- </option>
               <!--
                 Paso de datos a travez de la clase de livewire
                 
               -->
              
                      @foreach ($categorias as $categoria)
                      <option value="{{$categoria->id}}"> {{$categoria->categoria}} </option>
                      @endforeach  
                    
               </select>
               <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
                    @error('categoria')
                    <p>Hay errores</p>
                    <!--
                         Le pasamos la variable de error pero debemos de declararla en la clase
                    -->
                    <livewire:mostrar-alerta :mensaje="$message" />
               @enderror
     </div>
     
     <div>
          {{-- empresa--}}
               <x-input-label for="empresa" :value="__('Empreesa')" />
               <x-text-input 
               id="empresa" 
               class="block mt-1 w-full" 
               type="text" 
               wire:model="empresa" 
               :value="old('empresa')" 
               
              placeholder="Empresa ej. Netfix, Uber , Shopify"
               />
               <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
                    @error('empresa')
                    <p>Hay errores</p>
                    <!--
                         Le pasamos la variable de error pero debemos de declararla en la clase
                    -->
                    <livewire:mostrar-alerta :mensaje="$message" />
               @enderror
          </div>   

          <div>
               {{-- ultimo dia--}}
                    <x-input-label for="ultimo_dia" :value="__('Ultimo Dia para postularse')" />
                    <x-text-input 
                    id="ultimo_dia" 
                    class="block mt-1 w-full" 
                    type="date" 
                    wire:model="ultimo_dia" 
                    :value="old('ultimo_dia')" 
                    
                    />
                    <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
                         @error('ultimo_dia')
                         <p>Hay errores</p>
                         <!--
                              Le pasamos la variable de error pero debemos de declararla en la clase
                         -->
                         <livewire:mostrar-alerta :mensaje="$message" />
                    @enderror
               </div>   

               <div>
                    {{-- descripcion--}}
                         <x-input-label for="descripcion" :value="__('Descripción Puesto')" />
                         <textarea 
                         id="descripcion" 
                         wire:model="descripcion" 
                         placeholder="Descripcion General del Puesto"
                         class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                         rows="10" cols="50"
                         >
                         </textarea>
                         <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                              @error('descripcion')
                              <p>Hay errores</p>
                              <!--
                                   Le pasamos la variable de error pero debemos de declararla en la clase
                              -->
                              <livewire:mostrar-alerta :mensaje="$message" />
                         @enderror
               </div>   
               <div>
                    {{-- imagen--}}
                         <x-input-label for="imagen" :value="__('Imagen')" />
                         <x-text-input 
                         id="imagen" 
                         class="block mt-1 w-full" 
                         type="file" 
                         wire:model="imagen" 
                         accept="image/*"
                         />
                         <!--
                              Con livewire tenemos una preview de la imagen
                              No es la imagen se ve va subir al servidor 
                              Gracias al wire:model='"imagen' podemos acceder a ese metodo
                              utlizamos la variable
                              se nos concede una url temporal
                         -->
               <div class="my-5 w-1/2">
                          @if ($imagen)
                               Imagen:
                               <img src="{{ $imagen->temporaryUrl()}}">
                          @endif
               </div>

                         <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
                              @error('imagen')
                              <p>Hay errores</p>
                              <!--
                                   Le pasamos la variable de error pero debemos de declararla en la clase
                              -->
                              <livewire:mostrar-alerta :mensaje="$message" />
                         @enderror
               </div>  
               <x-primary-button 
               class="w-full justify-center" 
              
               >
                    {{ __('Crear Vacante') }}
                </x-primary-button> 
                
     
   </form> 



</div>

