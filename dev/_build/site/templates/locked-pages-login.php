<?= snippet('header') ?>
<div class="default-content">
    <form method="post">
    <section>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" value="<?= esc(get('password', '')) ?>">

        <?php if ($error): ?>
        <p class="help is-danger"><?= $error ?></p>
        <?php endif ?>
    </section>

    <input type="hidden" name="csrf" value="<?= csrf() ?>">

    <section>
        <button type="submit">Unlock</button>
    </section>
    </form>

</div>
<?= snippet('footer') ?>