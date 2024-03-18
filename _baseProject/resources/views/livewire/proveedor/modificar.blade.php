<div>
    <form wire:submit.prevent = "submit">
        @csrf
        <div class="grid grid-rows-1 gap-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                {{--Codigo--}}
                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">Nombre</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <x-input wire:model.lazy="nombre" placeholder="Nombre" id="nombre" class="block mt-1 w-full {{$errors->has('nombre') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="nombre" :value="old('nombre')" autocomplete="nombre" />
                    @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                {{--Descripcion--}}
                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">CBU</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <x-input wire:model.lazy="cbu" placeholder="CBU" id="cbu" class="block mt-1 w-full {{$errors->has('cbu') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="number" name="cbu" :value="old('cbu')" autocomplete="cbu"  />
                    @error('cbu') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                {{--Precio de Costo--}}
                <div class="mt-4">
                    <div class="flex justify-start items-center mr-2">
                        <p class="text-red-500 font-semibold">Alias</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <x-input wire:model.lazy="alias" placeholder="Alias" id="precioCosto" class="block mt-1 w-full {{$errors->has('alias') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="alias" :value="old('alias')" autocomplete="alias" />
                    @error('alias') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                {{--precioFinal--}}
                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">Teléfono</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <x-input wire:model.lazy="telefono" placeholder="Teléfono" id="telefono" class="block mt-1 w-full {{$errors->has('telefono') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="number" name="telefono" :value="old('telefono')" autocomplete="telefono"/>
                    @error('telefono') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                {{--cantidad--}}
                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">Email</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <x-input wire:model.lazy="email" placeholder="Email" id="email" class="block mt-1 w-full {{$errors->has('email') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="email" name="email" :value="old('email')" autocomplete="email"  />
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <div class="flex justify-start items-center mr-2">
                        <p class="text-red-500 font-semibold">Provincia</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="select">
                        <select wire:model="provincia" class="rounded w-full">
                            <option value="">Seleccione una provincia</option>
                            @foreach ($provincias as $provincia)
                                <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-8 mb-8">
            <x-wire-button class="rounded-full text-white bg-gradient-to-r from-yellow-400 via-orange-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium" type="submit">Modificar</x-wire-button>
        </div>
    </form>
</div>