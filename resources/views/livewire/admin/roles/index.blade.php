<?php

use Livewire\WithPagination;
use Livewire\Volt\Component;
use App\Livewire\Forms\RoleForm;
use Spatie\Permission\Models\Role;
new class extends Component { 
      use WithPagination;
      
      public RoleForm $form; 
      public $perPage = 10; 
      public $search = '' ; 
      public $sortColumn = 'created_at';
      public $sortDirection = 'Asc';
      public $editId = null;
      public $headerColumn  = [
                                 'id'=>'Sr.No.',
                                 'name'=>'Name',
                                 'created_at'=>'Created At',
                                 'updated_At'=>'Updated At',
                                 'actions'=>'Actions'
                              ];
      
      public function doSort($columnName){
         if($this->sortColumn == $columnName){
            $this->sortDirection = ($this->sortDirection == 'Asc')?'Desc':'Asc' ;
         }
         $this->sortColumn = $columnName;
      }

      public function with(): array
      {
         return [
            'Role' => Role::orderBy($this->sortColumn,$this->sortDirection)->paginate($this->perPage),
         ];
      }

      // public function create()
      // {
      //    return view('roles.create', compact('permission'));
      // }

      public function addNewRole(){
         $this->redirect("/admin/roles/create", navigate: true);
      }

      public function editRole($id){
         $this->redirect("/admin/roles/edit/".$id, navigate: true);
      }

      public function deleteRole($id){
         $this->form->id = $id;
         $this->form->destroy();
         session()->flash('message', 'Role Deleted Successfully');
      }
}; ?>

<div>
   <div class="flex items-center justify-between">
      <div>
          <strong>Roles Managment</strong>
      </div>
      <div>
          <button
              class="flex justify-center w-full p-3 font-medium rounded me-1 bg-primary text-gray hover:bg-opacity-90"
              wire:click='addNewRole'>Add New Role</button>
      </div>
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
                        <option value="50">50</option>
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
                     @foreach ($Role as $role)
                     <tr data-index="0">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->created_at}}</td>
                        <td>{{$role->updated_at}}</td>
                        <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                           <div class="flex items-center space-x-3.5">
                              <button type="button" class="hover:text-primary"
                                 wire:click="editRole({{$role->id}})">
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
                              @if(!in_array($role->name,['super-admin','admin','dev']))
                                 <button class="hover:text-primary" wire:click="deleteRole({{$role->id}})" wire:confirm="Are you sure you want to delete this role?">
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
                              @endif
                            
                           </div>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
            <div class="p-5">
               {{$Role->links('vendor.livewire.tailwind')}}
            </div>
         </div>
      </div>
   </div>
   @if (session()->has('message'))
   <div class="fixed top-0 right-0 m-10 z-999">
       <div class="max-w-xs bg-white border border-gray-200 shadow-lg rounded-xl dark:bg-neutral-800 dark:border-neutral-700"
           role="alert">
           <div class="flex p-4">
               <div class="flex-shrink-0">
                   <svg class="flex-shrink-0 size-4 text-teal-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16"
                       height="16" fill="currentColor" viewBox="0 0 16 16">
                       <path
                           d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z">
                       </path>
                   </svg>
               </div>
               <div class="ms-3">
                   <p class="text-sm text-gray-700 dark:text-neutral-400">
                       {{ session('message') }}
                   </p>
               </div>
           </div>
       </div>
   </div>
   @endif
</div>