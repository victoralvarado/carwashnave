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
                    <!-- Modal toggle -->
                    <button data-modal-target="finalizar-modal-1" data-modal-toggle="finalizar-modal-1"
                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        Completar
                    </button>

                    <!-- Main modal -->
                    <div id="finalizar-modal-1" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                    data-modal-hide="finalizar-modal-1">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Cerrar</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Completar
                                        Servicio</h3>
                                    <form class="space-y-6" action="#">
                                        <div>

                                            <label for="completar-servicio-1"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Comentario
                                        (Opcional)</label>
                                            <textarea id="completar-servicio-1" rows="4"
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Escriba un comentario..."></textarea>

                                        </div>

                                        <button type="submit"
                                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Completar Servicio</button>
                                        <button data-modal-hide="finalizar-modal-1" type="button"
                                            class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Cancelar</button>
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
                    <!-- Modal toggle -->
                    <button data-modal-target="finalizar-modal-2" data-modal-toggle="finalizar-modal-2"
                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        Completar
                    </button>

                    <!-- Main modal -->
                    <div id="finalizar-modal-2" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                    data-modal-hide="finalizar-modal-2">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Cerrar</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Completar
                                        Servicio</h3>
                                    <form class="space-y-6" action="#">
                                        <div>

                                            <label for="completar-servicio-2"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Comentario
                                        (Opcional)</label>
                                            <textarea id="completar-servicio-2" rows="4"
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Escriba un comentario..."></textarea>

                                        </div>

                                        <button type="submit"
                                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Completar Servicio</button>
                                        <button data-modal-hide="finalizar-modal-2" type="button"
                                            class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Cancelar</button>
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
                    <!-- Modal toggle -->
                    <button data-modal-target="finalizar-modal-3" data-modal-toggle="finalizar-modal-3"
                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        Completar
                    </button>

                    <!-- Main modal -->
                    <div id="finalizar-modal-3" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                    data-modal-hide="finalizar-modal-3">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Cerrar</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Completar
                                        Servicio</h3>
                                    <form class="space-y-6" action="#">
                                        <div>

                                            <label for="completar-servicio-3"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Comentario
                                        (Opcional)</label>
                                            <textarea id="completar-servicio-3" rows="4"
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Escriba un comentario..."></textarea>

                                        </div>

                                        <button type="submit"
                                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Completar Servicio</button>
                                        <button data-modal-hide="finalizar-modal-3" type="button"
                                            class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Cancelar</button>
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
