<div class="inquire-form" id="inquire-form">

<div class="inquire-wrapper">

    <h2>Artwork Inquiry</h2>
    <span class="close" id="close-inquire"></span>


    <?php if($success): ?>
        
        <div class="alert success">
            <p><?= $success ?></p>
        </div>

    <?php else: ?>
            <?php if (isset($alert['error'])): ?>
                <div class="alert error">
                    <p>
                        <?= $alert['error'] ?>
                    </p>
                </div>
            <?php endif ?>
        
        <form method="post" action="<?= $page->url() ?>">

            <div class="web-honey">
                <label for="website">Website <abbr title="required">*</abbr></label>
                <input type="url" id="website" name="website" tabindex="-1">
            </div>
            <div class="field">
                <label for="name">Name <abbr title="required">*</abbr></label>
                <input type="text" required name="name" id="name" placeholder="Name">
                <?= isset($alert['name']) ? '<span class="alert error">' . esc($alert['name']) . '</span>' : '' ?>
            </div>

            <div class="field">
                <label for="email">E-mail Address <abbr title="required">*</abbr></label>
                <input type="email" required name="email" id="inquire-email" placeholder="E-mail Address">
                <?= isset($alert['email']) ? '<span class="alert error">' . esc($alert['email']) . '</span>' : '' ?>
            </div>

            <div class="field">
                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" id="phone" placeholder="Phone Number">
            </div>
            
            <div class="field">
                <label for="text">Message <abbr title="required">*</abbr></label>
                <textarea name="text" id="text" cols="30" rows="10" require>Hello,
I'd like to purchase "<?= $page->title() ?>" (<?= $page->artId() ?>).</textarea>
                <?= isset($alert['text']) ? '<span class="alert error">' . esc($alert['text']) . '</span>' : '' ?>
            </div>

            <input type="submit" name="submit" value="Submit">
        </form>
    <?php endif; ?>

</div>

</div>

<script>
    var close = document.getElementById('close-inquire'),
        body = document.getElementsByTagName('body')[0],
        open = document.getElementById('inquire');
    
    close.addEventListener('click', function() {
        body.classList.toggle('inquire-active');
    });
    open.addEventListener('click', function() {
        body.classList.toggle('inquire-active')
    });

</script>