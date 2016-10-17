<?php if(!is_user_logged_in()) : ?>
    <form action="#" method="post" id="login">
        <fieldset>
        <p class="status"></p>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Your Username">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Your Password">
            <a href="<?php echo wp_lostpassword_url(); ?>">Forgot Password?</a>
            <button type="submit" name="submit">Submit</button>
            <?php wp_nonce_field('ajax-login-nonce', 'security'); ?>
        </fieldset>
    </form>
<?php else : ?>
    sdsds
<?php endif; ?>