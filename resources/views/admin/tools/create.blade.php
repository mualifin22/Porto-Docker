<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Tools') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif

                <form action="{{ route('admin.tools.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col gap-y-5">

                        <h1 class="text-3xl text-indigo-950 text-bold">Add New Tool</h1>

                        <div class="flex flex-col gap-y-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Tool
                                Name</label>
                            <input type="text" id="name" name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                        </div>
                        <div class="flex flex-col gap-y-2">
                            <label for="logo" class="block mb-2 text-sm font-medium text-gray-900">Logo Image</label>
                            <input type="file" id="logo" name="logo">
                        </div>
                        <div class="flex flex-col gap-y-2">
                            <label for="tagline" class="block mb-2 text-sm font-medium text-gray-900">Tagline
                                Tool</label>
                            <input type="text" id="tagline" name="tagline"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-full sm:w-auto px-5 py-2.5 text-center">Upload
                            Tool</button>
                    </div>

                </form>

            </div>
        </div>
</x-app-layout>
