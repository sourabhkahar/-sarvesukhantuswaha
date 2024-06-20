var toggleMenu = () => {
	const menus = document.querySelector(".main-menu");
	menus.classList.toggle("open-menus");
};

// AOS Animation
if (window["AOS"]) {
	window["AOS"].init({
		once: true,
	});
}


document.addEventListener('livewire:init', () => {
	Livewire.on('refresh', (event) => {
		  var swiper1 = new Swiper(".bannerSlider", {
			  loop: true,
			  spaceBetween: 10,
			  centeredSlides: true,
			  autoplay: {
				  delay: 2500,
				  disableOnInteraction: false,
			  },
		  });
  
		  var swiper2 = new Swiper(".partnerSlider", {
			  loop: true,
			  slidesPerView: 2,
			  spaceBetween: 10,
			  centeredSlides: true,
			  autoplay: {
				  delay: 2500,
				  disableOnInteraction: false,
			  },
			  breakpoints: {
				  768: {
					  slidesPerView: 4,
					  spaceBetween: 40,
				  },
				  1024: {
					  slidesPerView: 5,
					  spaceBetween: 50,
				  },
			  },
		  });

	})
	
})
