<?php

use Livewire\Volt\Component;
use App\Models\HtmlBlock;
use Livewire\Attributes\On;
use App\Models\TextPagedetail;
use App\Models\TextPageGalllery;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
//
new class extends Component {
    public $pid,$tid; 
    public $formData = [];
    public $PageEntryBlocks = [];
    use WithFileUploads;
    public function with(): array{
        return [
          'pageentryblock' => $this->PageEntryBlocks
         ];
      }

    public function save(){
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
            if (strpos($formKey, 'image') !== false && $formval){
                $date=date_create();
                $imagesData[] = [
                                            'pagecode' => $this->pid,
                                            'categorycode'=>0,
                                            'taxonomycode'=>$this->tid,
                                            'imageobj'=>$formval,
                                            'image'=>date_timestamp_get($date).'-'.$formval->getClientOriginalName(),
                                            'ordno'=>$icount
                                        ];
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
            foreach ($imagesData as $image_key => $image_value) {
                //Deleteing Images
                $Record = TextPageGalllery::Where('pagecode',$this->pid)->where('ordno',$image_value['ordno'])->first();
                    if($Record){
                    Storage::delete('site-uploads/'.$Record->image);
                    TextPageGalllery::Where('pagecode',$this->pid)->where('ordno',$image_value['ordno'])->delete();
                    }
                
                //Uploading Images
                $image_value['imageobj']->storeAs(path: 'site-uploads',name:$image_value['image']);
                unset($imagesData[$image_key]['imageobj']);
            }
            
           //inserting images Data
           TextPageGalllery::insert($imagesData);
        }
       
        //inserting Form Data
        TextPagedetail::insert($formData);
        // $this->reset();
        session()->flash('message', 'Form submitted successfully!');
    }

    public function mount($pid,$tid){
        $this->pid = $pid;
        $this->tid = $tid;
        $this->PageEntryBlocks = HtmlBlock::where('pagecode',$this->pid)->where('taxonmycode',$this->tid)->
                                     where('status','Y')->orderBy('ordno')->
                                     get();
        $textPageDetails = TextPagedetail::where('pagecode',$pid)->get();

        $detailData = [];
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

   
}
?>

<div>
    <form wire:submit='save'>
        @foreach($pageentryblock as $itemKey => $itemVal)
        @if (strpos($itemVal->htmlblock, 'image') !== false)
        <x-dynamic-component :component="strtolower($itemVal->htmlblock)" class="mt-4"
            wire:model.live="formData.{{$itemVal->htmlblock}}" caption="{{$itemVal->blockname}}"
            name="{{$itemVal->htmlblock}}" />
        @else
        <x-dynamic-component :component="strtolower($itemVal->htmlblock)" class="mt-4"
            wire:model.live="formData.{{$itemVal->htmlblock}}" caption="{{$itemVal->blockname}}"
            name="{{$itemVal->htmlblock}}" />
        @endif
        @endforeach
        <div class="mt-6">
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
        </div>
    </form>
</div>