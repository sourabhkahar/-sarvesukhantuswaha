<div class="session">
    <div class="left">
        <img src="../images/logo.png">
    </div>
    <div class="container">
        <a href="https://www.instagram.com/sarvesukhantuswaha?igsh=d3NyY3lidGh6YnY0" target="_blank">
            
                <button class="social-icon">
                    <img src="../images/instagram.svg" alt=""> <span>Instagram</span>
                </button>
        </a><br><br>
        <a href="https://www.frontendmentor.io/profile/Creative-Pixel-Studios" target="_blank">
                <button class="social-icon">
                    <img src="../images/youtube.svg" alt=""> <span> You Tube </span>
                </button>
        </a>
        <br><br>
        <a href="https://www.pinterest.com/timothybayode76/" target="_blank">
                <button class="social-icon">
                    <img src="../images/twitterx.svg" alt="">
                    <span>Twitter</span>
                </button>
        </a><br><br>
        <a href="https://x.com/TemmyBlog?s=09" target="_blank">
                <button class="social-icon"> 
                    <img src="../images/facebook.svg" alt="">
                    <span>Facebook</span>
                </button>
        </a>
        <br><br>
    </div>

    <style>
        .social-icon{
            display: flex;
            align-items: center;
        }
        .social-icon img {
            width: 50px;
            margin: 20px;
        }
        .container{
            margin: 5px
        }
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
            flex-direction: column;
            align-items: center;
            width: 500px;
            height: auto;
            margin: auto auto;
            background: #ffffff;
            border-radius: 4px;
            /* box-shadow: 0px 2px 6px -1px rgba(0, 0, 0, 0.12); */
        }

        .left {
            width: 219px;
            height: 190px;
            min-height: 100%;
            margin: 5px;
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
