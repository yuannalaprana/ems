<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Jabatan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <x-jet-section-border />

                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($positions as $position)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $position->position_name }}</td>
                                    <td class="py-2 px-4 border-b">            
                                        <x-jet-secondary-button class="ml-2">
                                            <a href="{{ route('positions.edit', $position->id) }}">Ubah</a>
                                        </x-jet-secondary-button>

                                        <form action="{{ route('positions.destroy', $position->id) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Pengahapusan jabatan dapat mempengaruhi karyawan yang menjabat ini. Yakin akan menghapus jabatan ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <x-jet-danger-button type="submit">Delete</x-jet-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
