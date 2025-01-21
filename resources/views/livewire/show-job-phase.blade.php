<div>
    <div>{{ $job_phase->title }}</div>
    <div>{{ $job_phase->description }}</div>
    <div>{{ $job_phase->start_date->format('d-m-Y') }}</div>
    <div>{{ $job_phase->end_date->format('d-m-Y') }}</div>

    <div class="mt-5">Job Tasks:</div>
    <div class="flex flex-row">
        @foreach ($job_phase->job_tasks as $job_task)
            <a href="/jobtasks/{{ $job_task->id }}">
                <div class="text-center text-black 10 p-4 rounded-lg bg-gray-200">
                    {{$job_task->title}}
                </div>
            </a>
            @if ($job_task != $job_phase->job_tasks->last())
                <div class="text-center mt-3.5 mx-5"> -> </div>
            @endif
        @endforeach
    </div>
</div>
