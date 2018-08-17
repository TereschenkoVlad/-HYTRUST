<?php
/**
 * Created by PhpStorm.
 * User: vladt
 * Date: 09.08.2018
 * Time: 14:38
 */ ?>



    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <form id="contact" action="/wp-content/themes/Chefeedback/template-parts/email.php" method="post">
                <h3>Contact us</h3>
                <div id="fields">
                    <p><label for="author">First name:</label><input type="text" name="name" id="author" placeholder="" required></p>
                    <p><label for="email">Email:</label><input type="email" name="email" id="email" placeholder="" required></p>
                    <p><label for="url">Subject massage</label><input type="text" name="sub" id="url" placeholder="" required></p>
                    <p><textarea name="message" cols="1" rows="6" id="comment" style="width:70%" placeholder="Enter your massage" required></textarea></p>
                    <p><button type="submit" id="submit" class="go">Submit</button></p>
                </div>
            </form>

        </main><!-- #main -->
    </div><!-- #primary -->


