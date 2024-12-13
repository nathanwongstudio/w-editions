function accordionSet() {

    // if there is an accordion show the accordion code
    var accordions = document.getElementsByClassName('accordion');
    var i;

    for(i = 0; i < accordions.length; i++) {

        accordions[i].querySelector('.block-type-heading').addEventListener('click', function() {
            this.closest('section').classList.toggle('active');
        });

        var headingHeight = accordions[i].querySelector('.block-type-heading').offsetHeight;
        var sectionHeight = accordions[i].querySelector('.column').offsetHeight;

        accordions[i].style.setProperty('--offset-height', headingHeight + 'px');
        accordions[i].style.setProperty('--section-height', sectionHeight + 'px');
    }
}