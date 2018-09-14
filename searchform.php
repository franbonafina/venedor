<?php
global $venedor_settings;
?>
<form class="searchform" action="<?php echo home_url(); ?>/" method="get">
    <fieldset>
        <span class="text"><input name="s" id="s" type="text" value="" placeholder="<?php echo __('Search here', 'venedor'); ?>" autocomplete="off" /></span>
        <span class="button-wrap"><button class="btn btn-special" title="Search" type="submit"><span class="fa fa-search"></span></button></span>
        <?php if (isset($venedor_settings['search-type']) && ($venedor_settings['search-type'] === 'post' || $venedor_settings['search-type'] === 'product')) : ?>
        <input type="hidden" name="post_type" value="<?php echo $venedor_settings['search-type'] ?>"/>
        <?php endif; ?>
    </fieldset>
</form>