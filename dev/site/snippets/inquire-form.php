<div class="inquire-form overlay" id="inquire-form">
    <div class="modal-header">
        <h2>
            Artwork Inquiry
        </h2>

        <button class="close modal-close" id="close-inquire"></button>

    </div>
    <div class="inquire-wrapper modal-body">

        <div class="modal-body-wrapper">
            <form action="<?php echo $page->url() ?>" method="POST">
                <div class="card">
                    <div class="card-image mobile-only">
                        <?= snippet('images', ['src' => $page->primaryImg()->toFile()]); ?>
                    </div>
                    <div class="card-info">
                        <p><strong><em><?= $page->title() ?></em> <?= $page->year()->isNotEmpty() ? '(' . $page->year() . ')' : '' ?></em></strong>
                        <p><?= $artists ?>
                        <p><?= $page->artId() ?>
                        <p>$<?= $page->price() ?>
                    </div>
                </div>
                <label for="name">Name <abbr title="required">*</abbr></label>
                <input name="name" type="text" placeholder="Johannes Gutenberg">

                <label for="email">Email Address <abbr title="required">*</abbr></label>
                <input name="email" type="email" placeholder="johannes@example.com">

                <label for="message">Message <abbr title="required">*</abbr></label>
                <textarea name="message"></textarea>

                <?php echo csrf_field(); ?>
                <?php echo honeypot_field(); ?>

                <input type="hidden" name="artId" value="<?= $page->artId() ?>">
                <input type="hidden" name="title" value="<?= $page->title() ?>">
                <input type="hidden" name="artist" value="<?= $artists ?>">
                <input type="hidden" name="currentPrice" value="<?= $page->price() ?>">

                <button class="go" type="submit" id="submit">Submit</button>

                <fieldset class="turnstile">
                    <label for="turnstile">Are you a human?</label>
                    <?= turnstileField() ?></fieldset>
            </form>
            <div id="message" class="alert"></div>
        </div>
    </div>

</div>

<script>
    var close = document.getElementById('close-inquire'),
        body = document.body,
        open = document.getElementsByClassName('inquire');
    
    for (let i = 0; i < open.length; i++) {
        open[i].addEventListener('click', function() {
            body.classList.toggle('inquire-active');
            document.documentElement.classList.remove('snipcart-cart--opened');
        });
    }

    close.addEventListener('click', function() {
        body.classList.toggle('inquire-active');
        document.documentElement.classList.remove('snipcart-cart--opened');
    });

    window.addEventListener('load', function() {
        var form = document.querySelector('form');
        var message = document.getElementById('message');
        var fields = {};
        form.querySelectorAll('[name]').forEach(function(field) {
            fields[field.name] = field;
        });

        // Displays all error messages and adds 'error' classes to the form fields with
        // failed validation.
        var handleError = function(response) {
            var errors = [];
            for (var key in response) {
                if (!response.hasOwnProperty(key)) continue;
                if (fields.hasOwnProperty(key)) fields[key].classList.add('error');
                Array.prototype.push.apply(errors, response[key]);
            }
            message.classList.add('error');
            message.innerHTML = errors.join('<br>');
        }

        var onload = function(e) {
            if (e.target.status === 200) {
                message.classList.add('success');
                message.innerHTML = 'Your inquiry was submitted.'
                document.querySelector('.modal-body-wrapper').removeChild(form);
                form.classList.add('submitted');
                document.getElementById('submit').disabled = true;
            } else {
                handleError(JSON.parse(e.target.response));
                for (var key in fields) {
                    fields[key].disabled = false;
                }
            }
        };

        var submit = function(e) {
            e.preventDefault();
            var request = new XMLHttpRequest();
            request.open('POST', e.target.action);
            request.onload = onload;
            request.send(new FormData(e.target));
            // Remove all 'error' classes of a possible previously failed validation.
            for (var key in fields) {
                if (!fields.hasOwnProperty(key)) continue;
                fields[key].classList.remove('error');
                fields[key].disabled = true;
            }
            message.classList.remove('error');
        };
        form.addEventListener('submit', submit);
    });
</script>