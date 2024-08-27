@props(['caption','name','checkedprop'=>'','disabledInput'=>'','key'=>''])
{{print_r($attributes['value'])}}
<div x-data="{ checkboxToggle: {{$checkedprop}} }">
    <label for="{{$name}}{{$key}}" class="flex cursor-pointer select-none items-center text-sm font-medium text-black dark:text-white">
        <div class="relative">
            <input type="checkbox" id="{{$name}}{{$key}}" class="sr-only" {{ $attributes }} >
            <div :class="{'!border-4':checkboxToggle == $attributes['value'] }" class="box mr-4 flex h-5 w-5 items-center justify-center rounded-full border border-primary !border-4">
                <span class="h-2.5 w-2.5 rounded-full bg-white dark:bg-transparent">
                </span>
            </div>
        </div>
        {{$caption}}
    </label>
</div>