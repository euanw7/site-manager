<x-job.job-layout title="{{ $job_listing->job_number . ' ' . $job_listing->title }}">
    <livewire:edit-job-listing :job_listing="$job_listing" :users="$users" :sites="$sites" :roles="$roles" />
</x-job.job-layout>