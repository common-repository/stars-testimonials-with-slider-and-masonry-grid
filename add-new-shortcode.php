<?php
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<div class="wrap">
    <div class="testimonial-setting">
        <h1><?php esc_html_e('Create Shortcode', 'stars-testimonials'); ?><a target="_blank" href='<?php echo PRO_PLUGIN_URL ?>' class='upgrade-block-button open-popup'><?php esc_html_e("Upgrade to Pro", 'stars-testimonials') ?></a></h1>
        <div class="clearfix"></div>
    </div>
    <div class="testimonial-setting">
        <div class="testimonial-type">
            <div class="testimonial-type-left">
                <h2><?php esc_html_e('Choose testimonial style', 'stars-testimonials'); ?> </h2>
            </div>
            <div class="testimonial-type-right">
                <div class="testimonial-col" data-for="grid-form" data-value="grid">
                    <div class="testimonial-img ">
                        <img src="<?php echo plugins_url( '/images/admin/grid.svg', __FILE__ ) ?>" alt="<?php esc_html_e('Grid', 'stars-testimonials'); ?>"/>
                    </div>
                    <div class="testimonial-text">
                        <?php esc_html_e('Grid', 'stars-testimonials'); ?>
                    </div>
                </div>
                <div class="testimonial-col has-prow-feature" data-for="custom-form" data-value="wall">
                    <a href="<?php echo PRO_PLUGIN_URL ?>" target="_blank">
                        <div class="testimonial-img">
                            <img src="<?php echo plugins_url( '/images/admin/wall-pro-feature.svg', __FILE__ ) ?>" alt="<?php esc_html_e('Wall', 'stars-testimonials'); ?>" />
                        </div>
                        <div class="testimonial-text">
                            <?php esc_html_e('Wall', 'stars-testimonials'); ?>
                        </div>
                    </a>
                </div>
                <div class="testimonial-col has-prow-feature last" data-for="slider-form" data-value="slider">
                    <a href="<?php echo PRO_PLUGIN_URL ?>" target="_blank">
                        <div class="testimonial-img">
                            <img src="<?php echo plugins_url( '/images/admin/slider-pro-feature.svg', __FILE__ ) ?>" alt="<?php esc_html_e('Slider', 'stars-testimonials'); ?>" />
                        </div>
                        <div class="testimonial-text">
                            <?php esc_html_e('Slider', 'stars-testimonials'); ?>
                        </div>
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="testimonial-form-data grid-box" id="grid-form">
            <div class="testimonial-grid-box">
                <form action="" method="post" >
                    <?php
                    $clientArray = array("Tim Forever","Hans Down","Desmond Eagle");
                    $companyArray = array("UX Design","Web Inc.","Accountant");
                    ?>
                    <?php $start = 1; $end=17; for($i=$start;$i<=$end;$i++) { ?>
                    <div class="grid-form-row <?php echo esc_attr(($i>5)?"disabled":"") ?>">
                        <div class="grid-form-row-full">
                            <div class="grid-style-box">
                                <?php $to = ($i==10)?2:3; for($j=1;$j<=$to;$j++) { ?>
                                    <div class="col-1-<?php echo esc_attr($to)?>">
                                        <?php include "templates/admin/style".$i.".php"; ?>
                                    </div>
                                <?php } ?>
                            <div class="clearfix"></div>
                            </div>

                            <div class="grid-form-row-hover">
                                <input type="radio" class="sr-only" name="testimonial_style" id="grid-style-<?php echo esc_attr($i) ?>" value="<?php echo esc_attr($i) ?>" <?php echo esc_attr(($i>5)?"disabled":"" )?> />
                                <label for="grid-style-<?php echo esc_attr($i) ?>"><a <?php echo ($i<=5)?'href="javascript:;"':'href="'.PRO_PLUGIN_URL.'" target="_blank" '; ?> class="testimonial-button is-hidden <?php echo esc_attr(($i>5)?"disabled-class":"customize-button") ?>"><?php echo esc_attr(($i<=5)?__('Customize', 'stars-testimonials'):__('Upgrade to Pro', 'stars-testimonials')); ?></a></label>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <?php } ?>
                </form>
            </div>
        </div>
        <div class="testimonial-form-data not-pro-version" id="custom-form">
            <form action="<?php echo esc_attr( $_SERVER['REQUEST_URI']) ?>&submit=true" method="post" id="testimonial_form">
                <input type="hidden" name="testimonial_type" id="testimonial_type" />
                <input type="hidden" name="testimonial_style" id="testimonial_style" />
                <div class="setting-box">
                    <div class="setting-box-left">
                        <h2><?php esc_html_e('General settings', 'stars-testimonials'); ?></h2>
                        <?php
                        $arg = array(
                            'taxonomy' => 'stars_testimonial_cat',
                            'hide_empty' => false,
                            'order' => "ASC",
                            'orderby' => 'name'
                        );
                        $terms = get_terms($arg);
                        ?>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="shortcode_name"><?php esc_html_e("Shortcode name", 'stars-testimonials') ?>:</label>
                                </th>
                                <td>
                                    <input class="form-control required" id="shortcode_name" type="text" name="shortcode_name" />

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="font_family"><?php esc_html_e("Font Family", 'stars-testimonials') ?>:</label>
                                </th>
                                <td>
                                    <?php $fonts = $GLOBALS['fontFamily']; ?>
                                    <?php foreach($fonts as $key=>$value) { ?>
                                        <link href="https://fonts.googleapis.com/css?family=<?php echo urlencode($value) ?>" rel="stylesheet" tyle="text/css">
                                    <?php } ?>
                                    <div class="custom-select-box" id="font-family">
                                        <input type="text" readonly class="form-control custom-select" name="font_family" id="font_family" value="Default" >
                                        <span class="select-arrow"></span>
                                        <div name="font_family" id="font_family" class="select-content" >
                                            <ul>
                                            <li data-value='Default' class="active">Default</li>
                                            <?php foreach($fonts as $key=>$value) {
                                                echo "<li style='font-family: ".esc_attr($value)."' data-value='{$value}'>{$value}</li>";
                                            } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="grid_columns"><?php esc_html_e("Columns", 'stars-testimonials') ?>:</label>
                                </th>
                                <td>
                                    <div class="grid-columns-box">
                                        <input class="grid-columns" id="grid_columns" type="text" min="1" max="5" value="3" name="grid_columns" step="1" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="grid_categories"><?php esc_html_e("Categories", 'stars-testimonials') ?>:</label>
                                </th>
                                <td>
                                    <div class="select-box">
                                        <select name="testimonial_categories[]" id="grid_categories" class="select-box select2" multiple="multiple" >
                                            <?php foreach($terms as $term) {
                                                echo "<option value='{$term->term_id}'>{$term->name}</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="no_of_testimonials"><?php esc_html_e("# of testimonials", 'stars-testimonials') ?>:</label>
                                </th>
                                <td>
                                    <input type="number" class="form-control" name="no_of_testimonials" id="no_of_testimonials" value="3" min="1" step="1"/>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="testimonial_order"><?php esc_html_e("Order", 'stars-testimonials') ?>:</label>
                                </th>
                                <td>
                                    <div class="select-box">
                                        <select name="testimonial_order" id="testimonial_order" class="select-box" >
                                            <option value="1"><?php esc_html_e("Date ascending", 'stars-testimonials') ?></option>
                                            <option value="2"><?php esc_html_e("Date descending", 'stars-testimonials') ?></option>
                                            <option value="3"><?php esc_html_e("Title ascending", 'stars-testimonials') ?></option>
                                            <option value="4"><?php esc_html_e("Title descending", 'stars-testimonials') ?></option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="has_character_limit"><?php esc_html_e("Character limit", 'stars-testimonials') ?>:</label>
                                    <span class="tooltip-message">
										<span class="custom-tooltip" style="text-align:left; z-index:99999">
											<span class="tooltip-text"><?php esc_html_e("Turn on to enforce character limit for every testimonial", 'stars-testimonials') ?></span>
											<span class="dashicons dashicons-editor-help"></span>
										</span>
									</span>
                                </th>
                                <td>
                                    <label class="testimonial-switch">
                                        <input type="checkbox" class="form-control" name="has_character_limit" id="has_character_limit" value="1" disabled />
                                        <span class="slider round"><!--ADDED HTML --><span class="on">On</span><span class="off">Off</span></span>
                                    </label>
                                    <label for="enable_visitor_review">
                                        <a href="<?php echo admin_url("edit.php?post_type=stars_testimonial&page=collect_review_page") ?>" target="_blank" class="pro-feature-link"><?php esc_html_e("Pro Feature") ?></a>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="has_read_more"><?php esc_html_e("Read more") ?>:</label>
                                    <span class="tooltip-message">
										<span class="custom-tooltip" style="text-align:left; z-index:99999">
											<span class="tooltip-text"><?php esc_html_e("Show a read more button to view the full testimonial in a separate pop-up. If turned off, sliced off testimonials due to character limit will not have a read more button to view the rest of it", 'stars-testimonials') ?></span>
											<span class="dashicons dashicons-editor-help"></span>
										</span>
									</span>
                                </th>
                                <td>
                                    <label class="testimonial-switch">
                                        <input type="checkbox" class="form-control" name="has_read_more" id="has_read_more" value="1" disabled />
                                        <span class="slider round"><!--ADDED HTML --><span class="on">On</span><span class="off">Off</span></span>
                                    </label>
                                    <label for="enable_visitor_review">
                                        <a href="<?php echo admin_url("edit.php?post_type=stars_testimonial&page=collect_review_page") ?>" target="_blank" class="pro-feature-link"><?php esc_html_e("Pro Feature") ?></a>
                                    </label>
                                </td>
                            </tr>
							<tr>
                                <th scope="row">
                                    <label for="enable_visitor_review"><?php esc_html_e("Collect testimonials from your visitors") ?>:</label>
									<span class="tooltip-message">
										<span class="custom-tooltip" style="text-align:left; z-index:99999">
											<span class="tooltip-text"><?php esc_html_e("Collect testimonials from your website's visitors by showing a button under your testimonials widget. Your testimonials will be added once you approve them. You can also create a direct link to your clients so they can submit their testimonials.", 'stars-testimonials') ?></span>
											<span class="dashicons dashicons-editor-help"></span>
										</span>
									</span>
                                </th>
								<td>
									<label class="testimonial-switch">
										<input type="checkbox" class="form-control" name="enable_visitor_review" id="enable_visitor_review" value="1" disabled />										
										<span class="slider round"><!--ADDED HTML --><span class="on">On</span><span class="off">Off</span><!-- END--></span>
									</label>
									<label for="enable_visitor_review">										
										<a href="<?php echo admin_url("edit.php?post_type=stars_testimonial&page=collect_review_page") ?>" target="_blank" class="pro-feature-link"><?php esc_html_e("Pro Feature") ?></a>
									</label>
								</td>
							</tr>
                        </table>
                        <h2><?php esc_html_e('Color settings', 'stars-testimonials'); ?></h2>
                        <?php
                        global $settingArray;
                        ?>
                        <table class="form-table" id="custom-color">
                            <?php foreach($settingArray as $title) { ?>
                                <tr class="dynamic-color-col color-<?php echo esc_attr($title['slug']) ?>-col" data-col="<?php echo esc_attr( $title['slug']) ?>">
                                    <th scope="row">
                                        <label for=""><?php echo esc_attr( $title['title']) ?>:</label>
                                    </th>
                                    <td class="color-row" data-class="<?php echo esc_attr($title['class']) ?>">
                                        <div class="custom-radios">
                                            <input type="hidden" name="<?php echo esc_attr($title['slug']) ?>_color" value="" />
                                            <?php foreach($title['color'] as $key=>$color) { ?>
                                                <style>
                                                    .color-<?php echo esc_attr($title['slug']) ?>-col .custom-radios input[type="radio"].color-<?php echo esc_attr($key) ?> + label span {
                                                        background-color: #<?php echo esc_attr($color) ?>;
                                                        border-color: #<?php echo esc_attr($color)?>;
                                                    }
                                                </style>
                                                <div>
                                                    <input type="radio" class="color-<?php echo esc_attr($key) ?>" name="<?php echo esc_attr( $title['slug']) ?>_color" value="<?php echo esc_attr($color) ?>" id="<?php echo esc_attr($title['slug'])."-".esc_attr($key) ?>-color">
                                                    <label for="<?php echo esc_attr($title['slug'])."-".esc_attr($key) ?>-color">
                                                      <span>
                                                        <i class="pst-check" aria-hidden="true"></i>
                                                      </span>
                                                    </label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="custom-color-box">
                                            <div class="inline-block">
                                                <span><i class="pst-question" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="inline-block">
                                                <input class="custom-color testimonial-color-picker form-control" placeholder="FFFFFF" disabled />
                                            </div>
                                            <div class="inline-block">
                                                <a href="<?php echo PRO_PLUGIN_URL ?>" target="_blank" class="pro-feature-link"><?php esc_html_e("Pro Feature","stars-testimonials") ?></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <th scope="row">
                                    <label for="enable_google_schema"><?php esc_html_e("Support Rating Schema", "stars-testimonials") ?>:</label>
                                    <span class="tooltip-message">
										<span class="custom-tooltip" style="text-align:left; z-index:99999">
											<span class="tooltip-text"><?php esc_html_e("Add rating schema to your page for Google search pages. Rating schema will load on the page where you place the shortcode and it'll be updated automatically as per the total number of reviews and the average review", 'stars-testimonials') ?></span>
											<span class="dashicons dashicons-editor-help"></span>
										</span>
									</span>
                                </th>
                                <td>
                                    <input type="hidden" class="form-control" name="enable_google_schema" value="0" />
                                    <label class="testimonial-switch" for="enable_google_schema">
                                        <input type="checkbox" class="form-control" name="enable_google_schema" id="enable_google_schema" value="1" disabled />
                                        <span class="slider round"><!--ADDED HTML --><span class="on">On</span><span class="off">Off</span><!-- END--></span>
                                    </label>
                                    <label for="enable_google_schema"><?php esc_html_e("Enable ratings schema where this widget is loaded", "stars-testimonials") ?>:</label>
                                    <label for="enable_google_schema">
                                        <a href="<?php echo admin_url("edit.php?post_type=stars_testimonial&page=collect_review_page") ?>" target="_blank" class="pro-feature-link"><?php esc_html_e("Pro Feature") ?></a>
                                    </label>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="setting-box-right">
                        <div class="preview-section">
                            <div class="preview-inner" id="preview-box"></div>
                        </div>
                        <div class="preview-buttons">
                            <a href="javascript:;" class="testimonial-button pull-left back-button" ><i class="pst-arrow-left"></i> <?php esc_html_e("Back", 'stars-testimonials') ?></a>
                            <a href="javascript:;" class="submit-button testimonial-button" ><?php esc_html_e("Finish", 'stars-testimonials') ?> <i class="pst-arrow-right"></i></a>
                            <div class="clearfix"></div>
                            <a href="javascript:;" class="reset-button testimonial-button" ><i class="pst-refresh"></i> <?php esc_html_e("Reset", 'stars-testimonials') ?></a>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <input type="hidden" name="action" value="save_testimonial_setting">
                <input type="hidden" name="nonce" value="<?php echo wp_create_nonce("star_testimonial_add_nonce") ?>" >
                <input type="hidden" name="id" value="">
            </form>
        </div>
    </div>
</div>
<?php include_once 'help.php'; ?>