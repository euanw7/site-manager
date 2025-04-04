<div class="text-white bg-gray-800 border-4 border-gray-700 rounded-2xl p-4 mb-6">
    <div class="flex flex-col md:flex-row mb-2">
        <div class="flex items-center justify-center text-lg w-full md:w-1/12 border-0 rounded-tl-lg bg-gray-700 mr-1.5 mb-2 md:mb-0">
            {{ $key + 1 }}
        </div>

        <input placeholder="Title..."
            class="w-full md:w-11/12 border-0 rounded-tr-lg bg-gray-700 text-white p-2 mb-2 md:mb-0"
            wire:model="job_phase_inputs.{{ $key }}.phase_title">
        @error('job_phase_inputs.{{ $key }}.phase_title')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>

    <textarea placeholder="Description..."
        rows="4"
        maxlength="255"
        class="w-full border-0 mb-1.5 min-h-24 resize-none bg-gray-700 text-white p-2"
        wire:model="job_phase_inputs.{{ $key }}.phase_description"></textarea>
    @error('job_phase_inputs.{{ $key }}.phase_description')
        <div class="text-red-500">{{ $message }}</div>
    @enderror

    <div class="flex flex-col md:flex-row mb-4">
        <div class="w-full md:w-1/2 border-0 mr-0 md:mr-1.5 flex flex-row bg-gray-700 p-2 rounded-bl-lg mb-2 md:mb-0">
            <div class="flex justify-center items-center p-1">
                Start:
            </div>
            <input placeholder="Start Date..."
                class="border-0 bg-gray-700 text-white w-full"
                wire:model="job_phase_inputs.{{ $key }}.phase_start_date"
                type="date">
        </div>
        <div class="w-full md:w-1/2 border-0 flex flex-row bg-gray-700 p-2 rounded-br-lg">
            <div class="flex justify-center items-center p-1">
                End:
            </div>
            <input placeholder="End Date..."
                class="border-0 bg-gray-700 text-white rounded-br-lg w-full"
                wire:model="job_phase_inputs.{{ $key }}.phase_end_date"
                type="date">
        </div>
    </div>
</div>