<?php global $specialpile_options; ?>
<!-- Footer Start -->
<div class="footer">
    <div class="container">
        <div class="footer__wrapper">
            <div class="footer__item">
                <a href="<?php echo esc_url(home_url("/")); ?>">
                    <?php if($specialpile_options['footer_logo']){?>
                        <img src="<?php echo esc_url($specialpile_options['footer_logo']['url'])?>" alt="logo" class="footer__logo">
                    <?php }?>
                </a>
                <a href="#" class="footer__privacy-policy fz-12-os">Политика конфиденциальности</a>
            </div>
            <div class="footer__item fz-16-bn">
                <?php if($specialpile_options['navigation_link1']){?>
                    <a href="#characteristics" class="footer__link"><?php echo esc_html($specialpile_options['navigation_link1'])?></a>
                <?php }?>
                <?php if($specialpile_options['navigation_link2']){?>
                    <a href="#form-slider" class="footer__link"><?php echo esc_html($specialpile_options['navigation_link2'])?></a>
                <?php }?>
                <?php if($specialpile_options['navigation_link3']){?>
                    <a href="#advantages" class="footer__link"><?php echo esc_html($specialpile_options['navigation_link3'])?></a>
                <?php }?>
                <?php if($specialpile_options['navigation_link4']){?>
                    <a href="#stages" class="footer__link"><?php echo esc_html($specialpile_options['navigation_link4'])?></a>
                <?php }?>
                <?php if($specialpile_options['navigation_link5']){?>
                    <a href="#info" class="footer__link"><?php echo esc_html($specialpile_options['navigation_link5'])?></a>
                <?php }?>
                <?php if($specialpile_options['navigation_link6']){?>
                    <a href="#examples" class="footer__link"><?php echo esc_html($specialpile_options['navigation_link6'])?></a>
                <?php }?>
                <?php if($specialpile_options['navigation_link7']){?>
                    <a href="#reviews" class="footer__link"><?php echo esc_html($specialpile_options['navigation_link7'])?></a>
                <?php }?>
                <?php if($specialpile_options['navigation_link8']){?>
                    <a href="#questions" class="footer__link"><?php echo esc_html($specialpile_options['navigation_link8'])?></a>
                <?php }?>
                <?php if($specialpile_options['navigation_link9']){?>
                    <a href="#contacts" class="footer__link"><?php echo esc_html($specialpile_options['navigation_link9'])?></a>
                <?php }?>
                    
                    
                    
                    
                    
                    
                    
                    
                
            </div>
            <div class="footer__item sm-w">
                <a href="#" class="footer__privacy-policy fz-12-os ">Политика конфиденциальности</a>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
