<?php
/*
  Plugin Name: Disable Core Blocks
  Description: Deaktiviert ausgewählte Core Blöcke für die gesamte Seite.
  Version: 1.0
  Author: connect2
  Author URI: https://github.com/cn2labs
*/

class DisableCoreBlocks {
  function __construct() {
    add_action('admin_menu', array($this, 'adminPage'));
    add_action('admin_init', array($this, 'settings'));
    add_filter('allowed_block_types_all', array($this, 'allowedCoreBlocks'));
  }

  function settings() {
    add_settings_section('dcb_first_section', null, null, 'disable-core-blocks-settings-page');

    add_settings_field('dcb_archives', 'core/archives', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_archives'));
    register_setting('disablecoreblocks_plugin', 'dcb_archives', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_audio', 'core/audio', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_audio'));
    register_setting('disablecoreblocks_plugin', 'dcb_audio', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_block', 'core/block', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_block'));
    register_setting('disablecoreblocks_plugin', 'dcb_block', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_button', 'core/button', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_button'));
    register_setting('disablecoreblocks_plugin', 'dcb_button', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_buttons', 'core/buttons', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_buttons'));
    register_setting('disablecoreblocks_plugin', 'dcb_buttons', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_calendar', 'core/calendar', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_calendar'));
    register_setting('disablecoreblocks_plugin', 'dcb_calendar', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_categories', 'core/categories', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_categories'));
    register_setting('disablecoreblocks_plugin', 'dcb_categories', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_code', 'core/code', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_code'));
    register_setting('disablecoreblocks_plugin', 'dcb_code', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_column', 'core/column', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_column'));
    register_setting('disablecoreblocks_plugin', 'dcb_column', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_columns', 'core/columns', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_columns'));
    register_setting('disablecoreblocks_plugin', 'dcb_columns', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_cover', 'core/cover', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_cover'));
    register_setting('disablecoreblocks_plugin', 'dcb_cover', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_embed', 'core/embed', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_embed'));
    register_setting('disablecoreblocks_plugin', 'dcb_embed', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_file', 'core/file', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_file'));
    register_setting('disablecoreblocks_plugin', 'dcb_file', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_freeform', 'core/freeform', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_freeform'));
    register_setting('disablecoreblocks_plugin', 'dcb_freeform', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_gallery', 'core/gallery', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_gallery'));
    register_setting('disablecoreblocks_plugin', 'dcb_gallery', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_group', 'core/group', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_group'));
    register_setting('disablecoreblocks_plugin', 'dcb_group', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_heading', 'core/heading', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_heading'));
    register_setting('disablecoreblocks_plugin', 'dcb_heading', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_html', 'core/html', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_html'));
    register_setting('disablecoreblocks_plugin', 'dcb_html', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_image', 'core/image', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_image'));
    register_setting('disablecoreblocks_plugin', 'dcb_image', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_latest-comments', 'core/latest-comments', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_latest-comments'));
    register_setting('disablecoreblocks_plugin', 'dcb_latest-comments', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_latest-posts', 'core/latest-posts', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_latest-posts'));
    register_setting('disablecoreblocks_plugin', 'dcb_latest-posts', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_list', 'core/list', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_list'));
    register_setting('disablecoreblocks_plugin', 'dcb_list', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_loginout', 'core/loginout', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_loginout'));
    register_setting('disablecoreblocks_plugin', 'dcb_loginout', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_media-text', 'core/media-text', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_media-text'));
    register_setting('disablecoreblocks_plugin', 'dcb_media-text', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_missing', 'core/missing', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_missing'));
    register_setting('disablecoreblocks_plugin', 'dcb_missing', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_more', 'core/more', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_more'));
    register_setting('disablecoreblocks_plugin', 'dcb_more', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_nextpage', 'core/nextpage', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_nextpage'));
    register_setting('disablecoreblocks_plugin', 'dcb_nextpage', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_page-list', 'core/page-list', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_page-list'));
    register_setting('disablecoreblocks_plugin', 'dcb_page-list', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_paragraph', 'core/paragraph', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_paragraph'));
    register_setting('disablecoreblocks_plugin', 'dcb_paragraph', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_post-content', 'core/post-content', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_post-content'));
    register_setting('disablecoreblocks_plugin', 'dcb_post-content', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_post-date', 'core/post-date', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_post-date'));
    register_setting('disablecoreblocks_plugin', 'dcb_post-date', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_post-excerpt', 'core/post-excerpt', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_post-excerpt'));
    register_setting('disablecoreblocks_plugin', 'dcb_post-excerpt', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_post-featured-image', 'core/post-featured-image', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_post-featured-image'));
    register_setting('disablecoreblocks_plugin', 'dcb_post-featured-image', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_post-template', 'core/post-template', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_post-template'));
    register_setting('disablecoreblocks_plugin', 'dcb_post-template', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_post-terms', 'core/post-terms', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_post-terms'));
    register_setting('disablecoreblocks_plugin', 'dcb_post-terms', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_post-title', 'core/post-title', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_post-title'));
    register_setting('disablecoreblocks_plugin', 'dcb_post-title', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_preformatted', 'core/preformatted', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_preformatted'));
    register_setting('disablecoreblocks_plugin', 'dcb_preformatted', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_pullquote', 'core/pullquote', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_pullquote'));
    register_setting('disablecoreblocks_plugin', 'dcb_pullquote', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_query', 'core/query', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_query'));
    register_setting('disablecoreblocks_plugin', 'dcb_query', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_query-pagination', 'core/query-pagination', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_query-pagination'));
    register_setting('disablecoreblocks_plugin', 'dcb_query-pagination', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_query-pagination-next', 'core/query-pagination-next', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_query-pagination-next'));
    register_setting('disablecoreblocks_plugin', 'dcb_query-pagination-next', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_query-pagination-numbers', 'core/query-pagination-numbers', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_query-pagination-numbers'));
    register_setting('disablecoreblocks_plugin', 'dcb_query-pagination-numbers', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_query-pagination-previous', 'core/query-pagination-previous', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_query-pagination-previous'));
    register_setting('disablecoreblocks_plugin', 'dcb_query-pagination-previous', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_query-title', 'core/query-title', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_query-title'));
    register_setting('disablecoreblocks_plugin', 'dcb_query-title', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_quote', 'core/quote', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_quote'));
    register_setting('disablecoreblocks_plugin', 'dcb_quote', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_rss', 'core/rss', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_rss'));
    register_setting('disablecoreblocks_plugin', 'dcb_rss', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_search', 'core/search', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_search'));
    register_setting('disablecoreblocks_plugin', 'dcb_search', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_separator', 'core/separator', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_separator'));
    register_setting('disablecoreblocks_plugin', 'dcb_separator', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_shortcode', 'core/shortcode', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_shortcode'));
    register_setting('disablecoreblocks_plugin', 'dcb_shortcode', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_site-logo', 'core/site-logo', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_site-logo'));
    register_setting('disablecoreblocks_plugin', 'dcb_site-logo', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_site-tagline', 'core/site-tagline', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_site-tagline'));
    register_setting('disablecoreblocks_plugin', 'dcb_site-tagline', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_site-title', 'core/site-title', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_site-title'));
    register_setting('disablecoreblocks_plugin', 'dcb_site-title', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_social-link', 'core/social-link', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_social-link'));
    register_setting('disablecoreblocks_plugin', 'dcb_social-link', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_social-links', 'core/social-links', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_social-links'));
    register_setting('disablecoreblocks_plugin', 'dcb_social-links', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_spacer', 'core/spacer', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_spacer'));
    register_setting('disablecoreblocks_plugin', 'dcb_spacer', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_table', 'core/table', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_table'));
    register_setting('disablecoreblocks_plugin', 'dcb_table', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_tag-cloud', 'core/tag-cloud', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_tag-cloud'));
    register_setting('disablecoreblocks_plugin', 'dcb_tag-cloud', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_text-columns', 'core/text-columns', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_text-columns'));
    register_setting('disablecoreblocks_plugin', 'dcb_text-columns', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_verse', 'core/verse', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_verse'));
    register_setting('disablecoreblocks_plugin', 'dcb_verse', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    
    add_settings_field('dcb_video', 'core/video', array($this, 'checkboxHTML'), 'disable-core-blocks-settings-page', 'dcb_first_section', array('name' => 'dcb_video'));
    register_setting('disablecoreblocks_plugin', 'dcb_video', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
  }

  function checkboxHTML($args) { ?>
    <input type="checkbox" name="<?php echo $args['name'] ?>" value="1" <?php checked(get_option($args['name'], '0')); ?>>
  <?php }

  function adminPage() {
    add_options_page('Disable Core Blocks', 'Disable Core Blocks', 'manage_options', 'disable-core-blocks-settings-page', array($this, 'adminPageHTML'));
  }

  function adminPageHTML() { ?>
    <div class="wrap">
      <h1>Disable Core Blocks</h1>
      <p>Nur <i>ausgewählte</i> Blöcke werden für die gesamte Seite aktiviert.</p>
      <form action="options.php" method="POST">
      <?php
        settings_fields('disablecoreblocks_plugin');
        do_settings_sections('disable-core-blocks-settings-page');
        submit_button();
      ?>
      </form>
    </div>
  <?php }

  function allowedCoreBlocks($allowed_block_types) {
    $allowed_core_blocks = array();

    if (get_option('dcb_archives', '0' == '1')) {
      $allowed_core_blocks[] = 'core/archives';
    }


    if (get_option('dcb_audio', '0' == '1')) {
      $allowed_core_blocks[] = 'core/audio';
    }


    if (get_option('dcb_block', '0' == '1')) {
      $allowed_core_blocks[] = 'core/block';
    }


    if (get_option('dcb_button', '0' == '1')) {
      $allowed_core_blocks[] = 'core/button';
    }


    if (get_option('dcb_buttons', '0' == '1')) {
      $allowed_core_blocks[] = 'core/buttons';
    }


    if (get_option('dcb_calendar', '0' == '1')) {
      $allowed_core_blocks[] = 'core/calendar';
    }


    if (get_option('dcb_categories', '0' == '1')) {
      $allowed_core_blocks[] = 'core/categories';
    }


    if (get_option('dcb_code', '0' == '1')) {
      $allowed_core_blocks[] = 'core/code';
    }


    if (get_option('dcb_column', '0' == '1')) {
      $allowed_core_blocks[] = 'core/column';
    }


    if (get_option('dcb_columns', '0' == '1')) {
      $allowed_core_blocks[] = 'core/columns';
    }


    if (get_option('dcb_cover', '0' == '1')) {
      $allowed_core_blocks[] = 'core/cover';
    }


    if (get_option('dcb_embed', '0' == '1')) {
      $allowed_core_blocks[] = 'core/embed';
    }


    if (get_option('dcb_file', '0' == '1')) {
      $allowed_core_blocks[] = 'core/file';
    }


    if (get_option('dcb_freeform', '0' == '1')) {
      $allowed_core_blocks[] = 'core/freeform';
    }


    if (get_option('dcb_gallery', '0' == '1')) {
      $allowed_core_blocks[] = 'core/gallery';
    }


    if (get_option('dcb_group', '0' == '1')) {
      $allowed_core_blocks[] = 'core/group';
    }


    if (get_option('dcb_heading', '0' == '1')) {
      $allowed_core_blocks[] = 'core/heading';
    }


    if (get_option('dcb_html', '0' == '1')) {
      $allowed_core_blocks[] = 'core/html';
    }


    if (get_option('dcb_image', '0' == '1')) {
      $allowed_core_blocks[] = 'core/image';
    }


    if (get_option('dcb_latest-comments', '0' == '1')) {
      $allowed_core_blocks[] = 'core/latest-comments';
    }


    if (get_option('dcb_latest-posts', '0' == '1')) {
      $allowed_core_blocks[] = 'core/latest-posts';
    }


    if (get_option('dcb_list', '0' == '1')) {
      $allowed_core_blocks[] = 'core/list';
    }


    if (get_option('dcb_loginout', '0' == '1')) {
      $allowed_core_blocks[] = 'core/loginout';
    }


    if (get_option('dcb_media-text', '0' == '1')) {
      $allowed_core_blocks[] = 'core/media-text';
    }


    if (get_option('dcb_missing', '0' == '1')) {
      $allowed_core_blocks[] = 'core/missing';
    }


    if (get_option('dcb_more', '0' == '1')) {
      $allowed_core_blocks[] = 'core/more';
    }


    if (get_option('dcb_nextpage', '0' == '1')) {
      $allowed_core_blocks[] = 'core/nextpage';
    }


    if (get_option('dcb_page-list', '0' == '1')) {
      $allowed_core_blocks[] = 'core/page-list';
    }


    if (get_option('dcb_paragraph', '0' == '1')) {
      $allowed_core_blocks[] = 'core/paragraph';
    }


    if (get_option('dcb_post-content', '0' == '1')) {
      $allowed_core_blocks[] = 'core/post-content';
    }


    if (get_option('dcb_post-date', '0' == '1')) {
      $allowed_core_blocks[] = 'core/post-date';
    }


    if (get_option('dcb_post-excerpt', '0' == '1')) {
      $allowed_core_blocks[] = 'core/post-excerpt';
    }


    if (get_option('dcb_post-featured-image', '0' == '1')) {
      $allowed_core_blocks[] = 'core/post-featured-image';
    }


    if (get_option('dcb_post-template', '0' == '1')) {
      $allowed_core_blocks[] = 'core/post-template';
    }


    if (get_option('dcb_post-terms', '0' == '1')) {
      $allowed_core_blocks[] = 'core/post-terms';
    }


    if (get_option('dcb_post-title', '0' == '1')) {
      $allowed_core_blocks[] = 'core/post-title';
    }


    if (get_option('dcb_preformatted', '0' == '1')) {
      $allowed_core_blocks[] = 'core/preformatted';
    }


    if (get_option('dcb_pullquote', '0' == '1')) {
      $allowed_core_blocks[] = 'core/pullquote';
    }


    if (get_option('dcb_query', '0' == '1')) {
      $allowed_core_blocks[] = 'core/query';
    }


    if (get_option('dcb_query-pagination', '0' == '1')) {
      $allowed_core_blocks[] = 'core/query-pagination';
    }


    if (get_option('dcb_query-pagination-next', '0' == '1')) {
      $allowed_core_blocks[] = 'core/query-pagination-next';
    }


    if (get_option('dcb_query-pagination-numbers', '0' == '1')) {
      $allowed_core_blocks[] = 'core/query-pagination-numbers';
    }


    if (get_option('dcb_query-pagination-previous', '0' == '1')) {
      $allowed_core_blocks[] = 'core/query-pagination-previous';
    }


    if (get_option('dcb_query-title', '0' == '1')) {
      $allowed_core_blocks[] = 'core/query-title';
    }


    if (get_option('dcb_quote', '0' == '1')) {
      $allowed_core_blocks[] = 'core/quote';
    }


    if (get_option('dcb_rss', '0' == '1')) {
      $allowed_core_blocks[] = 'core/rss';
    }


    if (get_option('dcb_search', '0' == '1')) {
      $allowed_core_blocks[] = 'core/search';
    }


    if (get_option('dcb_separator', '0' == '1')) {
      $allowed_core_blocks[] = 'core/separator';
    }


    if (get_option('dcb_shortcode', '0' == '1')) {
      $allowed_core_blocks[] = 'core/shortcode';
    }


    if (get_option('dcb_site-logo', '0' == '1')) {
      $allowed_core_blocks[] = 'core/site-logo';
    }


    if (get_option('dcb_site-tagline', '0' == '1')) {
      $allowed_core_blocks[] = 'core/site-tagline';
    }


    if (get_option('dcb_site-title', '0' == '1')) {
      $allowed_core_blocks[] = 'core/site-title';
    }


    if (get_option('dcb_social-link', '0' == '1')) {
      $allowed_core_blocks[] = 'core/social-link';
    }


    if (get_option('dcb_social-links', '0' == '1')) {
      $allowed_core_blocks[] = 'core/social-links';
    }


    if (get_option('dcb_spacer', '0' == '1')) {
      $allowed_core_blocks[] = 'core/spacer';
    }


    if (get_option('dcb_table', '0' == '1')) {
      $allowed_core_blocks[] = 'core/table';
    }


    if (get_option('dcb_tag-cloud', '0' == '1')) {
      $allowed_core_blocks[] = 'core/tag-cloud';
    }


    if (get_option('dcb_text-columns', '0' == '1')) {
      $allowed_core_blocks[] = 'core/text-columns';
    }


    if (get_option('dcb_verse', '0' == '1')) {
      $allowed_core_blocks[] = 'core/verse';
    }


    if (get_option('dcb_video', '0' == '1')) {
      $allowed_core_blocks[] = 'core/video';
    }

    return $allowed_core_blocks;
  }
}

$disableCoreBlocks = new DisableCoreBlocks();