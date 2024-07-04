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
                                    <label for="radio" class="custom-radio">
                                        <input type="radio" class="" id="radio" name="familyDetails.{{$keyFam}}.ishouseonwer"
                                            wire:model.live="familyDetails.{{$keyFam}}.ishouseonwer"
                                            value="House Owner" /><span>House Owner</span>
                                    </label>
                                </div>
                                <div class="field">
                                    <label for="radio1" class="custom-radio">
                                        <input type="radio" class="" id="radio1" name="familyDetails.{{$keyFam}}.ishouseonwer"
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
                                        <label for="radio2" class="custom-radio">
                                            <input type="radio" class="" id="radio2" name="familyDetails.{{$keyFam}}.martialstatus"
                                                wire:model.live="familyDetails.{{$keyFam}}.martialstatus"
                                                value="Married" /><span>Married</span>
                                        </label>
                                    </div>
                                    <div class="field">
                                        <label for="radio3" class="custom-radio">
                                            <input type="radio" class="" id="radio3" name="familyDetails.{{$keyFam}}.martialstatus"
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
                                        <label for="radio4" class="custom-radio">
                                            <input type="radio" class="" id="radio4" name="familyDetails.{{$keyFam}}.courtcase"
                                                wire:model.live="familyDetails.{{$keyFam}}.courtcase"
                                                value="Y" /><span>yes</span>
                                        </label>
                                    </div>
                                    <div class="field">
                                        <label for="radio5" class="custom-radio">
                                            <input type="radio" class="" id="radio5" name="familyDetails.{{$keyFam}}.courtcase"
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
                            <div class="field ">
                                <label for="">No. of vehicles</label>
                                <input type="number" class="input-field"
                                    wire:model.live="familyDetails.{{$keyFam}}.noofvehicles" min="0" max="50"/>
                                    @foreach ($errors->get("familyDetails.$keyFam.noofvehicles") as  $message)
                                    <x-field-error :messages="$message" class="mt-2 required" />
                            @endforeach
                            </div>
                            @if(isset($familyDetails[$keyFam]['noofvehicles']) &&
                            !empty($familyDetails[$keyFam]['noofvehicles']) )
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
                    <a href=" http://maps.google.com/?q={{urlencode($page['shortdescription1'])}}" target="_blank"><p>{!!nl2br($page['shortdescription1']??'')!!}</p></a>

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
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="49.605 0 2834.65 2834.649" id="instagram"><circle cx="1466.93" cy="1417.324" r="1417.324" fill="#444"></circle><path fill="#fff" d="M1892.128 726.379h-850.395c-147.639 0-265.749 118.11-265.749 265.749v850.394c0 147.639 118.11 265.748 265.749 265.748h850.395c147.638 0 265.749-118.109 265.749-265.748V992.127c0-147.638-118.112-265.748-265.749-265.748zm76.772 159.449h29.527V1122.048h-236.221v-236.22H1968.9zm-696.851 389.765c41.338-59.056 118.11-100.395 194.882-100.395s153.544 41.339 194.882 100.395c29.527 41.338 47.244 88.582 47.244 141.732 0 135.826-112.205 242.126-242.126 242.126-129.922 0-242.126-106.299-242.126-242.126-.001-53.15 17.716-100.394 47.244-141.732zm750.001 566.929c0 70.867-59.056 129.922-129.922 129.922h-850.395c-70.866 0-129.922-59.055-129.922-129.922v-566.929h206.693c-17.717 41.338-29.527 94.488-29.527 141.732 0 206.693 171.26 377.953 377.953 377.953s377.953-171.26 377.953-377.953c0-47.244-11.812-100.395-29.527-141.732h206.692l.002 566.929z"></path></svg>
                            </a>
                        </li>
                        @endif
                        @if(isset($headerFooter['link2']))
                        <li>
                           <a href="{{$headerFooter['link2']}}" target="_blank">
                               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.87 28.87" id="youtube"><g><g><rect width="28.87" height="28.87" fill="#fd3832" rx="6.48" ry="6.48"></rect><path fill="#fff" fill-rule="evenodd" d="M8 19.77a1.88 1.88 0 0 1-1.24-1.21c-.54-1.48-.7-7.66.34-8.88A2 2 0 0 1 8.46 9c2.79-.3 11.41-.26 12.4.1a1.94 1.94 0 0 1 1.22 1.17c.59 1.53.61 7.09-.08 8.56a1.89 1.89 0 0 1-.87.88c-1.04.52-11.75.51-13.13.06zm4.43-2.9l5-2.6-5-2.62z"></path></g></g></svg>
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
