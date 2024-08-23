<div class="">
    <section class="banner-section" data-aos="fade-up" data-aos-duration="1000">
        <div class="swiper bannerSlider">
            <div class="swiper-wrapper">
                @if(count($homeSlider)>0)
                @foreach ($homeSlider as $slider)
                <div class="swiper-slide">
                    <div class="banner-img">
                        <img src="{{ isset($slider['image1'])?asset('storage/site-uploads/'.$slider['image1']) : asset('/images/about-banner.jpg')}}"
                            class="img-responsive" />
                    </div>
                    <div class="banner-content">
                        <div class="container">
                            <h2>{{$slider['title']??''}}</h2>
                            <p>
                                {!!nl2br($slider['shortdescription1']??'')!!}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="swiper-slide">
                    <div class="banner-img">
                        <img src="{{asset('/images/about-banner.jpg')}}" class="img-responsive" />
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    <x-user.what-we-do :whatWeDo="$whatWeDo" :title="$page['title']??''" :link="$page['link1']??''" :modelOpenNo="$modelOpenNo" /> 

    <!-- <section class="started-section section-gapping" data-aos="fade-up" data-aos-duration="1500">
        <div class="container">
            <h2 class="main-title">{{isset($page['title1'])?$page['title1']:''}}</h2>

            <div class="sub-title">
                <h3>{{isset($page['title2'])?$page['title2']:''}}</h3>
                <p>
                  {!!nl2br($page['description1']??'')!!}
                </p>
            </div>

            <div class="what-box">
                <div class="box">
                    <h3>01</h3>
                    <h4>{{isset($page['title3'])?$page['title3']:''}}</h4>
                    <p>
                        {!!nl2br($page['shortdescription1']??'')!!}
                    </p>
                </div>
                <div class="box">
                    <h3>02</h3>
                    <h4>{{isset($page['title4'])?$page['title4']:''}}</h4>
                    <p>
                        {!!nl2br($page['shortdescription2']??'')!!}
                    </p>
                </div>
            </div>
        </div>
    </section> -->

    <!-- <section class="trust-section section-gapping" data-aos="fade-up" data-aos-duration="2500">
        <div class="container">
            <h2 class="main-title">{{isset($page['title6'])?$page['title6']:''}}</h2>
            <p class="text-center">
                {!!nl2br($page['description2']??'')!!}
            </p>
        </div>
    </section> -->

    @if(count($storyBooks)>0)
        <section class="stories-section section-gapping" data-aos="fade-up" data-aos-duration="2000">
            <div class="container">
                <h2 class="main-title">{{$this->page['title1']??''}}</h2>
                <div class="stories-box">
                    @foreach ($storyBooks as $book)
                        <div class="box">
                            <h3>{{$book['title']??''}}</h3>
                            <p>
                                {!!nl2br($book['shortdescription1']??'')!!}
                            </p>
                            @if(isset($book['link1']))
                                <a href="{{$book['link1']}}" class="btn">read more</a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    
    @if(count($logos)>0)
        <section class="partner-section section-gapping" data-aos="fade-up" data-aos-duration="2500">
            <div class="container">
                <h2 class="main-title">{{$this->page['title2']??''}}</h2>
                <div class="swiper partnerSlider">
                    <div class="swiper-wrapper">
                        @foreach ($logos as $logo)
                            @if(isset($logo['image1']))
                                <div class="swiper-slide">
                                    <a href="">
                                        <img src="{{asset('storage/site-uploads/'.$logo['image1'])}}" alt="" />
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if(isset($page['title3']) || isset($page['title4']) || isset($page['shortdescription1']) )
    <section class="donate-section section-gapping yellow-bg" data-aos="fade-up" data-aos-duration="3000">
        <div class="container">
            <h2 class="main-title">{{$page['title3']??''}}</h2>

            <div class="text-center donate-box">
                <h3>{{$page['title4']??''}}</h3>
                <p>{!!nl2br($page['shortdescription1']??'')!!}</p>
            </div>
        </div>
    </section>
    @endif
</div>