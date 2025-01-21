<x-job.job-layout title="{{ __('Jobs') }}">
    <x-slot:header>
        <a href="{{ route('joblistings.create') }}" 
            class="bg-green-700 text-white rounded-lg p-2"
            data-turbolinks="true">
            New Job
        </a>
    </x-slot:header>
    <livewire:show-job-listings />
</x-job.job-layout>