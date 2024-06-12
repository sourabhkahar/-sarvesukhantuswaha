<?php

use Livewire\Volt\Component;
use App\Models\HtmlBlock;
use Livewire\Attributes\On;
use App\Models\Page;
use App\Models\TextPagedetail;
use App\Models\TextPageGalllery;
use Livewire\WithFileUploads;
use App\Models\Taxonomy;
use Illuminate\Support\Facades\Storage;
//
new class extends Component {
    public $pid,$tid,$cid=0,$act; 
    public $formData = [];
    public $PageEntryBlocks = [];
    public $pageTitle = '';
    public $cancelUrl = '';
    use WithFileUploads;

    public function with(): array{
        return [
          'pageentryblock' => $this->PageEntryBlocks
         ];
      }

    public function save(){
        if($this->act == 'add'){
            $Pagecode = Page::max('id');
            $this->pid = $Pagecode + 1;
            Page::create([
                'id' => $this->pid,
                'pagename' => $this->generateSlug($this->formData['title']),
                'categoryCode' => $this->cid,
                'title' => ($this->formData['title']),
                'taxonomycode' => $this->tid,
                'status'    => 'Y'
            ]);
        }

        if($this->act == 'edit' && $this->cid > 0){
            $Page = Page::find($this->pid);
            $Page->pagename = $this->generateSlug($this->formData['title']);
            $Page->title = $this->formData['title'];
            $Page->save();
        }

        //Add Detail Data
        $FindRecords = TextPagedetail::Where('pagecode',$this->pid)->count();
        if($FindRecords > 0) {
            TextPagedetail::Where('pagecode',$this->pid)->delete();
        }
        $formData = [];
        $imagesData = [];
        //Set Input Field Data
        $icount = 1;
        forEach($this->formData as $formKey => $formval){
            if (strpos($formKey, 'image') !== false){
                if(($formval && !is_string( $formval ))){
                    $date=date_create();
                    $imagesData[] = [
                                    'pagecode' => $this->pid,
                                    'categorycode'=> $this->cid,
                                    'taxonomycode'=>$this->tid,
                                    'imageobj'=>$formval,
                                    'image'=>date_timestamp_get($date).'-'.$formval->getClientOriginalName(),
                                    'ordno'=>$icount,
                                    'fieldname'=>$formKey
                                ];
                } else {
                    $imagesData[] = [
                                    'pagecode' => $this->pid,
                                    'categorycode'=> $this->cid,
                                    'taxonomycode'=>$this->tid,
                                    'image'=>$formval,
                                    'ordno'=>$icount,
                                    'fieldname'=>$formKey
                                ];
                }
                $icount++;
            } else {
                $formData[] = [
                    'field'=>$formKey,
                    'value'=>$formval,
                    'pagecode'=>$this->pid,
                ];
            }
        }

        if(sizeof($imagesData) > 0){
            $imagesDataToInsert = [];
            foreach ($imagesData as $image_key => $image_value) {
                if(isset($image_value['imageobj'])){
                    //Deleteing Images
                    $Record = TextPageGalllery::Where('pagecode',$this->pid)->where('ordno',$image_value['ordno'])->first();
                    if($Record){
                        Storage::delete('public/site-uploads/'.$Record->image);
                        TextPageGalllery::Where('pagecode',$this->pid)->where('ordno',$image_value['ordno'])->delete();
                    }
                    
                    //Uploading Images
                    $image_value['imageobj']->storeAs(path: 'public/site-uploads',name:$image_value['image']);
                    unset($imagesData[$image_key]['imageobj']);
                    array_push($imagesDataToInsert,$imagesData[$image_key]);
                } 
            }
            
           //inserting images Data
           TextPageGalllery::insert($imagesDataToInsert);
        }

       
        //inserting Form Data
        TextPagedetail::insert($formData);
        if($this->act == 'edit' && $this->cid == 0){
            $this->showFormDetails();
        } else {
            $this->redirect("/admin/subpageentry/$this->cid/$this->tid", navigate: true);
        }
        session()->flash('message', 'Form submitted successfully!');
        
    }

    public function generateSlug(string $title, string $column = 'pagename'): string
    {
        // Create a slug from the title using Laravel's Str::slug method
        $slug = Str::slug($title);

        // Check if the generated slug already exists in the specified column of the model's table
        $checkSlug = Page::where($column, $slug)->where('id','!=',$this->pid)->first();

        // If the slug already exists, append a random string to make it unique
        if ($checkSlug) {
            // Append a random string to the original title to create a new slug
            $title = sprintf("%s %s", $title, Str::random(mt_rand(5, 10)));

            // Recursively call the function with the updated title to generate a new slug
            return $this->generateSlug($title, $column);
        }

        // If the slug is unique, return it
        return $slug;
    }

    public function showFormDetails(){
        $detailData = [];
        if($this->cid > 0){

            $this->PageEntryBlocks = HtmlBlock::where(
                                                        [
                                                            'categorycode'=>$this->cid,
                                                            'taxonmycode'=>$this->tid,
                                                            'status'=>'Y'
                                                        ]
                                                    )
                                                    ->orderBy('ordno')
                                                    ->get();
        } else {
            $this->PageEntryBlocks = HtmlBlock::where(
                                                        [
                                                            'pagecode'   => $this->pid,
                                                            'taxonmycode'=> $this->tid,
                                                            'status'=>'Y'
                                                        ]
                                                    )
                                                    ->orderBy('ordno')
                                                    ->get();
        }
                                     
        $textPageDetails = TextPagedetail::where('pagecode',$this->pid)->get();
        //Get Images
        $imagesData = TextPageGalllery::Where('pagecode',$this->pid)->orderBy('ordno')->get();
        foreach ($imagesData as $imageKey => $imageVal) {
            $detailData[$imageVal->fieldname] = $imageVal->image;
        }

        //Get form data
        foreach ($textPageDetails as $textPageDetailsKey => $textPageDetailsVal) {
            $detailData[$textPageDetailsVal->field] = $textPageDetailsVal->value;
        }
        
        //Assign form data
        foreach ($this->PageEntryBlocks as $key => $value) {
            if(sizeof($detailData) > 0 && isset($detailData[$value->htmlblock])){
                $this->formData[$value->htmlblock] = $detailData[$value->htmlblock]; 
            } else {
                $this->formData[$value->htmlblock] = ''; 
            }
        }
    }

    #[On('delete-page-entry-image')] 
    public function deletePageEntryImage($ordno)
    {
        $Record = TextPageGalllery::Where('pagecode',$this->pid)->where('ordno',$ordno)->first();
        if($Record){
            Storage::delete('public/site-uploads/'.$Record->image);
            $Record->delete();
        }
        $this->showFormDetails();
    }

    public function mount($pid,$tid,$cid,$act){
        $this->pid = $pid;
        $this->cid = $cid;
        $this->tid = $tid;
        $this->act = $act;
        if( $this->cid > 0){
            $this->pageTitle = Taxonomy::where('id',$this->tid)->first()->title;
        } else {
            $this->pageTitle = Page::where('id',$this->pid)->first()->Title;
        }
        $this->showFormDetails();
        $this->cancelUrl = $this->getCancelRoute();
    }

    public function getCancelRoute(){
        $subPageEntryUrl = route('sub-pageentry',['cid'=>$this->cid,'tid'=>$this->tid]);
        $pageEntryUrl = route('pageentry',['pid'=>$this->pid,'tid'=>$this->tid]);
        return $this->tid > 1?$subPageEntryUrl:$pageEntryUrl;
    }
}
?>

