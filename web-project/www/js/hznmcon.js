// instanciate new modal
/*var modal = new tingle.modal({
	footer: true,
	stickyFooter: false,
	closeMethods: ['overlay', 'button', 'escape'],
	closeLabel: "Close",
	cssClass: ['custom-class-1', 'custom-class-2'],
	onOpen: function () {
		console.log('modal open');
	},
	onClose: function () {
		console.log('modal closed');
	},
	beforeClose: function () {
		// here's goes some logic
		// e.g. save content before closing the modal
		return true; // close the modal
		return false; // nothing happens
	}
});*/

$(function () {

	var collapsed = document.getElementById("collapsed-header");

	// When the user scrolls the page, execute myFunction
	window.onscroll = function () {
		if (window.pageYOffset > 327) {
			collapsed.classList.remove("hidden");
		} else {
			collapsed.classList.add("hidden");
		}
	};

});

