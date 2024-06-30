<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>


<header>
    <div class="container">
        <div class="header">
            <div class="logo">
                <a href="{{Route('home')}}" wire:navigate>
                    <img src="{{asset('/images/logo.png')}}" alt="" />
                </a>
            </div>
            
            <button type="button" class="btn-menu" onclick="toggleMenu()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
            <div class="main-menu">
                <div class="top-menu-header">
                    <div class="logo">
                        <a href="{{route('home')}}" wire:navigate>
                            <img src="{{asset('/images/logo.png')}}" alt="" />
                        </a>
                    </div>
                    <button type="button" class="btn-close" onclick="toggleMenu()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <ul>
                    <li><a href="{{route('home')}}" class="{{Route::currentRouteName() == 'home'?'active':'' }}" wire:navigate>Home   </a></li>
                    <li><a href="{{route('about')}}" class="{{Route::currentRouteName() == 'about'?'active':'' }}" wire:navigate>About Us</a></li>
                    <li><a href="{{route('gallery')}}" class="{{Route::currentRouteName() == 'gallery'?'active':'' }}" wire:navigate>Gallery</a></li>
                    <li><a href="{{route('contact-us')}}" class="{{Route::currentRouteName() == 'contact-us'?'active':'' }}" wire:navigate>Contact Us</a></li>
                    <li><a href="{{route('social-media')}}" class="{{Route::currentRouteName() == 'social-media'?'active':'' }}" wire:navigate>Social Media</a></li>

                </ul>
                {{-- <div id="google_translate_element"></div> --}}

            </div>
            <div class="translate-google">
                <div id="google_translate_element"></div>
            </div>
        </div>
    </div>
</header>
