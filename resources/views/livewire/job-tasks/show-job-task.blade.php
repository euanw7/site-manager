<div>
    <div>{{ $job_task->title }}</div>
    <div>{{ $job_task->description }}</div>
    <div>{{ $job_task->start_date->format('d-m-Y') }}</div>
    <div>{{ $job_task->end_date->format('d-m-Y') }}</div>
    <div>{{ $job_task->approved }}</div>
    <div>{{ $job_task->quality_critical }}</div>
</div>
