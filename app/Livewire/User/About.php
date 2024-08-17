<?php

namespace App\Livewire\User;

use App\Models\Page;
use Livewire\Attributes\Layout;
use Livewire\Component;

class About extends Component
{
    public $page = [];
    public $whatWeDo = [];
    public $modelOpenNo = 0;
    public $headerFooter = [];


    #[Layout('layouts.guest')] 
    public function render()
    {
        return view('livewire.user.about',['pid'=>'2']);
    }

    public function openModal($ModelNo)
    {
        $this->modelOpenNo = $ModelNo;
    }

    public function closeModal()
    {
        $this->modelOpenNo = 0;
    }

    public function mount()
    {
       $this->whatWeDo = $this->getFormatedData(['taxonomycode' => 2, 'categorycode' => 1, 'status' => 'Y']);
       $this->page = $this->getFormatedData(['taxonomycode' => 1, 'categorycode' => 0, 'id' => 2, 'status' => 'Y'], true);
       $this->headerFooter = $this->getFormatedData(['taxonomycode' => 1, 'categorycode' => 0, 'id' => 5, 'status' => 'Y'], true);
    }

    public function getFormatedData($data, $islanding = false)
    {
        $textPageDetails = Page::with(['gallery', 'page_details'])->where($data)->get();
        $pagesData = [];
        foreach ($textPageDetails as $textPage_key => $textPage_value) {
            $pageDetails = [];
            foreach ($textPage_value->page_details as $key => $value) {
                $pageDetails[$value->field] = $value->value;
            }
            foreach ($textPage_value->gallery as $gallery_key => $gallery_value) {
                $pageDetails[$gallery_value->fieldname] = $gallery_value->image;
            }
            $pagesData[] = $pageDetails;
        };

        if($islanding){
            return $pagesData[0]??[];
        }
        return $pagesData;
    }
}
