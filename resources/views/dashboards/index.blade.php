<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('dashboard.index') }}" method="GET">
                <div class="mt-4">
                    <x-jet-label for="start_date" value="{{ __('Tanggal Awal') }}" />
                    <x-jet-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" value="{{ $startDate }}" />
                    <x-jet-input-error for="start_date" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="end_date" value="{{ __('Tanggal Akhir') }}" />
                    <x-jet-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" value="{{ $endDate }}" />
                    <x-jet-input-error for="end_date" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button>
                        {{ __('Terapkan Filter') }}
                    </x-jet-button>
                </div>
            </form>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold mb-2">PERIODE YANG DIPILIH : {{ $startDate }} s/d {{ $endDate }}</h3>
                    </div>


                    <div class="mb-4">
                        <h3 class="text-lg font-semibold mb-2">Jumlah User Yang Mendaftar Pada Kurun Periode:  {{ $userCount }}</h3>
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold mb-2">Jumlah Jabatan Saat Ini : {{ $positionCount }}</h3>
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold mb-2">Jumlah Login Terhitung Pada Kurun Periode: {{ $loginCount }}</h3>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold mb-2">Daftar User Dengan Jumlah Login Terbanyak Dalam Kurun Periode : </h3>
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b">ID</th>
                                    <th class="py-2 px-4 border-b">Nama</th>
                                    <th class="py-2 px-4 border-b">Jumlah Login</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($loginInformation as $info)
                                    <tr>
                                        <td class="py-2 px-4 border-b">{{ $info->userId }}</td>
                                        <td class="py-2 px-4 border-b">{{ $info->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $info->amount }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
