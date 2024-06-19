<?php

use Livewire\WithPagination;
use Livewire\Volt\Component;
use App\Models\HtmlBlock;
use App\Livewire\Forms\HtmlBlockForm;

new class extends Component {
      use WithPagination;
      public HtmlBlockForm $form; 
      public $perPage = 10; 
      public $search = '' ; 
      public $sortColumn = 'ordno';
      public $sortDirection = 'Asc';
      public $editId = null;
      public $headerColumn  = [
                                 'blockname'=>'Name',
                                 'htmlBlock'=>'Html Block',
                                 'status'=>'Status',
                                 'actions'=>'Actions'
                              ];
      public $mode = 'add';

      public function save(){
         $this->validate();
         if($this->mode == 'add'){
            $this->form->store();
         } else {
            $this->form->edit($this->editId);
            $this->mode == 'add';
            $this->editId = null;
         }
      }
      
      public function doSort($columnName){
         if($this->sortColumn == $columnName){
            $this->sortDirection = ($this->sortDirection == 'Asc')?'Desc':'Asc' ;
         }
         $this->sortColumn = $columnName;
      }

      public function with(): array{
         return [
            'HtmlBlocksOption' => Config::get('constant.html-blocks'),
            'HtmlBlocks' => HtmlBlock::search($this->search)
                                       ->where(['taxonmycode'=>1,'pagecode'=>$this->form->pageId])
                                       ->orderBy($this->sortColumn,$this->sortDirection)
                                       ->paginate($this->perPage),
         ];
      }

      public function getDetails(HtmlBlock $htmlBlock){
         $this->form->title = $htmlBlock->blockname;
         $this->form->blockname = $htmlBlock->htmlblock;
         $this->editId = $htmlBlock->id;
         $this->mode = 'edit';
      }

      public function deleteDetails($taxonomyId){
        HtmlBlock::where('id',$taxonomyId)->delete();
      }

      public function resetForm(){
         $this->mode = 'add';
         $this->editId = null;
         $this->title = '';
         $this->form->resetForm();
      }

      public function mount($pid)
      {
         $this->form->pageId = $pid;
      }

      public function changeStatus($id){
         $this->form->updateStatus($id);
      }
}; ?>

