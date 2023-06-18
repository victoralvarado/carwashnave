<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clientes') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-2 text-2xl font-medium text-gray-900">
                        Registro de Clientes
                    </h1>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-4 p-6 lg:p-8 bg-white border-b border-gray-200">
                    <form action="/clientes" method="POST" class="w-5/6 max-[450px]:w-full place-self-center">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-nombre">
                                    Nombres
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-nombre" name="nombre" type="text" required>
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-apellido">
                                    Apellidos
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-apellido" name="apellido" type="text" required>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-direccion">
                                    Dirección
                                </label>
                                <textarea id="grid-direccion" name="direccion" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-700 bg-gray-200 rounded-lg border border-gray-200 focus:bg-white focus:border-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    required></textarea>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-telefono">
                                    Telefono
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-telefono" name="telefono" type="text">
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-tipo-vehiculo">
                                    Tipo Vehiculo
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-tipo-vehiculo" name="tipo_vehiculo" type="text" required>
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
                    <div class="relative overflow-x-auto">
                        <table class="w-full border-collapse border-2 border-gray-500">
                            <thead>
                                <tr>
                                    <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Código
                                    </th>
                                    <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Nombres
                                    </th>
                                    <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">
                                        Apellidos</th>
                                    <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">
                                        Direccion</th>
                                    <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">
                                        Telefono</th>
                                    <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Tipo
                                        Vehiculo</th>
                                    <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Acción
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">{{ $cliente->id }}</td>
                                        <td class="border border-gray-400 px-4 py-2">{{ $cliente->nombre }}</td>
                                        <td class="border border-gray-400 px-4 py-2">{{ $cliente->apellido }}</td>
                                        <td class="border border-gray-400 px-4 py-2">{{ $cliente->direccion }}</td>
                                        <td class="border border-gray-400 px-4 py-2">{{ $cliente->telefono }}</td>
                                        <td class="border border-gray-400 px-4 py-2">{{ $cliente->tipo_vehiculo }}</td>
                                        <td class="border border-gray-400 px-4 py-2">
                                            <!-- Modal toggle -->
                                            <button data-modal-target="modificar-cliente-modal-{{ $cliente->id }}"
                                                data-modal-toggle="modificar-cliente-modal-{{ $cliente->id }}"
                                                class="shadow my-1 bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                type="button">
                                                Editar
                                            </button>

                                            <!-- Main modal -->
                                            <div id="modificar-cliente-modal-{{ $cliente->id }}" tabindex="-1"
                                                aria-hidden="true"
                                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative w-full max-w-md max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <button type="button"
                                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                            data-modal-hide="modificar-cliente-modal-{{ $cliente->id }}">
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
                                                                Modificar Cliente
                                                            </h3>
                                                            <form action="/clientes/{{ $cliente->id }}" method="POST"
                                                                class="space-y-6">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="flex flex-wrap -mx-3 mb-6">
                                                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                                        <label
                                                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                                            for="grid-nombre">
                                                                            Nombres
                                                                        </label>
                                                                        <input
                                                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                                            id="grid-nombre" name="nombre"
                                                                            type="text"
                                                                            value="{{ $cliente->nombre }}" required>
                                                                    </div>
                                                                    <div class="w-full md:w-1/2 px-3">
                                                                        <label
                                                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                                            for="grid-apellido">
                                                                            Apellidos
                                                                        </label>
                                                                        <input
                                                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                                            id="grid-apellido" name="apellido"
                                                                            type="text"
                                                                            value="{{ $cliente->apellido }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="flex flex-wrap -mx-3 mb-6">
                                                                    <div class="w-full px-3">
                                                                        <label
                                                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                                            for="grid-direccion">
                                                                            Dirección
                                                                        </label>
                                                                        <textarea id="grid-direccion" name="direccion" rows="4"
                                                                            class="block p-2.5 w-full text-sm text-gray-700 bg-gray-200 rounded-lg border border-gray-200 focus:bg-white focus:border-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                                                            required>{{ $cliente->direccion }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="flex flex-wrap -mx-3 mb-6">
                                                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                                        <label
                                                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                                            for="grid-telefono">
                                                                            Telefono
                                                                        </label>
                                                                        <input
                                                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                                            id="grid-telefono" name="telefono"
                                                                            type="text"
                                                                            value="{{ $cliente->telefono }}">
                                                                    </div>
                                                                    <div class="w-full md:w-1/2 px-3">
                                                                        <label
                                                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                                            for="grid-tipo-vehiculo">
                                                                            Tipo Vehiculo
                                                                        </label>
                                                                        <input
                                                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                                            id="grid-tipo-vehiculo"
                                                                            name="tipo_vehiculo" type="text"
                                                                            value="{{ $cliente->tipo_vehiculo }}"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="text-center">
                                                                    <button
                                                                        class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                                        type="submit">
                                                                        Guardar
                                                                    </button>
                                                                    <button
                                                                        data-modal-hide="modificar-cliente-modal-{{ $cliente->id }}"
                                                                        type="button" onclick="location.reload()"
                                                                        class="shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                                                                        Cancelar
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (Auth::user()->role == 'administrador')
                                                <!-- Modal toggle -->
                                                <button
                                                    data-modal-target="eliminar-cliente-modal-{{ $cliente->id }}"
                                                    data-modal-toggle="eliminar-cliente-modal-{{ $cliente->id }}"
                                                    class="shadow my-1 bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                    type="button">
                                                    Eliminar
                                                </button>

                                                <!-- Main modal -->
                                                <div id="eliminar-cliente-modal-{{ $cliente->id }}" tabindex="-1"
                                                    aria-hidden="true"
                                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-md max-h-full">
                                                        <!-- Modal content -->
                                                        <div
                                                            class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button"
                                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                                data-modal-hide="eliminar-cliente-modal-{{ $cliente->id }}">
                                                                <svg aria-hidden="true" class="w-5 h-5"
                                                                    fill="currentColor" viewBox="0 0 20 20"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd"
                                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                                <span class="sr-only">Cerrar</span>
                                                            </button>
                                                            <div class="px-6 py-6 lg:px-8">
                                                                <h3
                                                                    class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                                                                    ¿Desea Eliminar al Cliente
                                                                    '{{ $cliente->nombre }} {{ $cliente->apellido }}' con Código
                                                                    '{{ $cliente->id }}'?
                                                                </h3>
                                                                <form action="/clientes/{{ $cliente->id }}"
                                                                    method="POST" class="space-y-6">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="text-center">
                                                                        <button
                                                                            class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                                            type="submit">
                                                                            Eliminar
                                                                        </button>
                                                                        <button
                                                                            data-modal-hide="eliminar-cliente-modal-{{ $cliente->id }}"
                                                                            type="button" onclick="location.reload()"
                                                                            class="shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                                                                            Cancelar
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
