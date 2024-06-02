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
