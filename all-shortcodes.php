<?php
if ( ! defined( 'ABSPATH' ) ) exit;
global $wpdb;
$tableName = $wpdb->prefix . DB_TESTIMONIAL_TABLE_NAME;
$query = "SELECT * FROM {$tableName} ORDER BY id DESC";
$results = $wpdb->get_results($query);
?>
<div class="wrap">
    <div class="testimonial-setting">
        <h1><?php esc_html_e('All Widget Shortcodes', 'stars-testimonials'); ?><a href='<?php echo PRO_PLUGIN_URL ?>' target="_blank" class='upgrade-block-button open-popup'><?php esc_html_e("Upgrade to Pro", 'stars-testimonials') ?></a> <?php if(count($results)!=0) { ?> <a href="<?php echo site_url("wp-admin/edit.php?post_type=stars_testimonial&page=all-shortcodes&task=add-new") ?>" class="button pull-right add-new-shortcode">+ New Widget Shortcode</a> <?php } ?></h1>
        <div class="clearfix"></div>
    </div>
    <div class="search-results">
        <?php if(count($results)>0) { ?>
            <table class="wp-list-table widefat fixed striped posts">
                <thead>
                    <tr>
                        <th width="110"><b><?php esc_html_e("Type", 'stars-testimonials') ?></b></th>
                        <th width="20%"><b><?php esc_html_e("Name", 'stars-testimonials') ?></b></th>
                        <th><b><?php esc_html_e("Widget Shortcode", 'stars-testimonials') ?></b></th>
                        <th width="220" class="text-center"><b><?php esc_html_e("Action", 'stars-testimonials') ?></b></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $clientArray = array("Tim Forever","Hans Down","Desmond Eagle");
                $companyArray = array("UX Design","Web Inc.","Accountant");
                ?>
                    <?php foreach ($results as $row) { ?>
                        <tr data-nonce="<?php echo wp_create_nonce("star_testimonial_remove_nonce_".$row->id) ?>" id="row-<?php  echo esc_attr($row->id) ?>" data-id="<?php  echo esc_attr($row->id) ?>" data-type="<?php echo esc_attr($row->testimonial_type)?>">
                            <td><?php echo ucfirst($row->testimonial_type) ?></td>
                            <td><?php echo esc_attr($row->shortcode_name) ?></td>
                            <td>
                                <div class="copy-shortcode">
                                    <?php echo "[testimonial_stars id={$row->id}]" ?><a title="<?php esc_html_e("Click to copy", 'stars-testimonials') ?>" href="javascript:;"><i class="pst pst-clone"></i></a>
                                </div>
                                <div class="sr-only">
                                    <input type="text" id="short-code-<?php echo esc_attr($row->id) ?>" value="[testimonial_stars id=<?php echo esc_attr($row->id) ?>]">
                                </div>
                            </td>
                            <td class="action-buttons text-center" >
                                <a class="view-preview" target="_blank" href="<?php echo site_url("wp-admin/edit.php?post_type=stars_testimonial&page=all-shortcodes&task=preview&id=".esc_attr($row->id)) ?>"><span class="badge bg-blue"><i class="pst-view"></i> <?php esc_html_e("Preview", 'stars-testimonials') ?></span></a>
                                <?php if(current_user_can('edit_posts')) { ?>
                                <a class="update-preview" href="<?php echo site_url("wp-admin/edit.php?post_type=stars_testimonial&page=all-shortcodes&task=edit&id=".$row->id) ?>"><span class="badge bg-green"><i class="pst-pencil"></i> <?php esc_html_e("Edit", 'stars-testimonials') ?></span></a>
                                <?php } ?>
                                <?php if(current_user_can('delete_posts')) { ?>
                                <a class="remove-preview" href="javascript:;"><span class="badge bg-red"><i class="pst-trash"></i> <?php esc_html_e("Remove", 'stars-testimonials') ?></span></a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
        <div class="no-results">
            <a class="add-new-record" href="<?php echo site_url("wp-admin/edit.php?post_type=stars_testimonial&page=all-shortcodes&task=add-new") ?>"><?php esc_html_e("+ Create Your First Shortcode", 'stars-testimonials') ?></a>
        </div>
        <?php } ?>
    </div>
</div>
<?php include_once 'help.php'; ?>