@props(['option','name','caption','valuefield'=>null,'valuekey'=>null])
<div class="mt-5" x-data="{ isOptionSelected: false }">
    <label class="block mb-3 text-sm font-medium text-black dark:text-white">
        {{$caption}}
    </label>
    <select class="relative z-20 w-full py-3 pl-5 pr-12 transition bg-transparent border rounded outline-none appearance-none border-stroke focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input" class="text-black dark:text-white"  {{ $attributes }}>
        <option value="">
            {{$caption}}
        </option>
        @if($valuefield)
            @foreach ($option as $item)
            <option value="{{$item[$valuefield]}}" wire:key="{{$item[$valuefield]}}">
                {{$item[$valuekey]}}
            </option>
            @endforeach
        @else
            @foreach ($option as $item)
            <option value="{{$item}}" wire:key="{{$item}}">
                {{$item}}
            </option>
            @endforeach
        @endif
    </select>
</div>