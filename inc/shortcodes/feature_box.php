<?php
  
// Feature Box
add_shortcode('feature_box_slider', 'venedor_shortcode_featurebox_slider');
add_shortcode('feature_box', 'venedor_shortcode_featurebox');

function venedor_shortcode_featurebox_slider($atts, $content = null) {

    extract(shortcode_atts(array(
        'title' => '',
        'animation_type' => '',
        'animation_duration' => 1,
        'animation_delay' => 0,
        'class' => ''
    ), $atts));

    ob_start();
    ?>
<div class="shortcode feature-slider <?php echo $class ?> <?php if ($animation_type) echo 'animated' ?>"
    <?php if ($animation_type) : ?>
     animation_type="<?php echo $animation_type ?>" animation_duration="<?php echo $animation_duration ?>" animation_delay="<?php echo $animation_delay ?>"
    <?php endif; ?>>
    <div class="product-slider">
    <?php if ($title) : ?>
    <h2 class="entry-title"><?php echo $title ?></h2>
    <?php endif; ?>
    <div class="product-row <?php if (!$title) echo ' notitle' ?> clearfix">
        <div class="product-carousel owl-carousel post-carousel">
            <?php echo do_shortcode($content); ?>
        </div>
    </div>
</div></div>
<?php
    $str = ob_get_contents();
    ob_end_clean();

    return $str;
}

function venedor_shortcode_featurebox($atts, $content = null) {
    
    extract(shortcode_atts(array(
        'size' => 124,
        'image'  => '',
        'image_id' => '',
        'image_bordercolor'  => '',
        'icon' => '',
        'icon_bg' => '',
        'icon_color' => '',
        'icon_bordercolor'  => '',
        'title' => '',
        'link' => '',
        'align' => 'center',
        'border' => 'true',
        'show_bg' => 'false',
        'bg_color' => '',
        'animation_type' => '',
        'animation_duration' => 1,
        'animation_delay' => 0,
        'class' => ''
    ), $atts));

    if (!$image && $image_id)
        $image = wp_get_attachment_url($image_id);

    ob_start();
    ?>
<div class="feature-item">
    <div class="shortcode feature-box <?php if($align) echo 'text-'.$align; ?> <?php echo $class ?><?php if ($border != 'true') echo ' noborder' ?><?php if ($show_bg == 'true') echo ' hover' ?> <?php if ($animation_type) echo 'animated' ?>"
        <?php if ($animation_type) : ?>
         animation_type="<?php echo $animation_type ?>" animation_duration="<?php echo $animation_duration ?>" animation_delay="<?php echo $animation_delay ?>"
        <?php endif; ?>
        style="<?php if ($bg_color) : ?>background-color:<?php echo $bg_color ?>;<?php endif; ?>">
        <?php if ($image || $icon) : ?>
        <div class="feature-image" style="width:<?php echo $size ?>px; height:<?php echo $size ?>px; border-radius:<?php echo $size / 2 ?>px;<?php if ($icon_bg) echo ' background-color:'.$icon_bg.'; '; ?><?php if ($image_bordercolor) echo ' border-color:'.$image_bordercolor.'; '; ?><?php if ($icon_bordercolor) echo ' border-color:'.$icon_bordercolor.'; '; ?>">
            <?php if ($image) : ?>
                <img src="<?php echo $image; ?>" style="width:<?php echo $size - 4 ?>px; height:<?php echo $size - 4 ?>px; border-radius:<?php echo ($size - 4) / 2 ?>px" />
            <?php else : ?>
                <span class="fa fa-<?php echo $icon ?>" style="font-size:<?php echo $size * 0.4 ?>px; line-height:<?php echo $size - 4 ?>px;<?php if ($icon_color) echo 'color:'.$icon_color.';'; ?>"></span>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <div class="feature-content" style="<?php if ($align == 'left') echo 'padding-left:'.($size + 20).'px;'; if ($align == 'right') echo 'padding-right:'.($size + 20).'px;'; ?>">
            <?php if ($link) : ?><a href="<?php echo $link ?>"><?php endif; ?>
            <h4><span><?php echo $title; ?></span><span class="line"></span></h4>
            <?php if ($link) : ?></a><?php endif; ?>
            <p><?php echo do_shortcode($content); ?></p>
        </div>
    </div>
</div>
    <?php
    $str = ob_get_contents();
    ob_end_clean();
    
    return $str;
}

