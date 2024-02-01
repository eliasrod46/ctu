<x-app-layout>
    <div>
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="my-12">
                <div class="mb-4">
                    <h3 class="font-bold text-2xl mb-8 text-center">Productos</h3>
                </div>

                <div class=" mb-5 text-center">
                    <a href="{{route('producto.agregar')}}" class="text-white bg-gradient-to-r from-yellow-400 via-orange-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-full text-sm px-3 py-1.5 text-center mr-2 mb-2"> Agregar producto nuevo </a>
                  
                    
                    <a href="{{route('producto.descripcion')}}" class="text-white bg-gradient-to-r from-yellow-400 via-orange-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-full text-sm px-3 py-1.5 text-center mr-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6  inline-block vertical-align-middle">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                          </svg>
                          
                      </a>
                      
                  </div>
                  
                <div>
                    
                    <div class="p-4">
                        <livewire:producto.listado />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>