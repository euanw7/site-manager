<div class="container mx-auto p-4">
    <style>
        .error-message {
            color: #f56565; /* Tailwind CSS red-500 */
            font-size: 0.875rem; /* Tailwind CSS text-sm */
            margin-top: 0.25rem; /* Tailwind CSS mt-1 */
        }
    </style>

    <!-- Job Details -->
    <div class="text-2xl mb-3 text-white">Job Details</div>
    <div class="bg-gray-800 text-white border-4 border-gray-700 rounded-2xl p-4 mb-6">
        <div class="w-full">
            <div class="flex flex-row mb-2">
                <!-- Job Number -->
                <div class="w-1/4 mr-1.5">
                    <input placeholder="Job Number..."
                        wire:model="job_number"
                        class="w-full rounded-tl-lg p-2 bg-gray-700 text-white border border-gray-600">
                    @error('job_number')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Title -->
                <div class="w-3/4">
                    <input placeholder="Job Title..."
                        wire:model="title"
                        class="w-full rounded-tr-lg p-2 bg-gray-700 text-white border border-gray-600">
                    @error('title')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Description -->
            <div class="mb-1.5">
                <textarea placeholder="Description..."
                    wire:model="description"
                    rows="4"
                    maxlength="255"
                    class="w-full resize-none p-2 bg-gray-700 text-white border border-gray-600"></textarea>
                @error('description')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-row">
                <div class="w-1/2 mr-1.5">
                    <!-- Start Date -->
                    <div class="flex flex-row bg-gray-700 p-2 rounded-bl-lg">
                        <div class="flex justify-center items-center p-1">
                            Start:
                        </div>
                        <input placeholder="Start Date..."
                            wire:model="start_date"
                            class="border-0 bg-gray-700 text-white"
                            type="date">
                    </div>
                    @error('start_date')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-1/2">
                    <!-- End Date -->
                    <div class="flex flex-row bg-gray-700 p-2 rounded-br-lg">
                        <div class="flex justify-center items-center p-1">
                            End:
                        </div>
                        <input placeholder="End Date..."
                            wire:model="end_date"
                            class="border-0 bg-gray-700 text-white"
                            type="date">
                    </div>
                    @error('end_date')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            
        </div>
    </div>

    <!-- Job Phases -->
    <div class="text-2xl mt-20 mb-3 text-white">Phases</div>
    <div class="flex flex-row flex-wrap gap-10">
        <div class="flex flex-wrap gap-5">
            @foreach ($job_phase_inputs as $key=>$value)
                <x-job.job-phase-input :key="$key" :value="$value" />
            @endforeach
        </div>
    </div>

    <div class="mt-5">
        <button wire:click="add_phase"
            class="bg-green-700 rounded-lg mr-2 p-2">
            Add Phase
        </button>
        <button wire:click="remove_phase"
            class="bg-red-700 rounded-lg p-2">
            Remove Phase
        </button>
    </div>

    <!-- Key Employees -->
    <div class="text-2xl mt-20 mb-3 text-white">Key Employees</div>
    <div class="flex flex-col gap-5">
        @foreach ($key_employee_inputs as $key=>$value)
            <x-job.key-employee-input :key="$key" :value="$value" :users="$users" :roles="$roles" />
        @endforeach
    </div>

    <div class="mt-5">
        <button wire:click="add_key_employee" 
            class="bg-green-700 rounded-lg p-2 mr-2">
            Add Key Employee
        </button>
        <button wire:click="remove_key_employee" 
            class="bg-red-700 rounded-lg p-2">
            Remove Key Employee
        </button>
    </div>

    <!-- Site Details -->
    <div class="text-2xl mt-20 mb-3 text-white">Site Details</div>
    <div class="grid grid-cols-[200px_200px] gap-1 flex items-center">
        <div class="text-white">Site</div>
        <select wire:model="site_id" class="text-black bg-gray-700 text-white border border-gray-600 rounded-lg p-2">
            @foreach ($sites as $site)
                <option value="{{ $site->id }}"
                    @if ($site->id == old('site'))
                        selected="selected"
                    @endif
                    >{{ $site->name }}</option>
            @endforeach
        </select>
        @error('site_id')
            <div class="error-message">{{ $message }}</div>
        @enderror
    </div>

    <div class="mt-10 flow-root">
        <div class="float-right">
            <button wire:click="create_job_listing"
                class="bg-green-700 rounded-lg p-2 mr-2">
                Create
            </button>
            <button wire:click="cancel"
                class="bg-red-700 rounded-lg p-2">
                Cancel
            </button>
        </div>
    </div>
</div>