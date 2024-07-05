<?php
use App\Models\Page;

use Livewire\Volt\Component;

new class extends Component {
    
    public $headerFooter = [];

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
            return $pagesData[0]??[];
        }
        return $pagesData;
    }

}; ?>

<footer>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages : 'as,bn,en,gu,hi,kn,mai,ml,mr,or,pa,ta,te'}, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <div class="container">
        <div class="footer">
            <p>Copyright © 2024 <a href="/">sarvesukhantuswaha.org</a></p>
            <ul class="social-ul">
                @if(isset($headerFooter['link1']))
                <li>
                    <a href="{{$headerFooter['link1']}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="49.605 0 2834.65 2834.649" id="instagram"><circle cx="1466.93" cy="1417.324" r="1417.324" fill="#444"></circle><path fill="#fff" d="M1892.128 726.379h-850.395c-147.639 0-265.749 118.11-265.749 265.749v850.394c0 147.639 118.11 265.748 265.749 265.748h850.395c147.638 0 265.749-118.109 265.749-265.748V992.127c0-147.638-118.112-265.748-265.749-265.748zm76.772 159.449h29.527V1122.048h-236.221v-236.22H1968.9zm-696.851 389.765c41.338-59.056 118.11-100.395 194.882-100.395s153.544 41.339 194.882 100.395c29.527 41.338 47.244 88.582 47.244 141.732 0 135.826-112.205 242.126-242.126 242.126-129.922 0-242.126-106.299-242.126-242.126-.001-53.15 17.716-100.394 47.244-141.732zm750.001 566.929c0 70.867-59.056 129.922-129.922 129.922h-850.395c-70.866 0-129.922-59.055-129.922-129.922v-566.929h206.693c-17.717 41.338-29.527 94.488-29.527 141.732 0 206.693 171.26 377.953 377.953 377.953s377.953-171.26 377.953-377.953c0-47.244-11.812-100.395-29.527-141.732h206.692l.002 566.929z"></path></svg>
                    </a>
                </li>
                @endif
                @if(isset($headerFooter['link2']))
                <li>
                    <a href="{{$headerFooter['link2']}}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.87 28.87" id="youtube"><g><g><rect width="28.87" height="28.87" fill="#fd3832" rx="6.48" ry="6.48"></rect><path fill="#fff" fill-rule="evenodd" d="M8 19.77a1.88 1.88 0 0 1-1.24-1.21c-.54-1.48-.7-7.66.34-8.88A2 2 0 0 1 8.46 9c2.79-.3 11.41-.26 12.4.1a1.94 1.94 0 0 1 1.22 1.17c.59 1.53.61 7.09-.08 8.56a1.89 1.89 0 0 1-.87.88c-1.04.52-11.75.51-13.13.06zm4.43-2.9l5-2.6-5-2.62z"></path></g></g></svg>
                    </a>
                </li>
                @endIf
                @if(isset($headerFooter['link3']))
                <li>
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 1200 1227"
                        fill="none">
                        <path
                            d="M714.163 519.284L1160.89 0H1055.03L667.137 450.887L357.328 0H0L468.492 681.821L0 1226.37H105.866L515.491 750.218L842.672 1226.37H1200L714.137 519.284H714.163ZM569.165 687.828L521.697 619.934L144.011 79.6944H306.615L611.412 515.685L658.88 583.579L1055.08 1150.3H892.476L569.165 687.854V687.828Z"
                            fill="currentColor" />
                    </svg>
                    </a>
                </li>
                @endif
                @if(isset($headerFooter['link4']))
                <li>
                    <a href="{{$headerFooter['link4']}}">
                        <svg enable-background="new 0 0 56.693 56.693" height="30" width="30" version="1.1"
                        viewBox="0 0 56.693 56.693" fill="currentColor" xml:space="preserve"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path
                            d="M40.43,21.739h-7.645v-5.014c0-1.883,1.248-2.322,2.127-2.322c0.877,0,5.395,0,5.395,0V6.125l-7.43-0.029  c-8.248,0-10.125,6.174-10.125,10.125v5.518h-4.77v8.53h4.77c0,10.947,0,24.137,0,24.137h10.033c0,0,0-13.32,0-24.137h6.77  L40.43,21.739z" />
                    </svg>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</footer>
