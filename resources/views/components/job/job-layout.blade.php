<x-app-layout>
    <x-slot name="header">
        <div class="flow-root">
            <h2 class="float-left font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex flex-row">
                @isset ($jobNumber)
                    <div class="mr-8">{{ $jobNumber }}</div>
                @endisset
                <div>{{ $title }}</div>
            </h2>
            @isset ($header)
                <div class="float-right">
                    {{ $header }}
                </div>
            @endisset
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>