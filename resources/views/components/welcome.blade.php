<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <x-application-logo class="block h-12 w-auto" />

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Lista de Clientes Asignados
    </h1>
</div>
<div class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-4 p-6 lg:p-8 bg-white border-b border-gray-200">
    <table class="w-full border-collapse border-2 border-gray-500">
        <thead>
            <tr>
                <th class="border border-gray-400 px-4 py-2 text-gray-800">Código</th>
                <th class="border border-gray-400 px-4 py-2 text-gray-800">Fecha</th>
                <th class="border border-gray-400 px-4 py-2 text-gray-800">Hora</th>
                <th class="border border-gray-400 px-4 py-2 text-gray-800">Cliente</th>
                <th class="border border-gray-400 px-4 py-2 text-gray-800">Tipo Vehiculo</th>
                <th class="border border-gray-400 px-4 py-2 text-gray-800">Tipo Servicio</th>
                <th class="border border-gray-400 px-4 py-2 text-gray-800">Acción</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border border-gray-400 px-4 py-2">1</td>
                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                <td class="border border-gray-400 px-4 py-2">
                    <div x-data="{ showModal1: false }">
                        <!-- Botón para abrir el modal -->
                        <button @click="showModal1 = true"
                            class="px-4 py-2 bg-blue-500 text-white rounded">Finalizar</button>

                        <!-- Modal -->
                        <div x-show="showModal1" x-transition:enter="transition-opacity ease-out duration-500"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition-opacity ease-in duration-500"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
                            <!-- Modal -->
                            <div class="bg-white rounded-lg shadow-lg p-6">
                                <h2 class="text-xl font-bold mb-4">Finalizar Servicio</h2>
                                <div
                                    class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-4 p-6 lg:p-8 bg-white border-b border-gray-200">
                                    <form class="w-full">
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full px-3">
                                                <label
                                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                    for="grid-comentario">
                                                    Comentario (Opcional)
                                                </label>
                                                <textarea id="grid-comentario" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <button
                                            class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                            type="submit">
                                            Guardar
                                        </button>
                                        <button @click="showModal1 = false"
                                            class="px-4 py-2 bg-blue-500 text-white rounded">Cerrar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="border border-gray-400 px-4 py-2">2</td>
                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                <td class="border border-gray-400 px-4 py-2">
                    <div x-data="{ showModal2: false }">
                        <!-- Botón para abrir el modal -->
                        <button @click="showModal2 = true"
                            class="px-4 py-2 bg-blue-500 text-white rounded">Finalizar</button>

                        <!-- Modal -->
                        <div x-show="showModal2" x-transition:enter="transition-opacity ease-out duration-500"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition-opacity ease-in duration-500"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
                            <!-- Modal -->
                            <div class="bg-white rounded-lg shadow-lg p-6">
                                <h2 class="text-xl font-bold mb-4">Finalizar Servicio</h2>
                                <div
                                    class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-4 p-6 lg:p-8 bg-white border-b border-gray-200">
                                    <form class="w-full">
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full px-3">
                                                <label
                                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                    for="grid-comentario">
                                                    Comentario (Opcional)
                                                </label>
                                                <textarea id="grid-comentario" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <button
                                            class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                            type="submit">
                                            Guardar
                                        </button>
                                        <button @click="showModal2 = false"
                                            class="px-4 py-2 bg-blue-500 text-white rounded">Cerrar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="border border-gray-400 px-4 py-2">3</td>
                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                <td class="border border-gray-400 px-4 py-2">
                    <div x-data="{ showModal3: false }" style="background-color: #00000069;">
                        <!-- Botón para abrir el modal -->
                        <button @click="showModal3 = true"
                            class="px-4 py-2 bg-blue-500 text-white rounded">Finalizar</button>

                        <!-- Modal -->
                        <div x-show="showModal3" x-transition:enter="transition-opacity ease-out duration-500"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition-opacity ease-in duration-500"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
                            <!-- Modal -->
                            <div class="bg-white rounded-lg shadow-lg p-6">
                                <h2 class="text-xl font-bold mb-4">Finalizar Servicio</h2>
                                <div
                                    class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-4 p-6 lg:p-8 bg-white border-b border-gray-200">
                                    <form class="w-full">
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full px-3">
                                                <label
                                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                    for="grid-comentario">
                                                    Comentario (Opcional)
                                                </label>
                                                <textarea id="grid-comentario" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <button
                                            class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                            type="submit">
                                            Guardar
                                        </button>
                                        <button @click="showModal3 = false"
                                            class="px-4 py-2 bg-blue-500 text-white rounded">Cerrar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- Carga de Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>
</div>
