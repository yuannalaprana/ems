<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee List') }}
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
                                <th class="py-2 px-4 border-b">Jabatan</th>
                                <th class="py-2 px-4 border-b">Jabatan Kedua</th>
                                <th class="py-2 px-4 border-b">Unit</th>
                                <th class="py-2 px-4 border-b">Tanggal Bergabung</th>
                                <th class="py-2 px-4 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $employee->name }}</td>
                                    @if($employee->position_name)
                                    <td class="py-2 px-4 border-b">{{ $employee->position_name }}</td>
                                    @else
                                    <td class="py-2 px-4 border-b"> <i> - / Jabatan Telah Dihapus <i> </td>
                                    @endif
                                    @if($employee->second_position)
                                    <td class="py-2 px-4 border-b">{{ $employee->second_position }}</td>
                                    @else
                                    <td class="py-2 px-4 border-b"> <i> - / Jabatan Telah Dihapus <i> </td>
                                    @endif
                                    <td class="py-2 px-4 border-b">{{ $employee->unit }}</td>
                                    <td class="py-2 px-4 border-b">{{ $employee->date_joined }}</td>
                                    <td class="py-2 px-4 border-b">            
                                        <x-jet-secondary-button class="ml-2">
                                            <a href="{{ route('employees.edit', $employee->id) }}">Ubah</a>
                                        </x-jet-secondary-button>

                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Yakin akan menghapus karyawan ini?');">
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
