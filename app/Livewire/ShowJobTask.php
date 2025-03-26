<?php

namespace App\Livewire;

use App\Models\ProductInUse;
use Livewire\Component;

class ShowJobTask extends Component
{
    public $job_task;
    public $products;
    
    public $edit_ccp_component_is_visible = false;
    public $edit_product_in_use_component_is_visible = false;
    public $add_product_in_use_is_visible = false;

    public string $method_statement;
    public int $importance;
    public int $editingProductId = -1;

    public int $product_id = -1;
    public float $product_usage;
    public float $product_coverage;
    public float $product_tolerance;

    protected $rules = [
        'method_statement' => 'required|string',
        'importance' => 'required|integer|min:1|max:3',
        'product_id'=> 'required|integer|min:0',
        'product_usage' => 'required|numeric|min:0',
        'product_coverage' => 'required|numeric|min:0',
        'product_tolerance' => 'required|numeric|min:0',
    ];
    
    public function render()
    { 
        return view('livewire.job-tasks.show-job-task');
    }

    public function mount()
    {
        if ($this->job_task->quality_critical) {
            $this->method_statement = $this->job_task->critical_control_point->method_statement;
            $this->importance = $this->job_task->critical_control_point->importance;
        }
    }

    public function toggle_edit_ccp_component_visibility()
    {
        $this->edit_ccp_component_is_visible = !$this->edit_ccp_component_is_visible;
    }

    public function toggle_edit_product_in_use_component_visibility()
    {
        $this->edit_product_in_use_component_is_visible = !$this->edit_product_in_use_component_is_visible;
    }

    public function toggle_add_product_in_use_visibility()
    {
        $this->add_product_in_use_is_visible = !$this->add_product_in_use_is_visible;
    }

    public function update_critical_control_point()
    {
        $this->validate();

        $this->job_task->critical_control_point->method_statement = $this->method_statement;
        $this->job_task->critical_control_point->importance = $this->importance;

        $this->toggle_edit_ccp_component_visibility();
    }

    public function editProductInUse($productId)
    {
        $this->editingProductId = $productId;

        $productInUse = ProductInUse::find($productId);
        $this->product_usage = $productInUse->product_usage;
        $this->product_coverage = $productInUse->product_coverage;
        $this->product_tolerance = $productInUse->product_tolerance;
    }

    public function updateProductInUse($productId)
    {
        $this->validate();

        $productInUse = ProductInUse::find($productId);
        $productInUse->product_usage = $this->product_usage;
        $productInUse->product_coverage = $this->product_coverage;
        $productInUse->product_tolerance = $this->product_tolerance;
        $productInUse->save();

        $this->editingProductId = -1;
    }

    public function cancelEditProductInUse()
    {
        $this->editingProductId = -1;
        $this->reset(['product_usage', 'product_coverage', 'product_tolerance']);
    }

    public function addProductInUse()
    {
        $this->validate();

        $this->job_task->critical_control_point->product_in_uses()->create([
            'product_id' => $this->product_id,
            'product_usage' => $this->product_usage,
            'product_coverage' => $this->product_coverage,
            'product_tolerance' => $this->product_tolerance,
        ]);

        $this->reset(['products', 'product_usage', 'product_coverage', 'product_tolerance']);
        $this->toggle_add_product_in_use_visibility();
    }

    public function cancelAddProductInUse()
    {
        $this->reset(['products', 'product_usage', 'product_coverage', 'product_tolerance']);
        $this->toggle_add_product_in_use_visibility();
    }

    public function deleteProductInUse($productId)
    {
        ProductInUse::find($productId)->delete();
    }
}
