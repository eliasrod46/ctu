<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="text-center">
            <a href="{{route('venta.listado')}}" class="rounded-full text-white bg-gradient-to-r from-yellow-400 via-orange-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium text-sm px-3 py-1.5 text-center mr-2 mb-2">
                    Listado de Ventas
            </a>
            <a href="{{route('compras.listado')}}" class="rounded-full text-white bg-gradient-to-r from-yellow-400 via-orange-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium text-sm px-3 py-1.5 text-center mr-2 mb-2">
                Listado de Compras
        </a>
        </div>
        <!-- División en dos columnas responsivas -->
        <div class="text-center">
            <livewire:venta.detallecaja />
        </div>
        <div class="flex flex-wrap">
            <!-- Columna 1 -->
            <div class="w-full md:w-1/2 p-2">
                <p class="text-red-500 text-center font-semibold text-xl mb-2">Ingresos</p>
                <div class="overflow-x-auto">
                    <livewire:venta.ingresos />
                </div>
            </div>
        
            <!-- Columna 2 -->
            <div class="w-full md:w-1/2 p-2">
                <!-- Contenido de la columna 2 -->
                <p class="text-red-500 text-center font-semibold text-xl mb-2">Egresos</p>
                <div class="overflow-x-auto">
                    <livewire:venta.egresos />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>