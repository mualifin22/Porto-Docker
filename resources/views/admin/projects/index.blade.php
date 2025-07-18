<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col">
                <a href="{{ route('admin.projects.create') }}"
                    class="w-fit py-4 px-10 text-white bg-indigo-950 rounded-full font-bold">Add new project
                </a>
                <hr class="my-10">
                <div class="flex flex-col gap-y-5">
                    {{-- melakukan foreach dari table project --}}
                    @forelse ($projects as $project)
                    <div class="item-project flex flex-row items-center justify-between">
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
                        <div class="flex flex-row gap-x-2">
                            <a href="{{ route('admin.tool.assign', $project) }}" class="py-3 px-5 rounded-full bg-indigo-900 text-white">
                                Add Tools
                            </a>
                            <a href="#" class="py-3 px-5 rounded-full bg-indigo-900 text-white">
                                Add Screenshoots
                            </a>
                        </div>
                        <div class="flex flex-row gap-x-2">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="py-3 px-5 rounded-full bg-indigo-500 text-white">
                                Edit
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="py-3 px-5 rounded-full bg-red-500 text-white">
                                    Delete
                                </button>
                        </div>
                    </div>
                    @empty
                    <p>
                        Belum ada project tersedia.
                    </p>
                    @endforelse
                </div>
            </div>
        </div>
</x-app-layout>
