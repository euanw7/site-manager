<div>
    <!-- TODO: Turn these into 3 tabs. Like you did on the coursework. -->
    <!-- TODO: Each item should be a link to a show page where you can edit and delete. -->
    <!-- TODO: Add a + button for each category where you can add a new item. -->

    <!-- 1. Add/Remove/Edit Products -->
    <div class="text-lg">Products</div>
    @foreach ($products as $product)
        <div>
            {{ $product->name }}
        </div>
    @endforeach

    <!-- 2. Add/Remove/Edit Sites -->
    <div class="mt-5 text-lg">Sites</div>
    @foreach ($sites as $site)
        <div>
            {{ $site->name }}
        </div>
    @endforeach

    <!-- 3. Add/Remove/Edit Users -->
    <div class="mt-5 text-lg">Users</div>
    @foreach ($users as $user)
        <div>
            {{ $user->name }}
        </div>
    @endforeach
</div>
