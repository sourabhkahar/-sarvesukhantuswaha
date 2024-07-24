<?php

namespace App\Livewire\User;

use App\Mail\SendMemberNotification;
use App\Models\Family;
use App\Models\Page;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\UserDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
    #[Validate('required|digits:6')]
    public $zip;
    #[Validate('required|mimes:jpeg,jpg,png,gif|required|max:2000')]
    public $photo;
    #[Validate('required|date')]
    public $dob;

    #[Validate([
        'familyDetails.*.relation' => 'required',
        'familyDetails.*.dob' => 'required',
        'familyDetails.*.martialstatus' => 'required',
        'familyDetails.*.ishouseonwer' => 'required',
        'familyDetails.*.name' => 'required',
        'familyDetails.*.noofvehicles' => 'numeric',
    ], message: [
        'required' => 'The :attribute is missing.',
        'numeric' => ':attribute should be a numberic.',
    ], attribute: [
        'familyDetails.*.relation' => 'Relation',
        'familyDetails.*.dob' => 'Date Of Birth',
        'familyDetails.*.martialstatus' => 'Martial Status',
        'familyDetails.*.ishouseonwer' => 'House Owner',
        'familyDetails.*.name' => 'Name',
        'familyDetails.*.noofvehicles' => 'Vehicle Number',
    ])]

    public $familyDetailsArr = [
        'name'=>'',
        'dob'=>'',
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
    public $page = [];
    public $headerFooter = [];
    
    public function render()
    {
        return view('livewire.user.contact');
    }

    public function addFamilyDetails()
    {
        array_push($this->familyDetails,$this->familyDetailsArr);
    }

    public function saveForm(){
        DB::beginTransaction();
        $this->validate();
        try {
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
    
            //Add Memeber Code
            $memberCode = $this->state.''.$this->city.''.$this->zip.''.$user->id;
            User::where('id',$user->id)->update(['member_code'=>$memberCode]);
    
            if(count($this->familyDetails) > 0){
                $FamilyArr = [];
                foreach ($this->familyDetails as $formKey => $formVal) {
                    $FamilyArr[] = [
                        'user_id' => $user->id,
                        'name' => $formVal['name'],
                        'dob' => $formVal['dob'],
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
            $userData['name'] = $userDetails->firstname.' '.$userDetails->lastname.' '.$userDetails->middlename;
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
            session()->flash('message', 'Memeber Added successfully!');
            $this->reset(); 
            DB::commit();
        } catch (\Exception $th) {
            DB::rollback();
            // session()->flash('message', 'Opps, Something went wrong!');
        }
    }

    public function mount(){
       $this->familyDetails[] = $this->familyDetailsArr;
       $this->page = $this->getFormatedData(['taxonomycode' => 1, 'categorycode' => 0, 'id' => 3, 'status' => 'Y'], true);
       $this->headerFooter = $this->getFormatedData(['taxonomycode' => 1, 'categorycode' => 0, 'id' => 5, 'status' => 'Y'], true);
    }

    public function removeFamilyDetails($index){
        array_splice($this->familyDetails, $index, 1);
    }

    public function getFormatedData($data, $islanding = false)
    {
        $textPageDetails = Page::with(['gallery', 'page_details'])->where($data)->get();
        $pagesData = [];
        foreach ($textPageDetails as $textPage_key => $textPage_value) {
            $pageDetails = [];
            foreach ($textPage_value->page_details as $key => $value) {
                $pageDetails[$value->field] = $value->value;
            }
            foreach ($textPage_value->gallery as $gallery_key => $gallery_value) {
                $pageDetails[$gallery_value->fieldname] = $gallery_value->image;
            }
            $pagesData[] = $pageDetails;
        };

        if($islanding){
            return $pagesData[0]??[];
        }
        return $pagesData;
    }
}
