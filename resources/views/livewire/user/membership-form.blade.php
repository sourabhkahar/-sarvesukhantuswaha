<div class="">
    <livewire:layout.user.header-banner :pid="$pid"/>
    <section class="contact-section section-gapping">
        <div class="container">
            <div class="contact">
                <div class="">
                    <h2>{{$page['title1']??''}}</h2>
                    <form action="" wire:submit='saveForm'>
                        <div class="field-box">
                            <div class="field">
                                <label for="">First Name <span class="required">*</span></label>
                                <input type="text" class="input-field" id="" wire:model="firstname" />
                                <x-field-error :messages="$errors->get('firstname')" class="mt-2 required" />
                            </div>
                            <div class="field">
                                <label for="">Middle Name<span class="required">*</span></label>
                                <input type="text" class="input-field" id="" wire:model="middlename" />
                                <x-field-error :messages="$errors->get('middlename')" class="mt-2 required" />
                            </div>
                            <div class="field">
                                <label for="">Last Name<span class="required">*</span></label>
                                <input type="text" class="input-field" id="" wire:model="lastname" />
                                <x-field-error :messages="$errors->get('lastname')" class="mt-2 required" />
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="field">
                                <label for="">Phone Number <span class="required">*</span></label>
                                <input type="text" class="input-field" id="" wire:model="phone" />
                                <x-field-error :messages="$errors->get('phone')" class="mt-2 required" />

                            </div>
                            <div class="field">
                                <label for="">Email<span class="required">*</span></label>
                                <input type="email" class="input-field" id="" wire:model="email" />
                                <x-field-error :messages="$errors->get('email')" class="mt-2 required" />
                            </div>
                        </div>
                        <div class="field">
                            <label for="">Address<span class="required">*</span></label>
                            <input type="text" class="input-field" id="" wire:model="address" />
                            <x-field-error :messages="$errors->get('address')" class="mt-2 required" />
                        </div>
                        <div class="field-box">
                            <div class="field">
                                <label for="">City<span class="required">*</span></label>
                                <select type="text" class="input-field" id="" wire:model="city">
                                    <option value="">Select City</option>

                                    @foreach (Config::get('constant.cities') as $key => $city)
                                    <option value="{{$city['abbreviation']}}" wire:key='{{$key}}'>
                                        {{$city['city']}}</option>
                                    @endforeach
                                </select>
                                <x-field-error :messages="$errors->get('city')" class="mt-2 required" />
                            </div>
                            <div class="field">
                                <label for="">State<span class="required">*</span></label>
                                <select type="text" class="input-field" id="" wire:model="state">
                                    <option value="">Select State</option>
                                    @foreach (Config::get('constant.states') as $key => $state)
                                    <option value="{{$state['abbreviation']}}" wire:key='{{$key}}'>{{$state['state']}}
                                    </option>
                                    @endforeach
                                </select>
                                <x-field-error :messages="$errors->get('state')" class="mt-2 required" />
                            </div>
                            <div class="field">
                                <label for="">Pincode<span class="required">*</span></label>
                                <input type="text" class="input-field" id="" wire:model="zip" />
                                <x-field-error :messages="$errors->get('zip')" class="mt-2 required" />
                            </div>
                        </div>
                        <div class="field">
                            <label for="">Photo <span class="required">*</span></label>
                            <input type="file" class="input-field" id="" wire:model="photo" />
                            <x-field-error :messages="$errors->get('photo')" class="mt-2 required" />
                        </div>
                        {{-- <div class="field">
                            <label for="">Birth Date <span class="required">*</span></label>
                            <input type="date" class="input-field" id="" wire:model="dob" />
                            <x-field-error :messages="$errors->get('dob')" class="mt-2 required" />
                        </div> --}}
                        @if(count($familyDetails) > 0)
                        <h2>Details</h2>
                        @endif
                        @foreach ($familyDetails as $keyFam => $family)
                        <div>
                            @if($keyFam > 0)
                            <h2>Family Details</h2>
                            <div class="remove-family-section" title="remove section" wire:click="removeFamilyDetails({{$keyFam}})">
                                    <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M16 8L8 16M8.00001 8L16 16" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            @endif

                            <div class="field">
                                <label for="">Name<span class="required">*</span></label>
                                <input type="text" class="input-field"
                                    wire:model.live="familyDetails.{{$keyFam}}.name" />
                                    @foreach ($errors->get("familyDetails.$keyFam.name") as  $message)
                                            <x-field-error :messages="$message" class="mt-2 required" />
                                    @endforeach
                            </div>
                            <div class="col-2">
                                <div class="field">
                                    <label for="radio-house-owner{{$keyFam}}" class="custom-radio">
                                        <input type="radio" class="" id="radio-house-owner{{$keyFam}}" name="familyDetails.{{$keyFam}}.ishouseonwer"
                                            wire:model.live="familyDetails.{{$keyFam}}.ishouseonwer"
                                            value="House Owner" /><span>House Owner</span>
                                    </label>
                                </div>
                                <div class="field">
                                    <label for="radio-rented-house{{$keyFam}}" class="custom-radio">
                                        <input type="radio" class="" id="radio-rented-house{{$keyFam}}" name="familyDetails.{{$keyFam}}.ishouseonwer"
                                            wire:model.live="familyDetails.{{$keyFam}}.ishouseonwer"
                                            value="Rented House" /><span>Rented House</span>
                                    </label>
                                    
                                </div>
                            </div>
                            <div class="">
                                @foreach ($errors->get("familyDetails.$keyFam.ishouseonwer") as  $message)
                                    <x-field-error :messages="$message" class="mt-2 required" />
                                @endforeach
                            </div>
                            <div class="field">
                                <label for="">Relation<span class="required">*</span></label>
                                <select type="text" class="input-field" id="" wire:model.live="familyDetails.{{$keyFam}}.relation">
                                    <option value="">Select Relation</option>
                                    @foreach (Config::get('constant.relations') as $key => $relation)
                                    <option value="{{$relation}}" wire:key='{{$key}}'>
                                        {{$relation}}</option>
                                    @endforeach
                                </select>
                                @foreach ($errors->get("familyDetails.$keyFam.relation") as  $message)
                                        <x-field-error :messages="$message" class="mt-2 required" />
                                @endforeach
                            </div>
                            <div class="field">
                                {{-- {{print_r($errors->get("familyDetails.$keyFam.relation"))}} --}}
                                
                                <div class="col-2">
                                    <div class="field">
                                        <label for="radio-married{{$keyFam}}" class="custom-radio">
                                            <input type="radio" class="" id="radio-married{{$keyFam}}" name="familyDetails.{{$keyFam}}.martialstatus"
                                                wire:model.live="familyDetails.{{$keyFam}}.martialstatus"
                                                value="Married" /><span>Married</span>
                                        </label>
                                    </div>
                                    <div class="field">
                                        <label for="radio-unmarried{{$keyFam}}" class="custom-radio">
                                            <input type="radio" class="" id="radio-unmarried{{$keyFam}}" name="familyDetails.{{$keyFam}}.martialstatus"
                                                wire:model.live="familyDetails.{{$keyFam}}.martialstatus"
                                                value="Unmarried" /><span>Unmarried</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="">
                                    @foreach ($errors->get("familyDetails.$keyFam.martialstatus") as  $message)
                                        <x-field-error :messages="$message" class="mt-2 required" />
                                    @endforeach
                                </div>
                                
                            </div>
                            <div class="col-2">
                                <div class="field">
                                    <label for="">Blood Group</label>
                                    {{-- <input type="text" class="input-field"
                                        wire:model.live="familyDetails.{{$keyFam}}.bloodgroup" /> --}}

                                    <select  class="input-field" id="" wire:model.live="familyDetails.{{$keyFam}}.bloodgroup">
                                        <option value="">Blood Group</option>
                                        @foreach (Config::get('constant.bloodgroup') as $key => $relation)
                                        <option value="{{$relation}}" wire:key='{{$key}}'>
                                            {{$relation}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="field">
                                    <label for="">Education<span class="required">*</span></label>
                                   
                                    <select  class="input-field" id="" wire:model.live="familyDetails.{{$keyFam}}.education">
                                        <option value="">Select Education</option>
                                        @foreach (Config::get('constant.educations') as $key => $relation)
                                        <option value="{{$relation}}" wire:key='{{$key}}'>
                                            {{$relation}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <label for="">Do you have any court case?<span class="required">*</span></label>
                                <div class="col-2">
                                    <div class="field">
                                        <label for="radio-court-case-yes{{$keyFam}}" class="custom-radio">
                                            <input type="radio" class="" id="radio-court-case-yes{{$keyFam}}" name="familyDetails.{{$keyFam}}.courtcase"
                                                wire:model.live="familyDetails.{{$keyFam}}.courtcase"
                                                value="Y" /><span>yes</span>
                                        </label>
                                    </div>
                                    <div class="field">
                                        <label for="radio-court-case-no-{{$keyFam}}" class="custom-radio">
                                            <input type="radio" class="" id="radio-court-case-no-{{$keyFam}}" name="familyDetails.{{$keyFam}}.courtcase"
                                                wire:model.live="familyDetails.{{$keyFam}}.courtcase"
                                                value="N" /><span>no</span>
                                        </label>
                                    </div>
                                </div>

                                @if($familyDetails[$keyFam]['courtcase'] == 'Y')
                                <div class="field">
                                    <label for="">if Yes,Enter Court Case Number?</label>
                                    <input type="text" class="input-field"
                                        wire:model.live="familyDetails.{{$keyFam}}.courtcasenumber" />
                                </div>
                                @endIf
                            </div>

                            <div class="field">
                                <label for="">Medcal history</label>
                                <div class="field-box">
                                    @foreach (Config::get('constant.medical-history') as $item)
                                        <label for="" class="custom-radio">
                                            <input type="checkbox" class="" value="{{$item}}"
                                                wire:model.live="familyDetails.{{$keyFam}}.medicalhistory" />
                                            {{$item}}
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            @if(in_array('Other',$familyDetails[$keyFam]['medicalhistory']))
                            <div class="field">
                                <label for="">if Other,Please Mention?</label>
                                <input type="text" class="input-field"
                                    wire:model.live="familyDetails.{{$keyFam}}.othermedicalhistory" />
                            </div>
                            @endIf
                            <div class="col-2">
                                @if($keyFam == 0)
                                <div class="field ">
                                    <label for="">No. of vehicles</label>
                                    <input type="number" class="input-field"
                                        wire:model.live="familyDetails.{{$keyFam}}.noofvehicles"/>
                                        @foreach ($errors->get("familyDetails.$keyFam.noofvehicles") as  $message)
                                            <x-field-error :messages="$message" class="mt-2 required" />
                                        @endforeach
                                </div>
                                @endif
                                <div class="field">
                                    <label for=""> Date Of Birth <span class="required">*</span></label>
                                    <input type="date" class="input-field" id="" wire:model.live="familyDetails.{{$keyFam}}.dob" />
                                    @foreach ($errors->get("familyDetails.$keyFam.dob") as  $message)
                                        <x-field-error :messages="$message" class="mt-2 required" />
                                    @endforeach
                                </div>
                            </div>

                            @if(isset($familyDetails[$keyFam]['noofvehicles']) &&
                            !empty($familyDetails[$keyFam]['noofvehicles']) && $familyDetails[$keyFam]['noofvehicles'] <= 10 )
                                @for($i=0 ;$i<$familyDetails[$keyFam]['noofvehicles'];$i++)    
                                    <div class="field">
                                        <label for="">Vehicle Number{{$i+1}}<span class="required">*</span></label>
                                        <input type="text" class="input-field"
                                            wire:model.live="familyDetails.{{$keyFam}}.vehiclesnumber.{{$i}}" />
                                    </div>
                                @endfor
                            @endif
                            <hr style="margin: 4px">
                        </div>
                        @endforeach
                        <div class="">
                            <button type="submit" class="btn" wire:loading.attr="disabled">
                                <i class="hidden fa fa-circle-o-notch fa-spin" wire:loading.class.remove="hidden" style="margin: 2px"></i>
                            Submit</button>
                            <button type="button" class="btn" wire:click='addFamilyDetails' >add Family</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div id="toast" class="{{session('message')?'show':''}}">
        <div id="desc">{{ session('message') }}</div>
    </div>
   

    <script>
        window.addEventListener('contentChanged', (e) => {
            launch_toast();
        });
         launch_toast = () => {
            console.log('ll,l,')
            var x = document.getElementById("toast")
            x.classList.add("show"); //= "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
        }
       
    </script>
    
</div>
