<script>
    var gallery = document.getElementsByClassName('open-gallery-toggle'),
        overlay = document.getElementById('gallery-overlay'),
        overlayBody = overlay.getElementsByClassName('modal-body')[0],
        close = overlay.getElementsByClassName('modal-close')[0],
        images,
        nextButton = overlay.getElementsByClassName('right')[0],
        prevButton = overlay.getElementsByClassName('left')[0],
        i;

    let x = 0;

    for (var checkbox of gallery) {
        checkbox.addEventListener('change', (e) => {
            var box = e.target;
            if (overlay.dataset.block != box.dataset.block) {
                x = 0;
                console.log(x);
            }
            if (box.checked == 1) {
                overlay.classList.toggle('modal-opened');
                images = box.parentElement.getElementsByTagName('figure');
                overlay.dataset.block = box.dataset.block;

                LoadSlider(x);
            }
        })
    };

    close.onclick = function() {
        i = overlay.dataset.block;
        document.querySelectorAll('input[data-block="' + i + '"]')[0].checked = false;
        overlay.classList.toggle('modal-opened');
    }

    nextButton.onclick = function() {
        if (x < images.length - 1) {
            x++;
            LoadSlider(x);
        } else {
            return false;
        }
    }

    prevButton.onclick = function() {
        if (x > 0) {
            x--;
            LoadSlider(x);
        } else {
            return false;
        }
    }

    // GALLERY SETUP
    const LoadSlider = function(a) {
        var image = images[a].cloneNode(true);
        overlayBody.replaceChildren(image);
        overlayBody.childNodes[0].classList.remove('is-loading');
    }
</script>