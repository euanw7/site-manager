<div>
    <div class="mb-2">
        <ul class="flex flex-wrap">
            <x-tab data-tab-target="#productsTab" wire:click="setActiveTab('productsTab')" class="{{ $activeTab === 'productsTab' ? 'border-blue-500 text-blue-500' : 'border-gray-500 text-gray-500'}}">Products</x-tab>
            <x-tab data-tab-target="#sitesTab" wire:click="setActiveTab('sitesTab')" class="{{ $activeTab === 'sitesTab' ? 'border-blue-500 text-blue-500' : 'border-gray-500 text-gray-500'}}">Sites</x-tab>
            <x-tab data-tab-target="#usersTab" wire:click="setActiveTab('usersTab')" class="{{ $activeTab === 'usersTab' ? 'border-blue-500 text-blue-500' : 'border-gray-500 text-gray-500'}}">Users</x-tab>
            <x-tab data-tab-target="#rolesTab" wire:click="setActiveTab('rolesTab')" class="{{ $activeTab === 'rolesTab' ? 'border-blue-500 text-blue-500' : 'border-gray-500 text-gray-500'}}">Roles</x-tab>
            <x-tab data-tab-target="#hoursTab" wire:click="setActiveTab('hoursTab')" class="{{ $activeTab === 'hoursTab' ? 'border-blue-500 text-blue-500' : 'border-gray-500 text-gray-500'}}">Export Hours</x-tab>
        </ul>
        <hr class="border-b border-gray-700 mb-4"></hr>
    </div>

    <div class="p-5 bg-gray-900 text-white rounded-lg shadow-lg">
        <!-- 1. Add/Remove/Edit Products -->
        <div id="productsTab" class="tab-content {{ $activeTab === 'productsTab' ? '' : 'hidden'}}">
            <div class="text-lg font-bold mb-3">Products</div>
            <div class="space-y-2">
                @foreach ($products as $product)
                    <div class="p-2 bg-gray-800 rounded-lg">
                        {{ $product->name }}
                    </div>
                @endforeach
            </div>
            @if ($create_product_component_is_visible)
                <div class="mt-3 p-4 bg-gray-700 rounded-lg border border-gray-600 space-y-3">
                    <div class="text-white font-semibold text-sm">Add New Product</div>
                    <input type="text" placeholder="Product Name..." class="w-full rounded-lg p-2 bg-gray-800 text-white border border-gray-600" wire:model="product_name" />
                    @error('product_name')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                    
                    <input type="text" placeholder="Product Description..." class="w-full rounded-lg p-2 bg-gray-800 text-white border border-gray-600" wire:model="product_description" />
                    @error('product_description')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror

                    <div class="flex flex-row gap-4">
                        <button wire:click="create_product" class="bg-green-700 hover:bg-green-600 rounded-lg w-full p-2">
                            Create Product
                        </button>
                        <button wire:click="cancel('product')" class="bg-red-700 hover:bg-red-600 rounded-lg w-full p-2">
                            Cancel
                        </button>
                    </div>
                </div>
            @else
                <button class="text-white bg-green-700 hover:bg-green-600 w-full rounded-lg p-2 mt-3"
                    wire:click="toggle_component_visibility('product')"
                    title="Add Product">
                    Add Product
                </button>
            @endif
        </div>

        <!-- 2. Add/Remove/Edit Sites -->
        <div id="sitesTab" class="tab-content {{ $activeTab === 'sitesTab' ? '' : 'hidden'}}">
            <div class="text-lg font-bold mb-3">Sites</div>
            <div class="space-y-2">
                @foreach ($sites as $site)
                    <div class="p-2 bg-gray-800 rounded-lg">
                        {{ $site->name }}
                    </div>
                @endforeach
            </div>
            @if ($create_site_component_is_visible)
                <div class="mt-3 p-4 bg-gray-700 rounded-lg border border-gray-600 space-y-3">
                    <div class="text-white font-semibold text-sm">Add New Site</div>
                    <input type="text" placeholder="Site Name..." class="w-full rounded-lg p-2 bg-gray-800 text-white border border-gray-600" wire:model="site_name" />
                    @error('site_name')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                    
                    <input type="text" placeholder="Site Address..." class="w-full rounded-lg p-2 bg-gray-800 text-white border border-gray-600" wire:model="address" />
                    @error('address')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror

                    <input type="text" placeholder="Employee Instructions..." class="w-full rounded-lg p-2 bg-gray-800 text-white border border-gray-600" wire:model="employee_instructions" />
                    @error('employee_instructions')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror

                    <div class="flex flex-row gap-4">
                        <button wire:click="create_site" class="bg-green-700 hover:bg-green-600 rounded-lg w-full p-2">
                            Create Site
                        </button>
                        <button wire:click="cancel('site')" class="bg-red-700 hover:bg-red-600 rounded-lg w-full p-2">
                            Cancel
                        </button>
                    </div>
                </div>
            @else
                <button class="text-white bg-green-700 hover:bg-green-600 w-full rounded-lg p-2 mt-3"
                    wire:click="toggle_component_visibility('site')"
                    title="Add Site">
                    Add Site
                </button>
            @endif
        </div>

        <!-- 3. Add/Remove/Edit Users -->
        <div id="usersTab" class="tab-content {{ $activeTab === 'usersTab' ? '' : 'hidden'}}">
            <div class="text-lg font-bold mb-3">Users</div>
            <div class="space-y-2">
                @foreach ($users as $user)
                    <div class="p-2 bg-gray-800 rounded-lg">
                        {{ $user->name }}
                    </div>
                @endforeach
            </div>
            @if ($create_user_component_is_visible)
                <div class="mt-3 p-4 bg-gray-700 rounded-lg border border-gray-600 space-y-3">
                    <div class="text-white font-semibold text-sm">Add New User</div>
                    <input type="text" placeholder="User Name..." class="w-full rounded-lg p-2 bg-gray-800 text-white border border-gray-600" wire:model="user_name" />
                    @error('user_name')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                    
                    <input type="email" placeholder="User Email..." class="w-full rounded-lg p-2 bg-gray-800 text-white border border-gray-600" wire:model="email" />
                    @error('user_email')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror

                    <input type="text" placeholder="Password..." class="w-full rounded-lg p-2 bg-gray-800 text-white border border-gray-600" wire:model="password" />
                    @error('password')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror

                    <input type="text" placeholder="Confirm Password..." class="w-full rounded-lg p-2 bg-gray-800 text-white border border-gray-600" wire:model="password_confirmation" />

                    <div class="flex items-center mt-3">
                        <input type="checkbox" id="is_admin" class="w-5 h-5 text-blue-600 bg-gray-800 border-gray-600 rounded focus:ring-blue-500" wire:model="is_admin">
                        <label for="is_admin" class="ml-2 text-white text-sm">Is Admin</label>
                    </div>

                    <div class="flex flex-row gap-4">
                        <button wire:click="create_user" class="bg-green-700 hover:bg-green-600 rounded-lg w-full p-2">
                            Create User
                        </button>
                        <button wire:click="cancel('user')" class="bg-red-700 hover:bg-red-600 rounded-lg w-full p-2">
                            Cancel
                        </button>
                    </div>
                </div>
            @else
                <button class="text-white bg-green-700 hover:bg-green-600 w-full rounded-lg p-2 mt-3"
                    wire:click="toggle_component_visibility('user')"
                    title="Add User">
                    Add User
                </button>
            @endif
        </div>

        <!-- 4. Add/Remove/Edit User Roles -->
        <div id="rolesTab" class="tab-content {{ $activeTab === 'rolesTab' ? '' : 'hidden'}}">
            <div class="text-lg font-bold mb-3">User Roles</div>
            <div class="space-y-2">
                @foreach ($user_roles as $user_role)
                    <div class="p-2 bg-gray-800 rounded-lg">
                        {{ $user_role->name }}
                    </div>
                @endforeach
            </div>
            @if ($create_role_component_is_visible)
                <div class="mt-3 p-4 bg-gray-700 rounded-lg border border-gray-600 space-y-3">
                    <div class="text-white font-semibold text-sm">Add New User Role</div>
                    <input type="text" placeholder="User Role Name..." class="w-full rounded-lg p-2 bg-gray-800 text-white border border-gray-600" wire:model="role_name" />
                    @error('user_role_name')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                
                    <div class="flex flex-row gap-4">
                        <button wire:click="create_role" class="bg-green-700 hover:bg-green-600 rounded-lg w-full p-2">
                            Create User Role
                        </button>
                        <button wire:click="cancel('role')" class="bg-red-700 hover:bg-red-600 rounded-lg w-full p-2">
                            Cancel
                        </button>
                    </div>
                </div>
            @else
                <button class="text-white bg-green-700 hover:bg-green-600 w-full rounded-lg p-2 mt-3"
                    wire:click="toggle_component_visibility('role')"
                    title="Add User Role">
                    Add User Role
                </button>
            @endif
        </div>

        <!-- 4. Export Worked Hours -->
        <div id="hoursTab" class="tab-content {{ $activeTab === 'hoursTab' ? '' : 'hidden'}}">
            <div class="text-lg font-bold mb-3">Export Hours</div>

            <div class="mb-3">
                <label class="block font-semibold">Employee:</label>
                <select wire:model="selectedEmployee" class="text-black bg-gray-700 text-white border border-gray-600 rounded-lg p-2 w-[310px]">
                    <option value="all">All Employees</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="block font-semibold">Job:</label>
                <select wire:model="selectedJob" class="text-black bg-gray-700 text-white border border-gray-600 rounded-lg p-2 w-[310px]">
                    <option value="all">All Jobs</option>
                    @foreach($job_listings as $job)
                        <option value="{{ $job->id }}">{{ $job->job_number }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="block font-semibold">Date Range:</label>
                <input type="date" wire:model="startDate" class="text-black bg-gray-700 text-white border border-gray-600 rounded-lg p-2 w-42">
                <input type="date" wire:model="endDate" class="text-black bg-gray-700 text-white border border-gray-600 rounded-lg p-2 w-42">
            </div>

            <button wire:click="export_worked_hours"
                class="bg-blue-700 text-white rounded-lg p-2">
                Export Worked Hours
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', () => {
        Livewire.on('refreshTabs', activeTab => {
            const tabs = document.querySelectorAll('[data-tab-target]');
            const textStyle = 'text-blue-500';
            const borderStyle = 'border-blue-500';

            tabs.forEach(tab => {
                const targetContent = document.querySelector(tab.dataset.tabTarget);
                if (tab.dataset.tabTarget === `#${activeTab}`) {
                    tab.classList.add(textStyle, borderStyle);
                    targetContent.classList.remove('hidden');
                } else {
                    tab.classList.remove(textStyle, borderStyle);
                    targetContent.classList.add('hidden');
                }
            });
        });
    });
</script>