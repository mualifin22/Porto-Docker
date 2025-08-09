<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col">
                <div class="flex flex-col gap-y-5">
                    {{-- melakukan foreach dari table project --}}
                    @forelse ($project_orders as $order)
                    <div class="item-project flex flex-row items-center justify-between">
                        <div class="flex flex-row items-center gap-x-5">
                            <div class="flex flex-col gap-y-1">
                                <h3 class="font-bold text-xl">
                                    {{ $order->name }}
                                </h3>
                                <p class="text-sm text-slate-400">
                                    {{ $order->category }}
                                </p>
                            </div>
                        </div>

                        <div class="flex flex-row gap-x-2">
                            <p class="text-sm text-slate-400">
                                ${{ number_format($order->budget, 0, ',', '.') }}
                            </p>
                        </div>

                        <div class="flex flex-row gap-x-2">
                            <a href="{{ route('admin.project_orders.show', $order) }}" class="py-3 px-5 rounded-full bg-indigo-500 text-white">
                                Show details
                            </a>
                        </div>
                    </div>
                    @empty
                    <p>
                        Belum ada order tersedia.
                    </p>
                    @endforelse
                </div>
            </div>
        </div>
</x-app-layout>
