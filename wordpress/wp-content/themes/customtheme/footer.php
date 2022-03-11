<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
<footer>
    <div class="container" style="margin-left: 0px;margin-right: 0px;">
        <div class="row">
            <div id="footer-section-gauche" class="col-4" style="margin-top: 0px;margin-bottom: 0px;margin-right: 0px;padding-left: 75px;padding-top: 35px;">
                <div class="row">
                    <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/logo.svg" style="width: 100px;"></a>
                </div>
                <div class="row" style="margin-top: 35px;">
                    <strong style="font-size: 17px;">Contact</strong>
                </div> 
                <div class="row">
                    <p style="margin-top: 0px;margin-bottom: 0px;">+33.6.71.66.24.26</p>
                </div> 
                <div class="row">
                    <p style="margin-top: 0px;margin-bottom: 0px;">mail@wiredbeauty.com</p>
                </div>
                <div class="row">
                    <p style="margin-top: 0px;margin-bottom: 0px;">Champ de mars, 5 Av. Anatole France,</p>
                </div>
                <div class="row">
                    <p style="margin-top: 0px;margin-bottom: 0px;">75007 Paris</p>
                </div>
                <div class="row" style="margin-top: 50px;">
                    <a href="#" style="letter-spacing: 3px;text-decoration: none;color: white;background-color: black;padding-top: 12px;padding-bottom: 12px;padding-right: 20px;padding-left: 20px;">BOOK A DEMO</a>
                </div>
            </div>
            <div id="footer-section-droite" class="col-8" style="border-left: 1px solid black;margin-left: -130px;margin-right: 0px;margin-bottom: 0px;margin-top: 0px;padding-top: 35px;padding-left: 75px;">
                <div class="container" style="margin-left: 0px;margin-right: 0px;">
                    <div id="footer-sous-section-gauche" class="col-4" style="margin-top: 6rem;margin-bottom: 6rem">
                        <div class="row" style="margin-bottom: 25px;">
                            <strong style="font-size: 17px;">Quick Access</strong>
                        </div>
                        <div class="row" style="margin-bottom: 14px;">
                            <a href="#">HOME</a>
                        </div>
                        <div class="row" style="margin-bottom: 14px;">
                            <a href="#">WHAT WE DO</a>
                        </div>
                        <div class="row" style="margin-bottom: 14px;">
                            <a href="#">OUR DEVICE & APP</a>
                        </div>
                        <div class="row" style="margin-bottom: 14px;">
                            <a href="#">WHO WE ARE</a>
                        </div>
                        <div class="row" style="margin-bottom: 14px;">
                            <a href="#">SCIENTIFIC VALIDATION</a>
                        </div>
                        <div class="row">
                            <a href="#">STUDIES & SERVICES</a>
                        </div>
                    </div>
                    <div id="footer-sous-section-milieu" class="col-4" style="margin-top: 6rem;">
                        <div class="row" style="margin-bottom: 25px;">
                            <strong style="font-size: 17px;">Social</strong>
                        </div>
                        <div class="row" style="margin-bottom: 14px;">
                            <a href="#">INSTAGRAM</a>
                        </div>
                        <div class="row" style="margin-bottom: 14px;">
                            <a href="#">FACEBOOK</a>
                        </div>
                        <div class="row" style="margin-bottom: 14px;">
                            <a href="#">LINKEDIN</a>
                        </div>
                    </div>
                    <div id="footer-sous-section-droite" class="col-4" style="margin-top: 6rem;">
                        <div class="row" style="margin-bottom: 25px;">
                            <strong>Newsletter</strong>
                        </div>
                        <input type="email" id="input-mail" name="input-mail" placeholder="aaaa@bbb.cc">

                        <p style="margin-top: 0px;margin-bottom: 0px;">
                            Winder Beauty may keep me informed with
                        </p>
                        <p style="margin-top: 0px;margin-bottom: 0px;">
                            personalized emails about products and services. See
                        </p>
                        <p style="margin-top: 0px;margin-bottom: 0px;">
                            our Privacy Policy for more details.
                        </p>
                        <p style="margin-top: 40px;margin-bottom: 0px;">© Copyright Wired Beauty, 2022</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>

    <script src="<?php echo get_template_directory_uri();?>/assets/js/index.js"></script>

	</body>
</html>
