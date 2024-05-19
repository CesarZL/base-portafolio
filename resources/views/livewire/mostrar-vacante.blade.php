<div class="p-10 text-gray-800 dark:text-gray-200">
    <div class="mb-5">
        <h3 class="text-2xl font-bold my-3">{{$vacante->titulo}}</h3>
        
        <div class="md:grid md:grid-cols-2 bg-gray-100 dark:bg-gray-700 p-5 rounded-lg my-10">
            <p class="text-sm my-3">
                Empresa:
                <span class="font-semibold normal-case">
                    {{$vacante->empresa}}
                </span>
            </p>

            <p class="text-sm my-3">
                Última fecha para aplicar:
                <span class="font-semibold normal-case">
                    {{$vacante->ultimo_dia->toFormattedDateString()}}
                </span>
            </p>

            <p class="text-sm my-3">
                Categoría:
                <span class="font-semibold normal-case">
                    {{$vacante->categoria->categoria}}
                </span>
            </p>

            <p class="text-sm my-3">
                Salario:
                <span class="font-semibold normal-case">
                    {{$vacante->salario->salario}}
                </span>
            </p>
        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{asset('storage/vacantes/'.$vacante->imagen)}}" alt="Imagen de la vacante {{$vacante->titulo}}" class="object-cover rounded-lg">
        </div>

        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-3">Descripción de la vacante</h2>
            <p class="text-sm">{{$vacante->descripcion}}</p>
        </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-100 dark:bg-gray-700 p-5 rounded-lg text-center">
            <p>
                ¿Deseas aplicar a esta vacante? <a href="{{route('register')}}" class="text-blue-500">Crea una cuenta</a> o <a href="{{route('login')}}" class="text-blue-500">Inicia sesión</a>
            </p>
        </div>
    @endguest

    @auth
        @cannot('create', App\Models\Vacante::class)
            <livewire:postular-vacante :vacante="$vacante"/>
        @endcannot
    @endauth
        

</div>
