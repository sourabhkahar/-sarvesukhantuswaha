<?php

use Livewire\Volt\Component;
use App\Livewire\Forms\MembershipForm;
//
new class extends Component {
    public MembershipForm $form;
    // public function with(): array{
    //     // return [
    //     //   'Permission' => Permission::get()
    //     //  ];
    // }


    public function save()
    {
        $this->validate();
        $this->form->saveForm();
        session()->flash('message', 'Role Created Successfully');
        $this->redirect("/admin/roles/", navigate: true);
    }

    public function mount(){
        $this->form->familyDetails[] = $this->form->familyDetailsArr;
    }
}
?>
<div class="">
    <div><strong>Add Member</strong></div>
    <form wire:submit='save'>
        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
            <x-title class="mt-4 w-full xl:w-1/2" wire:model="form.firstname" caption="First Name" name="'firstname'" />
            <x-field-error :messages="$errors->get('form.firstname')" class="mt-2 required" />
            <x-title class="mt-4 w-full xl:w-1/2" wire:model="form.lastname" caption="Middle Name" name="'lastname'" />
            <x-field-error :messages="$errors->get('form.lastname')" class="mt-2 required" />

            <x-title class="mt-4 w-full xl:w-1/2" wire:model="form.middlename" caption="Last Name" name="'middlename'" />
            <x-field-error :messages="$errors->get('form.middlename')" class="mt-2 required" />

            <x-title class="mt-4 w-full xl:w-1/2" wire:model="form.phone" caption="Phone Number" name="'phone'" />
            <x-field-error :messages="$errors->get('form.phone')" class="mt-2 required" />

            <x-title class="mt-4 w-full xl:w-1/2" wire:model="form.email" caption="Email" name="'email'" />
            <x-field-error :messages="$errors->get('form.email')" class="mt-2 required" />

        </div>
        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
            <x-select class="mt-4 w-full xl:w-1/2" wire:model="form.city" :option="Config::get('constant.cities')" name="'city'" :caption="'Select City'" valuefield="abbreviation" valuekey="city" />
            <x-field-error :messages="$errors->get('form.city')" class="mt-2 required" />

            <x-select class="mt-4 w-full xl:w-1/2" wire:model="form.state" :option="Config::get('constant.states')" name="'state'" :caption="'Select State'" valuefield="abbreviation" valuekey="state" />
            <x-field-error :messages="$errors->get('form.state')" class="mt-2 required" />

            <x-title class="mt-4 w-full xl:w-1/2" wire:model="form.pincode" caption="Pincode" name="'pincode'" />
            <x-field-error :messages="$errors->get('form.pincode')" class="mt-2 required" />

            <x-image1 class="mt-4 w-full xl:w-1/2" wire:model="form.image" caption="Image" name="'image'" value="" />
            <x-field-error :messages="$errors->get('form.image')" class="mt-2 required" />
        </div>
       {{print_r($form->familyDetails)}}
        @foreach($form->familyDetails as $keyFam => $family)
        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
            <x-title class="mt-4 w-full xl:w-1/2" wire:model="form.name" caption="Name" name="'name'" />
            <x-field-error :messages="$errors->get('form.name')" class="mt-2 required" />

            <div class="mt-5">
                <x-radio caption="House Owner" name="radio-house" wire:model="form->familyDetails.{{$keyFam}}.relation" value="House Owner" :key="$keyFam" :checkedprop="'House Owner'"/>
                <x-radio caption="Rented House" name="radio-house" wire:model="form->familyDetails.{{$keyFam}}.relation" value="Rented House" :key="$keyFam"/>
            </div>

            <x-select class="mt-4 w-full xl:w-1/2" wire:model="form.state" :option="Config::get('constant.states')" name="'state'" :caption="'Select State'" valuefield="abbreviation" valuekey="state" />
            <x-field-error :messages="$errors->get('form.state')" class="mt-2 required" />

            <x-title class="mt-4 w-full xl:w-1/2" wire:model="form.pincode" caption="Pincode" name="'pincode'" />
            <x-field-error :messages="$errors->get('form.pincode')" class="mt-2 required" />

            <x-image1 class="mt-4 w-full xl:w-1/2" wire:model="form.image" caption="Image" name="'image'" value="" />
            <x-field-error :messages="$errors->get('form.image')" class="mt-2 required" />
        </div>
        @endforeach

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
                href="{{route('roles.index')}}" type="button" wire:navigate>
                Cancel
            </a>
        </div>
    </form>
</div>