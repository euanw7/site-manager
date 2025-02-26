<div class="container mx-auto p-4">
    <div class="flex items-center gap-2 text-black pb-5">
        <input wire:model.live="search" type="text" placeholder="Search for a job..." class="border px-4 py-2 rounded w-64 shadow-sm" />

        <select wire:model.live="is_active_filter" class="border px-4 py-2 rounded shadow-sm">
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
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($jobListings as $jobListing)
            <div class="bg-white shadow-md rounded-lg overflow-hidden transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <a href="/joblistings/{{ $jobListing->id }}" data-turbolinks="true">
                    <div class="flex justify-between text-black h-32 p-4">
                        <div>
                            <b>{{ $jobListing->job_number }}</b>
                            <div>{{ $jobListing->title }}</div>
                        </div>

                        <div class="self-start">
                            @if ($jobListing->is_active)
                                <button class="w-5 h-5 bg-green-700 rounded-xl align-top" title="Active" disabled></button>
                            @else
                                <button class="w-5 h-5 bg-red-700 rounded-xl align-top" title="Inactive" disabled></button>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>