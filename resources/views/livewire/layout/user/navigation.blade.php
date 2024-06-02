<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>


<header>
    <div class="container">
        <div class="header">
            <div class="logo">
                <a href="index.html">
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
                    <li><a href="{{route('home')}}" class="active" wire:navigate>Home</a></li>
                    <li><a href="{{route('about')}}" wire:navigate>About Us</a></li>
                    <li><a href="{{route('gallery')}}" wire:navigate>Gallery</a></li>
                    <li><a href="{{route('contact-us')}}" wire:navigate>Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
