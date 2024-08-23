
@props(['caption','name'])
<div class="mt-5" >
    <label class="block mb-3 text-sm font-medium text-black dark:text-white">
        {{$caption}}:
    </label>
    <input type="text"  class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" id="{{ $name }}" 
    name="{{ $name }}" {{ $attributes }}>
</div>





