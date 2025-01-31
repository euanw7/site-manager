<div class="text-black border-4 rounded-2xl p-1 w-96 h-max">
    <!-- Number & Title -->
    <div class="flex flex-row mb-1">
        <div class="flex items-center justify-center text-lg w-1/12 border-0 rounded-tl-lg bg-white mr-1">
            {{ $key + 1 }}
        </div>

        <div class="w-11/12 border-0 rounded-tr-lg bg-white p-2">
            {{ $value->title }}
        </div>
    </div>

    <!-- Description -->
    <div class="w-full border-0 mb-1 bg-white flex flex-wrap p-2">
        {{ $value->description }}
    </div>

    <!-- Start & End Date -->
    <div class="flex flex-row mb-1">
        <div class="w-1/2 border-0 mr-1 flex flex-row bg-white p-1">
            <div class="flex justify-center items-center rounded-bl-lg p-1">
                Start:
            </div>
            <div class="flex items-center border-0">
                {{ $value->start_date->format('d-m-Y') }}
            </div>
        </div>
        <div class="w-1/2 border-0 flex flex-row bg-white">
            <div class="flex justify-center items-center p-1">
                End:
            </div>
            <div class="flex items-center border-0 rounded-br-lg w-full">
                {{ $value->end_date->format('d-m-Y') }}
            </div>
        </div>
    </div>

    <!-- Tasks -->
    <div class="bg-white p-2 rounded-b-lg">
        <div class="mb-2">
            Tasks
        </div>
        @foreach ($value->job_tasks as $task)
            <a href="{{ route('jobtasks.show', $task->id) }}"
                class="flex flex-row mb-2 flex items-center hover:bg-gray-300 rounded-lg">
                @if ($task->approved)
                    <div class="flex items-center rounded-lg size-4 mr-2 bg-green-700"></div>
                @else
                    <div class="flex items-center rounded-lg size-4 mr-2 bg-red-700"></div>
                @endif
                <div>
                    {{ $task->title }}
                </div>
            </a>
        @endforeach
        <div>
            @if ($create_component_is_visible)
                <hr class="h-px my-4 border-0 bg-gray-700">

                <!-- Create Job Task -->
                <div class="mb-4">
                    <input type="text" placeholder="Title..." class="w-full rounded-t-lg" wire:model="title" />
                    @error('title')
                        {{ $message }}
                    @enderror
                    <input type="text" placeholder="Description..." class="w-full" wire:model="description" />
                    @error('description')
                        {{ $message }}
                    @enderror
                    <div class="flex flex-row">
                        <input type="date" class="w-1/2" wire:model="start_date" />
                        @error('start_date')
                            {{ $message }}
                        @enderror
                        <input type="date" class="w-1/2" wire:model="end_date" />
                        @error('end_date')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="rounded-b-lg p-2 border border-1 border-stone-500 flex flex-row items-center">
                        <input type="checkbox" class="mr-2" wire:model="quality_critical" />
                        <div>Quality Critical</div>
                    </div>
                </div>

                <div class="text-white flex flex-row">
                    <button wire:click="create_job_task"
                        class="bg-green-700 rounded-lg mr-2 w-1/2">
                        Create
                    </button>
                    <button wire:click="toggle_component_visibility"
                        class="bg-red-700 rounded-lg w-1/2">
                        Cancel
                    </button>
                </div>
            @else
                <button class="text-white bg-green-700 w-full rounded-lg"
                    wire:click="toggle_component_visibility"
                    title="Add Task">
                    +
                </button>
            @endif
        </div>
    </div>
</div>