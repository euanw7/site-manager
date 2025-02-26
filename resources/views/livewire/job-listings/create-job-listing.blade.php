<div class="container mx-auto p-4">
    <!-- Job Details -->
    <div class="text-2xl mb-3 text-white">Job Details</div>
    <div class="bg-gray-800 text-white border-4 border-gray-700 rounded-2xl p-4 mb-6">
        <div class="w-full">
            <div class="flex flex-row mb-4">
                <!-- Job Number -->
                <input placeholder="Job Number..."
                    wire:model="job_number"
                    class="w-1/4 rounded-tl-lg p-2 bg-gray-700 text-white border border-gray-600 mr-1">
                @error('job_number')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <!-- Title -->
                <input placeholder="Job Title..."
                    wire:model="title"
                    class="w-3/4 rounded-tr-lg p-2 bg-gray-700 text-white border border-gray-600">
                @error('title')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <textarea placeholder="Description..."
                wire:model="description"
                rows="4"
                maxlength="255"
                class="w-full resize-none mb-4 p-2 bg-gray-700 text-white border border-gray-600 rounded-lg"></textarea>
            @error('description')
                <div class="text-red-500">{{ $message }}</div>
            @enderror

            <div class="flex flex-row mb-4">
                <div class="w-1/2 mr-1">
                    <!-- Start Date -->
                    <div class="flex flex-row bg-gray-700 p-2 rounded-lg">
                        <div class="flex justify-center items-center p-1">
                            Start:
                        </div>
                        <input placeholder="Start Date..."
                            wire:model="start_date"
                            class="border-0 bg-gray-700 text-white"
                            type="date">
                        @error('start_date')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="w-1/2">
                    <!-- End Date -->
                    <div class="flex flex-row bg-gray-700 p-2 rounded-lg">
                        <div class="flex justify-center items-center p-1">
                            End:
                        </div>
                        <input placeholder="End Date..."
                            wire:model="end_date"
                            class="border-0 bg-gray-700 text-white"
                            type="date">
                        @error('end_date')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
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
            class="bg-green-700 rounded-lg w-10 h-10 mr-2">
            +
        </button>
        <button wire:click="remove_phase"
            class="bg-red-700 rounded-lg w-10 h-10">
            -
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
            class="bg-green-700 rounded-lg w-10 h-10 text-2xl mr-2">
            +
        </button>
        <button wire:click="remove_key_employee" 
            class="bg-red-700 rounded-lg w-10 h-10 text-2xl">
            -
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
            <div class="text-red-500">{{ $message }}</div>
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