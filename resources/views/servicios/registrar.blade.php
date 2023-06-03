<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Servicios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>
                    <!-- Registrar un servicio realizado -->
                    <h1>Registrar servicio realizado</h1>
                    <form action="/" method="POST">
                        @csrf
                        <label>Descripción:</label>
                        <input type="text" name="descripcion"><br>
                        <label>Comentarios:</label>
                        <input type="text" name="comentarios"><br>
                        <br>
                        <button type="submit">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
