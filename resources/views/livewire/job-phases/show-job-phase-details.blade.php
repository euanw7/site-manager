<div class="text-white bg-gray-800 border-4 border-gray-700 rounded-2xl p-4 w-full h-max mb-6">
    <!-- Number & Title -->
    <div class="flex flex-row mb-1">
        <div class="flex items-center justify-center text-lg w-1/12 border-0 rounded-tl-lg bg-gray-700 mr-1 p-2">
            {{ $key + 1 }}
        </div>

        <div class="w-11/12 border-0 rounded-tr-lg bg-gray-700 p-2">
            {{ $value->title }}
        </div>
    </div>

    <!-- Description -->
    <div class="w-full border-0 mb-1 min-h-24 resize-none flex flex-wrap p-2 bg-gray-700">
        {{ $value->description }}
    </div>

    <!-- Start & End Date -->
    <div class="flex flex-row mb-1">
        <div class="w-1/2 border-0 mr-1 flex flex-row bg-gray-700 p-2">
            <div class="flex justify-center items-center rounded-bl-lg p-1">
                Start:
            </div>
            <div class="flex items-center border-0">
                {{ $value->start_date->format('d-m-Y') }}
            </div>
        </div>
        <div class="w-1/2 border-0 flex flex-row bg-gray-700 p-2">
            <div class="flex justify-center items-center p-1">
                End:
            </div>
            <div class="flex items-center border-0 rounded-br-lg w-full">
                {{ $value->end_date->format('d-m-Y') }}
            </div>
        </div>
    </div>

    <!-- Tasks -->
    <div class="bg-gray-700 p-4 rounded-b-lg">
        <div class="mb-4 font-semibold">
            Tasks
        </div>
        @foreach ($value->job_tasks as $task)
            <a href="{{ route('jobtasks.show', $task->id) }}"
                class="flex flex-row mb-2 items-center hover:bg-gray-600 rounded-lg p-2"
                data-turbolinks="true">
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
        @if(Gate::allows('is.admin'))
            <div>
                @if ($create_component_is_visible)
                    <hr class="h-px my-4 border-0 bg-gray-600">

                    <!-- Create Job Task -->
                    <div class="mb-4">
                        <input type="text" placeholder="Title..." class="w-full rounded-t-lg p-2 bg-gray-800 text-white border border-gray-600" wire:model="title" />
                        @error('title')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                        <input type="text" placeholder="Description..." class="w-full p-2 bg-gray-800 text-white border border-gray-600" wire:model="description" />
                        @error('description')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                        <div class="flex flex-row">
                            <input type="date" class="w-1/2 p-2 bg-gray-800 text-white border border-gray-600" wire:model="start_date" />
                            @error('start_date')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                            <input type="date" class="w-1/2 p-2 bg-gray-800 text-white border border-gray-600" wire:model="end_date" />
                            @error('end_date')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="rounded-b-lg p-2 border border-gray-600 flex flex-row items-center bg-gray-800">
                            <input type="checkbox" class="mr-2" wire:model="quality_critical" />
                            <div>Quality Critical</div>
                        </div>
                    </div>

                    <div class="text-white flex flex-row">
                        <button wire:click="create_job_task"
                            class="bg-green-700 rounded-lg mr-2 w-1/2 p-2">
                            Create
                        </button>
                        <button wire:click="toggle_component_visibility"
                            class="bg-red-700 rounded-lg w-1/2 p-2">
                            Cancel
                        </button>
                    </div>
                @else
                    <button class="text-white bg-green-700 w-full rounded-lg p-2"
                        wire:click="toggle_component_visibility"
                        title="Add Task">
                        +
                    </button>
                @endif
            </div>
        @endif
    </div>
</div>