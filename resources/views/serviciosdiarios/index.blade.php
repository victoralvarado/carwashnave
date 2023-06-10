<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Servicios Diarios') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-2 text-2xl font-medium text-gray-900">
                        Registro de Servicios Diarios
                    </h1>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-4 p-6 lg:p-8 bg-white border-b border-gray-200">

                    <form id="formulario-registro" action="/serviciosdiarios" method="POST"
                        class="w-5/6 max-[450px]:w-full place-self-center">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-fecha">
                                    Fecha
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-fecha" name="fecha" type="date"
                                    value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-hora">
                                    Hora
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-hora" name="hora" type="time"
                                    value="{{ \Carbon\Carbon::now()->format('H:i') }}">
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-persona-asignada">
                                    Epleado Asignado
                                </label>
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-persona-asignada" name="user_id" required>
                                    <option value="" selected>Seleccionar Empleado Asignado</option>
                                    @foreach ($users as $opcion)
                                        <option value="{{ $opcion->id }}">{{ $opcion->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-tipo-servicio">
                                    Tipo de Servcicio
                                </label>
                                @foreach ($servicios as $opcion)
                                    <label>
                                        <input type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-200 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                            name="servicios[]" id="grid-tipo-servicio"
                                            value="{{ $opcion->descripcion_servicio }}">
                                        {{ $opcion->descripcion_servicio }} (${{ $opcion->precio }}).&nbsp;
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-cliente">
                                    Cliente
                                </label>
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-cliente" name="cliente_id" required>
                                    <option value="" selected disabled>Seleccionar Cliente</option>
                                    @foreach ($clientes as $opcion)
                                        <option value="{{ $opcion->id }}">{{ $opcion->nombre }}
                                            {{ $opcion->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                            <button
                                class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                type="submit">
                                Guardar
                            </button>
                            <button
                                class="shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                type="reset">
                                Cancelar
                            </button>
                        </div>
                    </form>
                    <table class="w-full border-collapse border-2 border-gray-500">
                        <thead>
                            <tr>
                                <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Código</th>
                                <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Fecha</th>
                                <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Hora</th>
                                <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Empleado
                                    Asignado</th>
                                <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Cliente
                                </th>
                                <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Servicios
                                </th>
                                <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Acción</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($serviciosdiariosI as $serviciodiario)
                                <tr>
                                    <td class="border border-gray-400 px-4 py-2">{{ $serviciodiario->id }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $serviciodiario->fecha }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $serviciodiario->hora }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $serviciodiario->name }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $serviciodiario->nombre }}
                                        {{ $serviciodiario->apellido }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $serviciodiario->servicios }}</td>
                                    <td class="border border-gray-400 px-4 py-2">
                                        <!-- Modal toggle -->
                                        <button
                                            data-modal-target="modificar-serviciodiario-modal-{{ $serviciodiario->id }}"
                                            data-modal-toggle="modificar-serviciodiario-modal-{{ $serviciodiario->id }}"
                                            class="shadow my-1 bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                            type="button">
                                            Editar
                                        </button>

                                        <!-- Main modal -->
                                        <div id="modificar-serviciodiario-modal-{{ $serviciodiario->id }}"
                                            tabindex="-1" aria-hidden="true"
                                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-md max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                        data-modal-hide="modificar-serviciodiario-modal-{{ $serviciodiario->id }}">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="sr-only">Cerrar</span>
                                                    </button>
                                                    <div class="px-6 py-6 lg:px-8">
                                                        <h3
                                                            class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                                                            Modificar Servicio Diario
                                                        </h3>
                                                        <form id="formulario-servicio-{{ $serviciodiario->id }}"
                                                            action="/serviciosdiarios/{{ $serviciodiario->id }}"
                                                            method="POST" class="space-y-6">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                                    <label
                                                                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                                        for="grid-fecha">
                                                                        Fecha
                                                                    </label>
                                                                    <input
                                                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                                        id="grid-fecha" name="fecha" type="date"
                                                                        value="{{ $serviciodiario->fecha }}">
                                                                </div>
                                                                <div class="w-full md:w-1/2 px-3">
                                                                    <label
                                                                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                                        for="grid-hora">
                                                                        Hora
                                                                    </label>
                                                                    <input
                                                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                                        id="grid-hora" name="hora" type="time"
                                                                        value="{{ $serviciodiario->hora }}">
                                                                </div>
                                                            </div>
                                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                                <div class="w-full px-3">
                                                                    <label
                                                                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                                        for="grid-persona-asignada">
                                                                        Epleado Asignado
                                                                    </label>
                                                                    <select
                                                                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                                        id="grid-persona-asignada" name="user_id"
                                                                        required>
                                                                        <option value="">Seleccionar Empleado
                                                                            Asignado</option>
                                                                        @foreach ($users as $opcion)
                                                                            <option value="{{ $opcion->id }}"
                                                                                {{ $opcion->id == $serviciodiario->id_user ? 'selected' : '' }}>
                                                                                {{ $opcion->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                                <div class="w-full px-3">
                                                                    <label
                                                                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                                        for="grid-tipo-servicio">
                                                                        Tipo de Servcicio
                                                                    </label>
                                                                    @php
                                                                        $string = $serviciodiario->servicios;
                                                                        $valuesArray = explode(',', $string);
                                                                    @endphp
                                                                    @foreach ($servicios as $opcion)
                                                                        <label>
                                                                            <input type="checkbox"
                                                                                class="w-4 h-4 text-blue-600 bg-gray-200 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                                                                name="servicios{{ $serviciodiario->id }}[]"
                                                                                id="grid-tipo-servicio"
                                                                                value="{{ $opcion->descripcion_servicio }}"
                                                                                {{ in_array($opcion->descripcion_servicio, $valuesArray) ? 'checked' : '' }}>
                                                                            {{ $opcion->descripcion_servicio }} (${{ $opcion->precio }}).&nbsp;
                                                                        </label>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                                <div class="w-full px-3">
                                                                    <label
                                                                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                                        for="grid-cliente">
                                                                        Cliente
                                                                    </label>
                                                                    <select
                                                                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                                        id="grid-cliente" name="cliente_id" required>
                                                                        <option value="" selected disabled>
                                                                            Seleccionar Cliente</option>
                                                                        @foreach ($clientes as $opcion)
                                                                            <option value="{{ $opcion->id }}"
                                                                                {{ $opcion->id == $serviciodiario->id_cliente ? 'selected' : '' }}>
                                                                                {{ $opcion->nombre }}
                                                                                {{ $opcion->apellido }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <button
                                                                    class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                                    type="submit">
                                                                    Guardar
                                                                </button>
                                                                <button
                                                                    data-modal-hide="modificar-serviciodiario-modal-{{ $serviciodiario->id }}"
                                                                    type="button" onclick="location.reload()"
                                                                    class="shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                                                                    Cancelar
                                                                </button>
                                                            </div>
                                                            <div id="myToast{{ $serviciodiario->id }}"
                                                                class="hidden fixed right-10 bottom-10 bg-white drop-shadow-lg rounded-lg">
                                                                <div class="flex p-4 text-sm text-yellow-800 border border-yellow-300 border-r-8 border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800"
                                                                    role="alert">
                                                                    <svg aria-hidden="true"
                                                                        class="flex-shrink-0 inline w-5 h-5 mr-3"
                                                                        fill="currentColor" viewBox="0 0 20 20"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd"
                                                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                                            clip-rule="evenodd"></path>
                                                                    </svg>
                                                                    <span class="sr-only">Info</span>
                                                                    <div>
                                                                        <span class="font-medium">Servicios!</span>
                                                                        Debes seleccionar al menos un servicio.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <script>
                                                            document.getElementById('formulario-servicio-{{ $serviciodiario->id }}').addEventListener('submit', function(
                                                                event) {
                                                                var checkboxes = document.querySelectorAll(
                                                                    'input[name="servicios{{ $serviciodiario->id }}[]"]:checked');
                                                                if (checkboxes.length === 0) {
                                                                    event.preventDefault(); // Evita que el formulario se envíe
                                                                    //alert('Debes seleccionar al menos un servicio.');
                                                                    document.getElementById("myToast{{ $serviciodiario->id }}").classList.remove("hidden");
                                                                    setTimeout(function() {
                                                                        document.getElementById("myToast{{ $serviciodiario->id }}").classList.add("hidden");
                                                                    }, 5000);
                                                                }
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{ route('serviciosdiarios.destroy', $serviciodiario->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                type="submit">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Implement the toast -->
            <div id="myToast" class="hidden fixed right-10 bottom-10 bg-white drop-shadow-lg rounded-lg">
                <div class="flex p-4 text-sm text-yellow-800 border border-yellow-300 border-r-8 border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Servicios!</span> Debes seleccionar al menos un servicio.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('formulario-registro').addEventListener('submit', function(event) {
            var checkboxes = document.querySelectorAll('input[name="servicios[]"]:checked');
            if (checkboxes.length === 0) {
                event.preventDefault(); // Evita que el formulario se envíe
                //alert('Debes seleccionar al menos un servicio.');
                // Show the toast
                document.getElementById("myToast").classList.remove("hidden");
                setTimeout(function() {
                    document.getElementById("myToast").classList.add("hidden");
                }, 5000);
            }
        });
    </script>

</x-app-layout>
