<form action="" class="md:w-1/2 space-y-5" wire:submit.prevent="crearVacante">

    {{-- Vacante --}}
    <div>
        <x-input-label for="titulo" :value="__('Titulo de la vacante')" />
        <x-text-input 
            id="titulo" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="titulo" 
            :value="old('titulo')" 
            placeholder="Titulo de la vacante"
        />
            
        @error('titulo')
            <livewire:MostrarAlerta :message="$message" />
        @enderror

    </div>
           

    {{-- salario --}}
    <div>
        <x-input-label for="salario" :value="__('Salario mensual')" />
        <select 
            wire:model="salario" 
            id="salario" 
            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 
            focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
        >

        <option value=""> -- Selecciona un salario -- </option>
        @foreach ($salarios as $salario)
            <option value="{{$salario->id}}">{{$salario->salario}}</option>      
        @endforeach

        </select>

        @error('salario')
        <livewire:MostrarAlerta :message="$message" />
        @enderror

    </div>

    {{-- categoría --}}
    <div>
        <x-input-label for="categoria" :value="__('Categoría')"/>
        <select 
        wire:model="categoria"
        id="categoria"
        class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 
        focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
    >

        <option value=""> -- Selecciona una categoría -- </option>
        @foreach ($categorias as $categoria)
        <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>      
        @endforeach

    </select>

        @error('categoria')
        <livewire:MostrarAlerta :message="$message" />
        @enderror

    </div>

    {{-- Empresa --}}
    <div>
        <x-input-label for="empresa" :value="__('Nombre de la empresa')"/>
        <x-text-input 
            id="empresa" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="empresa" 
            :value="old('empresa')" 
            placeholder="Nombre de la empresa. Ej. Google"
        />
            
        @error('empresa')
        <livewire:MostrarAlerta :message="$message" />
        @enderror

    </div>

     {{-- Ultima fecha para aplicar --}}
     <div>
        <x-input-label for="ultimo_dia" :value="__('Ultima fecha para aplicar')"/>
        <x-text-input 
            id="ultimo_dia" 
            class="block mt-1 w-full" 
            type="date" 
            wire:model="ultimo_dia" 
            :value="old('ultimo_dia')" 
        />
            
        @error('ultimo_dia')
        <livewire:MostrarAlerta :message="$message" />
        @enderror

    </div>

    {{-- Descripción --}}
    <div>
        <x-input-label for="descripcion" :value="__('Descripción de la vacante')"/>
        <textarea 
            wire:model="descripcion"
            id="descripcion"
            placeholder="Descripción de la vacante"
            class="block mt-1 w-full h-72 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 
            focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"

        ></textarea>

        @error('descripcion')
        <livewire:MostrarAlerta :message="$message" />
        @enderror

    </div>

    {{-- Imagen --}}
    <div>
        <x-input-label for="imagen" :value="__('Imagen de la vacante')"/>
        <x-text-input 
            id="imagen" 
            class="block mt-1 w-full" 
            type="file" 
            wire:model="imagen"
            accept="image/png, image/jpeg, image/jpg"
        />

        @if ($imagen)
            <div class="my-5 p-2 border border-dashed border-gray-300 dark:border-gray-700">
                <img src="{{$imagen->temporaryUrl()}}" alt="Imagen de la vacante">
            </div>
        @endif

            
        @error('imagen')
        <livewire:MostrarAlerta :message="$message" />
        @enderror

    </div>

    <x-primary-button class="w-full justify-center">
        Guardar cambios
    </x-primary-button>



</form>