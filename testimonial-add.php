<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="wrap">
    <h2></h2>
    <div class="testimonial-page">
        <div class="testimonial-title"><?php esc_html_e("Create new testimonial",'stars-testimonials');?></div>
        <div class="testimonial-form">
            <form action="<?php echo admin_url() ?>" id="add_testimonial_item" method="post" >
                <div class="tst-form-field">
                    <div class="tst-form-field-left">
                        <label for="post_title"><?php esc_html_e("Client's name:",'stars-testimonials');?></label>
                    </div>
                    <div class="tst-form-field-right">
                        <input type="text" class="required" data-label="Client's name" name="post_title" id="post_title" placeholder="Example Client">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="tst-form-field">
                    <div class="tst-form-field-left">
                        <label for="testimonial_text"><?php esc_html_e("Testimonial text:",'stars-testimonials');?></label>
                    </div>
                    <div class="tst-form-field-right">
                        <div class="testimonial-text-area">
                            <?php
                            $settings = array(
                                'media_buttons' => false,
                                'wpautop' => false,
                                'drag_drop_upload' => false,
                                'textarea_name' => 'testimonial_text',
                                'textarea_rows' => 10,
                                'quicktags' => false,
                                'placeholder' => 'itis test',
                                'tinymce'       => array(
                                    'toolbar2'      => '',
                                    'toolbar3'      => '',
                                )
                            );
                            wp_editor("", "testimonial_text", $settings );
                            ?>
                            <div class="tst-placeholder"><?php esc_html_e("Type in the testimonial here",'stars-testimonials');?></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div style="display: none">
                        <textarea name="testimonial_content" id="testimonial_content" ></textarea>
                    </div>
                </div>
                <div class="tst-form-field">
                    <div class="tst-form-field-left">
                        <label for="company_name"><?php esc_html_e("Company name and role:",'stars-testimonials');?></label>
                    </div>
                    <div class="tst-form-field-right">
                        <input type="text" name="company_name" id="company_name" placeholder="Company Inc">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="tst-form-field">
                    <div class="tst-form-field-left">
                        <label for="website_link"><?php esc_html_e("Website link (optional):",'stars-testimonials');?></label>
                    </div>
                    <div class="tst-form-field-right">
                        <input type="text" name="website_link" id="website_link" placeholder="https://www.example.com">
                    </div>
                    <div class="clear"></div>
                </div>
                <?php
                $stars = 5;
                $start = intval($stars);
                $has_half = ($start != $stars)?"yes":"";
                if($has_half == "yes") {
                    $end = ceil($stars)+1;
                } else {
                    $end = $start+1;
                }
                ?>
                <div class="tst-form-field">
                    <div class="tst-form-field-left">
                        <label for="website_link"><?php esc_html_e("Stars rating:",'stars-testimonials');?></label>
                    </div>
                    <div class="tst-form-field-right">
                        <div class="star-container">
                            <div id="starrate" class="starrate mt-3" data-val="<?php echo esc_attr($stars) ?>" data-max="5">
                                <span class="ctrl"></span>
                                <span class="cont m-1 star-ratings">
                                    <?php for($i=1;$i<=$start;$i++) { ?>
                                        <i class="pst-star"></i>
                                    <?php } ?>
                                    <?php if($has_half == "yes") { ?>
                                        <i class="pst-star-half-o"></i>
                                    <?php } ?>
                                    <?php for($i=$end;$i<=5;$i++) { ?>
                                        <i class="pst-star-o"></i>
                                    <?php } ?>
                                </span>
                                <input type="hidden" name="testimonial_stars" id="testimonial_stars" value="<?php echo esc_attr($stars) ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="tst-form-field">
                    <div class="tst-form-field-left">
                        <label for="website_link"><?php esc_html_e("Client's image",'stars-testimonials');?></label>
                    </div>
                    <div class="tst-form-field-right">
                        <div class="image-preview"></div>
                        <div class="image-buttons">
                            <button type="button" class="button button-secondary upload-image"><?php esc_html_e("Upload client image",'stars-testimonials');?></button>
                            <button type="button" class="button button-secondary remove-image"><?php esc_html_e("Remove image",'stars-testimonials');?></button>
                            <span class="tooltip-message"><?php esc_html_e("Recommended sizes",'stars-testimonials');?> <span class="custom-tooltip"><span class="tooltip-text"><?php esc_html_e("For testimonials with ",'stars-testimonials');?><b><?php esc_html_e("square images ",'stars-testimonials');?></b><?php esc_html_e(", the recommended size is ",'stars-testimonials');?><b><?php esc_html_e("150x150",'stars-testimonials');?></b><span class="divider-custom"></span><?php esc_html_e("For testimonials with",'stars-testimonials');?>  <b><?php esc_html_e("rectangle images",'stars-testimonials');?></b><?php esc_html_e(", the recommended size is ",'stars-testimonials');?><b><?php esc_html_e("440x320",'stars-testimonials');?></b></span><span class="dashicons dashicons-editor-help"></span></span></span>
                            <input type="hidden" name="client_image" id="client_image" >
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php
                $arg = array(
                    'taxonomy' => 'stars_testimonial_cat',
                    'hide_empty' => false,
                    'order' => "ASC",
                    'orderby' => 'name'
                );
                $terms = get_terms($arg);
                ?>
                <div class="tst-form-field">
                    <div class="tst-form-field-left">
                        <label for="company_name"><?php esc_html_e("Categories (optional):",'stars-testimonials');?></label>
                    </div>
                    <div class="tst-form-field-right">
                        <div class="select-box select-box-custom">
                            <select name="testimonial_categories[]" id="grid_categories" class="select-box select2" multiple="multiple" >
                                <?php foreach($terms as $term) {
                                    echo "<option value='{$term->term_id}'>{$term->name}</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="tst-form-field">
                    <div class="tst-form-field-left">
                        <label for="website_link">&nbsp;</label>
                    </div>
                    <div class="tst-form-field-right">
                        <button type="submit" class="submit-button testimonial-button"><?php esc_html_e("Save Changes",'stars-testimonials');?></button>
                    </div>
                    <div class="clear"></div>
                </div>
                <input type="hidden" name="action" value="save_premio_testimonial_post">
                <input type="hidden" name="nonce" value="<?php echo wp_create_nonce("add_premio_testimonial_post") ?>" >
                <input type="hidden" name="id" value="">
            </form>
        </div>
    </div>
</div>



<script>

    var valueHover = 0;
    function calcSliderPos(e, maxV) {
        return (e.offsetX / e.target.clientWidth) * parseInt(maxV, 10);
    }

    jQuery(".starrate").on("click", function () {
        jQuery(this).data("val", valueHover);
        jQuery(this).addClass("saved");
    });

    jQuery(".starrate").on("mouseout", function () {
        upStars(jQuery(this).data("val"));
    });

    jQuery(".starrate span.ctrl").on("mousemove", function (e) {
        var maxV = parseInt(jQuery(this).parent("div").data("max"));
        valueHover = Math.ceil(calcSliderPos(e, maxV) * 2) / 2;
        upStars(valueHover);
    });

    function upStars(val) {
        var val = parseFloat(val);
        jQuery("#testimonial_stars").val(val.toFixed(1));

        var full = Number.isInteger(val);
        val = parseInt(val);
        var stars = jQuery("#starrate i");

        stars.slice(0, val).attr("class", "pst-star");
        if (!full) {
            stars.slice(val, val + 1).attr("class", "pst-star-half-o");
            val++;
        }
        stars.slice(val, 5).attr("class", "pst-star-o");
    }

    jQuery("title").text("Create new testimonial");
    jQuery(".menu-icon-stars_testimonial .current").removeClass("current");

    jQuery(document).ready(function () {
        jQuery("title").text("Create new testimonial");
        jQuery(".starrate span.ctrl").width(jQuery(".starrate span.cont").width());
        jQuery(".starrate span.ctrl").height(jQuery(".starrate span.cont").height());


        jQuery(document).on("click", ".remove-image", function(){
            jQuery('.image-preview').html("");
            jQuery('#client_image').val("");
            jQuery(this).removeClass("active");
        });
        jQuery(document).on("click", ".upload-image", function(){
            var imageTst = wp.media({
                title: 'Upload Image',
                multiple: false,
                library: {
                    type: 'image'
                }
            }).open()
                .on('select', function (e) {
                    var uploaded_image = imageTst.state().get('selection').first();
                    var imageData = uploaded_image.toJSON();
                    jQuery('.remove-image').addClass("active");
                    jQuery('#client_image').val(imageData.id);
                    jQuery('.image-preview').html("<img src='"+imageData.url+"' />");
                    change_custom_preview();
                });
        });

        jQuery("#add_testimonial_item").on('submit', function(){
            jQuery(this).find(".input-error").removeClass("input-error");
            jQuery(this).find(".error-message").remove();
            var errorCount = 0;
            jQuery(this).find(".required").each(function(){
               if(jQuery.trim(jQuery(this).val()) == "") {
                   errorCount++;
                   jQuery(this).addClass("input-error");
                   jQuery(this).after("<span class='error-message'>"+jQuery(this).attr("data-label")+" is required</span>");
               }
            });

            if(errorCount == 0) {
                var data = jQuery("#add_testimonial_item").serialize();
                jQuery(".testimonial-button").attr("disabled", true);
                jQuery.post("<?php echo admin_url("admin-ajax.php") ?>", data, function (response) {
                    response = jQuery.parseJSON(response);
                    if(response.status == 1) {
                        window.location = "<?php echo admin_url("edit.php?post_type=stars_testimonial") ?>";
                    } else {
                        jQuery(".testimonial-button").attr("disabled", false);
                        Swal.fire({
                            title: 'Error!',
                            text: response.message,
                            type: 'error'
                        });
                        jQuery(".submit-button").removeClass("loading");
                    }
                });
            }
            return false;
        });
    });

    jQuery(window).on('load', function(){
        if(tinymce.editors.length) {
            for (var i = 0; i < tinymce.editors.length; i++) {
                tinymce.editors[i].onChange.add(function (ed, e) {
                    jQuery("#testimonial_content").val(ed.getContent());
                    if(jQuery.trim(jQuery("#testimonial_content").val()) != "") {
                        jQuery(".tst-placeholder").hide();
                    }
                });
                tinymce.editors[i].onKeyUp.add(function (ed, e) {
                    jQuery("#testimonial_content").val(ed.getContent());
                    if(jQuery.trim(jQuery("#testimonial_content").val()) != "") {
                        jQuery(".tst-placeholder").hide();
                    }
                });
                tinymce.activeEditor.on('focus', function(ed) {
                    jQuery(".tst-placeholder").hide();
                });
                tinymce.activeEditor.on('blur', function(ed) {
                    if(jQuery.trim(jQuery("#testimonial_content").val()) == "") {
                        jQuery(".tst-placeholder").show();
                    }
                });
            }
        }
    });
</script>