<div>

   <div wire:loading>
      <div class="flex items-center justify-center w-full h-full">
         <div class="flex items-center justify-center space-x-1 text-sm text-gray-700">

            <svg fill='none' class="w-6 h-6 animate-spin" viewBox="0 0 32 32" xmlns='http://www.w3.org/2000/svg'>
               <path clip-rule='evenodd'
                  d='M15.165 8.53a.5.5 0 01-.404.58A7 7 0 1023 16a.5.5 0 011 0 8 8 0 11-9.416-7.874.5.5 0 01.58.404z'
                  fill='currentColor' fill-rule='evenodd' />
            </svg>


            <div>Loading ...</div>
         </div>
      </div>
   </div>

   <div
      class="w-1/2 mx-auto text-center bg-white border rounded-sm border-stroke shadow-default dark:border-strokedark dark:bg-boxdark">
      <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
         <h3 class="font-medium text-black dark:text-white">
            Add Html Block
         </h3>
      </div>
      <form action="#" wire:submit="save">
         <div class="p-6.5">
            <div class="mb-4.5">
               <input type="text" placeholder="Ener Page Name"
                  class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                  wire:model="form.title" />
               <x-input-error :messages="$errors->get('form.title')" class="mt-2" />
            </div>

            <div class="mb-4.5">
               <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                  <select
                     class="relative z-20 w-full px-5 py-3 transition bg-transparent border rounded outline-none appearance-none border-stroke focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                     :class="isOptionSelected && 'text-black dark:text-white'" @change="isOptionSelected = true"
                     wire:model="form.blockname">
                     <option value="" class="text-body">
                        Html Block
                     </option>
                     @foreach($HtmlBlocksOption as $HtmlBlocksOptionKey => $HtmlBlocksOptionval )
                     <option value="{{$HtmlBlocksOptionKey}}" class="text-body" {{$HtmlBlocksOptionKey==$this->
                        form->blockname?'selected':'' }} >
                        {{$HtmlBlocksOptionval}}
                     </option>
                     @endforeach
                  </select>
                  <x-input-error :messages="$errors->get('form.blockname')" class="mt-2" />
                  <span class="absolute z-30 -translate-y-1/2 right-4 top-1/2">
                     <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.8">
                           <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                              fill=""></path>
                        </g>
                     </svg>
                  </span>
               </div>
            </div>

            <div class="flex justify-center">
               <button
                  class="flex justify-center w-full p-3 font-medium rounded me-1 bg-primary text-gray hover:bg-opacity-90">
                  {{$this->mode == 'add'?'Add':'Edit'}}
               </button>
               <button
                  class="flex justify-center w-full p-3 font-medium bg-red-500 rounded text-gray hover:bg-opacity-90"
                  wire:click="resetForm" type="button">
                  cancel
               </button>
            </div>
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
                  <input class="datatable-input" placeholder="Search..." type="text" title="Search within table"
                     aria-controls="dataTableTwo" wire:model.live.debounce.300ms="search">
               </div>
            </div>
            <div class="datatable-container">
               <table class="table w-full table-auto datatable-table" id="dataTableTwo">
                  <thead>
                     <tr>
                        @foreach($headerColumn as $headerKey => $headerValue)
                        @if( $headerKey != 'actions' )
                        <th data-sortable="true" wire:click="doSort('{{$headerKey}}')">
                           <a href="#" class="datatable-sorter">
                              <div class="flex items-center justify-between gap-1.5">
                                 <p>{{$headerValue}}</p>
                                 <div class="inline-flex flex-col space-y-[2px]">
                                    <span class="inline-block">
                                       <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none"
                                          xmlns="http://www.w3.org/2000/svg">
                                          <path d="M5 0L0 5H10L5 0Z" fill=""></path>
                                       </svg>
                                    </span>
                                    <span class="inline-block">
                                       <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none"
                                          xmlns="http://www.w3.org/2000/svg">
                                          <path d="M5 5L10 0L-4.37114e-07 8.74228e-07L5 5Z" fill=""></path>
                                       </svg>
                                    </span>
                                 </div>
                              </div>
                           </a>
                        </th>
                        @else
                        <th data-sortable="true">
                           <a href="#" class="datatable-sorter">
                              <div class="flex items-center justify-between gap-1.5">
                                 <p>{{$headerValue}}</p>
                              </div>
                           </a>
                        </th>
                        @endif
                        @endforeach
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($HtmlBlocks as $HtmlBlock)
                     <tr data-index="0">
                        <td>{{$HtmlBlock->blockname}}</td>
                        <td>{{$HtmlBlock->htmlblock}}</td>
                        <td>
                           <div x-data="{ switcherToggle: @js($HtmlBlock->status == 'Y' ? false : true)  }">
                              <label for="toggle3" class="flex items-center cursor-pointer select-none">
                                 <div class="relative">
                                    <input type="checkbox" id="toggle3" class="sr-only"
                                       @change="switcherToggle = !switcherToggle"
                                       wire:change="changeStatus({{$HtmlBlock->id}})" />
                                    <div class="block h-8 w-14 rounded-full bg-meta-9 dark:bg-[#5A616B]"></div>
                                    <div
                                       :class="switcherToggle && '!right-1 !translate-x-full !bg-primary dark:!bg-white'"
                                       class="absolute flex items-center justify-center w-6 h-6 transition bg-white rounded-full dot left-1 top-1">
                                       <span :class="switcherToggle && '!block'"
                                          class="hidden text-white dark:text-bodydark">
                                          <svg class="fill-current stroke-current" width="11" height="8"
                                             viewBox="0 0 11 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                d="M10.0915 0.951972L10.0867 0.946075L10.0813 0.940568C9.90076 0.753564 9.61034 0.753146 9.42927 0.939309L4.16201 6.22962L1.58507 3.63469C1.40401 3.44841 1.11351 3.44879 0.932892 3.63584C0.755703 3.81933 0.755703 4.10875 0.932892 4.29224L0.932878 4.29225L0.934851 4.29424L3.58046 6.95832C3.73676 7.11955 3.94983 7.2 4.1473 7.2C4.36196 7.2 4.55963 7.11773 4.71406 6.9584L10.0468 1.60234C10.2436 1.4199 10.2421 1.1339 10.0915 0.951972ZM4.2327 6.30081L4.2317 6.2998C4.23206 6.30015 4.23237 6.30049 4.23269 6.30082L4.2327 6.30081Z"
                                                fill="" stroke="" stroke-width="0.4"></path>
                                          </svg>
                                       </span>
                                       <span :class="switcherToggle && 'hidden'">
                                          <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24"
                                             xmlns="http://www.w3.org/2000/svg">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                          </svg>
                                       </span>
                                    </div>
                                 </div>
                              </label>
                           </div>
                        </td>
                        <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                           <div class="flex items-center space-x-3.5">
                              <button type="button" class="hover:text-primary"
                                 wire:click="getDetails({{$HtmlBlock->id}})">
                                 <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                       d="M8.99981 14.8219C3.43106 14.8219 0.674805 9.50624 0.562305 9.28124C0.47793 9.11249 0.47793 8.88749 0.562305 8.71874C0.674805 8.49374 3.43106 3.20624 8.99981 3.20624C14.5686 3.20624 17.3248 8.49374 17.4373 8.71874C17.5217 8.88749 17.5217 9.11249 17.4373 9.28124C17.3248 9.50624 14.5686 14.8219 8.99981 14.8219ZM1.85605 8.99999C2.4748 10.0406 4.89356 13.5562 8.99981 13.5562C13.1061 13.5562 15.5248 10.0406 16.1436 8.99999C15.5248 7.95936 13.1061 4.44374 8.99981 4.44374C4.89356 4.44374 2.4748 7.95936 1.85605 8.99999Z"
                                       fill=""></path>
                                    <path
                                       d="M9 11.3906C7.67812 11.3906 6.60938 10.3219 6.60938 9C6.60938 7.67813 7.67812 6.60938 9 6.60938C10.3219 6.60938 11.3906 7.67813 11.3906 9C11.3906 10.3219 10.3219 11.3906 9 11.3906ZM9 7.875C8.38125 7.875 7.875 8.38125 7.875 9C7.875 9.61875 8.38125 10.125 9 10.125C9.61875 10.125 10.125 9.61875 10.125 9C10.125 8.38125 9.61875 7.875 9 7.875Z"
                                       fill=""></path>
                                 </svg>
                              </button>
                              <button class="hover:text-primary" wire:click="deleteDetails({{$HtmlBlock->id}})">
                                 <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                       d="M13.7535 2.47502H11.5879V1.9969C11.5879 1.15315 10.9129 0.478149 10.0691 0.478149H7.90352C7.05977 0.478149 6.38477 1.15315 6.38477 1.9969V2.47502H4.21914C3.40352 2.47502 2.72852 3.15002 2.72852 3.96565V4.8094C2.72852 5.42815 3.09414 5.9344 3.62852 6.1594L4.07852 15.4688C4.13477 16.6219 5.09102 17.5219 6.24414 17.5219H11.7004C12.8535 17.5219 13.8098 16.6219 13.866 15.4688L14.3441 6.13127C14.8785 5.90627 15.2441 5.3719 15.2441 4.78127V3.93752C15.2441 3.15002 14.5691 2.47502 13.7535 2.47502ZM7.67852 1.9969C7.67852 1.85627 7.79102 1.74377 7.93164 1.74377H10.0973C10.2379 1.74377 10.3504 1.85627 10.3504 1.9969V2.47502H7.70664V1.9969H7.67852ZM4.02227 3.96565C4.02227 3.85315 4.10664 3.74065 4.24727 3.74065H13.7535C13.866 3.74065 13.9785 3.82502 13.9785 3.96565V4.8094C13.9785 4.9219 13.8941 5.0344 13.7535 5.0344H4.24727C4.13477 5.0344 4.02227 4.95002 4.02227 4.8094V3.96565ZM11.7285 16.2563H6.27227C5.79414 16.2563 5.40039 15.8906 5.37227 15.3844L4.95039 6.2719H13.0785L12.6566 15.3844C12.6004 15.8625 12.2066 16.2563 11.7285 16.2563Z"
                                       fill=""></path>
                                    <path
                                       d="M9.00039 9.11255C8.66289 9.11255 8.35352 9.3938 8.35352 9.75942V13.3313C8.35352 13.6688 8.63477 13.9782 9.00039 13.9782C9.33789 13.9782 9.64727 13.6969 9.64727 13.3313V9.75942C9.64727 9.3938 9.33789 9.11255 9.00039 9.11255Z"
                                       fill=""></path>
                                    <path
                                       d="M11.2502 9.67504C10.8846 9.64692 10.6033 9.90004 10.5752 10.2657L10.4064 12.7407C10.3783 13.0782 10.6314 13.3875 10.9971 13.4157C11.0252 13.4157 11.0252 13.4157 11.0533 13.4157C11.3908 13.4157 11.6721 13.1625 11.6721 12.825L11.8408 10.35C11.8408 9.98442 11.5877 9.70317 11.2502 9.67504Z"
                                       fill=""></path>
                                    <path
                                       d="M6.72245 9.67504C6.38495 9.70317 6.1037 10.0125 6.13182 10.35L6.3287 12.825C6.35683 13.1625 6.63808 13.4157 6.94745 13.4157C6.97558 13.4157 6.97558 13.4157 7.0037 13.4157C7.3412 13.3875 7.62245 13.0782 7.59433 12.7407L7.39745 10.2657C7.39745 9.90004 7.08808 9.64692 6.72245 9.67504Z"
                                       fill=""></path>
                                 </svg>
                              </button>
                           </div>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
            <div class="p-5">
               {{$HtmlBlocks->links('vendor.livewire.tailwind')}}
            </div>
         </div>
      </div>
   </div>
</div>