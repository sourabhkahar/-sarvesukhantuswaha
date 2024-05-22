<?php

use Livewire\WithPagination;
use Livewire\Volt\Component;
use App\Models\Taxonomy;
use App\Livewire\Forms\TaxonomyForm;

new class extends Component { 
      use WithPagination;
      public TaxonomyForm $form; 
      public $perPage = 10 ; 
      public $search = '' ; 

      public function save()
      {
         $this->validate();
         $this->form->store();
      }
      
      public function with(): array
      {
         return [
            'Taxonomies' => Taxonomy::search($this->search)->paginate($this->perPage),
         ];
      }
}; ?>

<div>
  <div class="w-1/2 mx-auto text-center bg-white border rounded-sm border-stroke shadow-default dark:border-strokedark dark:bg-boxdark">
    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
      <h3 class="font-medium text-black dark:text-white">
        Add Taxonomy {{$search}}
      </h3>
    </div>
    <form action="#" wire:submit="save">
      <div class="p-6.5">
        <div class="mb-4.5">
          <input
            type="text"
            placeholder="Taxonomy"
            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
            wire:model="form.title"
          />
          <x-input-error :messages="$errors->get('form.title')" class="mt-2" />
        </div>

        <button
          class="flex justify-center w-full p-3 font-medium rounded bg-primary text-gray hover:bg-opacity-90"
        >
          Add
        </button>
      </div>
    </form>
  </div>
 
  <div class="mt-2 bg-white border rounded-sm border-stroke shadow-default dark:border-strokedark dark:bg-boxdark">
    <div class="max-w-full overflow-x-auto data-table-common data-table-two">
       <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
          <div class="datatable-top">
             <div class="datatable-dropdown">
                <label>
                   <select class="datatable-selector" wire:model.live="perPage">
                      <option value="5" selected="">5</option>
                      <option value="10">10</option>
                      <option value="15">15</option>
                      <option value="-1">All</option>
                   </select>
                   entries per page
                </label>
             </div>
             <div class="datatable-search">
                <input class="datatable-input" placeholder="Search..." type="text" title="Search within table" aria-controls="dataTableTwo" wire:model.live.debounce.300ms="search">
             </div>
          </div>
          <div class="datatable-container">
             <table class="table w-full table-auto datatable-table" id="dataTableTwo">
                <thead>
                   <tr>
                      <th data-sortable="true" >
                         <a href="#" class="datatable-sorter">
                            <div class="flex items-center justify-between gap-1.5">
                               <p>Name</p>
                               <div class="inline-flex flex-col space-y-[2px]">
                                  <span class="inline-block">
                                     <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 0L0 5H10L5 0Z" fill=""></path>
                                     </svg>
                                  </span>
                                  <span class="inline-block">
                                     <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 5L10 0L-4.37114e-07 8.74228e-07L5 5Z" fill=""></path>
                                     </svg>
                                  </span>
                               </div>
                            </div>
                         </a>
                      </th>
                      <th data-sortable="true" >
                         <a href="#" class="datatable-sorter">
                            <div class="flex items-center justify-between gap-1.5">
                               <p>Position</p>
                               <div class="inline-flex flex-col space-y-[2px]">
                                  <span class="inline-block">
                                     <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 0L0 5H10L5 0Z" fill=""></path>
                                     </svg>
                                  </span>
                                  <span class="inline-block">
                                     <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 5L10 0L-4.37114e-07 8.74228e-07L5 5Z" fill=""></path>
                                     </svg>
                                  </span>
                               </div>
                            </div>
                         </a>
                      </th>
                      <th data-sortable="true" >
                         <a href="#" class="datatable-sorter">
                            <div class="flex items-center justify-between gap-1.5">
                               <p>Office</p>
                               <div class="inline-flex flex-col space-y-[2px]">
                                  <span class="inline-block">
                                     <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 0L0 5H10L5 0Z" fill=""></path>
                                     </svg>
                                  </span>
                                  <span class="inline-block">
                                     <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 5L10 0L-4.37114e-07 8.74228e-07L5 5Z" fill=""></path>
                                     </svg>
                                  </span>
                               </div>
                            </div>
                         </a>
                      </th>
                   </tr>
                </thead>
                <tbody>
                  @foreach ($Taxonomies as $taxonomy)
                   <tr data-index="0">
                      <td>{{$taxonomy->title}}</td>
                      <td>{{$taxonomy->created_at}}</td>
                      <td>{{$taxonomy->updated_at}}</td>
                   </tr>
                  @endforeach
                </tbody>
             </table>
          </div>
          <div class="datatable-bottom">
             {{$Taxonomies->links('vendor.pagination.tailwind')}}
          </div>
       </div>
    </div>
 </div>
</div>

