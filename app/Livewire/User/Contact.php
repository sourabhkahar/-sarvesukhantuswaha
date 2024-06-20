<?php

namespace App\Livewire\User;

use App\Mail\SendMemberNotification;
use App\Models\Family;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\UserDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class Contact extends Component
{
    use WithFileUploads;
    #[Layout('layouts.guest')] 

    #[Validate('required')]
    public $firstname;
    #[Validate('required')]
    public $lastname;
    #[Validate('required')]
    public $middlename;
    #[Validate('email:rfc|unique:users,email')]
    public $email;
    #[Validate('required|digits:10')]
    public $phone;
    #[Validate('required')]
    public $address;
    #[Validate('required')]
    public $city;
    #[Validate('required')]
    public $state;
    #[Validate('required')]
    public $zip;
    #[Validate('required|mimes:jpeg,jpg,png,gif|required|max:2000')]
    public $photo;
    #[Validate('required|date')]
    public $dob;

    #[Validate([
        'familyDetails.*.relation' => 'required',
        'familyDetails.*.martialstatus' => 'required',
        'familyDetails.*.ishouseonwer' => 'required',
        'familyDetails.*.name' => 'required',
    ], message: [
        'required' => 'The :attribute is missing.',
    ], attribute: [
        'familyDetails.*.relation' => 'Relation',
        'familyDetails.*.martialstatus' => 'Martial Status',
        'familyDetails.*.ishouseonwer' => 'House Owner',
        'familyDetails.*.name' => 'Name',
    ])]

    public $familyDetailsArr = [
        'name'=>'',
        'relation'=>'',
        'martialstatus'=>'',
        'bloodgroup'=>'',
        'education'=>'',
        'ishouseonwer'=>'',
        'medicalhistory'=>[],
        'othermedicalhistory'=>'',
        'courtcase'=>'',
        'noofvehicles'=>'',
        'vehiclesnumber'=>[],
        'courtcasenumber'=>''
    ];
    public $familyDetails = [];
    
    public function render()
    {
        // $this->dispatch('contentChanged');
        return view('livewire.user.contact');
    }

    public function addFamilyDetails()
    {
        array_push($this->familyDetails,$this->familyDetailsArr);
    }

    public function saveForm(){
        $this->validate();
        $RandomString = Str::random(mt_rand(5, 10));
        $user = User::create([
            'name' => $this->firstname.' '.$this->lastname.' '.$this->middlename,
            'email' => $this->email,
            'password' => $RandomString,
            'role'  => 'member'
        ]);

        $date=date_create();
        $imageName = date_timestamp_get($date).'-'.$this->photo->getClientOriginalName();
        $this->photo->storeAs(path: 'public/user-profile',name:$imageName);
        $userDetails = UserDetail::create([
            'user_id' => $user->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'middlename' => $this->middlename,
            'phone' => $this->phone,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zip'   => $this->zip,
            'photo'   => $imageName,
            'dob'   => $this->dob
        ]);

        if(count($this->familyDetails) > 0){
            $FamilyArr = [];
            foreach ($this->familyDetails as $formKey => $formVal) {
                $FamilyArr[] = [
                    'user_id' => $user->id,
                    'name' => $formVal['name'],
                    'relation' => $formVal['relation'],
                    'martialstatus' => $formVal['martialstatus'],
                    'bloodgroup' => $formVal['bloodgroup'],
                    'education' => $formVal['education'],
                    'ishouseonwer' => $formVal['ishouseonwer'],
                    'medicalhistory' => is_array($formVal['medicalhistory'])?implode(',',$formVal['medicalhistory']):'',
                    'courtcase' => $formVal['courtcase'],
                    'noofvehicles' => $formVal['noofvehicles'],
                    'vehiclesnumber' => is_array($formVal['vehiclesnumber'])?implode(',',$formVal['vehiclesnumber']):'',
                    'courtcasenumber' => $formVal['courtcasenumber'],
                    'created_at' => Carbon::now(),  
                    'updated_at' => Carbon::now()  
                ];
            }
            Family::insert($FamilyArr);
        }

        $userData = [];
        $userData['name'] = $userDetails->firstname.' '.$userDetails->lastname.''.$userDetails->middlename;
        $userData['phone'] = $userDetails->phone;
        $userData['address'] =  $userDetails->address;
        $userData['city'] =  $userDetails->city;
        $userData['state'] =  $userDetails->state;
        $userData['zip'] =  $userDetails->zip;
        $userData['photo'] =  $userDetails->photo;
        $userData['dob'] =  $userDetails->dob;
        $userData['email'] =  $user->email;

        $this->dispatch('contentChanged');
        Mail::to(env('MAIL_TO_ADDRESS'))
        ->queue(new SendMemberNotification($userData));
        session()->flash('message', 'Memeber Added  successfully!');
        $this->reset(); 
    }

    public function mount(){
       $this->familyDetails[] = $this->familyDetailsArr;
    }

    public function removeFamilyDetails($index){
        array_splice($this->familyDetails, $index, 1);
    }
}
