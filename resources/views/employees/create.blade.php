<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ $formTitle }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ isset($employee) ? route('employees.update', $employee->id) : route('employees.store') }}" method="POST">
                        @csrf
                        @if(isset($employee))
                            @method('PUT')
                        @endif

                        <div>
                            <x-jet-label for="name" value="{{ __('Nama') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="isset($employee) ? $employee->name : old('name')" required autofocus />
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="username" value="{{ __('Username') }}" />
                            <x-jet-input id="username" class="block mt-1 w-full" type="text" name="username" :value="isset($employee) ? $employee->username : old('username')" required autofocus />
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="unit" value="{{ __('Unit') }}" />
                            <x-jet-input id="unit" class="block mt-1 w-full" type="text" name="unit" :value="isset($employee) ? $employee->unit : old('unit')" required autofocus />
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="position" value="{{ __('Jabatan') }}" />
                            <select id="position" name="position" class="block mt-1 w-full" required autofocus>
                                <option value="">Pilih Jabatan</option>
                                @foreach($positions as $position)
                                    <option value="{{ $position->id }}" {{ isset($employee) ? ($employee->position == $position->id ? 'selected' : '') : '' }}>
                                        {{ $position->position_name }}
                                    </option>
                                @endforeach
                                <option value="0">Other...</option>
                            </select>
                            <x-jet-input-error for="position" class="mt-2" />
                        </div>

                        <div id="otherPositionForm" class="mt-4" style="display: none;">
                            <x-jet-label for="new_position" value="{{ __('Tambah Jabatan Baru') }}" />
                            <x-jet-input id="new_position" class="block mt-1 w-full" type="text" name="new_position" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="date_joined" value="{{ __('Tanggal Bergabung') }}" />
                            <x-jet-input id="date_joined" class="block mt-1 w-full" type="date" name="date_joined" :value="isset($employee) ? $employee->date_joined : old('name')" required autofocus />
                            <x-jet-input-error for="date_joined" class="mt-2" />
                        </div>


                        <div class="mt-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="isset($employee) ? $employee->email : old('email')" required />
                            <x-jet-input-error for="email" class="mt-2" />
                        </div>

                        @if(isset($employee))
                        <div class="mt-4">
                            <x-jet-label for="input_password" value="{{ __('Password') }}" />
                            <x-jet-input id="input_password" class="block mt-1 w-full" type="password" name="input_password" :value="old('input_password')" placeholder="Kosongkan Jika Tidak Mau Merubah Password"/>
                        </div>
                        @else
                        <div class="mt-4">
                            <x-jet-label for="input_password" value="{{ __('Password') }}" />
                            <x-jet-input id="input_password" class="block mt-1 w-full" type="password" name="input_password" :value="old('input_password')" required/>
                        </div>
                        @endif

                        <div class="flex items-center justify-end mt-4">
                            <x-jet-button>
                                {{ __('Simpan') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#position').select2();

            $('#position').change(function() {
                console.log($(this).val())
                if ($(this).val() == 0) {
                    $('#otherPositionForm').show();
                } else {
                    $('#otherPositionForm').hide();
                }
            });
        });
    </script>
</x-app-layout>
