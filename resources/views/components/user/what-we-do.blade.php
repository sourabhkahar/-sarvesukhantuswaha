@props(['whatWeDo','title','link','modelOpenNo'])
@if(count($whatWeDo) > 0)
        <section class="what-section section-gapping yellow-bg">
            <div class="container">
                <h2 class="main-title">{{$title??''}}</h2>
                <div class="what-box">
                    @foreach ($whatWeDo as $whatWeDoKey => $whatWeDoVal )
                    <div class="box">
                        <a href="" wire:click.prevent="openModal({{$loop->iteration}})">
                            <h3>0{{$loop->iteration}}</h3>
                            <h4>{{$whatWeDoVal['title']}}</h4>
                            <p> {{$whatWeDoVal['shortdescription1']??''}}</p>
                            <button class="btn">read more</button>
                        </a>
                    </div>

                    <div class="modal-overlay {{$modelOpenNo == $loop->iteration?'active':''}} ">
                        <div class="modal {{$modelOpenNo == $loop->iteration?'active':''}}">

                            <a class="close-modal" wire:click='closeModal'>
                                <svg viewBox="0 0 20 20">
                                    <path fill="currentColor"
                                        d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z">
                                    </path>
                                </svg>
                            </a><!-- close modal -->

                            <div class="modal-content">
                                <h3>{{$whatWeDoVal['title']}}</h3>
                                <p>{{$whatWeDoVal['description1']??''}} </p>
                            </div><!-- content -->

                        </div><!-- modal -->
                    </div>
                    @endforeach
                </div>
                <div class="text-center" >
                    <a href="{{$link??''}}" class="btn">Read More</a>
                </div>
            </div>
        </section>
    @endif