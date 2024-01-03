<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// Taxos label check
$ssnfy_checkout_page_check = get_option( 'ssnfy-checkout-page-check', 'after_add_to_cart_button' );
// Label controls
// *** top title
$ssnfy_estimass_toptitle_color_value = get_option( 'ssnfy-estimass-toptitle-color');
$ssnfy_estimass_toptitle_bgcolor_value = get_option( 'ssnfy-estimass-toptitle-bgcolor');
$ssnfy_estimass_toptitle_fontsize_value = get_option( 'ssnfy-estimass-toptitle-fontsize');
$ssnfy_estimass_toptitle_fontweight_value = get_option( 'ssnfy-estimass-toptitle-fontweight');
$ssnfy_estimass_toptitle_fontfamilly_value = get_option( 'ssnfy-estimass-toptitle-fontfamilly');
// *** estimass
$ssnfy_estimass_color_value = get_option( 'ssnfy-estimass-color');
$ssnfy_estimass_fontsize_value = get_option( 'ssnfy-estimass-fontsize');
$ssnfy_estimass_fontweight_value = get_option( 'ssnfy-estimass-fontweight');
$ssnfy_estimass_fontfamilly_value = get_option( 'ssnfy-estimass-fontfamilly');
// headline bg
$ssnfy_estimass_bgcolor5_value = get_option( 'ssnfy-estimass-bgcolor5' );
$ssnfy_estimass_box_shadow5_value = get_option( 'ssnfy-reason-box-shadow5' );
$ssnfy_estimass_radius5_value = get_option( 'ssnfy-reason-border-radius5' );
// expand bg
$ssnfy_estimass_bgcolorEX_value = get_option( 'ssnfy-estimass-bgcolorEX' );
$ssnfy_estimass_box_shadowEX_value = get_option( 'ssnfy-reason-box-shadowEX' );
$ssnfy_estimass_radiusEX_value = get_option( 'ssnfy-reason-border-radiusEX' );
// *** estimdate
$ssnfy_estimass_presets_value = get_option( 'ssnfy-estimass-presets', 'reciver@mail.com' );
$ssnfy_top_title_check_check = get_option( 'ssnfy-top-title-check','Stock Request');
// *** reason
$ssnfy_reason_color_value = get_option( 'ssnfy-reason-color' );
$ssnfy_reason_fontsize_value = get_option( 'ssnfy-reason-fontsize');
$ssnfy_reason_fontweight_value = get_option( 'ssnfy-reason-fontweight');
$ssnfy_reason_fontfamilly_value = get_option( 'ssnfy-reason-fontfamilly' );
// *** estimdate
$ssnfy_estimdate_color_value = get_option( 'ssnfy-estimdate-color');
$ssnfy_estimdate_fontsize_value = get_option( 'ssnfy-estimdate-fontsize');
$ssnfy_estimdate_fontweight_value = get_option( 'ssnfy-estimdate-fontweight');
$ssnfy_estimdate_fontfamilly_value = get_option( 'ssnfy-estimdate-fontfamilly');
// Get all font here start
$all_fonts = [
	'' => esc_html__('Default', 'swift-stock-notify'),
	'Arial, sans-serif' => esc_html__('Arial', 'swift-stock-notify'),
	'Helvetica, sans-serif' => esc_html__('Helvetica', 'swift-stock-notify'),
	'Georgia, serif' => esc_html__('Georgia', 'swift-stock-notify'),
	'fantasy' => esc_html__('Fantasy', 'swift-stock-notify'),
	'Tahoma, sans-serif' => esc_html__('Tahoma', 'swift-stock-notify'),
	'Courier New, monospace' => esc_html__('Courier New', 'swift-stock-notify'),
	'Palatino, serif' => esc_html__('Palatino', 'swift-stock-notify'),
	'Garamond, serif' => esc_html__('Garamond', 'swift-stock-notify'),
	'Century Gothic, sans-serif' => esc_html__('Century Gothic', 'swift-stock-notify'),
	'Futura, sans-serif' => esc_html__('Futura', 'swift-stock-notify'),
	'Roboto, sans-serif' => esc_html__('Roboto', 'swift-stock-notify'),
	'Open Sans, sans-serif' => esc_html__('Open Sans', 'swift-stock-notify'),
	'Lato, sans-serif' => esc_html__('Lato', 'swift-stock-notify'),
	'Montserrat, sans-serif' => esc_html__('Montserrat', 'swift-stock-notify'),
	'Raleway, sans-serif' => esc_html__('Raleway', 'swift-stock-notify'),
	'Poppins, sans-serif' => esc_html__('Poppins', 'swift-stock-notify'),
	'Nunito, sans-serif' => esc_html__('Nunito', 'swift-stock-notify'),
	'Playfair Display, serif' => esc_html__('Playfair Display', 'swift-stock-notify'),
	'Quicksand, sans-serif' => esc_html__('Quicksand', 'swift-stock-notify'),
];
?>
<div class="admin-panel">
  <form method="post" action="options.php">
    <div class="header">
			<?php
			settings_fields( 'ssnfy-plugin-settings' );
      ?>
      <a href="https://bestwpdeveloper.com/" target="_blank"><h1 class="dashboard-title"><?php echo esc_html__('BEST WP DEVELOPER', 'swift-stock-notify'); ?></h1></a>
      <?php
			do_settings_sections( 'ssnfy-plugin-main-menu' );
      ?>
      <div class="save-button">
        <?php submit_button(); ?>
      </div>
    </div>
    <div class="section">
      <div class="clmn-wrap first-clm">
        <div class="select-container">
          <label for=""><?php echo esc_html__('Reciver mail', 'swift-stock-notify');?></label>
          <?php echo '<input type="text" name="ssnfy-estimass-presets" id="ssnfy-estimass-presets" value="'.$ssnfy_estimass_presets_value.'" title="Text"  placeholder="Reciver mail here" required>';?>
        </div>
        <div class="list-container ssnfy_cmmn_chacthak">
          <label class="qape_title"><?php echo esc_html__('Request btn', 'wproduct-estimated-shipping-date'); ?></label>
          <?php echo '<input type="text" name="ssnfy-top-title-check" id="ssnfy-top-title-check" value="'.$ssnfy_top_title_check_check.'" title="Text"  placeholder="Swift Stock Notify">';?>
        </div>
        <div class="choose-page"><?php echo esc_html__('Single page position:', 'swift-stock-notify'); ?></div>
        <div class="list-container">
          <div class="list-item">
            <input type="radio" name="ssnfy-checkout-page-check" value="before_single_product_summary"
            <?php checked(get_option('ssnfy-checkout-page-check', 'off'), 'before_single_product_summary'); ?>>
            <label ><?php echo esc_html__('Before single product summary', 'swift-stock-notify'); ?></label>
          </div>
          <div class="list-item">
            <input type="radio" name="ssnfy-checkout-page-check" value="before_add_to_cart_button"
            <?php checked(get_option('ssnfy-checkout-page-check', 'off'), 'before_add_to_cart_button'); ?>>
            <label ><?php echo esc_html__('WooCommerce Share', 'swift-stock-notify'); ?></label>
          </div>
          <div class="list-item">
            <input type="radio" name="ssnfy-checkout-page-check" value="after_add_to_cart_button"
            <?php checked(get_option('ssnfy-checkout-page-check', 'off'), 'after_add_to_cart_button'); ?>>
            <label ><?php echo esc_html__('Product Meta Start', 'swift-stock-notify'); ?></label>
          </div>
          <div class="list-item">
            <input type="radio" name="ssnfy-checkout-page-check" value="after_single_product"
            <?php checked(get_option('ssnfy-checkout-page-check', 'off'), 'after_single_product'); ?>>
            <label ><?php echo esc_html__('After single product', 'swift-stock-notify'); ?></label>
          </div>
          <div class="list-item">
            <input type="radio" name="ssnfy-checkout-page-check" value="after_single_product_summary"
            <?php checked(get_option('ssnfy-checkout-page-check', 'off'), 'after_single_product_summary'); ?>>
            <label ><?php echo esc_html__('After single product summary', 'swift-stock-notify'); ?></label>
          </div>
        </div>
      </div>
      <div class="clmn-wrap secound-clm">
        <div class="control_row">
        <label for="" class="ssnfy_style_title"><?php echo esc_html__('Request btn', 'swift-stock-notify');?></label>
          <div class="color-control ssnfy-style-style">
            <label for=""><?php echo esc_html__('BG', 'swift-stock-notify');?></label>
            <?php echo '<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba"  name="ssnfy-estimass-bgcolor5" id="ssnfy-estimass-text" value="'.$ssnfy_estimass_bgcolor5_value.'" title="Text">';?>
          </div>
          <div class="text-control ssnfy-style-style">
            <label for=""><?php echo esc_html__('Box Shadow', 'swift-stock-notify');?></label>
            <?php echo '<input type="text" name="ssnfy-reason-box-shadow5" id="ssnfy-reason-box-shadow5" value="'.$ssnfy_estimass_box_shadow5_value.'" title="10px"  placeholder="0 0 10px rgb(104 104 104 / 50%)">';?>
          </div>
          <div class="text-control ssnfy-style-style">
            <label for=""><?php echo esc_html__('Border Radius', 'swift-stock-notify');?></label>
            <?php echo '<input type="text" name="ssnfy-reason-border-radius5" id="ssnfy-reason-border-radius5" value="'.$ssnfy_estimass_radius5_value.'" title="10px"  placeholder="px, %, rem">';?>
          </div>
          <div class="ssnfy_top_title">
            <label for="" class="ssnfy_style_title"><?php echo esc_html__('Submit btn', 'swift-stock-notify');?></label>
            <div class="color-control ssnfy-style-style">
              <label for=""><?php echo esc_html__('Color', 'swift-stock-notify');?></label>
              <?php echo '<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="ssnfy-estimass-toptitle-color" id="ssnfy-estimass-text" value="'.$ssnfy_estimass_toptitle_color_value.'" title="Text">';?>
            </div>
            <div class="color-control ssnfy-style-style">
              <label for=""><?php echo esc_html__('BG Color', 'swift-stock-notify');?></label>
              <?php echo '<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="ssnfy-estimass-toptitle-bgcolor" id="ssnfy-estimass-text" value="'.$ssnfy_estimass_toptitle_bgcolor_value.'" title="Text">';?>
            </div>
            <div class="text-control ssnfy-style-style">
              <label for=""><?php echo esc_html__('Font size', 'swift-stock-notify');?></label>
              <?php echo '<input type="text" name="ssnfy-estimass-fontsize" id="ssnfy-estimass-toptitle-fontsize" value="'.$ssnfy_estimass_toptitle_fontsize_value.'" title="10px"  placeholder="px, %, rem">';?>
            </div>
            <div class="number-control ssnfy-style-style">
              <label for=""><?php echo esc_html__('Font weight', 'swift-stock-notify');?></label>
              <?php echo '<input type="text" name="ssnfy-estimass-toptitle-fontweight" id="ssnfy-estimass-fontweight" value="'.$ssnfy_estimass_toptitle_fontweight_value.'" title="Number"  placeholder="400">';?>
            </div>
            <div class="select-control ssnfy-style-style">
              <label for=""><?php echo esc_html__('Font family', 'swift-stock-notify');?></label>
              <?php
              echo '<select id="ssnfy-estimass-fontfamilly" name="ssnfy-estimass-toptitle-fontfamilly">';
                foreach($all_fonts as $font_slug => $font_title){
                  echo '<option value="'.esc_attr($font_slug).'" '.selected(esc_attr($ssnfy_estimass_toptitle_fontfamilly_value),esc_attr($font_slug)).'>'.esc_html__($font_title,'swift-stock-notify').'</option>';
                }
              echo '</select>';
              ?>
            </div>
          </div>

        </div>
        <div class="control_row">
          <label for="" class="ssnfy_style_title"><?php echo esc_html__('Stock Notice', 'swift-stock-notify');?></label>
          <div class="color-control ssnfy-style-style">
            <label for=""><?php echo esc_html__('Color', 'swift-stock-notify');?></label>
            <?php echo '<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="ssnfy-estimass-color" id="ssnfy-estimass-text" value="'.$ssnfy_estimass_color_value.'" title="Text">';?>
          </div>
          <div class="text-control ssnfy-style-style">
            <label for=""><?php echo esc_html__('Font size', 'swift-stock-notify');?></label>
            <?php echo '<input type="text" name="ssnfy-estimass-fontsize" id="ssnfy-estimass-fontsize" value="'.$ssnfy_estimass_fontsize_value.'" title="10px"  placeholder="px, %, rem">';?>
          </div>
          <div class="number-control ssnfy-style-style">
            <label for=""><?php echo esc_html__('Font weight', 'swift-stock-notify');?></label>
            <?php echo '<input type="text" name="ssnfy-estimass-fontweight" id="ssnfy-estimass-fontweight" value="'.$ssnfy_estimass_fontweight_value.'" title="Number"  placeholder="400">';?>
          </div>
          <div class="select-control ssnfy-style-style">
            <label for=""><?php echo esc_html__('Font family', 'swift-stock-notify');?></label>
            <?php
            echo '<select id="ssnfy-estimass-fontfamilly" name="ssnfy-estimass-fontfamilly">';
              foreach($all_fonts as $font_slug => $font_title){
                echo '<option value="'.esc_attr($font_slug).'" '.selected(esc_attr($ssnfy_estimass_fontfamilly_value),esc_attr($font_slug)).'>'.esc_html__($font_title,'swift-stock-notify').'</option>';
              }
            echo '</select>';
            ?>
          </div>

        </div>
        <div class="control_row">
        <label for="" class="ssnfy_style_title"><?php echo esc_html__('Email label', 'swift-stock-notify');?></label>
          <div class="color-control ssnfy-style-style">
            <label for=""><?php echo esc_html__('Color', 'swift-stock-notify');?></label>
            <?php echo '<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="ssnfy-estimdate-color" id="ssnfy-estimdate-text" value="'.$ssnfy_estimdate_color_value.'" title="Text">';?>
          </div>
          <div class="text-control ssnfy-style-style">
            <label for=""><?php echo esc_html__('Font size', 'swift-stock-notify');?></label>
            <?php echo '<input type="text" name="ssnfy-estimdate-fontsize" id="ssnfy-estimdate-fontsize" value="'.$ssnfy_estimdate_fontsize_value.'" title="10px"  placeholder="px, %, rem">';?>
          </div>
          <div class="number-control ssnfy-style-style">
            <label for=""><?php echo esc_html__('Font weight', 'swift-stock-notify');?></label>
            <?php echo '<input type="text" name="ssnfy-estimdate-fontweight" id="ssnfy-estimdate-fontweight" value="'.$ssnfy_estimdate_fontweight_value.'" title="Number"  placeholder="400">';?>
          </div>
          <div class="select-control ssnfy-style-style">
            <label for=""><?php echo esc_html__('Font family', 'swift-stock-notify');?></label>
            <?php
            echo '<select id="ssnfy-estimdate-fontfamilly" name="ssnfy-estimdate-fontfamilly">';
              foreach($all_fonts as $font_slug => $font_title){
                echo '<option value="'.esc_attr($font_slug).'" '.selected(esc_attr($ssnfy_estimdate_fontfamilly_value),esc_attr($font_slug)).'>'.esc_html__($font_title,'swift-stock-notify').'</option>';
              }
            echo '</select>';
            ?>
          </div>
        </div>
        <div class="control_row">
        <label for="" class="ssnfy_style_title"><?php echo esc_html__('Message label', 'swift-stock-notify');?></label>
          <div class="color-control ssnfy-style-style">
            <label for=""><?php echo esc_html__('Color', 'swift-stock-notify');?></label>
            <?php echo '<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="ssnfy-reason-color" id="ssnfy-reason-color" value="'.$ssnfy_reason_color_value.'" title="Text">';?>
          </div>
          <div class="text-control ssnfy-style-style">
            <label for=""><?php echo esc_html__('Font size', 'swift-stock-notify');?></label>
            <?php echo '<input type="text" name="ssnfy-reason-fontsize" id="ssnfy-reason-fontsize" value="'.$ssnfy_reason_fontsize_value.'" title="10px"  placeholder="px, %, rem">';?>
          </div>
          <div class="number-control ssnfy-style-style">
            <label for=""><?php echo esc_html__('Font weight', 'swift-stock-notify');?></label>
            <?php echo '<input type="text" name="ssnfy-reason-fontweight" id="ssnfy-reason-fontweight" value="'.$ssnfy_reason_fontweight_value.'" title="Number"  placeholder="400">';?>
          </div>
          <div class="select-control ssnfy-style-style">
            <label for=""><?php echo esc_html__('Font family', 'swift-stock-notify');?></label>
            <?php
            echo '<select id="ssnfy-reason-fontfamilly" name="ssnfy-reason-fontfamilly">';
              foreach($all_fonts as $font_slug => $font_title){
                echo '<option value="'.esc_attr($font_slug).'" '.selected(esc_attr($ssnfy_reason_fontfamilly_value),esc_attr($font_slug)).'>'.esc_html__($font_title,'swift-stock-notify').'</option>';
              }
            echo '</select>';
            ?>
          </div>
        </div>
        <div class="control_row">
        <label for="" class="ssnfy_style_title"><?php echo esc_html__('Popup wrap', 'swift-stock-notify');?></label>
          <div class="color-control ssnfy-style-style">
            <label for=""><?php echo esc_html__('BG', 'swift-stock-notify');?></label>
            <?php echo '<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba"  name="ssnfy-estimass-bgcolorEX" id="ssnfy-estimass-text" value="'.$ssnfy_estimass_bgcolorEX_value.'" title="Text">';?>
          </div>
          <div class="text-control ssnfy-style-style">
            <label for=""><?php echo esc_html__('Box Shadow', 'swift-stock-notify');?></label>
            <?php echo '<input type="text" name="ssnfy-reason-box-shadowEX" id="ssnfy-reason-box-shadow5" value="'.$ssnfy_estimass_box_shadowEX_value.'" title="10px"  placeholder="0 0 10px rgb(104 104 104 / 50%)">';?>
          </div>
          <div class="text-control ssnfy-style-style">
            <label for=""><?php echo esc_html__('Border Radius', 'swift-stock-notify');?></label>
            <?php echo '<input type="text" name="ssnfy-reason-border-radiusEX" id="ssnfy-reason-border-radius5" value="'.$ssnfy_estimass_radiusEX_value.'" title="10px"  placeholder="px, %, rem">';?>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
