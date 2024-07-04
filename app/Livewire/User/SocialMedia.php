<?php

namespace App\Livewire\User;

use App\Models\Page;
use Livewire\Component;
use Livewire\Attributes\Layout;


class SocialMedia extends Component
{
    public $headerFooter = [];

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.user.social-media');
    }


    public function mount(){
        
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
            return $pagesData[0];
        }
        return $pagesData;
    }
}
