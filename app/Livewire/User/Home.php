<?php

namespace App\Livewire\User;

use App\Models\Page;
use Livewire\Component;
use Livewire\Attributes\Layout;

class Home extends Component
{
    #[Layout('layouts.guest')]
    public $modelOpenNo = 0;
    public $homeSlider = [];
    public $whatWeDo = [];
    public $storyBooks = [];
    public $logos = [];
    public $page = [];
    public function render()
    {
        $this->dispatch('refresh');
        return view('livewire.user.home');
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
        $this->homeSlider =  $this->getFormatedData(['taxonomycode' => 5, 'categorycode' => 1, 'status' => 'Y']);
        $this->whatWeDo = $this->getFormatedData(['taxonomycode' => 2, 'categorycode' => 1, 'status' => 'Y']);
        $this->storyBooks = $this->getFormatedData(['taxonomycode' => 3, 'categorycode' => 1, 'status' => 'Y']);
        $this->logos = $this->getFormatedData(['taxonomycode' => 4, 'categorycode' => 1, 'status' => 'Y']);
        $this->page = $this->getFormatedData(['taxonomycode' => 1, 'categorycode' => 0, 'id' => 1, 'status' => 'Y'], true);
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
