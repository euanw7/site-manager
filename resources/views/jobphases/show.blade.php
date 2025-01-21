<x-job.job-layout jobNumber="{{ $job_phase->job_listing->job_number }}" 
    jobTitle="{{ $job_phase->job_listing->title }}">
    <livewire:show-job-phase :job_phase="$job_phase" />
</x-job.job-layout>