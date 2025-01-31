<div>
    <!-- Job Details -->
    <div class="text-2xl mb-3">Job Details</div>
    <div class="text-black border-4 rounded-2xl p-1">
        <div class="text-black w-full">
            <div class="flex flex-row mb-0.5">
                <input placeholder="Job Number..."
                    wire:model="job_number"
                    class="w-1/4 rounded-tl-lg mr-0.5">
                @error('job_number')
                    <div class="text-red-500">{{$message}}</div>
                @enderror
                <input placeholder="Job Title..."
                    wire:model="title"
                    class="w-3/4 rounded-tr-lg">
                @error('title')
                    <div class="text-red-500">{{$message}}</div>
                @enderror
            </div>

            <textarea placeholder="Description..."
                wire:model="description"
                rows="4"
                maxlength="255"
                class="w-full resize-none mb-0.5"></textarea>
            @error('description')
                <div class="text-red-500">{{$message}}</div>
            @enderror

            <div class="flex flex-row">
                <div class="flex flex-row w-1/2 mr-1 bg-white rounded-bl-lg">
                    <div class="flex justify-center items-center p-1">
                        Start:
                    </div>
                    <input placeholder="Start Date..."
                        wire:model="start_date"
                        class="border-0"
                        type="date">
                        @error('start_date')
                            <div class="text-red-500">{{$message}}</div>
                        @enderror
                </div>

                <div class="flex flex-row w-1/2 rounded-br-lg bg-white">
                    <div class="flex justify-center items-center p-1">
                        End:
                    </div>
                    <input placeholder="End Date......"
                        wire:model="end_date"
                        class="border-0"
                        type="date">
                        @error('end_date')
                            <div class="text-red-500">{{$message}}</div>
                        @enderror
                </div>
            </div>
        </div>
    </div>

    <!-- Job Phases -->
    <div class="text-2xl mt-20 mb-3">Phases</div>
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
    <div class="text-2xl mt-20 mb-3">Key Employees</div>
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
    <div class="text-2xl mt-20 mb-3">Site Details</div>
    <div class="grid grid-cols-[200px_200px] gap-1 flex items-center">
        <div>Site</div>
        <select wire:model="site_id" class="text-black">
            @foreach ($sites as $site)
                <option value="{{ $site->id }}"
                    @if ($site->id == old('site'))
                        selected="selected"
                    @endif
                    >{{ $site->name }}</option>
            @endforeach
        </select>
        @error('site_id')
            <div class="text-red-500">{{$message}}</div>
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