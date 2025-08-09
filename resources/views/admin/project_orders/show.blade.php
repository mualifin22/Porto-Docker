<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Details') }}
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

                <div>
                    @csrf
                    <div class="flex flex-col gap-y-5">

                        <h1 class="text-3xl text-indigo-950 text-bold">Order Details</h1>

                        <div class="flex flex-col gap-y-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                            <p
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                {{ $project_order->name }}
                            </p>
                        </div>
                        <div class="flex flex-col gap-y-2">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <p
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                {{ $project_order->email }}
                            </p>
                        </div>
                        <div class="flex flex-col gap-y-2">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                            <p
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                {{ $project_order->category }}
                            </p>
                        </div>
                        <div class="flex flex-col gap-y-2">
                            <label for="budget" class="block mb-2 text-sm font-medium text-gray-900">Budget</label>
                            <p
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                ${{ number_format($project_order->budget, 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="flex flex-col gap-y-2">
                            <label for="brief" class="block mb-2 text-sm font-medium text-gray-900">Brief</label>
                            <p class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                {{ $project_order->brief }}
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</x-app-layout>