<div class="">
    <section class="banner-section inner-banner" data-aos="fade-up" data-aos-duration="1000">
        <img src="{{asset('/images/about-banner.jpg')}}" alt="" class="img-responsive" />
        <div class="banner-content">
            <div class="container">
                <h2>CONTACT US</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper
                    mattis, pulvinar dapibus leo.</p>
            </div>
        </div>
    </section>

    <section class="contact-section section-gapping">
        <div class="container">
            <div class="contact">
                <div class="col">
                    <h2>Form</h2>

                    <form action="" wire:submit='saveForm'>
                        {{-- <div class="col-2"> --}}
                        <div class="field-box">
                            <div class="field">
                                <label for="">First Name <span class="required">*</span></label>
                                <input type="text" class="input-field" id="" wire:model="firstname" />
                                <x-field-error :messages="$errors->get('firstname')" class="mt-2 required" />
                            </div>
                            <div class="field">
                                <label for="">Last Name<span class="required">*</span></label>
                                <input type="text" class="input-field" id="" wire:model="lastname" />
                                <x-field-error :messages="$errors->get('lastname')" class="mt-2 required" />
                            </div>
                            <div class="field">
                                <label for="">Middle Name<span class="required">*</span></label>
                                <input type="text" class="input-field" id="" wire:model="middlename" />
                                <x-field-error :messages="$errors->get('middlename')" class="mt-2 required" />
                            </div>
                        </div>
                        {{-- </div> --}}
                        <div class="col-2">
                            <div class="field">
                                <label for="">Phone Number <span class="required">*</span></label>
                                <input type="text" class="input-field" id="" wire:model="phone" />
                                <x-field-error :messages="$errors->get('phone')" class="mt-2 required" />

                            </div>
                            <div class="field">
                                <label for="">Email</label>
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
                        <div class="field">
                            <label for="">Birth Date <span class="required">*</span></label>
                            <input type="date" class="input-field" id="" wire:model="dob" />
                            <x-field-error :messages="$errors->get('dob')" class="mt-2 required" />
                        </div>
                        @if(count($familyDetails) > 0)
                        <h2>Family Details</h2>
                        @endif
                        @foreach ($familyDetails as $keyFam => $family)
                        <div>
                            @if($keyFam > 0)
                            <div class="remove-family-section" title="remove section" wire:click="removeFamilyDetails({{$keyFam}})">
                                    <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M16 8L8 16M8.00001 8L16 16" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            @endif

                            <div class="field-box">
                                <div class="field">
                                    <label for="">Name<span class="required">*</span></label>
                                    <input type="text" class="input-field"
                                        wire:model.live="familyDetails.{{$keyFam}}.name" />
                                        @foreach ($errors->get("familyDetails.$keyFam.name") as  $message)
                                                <x-field-error :messages="$message" class="mt-2 required" />
                                        @endforeach
                                </div>
                                <div class="field">
                                    <div class="grp-radio">
                                        <span>
                                            <input type="radio" class="" id="" name="familyDetails.{{$keyFam}}.ishouseonwer"
                                                wire:model.live="familyDetails.{{$keyFam}}.ishouseonwer"
                                                value="House Owner" /><span>House Owner</span>
                                        </span>
                                        <span>
                                            <input type="radio" class="" id="" name="familyDetails.{{$keyFam}}.ishouseonwer"
                                                wire:model.live="familyDetails.{{$keyFam}}.ishouseonwer"
                                                value="Rented House" /><span>Rented House</span>
                                        </span>
                                    </div>
                                    @foreach ($errors->get("familyDetails.$keyFam.ishouseonwer") as  $message)
                                                <x-field-error :messages="$message" class="mt-2 required" />
                                    @endforeach
                                </div>
                            </div>
                            <div class="field-box">
                                {{-- {{print_r($errors->get("familyDetails.$keyFam.relation"))}} --}}
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
                                <div class="field ">
                                    <div class="grp-radio">
                                        <span>
                                            <input type="radio" class="" id="" name="familyDetails.{{$keyFam}}.martialstatus"
                                                wire:model.live="familyDetails.{{$keyFam}}.martialstatus"
                                                value="Married" /><span>Married</span>
                                        </span>
                                        <span>
                                            <input type="radio" class="" id="" name="familyDetails.{{$keyFam}}.martialstatus"
                                                wire:model.live="familyDetails.{{$keyFam}}.martialstatus"
                                                value="Unmarried" /><span>Unmarried</span>
                                        </span>
                                    </div>
                                    @foreach ($errors->get("familyDetails.$keyFam.martialstatus") as  $message)
                                            <x-field-error :messages="$message" class="mt-2 required" />
                                    @endforeach
                                </div>
                                <div class="field">
                                    <label for="">Blood Group</label>
                                    <input type="text" class="input-field"
                                        wire:model.live="familyDetails.{{$keyFam}}.bloodgroup" />
                                </div>
                            </div>

                            <div class="field-box">
                                <div class="field">
                                    <label for="">Education<span class="required">*</span></label>
                                    <input type="text" class="input-field"
                                        wire:model.live="familyDetails.{{$keyFam}}.education" />
                                </div>
                                <div class="field ">
                                    <label for="">Do you have any court case?<span class="required">*</span></label>
                                    <span class="grp-radio">
                                        <span>
                                            <input type="radio" class="" id="" name="familyDetails.{{$keyFam}}.courtcase"
                                                wire:model.live="familyDetails.{{$keyFam}}.courtcase"
                                                value="Y" /><span>yes</span>
                                        </span>
                                        <span>
                                            <input type="radio" class="" id="" name="familyDetails.{{$keyFam}}.courtcase"
                                                wire:model.live="familyDetails.{{$keyFam}}.courtcase"
                                                value="N" /><span>no</span>
                                        </span>
                                    </span>
                                </div>
                                {{-- <div class="field grp-radio">
                                    <input type="radio" class="input-field" id="" name="familyDetails.{{$keyFam}}.courtcase"
                                        wire:model.live="familyDetails.{{$keyFam}}.courtcase" value="y" /><span>Yes</span>
                                    <input type="radio" class="input-field" id="" name="familyDetails.{{$keyFam}}.courtcase"
                                        wire:model.live="familyDetails.{{$keyFam}}.courtcase" value="n" /><span>No</span>
                                </div> --}}
                                @if($familyDetails[$keyFam]['courtcase'] == 'Y')
                                <div class="field">
                                    <label for="">if Yes,Enter Court Case Number?</label>
                                    <input type="text" class="input-field"
                                        wire:model.live="familyDetails.{{$keyFam}}.courtcasenumber" />
                                </div>
                                @endIf
                            </div>

                            <div class="field-box">
                                <div class="field">
                                    <label for="">Medcal history</label>
                                    @foreach (Config::get('constant.medical-history') as $item)
                                        <label for="">
                                            <input type="checkbox" class="" value="{{$item}}"
                                                wire:model.live="familyDetails.{{$keyFam}}.medicalhistory" />
                                            {{$item}}
                                        </label>
                                    @endforeach
                                </div>

                                @if(in_array('Other',$familyDetails[$keyFam]['medicalhistory']))
                                <div class="field">
                                    <label for="">if Other,Please Mention?</label>
                                    <input type="text" class="input-field"
                                        wire:model.live="familyDetails.{{$keyFam}}.othermedicalhistory" />
                                </div>
                                @endIf
                                <div class="field ">
                                    <label for="">No. of vehicles</label>
                                    <input type="text" class="input-field"
                                        wire:model.live="familyDetails.{{$keyFam}}.noofvehicles" />
                                </div>
                            </div>
                            @if(isset($familyDetails[$keyFam]['noofvehicles']) &&
                            !empty($familyDetails[$keyFam]['noofvehicles']))
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
               
               
                <div class="col">
                    <h2>We Would Love to Hear from You</h2>
                    <p>Please write or call us with your questions or comments.</p>
                    <p>G-3, Milan Textile Market <br />Beside kuberji house <br />Near RKT Market <br />Begampura,
                        Nawabwadi <br />Sahara Darwaja, Ring Road</p>

                    <h3>CONTACT</h3>
                    <ul class="contact-detail">
                        <li>
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                    </path>
                                </svg>
                            </span>
                            <a href="tel:+919979927000">+91-997-992-7000</a>
                        </li>
                        <li>
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                    </path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </span>
                            <a href="mailto:info@sarvesukhantuswaha.org">info@sarvesukhantuswaha.org</a>
                        </li>
                    </ul>

                    <h3>KEEP IN TOUCH</h3>
                    <ul class="social-ul">
                        <li>
                            <a href="">
                                <svg enable-background="new 0 0 56.693 56.693" height="30" width="30" version="1.1"
                                    viewBox="0 0 56.693 56.693" fill="currentColor" xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <path
                                        d="M40.43,21.739h-7.645v-5.014c0-1.883,1.248-2.322,2.127-2.322c0.877,0,5.395,0,5.395,0V6.125l-7.43-0.029  c-8.248,0-10.125,6.174-10.125,10.125v5.518h-4.77v8.53h4.77c0,10.947,0,24.137,0,24.137h10.033c0,0,0-13.32,0-24.137h6.77  L40.43,21.739z" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 1200 1227"
                                    fill="none">
                                    <path
                                        d="M714.163 519.284L1160.89 0H1055.03L667.137 450.887L357.328 0H0L468.492 681.821L0 1226.37H105.866L515.491 750.218L842.672 1226.37H1200L714.137 519.284H714.163ZM569.165 687.828L521.697 619.934L144.011 79.6944H306.615L611.412 515.685L658.88 583.579L1055.08 1150.3H892.476L569.165 687.854V687.828Z"
                                        fill="currentColor" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <svg width="50" height="50" version="1.1" viewBox="0 0 1000 1000" xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <path
                                        d="M762.4,461.8v-71.6h-52.5v71.6h-76.3v52.5h71.6v71.6h52.5v-71.6H834v-52.5H762.4z"
                                        fill="currentColor" />
                                    <path
                                        d="M375.9,457.1v81.1h109.7c-9.5,47.7-52.5,85.9-109.7,85.9c-66.8,0-124.1-57.3-124.1-124.1    s57.3-124.1,124.1-124.1c28.6,0,57.3,9.5,76.3,28.6l62-62c-38.2-28.6-81.1-52.5-138.4-52.5C261.4,290.1,166,385.5,166,500    s95.4,209.9,209.9,209.9c119.3,0,200.4-85.9,200.4-205.2c0-14.3,0-33.4-4.8-47.7C571.6,457.1,375.9,457.1,375.9,457.1z"
                                        fill="currentColor" />
                                </svg>
                            </a>
                        </li>
                    </ul>

                    {{-- <div class="col-box">
                        <h4>ABC Bussiness</h4>
                        <ul class="contact-detail">
                            <li>
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path
                                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                        </path>
                                    </svg>
                                </span>
                                <a href="tel:+919876543210">+91 98765 43210</a>
                            </li>
                            <li>
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                </span>
                                Bajarang Wadi Main Rd, Valmiki Nagar, Puneet Nagar, Bajrang Wadi
                            </li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>

    <section class="join-section section-gapping" >
        <div class="container text-center">
            <div class="">
                <h2 class="main-title">Support US</h2>
            </div>
            <h3>Support Us and Change the Course of a Child’s Life Today!</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis,
                pulvinar dapibus leo.</p>
            {{-- https://dev.to/jringeisen/how-to-create-dynamic-input-fields-with-laravel-livewire-14kn --}}
            <a href="contact.html" class="btn">donate</a>
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
