<div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md dark:bg-gray-800 sm:rounded-lg" style="
    background: #f3f2f2;
">
    <div class="session">
        <div class="left">
            <img src="../images/logo.png">
        </div>
        <div class="container">
            @if(isset($headerFooter['link1']))
            <a href="{{$headerFooter['link1']}}" target="_blank" class="social-icon">
                <img src="../images/instagram.svg" alt=""> <span>Instagram</span>
            </a><br>
            @endif
            @if(isset($headerFooter['link2']))
            <a href="{{$headerFooter['link2']}}" target="_blank" class="social-icon">
                <img src="../images/youtube.svg" alt=""> <span> You Tube </span>
            </a>
            <br>
            @endif
            @if(isset($headerFooter['link3']))
            <a href="{{$headerFooter['link3']}}" target="_blank" class="social-icon">
                <img src="../images/twitterx.svg" alt="">
                <span>Twitter</span>
            </a><br>
            @endif
            @if(isset($headerFooter['link4']))
            <a href="{{$headerFooter['link4']}}" target="_blank" class="social-icon">
                <img src="../images/facebook.svg" alt="">
                <span>Facebook</span>
            </a>
            @endif
        </div>

        <style>
            .social-icon img {
                width: 30px;
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

            .social-icon {
                -webkit-appearance: none;
                width: auto;
                min-width: 100px;
                border-radius: 24px;
                text-align: center;
                padding: 15px 40px;
                margin-top: 5px;
                background-color: #ffea3d;
                color: #000;
                text-decoration: none;
                font-size: 14px;
                margin-left: auto;
                font-weight: 500;
                box-shadow: 0px 2px 6px -1px rgba(0, 0, 0, 0.13);
                border: none;
                transition: all 0.3s ease;
                outline: 0;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .social-icon:hover {
                transform: translateY(-3px);
                box-shadow: 0 2px 6px -1px rgba(182, 157, 230, 0.65);
            }

            .social-icon:hover:active {
                transform: scale(0.99);
            }


            .session {
                display: flex;
                flex-direction: column;
                align-items: center;
                width: 100%;
                max-width: 500px;
                min-height: 100vh;
                height: auto;
                margin: auto auto;
                background: #ffffff;
                border-radius: 4px;
                
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
        </style>
    </div>
</div>
