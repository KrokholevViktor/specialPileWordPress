<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package specialpile
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php global $specialpile_options;  ?>

<div class="header">
    <div class="header__wrapper container">
        <a href="<?php echo esc_url(home_url("/")); ?>">
            <?php if ($specialpile_options['header_logo']){?>
                <img src="<?php echo esc_url($specialpile_options['header_logo']['url']);?>" alt="logo" class="header__logo">
            <?php } ?>
        </a>
        <div class="header__info">
            <div class="header__info_e_p"> 
                <?php if ($specialpile_options['email']){?>
                    <a class="header__info_email fz-16-bn" href="#"><?php echo esc_html($specialpile_options['email']);?></a>
                <?php } ?>
                <?php if ($specialpile_options['phone']){?>
                    <a href="tel:+73952788645"><div class="header__info_phone fz-16-bn"><?php echo esc_html($specialpile_options['phone']);?></div></a>
                <?php } ?>
            </div>
            <?php if ($specialpile_options['button']){?>
                <button class="button modal-btn"><?php echo esc_html($specialpile_options['button']);?></button>
            <?php } ?>
            <button class="burger">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </button>
        </div>
    </div>
    <div class="header__devider container"></div>
    <div class="header__menu fz-16-bn container">
        <?php if($specialpile_options['navigation_link1']){?>
            <a href="#characteristics" class="header_link"><?php echo esc_html($specialpile_options['navigation_link1'])?></a>
        <?php }?>
        <?php if($specialpile_options['navigation_link2']){?>
            <a href="#form-slider" class="header_link"><?php echo esc_html($specialpile_options['navigation_link2'])?></a>
        <?php }?>
        <?php if($specialpile_options['navigation_link3']){?>
            <a href="#advantages" class="header_link"><?php echo esc_html($specialpile_options['navigation_link3'])?></a>
        <?php }?>
        <?php if($specialpile_options['navigation_link4']){?>
            <a href="#stages" class="header_link"><?php echo esc_html($specialpile_options['navigation_link4'])?></a>
        <?php }?>
        <?php if($specialpile_options['navigation_link5']){?>
            <a href="#info" class="header_link"><?php echo esc_html($specialpile_options['navigation_link5'])?></a>
        <?php }?>
        <?php if($specialpile_options['navigation_link6']){?>
            <a href="#examples" class="header_link"><?php echo esc_html($specialpile_options['navigation_link6'])?></a>
        <?php }?>
        <?php if($specialpile_options['navigation_link7']){?>
            <a href="#reviews" class="header_link"><?php echo esc_html($specialpile_options['navigation_link7'])?></a>
        <?php }?>
        <?php if($specialpile_options['navigation_link8']){?>
            <a href="#questions" class="header_link"><?php echo esc_html($specialpile_options['navigation_link8'])?></a>
        <?php }?>
        <?php if($specialpile_options['navigation_link9']){?>
            <a href="#contacts" class="header_link"><?php echo esc_html($specialpile_options['navigation_link9'])?></a>
        <?php }?>
    </div>
    <div class="header__menu_burger--scroll">
        <div class="header__menu header__menu_burger fz-16-bn">
            <div class="header__menu__links--grid">
                <?php if($specialpile_options['navigation_link1']){?>
                <a href="#characteristics" class="header_link"><?php echo esc_html($specialpile_options['navigation_link1'])?></a>
                <?php }?>
                <?php if($specialpile_options['navigation_link2']){?>
                    <a href="#form-slider" class="header_link"><?php echo esc_html($specialpile_options['navigation_link2'])?></a>
                <?php }?>
                <?php if($specialpile_options['navigation_link3']){?>
                    <a href="#advantages" class="header_link"><?php echo esc_html($specialpile_options['navigation_link3'])?></a>
                <?php }?>
                <?php if($specialpile_options['navigation_link4']){?>
                    <a href="#stages" class="header_link"><?php echo esc_html($specialpile_options['navigation_link4'])?></a>
                <?php }?>
                <?php if($specialpile_options['navigation_link5']){?>
                    <a href="#info" class="header_link"><?php echo esc_html($specialpile_options['navigation_link5'])?></a>
                <?php }?>
                <?php if($specialpile_options['navigation_link6']){?>
                    <a href="#examples" class="header_link"><?php echo esc_html($specialpile_options['navigation_link6'])?></a>
                <?php }?>
                <?php if($specialpile_options['navigation_link7']){?>
                    <a href="#reviews" class="header_link"><?php echo esc_html($specialpile_options['navigation_link7'])?></a>
                <?php }?>
                <?php if($specialpile_options['navigation_link8']){?>
                    <a href="#questions" class="header_link"><?php echo esc_html($specialpile_options['navigation_link8'])?></a>
                <?php }?>
                <?php if($specialpile_options['navigation_link9']){?>
                    <a href="#contacts" class="header_link"><?php echo esc_html($specialpile_options['navigation_link9'])?></a>
                <?php }?>
            </div>
            <div class="header__info_e_p"> 
                <?php if ($specialpile_options['email']){?>
                    <a class="header__info_email fz-16-bn" href="#"><?php echo esc_html($specialpile_options['email']);?></a>
                <?php } ?>
                <?php if ($specialpile_options['phone']){?>
                    <a href="tel:+73952788645"><div class="header__info_phone fz-16-bn"><?php echo esc_html($specialpile_options['phone']);?></div></a>
                <?php } ?>
            </div>
            <?php if ($specialpile_options['button']){?>
                <button class="button modal-btn"><?php echo esc_html($specialpile_options['button']);?></button>
            <?php } ?>
        </div>
    </div>  
</div>