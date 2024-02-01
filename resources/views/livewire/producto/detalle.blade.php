<div class="flex flex-wrap">
    <!-- Columna 1 (ancho 2/3) -->
    <div class="w-full md:w-2/3 p-4">
        <!-- Contenido de la columna 1 -->
        @if($producto->imagen)
        <x-wire-card>
            <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del Producto">
        </x-wire-card>
        @else
        <x-wire-card>
            <p class="text-red-500 font-semibold">Aún no se cargó la imagen de la prenda</p>
        </x-wire-card>
        @endif
    </div>

    <!-- Columna 2 (ancho 1/3) -->
    <div class="w-full md:w-1/3 p-4">
        <!-- Contenido de la columna 2 -->
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4">
            {{--Codigo--}}
            <div class="mt-4">
                <div class="flex justify-start items-center">
                    <p class="text-red-500 font-semibold">Código del Producto</p>
                </div>
                <x-input wire:model.lazy="codigo" placeholder="Código" id="codigo" class="block mt-1 w-full {{$errors->has('codigo') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="codigo" :value="old('codigo')" autocomplete="codigo" readonly/>
                @error('codigo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <div class="flex justify-start items-center">
                    <p class="text-red-500 font-semibold">Marca</p>
                </div>
                <x-input wire:model.lazy="marca" placeholder="Marca" id="marca" class="block mt-1 w-full {{$errors->has('marca') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="marca" :value="old('marca')" autocomplete="marca" readonly/>
                @error('marca') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <div class="flex justify-start items-center">
                    <p class="text-red-500 font-semibold">Tipo de prenda</p>
                </div>
                <x-input wire:model.lazy="tipodeprenda" placeholder="Tipo de prenda" id="tipodeprenda" class="block mt-1 w-full {{$errors->has('tipodeprenda') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="tipodeprenda" :value="old('tipodeprenda')" autocomplete="tipodeprenda" readonly/>
                @error('tipodeprenda') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <div class="flex justify-start items-center">
                    <p class="text-red-500 font-semibold"></p>Talle
                </div>
                <x-input wire:model.lazy="talle" placeholder="Talle" id="talle" class="block mt-1 w-full {{$errors->has('talle') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="talle" :value="old('talle')" autocomplete="talle" readonly/>
                @error('talle') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <div class="flex justify-start items-center">
                    <p class="text-red-500 font-semibold">Color</p>
                </div>
                <x-input wire:model.lazy="color" placeholder="Color" id="color" class="block mt-1 w-full {{$errors->has('color') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="color" :value="old('color')" autocomplete="color" readonly/>
                @error('color') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            {{--Descripcion--}}
            <div class="mt-4">
                <div class="flex justify-start items-center">
                    <p class="text-red-500 font-semibold">Descripción</p>
                </div>
                <x-input wire:model.lazy="descripcion" placeholder="Descripción" id="descripcion" class="block mt-1 w-full {{$errors->has('descripcion') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="descripcion" :value="old('descripcion')" autocomplete="descripcion" readonly />
                @error('descripcion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            {{--Precio de Costo--}}
            <div class="mt-4">
                <div class="flex justify-start items-center mr-2">
                    <p class="text-red-500 font-semibold">Precio de Costo</p>
                </div>
                <x-input wire:model.lazy="precioCosto" placeholder="Precio de Costo" id="precioCosto" class="block mt-1 w-full {{$errors->has('precioCosto') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="precioCosto" :value="old('precioCosto')" autocomplete="precioCosto" :value="number_format(floatval($precioCosto), 2, '.', ',')" readonly/>
                @error('precioCosto') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            {{--precioFinal--}}
            <div class="mt-4">
                <div class="flex justify-start items-center">
                    <p class="text-red-500 font-semibold">Precio Final</p>
                </div>
                <x-input wire:model.lazy="precioFinal" placeholder="Precio Final" id="precioFinal" class="block mt-1 w-full {{$errors->has('precioFinal') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="precioFinal" :value="old('precioFinal')" autocomplete="precioFinal"  :value="number_format(floatval($precioFinal), 2, '.', ',')" readonly/>
                @error('precioFinal') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            {{--cantidad--}}
            <div class="mt-4">
                <div class="flex justify-start items-center">
                    <p class="text-red-500 font-semibold">Cantidad en stock</p>
                </div>
                <x-input wire:model.lazy="cantidad" placeholder="Cantidad de Stock" id="cantidad" class="block mt-1 w-full {{$errors->has('cantidad') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="number" name="cantidad" :value="old('cantidad')" autocomplete="cantidad"  readonly/>
                @error('cantidad') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <div class="flex justify-start items-center mr-2">
                    <p class="text-red-500 font-semibold">Proveedor</p>
                </div>
                <x-input wire:model.lazy="proveedor" placeholder="Proovedor" id="proveedor" class="block mt-1 w-full {{$errors->has('proveedor') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="proveedor" :value="old('proveedor')" autocomplete="proveedor"  readonly/>
                    @error('proveedor') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div> 
        </div>
    </div>
</div>

