<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="wrap">
    <div class="testimonial-setting">
        <h1><?php esc_html_e('All Widget Shortcodes', 'stars-testimonials'); ?><a href='<?php echo PRO_PLUGIN_URL ?>' target="_blank" class='upgrade-block-button open-popup'><?php esc_html_e("Upgrade to Pro", 'stars-testimonials') ?></a> <?php if(count($results)!=0) { ?> <a href="<?php echo site_url("wp-admin/edit.php?post_type=stars_testimonial&page=all-shortcodes&task=add-new") ?>" class="button pull-right add-new-shortcode"><?php esc_html_e("New Widget Shortcode", 'stars-testimonials') ?> </a> <?php } ?></h1>
        <div class="clearfix"></div>
    </div>
    <div class="no-testimonial-box">
        <p><?php esc_html_e('In order to create your first widget shortcode, please make sure you’ve created at least one testimonial that will be shown in the widget', 'stars-testimonials'); ?></p>
        <div class="no-testimonial-record"><a class="link add-testimonial-record" href="<?php echo admin_url("/") ?>post-new.php?post_type=stars_testimonial"><?php esc_html_e('Create Your First Testimonial', 'stars-testimonials'); ?></a></div>
        <?php echo $this->iframeCode; ?>
    </div>
</div>