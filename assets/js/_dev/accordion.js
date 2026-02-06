var accordions = document.getElementsByClassName("accordion");

function accordionMeasure() {
	var i;

	for (i = 0; i < accordions.length; i++) {
		var headingHeight = accordions[i].querySelector(
			".block-type-heading"
		).offsetHeight;
		var sectionHeight = accordions[i].querySelector(".column").offsetHeight;

		accordions[i].style.setProperty(
			"--offset-height",
			headingHeight + "px"
		);
		accordions[i].style.setProperty(
			"--section-height",
			sectionHeight + "px"
		);
	}
}

function accordionSet() {
	var i;

	accordionMeasure();

	for (i = 0; i < accordions.length; i++) {
		function accordionToggle(i) {
			accordionMeasure();
			i.closest("section").classList.toggle("active");
		}
		accordions[i]
			.querySelector(".block-type-heading")
			.addEventListener("click", (event) => {
				accordionToggle(event.target);
			});
		accordions[i]
			.querySelector(".block-type-heading")
			.addEventListener("keydown", (event) => {
				switch (event.keyCode) {
					case 32:
					case 13:
						event.preventDefault();
						accordionToggle(event.target);
						break;
				}
			});
	}
}

window.addEventListener("load", () => {
	accordionSet();
});
