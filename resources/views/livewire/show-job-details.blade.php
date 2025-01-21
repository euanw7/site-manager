<div>
    <div>{{$job_listing->description}}</div>
    <div>Start Date: {{ $job_listing->start_date->format('d-m-Y') }}</div>
    <div>Estimated End Date: {{ $job_listing->end_date->format('d-m-Y') }}</div>

    @if ($job_listing->is_active)
        <div class="text-green-700">Active</div>
    @else
        <div class="text-red-700">Inactive</div>
    @endif

    <div class="mt-5">Job Phases:</div>
    <div class="flex flex-row">
        @foreach ($job_listing->job_phases as $job_phase)
            <a href="/jobphases/{{ $job_phase->id }}">
                <div class="text-center text-black 10 p-4 rounded-lg bg-gray-200">
                    {{$job_phase->title}}
                </div>
            </a>
            @if ($job_phase != $job_listing->job_phases->last())
                <div class="text-center mt-3.5 mx-5"> -> </div>
            @endif
        @endforeach
    </div>
</div>
