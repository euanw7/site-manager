<div>
    <div class="flex items-center gap-2 text-black pb-5">
        <input wire:model.live="search" type="text" placeholder="Search for a job..." class="border px-2 py-1 rounded w-64" />

        <select wire:model.live="is_active_filter" class="border p-1 pr-10 rounded">
            <option value="all">All</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>

    @if ($jobListings->count() == 0)
    <div class="text-center py-10 text-lg">
        No Jobs Found
    </div>
    @endif
    
    @foreach ($jobListings as $jobListing)
        <div class="inline-block align-top">
            <a href="/joblistings/{{ $jobListing->id }}">
                <div class="text-black h-32 w-52 p-4 rounded-lg mr-5 mb-5 bg-gray-200">
                    <b>{{ $jobListing->job_number }}</b>
                    <div>{{ $jobListing->title }}</div>
                    <div class="align-bottom">
                        @if ($jobListing->is_active)
                            <div class="text-green-700">Active</div>
                        @else
                            <div class="text-red-700">Inactive</div>
                        @endif
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
