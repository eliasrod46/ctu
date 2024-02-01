<div>
    <form wire:submit.prevent = "save"  method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-rows-1 gap-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                {{--Codigo--}}
                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">Descripción de la compra</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <x-wire-textarea wire:model="descripcion" placeholder="Descripción" />
                        @error('descripcion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <p class="text-red-500 font-semibold">Forma de pago</p>
                    <div class="select">
                        <select wire:model="formadepago" class="rounded w-full">
                            <option value="">Seleccione forma depago</option>
                               @foreach ($formasdepago as $formadepago)
                                  <option value="{{ $formadepago->nombre }}">{{ $formadepago->nombre }}</option>
                               @endforeach
                         </select>
                    </div>
                    @error('formadepago') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
                @if ($formapagoSeleccionado === 'Dinero de la caja' || $formapagoSeleccionado === 'Dinero de caja y particular')
                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">Dinero usado de la caja</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <x-input wire:model.lazy="compraconcaja" placeholder="Caja" id="compraconcaja" class="block mt-1 w-full " type="text" name="compraconcaja" :value="old('compraconcaja')" autocomplete="compraconcaja"  :value="number_format(floatval($compraconcaja), 2, '.', ',')"/>
                    @error('compraconcaja') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                @endif
                

                @if ($formapagoSeleccionado === 'Dinero particular' || $formapagoSeleccionado === 'Dinero de caja y particular')
                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">Dinero particular</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <x-input wire:model.lazy="compraconotro" placeholder="Particular" id="compraconotro" class="block mt-1 w-full " type="text" name="compraconotro" :value="old('compraconotro')" autocomplete="compraconotro"  :value="number_format(floatval($compraconotro), 2, '.', ',')"/>
                    @error('compraconotro') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                @endif

                <div class="mt-4">
                    <p class="text-red-500 font-semibold">¿Quíen realizó la compra?</p>
                    <div class="select">
                        <select wire:model="comprador" class="rounded w-full">
                            <option value="">Comprador</option>
                               @foreach ($compradores as $comprador)
                                  <option value="{{ $comprador->nombre }}">{{ $comprador->nombre }}</option>
                               @endforeach
                         </select>
                    </div>
                    @error('comprador') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <p class="text-red-500 font-semibold mb-1">Dia y hora de la compra</p>
                    <x-wire-datetime-picker
                        placeholder="Dia y hora de la compra"
                        parse-format="YYYY-MM-DD HH:MM:00"
                        wire:model.defer="fecha_y_hora"
                    />
                </div>
                {{--foto--}}
                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">Comprobante de pago del pedido</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input accept=".png, .jpg, .jpeg" name="comprobantepago" id="comprobantepago" wire:model="comprobantepago" class="block w-full mt-1 text-sm rounded-full bg-slate-100 text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100" type="file" multiple>
                    @error('comprobantepago') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">Factura recibida </p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input accept=".png, .jpg, .jpeg" name="factura" id="factura" wire:model="factura" class="block w-full mt-1 text-sm rounded-full bg-slate-100 text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100" type="file" multiple>
                    @error('factura') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-8 mb-8">
            <x-wire-button class="rounded-full text-white bg-gradient-to-r from-yellow-400 via-orange-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-mediumfont-medium" type="submit">Agregar</x-wire-button>
        </div>
    </form>
</div>