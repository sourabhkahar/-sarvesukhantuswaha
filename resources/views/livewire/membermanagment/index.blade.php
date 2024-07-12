<?php

use Livewire\WithPagination;
use Livewire\Volt\Component;
use App\Livewire\Forms\Membermanagment;
use App\Models\User;

new class extends Component {
    use WithPagination;
    public Membermanagment $form; 
    public $perPage = 10; 
    public $search = '' ; 
    public $sortColumn = 'name';
    public $sortDirection = 'Asc';
    public $editId = null;
    public $showuser = null;
    public $openModal = false;
    public $headerColumn  = [
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

    public function with(): array{
        return [
        'users' =>  User::where([
                                    'status'=>'Y',
                                    'role'=>Config::get('constant.roles.member'),
                                ])
                                ->search($this->search)
                                ->orderBy($this->sortColumn,$this->sortDirection)
                                ->paginate($this->perPage),
        ];
    }

    public function deleteDetails($padeId){
        $page = User::find($padeId);
        $page->status = 'N';
        $page->save();
        session()->flash('message', 'Item Deleted Successfully');
    }

    public function resetForm(){
        $this->mode = 'add';
        $this->editId = null;
        $this->title = '';
        $this->form->resetForm();
    }

    public function getUserDetails($id){
        $this->showuser = User::with(['user_details','families'])->find($id);
    }
    
}; ?>

<div x-data={modalOpen:false}>
    <div class="flex items-center justify-between">
        <div>
            <strong>Member Managment</strong>
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
                                                    <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5 0L0 5H10L5 0Z" fill=""></path>
                                                    </svg>
                                                </span>
                                                <span class="inline-block">
                                                    <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5 5L10 0L-4.37114e-07 8.74228e-07L5 5Z" fill="">
                                                        </path>
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
                            @foreach ($users as $user)
                            <tr data-index="0">
                                <td>{{$user->name}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->updated_at}}</td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <div class="flex items-center space-x-3.5">
                                        <a href="#" wire:click="getUserDetails({{$user->id}})" type="button" class="hover:text-primary" @click="modalOpen = true">
                                            <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.99981 14.8219C3.43106 14.8219 0.674805 9.50624 0.562305 9.28124C0.47793 9.11249 0.47793 8.88749 0.562305 8.71874C0.674805 8.49374 3.43106 3.20624 8.99981 3.20624C14.5686 3.20624 17.3248 8.49374 17.4373 8.71874C17.5217 8.88749 17.5217 9.11249 17.4373 9.28124C17.3248 9.50624 14.5686 14.8219 8.99981 14.8219ZM1.85605 8.99999C2.4748 10.0406 4.89356 13.5562 8.99981 13.5562C13.1061 13.5562 15.5248 10.0406 16.1436 8.99999C15.5248 7.95936 13.1061 4.44374 8.99981 4.44374C4.89356 4.44374 2.4748 7.95936 1.85605 8.99999Z"
                                                    fill=""></path>
                                                <path
                                                    d="M9 11.3906C7.67812 11.3906 6.60938 10.3219 6.60938 9C6.60938 7.67813 7.67812 6.60938 9 6.60938C10.3219 6.60938 11.3906 7.67813 11.3906 9C11.3906 10.3219 10.3219 11.3906 9 11.3906ZM9 7.875C8.38125 7.875 7.875 8.38125 7.875 9C7.875 9.61875 8.38125 10.125 9 10.125C9.61875 10.125 10.125 9.61875 10.125 9C10.125 8.38125 9.61875 7.875 9 7.875Z"
                                                    fill=""></path>
                                            </svg>
                                        </a>
                                        <button class="hover:text-primary" wire:click="deleteDetails({{$user->id}})"
                                            wire:confirm="Are you sure you want to delete this Item?">
                                            <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
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
                    {{$users->links('vendor.livewire.tailwind')}}
                </div>
            </div>
        </div>
    </div>
    <div x-show="modalOpen" x-transition="" class="fixed top-0 left-0 flex items-center justify-center w-full h-full min-h-screen z-999999 bg-black/90" style="display: none;">
        <div @click.outside="modalOpen = false" class=" absolute w-full h-full overflow-y-auto max-w-142.5 rounded-lg bg-white px-8 py-12 text-center dark:bg-boxdark ">
            <h3 class="pb-2 text-xl font-bold text-black dark:text-white sm:text-2xl">
                Member Details 
            </h3>
            <button @click="modalOpen = false" class="absolute flex items-center justify-center text-black transition rounded-full right-6 top-6 h-7 w-7 hover:text-primary">
                <svg width="10" height="10" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.4917 7.65579L11.106 12.2645C11.2545 12.4128 11.4715 12.5 11.6738 12.5C11.8762 12.5 12.0931 12.4128 12.2416 12.2645C12.5621 11.9445 12.5623 11.4317 12.2423 11.1114C12.2422 11.1113 12.2422 11.1113 12.2422 11.1113C12.242 11.1111 12.2418 11.1109 12.2416 11.1107L7.64539 6.50351L12.2589 1.91221L12.2595 1.91158C12.5802 1.59132 12.5802 1.07805 12.2595 0.757793C11.9393 0.437994 11.4268 0.437869 11.1064 0.757418C11.1063 0.757543 11.1062 0.757668 11.106 0.757793L6.49234 5.34931L1.89459 0.740581L1.89396 0.739942C1.57364 0.420019 1.0608 0.420019 0.740487 0.739944C0.42005 1.05999 0.419837 1.57279 0.73985 1.89309L6.4917 7.65579ZM6.4917 7.65579L1.89459 12.2639L1.89395 12.2645C1.74546 12.4128 1.52854 12.5 1.32616 12.5C1.12377 12.5 0.906853 12.4128 0.758361 12.2645L1.1117 11.9108L0.758358 12.2645C0.437984 11.9445 0.437708 11.4319 0.757539 11.1116C0.757812 11.1113 0.758086 11.111 0.75836 11.1107L5.33864 6.50287L0.740487 1.89373L6.4917 7.65579Z" class="fill-current stroke-current"></path>
                </svg>
            </button>
            <span class="mx-auto mb-6 inline-block h-1 w-22.5 rounded bg-primary"></span>
            <div class="">
                <div class="grid grid-cols-1 gap-4 md:gap-6 ">
                    <div class="flex flex-col gap-12">
                        
                        @if(isset($showuser) && isset($showuser->user_details))
                            <div class="px-4 py-5 border-t border-gray-200 sm:p-0">
                                <dl class="sm:divide-y sm:divide-gray-200">
                                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Full name
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$showuser->user_details->firstname.''.$showuser->user_details->lastname }}
                                        </dd>
                                    </div>
                                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Email Address
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$showuser->email}}
                                        </dd>
                                    </div>
                                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Phone number
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$showuser->user_details->phone}}
                                        </dd>
                                    </div>
                                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Address
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{nl2br($showuser->user_details->address)}}
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        @endif
                        
                        @if(isset($showuser->families))
                            @foreach ($showuser->families as $key => $item)
                                
                                <!-- Accordion Item -->
                                <div x-data="{ accordionOpen: false }" @click.outside="accordionOpen = false" class="p-4 border rounded-md border-stroke shadow-9 dark:border-strokedark dark:shadow-none sm:p-6">
                                    <button @click="accordionOpen = !accordionOpen" class="flex w-full items-center gap-1.5 sm:gap-3 xl:gap-6">
                                        <div class="flex h-10.5 w-full max-w-10.5 items-center justify-center rounded-md bg-[#F3F5FC] dark:bg-meta-4">
                                        <svg :class="accordionOpen &amp;&amp; 'rotate-180'" class="duration-200 ease-in-out fill-primary stroke-primary dark:fill-white dark:stroke-white" width="18" height="10" viewBox="0 0 18 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.28882 8.43257L8.28874 8.43265L8.29692 8.43985C8.62771 8.73124 9.02659 8.86001 9.41667 8.86001C9.83287 8.86001 10.2257 8.69083 10.5364 8.41713L10.5365 8.41721L10.5438 8.41052L16.765 2.70784L16.771 2.70231L16.7769 2.69659C17.1001 2.38028 17.2005 1.80579 16.8001 1.41393C16.4822 1.1028 15.9186 1.00854 15.5268 1.38489L9.41667 7.00806L3.3019 1.38063L3.29346 1.37286L3.28467 1.36548C2.93287 1.07036 2.38665 1.06804 2.03324 1.41393L2.0195 1.42738L2.00683 1.44184C1.69882 1.79355 1.69773 2.34549 2.05646 2.69659L2.06195 2.70196L2.0676 2.70717L8.28882 8.43257Z" fill="" stroke=""></path>
                                        </svg>
                                        </div>

                                        <div>
                                        <h4 class="font-medium text-left text-black text-title-xsm dark:text-white">
                                            Family Memeber {{$key+1}}
                                        </h4>
                                        </div>
                                    </button>

                                    <div x-show="accordionOpen" class="mt-5 duration-200 ease-in-out " style="display: none;">
                                        <div class="px-4 py-5 border-t border-gray-200 sm:p-0">
                                            <dl class="sm:divide-y sm:divide-gray-200">
                                                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Name
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{$item->name??'-' }}
                                                    </dd>
                                                </div>
                                                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Is House Owner
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{$item->ishouseonwer??'-'}}
                                                    </dd>
                                                </div>
                                                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Relation
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{$item->relation??'-'}}
                                                    </dd>
                                                </div>
                                                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Martial Status
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{$item->martialstatus??'-'}}
                                                    </dd>
                                                </div>
                                                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Blood Group
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{$item->bloodgroup??'-'}}
                                                    </dd>
                                                </div>
                                                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Education
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{$item->education??'-'}}
                                                    </dd>
                                                </div>
                                                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Medical History
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{$item->medicalhistory}}  {{$item->othermedicalhistory}}
                                                    </dd>
                                                </div>
                                                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        No Of Vehicles
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{$item->noofvehicles??'-'}} 
                                                    </dd>
                                                </div>
                                                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Vehicle No.
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{$item->vehiclesnumber??'-'}} 
                                                    </dd>
                                                </div>
                                                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Court Case
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{$item->courtcase??'-'}} 
                                                    </dd>
                                                </div>
                                                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Court Number
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{$item->courtcasenumber??'-'}} 
                                                    </dd>
                                                </div>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                        
                            @endforeach
                        @endif

                    </div>
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