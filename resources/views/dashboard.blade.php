<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex items-center justify-center mt-10">
        <img class="w-9/12" src="\images\wide-logo.png" />
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-xl">
                    Your jobs
                </div>
                <div class="container mx-auto p-4 text-white">
                    @if($jobListings->isEmpty())
                        <div class="text-center py-10 text-lg">
                            No Jobs Found
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($jobListings as $jobListing)
                                <div class="text-white bg-gray-800 border-4 border-gray-700 rounded-2xl p-4 transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                                    <a href="/joblistings/{{ $jobListing->id }}" data-turbolinks="true">
                                        <div class="flex justify-between text-white h-32 p-4">
                                            <div>
                                                <b>{{ $jobListing->job_number }}</b>
                                                <div>{{ $jobListing->title }}</div>
                                            </div>

                                            <div class="self-start">
                                                @if ($jobListing->is_active)
                                                    <button class="w-5 h-5 bg-green-700 rounded-xl align-top" title="Active" disabled></button>
                                                @else
                                                    <button class="w-5 h-5 bg-red-700 rounded-xl align-top" title="Inactive" disabled></button>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
