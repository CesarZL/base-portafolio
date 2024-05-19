<div class="bg-gray-100 dark:bg-gray-700 p-5 mt-10 flex justify-center flex-col items-center rounded-lg">

    <h3 class="text-center text-2xl font-bold my-4">
        Postular a la vacante
    </h3>

    @if(session()->has('mensaje'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-2 mb-5" role="alert">
            <p>{{ session('mensaje') }}</p>
        </div>                
    @else
        <form class="w-96 mt-5" wire:submit.prevent="postular">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum Vitae')"/>
                <x-text-input 
                id="cv" 
                class="block mt-1 w-full" 
                wire:model="cv"
                type="file" 
                accept="application/pdf"
            />      
            </div>

            @error('cv')
                <livewire:MostrarAlerta :message="$message" />
            @enderror


            <x-primary-button class="my-5 w-full">
                Postular
            </x-primary-button>

        </form>
    @endif

    

</div>
