<x-app-layout>
    <div>
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="my-12">
                <div class="mb-4">
                    <h3 class="font-bold text-2xl mb-4 text-center">Editar la compra</h3>
                </div>
                <div>
                    <div class="flex justify-start items-center">
                        
                    </div>
                    <div class="mx-6">
                        @livewire('compra.modificar', ['compra' => $compra])
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>