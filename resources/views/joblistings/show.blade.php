<x-job.job-layout jobNumber="{{ $job_listing->job_number }}" 
    title="{{ $job_listing->title }}">
    <x-slot:header>
        <div class="flex flex-row">
            <a href="{{ route('joblistings.edit', ['id' => $job_listing->id]) }}" class="bg-green-700 text-white rounded-lg p-2 mr-4">
                Edit Job
            </a>
            <form method="POST" action="{{ route('joblistings.destroy', ['id' => $job_listing->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" 
                    onclick="return confirm('Are you sure you want to delete this job? This cannot be undone.')" 
                    class="bg-red-700 text-white rounded-lg p-2">
                    Delete Job
                </button>
            </form>
        </div>
    </x-slot:header>
    <livewire:show-job-details :job_listing="$job_listing" />
</x-job.job-layout>