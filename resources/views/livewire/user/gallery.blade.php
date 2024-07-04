<div class="">
    <section class="banner-section inner-banner" data-aos="fade-up" data-aos-duration="1000">
        <img src="{{asset('/images/about-banner.jpg')}}" alt="" class="img-responsive" />
        <div class="banner-content">
            <div class="container">
                <h2>Consectetur Adipisicing Elit</h2>
                <p>We support children and youth to reach their full potential</p>
            </div>
        </div>
    </section>

    <x-user.what-we-do :whatWeDo="$whatWeDo" :title="$page['title1']??''" :link="$page['title1']??''" :modelOpenNo="$modelOpenNo" /> 

    <section class="care-section section-gapping" data-aos="fade-up" data-aos-duration="2000">
        <div class="container">
            <h2 class="main-title">WHAT WE CARE FOR!</h2>
            <div class="care-box">
                @foreach ($galleryArr as $gallery)   
                    <div class="box">
                        <div class="care-img">
                            @if(isset($gallery['image1']))
                                <img src="{{asset('storage/site-uploads/'.$gallery['image1'])}}" alt="" class="img-responsive" />
                            @else
                                <img src="{{asset('/images/default-gallery.jpg')}}" alt="" class="img-responsive" />
                            @endif
                        </div>
                        <h3>{{$gallery['title']??''}}</h3>
                        <p>{{isset($gallery['shortdescription1'])?nl2br($gallery['shortdescription1']):''}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <x-user.cta-section :headerFooter="$headerFooter"  /> 
    
</div>