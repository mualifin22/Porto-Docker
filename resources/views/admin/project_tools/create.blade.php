<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Projects') }}
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

                <form action="{{ route('admin.tool.assign.store', $project) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col gap-y-5">

                        <h1 class="text-3xl text-indigo-950 text-bold">Assign Tool to Project</h1>
                        <div class="flex flex-col gap-y-2">
                            <h3>
                                Tools
                            </h3>
                            <select id="tool_id" name="tool_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                                <option value="">Select a tool</option>
                                @forelse($tools as $tool)
                                    <option value="{{ $tool->id }}">{{ $tool->name }}</option>
                                @empty
                                    <option value="">No tools Selected</option>
                                @endforelse
                            </select>
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-full sm:w-auto px-5 py-2.5 text-center">Assign Tool to
                            Project</button>
                    </div>

                </form>

            </div>
        </div>
</x-app-layout>
