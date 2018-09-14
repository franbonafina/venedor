<?php

if (get_option('venedor_init_theme', '0') == '1') {

    add_action('redux/options/venedor_design/saved', 'venedor_save_design');

    function venedor_save_design() {

        global $wp_filesystem;
        if ( ! $wp_filesystem ) {
            require_once (ABSPATH . '/wp-admin/includes/file.php');
            //check the file system
            $url = 'admin.php?page=venedor_design';
            if ( false === ($credentials = request_filesystem_credentials($url)) ) {
                return;
            }

            if ( ! WP_Filesystem($credentials) ) {
                return;
            }
        }
        $template_dir = $wp_filesystem->wp_themes_dir().'venedor/';

        ob_start();
        require_once 'config_admin.php';
        $_config_css = ob_get_clean();

        $filename = $template_dir.'_config/system_admin_'.get_current_blog_id().'.css';

        if ( ! $wp_filesystem->put_contents( $filename, $_config_css, FS_CHMOD_FILE) ) {
            echo 'error saving file!';
        }

        ob_start();
        require_once 'config.php';
        $_config_css = ob_get_clean();

        $filename = $template_dir.'_config/system_'.get_current_blog_id().'.css';

        if ( ! $wp_filesystem->put_contents( $filename, $_config_css, FS_CHMOD_FILE) ) {
            echo 'error saving file!';
        }

    }
}

?>