<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.app')] class extends Component
{
    public LoginForm $form; //https://codepen.io/elujambio/pen/YLMVed

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false));
    }
}; ?>

{{-- <div> --}}
    <!-- Session Status -->
    <div class="session">
        <div class="left">
            <img src="../images/logo.jpeg">
        </div>
        <form wire:submit="login">
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input wire:model="form.email" id="email" class="block w-full mt-1" type="email" name="email" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input wire:model="form.password" id="password" class="block w-full mt-1"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            {{-- <div class="block mt-4">
                <label for="remember" class="inline-flex items-center">
                    <input wire:model="form.remember" id="remember" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm dark:bg-gray-900 dark:border-gray-700 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span class="text-sm text-gray-600 ms-2 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div> --}}

            <div class="login-submit-button">
                {{-- @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}" wire:navigate>
                        {{ __('Forgot your password?') }}
                    </a>
                @endif --}}

                <x-primary-button class="ms-3 cursor-poitner">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>

        <style>
            
            h4 {
                font-size: 24px;
                font-weight: 600;
                color: #000;
                opacity: 0.85;
            }
    
            label {
                font-size: 12.5px;
                color: #000;
                opacity: 0.8;
                font-weight: 400;
            }
    
            form {
                padding: 40px 30px;
                background: #fefefe;
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                padding-bottom: 20px;
                width: 300px;
            }
    
            form h4 {
                margin-bottom: 20px;
                color: rgba(0, 0, 0, 0.5);
            }
    
            form h4 span {
                color: black;
                font-weight: 700;
            }
    
            form p {
                line-height: 155%;
                margin-bottom: 5px;
                font-size: 14px;
                color: #000;
                opacity: 0.65;
                font-weight: 400;
                max-width: 200px;
                margin-bottom: 40px;
            }
    
            a.discrete {
                color: rgba(0, 0, 0, 0.4);
                font-size: 14px;
                border-bottom: solid 1px rgba(0, 0, 0, 0);
                padding-bottom: 4px;
                margin-left: auto;
                font-weight: 300;
                transition: all 0.3s ease;
                margin-top: 40px;
            }
    
            a.discrete:hover {
                border-bottom: solid 1px rgba(0, 0, 0, 0.2);
            }
    
            button {
                -webkit-appearance: none;
                width: auto;
                min-width: 100px;
                border-radius: 24px;
                text-align: center;
                padding: 15px 40px;
                margin-top: 5px;
                background-color: #ffea3d;
                color: #fff;
                font-size: 14px;
                margin-left: auto;
                font-weight: 500;
                box-shadow: 0px 2px 6px -1px rgba(0, 0, 0, 0.13);
                border: none;
                transition: all 0.3s ease;
                outline: 0;
            }
    
            button:hover {
                transform: translateY(-3px);
                box-shadow: 0 2px 6px -1px rgba(182, 157, 230, 0.65);
            }
    
            button:hover:active {
                transform: scale(0.99);
            }
    
            input {
                font-size: 16px;
                padding: 20px 0px;
                height: 56px;
                border: none;
                border-bottom: solid 1px rgba(0, 0, 0, 0.1);
                background: #fff;
                width: 280px;
                box-sizing: border-box;
                transition: all 0.3s linear;
                color: #000;
                font-weight: 400;
                -webkit-appearance: none;
            }
    
            input:focus {
                border-bottom: solid 1px #b69de6;
                outline: 0;
                box-shadow: 0 2px 6px -8px rgba(182, 157, 230, 0.45);
            }
    
            .floating-label {
                position: relative;
                margin-bottom: 10px;
                width: 100%;
            }
    
            .floating-label label {
                position: absolute;
                top: calc(50% - 7px);
                left: 0;
                opacity: 0;
                transition: all 0.3s ease;
                padding-left: 44px;
            }
    
            .floating-label input {
                width: calc(100% - 44px);
                margin-left: auto;
                display: flex;
            }
    
            .floating-label .icon {
                position: absolute;
                top: 0;
                left: 0;
                height: 56px;
                width: 44px;
                display: flex;
            }
    
            .floating-label .icon svg {
                height: 30px;
                width: 30px;
                margin: auto;
                opacity: 0.15;
                transition: all 0.3s ease;
            }
    
            .floating-label .icon svg path {
                transition: all 0.3s ease;
            }
    
            .floating-label input:not(:-moz-placeholder-shown) {
                padding: 28px 0px 12px 0px;
            }
    
            .floating-label input:not(:-ms-input-placeholder) {
                padding: 28px 0px 12px 0px;
            }
    
            .floating-label input:not(:placeholder-shown) {
                padding: 28px 0px 12px 0px;
            }
    
            .floating-label input:not(:-moz-placeholder-shown)+label {
                transform: translateY(-10px);
                opacity: 0.7;
            }
    
            .floating-label input:not(:-ms-input-placeholder)+label {
                transform: translateY(-10px);
                opacity: 0.7;
            }
    
            .floating-label input:not(:placeholder-shown)+label {
                transform: translateY(-10px);
                opacity: 0.7;
            }
    
            .floating-label input:valid:not(:-moz-placeholder-shown)+label+.icon svg {
                opacity: 1;
            }
    
            .floating-label input:valid:not(:-ms-input-placeholder)+label+.icon svg {
                opacity: 1;
            }
    
            .floating-label input:valid:not(:placeholder-shown)+label+.icon svg {
                opacity: 1;
            }
    
            .floating-label input:valid:not(:-moz-placeholder-shown)+label+.icon svg path {
                fill: #b69de6;
            }
    
            .floating-label input:valid:not(:-ms-input-placeholder)+label+.icon svg path {
                fill: #b69de6;
            }
    
            .floating-label input:valid:not(:placeholder-shown)+label+.icon svg path {
                fill: #b69de6;
            }
    
            .floating-label input:not(:valid):not(:focus)+label+.icon {
                -webkit-animation-name: shake-shake;
                animation-name: shake-shake;
                -webkit-animation-duration: 0.3s;
                animation-duration: 0.3s;
            }
    
            @-webkit-keyframes shake-shake {
                0% {
                    transform: translateX(-3px);
                }
    
                20% {
                    transform: translateX(3px);
                }
    
                40% {
                    transform: translateX(-3px);
                }
    
                60% {
                    transform: translateX(3px);
                }
    
                80% {
                    transform: translateX(-3px);
                }
    
                100% {
                    transform: translateX(0px);
                }
            }
    
            @keyframes shake-shake {
                0% {
                    transform: translateX(-3px);
                }
    
                20% {
                    transform: translateX(3px);
                }
    
                40% {
                    transform: translateX(-3px);
                }
    
                60% {
                    transform: translateX(3px);
                }
    
                80% {
                    transform: translateX(-3px);
                }
    
                100% {
                    transform: translateX(0px);
                }
            }
    
            .session {
                display: flex;
                flex-direction: row;
                width: auto;
                height: auto;
                margin: auto auto;
                background: #ffffff;
                border-radius: 4px;
                box-shadow: 0px 2px 6px -1px rgba(0, 0, 0, 0.12);
            }
    
            .left {
                width: 219px;
                height: 190px;
                min-height: 100%;
                margin: auto;
                /* position: relative; */
                /* background-image: url(../images/logo.png); */
                background-size: cover;
                border-top-left-radius: 4px;
                border-bottom-left-radius: 4px;
            }
    
            .left img {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 75%;
            }
            .login-submit-button{
                display: flex;
                justify-content: flex-end;
                width: -webkit-fill-available;
                margin-top: 20px;
            }
            .cursor-poitner{
                cursor: pointer;
            }
        </style>
    </div>
{{-- </div> --}}
