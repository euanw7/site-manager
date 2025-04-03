<div>
    <style>
        .error-message {
            color: #f56565;
            font-size: 0.875rem;
        }
    </style>

    <div class="bg-gray-700 text-white shadow-md rounded-lg p-6 mt-5 mb-10">
        <div class="text-2xl font-bold mb-4">Task: {{ $job_task->title }}</div>
        <div class="text-lg mb-2">{{ $job_task->description }}</div>
        <div class="text-sm text-gray-300 mb-2">Start Date: {{ $job_task->start_date->format('d-m-Y') }}</div>
        <div class="text-sm text-gray-300 mb-2">End Date: {{ $job_task->end_date->format('d-m-Y') }}</div>
        <div class="text-sm text-gray-300 mb-2">Approved: {{ $job_task->approved ? 'Yes' : 'No' }}</div>
        <div class="text-sm text-gray-300 mb-2">Quality Critical: {{ $job_task->quality_critical ? 'Yes' : 'No' }}</div>
    </div>

    @if ($job_task->quality_critical)
        <div class="bg-gray-700 text-white shadow-md rounded-lg p-6 mb-10">
            <div class="text-lg font-semibold mb-4">
                Quality Control Management
            </div>
            <!-- Admin View -->

            @if ($edit_ccp_component_is_visible)
                <!-- Edit CCP -->
                <div class="mb-2">Method Statement</div>
                <input type="text" 
                    placeholder="Method statement..." 
                    class="w-full p-2 bg-gray-800 text-white border border-gray-600 rounded-lg mb-4 line-clamp-3" 
                    wire:model="method_statement" />
                @error('method_statement')
                    <div class="error-message">{{ $message }}</div>
                @enderror

                <div class="mb-2">Importance Level</div>
                <select name="importance"
                    wire:model="importance"
                    class="text-black bg-gray-800 text-white border border-gray-600 rounded-lg p-2 w-14 mb-4">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                </select>

                <div class="mt-10 flow-root">
                    <div class="float-right">
                        <button wire:click="update_critical_control_point"
                            class="bg-green-700 text-white rounded-lg p-2 mr-2">
                            Update
                        </button>
                        <button wire:click="toggle_edit_ccp_component_visibility"
                            class="bg-red-700 text-white rounded-lg p-2">
                            Cancel
                        </button>
                    </div>
                </div>
            @else
                <!-- View CCP -->
                <div class="mb-2">Method Statement</div>
                <div class="bg-gray-800 p-2 rounded-lg mb-4">{{$job_task->critical_control_point->method_statement}}</div>
                <div class="mb-2">Importance</div>
                <div class="bg-gray-800 p-2 rounded-lg mb-4">{{$job_task->critical_control_point->importance}}</div>

                @if(Gate::allows('is.admin'))
                    <button class="text-white bg-green-700 w-full rounded-lg p-2"
                        wire:click="toggle_edit_ccp_component_visibility"
                        title="Set Critical Control Point">
                        Edit Critical Control Point
                    </button>
                @endif
            @endif
        </div>

        <!-- View details for existing products in use -->
        @if ($job_task->critical_control_point->product_in_uses()->count() > 0)
            <div class="bg-gray-700 text-white shadow-md rounded-lg p-6 mb-6">
                <div class="text-lg font-semibold mb-4">
                    Products in Use
                </div>

                @if ($add_product_in_use_is_visible)
                    <!-- Add Product In Use -->
                    <div class="mb-2">Product</div>
                    <select name="product_id"
                        wire:model="product_id"
                        class="text-black bg-gray-800 text-white border border-gray-600 rounded-lg p-2 w-64 mb-4">
                            <option value="">Select a product</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                    </select>
                    @error('product_id')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    <div class="mb-2">Usage</div>
                    <input type="text" 
                        placeholder="Usage..." 
                        class="w-full p-2 bg-gray-800 text-white border border-gray-600 rounded-lg mb-4" 
                        wire:model="product_usage" />
                    @error('product_usage')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    <div class="mb-2">Coverage</div>
                    <input type="text" 
                        placeholder="Coverage..." 
                        class="w-full p-2 bg-gray-800 text-white border border-gray-600 rounded-lg mb-4" 
                        wire:model="product_coverage" />
                    @error('product_coverage')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    <div class="mb-2">Tolerance</div>
                    <input type="text" 
                        placeholder="Tolerance..." 
                        class="w-full p-2 bg-gray-800 text-white border border-gray-600 rounded-lg mb-4" 
                        wire:model="product_tolerance" />
                    @error('product_tolerance')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    <div class="mt-4">
                        <button wire:click="addProductInUse"
                            class="bg-green-700 text-white rounded-lg p-2 mr-2">
                            Add
                        </button>
                        <button wire:click="toggle_add_product_in_use_visibility"
                            class="bg-red-700 text-white rounded-lg p-2">
                            Cancel
                        </button>
                    </div>

                @else
                    @foreach ($job_task->critical_control_point->product_in_uses as $product_in_use)
                        <div class="bg-gray-800 p-2 rounded-lg mb-2">
                            @if ($editingProductId === $product_in_use->id)
                                <!-- Edit Product In Use -->
                                <div class="mb-2 text-lg">{{ $product_in_use->product->name }}</div>

                                <div class="mb-2">Usage</div>
                                <input type="text" 
                                    placeholder="Usage..." 
                                    class="w-full p-2 bg-gray-800 text-white border border-gray-600 rounded-lg mb-4" 
                                    wire:model="product_usage" />
                                @error('product_usage')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror

                                <div class="mb-2">Coverage</div>
                                <input type="text" 
                                    placeholder="Coverage..." 
                                    class="w-full p-2 bg-gray-800 text-white border border-gray-600 rounded-lg mb-4" 
                                    wire:model="product_coverage" />
                                @error('product_coverage')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror

                                <div class="mb-2">Tolerance</div>
                                <input type="text" 
                                    placeholder="Tolerance..." 
                                    class="w-full p-2 bg-gray-800 text-white border border-gray-600 rounded-lg mb-4" 
                                    wire:model="product_tolerance" />
                                @error('product_tolerance')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror

                                <div class="mt-4">
                                    <button wire:click="updateProductInUse({{ $product_in_use->id }})"
                                        class="bg-green-700 text-white rounded-lg p-2 mr-2">
                                        Save
                                    </button>
                                    <button wire:click="cancelEditProductInUse"
                                        class="bg-red-700 text-white rounded-lg p-2">
                                        Cancel
                                    </button>
                                </div>
                            @else
                                <!-- View Product In Use -->
                                <div class="flow-root">
                                    <div class="float-left">
                                        <div class="text-lg">Product: {{ $product_in_use->product->name }}</div>
                                        <div>Usage: {{ $product_in_use->product_usage }}</div>
                                        <div>Coverage: {{ $product_in_use->product_coverage }}</div>
                                        <div>Tolerance: {{ $product_in_use->product_tolerance }}</div>
                                    </div>
                                    
                                    @if(Gate::allows('is.admin'))
                                        <div class="float-right">
                                            <button class="text-white bg-green-700 rounded-lg p-2  mr-2"
                                                wire:click="editProductInUse({{ $product_in_use->id }})"
                                                title="Edit Product">
                                                Edit
                                            </button>
                                            <button class="text-white bg-red-700 rounded-lg p-2"
                                                wire:click="deleteProductInUse({{ $product_in_use->id }})"
                                                title="Delete Product">
                                                Delete
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endforeach

                    @if(Gate::allows('is.admin'))
                        <div class="flow-root mt-4">
                            <button wire:click="toggle_add_product_in_use_visibility"
                                class="bg-green-700 text-white rounded-lg p-2 mr-2 float-right">
                                Add Product
                            </button>
                        </div>
                    @endif
                @endif
            </div>
        @endif

        <!-- User View -->
        <!-- Add quality control data -->
    @endif
</div>