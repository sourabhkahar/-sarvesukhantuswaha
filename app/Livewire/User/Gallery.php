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
        return view('livewire.user.gallery',['pid'=>'4']);
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
        preg_match('/src="([^"]+)"/i', $iframe,$matches);
        return '<img src="'.$this->getYoutubeEmbedUrl($matches[1]).'" style="width:-webkit-fill-available;"/>';
    }

    public function getVideoUrl($iframe){
        preg_match('/src="([^"]+)"/i', $iframe,$matches);
        return str_replace('embed','v',$matches[1]);
    }

    public function getYoutubeEmbedUrl($url)
    {
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        return 'https://img.youtube.com/vi/'.$youtube_id.'/hqdefault.jpg'  ;
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