<div>
    <div><strong>{{$pageTitle??''}}</strong></div>
    <form wire:submit='save'>
        @foreach($pageentryblock as $itemKey => $itemVal)
        @if (strpos($itemVal->htmlblock, 'image') !== false)
        <x-dynamic-component :component="strtolower($itemVal->htmlblock)" class="mt-4"
            wire:model.live="formData.{{$itemVal->htmlblock}}" caption="{{$itemVal->blockname}}"
            name="{{$itemVal->htmlblock}}" value="{{$formData[$itemVal->htmlblock]}}" />

        <div id="loading-screen" class="fixed top-0 left-0 z-50 hidden block w-full h-full bg-white opacity-75"
            wire:loading wire:target="formData.{{$itemVal->htmlblock}}">
            <span class="relative block w-0 h-0 mx-auto my-0 text-green-500 opacity-75 top-1/2">
                <div class="animate-spin inline-block size-6 border-[3px] border-current border-t-transparent text-blue-600 rounded-full dark:text-blue-500"
                    role="status" aria-label="loading">
                    <span class="sr-only">Loading...</span>
                </div>
            </span>
        </div>
        @else
        <x-dynamic-component :component="strtolower($itemVal->htmlblock)" class="mt-4"
            wire:model.live="formData.{{$itemVal->htmlblock}}" caption="{{$itemVal->blockname}}"
            name="{{$itemVal->htmlblock}}" />
        @endif
        @endforeach
        <div class="flex mt-6">
            <button class="flex justify-center p-3 font-medium rounded bg-primary text-gray hover:bg-opacity-90"
                wire:loading.attr="disabled">
                <svg class="hidden w-5 h-5 mr-3 -ml-1 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" wire:loading.class="animate-spin" wire:loading.class.remove="hidden"
                    wire:target="save">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Submit
            </button>
            <a class="flex justify-center p-3 ml-2 font-medium bg-red-500 rounded text-gray hover:bg-opacity-90"
                 href="{{$this->cancelUrl}}" type="button" wire:navigate>
                Cancel
        </a>
        </div>
    </form>
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