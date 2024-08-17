<div class="">
    <livewire:layout.user.header-banner :pid="$pid"/>
    <section class="contact-section section-gapping">
        <div class="container">
            <div class="contact">
                <div class="col">
                    <h2>{{$page['title5']??''}}</h2>
                    <form action="" wire:submit='saveForm'>
                        {{-- <div class="col-2"> --}}
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
                        {{-- </div> --}}
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
                                <div class="field ">
                                    <label for="">No. of vehicles</label>
                                    <input type="number" class="input-field"
                                        wire:model.live="familyDetails.{{$keyFam}}.noofvehicles"/>
                                        @foreach ($errors->get("familyDetails.$keyFam.noofvehicles") as  $message)
                                            <x-field-error :messages="$message" class="mt-2 required" />
                                        @endforeach
                                </div>
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
               
                <div class="col">
                    <h2>{{$page['title1']??''}}</h2>
                    <p>{{$page['title2']??''}}</p>
                    <a href=" http://maps.google.com/?q={{urlencode($page['shortdescription1']??'')}}" target="_blank"><p>{!!nl2br($page['shortdescription1']??'')!!}</p></a>

                    <h3>CONTACT</h3>
                    <ul class="contact-detail">
                        @if(isset($page['title3']))
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
                            <a href="tel:{{$page['title3']}}">{{$page['title3']}}</a>
                        </li>
                        @endif
                        @if(isset($page['title4']))
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
                            <a href="mailto:{{$page['title4']}}">{{$page['title4']}}</a>
                        </li>
                        @endif
                    </ul>

                    <h3>KEEP IN TOUCH</h3>
                    <ul class="social-ul">
                        @if(isset($headerFooter['link1']))
                        <li>
                            <a href="{{$headerFooter['link1']}}" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" x="" y="" width="100" height="100" viewBox="7 5 50 50" fill="#ffffff" id="instagram">
                                    <path d="M 31.820312 12 C 13.439312 12 12 13.439312 12 31.820312 L 12 32.179688 C 12 50.560688 13.439312 52 31.820312 52 L 32.179688 52 C 50.560688 52 52 50.560688 52 32.179688 L 52 32 C 52 13.452 50.548 12 32 12 L 31.820312 12 z M 28 16 L 36 16 C 47.129 16 48 16.871 48 28 L 48 36 C 48 47.129 47.129 48 36 48 L 28 48 C 16.871 48 16 47.129 16 36 L 16 28 C 16 16.871 16.871 16 28 16 z M 41.994141 20 C 40.889141 20.003 39.997 20.900859 40 22.005859 C 40.003 23.110859 40.900859 24.003 42.005859 24 C 43.110859 23.997 44.003 23.099141 44 21.994141 C 43.997 20.889141 43.099141 19.997 41.994141 20 z M 31.976562 22 C 26.454563 22.013 21.987 26.501437 22 32.023438 C 22.013 37.545437 26.501437 42.013 32.023438 42 C 37.545437 41.987 42.013 37.498562 42 31.976562 C 41.987 26.454563 37.498562 21.987 31.976562 22 z M 31.986328 26 C 35.299328 25.992 37.992 28.673328 38 31.986328 C 38.007 35.299328 35.326672 37.992 32.013672 38 C 28.700672 38.008 26.008 35.327672 26 32.013672 C 25.992 28.700672 28.673328 26.008 31.986328 26 z"></path>
                                </svg>
                            </a>
                        </li>
                        @endif
                        @if(isset($headerFooter['link2']))
                        <li>
                           <a href="{{$headerFooter['link2']}}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 64 64" fill="#ffffff" id="youtube">
                                <path d="M 32 15 C 14.938 15 12.659656 15.177734 10.472656 17.427734 C 8.2856563 19.677734 8 23.252 8 32 C 8 40.748 8.2856562 44.323266 10.472656 46.572266 C 12.659656 48.821266 14.938 49 32 49 C 49.062 49 51.340344 48.821266 53.527344 46.572266 C 55.714344 44.322266 56 40.748 56 32 C 56 23.252 55.714344 19.677734 53.527344 17.427734 C 51.340344 15.177734 49.062 15 32 15 z M 32 19 C 45.969 19 49.379156 19.062422 50.535156 20.232422 C 51.691156 21.402422 52 24.538 52 32 C 52 39.462 51.691156 42.597578 50.535156 43.767578 C 49.379156 44.937578 45.969 45 32 45 C 18.031 45 14.620844 44.937578 13.464844 43.767578 C 12.308844 42.597578 12.03125 39.462 12.03125 32 C 12.03125 24.538 12.308844 21.402422 13.464844 20.232422 C 14.620844 19.062422 18.031 19 32 19 z M 27.949219 25.017578 L 27.949219 38.982422 L 40.095703 31.945312 L 27.949219 25.017578 z"></path>
                                </svg>
                           </a>
                       </li>
                       @endif
                        @if(isset($headerFooter['link3']))
                        <li>
                            <a href="{{$headerFooter['link3']}}" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 1200 1227"
                                    fill="none">
                                    <path
                                        d="M714.163 519.284L1160.89 0H1055.03L667.137 450.887L357.328 0H0L468.492 681.821L0 1226.37H105.866L515.491 750.218L842.672 1226.37H1200L714.137 519.284H714.163ZM569.165 687.828L521.697 619.934L144.011 79.6944H306.615L611.412 515.685L658.88 583.579L1055.08 1150.3H892.476L569.165 687.854V687.828Z"
                                        fill="currentColor" />
                                </svg>
                            </a>
                        </li>
                        @endif
                        @if(isset($headerFooter['link4']))
                        <li>
                            <a href="{{$headerFooter['link4']}}" target="_blank">
                                <svg enable-background="new 0 0 56.693 56.693" height="30" width="30" version="1.1"
                                viewBox="0 0 56.693 56.693" fill="currentColor" xml:space="preserve"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path
                                    d="M40.43,21.739h-7.645v-5.014c0-1.883,1.248-2.322,2.127-2.322c0.877,0,5.395,0,5.395,0V6.125l-7.43-0.029  c-8.248,0-10.125,6.174-10.125,10.125v5.518h-4.77v8.53h4.77c0,10.947,0,24.137,0,24.137h10.033c0,0,0-13.32,0-24.137h6.77  L40.43,21.739z" />
                                </svg>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <x-user.cta-section :headerFooter="$headerFooter"  /> 

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
