@props(['caption','name','checkedprop'=>'false','disabledInput'=>''])
<div x-data="{ checkboxToggle: {{$checkedprop}} }" class="mt-4" >
    <label for="{{$caption}}" class="flex items-center text-sm font-medium cursor-pointer select-none">
      <div class="relative">
        <input type="checkbox" id="{{$caption}}" class="sr-only" @change="checkboxToggle = !checkboxToggle" {{ $attributes }} name="{{ $name }}" {{$disabledInput?'disabled':''}}>
        <div :class="checkboxToggle &amp;&amp; 'border-primary bg-gray dark:bg-transparent'" class="flex items-center justify-center w-5 h-5 mr-4 border rounded">
          <span :class="checkboxToggle &amp;&amp; '!opacity-100'" class="opacity-0">
            <svg width="11" height="8" viewBox="0 0 11 8" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M10.0915 0.951972L10.0867 0.946075L10.0813 0.940568C9.90076 0.753564 9.61034 0.753146 9.42927 0.939309L4.16201 6.22962L1.58507 3.63469C1.40401 3.44841 1.11351 3.44879 0.932892 3.63584C0.755703 3.81933 0.755703 4.10875 0.932892 4.29224L0.932878 4.29225L0.934851 4.29424L3.58046 6.95832C3.73676 7.11955 3.94983 7.2 4.1473 7.2C4.36196 7.2 4.55963 7.11773 4.71406 6.9584L10.0468 1.60234C10.2436 1.4199 10.2421 1.1339 10.0915 0.951972ZM4.2327 6.30081L4.2317 6.2998C4.23206 6.30015 4.23237 6.30049 4.23269 6.30082L4.2327 6.30081Z" fill="#3056D3" stroke="#3056D3" stroke-width="0.4"></path>
            </svg>
          </span>
        </div>
      </div>
      {{$caption}}
    </label>
</div>