@props(['caption','name'])
<div  class="mt-5">
    <label class="block mb-3 text-sm font-medium text-black dark:text-white">
      {{$caption}}
    </label>
    <input type="file" class="w-full rounded-md border border-stroke p-3 outline-none transition file:mr-4 file:rounded file:border-[0.5px] file:border-stroke file:bg-[#EEEEEE] file:px-2.5 file:py-1 file:text-sm file:font-normal focus:border-primary file:focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-strokedark dark:file:bg-white/30 dark:file:text-white"  name="{{ $name }}" {{ $attributes }} id="{{ $name }}" >
</div>