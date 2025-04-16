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
        <div class="text-lg font-semibold mb-4">Job Phases</div>
        <div class="flex flex-wrap gap-5">
            @foreach ($job_listing->job_phases as $key=>$value)
                <livewire:show-job-phase-details :key="$key" :value="$value" />
            @endforeach
        </div>
    </div>

    <!-- Key Employees -->
    <div class="bg-gray-700 text-white shadow-md rounded-lg p-6 mb-6">
        <div class="text-lg font-semibold mb-4">Key Employees</div>
        @foreach ($job_listing->user_assigned_roles as $role)
            <div class="mb-2 text-gray-200">
                <b>{{ $role->user_role->name }}:</b> {{ $role->user->name }}
            </div>
        @endforeach
    </div>

    <!-- Employees -->
    <div class="bg-gray-700 text-white shadow-md rounded-lg p-6">
        <div class="text-lg font-semibold mb-4">Employees</div>
        @if($assigned_employees->isEmpty())
            <p class="text-gray-200">No employees assigned to this job listing.</p>
        @else
            @foreach($assigned_employees as $employee)
            <div class="flex justify-between items-center mb-2">
                <p>{{ $employee->name }}</p>
                @if (Gate::allows('is.admin') || Gate::allows('is.job.manager', $job_listing))
                    <button wire:click="remove_employee({{ $employee->id }})" class="bg-red-700 text-white rounded-lg px-2 py-1">
                        Remove
                    </button>
                @endif
            </div>
            @endforeach
        @endif
        @if (Gate::allows('is.admin') || Gate::allows('is.job.manager', $job_listing))
            <div>
                @if($add_employee_component_is_visible)
                    <select wire:model="selected_employee" class="bg-gray-800 text-white rounded-lg p-2 mt-4 w-full">
                        <option value="">Select Employee</option>
                        @foreach($available_employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                        @endforeach
                    </select>
                    <div class="flex justify-between mt-4 w-full">
                        <button wire:click="add_employee" class="bg-green-700 text-white rounded-lg px-4 py-2 w-1/2 mr-2">
                            Add
                        </button>
                        <button wire:click="toggle_add_employee_component_visibility" class="bg-red-700 text-white rounded-lg px-4 py-2 w-1/2 ml-2">
                            Cancel
                        </button>
                    </div>
                @else
                    <button wire:click="toggle_add_employee_component_visibility" class="bg-green-700 text-white rounded-lg p-2 mt-4">
                        Add Employee
                    </button>
                @endif
            </div>
        @endif
    </div>
</div>