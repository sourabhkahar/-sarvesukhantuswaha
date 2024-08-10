<body style="font-family: 'Poppins', Arial, sans-serif">
    <head>
        <style>
            @media screen and (max-width: 600px) {
              .content {
                  width: 100% !important;
                  display: block !important;
                  padding: 10px !important;
              }
              .header, .body, .footer {
                  padding: 20px !important;
              }
            }
          </style>
    </head>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center" style="padding: 20px;">
                <table class="content" width="600" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border: 1px solid #cccccc;">
                    <!-- Header -->
                    <tr>
                        <td class="header" style="background-color: #ffea3d; padding: 40px; text-align: center; color: black; font-size: 24px;">
                           <img src="{{asset('/images/logo.jpeg')}}"> Sarve Sukhantu Swaha
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td class="body" style="padding: 40px; text-align: left; font-size: 16px; line-height: 1.6;">
                        New Member Register <br>
                        Following are basic details of new member:
                        <br><br>
                           Name : {{$userDetails['name']}}<br>          
                           Email : {{$userDetails['email']}} <br>          
                           Phone : {{$userDetails['phone']}} <br>          
                           Address : {{$userDetails['address']}} <br>          
                           City : {{$userDetails['city']}} <br>          
                           State : {{$userDetails['state']}} <br>          
                           Zip : {{$userDetails['zip']}} <br>          
                        </td>
                    </tr>

                    <!-- Call to action Button -->
                    <tr>
                        <td style="padding: 0px 40px 0px 40px; text-align: center;">
                            <!-- CTA Button -->
                            <table cellspacing="0" cellpadding="0" style="margin: auto;">
                                <tr>
                                    <td align="center" style="background-color: #ffea3d; padding: 10px 20px; border-radius: 5px;">
                                        <a href="{{env('APP_ENV')}}/admin" target="_blank" style="color: black; text-decoration: none; font-weight: bold;">For more Information login to admin panel</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    {{-- <tr>
                        <td class="body" style="padding: 40px; text-align: left; font-size: 16px; line-height: 1.6;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam corporis sint eum nemo animi velit exercitationem impedit.             
                        </td>
                    </tr> --}}
                    <!-- Footer -->
                    <tr>
                        <td class="footer" style="background-color: #ffea3d; padding: 40px; text-align: center; color: black; font-size: 14px;">
                        Copyright © 2024 sarvesukhantuswaha.org
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
