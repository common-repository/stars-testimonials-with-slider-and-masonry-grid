<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="figure st-style12">
  <img width="440" height="320" class="attachment-full size-full wp-post-image" src="<?php echo plugins_url( '../../images/admin/user-'.$j.'.jpg', __FILE__ ) ?>" alt="<?php esc_html_e('User '.$j, 'stars-testimonials'); ?>"/>
  <div class="figcaption st-testimonial-bg">
    <h3 class="st-testimonial-title"><?php echo esc_attr($clientArray[$j-1]); ?></h3>
    <h5 class="st-testimonial-company"><?php echo esc_attr($companyArray[$j-1]); ?></h5>
    <div class="blockquote st-testimonial-content st-testimonial-bg">
      <p><?php esc_html_e("Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", 'stars-testimonials') ?></p>
      <span class="cp-load-after-post"></span>
    </div>
  </div><?php echo esc_attr((isset($url) && $url != '') ? '<a href="'.$company.'"></a>' : '' ); ?>
</div>
