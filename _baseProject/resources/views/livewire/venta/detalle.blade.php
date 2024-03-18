<div class="flex flex-wrap">
    <!-- Columna 1 (ancho 2/3) -->
    <div class="w-full md:w-2/3 p-4">
        <!-- Contenido de la columna 1 -->
        @if($imagen)
        
            <p class="text-lime-600 font-semibold mb-5">Imagen del producto vendido</p>
            <div class="mt-4"></div>
            <x-wire-card class="mb-10">
                <img src="{{ asset('storage/' . $imagen) }}" alt="Imagen del Producto">
            </x-wire-card>
            @else
            <p class="text-lime-600 font-semibold">Imagen del producto vendido</p>
            <div class="mt-4"></div>
            <x-wire-card >
                <p class="text-red-500 font-semibold">Aún no se cargó la imagen de la prenda</p>
            </x-wire-card>
            @endif
        
        <div class="mt-10"></div>
        
        @if($comprobantepago)
        <p class="text-lime-600 font-semibold">Imagen del comprobante de pago </p>
        <div class="mt-4"></div>
        <x-wire-card>
            <img src="{{ asset('storage/' . $comprobantepago) }}" alt="Comprobante de pago recibido">
        </x-wire-card>
        @else
        <p class="text-lime-600 font-semibold">Imagen del comprobante de pago </p>
        <div class="mt-4"></div>
        <x-wire-card>
            <p class="text-red-500 font-semibold">Aún no se cargó el recibo</p>
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
                <x-input wire:model.lazy="producto" placeholder="Código del producto" id="producto" class="block mt-1 w-full {{$errors->has('producto') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="producto" :value="old('producto')" autocomplete="producto" readonly/>
                @error('producto') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            {{--Descripcion--}}
            <div class="mt-4">
                <div class="flex justify-start items-center">
                    <p class="text-red-500 font-semibold">Descripción</p>
                </div> 
                    <x-wire-textarea wire:model="descripcion" placeholder="Descripción" />
                    @error('descripcion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            {{--Precio de Costo--}}
            <div class="mt-4">
                <div class="flex justify-start items-center mr-2">
                    <p class="text-red-500 font-semibold">Cantidad de prendas vendidas</p>
                </div>
                <x-input wire:model.lazy="cantidadprenda" placeholder="Cantidad de prendas vendidas" id="cantidadprenda" class="block mt-1 w-full {{$errors->has('cantidadprenda') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="cantidadprenda" :value="old('cantidadprenda')" autocomplete="cantidadprenda"  readonly/>
                @error('cantidadprenda') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            {{--precioFinal--}}
            <div class="mt-4">
                <div class="flex justify-start items-center">
                    <p class="text-red-500 font-semibold">Quién realizó la venta</p>
                </div>
                <x-input wire:model.lazy="vendedor" placeholder="Vendedor" id="vendedor" class="block mt-1 w-full {{$errors->has('vendedor') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="vendedor" :value="old('vendedor')" autocomplete="vendedor"   readonly/>
                @error('vendedor') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <p class="text-red-500 font-semibold">Dia y hora de la venta</p>
                <x-wire-datetime-picker
                    
                    placeholder="Dia y hora de la venta"
                    wire:model.defer="fecha_y_hora"
                    readonly
                />
            </div>
            {{--cantidad--}}
            <div class="mt-4">
                <div class="flex justify-start items-center">
                    <p class="text-red-500 font-semibold">Número de Comprobante de venta</p>
                </div>
                <x-input wire:model.lazy="codigotransaccion" placeholder="Código de transacción" id="codigotransaccion" class="block mt-1 w-full {{$errors->has('codigotransaccion') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="number" name="codigotransaccion" :value="old('codigotransaccion')" autocomplete="codigotransaccion"  readonly/>
                @error('codigotransaccion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <div class="flex justify-start items-center mr-2">
                    <p class="text-red-500 font-semibold">Tipo de transacción</p>
                </div>
                <x-input wire:model.lazy="transacciontipo" placeholder="Tipo de transacción" id="transacciontipo" class="block mt-1 w-full {{$errors->has('transacciontipo') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="transacciontipo" :value="old('transacciontipo')" autocomplete="transacciontipo"  readonly/>
                    @error('transacciontipo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <div class="flex justify-start items-center mr-2">
                    <p class="text-red-500 font-semibold">Monto de la transacción</p>
                </div>
                <x-input wire:model.lazy="monto" placeholder="Monto de la transacción" id="monto" class="block mt-1 w-full {{$errors->has('monto') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="monto" :value="old('monto')" autocomplete="monto"  readonly/>
                    @error('monto') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div> 
            <div class="mt-4">
                <div class="flex justify-start items-center mr-2">
                    <p class="text-red-500 font-semibold">Forma de pago</p>
                </div>
                <x-input wire:model.lazy="formadepago" placeholder="Forma de pago" id="formadepago" class="block mt-1 w-full {{$errors->has('formadepago') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="formadepago" :value="old('formadepago')" autocomplete="formadepago"  readonly/>
                    @error('formadepago') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div> 
            <div class="mt-4">
                <div class="flex justify-start items-center mr-2">
                    <p class="text-red-500 font-semibold">¿Realizó recargo o descuento?</p>
                </div>
                <x-input wire:model.lazy="operacion"  id="descuento" class="block mt-1 w-full {{$errors->has('operacion') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="operacion" :value="old('operacion')" autocomplete="operacion"  readonly/>
                    @error('operacion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div> 
            @if($operacion === 'Descuento')
            <div class="mt-4">
                <div class="flex justify-start items-center mr-2">
                    <p class="text-red-500 font-semibold">Cantidad de descuento en %</p>
                </div>
                <x-input wire:model.lazy="cantidaddelooperado" placeholder="Cantidad de descuento " id="cantidaddelooperado" class="block mt-1 w-full {{$errors->has('cantidaddelooperado') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="cantidaddelooperado" :value="old('cantidaddelooperado')" autocomplete="cantidaddelooperado"  readonly/>
                    @error('cantidaddelooperado') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            @endif 
            @if($operacion === 'Recargo')
            <div class="mt-4">
                <div class="flex justify-start items-center mr-2">
                    <p class="text-red-500 font-semibold">Cantidad de recargo en %</p>
                </div>
                <x-input wire:model.lazy="cantidaddelooperado" placeholder="Cantidad de descuento " id="cantidaddelooperado" class="block mt-1 w-full {{$errors->has('cantidaddelooperado') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="cantidaddelooperado" :value="old('cantidaddelooperado')" autocomplete="cantidaddelooperado"  readonly/>
                    @error('cantidaddelooperado') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            @endif 
        </div>
    </div>
</div>

