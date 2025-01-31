<div class="text-black border-4 rounded-2xl p-1">
    <div class="flex flex-row mb-1">
        <div class="flex items-center justify-center text-lg w-1/12 border-0 rounded-tl-lg bg-white mr-0.5">
            {{ $key + 1 }}
        </div>

        <input placeholder="Title..."
            class="w-11/12 border-0 rounded-tr-lg"
            wire:model="job_phase_inputs.{{ $key }}.phase_title">
        @error('job_phase_inputs.{{ $key }}.phase_title')
            <div class="text-red-500">{{$message}}</div>
        @enderror
    </div>

    <textarea placeholder="Description..."
        rows="4"
        maxlength="255"
        class="w-full border-0 mb-0.5 min-h-24 resize-none"
        wire:model="job_phase_inputs.{{ $key }}.phase_description"></textarea>
    @error('job_phase_inputs.{{ $key }}.phase_description')
        <div class="text-red-500">{{$message}}</div>
    @enderror

    <div class="flex flex-row">
        <div class="w-1/2 border-0 mr-1 flex flex-row">
            <div class="bg-white flex justify-center items-center rounded-bl-lg p-1">
                Start:
            </div>
            <input placeholder="Start Date..."
                class="border-0"
                wire:model="job_phase_inputs.{{ $key }}.phase_start_date"
                type="date">
        </div>
        <div class="w-1/2 border-0 flex flex-row">
            <div class="bg-white flex justify-center items-center p-1">
                End:
            </div>
            <input placeholder="End Date......"
                class="border-0 rounded-br-lg w-full"
                wire:model="job_phase_inputs.{{ $key }}.phase_end_date"
                type="date">
        </div>
    </div>
</div>