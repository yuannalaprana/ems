<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('employees.store') }}" method="POST">
                        @csrf

                        <div>
                            <x-jet-label for="name" value="{{ __('Nama') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="username" value="{{ __('Username') }}" />
                            <x-jet-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="unit" value="{{ __('Unit') }}" />
                            <x-jet-input id="unit" class="block mt-1 w-full" type="text" name="unit" :value="old('unit')" required autofocus />
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="position" value="{{ __('Jabatan') }}" />
                            <x-jet-input id="position" class="block mt-1 w-full" type="text" name="position" :value="old('position')" required autofocus />
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="date_joined" value="{{ __('Tanggal Bergabung') }}" />
                            <x-jet-input id="date_joined" class="block mt-1 w-full" type="text" name="date_joined" :value="old('date_joined')" required autofocus />
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                            <x-jet-input-error for="email" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="input_password" value="{{ __('Password') }}" />
                            <x-jet-input id="input_password" class="block mt-1 w-full" type="password" name="input_password" :value="old('input_password')" required />
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>

                        <!-- Add more fields as needed -->

                        <div class="flex items-center justify-end mt-4">
                            <x-jet-button>
                                {{ __('Add Employee') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
