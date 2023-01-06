@extends('sisw.template')

@section('content')

    @if ($message = Session::get('success'))
    <div class="py-3">
        <div class="text-lg text-left font-semibold text-white bg-blue-600 px-2">
            <p>{{ $message }}</p>
        </div>
    </div>
    @endif


    
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Student Data
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400"></p>
                    </caption>
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">No</th>
                    <th scope="col" class="py-3 px-6">Name</th>
                    <th scope="col" class="py-3 px-6">Student ID</th>
                    <th scope="col" class="py-3 px-6">Study Program</th>
                    <th scope="col" class="py-3 px-6">GPA</th>
                    <th scope="col" class="py-3 px-6">Action</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($sisw as $siswa)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $siswa->Nama }}</td>
            <td class="text-center">{{ $siswa->NIM }}</td>
            <td class="text-center">{{ $siswa->Prodi }}</td>
            <td class="text-center">{{ $siswa->IPK }}</td>
            <td class="text-center">
                <div class="flex justify-center">
                    <div class="px-1">
                        <a href="{{ route('sisw.edit',$siswa->id) }}">
                        <button class=" bg-green-500 hover:bg-green-700 transition-colors text-white font-bold py-2 px-4 rounded">
                            Edit
                        </button>
                        </a>
                    </div>    
                
                    <div>
                        <form action="{{ route('sisw.destroy',$siswa->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class=" bg-red-500 hover:bg-red-700 transition-colors text-white font-bold py-2 px-4 rounded" onclick="return confirm('Delete Data?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
            </tbody>
        </table>
    </div>
    </table>

    <div class="flex justify-end p-3">
            <div class=" py-2 px-2">
                <a href="{{ route('sisw.create') }}">
                <button class=" bg-blue-500 hover:bg-blue-700 transition-colors text-white font-bold py-2 px-4 rounded">
                Input New Data
            </button>
                </a>
            </div>

            <div class=" py-2 px-2">
            <a href="/siswa/export_excel" target="_blank">
                <button class="bg-yellow-500 hover:bg-yellow-700 transition-colors text-white font-bold py-2 px-4 rounded" onclick="return confirm('Export Student Data ?')">Export Data</button>
            </a>
            </div>

            <div>
            <div class="max-w-2xl mx-auto">


    <div class=" py-2 px-2">
        <a href="/siswa/import">
        <button class="bg-green-500 hover:bg-green-700 transition-colors text-white font-bold py-2 px-4 rounded" type="button" data-modal-toggle="default-modal">Import Data</button>
        </a>
    </div>


</div>


            </div>
    </div>
</div>

    {!! $sisw->links() !!}

@endsection