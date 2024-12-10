<?php

namespace App\Livewire\Forms;

use App\Models\JobPosting;
use Livewire\Form;

class JobForm extends Form
{
    public $title = '';
    public $company = '';
    public $location = '';
    public $employment_type = '';
    public $min_salary = null;
    public $max_salary = null;
    public $currency = null;
    public $description = '';
    public $requirements = null;
    public $responsibilities = null;
    public $posted_date = '';
    public $application_deadline = null;
    public $job_category = '';
    public $experience_level = '';
    public $contact_email = '';
    public $status = 'Active';
    public $id = null;

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|string',
            'min_salary' => 'nullable|numeric|lte:max_salary',
            'max_salary' => 'nullable|numeric|gte:min_salary',
            'currency' => 'nullable|string|max:10',
            'description' => 'required|string',
            'requirements' => 'nullable',
            'responsibilities' => 'nullable',
            'posted_date' => 'required|date',
            'application_deadline' => 'nullable|date',
            'job_category' => 'nullable|string|max:255',
            'experience_level' => 'nullable|string|max:255',
            'contact_email' => 'required|email',
        ];
    }

    public function save(){
        try {
            //code...
            JobPosting::create([
                'title' => $this->title,
                'company' => $this->company,
                'location' => $this->location,
                'employment_type' => $this->employment_type,
                'min_salary' => $this->min_salary,
                'max_salary' => $this->max_salary,
                'currency' => $this->currency,
                'description' => $this->description,
                'requirements' => !empty($this->requirements) ? json_encode($this->requirements) : null,
                'responsibilities' => !empty($this->responsibilities) ? json_encode($this->responsibilities) : null,
                'posted_date' => $this->posted_date,
                'application_deadline' => $this->application_deadline,
                'job_category' => $this->job_category,
                'experience_level' => $this->experience_level,
                'contact_email' => $this->contact_email,
                'status' => $this->status,
            ]);
            // $job->syncPermissions($this->rolePermission);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function edit(){
        try {
            
            $job = JobPosting::find($this->id);
            $job->update([
                'title' => $this->title,
                'company' => $this->company,
                'location' => $this->location,
                'employment_type' => $this->employment_type,
                'min_salary' => $this->min_salary,
                'max_salary' => $this->max_salary,
                'currency' => $this->currency,
                'description' => $this->description,
                'requirements' => !empty($this->requirements) ? $this->requirements : null,
                'responsibilities' => !empty($this->responsibilities) ? $this->responsibilities : null,
                'posted_date' => $this->posted_date,
                'application_deadline' => $this->application_deadline,
                'job_category' => $this->job_category,
                'experience_level' => $this->experience_level,
                'contact_email' => $this->contact_email,
                'status' => $this->status,
            ]);
            // $job->syncPermissions($this->rolePermission);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    
     public function destroy()
     {
        try {
            JobPosting::where('id', $this->id)->delete();
        } catch (\Exception $e) {
            dd($e);
        }
     }
}
