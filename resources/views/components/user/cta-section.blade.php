@props(['headerFooter'])
<section class="join-section section-gapping" >
    <div class="container text-center">
        <div class="">
            <h2 class="main-title">{{$headerFooter['title1']??''}}</h2>
        </div>
        <h3>{{$headerFooter['title2']??''}}</h3>
        <p>{!!nl2br($headerFooter['shortdescription1']??'')!!}</p>
        {{-- https://dev.to/jringeisen/how-to-create-dynamic-input-fields-with-laravel-livewire-14kn --}}
        @if(isset($headerFooter['link5']))
            <a href="{{$headerFooter['link5']}}" class="btn">{{$headerFooter['title3']??'donate'}}</a>
        @endif
    </div>
</section>