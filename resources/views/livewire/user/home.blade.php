<div class="">
    <section class="banner-section" data-aos="fade-up" data-aos-duration="1000">
        <div class="swiper bannerSlider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="banner-img">
                        <img src="https://swiperjs.com/demos/images/nature-1.jpg" class="img-responsive" />
                    </div>
                    <div class="banner-content">
                        <div class="container">
                            <h2>I'm Not Alone</h2>
                            <p>
                                Join us in our mission to make a difference in the world. Explore our site to learn more
                                about our initiatives and how you can get involved. Together, we
                                can create a brighter future. YOUTH ARE SAFE, STRONG & VALUED
                            </p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="banner-img">
                        <img src="https://swiperjs.com/demos/images/nature-2.jpg" class="img-responsive" />
                    </div>
                    <div class="banner-content">
                        <div class="container">
                            <h2>I'm Not Alone</h2>
                            <p>
                                Join us in our mission to make a difference in the world. Explore our site to learn more
                                about our initiatives and how you can get involved. Together, we
                                can create a brighter future. YOUTH ARE SAFE, STRONG & VALUED
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="what-section section-gapping" >
        <div class="container">
            <h2 class="main-title">WHAT WE DO</h2>
            <div class="what-box">
                <div class="box">
                    <a href="" wire:click.prevent="openModal(1)">
                        <h3>01</h3>
                        <h4>Financial Security</h4>
                        <p> We provide a substantial monthly stipend to ensure families can meet their basic needs and plan
                        for the future.</p>
                    </a>
                </div>
                <div class="box">
                    <a href="" wire:click.prevent="openModal(2)">
                        <h3>02</h3>
                        <h4>Medical Aid</h4>
                        <p>Our membership card acts as a lifeline, offering financial support for medical emergencies and
                            minimizing the burden of healthcare costs.</p>
                    </a>
                </div>
                <div class="box">
                    <a href="" wire:click.prevent="openModal(3)">
                        <h3>03</h3>
                        <h4>Minimizing Expenses</h4>
                        <p>We offer various programs to help families reduce their monthly expenditure on groceries, loans,
                            and electronics.</p>
                    </a>
                </div>
                <div class="box">
                    <a href="" wire:click.prevent="openModal(4)">
                        <h3>04</h3>
                        <h4>Free Electricity</h4>
                        <p> We provide solar or wind panels to significantly reduce or eliminate electricity bills for our
                            members.</p>
                    </a>
                </div>
                <div class="box">
                    <a href="" wire:click.prevent="openModal(5)">
                        <h3>05</h3>
                        <h4>Secure Family</h4>
                        <p> We provide a high-tech security system to enhance safety for our members and their families.</p>
                    </a>
                </div>
                <div class="box">
                    <a href="" wire:click.prevent="openModal(6)">
                        <h3>06</h3>
                        <h4>Employment</h4>
                        <p> Our platform connects employers and job seekers within our member network. We also offer skill
                        development programs to enhance
                        employability.</p>
                    </a>
                </div>
                <div class="box">
                    <a href="" wire:click.prevent="openModal(7)">
                        <h3>07</h3>
                        <h4>Educational Support</h4>
                        <p> Our platform connects employers and job seekers within our member network. We also offer skill
                            development programs to enhance
                        employability.</p>
                    </a>
                </div>
                <div class="box">
                    <a href="" wire:click.prevent="openModal(8)">
                        <h3>08</h3>
                        <h4>Double Your Income</h4>
                        <p> We empower families to become financially independent through skill development programs and
                            income-generating opportunities.</p>
                    </a>
                </div>
                <div class="box">
                    <a href="" wire:click.prevent="openModal(9)">
                        <h3>09</h3>
                        <h4>Fight for You</h4>
                        <p>We advocate for our members’ rights and provide legal assistance when needed.</p>
                    </a>
                </div>
            </div>
            <!-- modal -->
            <div class="modal-overlay {{$modelOpenNo == 1?'active':''}} ">
                <div class="modal {{$modelOpenNo == 1?'active':''}}">

                    <a class="close-modal" wire:click='closeModal'>
                        <svg viewBox="0 0 20 20">
                            <path fill="#000000"
                                d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z">
                            </path>
                        </svg>
                    </a><!-- close modal -->

                    <div class="modal-content">
                        <h3>Financial Security</h3>
                        <p>Upon the death of the head of the family, the NGO provides SIP, SWA of 16,00,000, by which immediate financial aid is provided to the family through tough times. 

                            The family upon the death of the head of the family gets a monthly stipend of approx. Rs 18,000 for their lifetime from the provided SIP SWA of 16,00,000 by the NGO. This regular monthly financial aid helps the member families to lead a safe and secured life with pride.  
                            
                            With this monthly financial assistance the member family can fulfill their fundamental needs and desires without facing any economic hardship.
                            
                            This monthly income will help the member family plan for a better and secure future with ease which includes children's educational expenses, basic needs like food, shelter and clothes, and other financial needs.
                            
                            The financial support provided by the NGO lessens the burden of financial responsibilities and liabilities that may arise after the loss of family head. It allows the family to focus on healing and rebuilding their lives.
                            
                            The handsome monthly returns of approx. 18000 from investment of Rs 16,00,000 by the NGO in favor of the member family serves as a financial cushion for them. It serves as a safety net in case of unexpected circumstances or emergencies.
                            
                            This financial stability provided by the NGO supports families by accomplishing all the basic needs of the senior citizens of the member family. NGO ensure that the senior citizens of the member family lead a peaceful life. 
                            
                            NGO contributes to the overall improvement in the family's quality of life, while safeguarding their emotional and financial well-being.
                            
                            The NGO also ensures that the member family does not suffer after the death of the head of the family.
                        </p>
                    </div><!-- content -->

                </div><!-- modal -->
            </div><!-- overlay -->
            <div class="modal-overlay {{$modelOpenNo == 2?'active':''}} ">
                <div class="modal {{$modelOpenNo == 2?'active':''}}">

                    <a class="close-modal" wire:click='closeModal'>
                        <svg viewBox="0 0 20 20">
                            <path fill="#000000"
                                d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z" >
                            </path>
                        </svg>
                    </a><!-- close modal -->

                    <div class="modal-content">
                        <h3>Medical Aid</h3>
                        <p>
                            Member families get financial aid in times of medical emergencies like hospitalization, surgeries, etc. 

                            The membership I-card issued by the NGO to the member families serves as a blank cheque which can be encashed upon presenting in any hospital across India. 
                            
                            The membership card ensures and ascertains complete financial security in times of medical emergencies leaving the member family with no economic burden. 
                            
                            NGO helps minimize cost for medical aids such as surgeries or operations. This ensures members can go through required medical surgeries without worrying about the cost of emergency medical expenses faced by the member families.
                            
                            Being part of the NGO community the members can rely for any type of support or assistance in times of medical emergencies.
                            
                            By minimizing medical expenses, the NGO helps alleviate the financial burden on member families which prevents them from falling into debt or financial trouble because of any unexpected medical emergencies.                            
                            
                            </p>
                    </div><!-- content -->

                </div><!-- modal -->
            </div><!-- overlay -->
            <div class="modal-overlay {{$modelOpenNo == 3?'active':''}} ">
                <div class="modal {{$modelOpenNo == 3?'active':''}}">

                    <a class="close-modal" wire:click='closeModal'>
                        <svg viewBox="0 0 20 20">
                            <path fill="#000000"
                                d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z" >
                            </path>
                        </svg>
                    </a><!-- close modal -->

                    <div class="modal-content">
                        <h3>Minimizing Expenses</h3>
                        <p>
                            The NGO would also provide all the monthly groceries required by the member families at almost 50% discounted prices.

                            The NGO assists its members to get all types of loans at cheaper interest rates. 

                            The NGO ensures that all members avail all electronic items and vehicles at a much cheaper price through which all the members are benefited financially. 

                            The target of the NGO is to reduce the prevailing expenditure of the member families to half.


                        </p>
                    </div><!-- content -->

                </div><!-- modal -->
            </div><!-- overlay -->
            <div class="modal-overlay {{$modelOpenNo == 4?'active':''}} ">
                <div class="modal {{$modelOpenNo == 4?'active':''}}">

                    <a class="close-modal" wire:click='closeModal'>
                        <svg viewBox="0 0 20 20">
                            <path fill="#000000"
                                d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z" >
                            </path>
                        </svg>
                    </a><!-- close modal -->

                    <div class="modal-content">
                        <h3>Free Electricity</h3>
                        <p>The NGO ensures that the monthly electricity expenses of all member families is reduced by 50-100%

                            Every member family will be provided solar panels, wind panels, etc. ensuring free electricity.
                            
                            The aim of the NGO is to save money for member families on a regular basis. 
                            
                            
                            The shift to free electricity would result in long-term savings for member families ensuring their financial well-being for their future.
                            
                            Free electricity would improve the quality of life for member families, especially those from low-income households, by reducing financial burdens and improving access to essential needs. 
                            </p>
                    </div><!-- content -->

                </div><!-- modal -->
            </div><!-- overlay -->
            <div class="modal-overlay {{$modelOpenNo == 5?'active':''}} ">
                <div class="modal {{$modelOpenNo == 5?'active':''}}">

                    <a class="close-modal" wire:click='closeModal'>
                        <svg viewBox="0 0 20 20">
                            <path fill="#000000"
                                d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z" >
                            </path>
                        </svg>
                    </a><!-- close modal -->

                    <div class="modal-content">
                        <h3>Secure Family</h3>
                        <p>
                            The NGO upon acceptance of membership provides a hi-tech logo for all the vehicles of the member families and by sticking the hi-tech logo on number plates of vehicles of the member families thus ensuring complete 24x7 on road safety and security of each member family. 

                            The hi-tech logo of the NGO on the number plate of the vehicle of members would enable other members to recognise each other on road and would make it easier to stand with each other in times of emergencies and problems while traveling.

                            The hi-tech logo of the NGO on the vehicles of each member would signal to others that this vehicle is under the NGO's protection.

                            The NGO provides hi-tech logo to be installed on the gate of residence, shops and factories of each member families which would keep the unwanted troubles away. 

                            The hi-tech logo of the NGO would work as an identity for its members ensuring safety and security of their family members especially the female members. 

                            The NGO on request will also try to safeguard its members involved in property and financial dealings of any kind ensuring that no member of the NGO is cheated by anybody. 

                            The NGO on request by its member may conduct background checks of potential buyers or sellers or anybody else as the case may be to help the member families.  

                            The NGO on request would also provide legal aid to its members. 

                            The NGO on request would also help its members having issues with government departments ensuring justice to all its members.

                        </p>
                    </div><!-- content -->

                </div><!-- modal -->
            </div><!-- overlay -->
            <div class="modal-overlay {{$modelOpenNo == 6?'active':''}} ">
                <div class="modal {{$modelOpenNo == 6?'active':''}}">

                    <a class="close-modal" wire:click='closeModal'>
                        <svg viewBox="0 0 20 20">
                            <path fill="#000000"
                                d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z" >
                            </path>
                        </svg>
                    </a><!-- close modal -->

                    <div class="modal-content">
                        <h3>Employment</h3>
                        <p>(Skill management and women empowerment, so that the income doubles), (members who are employers and finding for employment can get it from here)

                            The motive of the NGO is that no member remains unemployed.
                            
                            The NGO through its website would facilitate both employees and employers. 
                            
                            The motive of the NGO is that all its members gain a handsome salary. 
                            
                            The NGO would also provide skill management to its members making them compatible in every field.   
                            </p>
                    </div><!-- content -->

                </div><!-- modal -->
            </div><!-- overlay -->
            <div class="modal-overlay {{$modelOpenNo == 7?'active':''}} ">
                <div class="modal {{$modelOpenNo == 7?'active':''}}">

                    <a class="close-modal" wire:click='closeModal'>
                        <svg viewBox="0 0 20 20">
                            <path fill="#000000"
                                d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z" >
                            </path>
                        </svg>
                    </a><!-- close modal -->

                    <div class="modal-content">
                        <h3>Educational Support</h3>
                        <p>
                            The NGO covers the entire tuition/school fees for all children of member families upon death of the head of the family.

                            NGO ensure that education remains accessible without financial burden.

                            The NGO enables them to pursue higher education without worrying about higher costs.

                            The NGO helps enhance children's knowledge and skills at low cost.

                            NGO helps in improving their ability to focus and learn effectively in school.

                            The NGO is committed towards increasing the literacy rate throughout our country. 

                        </p>
                    </div><!-- content -->

                </div><!-- modal -->
            </div><!-- overlay -->
            <div class="modal-overlay {{$modelOpenNo == 8?'active':''}} ">
                <div class="modal {{$modelOpenNo == 8?'active':''}}">

                    <a class="close-modal" wire:click='closeModal'>
                        <svg viewBox="0 0 20 20">
                            <path fill="#000000"
                                d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z" >
                            </path>
                        </svg>
                    </a><!-- close modal -->

                    <div class="modal-content">
                        <h3>Double Your Income</h3>
                        <p>Special training programs and opportunities are provided to member families who want to double their income.
 
                            Specialized workshops and seminars are conducted to impart new skills and knowledge for member families to explore additional income-generating.
                            
                            Training programs are conducted for individuals allowing them to learn and develop new skills without disturbing their current work schedule.
                            
                            Opportunities to increase business for entrepreneurs and businessmen by introducing their products on the NGO website making them available for sale to all other member families across India.
                            
                            The NGO provides a platform to all member families to collaborate with other members through its website for all their needs at the best price available and also make all the information available to member families regarding their requirements. 
                            </p>
                    </div><!-- content -->

                </div><!-- modal -->
            </div><!-- overlay -->
            <div class="modal-overlay {{$modelOpenNo == 9?'active':''}} ">
                <div class="modal {{$modelOpenNo == 9?'active':''}}">

                    <a class="close-modal" wire:click='closeModal'>
                        <svg viewBox="0 0 20 20">
                            <path fill="#000000"
                                d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z" >
                            </path>
                        </svg>
                    </a><!-- close modal -->

                    <div class="modal-content">
                        <h3>Fight for You</h3>
                        <p>
                            The NGO would fight for the rights of each member and ensure that every member of the NGO gets justice. 

                            To avail justice for those members who have been victimized, the NGO offers support in seeking legal remedies 

                            The NGO in particular fights for safety and security for its female members. It offers support of all kinds and ensures safety. 

                            By displaying the NGO’s hi-tech logo on the number plate of their vehicle would ensure safety and security and immediate help and assistance in case of accidents or emergencies on the road.

                            In case of bad debts of its members the NGO would also help to get back their debts. 

                            In case of any member if he/she is aggrieved by any government officer/department the NGO would stand by its member and ensure that the member gets justice. 

                        </p>
                    </div><!-- content -->

                </div><!-- modal -->
            </div><!-- overlay -->
          

            <div class="text-center" wire:click='openModal'>
                <a href="" class="btn">Read More</a>
            </div>
        </div>
    </section>

    <section class="stories-section section-gapping" data-aos="fade-up" data-aos-duration="2000">
        <div class="container">
            <h2 class="main-title">IMPACT STORIES</h2>

            <div class="stories-box">
                <div class="box">
                    <h3>Jane's Been A Migrant Worker Since She Was Just 12</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua ut enim ad minim veniam, quis nostrud
                        exercitation ullamco nisi reprehenderit in voluptate.
                    </p>
                    <a href="" class="btn">read more</a>
                </div>
                <div class="box">
                    <h3>Jane's Been A Migrant Worker Since She Was Just 12</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua ut enim ad minim veniam, quis nostrud
                        exercitation ullamco nisi reprehenderit in voluptate.
                    </p>
                    <a href="" class="btn">read more</a>
                </div>
            </div>
        </div>
    </section>

    <section class="partner-section section-gapping" data-aos="fade-up" data-aos-duration="2500">
        <div class="container">
            <h2 class="main-title">PARTNERS</h2>
            <div class="swiper partnerSlider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="">
                            <img src="{{asset('/images/logo1.webp')}}" alt="" />
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="">
                            <img src="{{asset('/images/logo2.webp')}}" alt="" />
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="">
                            <img src="{{asset('/images/logo3.webp')}}" alt="" />
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="">
                            <img src="{{asset('/images/logo4.webp')}}" alt="" />
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="">
                            <img src="{{asset('/images/logo1.webp')}}" alt="" />
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="">
                            <img src="{{asset('/images/logo2.webp')}}" alt="" />
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="">
                            <img src="{{asset('/images/logo3.webp')}}" alt="" />
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="">
                            <img src="{{asset('/images/logo4.webp')}}" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="donate-section section-gapping yellow-bg" data-aos="fade-up" data-aos-duration="3000">
        <div class="container">
            <h2 class="main-title">Support Us</h2>

            <div class="text-center donate-box">
                <h3>Support Us and Change the Course of a Child's Life Today!</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper
                    mattis, pulvinar dapibus leo.</p>
            </div>
        </div>
    </section>
