<?php

use App\Livewire\Forms\JobForm;
use Livewire\Volt\Component;
//
new class extends Component {
    public JobForm $form; 
    public $PageEntryBlocks = [];

    public function save(){
        $this->validate();
        $this->form->save();
        session()->flash('message', 'Job Created Successfully');
        $this->redirect("/admin/job-management/", navigate: true);
        
    }   
}
?>
<div class="">
    <div><strong>Add Job</strong></div>
    <form wire:submit='save'>
        <!-- Title -->
        <x-title class="mt-4" wire:model="form.title" caption="Title" name="title" />
        <x-field-error :messages="$errors->get('form.title')" class="mt-2 required" />

        <!-- Company -->
        <x-title class="mt-4" wire:model="form.company" caption="Company" name="company" />
        <x-field-error :messages="$errors->get('form.company')" class="mt-2 required" />

        <!-- Location -->
        <x-title class="mt-4" wire:model="form.location" caption="Location" name="location" />
        <x-field-error :messages="$errors->get('form.location')" class="mt-2 required" />

        <!-- Employment Type -->
        <x-select class="mt-4" wire:model.live="form.employment_type" :option="['Full-time', 'Part-time', 'Contract', 'Internship']" name="'employment_type'" :caption="'Employment Type'" />
        
        <x-field-error :messages="$errors->get('form.employment_type')" class="mt-2 required" />

        <!-- Min Salary -->
        <x-title class="mt-4" wire:model="form.min_salary" caption="Minimum Salary" name="min_salary" type="number" />
        <x-field-error :messages="$errors->get('form.min_salary')" class="mt-2" />

        <!-- Max Salary -->
        <x-title class="mt-4" wire:model="form.max_salary" caption="Maximum Salary" name="max_salary" type="number" />
        <x-field-error :messages="$errors->get('form.max_salary')" class="mt-2" />

        <!-- Currency -->
        <x-title class="mt-4" wire:model="form.currency" caption="Currency" name="currency" />
        <x-field-error :messages="$errors->get('form.currency')" class="mt-2" />

        <!-- Description -->
        <x-text-area class="mt-4" wire:model="form.description" caption="Job Description" name="description" />
        <x-field-error :messages="$errors->get('form.description')" class="mt-2 required" />

        <!-- Requirements -->
        <x-text-area class="mt-4" wire:model="form.requirements" caption="Requirements" name="requirements" />
        <x-field-error :messages="$errors->get('form.requirements')" class="mt-2" />

        <!-- Responsibilities -->
        <x-text-area class="mt-4" wire:model="form.responsibilities" caption="Responsibilities" name="responsibilities" />
        <x-field-error :messages="$errors->get('form.responsibilities')" class="mt-2" />

        <!-- Posted Date -->
        <x-title class="mt-4" wire:model="form.posted_date" caption="Posted Date" name="posted_date" type="date" />
        <x-field-error :messages="$errors->get('form.posted_date')" class="mt-2 required" />

        <!-- Application Deadline -->
        <x-title class="mt-4" wire:model="form.application_deadline" caption="Application Deadline" name="application_deadline" type="date" />
        <x-field-error :messages="$errors->get('form.application_deadline')" class="mt-2" />

        <!-- Job Category -->
        <x-title class="mt-4" wire:model="form.job_category" caption="Job Category" name="job_category" />
        <x-field-error :messages="$errors->get('form.job_category')" class="mt-2" />

        <!-- Experience Level -->
        <x-title class="mt-4" wire:model="form.experience_level" caption="Experience Level" name="experience_level" />
        <x-field-error :messages="$errors->get('form.experience_level')" class="mt-2" />

        <!-- Contact Email -->
        <x-title class="mt-4" wire:model="form.contact_email" caption="Contact Email" name="contact_email" type="email" />
        <x-field-error :messages="$errors->get('form.contact_email')" class="mt-2 required" />

        <!-- Status -->
        

        <!-- Submit and Cancel Buttons -->
        <div class="flex mt-6">
            <button class="flex justify-center p-3 font-medium rounded bg-primary text-gray hover:bg-opacity-90"
                wire:loading.attr="disabled">
                <svg class="hidden w-5 h-5 mr-3 -ml-1 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" wire:loading.class="animate-spin" wire:loading.class.remove="hidden"
                    wire:target="save">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Submit
            </button>
            <a class="flex justify-center p-3 ml-2 font-medium bg-red-500 rounded text-gray hover:bg-opacity-90"
                 href="{{route('job-management.index')}}" type="button" wire:navigate>
                Cancel
            </a>
        </div>
    </form>
</div>
