<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios y Servicios') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-2 text-2xl font-medium text-gray-900">
                        Usuarios
                    </h1>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-4 p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="relative overflow-x-auto">
                        <table class="w-full border-collapse border-2 border-gray-500">
                            <thead>
                                <tr>
                                    <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Código
                                    </th>
                                    <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Nombre
                                    </th>
                                    <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Correo
                                    </th>
                                    <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Rol
                                    </th>
                                    <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Estado
                                    </th>
                                    <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Acción
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        @if ($usuario->id != 1)
                                            <td class="border border-gray-400 px-4 py-2">{{ $usuario->id }}</td>
                                            <td class="border border-gray-400 px-4 py-2">{{ $usuario->name }}</td>
                                            <td class="border border-gray-400 px-4 py-2">{{ $usuario->email }}</td>
                                            <td class="border border-gray-400 px-4 py-2">{{ ucfirst($usuario->role) }}
                                            </td>
                                            <td class="border border-gray-400 px-4 py-2">
                                                {{ $usuario->estado == 'a' ? 'Activo' : 'Inactivo' }}
                                            </td>
                                            <td class="border border-gray-400 px-4 py-2">
                                                <!-- Modal toggle -->
                                                <button data-modal-target="habilitar-usuario-modal-{{ $usuario->id }}"
                                                    data-modal-toggle="habilitar-usuario-modal-{{ $usuario->id }}"
                                                    class="shadow my-1 {{ $usuario->estado == 'a' ? 'bg-orange-500' : 'bg-green-500' }} hover:{{ $usuario->estado == 'a' ? 'bg-orage-300' : 'bg-green-400' }} focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                    type="button">
                                                    {{ $usuario->estado == 'a' ? 'Deshabilitar' : 'Habilitar' }}
                                                </button>

                                                <!-- Main modal -->
                                                <div id="habilitar-usuario-modal-{{ $usuario->id }}" tabindex="-1"
                                                    aria-hidden="true"
                                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-md max-h-full">
                                                        <!-- Modal content -->
                                                        <div
                                                            class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button"
                                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                                data-modal-hide="habilitar-usuario-modal-{{ $usuario->id }}">
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
                                                                    {{ $usuario->estado == 'a' ? 'Deshabilitar Usuario' : 'Habilitar Usuario' }}
                                                                </h3>
                                                                <form action="/usuarios" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $usuario->id }}" />
                                                                    <input type="hidden" name="estado"
                                                                        value="{{ $usuario->estado }}" />
                                                                    <button
                                                                        class="shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                                        type="submit">
                                                                        Proceder
                                                                    </button>
                                                                    <button
                                                                        class="shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                                        type="button" onclick="location.reload()">
                                                                        Cancelar
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal toggle -->
                                                <button data-modal-target="modificar-usuario-modal-{{ $usuario->id }}"
                                                    data-modal-toggle="modificar-usuario-modal-{{ $usuario->id }}"
                                                    class="shadow my-1 bg-pink-500 hover:bg-pink-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                    type="button">
                                                    Cambiar Rol
                                                </button>

                                                <!-- Main modal -->
                                                <div id="modificar-usuario-modal-{{ $usuario->id }}" tabindex="-1"
                                                    aria-hidden="true"
                                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-md max-h-full">
                                                        <!-- Modal content -->
                                                        <div
                                                            class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button"
                                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                                data-modal-hide="modificar-usuario-modal-{{ $usuario->id }}">
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
                                                                    Modificar Rol
                                                                </h3>
                                                                <form action="/usuarios/{{ $usuario->id }}"
                                                                    method="POST" class="space-y-6">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="flex flex-wrap -mx-3 mb-6">
                                                                        <label
                                                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                                            for="grid-rol">
                                                                            Rol
                                                                        </label>
                                                                        <select
                                                                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                                            id="grid-rol" name="role" required>
                                                                            <option value="" selected>
                                                                                Seleccionar Rol</option>
                                                                            <option value="empleado"
                                                                                {{ $usuario->role == 'empleado' ? 'selected' : '' }}>
                                                                                Empleado
                                                                            </option>
                                                                            <option value="administrador"
                                                                                {{ $usuario->role == 'administrador' ? 'selected' : '' }}>
                                                                                Administrador</option>
                                                                            <option value="recepcionista"
                                                                                {{ $usuario->role == 'recepcionista' ? 'selected' : '' }}>
                                                                                Recepcionista</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <button
                                                                            class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                                            type="submit">
                                                                            Modificar
                                                                        </button>
                                                                        <button
                                                                            data-modal-hide="modificar-usuario-modal-{{ $usuario->id }}"
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
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $usuarios->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-2 text-2xl font-medium text-gray-900">
                        Servicios
                    </h1>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-4 p-6 lg:p-8 bg-white border-b border-gray-200">

                    <button data-modal-target="agreagar-servicio-modal" data-modal-toggle="agreagar-servicio-modal"
                        class="shadow w-40 my-1 bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                        type="button">
                        Agregar Servicio
                    </button>
                    <!-- Main modal -->
                    <div id="agreagar-servicio-modal" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                    data-modal-hide="agreagar-servicio-modal">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Cerrar</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                                        Nuevo Servicio
                                    </h3>
                                    <form action="/servicios" method="POST">
                                        @csrf
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                <label
                                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                    for="grid-servicio">
                                                    Servicio
                                                </label>
                                                <input
                                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                    id="grid-servicio" name="descripcion_servicio" type="text"
                                                    required>
                                            </div>
                                            <div class="w-full md:w-1/2 px-3">
                                                <label
                                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                    for="grid-precio">
                                                    Precio
                                                </label>
                                                <input
                                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                    id="grid-precio" name="precio" type="number" min="0.0"
                                                    required>
                                            </div>
                                        </div>
                                        <button
                                            class="shadow bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                            type="submit">
                                            Agregar
                                        </button>
                                        <button
                                            class="shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                            type="button" onclick="location.reload()">
                                            Cancelar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative overflow-x-auto">
                        <table class="w-full border-collapse border-2 border-gray-500">
                            <thead>
                                <tr>
                                    <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Código
                                    </th>
                                    <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">
                                        Servicio</th>
                                    <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Precio
                                    </th>
                                    <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Estado
                                    </th>
                                    <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Acción
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($servicios as $servicio)
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">{{ $servicio->id }}</td>
                                        <td class="border border-gray-400 px-4 py-2">
                                            {{ $servicio->descripcion_servicio }}</td>
                                        <td class="border border-gray-400 px-4 py-2">${{ $servicio->precio }}</td>
                                        <td class="border border-gray-400 px-4 py-2">
                                            {{ $servicio->estado == 'a' ? 'Activo' : 'Inactivo' }}
                                        </td>
                                        <td class="border border-gray-400 px-4 py-2">
                                            <!-- Modal toggle -->
                                            <button data-modal-target="habilitar-servicio-modal-{{ $servicio->id }}"
                                                data-modal-toggle="habilitar-servicio-modal-{{ $servicio->id }}"
                                                class="shadow my-1 {{ $servicio->estado == 'a' ? 'bg-orange-500' : 'bg-green-500' }} hover:{{ $usuario->estado == 'a' ? 'bg-orage-300' : 'bg-green-400' }} focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                type="button">
                                                {{ $servicio->estado == 'a' ? 'Deshabilitar' : 'Habilitar' }}
                                            </button>

                                            <!-- Main modal -->
                                            <div id="habilitar-servicio-modal-{{ $servicio->id }}" tabindex="-1"
                                                aria-hidden="true"
                                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative w-full max-w-md max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <button type="button"
                                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                            data-modal-hide="habilitar-servicio-modal-{{ $servicio->id }}">
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
                                                                {{ $servicio->estado == 'a' ? 'Deshabilitar Servicio' : 'Habilitar Servicio' }}
                                                            </h3>
                                                            <form action="/servicios" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                    value="{{ $servicio->id }}" />
                                                                <input type="hidden" name="estado"
                                                                    value="{{ $servicio->estado }}" />
                                                                <button
                                                                    class="shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                                    type="submit">
                                                                    Proceder
                                                                </button>
                                                                <button
                                                                    class="shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                                    type="button" onclick="location.reload()">
                                                                    Cancelar
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button data-modal-target="editar-servicio-modal-{{ $servicio->id }}"
                                                data-modal-toggle="editar-servicio-modal-{{ $servicio->id }}"
                                                class="shadow my-1 bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                type="button">
                                                Editar
                                            </button>
                                            <!-- Main modal -->
                                            <div id="editar-servicio-modal-{{ $servicio->id }}" tabindex="-1"
                                                aria-hidden="true"
                                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative w-full max-w-md max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <button type="button" onclick="location.reload()"
                                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                            data-modal-hide="editar-servicio-modal-{{ $servicio->id }}">
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
                                                                Modificar Servicio
                                                            </h3>
                                                            <form action="/servicios/{{ $servicio->id }}"
                                                                method="POST" class="space-y-6">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="flex flex-wrap -mx-3 mb-6">
                                                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                                        <label
                                                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                                            for="grid-servicio">
                                                                            Servicio
                                                                        </label>
                                                                        <input
                                                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                                            id="grid-servicio"
                                                                            name="descripcion_servicio" type="text"
                                                                            required
                                                                            value="{{ $servicio->descripcion_servicio }}">
                                                                    </div>
                                                                    <div class="w-full md:w-1/2 px-3">
                                                                        <label
                                                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                                            for="grid-precio">
                                                                            Precio
                                                                        </label>
                                                                        <input
                                                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                                            id="grid-precio" name="precio"
                                                                            type="number" min="0.0" required
                                                                            value="{{ $servicio->precio }}">
                                                                    </div>
                                                                </div>
                                                                <button
                                                                    class="shadow bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                                    type="submit">
                                                                    Modificar
                                                                </button>
                                                                <button
                                                                    class="shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                                    type="button" onclick="location.reload()">
                                                                    Cancelar
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
