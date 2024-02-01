<div class="flex flex-wrap">
    <!-- Columna 1 (ancho 2/3) -->
    <div class="w-full md:w-2/3 p-4">
        <!-- Contenido de la columna 1 -->
        @if($compra->comprobantepago)
        <x-card>
            <img src="{{ asset('storage/' . $compra->comprobantepago) }}" alt="Imagen del comprobante de pago">
        </x-card>
        @else
        <x-card>
            <p class="text-red-500 font-semibold">Aún no se cargó el comprobante de pago</p>
        </x-card>
        @endif
        <div class="mt-8 mb-8">

        </div>
        @if($compra->factura)
        <x-card >
            <img src="{{ asset('storage/' . $compra->factura) }}" alt="Imagen de la factura recibida">
        </x-card>
        @else
        <x-card>
            <p class="text-red-500 font-semibold">Aún no se cargó la factura recibida.</p>
        </x-card>
        @endif
    </div>

    <!-- Columna 2 (ancho 1/3) -->
    <div class="w-full md:w-1/3 p-4">
        <!-- Contenido de la columna 2 -->
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4">
            {{--Codigo--}}
            <div class="mt-4">
                <div class="flex justify-start items-center">
                    <p class="text-red-500 font-semibold">Descripción de la compra</p>
                </div>
                <x-wire-textarea wire:model="descripcion" placeholder="Descripción" />
                @error('descripcion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <div class="flex justify-start items-center">
                    <p class="text-red-500 font-semibold">Forma de pago usado</p>
                </div>
                <x-input wire:model.lazy="formadepago" id="formadepago" class="block mt-1 w-full {{$errors->has('formadepago') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="formadepago" :value="old('formadepago')" autocomplete="formadepago"   readonly/>
                @error('formadepago') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            {{--Descripcion--}}
            @if($formadepago === 'Dinero de caja y particular' || $formadepago === 'Dinero de la caja')
            <div class="mt-4">
                <div class="flex justify-start items-center">
                    <p class="text-red-500 font-semibold">Compra realizada con el dinero de la caja</p>
                </div>
                <x-input wire:model.lazy="compraconcaja"  id="compraconcaja" class="block mt-1 w-full {{$errors->has('compraconcaja') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="compraconcaja" :value="old('compraconcaja')" autocomplete="compraconcaja" readonly />
                @error('compraconcaja') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            @endif
            {{--Precio de Costo--}}
            @if($formadepago === 'Dinero de caja y particular' || $formadepago === 'Dinero particular')
            <div class="mt-4">
                <div class="flex justify-start items-center mr-2">
                    <p class="text-red-500 font-semibold">Compra realizada con dinero particular</p>
                </div>
                <x-input wire:model.lazy="compraconotro"  id="compraconotro" class="block mt-1 w-full {{$errors->has('compraconotro') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="compraconotro" :value="old('compraconotro')" autocomplete="compraconotro"  readonly/>
                @error('compraconotro') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            @endif
            {{--precioFinal--}}
            
            {{--cantidad--}}
            <div class="mt-4">
                <div class="flex justify-start items-center">
                    <p class="text-red-500 font-semibold">Quién realizó la compra</p>
                </div>
                <x-input wire:model.lazy="comprador"  id="comprador" class="block mt-1 w-full {{$errors->has('comprador') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="number" name="comprador" :value="old('comprador')" autocomplete="comprador"  readonly/>
                @error('comprador') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div> 
            <div class="mt-4">
                <p class="text-red-500 font-semibold">Dia y hora de la compra</p>
                <x-wire-datetime-picker
                    
                    placeholder="Dia y hora de la compra"
                    wire:model.defer="fecha_y_hora"
                    readonly
                />
            </div>
        </div>
    </div>
</div>

