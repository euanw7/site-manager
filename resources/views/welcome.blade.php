<x-guest-layout>
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-row flow-root">
            <div class="mr-10 float-left">
                Welcome to Site Manager 360
            </div>
            <a href="{{ route('dashboard') }}" class="ml-5 float-right">
                {{ __('Log in')}}
            </a>
        </div>
    </div>
</x-guest-layout>