<x-job.job-layout jobNumber="{{ $job_listing->job_number }}" 
    title="{{ $job_listing->title }}">
    <livewire:show-job-details :job_listing="$job_listing" />
</x-job.job-layout>