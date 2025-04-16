<?php

namespace App\Livewire;

use App\Models\JobSubmission;
use App\Models\ProductInUse;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ShowJobTask extends Component
{
    use WithFileUploads;

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

    public $approval_description;
    public $approval_image;
    public $approval_product_usage;
    public $approval_product_coverage;

    public $submission;
    public string $approval_message;

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
        $this->submission = $this->job_task->job_submissions()->get()->first();
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

    public function submit_for_approval()
    {
        $this->validate([
            'approval_description' => 'required|string|max:255',
            'approval_image' => 'nullable|image',
            'approval_product_coverage' => 'nullable|numeric',
            'approval_product_usage' => 'nullable|numeric',
        ]);

        $imagePath = null;
        if ($this->approval_image)
        {
            $imagePath = $this->approval_image->store('approval_images', 'public');
        }

        $js = new JobSubmission();
        $js->job_task_id = $this->job_task->id;
        $js->approval_description = $this->approval_description;
        $js->approval_image = $imagePath;
        $js->approval_product_usage = $this->approval_product_usage;
        $js->approval_product_coverage = $this->approval_product_coverage;
        $js->save();

        $this->reset(['approval_description', 'approval_image', 'approval_product_usage', 'approval_product_coverage']);
    }

    public function approve(string $approved)
    {
        if ($approved === 'approved')
        {
            $this->submission->approved = true;
            $this->submission->rejected = false;

            $this->job_task->approved = true;
            $this->job_task->save();

            $isFinished = true;
            $job_phase = $this->job_task->job_phase;
            foreach ($job_phase->job_tasks as $jt)
            {
                if ($jt->approved == false)
                {
                    $isFinished = false;
                }
            }

            if ($isFinished)
            {
                $job_phase->isFinished = true;
                $job_phase->save();
            }
        } 
        else if ($approved === 'rejected')
        {
            $this->submission->rejected = true;
            $this->submission->approved = false;
        } 

        if ($this->submission->message)
        {
            if ($this->submission->message == null)
            {
                $this->submission->message = "No message provided.";
            }
            else {
                $this->submission->message = $this->approval_message;
            }
        }

        $this->submission->save();
    }

    public function new_submission()
    {
        $this->submission->delete();
    }
}
