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
                    <form action="{{ isset($position) ? route('positions.update', $position->id) : route('positions.store') }}" method="POST">
                        @csrf
                        @if(isset($position))
                            @method('PUT')
                        @endif

                        <div>
                            <x-jet-label for="name" value="{{ __('Nama Jabatan') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="isset($position) ? $position->position_name : old('name')" required autofocus />
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>

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
</x-app-layout>
