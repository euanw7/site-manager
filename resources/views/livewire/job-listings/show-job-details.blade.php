<div>
    <div>{{$job_listing->description}}</div>
    <div>Start Date: {{ $job_listing->start_date->format('d-m-Y') }}</div>
    <div>End Date: {{ $job_listing->end_date->format('d-m-Y') }}</div>

    <!-- Active Status -->
    @if ($job_listing->is_active)
        <div class="text-green-700">Active</div>
    @else
        <div class="text-red-700">Inactive</div>
    @endif

    <!-- Job Phases -->
    <div class="mt-5 mb-2">Job Phases:</div>
    <div class="flex flex-wrap gap-5">
        @foreach ($job_listing->job_phases as $key=>$value)
            <livewire:show-job-phase-details :key="$key" :value="$value" />
        @endforeach
    </div>

    <!-- Key Employees -->
    <div class="mt-5">
        @foreach ($job_listing->user_assigned_roles as $role)
            <div>
                <b>{{ $role->user_role->name }}:</b> {{ $role->user->name }}
            </div>
        @endforeach
    </div>
</div>
