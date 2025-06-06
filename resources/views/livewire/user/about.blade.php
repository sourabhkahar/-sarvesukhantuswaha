<div class="">
    <livewire:layout.user.header-banner :pid="$pid"/>
    <section class="started-section section-gapping" data-aos="fade-up" data-aos-duration="1500">
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
    </section>

    <x-user.what-we-do :whatWeDo="$whatWeDo" :title="$page['title5']??''" :link="$page['link1']??''" :modelOpenNo="$modelOpenNo" /> 

    <section class="trust-section section-gapping" data-aos="fade-up" data-aos-duration="2500">
        <div class="container">
            <h2 class="main-title">{{isset($page['title6'])?$page['title6']:''}}</h2>
            <p class="text-center">
                {!!nl2br($page['description2']??'')!!}
            </p>
        </div>
    </section>

    <x-user.cta-section :headerFooter="$headerFooter"  /> 

</div>

