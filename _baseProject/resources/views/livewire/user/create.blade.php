<div>
    <form wire:submit.prevent = 'submit'>
        @csrf
        <div class="grid grid-rows-1 gap-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                {{--Nombre--}}
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
                {{--Apellido--}}
                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">Apellido</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <x-input wire:model.lazy="apellido" placeholder="Apellido" id="apellido" class="block mt-1 w-full {{$errors->has('apellido') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="apellido" :value="old('apellido')" autocomplete="apellido"  />
                    @error('apellido') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                {{--Direccion de correo--}}
                <div class="mt-4">
                    <div class="flex justify-start items-center mr-2">
                        <p class="text-red-500 font-semibold">Correo electrónico</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <x-input wire:model.lazy="email" placeholder="Correo electrónico" id="email" class="block mt-1 w-full {{$errors->has('email') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="email" name="email" :value="old('email')" autocomplete="email"/>
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                {{--telefono--}}
                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">Teléfono</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <x-input wire:model.lazy="telefono" placeholder="Teléfono" id="telefono" class="block mt-1 w-full {{$errors->has('telefono') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="number" name="telefono" :value="old('telefono')" autocomplete="telefono"  />
                    @error('telefono') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                {{--Contraseña--}}
                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">Contraseña</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <x-input wire:model.lazy="password" placeholder="Contraseña" id="password" class="block mt-1 w-full {{$errors->has('password') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="password" name="password" :value="old('password')" autocomplete="password"  />
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-8 mb-8">
            <x-wire-button class="rounded-full text-white bg-gradient-to-r from-yellow-400 via-orange-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium" type="submit">Agregar</x-wire-button>
        </div>
    </form>
</div>
