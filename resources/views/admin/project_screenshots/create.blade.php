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

                <form action="{{ route('admin.project_screenshots.store', $project) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col gap-y-5">

                        <h1 class="text-3xl text-indigo-950 text-bold">Assign Tool to Project</h1>

                        <div class="flex flex-row items-center gap-x-5">
                            <img src="{{ Storage::url($project->cover) }}" alt=""
                                class="object-cover w-[120px] h-[90px] rounded-2xl">
                            <div class="flex flex-col gap-y-1">
                                <h3 class="font-bold text-xl">
                                    {{ $project->name }}
                                </h3>
                                <p class="text-sm text-slate-400">
                                    {{ $project->category }}
                                </p>
                            </div>
                        </div>

                        <div class="flex flex-col gap-y-2">
                            <label for="screenshot" class="block mb-2 text-sm font-medium text-gray-900">Screenshot Image</label>
                            <input type="file" id="screenshot" name="screenshot">
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-full sm:w-auto px-5 py-2.5 text-center">Add Screenshot to Project</button>
                    </div>

                </form>

                <hr class="my-10">

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Assigned Screenshots') }}
                </h2>
                <p class="text-sm text-slate-400 mb-5">
                    List of screenshots assigned to this project.
                </p>


                <div class="flex flex-col gap-y-5">
                    {{-- melakukan foreach dari table screenshots --}}
                    @forelse ($project->screenshots as $screenshot)
                    <div class="item-screenshot flex flex-row items-center justify-between">
                        <div class="flex flex-row items-center gap-x-5">
                            <img src="{{ Storage::url($screenshot->screenshot) }}" alt=""
                                class="object-cover w-[120px] h-[90px] rounded-2xl">
                        </div>
                        <div class="flex flex-row gap-x-2">
                            <form action="{{ route('admin.project_screenshots.destroy', $screenshot->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="py-3 px-5 rounded-full bg-red-500 text-white">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <p>
                        Belum ada screenshot tersedia.
                    </p>
                    @endforelse
                </div>

            </div>
        </div>
</x-app-layout>
