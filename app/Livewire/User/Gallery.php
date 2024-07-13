<?php

namespace App\Livewire\User;

use App\Models\Page;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Gallery extends Component
{
    public $modelOpenNo = 0;
    public $page = [];
    public $whatWeDo = [];
    public $galleryArr = [];
    public $headerFooter = [];


    #[Layout('layouts.guest')] 
    public function render()
    {
        return view('livewire.user.gallery');
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
       $this->page = $this->getFormatedData(['taxonomycode' => 1, 'categorycode' => 0, 'id' => 4, 'status' => 'Y'], true);
       $this->galleryArr = $this->getFormatedData(['taxonomycode' => 6, 'categorycode' => 4, 'status' => 'Y']);
       $this->headerFooter = $this->getFormatedData(['taxonomycode' => 1, 'categorycode' => 0, 'id' => 5, 'status' => 'Y'], true);

    }

    public function replaceHeightWIthIframe($iframe){
        // $iframe = '<iframe width="400" height="225" src="youtube.com/embed/c7ct6pNOvEE?feature=oembed" frameborder="0" allowfullscreen></iframe>';
        // $src = html_entity_decode($post['url']);
        $height = 250;
        $width = 410;

        // add autoplay
        // $src = $src . (strstr($src, '?') ? '&': '?') . 'autoplay=1';

        // $iframe = preg_replace('/src="(.*?)"/i', 'src="' . $src .'"', $iframe);
        $iframe = preg_replace('/height="(.*?)"/i', 'height="' . $height .'"', $iframe);
        $iframe = preg_replace('/width="(.*?)"/i', 'width="' . $width .'"', $iframe);
        return $iframe;
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
