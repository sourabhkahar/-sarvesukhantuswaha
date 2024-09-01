<?php

use Livewire\Volt\Component;
use App\Livewire\Forms\MembershipForm;
use Livewire\WithFileUploads;
//
new class extends Component {
    public MembershipForm $form;
    use WithFileUploads;
    public function save()
    {
        $this->form->saveForm();
        session()->flash('message', 'Member Created Successfully');
        $this->redirect("/admin/member-managment/", navigate: true);
    }

    public function mount()
    {
        $this->form->familyDetails[] = $this->form->familyDetailsArr;
    }

    public function addMember()
    {
        $this->form->addFamilyDetails();
    }

    public function removeFamilyDetails($id)
    {
        $this->form->removeFamilyDetails($id);
    }
}
?>
<div class="">
    <div><strong>Add Member</strong></div>
    <form wire:submit='save'>
        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
            <div>
                <x-title class="mt-4 w-full xl:w-1/2" wire:model.live="form.firstname" caption="First Name" name="'firstname'" />
                <x-input-error :messages="$errors->get('form.firstname')" class="mt-2" />
            </div>
            <div>
                <x-title class="mt-4 w-full xl:w-1/2" wire:model.live="form.lastname" caption="Middle Name" name="'lastname'" />
                <x-input-error :messages="$errors->get('form.lastname')" class="mt-2" />
            </div>
            <div>
                <x-title class="mt-4 w-full xl:w-1/2" wire:model.live="form.middlename" caption="Last Name" name="'middlename'" />
                <x-input-error :messages="$errors->get('form.middlename')" class="mt-2" />
            </div>

            <div>
                <x-title class="mt-4 w-full xl:w-1/2" wire:model.live="form.phone" caption="Phone Number" name="'phone'" />
                <x-input-error :messages="$errors->get('form.phone')" class="mt-2" />
            </div>
            <div>
                <x-title class="mt-4 w-full xl:w-1/2" wire:model.live="form.email" caption="Email" name="'email'" />
                <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
            </div>

        </div>
        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
            <div>
                <x-title class="mt-4 w-full xl:w-1/2" wire:model.live="form.address" caption="Address" name="'Address'" />
                <x-input-error :messages="$errors->get('form.address')" class="mt-2" />
            </div>
            <div>
                <x-select class="mt-4 w-full xl:w-1/2" wire:model.live="form.city" :option="Config::get('constant.cities')" name="'city'" :caption="'Select City'" valuefield="abbreviation" valuekey="city" />
                <x-input-error :messages="$errors->get('form.city')" class="mt-2 required" />
            </div>

            <div>
                <x-select class="mt-4 w-full xl:w-1/2" wire:model.live="form.state" :option="Config::get('constant.states')" name="'state'" :caption="'Select State'" valuefield="abbreviation" valuekey="state" />
                <x-input-error :messages="$errors->get('form.state')" class="mt-2 required" />
            </div>

            <div>
                <x-title class="mt-4 w-full xl:w-1/2" wire:model.live="form.zip" caption="Pincode" name="'pincode'" />
                <x-input-error :messages="$errors->get('form.zip')" class="mt-2 required" />
            </div>

            <div>
                <x-image1 class="mt-4 w-full xl:w-1/2" wire:model.live="form.photo" caption="Photo" name="'photo'" value="" />
                <x-input-error :messages="$errors->get('form.photo')" class="mt-2 required" />
            </div>
        </div>
        @if(count($form->familyDetails) > 0)
        <div class="mt-5">
            <div class="block mb-3 text-sm font-medium text-black dark:text-white bg-primary p-5 rounded-sm">
                Details
            </div>
        </div>
        @endif

        @foreach($form->familyDetails as $keyFam => $family)
        @if($keyFam > 0)
        <div class="mt-5">
            <div class="mb-3 text-sm font-medium text-black dark:text-white bg-primary p-5 rounded-sm flex justify-between">
                <div>
                    Family Details {{$keyFam}}
                </div>
                <div>
                    <button wire:click="removeFamilyDetails({{$keyFam}})">
                        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 12L18 12" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        @endif
        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
            <div>
                <x-title class="mt-4 w-full xl:w-1/2" wire:model.live="form.familyDetails.{{$keyFam}}.name" caption="Name" name="'name{{$keyFam}}'" />
                @foreach ($errors->get("form.familyDetails.$keyFam.name") as $message)
                <x-input-error :messages="$message" class="mt-2" />
                @endforeach
            </div>

            <div class="mt-5">
                <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                    Owner Ship:
                </label>
                <div class="mt-5">
                    <label for="radio-house{{$keyFam}}">
                        <input type="radio" value="House Owner" id="radio-house{{$keyFam}}" wire:model.live="form.familyDetails.{{$keyFam}}.ishouseonwer" />
                        House Owner
                    </label>
                    <label for="rented-house{{$keyFam}}">
                        <input type="radio" value="Rented House" id="rented-house{{$keyFam}}" wire:model.live="form.familyDetails.{{$keyFam}}.ishouseonwer" />
                        Rented House
                    </label>
                </div>

                @foreach ($errors->get("form.familyDetails.$keyFam.ishouseonwer") as $message)
                <x-input-error :messages="$message" class="mt-2" />
                @endforeach
            </div>

            <div>
                <x-select class=" w-full xl:w-1/2" wire:model.live="form.familyDetails.{{$keyFam}}.relation" :option="Config::get('constant.relations')" name="'Relation'" :caption="'Select Relation'" />
                @foreach ($errors->get("form.familyDetails.$keyFam.relation") as $message)
                <x-input-error :messages="$message" class="mt-2 required" />
                @endforeach
            </div>

            <div class="mt-5">
                <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                    Martial Status:
                </label>
                <div class="mt-5">
                    <label for="radio-married{{$keyFam}}">
                        <input type="radio" value="Married" id="radio-married{{$keyFam}}" wire:model.live="form.familyDetails.{{$keyFam}}.martialstatus" />
                        Married
                    </label>
                    <label for="radio-unmarried{{$keyFam}}">
                        <input type="radio" value="Unmarried" id="radio-unmarried{{$keyFam}}" wire:model.live="form.familyDetails.{{$keyFam}}.martialstatus" />
                        Unmarried
                    </label>
                </div>

                @foreach ($errors->get("form.familyDetails.$keyFam.martialstatus") as $message)
                <x-input-error :messages="$message" class="mt-2" />
                @endforeach
            </div>


        </div>
        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">

            <div>
                <x-select class=" w-full xl:w-1/2" wire:model.live="form.familyDetails.{{$keyFam}}.bloodgroup" :option="Config::get('constant.bloodgroup')" name="'Blood Group'" :caption="'Select Blood Group'" />
                @foreach ($errors->get("form.familyDetails.$keyFam.bloodgroup") as $message)
                <x-input-error :messages="$message" class="mt-2 required" />
                @endforeach
            </div>


            <div>
                <x-select class=" w-full xl:w-1/2" wire:model.live="form.familyDetails.{{$keyFam}}.education" :option="Config::get('constant.educations')" name="'Education'" :caption="'Select Education'" />
                @foreach ($errors->get("form.familyDetails.$keyFam.education") as $message)
                <x-input-error :messages="$message" class="mt-2 required" />
                @endforeach
            </div>

            <div class="mt-5">
                <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                    Do you have any court case?:
                </label>
                <div class="mt-5 flex justify-between">
                    <label for="radio-court-case-yes{{$keyFam}}">
                        <input type="radio" value="Y" id="radio-court-case-yes{{$keyFam}}" wire:model.live="form.familyDetails.{{$keyFam}}.courtcase" />
                        Yes
                    </label>
                    <label for="radio-court-case-no{{$keyFam}}">
                        <input type="radio" value="N" id="radio-court-case-no{{$keyFam}}" wire:model.live="form.familyDetails.{{$keyFam}}.courtcase" />
                        No
                    </label>
                </div>

                @foreach ($errors->get("form.familyDetails.$keyFam.courtcase") as $message)
                <x-input-error :messages="$message" class="mt-2" />
                @endforeach
            </div>

            @if($form->familyDetails[$keyFam]['courtcase'] == 'Y')
            <div>
                <x-title class="mt-4 w-full xl:w-1/2" wire:model.live="form.familyDetails.{{$keyFam}}.courtcasenumber" caption="if Yes,Enter Court Case Number?" name="'name{{$keyFam}}'" />
                @foreach ($errors->get("form.familyDetails.$keyFam.courtcasenumber") as $message)
                <x-input-error :messages="$message" class="mt-2" />
                @endforeach
            </div>
            @endif

        </div>

        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
            <div class="mt-5">
                <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                    Medical History:
                </label>
                <div class="mt-5">
                    @foreach (Config::get('constant.medical-history') as $item)
                    <label for="custom-radio" class="custom-radio">
                        <input type="checkbox" class="" value="{{$item}}"
                            wire:model.live="form.familyDetails.{{$keyFam}}.medicalhistory" />
                        {{$item}}
                    </label>
                    @endforeach
                </div>
            </div>

            @if(in_array('Other',$form->familyDetails[$keyFam]['medicalhistory']))
            <div>
                <x-title class="mt-4 w-full xl:w-1/2" wire:model.live="form.familyDetails.{{$keyFam}}.othermedicalhistory" caption="if Other,Please Mention?" name="'othermedicalhistory{{$keyFam}}'" />
                @foreach ($errors->get("form.familyDetails.$keyFam.courtcase") as $message)
                <x-input-error :messages="$message" class="mt-2" />
                @endforeach
            </div>
            @endif

            <div>
                <x-date class="mt-4 w-full xl:w-1/2" wire:model.live="form.familyDetails.{{$keyFam}}.dob" caption="Date Of Birth" name="'name{{$keyFam}}'" />
                @foreach ($errors->get("form.familyDetails.$keyFam.dob") as $message)
                <x-input-error :messages="$message" class="mt-2" />
                @endforeach
            </div>
            @if($keyFam == 0)
            <div>
                <x-title class="mt-4 w-full xl:w-1/2" wire:model.live="form.familyDetails.{{$keyFam}}.noofvehicles" caption="No. of vehicles" name="'name{{$keyFam}}'" />
                @foreach ($errors->get("form.familyDetails.$keyFam.noofvehicles") as $message)
                <x-input-error :messages="$message" class="mt-2" />
                @endforeach
            </div>
            @endif
        </div>

        <div class="mb-4.5 ">
         @if(isset($form->familyDetails[$keyFam]['noofvehicles']) &&
                !empty($form->familyDetails[$keyFam]['noofvehicles']) && 
                $form->familyDetails[$keyFam]['noofvehicles'] <= 10 )
                @for($i=0 ;$i<$form->familyDetails[$keyFam]['noofvehicles'];$i++)
                <x-title class="mt-4 w-full xl:w-1/2" wire:model.live="form.familyDetails.{{$keyFam}}.vehiclesnumber.{{$i}}" caption="Vehicle Number{{$i+1}}" name="'vehiclesnumber{{$keyFam}}{{$i}}'" />
                @endfor
            @endif
        </div>
        @endforeach

        <div class="flex mt-6">
            <button class="flex justify-center p-3 font-medium rounded bg-primary text-gray hover:bg-opacity-90"
                wire:loading.attr="disabled" wire:confirm="Are you sure you want to delete this Item?">
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

            <button class="flex justify-center p-3 font-medium rounded bg-primary text-gray hover:bg-opacity-90 ml-2"
                wire:loading.attr="disabled" wire:click="addMember" type="button">
                <svg class="hidden w-5 h-5 mr-3 -ml-1 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Add Member
            </button>

            <!-- <a class="flex justify-center p-3 ml-2 font-medium bg-red-500 rounded text-gray hover:bg-opacity-90"
                href="{{route('roles.index')}}" type="button" wire:navigate>
                Cancel
            </a> -->
        </div>
    </form>
</div>