<style>
 
/**
 * Overlay
 * -- only show for tablet and up
 */
@media only screen and (min-width: 40em) {
  .modal-overlay {
    display: flex;
    align-items: center;
    justify-content: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 5;
    background-color: rgba(0, 0, 0, 0.6);
    opacity: 0;
    visibility: hidden;
    -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
    transition: opacity 0.6s cubic-bezier(0.55, 0, 0.1, 1), visibility 0.6s cubic-bezier(0.55, 0, 0.1, 1);
  }
  .modal-overlay.active {
    opacity: 1;
    visibility: visible;
  }
}
/**
 * Modal
 */
.modal {
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  margin: 0 auto;
  background-color: #fff;
  width: 800px;
  max-width: 75rem;
  min-height: 20rem;
  padding: 1rem;
  border-radius: 3px;
  opacity: 0;
  overflow-y: auto;
  visibility: hidden;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  transform: scale(1.2);
  transition: all 0.6s cubic-bezier(0.55, 0, 0.1, 1);
}
.modal .close-modal {
  position: absolute;
  cursor: pointer;
  top: 0px;
  right: 15px;
  opacity: 0;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  transition: opacity 0.6s cubic-bezier(0.55, 0, 0.1, 1), transform 0.6s cubic-bezier(0.55, 0, 0.1, 1);
  transition-delay: 0.3s;
}
.modal .close-modal svg {
  width: 1.75em;
  height: 1.75em;
}
.modal .modal-content {
  opacity: 0;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  transition: opacity 0.6s cubic-bezier(0.55, 0, 0.1, 1);
  transition-delay: 0.3s;
}
.modal.active {
  visibility: visible;
  opacity: 1;
  transform: scale(1);
}
.modal.active .modal-content {
  opacity: 1;
  height: inherit;
}
.modal.active .close-modal {
  transform: translateY(10px);
  opacity: 1;
}

/**
 * Mobile styling
 */
@media only screen and (max-width: 39.9375em) {
  h1 {
    font-size: 1.5rem;
  }

  .modal {
    position: fixed;
    top: 20%;
    left: 0;
    width: 100%;
    height: 100%;
    -webkit-overflow-scrolling: touch;
    border-radius: 0;
    transform: scale(1.1);
    padding: 20 !important;
  }

  .close-modal {
    right: 20px !important;
  }
  .modal.active {
    /* top: 0 !important; */
  }
}
    </style>
</div>