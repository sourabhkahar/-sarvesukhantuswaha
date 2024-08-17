<?php
use App\Models\Page;

use Livewire\Volt\Component;

new class extends Component {
    
    public $hdrBanner = [];

    public function mount($pid){
        
        $this->hdrBanner = $this->getFormatedData(['taxonomycode' => 1, 'categorycode' => 0, 'id' => $pid, 'status' => 'Y'], true);
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
        // dd($pagesData);

        if($islanding){
            return $pagesData[0]??[];
        }
        // return $pagesData;
    }

}; ?>

<section class="banner-section inner-banner" data-aos="fade-up" data-aos-duration="1000">

    <img src="{{asset(isset($hdrBanner['headerimage'])?'storage/site-uploads/'.$hdrBanner['headerimage']:'/images/about-banner.jpg')}}" alt="" class="img-responsive" />
    <div class="banner-content">
        <div class="container">
            <h2>{{$hdrBanner['headertext']??''}}</h2>
            <p>{{isset($hdrBanner['headersubtext'])?nl2br($hdrBanner['headersubtext']):''}}</p>
        </div>
    </div>
</section>