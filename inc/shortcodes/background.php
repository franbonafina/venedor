<?php
  
// Background
add_shortcode('background', 'venedor_shortcode_background');
function venedor_shortcode_background($atts, $content = null) {
    
    extract(shortcode_atts(array(
        'bg_color' => '',
        'image' => '',
        'image_id' => '',
        'padding' => '30px',
        'parallax' => 0,
        'animation_type' => '',
        'animation_duration' => 1,
        'animation_delay' => 0,
        'class' => ''
    ), $atts));

    if (!$image && $image_id)
        $image = wp_get_attachment_url($image_id);
    
    ob_start();
    ?>
    <div class="shortcode shortcode-bg <?php echo $class ?> <?php if ($animation_type) echo 'animated' ?>"
        <?php if ($animation_type) : ?>
        animation_type="<?php echo $animation_type ?>" animation_duration="<?php echo $animation_duration ?>" animation_delay="<?php echo $animation_delay ?>"
        <?php endif; ?>
         style="padding:<?php echo $padding; ?>;<?php if ($bg_color) : ?>background-color:<?php echo $bg_color ?>;<?php endif; ?>">
        <?php if ($image) : ?>
        <div class="bg-image sw-parallax" data-velocity="<?php echo $parallax ?>" style="background-image:url(<?php echo $image ?>); "></div>
        <?php endif; ?>
        <div class="bg-content">
        <?php echo do_shortcode($content) ?>
        </div>
    </div>
    <?php
    $str = ob_get_contents();
    ob_end_clean();
    
    return $str;
}

// Register Shortcodes in Visual Composer Editor
if (function_exists('vc_set_as_theme')) {

    function venedor_vc_shortcode_background() {
        $vc_icon = venedor_vc_icon().'background.png';
        $animation_type = venedor_vc_animation_type();
        $animation_duration = venedor_vc_animation_duration();
        $animation_delay = venedor_vc_animation_delay();
        $custom_class = venedor_vc_custom_class();

        vc_map( array(
            "name" => "Background",
            "base" => "background",
            "category" => "Venedor",
            "icon" => $vc_icon,
            'is_container' => true,
            'js_view' => 'VcColumnView',
            "params" => array(
                array(
                    "type" => "colorpicker",
                    "heading" => "Background Color",
                    "param_name" => "bg_color"
                ),
                array(
                    "type" => "label",
                    "heading" => "Input Image URL or Select Image.",
                    "param_name" => "label"
                ),
                array(
                    "type" => "textfield",
                    "heading" => "Image URL",
                    "param_name" => "image",
                    "admin_label" => true
                ),
                array(
                    "type" => "attach_image",
                    "heading" => "Background Image",
                    "param_name" => "image_id",
                    "admin_label" => true
                ),
                array(
                    "type" => "textfield",
                    "heading" => "Padding",
                    "param_name" => "padding",
                    "value" => "30px"
                ),
                array(
                    "type" => "textfield",
                    "heading" => "Parallax",
                    "param_name" => "parallax",
                    "value" => "0",
                    "description" => "numerical value",
                    "admin_label" => true
                ),
                $animation_type,
                $animation_duration,
                $animation_delay,
                $custom_class
            )
        ) );

        if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
            class WPBakeryShortCode_Background extends WPBakeryShortCodesContainer {
            }
        }
    }
}
