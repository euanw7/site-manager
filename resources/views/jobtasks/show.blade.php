<x-job.job-layout jobNumber="{{ $job_task->job_phase->job_listing->job_number }}" 
    title="{{ $job_task->job_phase->job_listing->title }}">
    <livewire:show-job-task :job_task="$job_task" :products="$products" />
</x-job.job-layout>