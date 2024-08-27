@props(['option','name','caption','valuefield','valuekey'])
<div class="mt-5" x-data="{ isOptionSelected: false }">
    <label class="block mb-3 text-sm font-medium text-black dark:text-white">
        {{$caption}}
    </label>
    <select class="relative z-20 w-full py-3 pl-5 pr-12 transition bg-transparent border rounded outline-none appearance-none border-stroke focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input" :class="isOptionSelected &amp;&amp; 'text-black dark:text-white'" :class="isOptionSelected &amp;&amp; 'text-black dark:text-white'" @change="isOptionSelected = true" {{ $attributes }}>
        <option value="">
            {{$caption}}
        </option>
        @foreach ($option as $item)
        <option value="$item[$valuefield]">
            {{$item[$valuekey]}}
        </option>
        @endforeach
    </select>
</div>