// Register Shortcodes in Visual Composer Editor
if (function_exists('vc_set_as_theme')) {

    function venedor_vc_shortcode_feature_box_slider() {
        $vc_icon = venedor_vc_icon().'feature_box_slider.png';
        $animation_type = venedor_vc_animation_type();
        $animation_duration = venedor_vc_animation_duration();
        $animation_delay = venedor_vc_animation_delay();
        $custom_class = venedor_vc_custom_class();

        vc_map( array(
            "name" => "Feature Box Slider",
            "base" => "feature_box_slider",
            "category" => "Venedor",
            "icon" => $vc_icon,
            'is_container' => true,
            'js_view' => 'VcColumnView',
            "as_parent" => array('only' => 'feature_box'),
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => "Title",
                    "param_name" => "title",
                    "admin_label" => true
                ),
                $animation_type,
                $animation_duration,
                $animation_delay,
                $custom_class
            )
        ) );

        if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
            class WPBakeryShortCode_Feature_Box_Slider extends WPBakeryShortCodesContainer {
            }
        }
    }

    function venedor_vc_shortcode_feature_box() {
        $vc_icon = venedor_vc_icon().'feature_box.png';
        $animation_type = venedor_vc_animation_type();
        $animation_duration = venedor_vc_animation_duration();
        $animation_delay = venedor_vc_animation_delay();
        $custom_class = venedor_vc_custom_class();

        vc_map( array(
            "name" => "Feature Box",
            "base" => "feature_box",
            "category" => "Venedor",
            "icon" => $vc_icon,
            'is_container' => true,
            'js_view' => 'VcColumnView',
            "params" => array(
                array(
                    "type" => "label",
                    "heading" => "Configure with image or icon options",
                    "param_name" => "label"
                ),
                array(
                    "type" => "textfield",
                    "heading" => "Image or Icon Wrapper Size",
                    "param_name" => "size",
                    "value" => "124"
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
                    "heading" => "Image",
                    "param_name" => "image_id",
                    "admin_label" => true
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => "Image Border Color",
                    "param_name" => "image_bordercolor"
                ),
                array(
                    "type" => "fontawesome_icon",
                    "heading" => "FontAwesome Icon Name",
                    "param_name" => "icon",
                    "admin_label" => true
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => "Icon Background Color",
                    "param_name" => "icon_bg"
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => "Icon Color",
                    "param_name" => "icon_color"
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => "Icon Border Color",
                    "param_name" => "icon_bordercolor"
                ),
                array(
                    "type" => "textfield",
                    "heading" => "Title",
                    "param_name" => "title",
                    "admin_label" => true
                ),
                array(
                    "type" => "textfield",
                    "heading" => "Link",
                    "param_name" => "link"
                ),
                array(
                    "type" => "align",
                    "heading" => "Align",
                    "param_name" => "align",
                    "value" => "center"
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => "Background Color",
                    "param_name" => "bg_color",
                    "value" => ""
                ),
                array(
                    "type" => "boolean",
                    "heading" => "Border",
                    "param_name" => "border",
                    "value" => "true"
                ),
                array(
                    "type" => "boolean",
                    "heading" => "Show Background",
                    "param_name" => "show_bg",
                    "value" => "false"
                ),
                $animation_type,
                $animation_duration,
                $animation_delay,
                $custom_class
            )
        ) );

        if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
            class WPBakeryShortCode_Feature_Box extends WPBakeryShortCodesContainer {
            }
        }
    }
}
