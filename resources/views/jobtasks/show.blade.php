<x-job.job-layout jobNumber="{{ $job_task->job_phase->job_listing->job_number }}" 
    jobTitle="{{ $job_task->job_phase->job_listing->title }}">
    <livewire:show-job-task :job_task="$job_task" />
</x-job.job-layout>