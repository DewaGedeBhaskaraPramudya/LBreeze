@extends('sisw.template')

@section('content')    






<div>
    <div class="flex justify-start">
        <div class="float-left text-2xl font-bold">
            <h2>Input Data</h2>
        </div>

        
       
    </div>
        
            <form action="{{ route('sisw.store') }}" method="POST" class="w-full max-w-sm py-2">
                @csrf

                <div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:flex md:items-center">
                            <div class="md:w-20">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Nama">
                                Name:
                            </label>
                            </div>
                                <div class="md:w-2/3">
                                    <input id="Nama" type="text" name="Nama" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Input Name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:flex md:items-center">
                            <div class="md:w-20">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="NIM">
                                    Student ID:
                                </label>
                            </div>
                                <div class="md:w-2/3">
                                    <input id="NIM" type="text" name="NIM" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Input Student ID">
                                </div>
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:flex md:items-center">
                            <div class="md:w-20">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Prodi">
                                    Study Program:
                                </label>
                            </div>
                                <div class="md:w-2/3">
                                    <input id="Prodi" type="text" name="Prodi" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Input Study Program">
                                </div>
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:flex md:items-center">
                            <div class="md:w-20">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="IPK">
                                    GPA:
                                </label>
                            </div>
                                <div class="md:w-2/3">
                                    <input id="IPK" type="text" name="IPK" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Input GPA">
                                </div>
                            </div>
                        </div>
                </div>

                <div class="text-center flex justify-center">
                     <button type="submit" class=" bg-blue-500 hover:bg-blue-700 transition-colors text-white font-bold py-2 px-4 rounded flex items-center" onclick="return confirm('Save Data?')">
                        Save
                     </button>
                </div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Input Failed.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    
            </form>
                    <div>
                        <a href="{{ route('sisw.index')}}">
                                    <button class=" bg-green-500 hover:bg-green-700 transition-colors text-white font-bold py-2 px-4 rounded float-right">
                                        Back
                                    </button>
                        </a>
                    </div>

</div>


@endsection