<div class="">
    <livewire:layout.user.header-banner :pid="$pid"/>
    <section class="care-section section-gapping" data-aos="fade-up" data-aos-duration="2000">
        <div class="container">
            <h2 class="main-title">WHAT WE CARE FOR!</h2>
            <div class="care-box">
                @foreach ($galleryArr as $gallery)   
                    <div class="box">
                        <div class="care-img">
                            @if(isset($gallery['shortdescription1']) && !empty($gallery['shortdescription1']))
                                {!!$this->replaceHeightWIthIframe($gallery['shortdescription1'])!!}
                            @elseif(isset($gallery['image1']))
                                <img src="{{asset('storage/site-uploads/'.$gallery['image1'])}}" alt="" class="img-responsive" />
                            @else
                                <img src="{{asset('/images/default-gallery.jpg')}}" alt="" class="img-responsive" />
                            @endif
                        </div>
                        <h3>{{$gallery['title']??''}}</h3>
                        <p>{!!isset($gallery['shortdescription2'])?nl2br($gallery['shortdescription2']):''!!}</p>
                        @if(isset($gallery['shortdescription1']) && !empty($gallery['shortdescription1']))
                        <div class="text-center" >
                            <a href="{{$this->getVideoUrl($gallery['shortdescription1'])}}" target="_blank" class="btn">Watch Video</a>
                        </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>