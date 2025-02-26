<div class="container mx-auto p-4">
    <div class="bg-gray-700 text-white shadow-md rounded-lg p-6 mb-6">
        <div class="text-lg font-semibold mb-4">{{ $job_listing->description }}</div>
        <div class="mb-2">
            <span class="font-bold">Start Date:</span> {{ $job_listing->start_date->format('d-m-Y') }}
        </div>
        <div class="mb-4">
            <span class="font-bold">End Date:</span> {{ $job_listing->end_date->format('d-m-Y') }}
        </div>

        <!-- Active Status -->
        @if ($job_listing->is_active)
            <div class="text-green-400 font-bold mb-4">Active</div>
        @else
            <div class="text-red-400 font-bold mb-4">Inactive</div>
        @endif
    </div>

    <!-- Job Phases -->
    <div class="bg-gray-700 text-white shadow-md rounded-lg p-6 mb-6">
        <div class="text-lg font-semibold mb-4">Job Phases:</div>
        <div class="flex flex-wrap gap-5">
            @foreach ($job_listing->job_phases as $key=>$value)
                <livewire:show-job-phase-details :key="$key" :value="$value" />
            @endforeach
        </div>
    </div>

    <!-- Key Employees -->
    <div class="bg-gray-700 text-white shadow-md rounded-lg p-6">
        <div class="text-lg font-semibold mb-4">Key Employees:</div>
        @foreach ($job_listing->user_assigned_roles as $role)
            <div class="mb-2">
                <b>{{ $role->user_role->name }}:</b> {{ $role->user->name }}
            </div>
        @endforeach
    </div>
</div>