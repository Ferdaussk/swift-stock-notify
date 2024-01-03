<?php
namespace ProdSSNFY;
if ( ! defined( 'ABSPATH' ) ) exit;
use ProdSSNFY\PageSettings\Page_Settings;
define( "SSNFY_ASFSK_ASSETS_PUBLIC_DIR_FILE", plugin_dir_url( __FILE__ ) . "../assets/public" );
define( "SSNFY_ASFSK_ASSETS_ADMIN_DIR_FILE", plugin_dir_url( __FILE__ ) . "../assets/admin" );
class ClassProdSSNFY {
	private static $_instance = null;
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function ssnfy_all_assets_for_the_admin(){
        wp_enqueue_script( 'ssnfy-script', plugin_dir_url( __FILE__ ) . '../assets/admin/script.js', array('jquery'), '1.0', true );
        wp_enqueue_style( 'ssnfy-order', plugin_dir_url( __FILE__ ) . '../assets/admin/order.css', null, '1.0', 'all' );
		if (isset($_GET['page']) && $_GET['page'] === 'get-swift-stock-notify') {
            wp_enqueue_script( 'ssnfy-wheelcolorpicker', plugin_dir_url( __FILE__ ) . '../assets/admin/colorpicker/jquery.wheelcolorpicker.js', array('jquery'), '1.0', true );
            $all_css_js_file = array(
                'ssnfy-style' => array('ssnfy_path_define'=>SSNFY_ASFSK_ASSETS_ADMIN_DIR_FILE . '/style.css'),
                'ssnfy-wheelcolorpicker' => array('ssnfy_path_define'=>SSNFY_ASFSK_ASSETS_ADMIN_DIR_FILE . '/colorpicker/wheelcolorpicker.css'),
            );
            foreach($all_css_js_file as $handle => $fileinfo){
                wp_enqueue_style( $handle, $fileinfo['ssnfy_path_define'], null, '1.0', 'all');
            }
        }
	}

	public function ssnfy_all_assets_for_the_public(){
        wp_enqueue_style( 'ssnfy-order', plugin_dir_url( __FILE__ ) . '../assets/public/style.css', null, '1.0', 'all' );
        wp_enqueue_script( 'ssnfy-order', plugin_dir_url( __FILE__ ) . '../assets/public/script.js', ['jquery'], '1.0', true );
	}

	public function ssnfy_admin_menu_test(){
		if(current_user_can('manage_options')){
			add_menu_page(
				esc_html__('Swift Stock Notify', 'swift-stock-notify'),
				esc_html__('Swift Stock Notify', 'swift-stock-notify'),
				'manage_options',
				'get-swift-stock-notify',
				array($this, 'ssnfy_plugin_submenu_about_plugin_page'),
				'dashicons-buddicons-pm',
				56
			);
		}
    add_action('admin_init', array($this, 'ssnfy_admin_controls'));
	}
    public function ssnfy_admin_controls() {
        include __DIR__ . '/../dashboard/controls.php';
    }

	public function ssnfy_plugin_submenu_about_plugin_page() {
        include __DIR__ . '/../dashboard/dashboard-style.php';
    }
    
    public function ssnfy_plugin_function_for_datas_callback() {}

    public function ssnfy_plugin_settings_to_whitelist( $options ) {
      $options['ssnfy-plugin-settings'] = array(
        'ssnfy-checkout-page-check',
        // *** reason
        'ssnfy-reason-color',
        'ssnfy-reason-fontsize',
        'ssnfy-reason-fontweight',
        'ssnfy-reason-fontfamilly',
        // *** estimdate
        'ssnfy-estimdate-color',
        'ssnfy-estimdate-fontsize',
        'ssnfy-estimdate-fontweight',
        'ssnfy-estimdate-fontfamilly',
        // *** estimass
        'ssnfy-estimass-color',
        'ssnfy-estimass-fontsize',
        'ssnfy-estimass-fontweight',
        'ssnfy-estimass-fontfamilly',
        // headline bg
        'ssnfy-estimass-bgcolor5',
        'ssnfy-reason-box-shadow5',
        'ssnfy-reason-border-radius5',
        // expand bg
        'ssnfy-estimass-bgcolorEX',
        'ssnfy-reason-box-shadowEX',
        'ssnfy-reason-border-radiusEX',
      );
      return $options;
    }

    public function ssnfy_taxoes_styles(){
        // *** reason
        $ssnfy_reason_color_value = get_option( 'ssnfy-reason-color' );
        $ssnfy_reason_bgcolor_value = get_option( 'ssnfy-reason-bgcolor' );
        $ssnfy_reason_fontsize_value = get_option( 'ssnfy-reason-fontsize');
        $ssnfy_reason_fontweight_value = get_option( 'ssnfy-reason-fontweight');
        $ssnfy_reason_fontfamilly_value = get_option( 'ssnfy-reason-fontfamilly' );
        // *** estimdate
        $ssnfy_estimdate_color_value = get_option( 'ssnfy-estimdate-color');
        $ssnfy_estimdate_fontsize_value = get_option( 'ssnfy-estimdate-fontsize');
        $ssnfy_estimdate_fontweight_value = get_option( 'ssnfy-estimdate-fontweight');
        $ssnfy_estimdate_fontfamilly_value = get_option( 'ssnfy-estimdate-fontfamilly');
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
        $html = "<style>
        .ssnfy-msg-l{
            color:{$ssnfy_reason_color_value} !important;
            font-size:{$ssnfy_reason_fontsize_value} !important;
            font-weight:{$ssnfy_reason_fontweight_value} !important;
            font-family:{$ssnfy_reason_fontfamilly_value} !important;
        }
        .ssnfy-email-l{
            color:{$ssnfy_estimdate_color_value} !important;
            font-size:{$ssnfy_estimdate_fontsize_value} !important;
            font-weight:{$ssnfy_estimdate_fontweight_value} !important;
            font-family:{$ssnfy_estimdate_fontfamilly_value} !important;
        }
        .ssnfy-submit{
            color:{$ssnfy_estimass_toptitle_color_value} !important;
            background-color:{$ssnfy_estimass_toptitle_bgcolor_value} !important;
            font-size:{$ssnfy_estimass_toptitle_fontsize_value} !important;
            font-weight:{$ssnfy_estimass_toptitle_fontweight_value} !important;
            font-family:{$ssnfy_estimass_toptitle_fontfamilly_value} !important;
        }
        .custom-stock-notification-message{
            color:{$ssnfy_estimass_color_value} !important;
            font-size:{$ssnfy_estimass_fontsize_value} !important;
            font-weight:{$ssnfy_estimass_fontweight_value} !important;
            font-family:{$ssnfy_estimass_fontfamilly_value} !important;
        }
        #openFormButton{
            background:{$ssnfy_estimass_bgcolor5_value} !important;
            box-shadow:{$ssnfy_estimass_box_shadow5_value} !important;
            border-radius:{$ssnfy_estimass_radius5_value} !important;
        }
        #ssnfyPopup{
            background:{$ssnfy_estimass_bgcolorEX_value} !important;
            box-shadow:{$ssnfy_estimass_box_shadowEX_value} !important;
            border-radius:{$ssnfy_estimass_radiusEX_value} !important;
        }
        ";
        $html .= '</style>';
        echo $html;
    }

    public function ssnfy_settings_plugin_action_link($links, $file) {
        if (plugin_basename(__FILE__) == $file) {
            $ssnfy_settings_link = '<a href="' . admin_url('admin.php?page=get-swift-stock-notify') . '" target="_blank">' . esc_html__('Settings', 'swift-stock-notify') . '</a>';
            array_push($links, $ssnfy_settings_link);
        }
        return $links;
    }

    public function ssnfy_wooc_share(){
        echo ssnfy_sk_single();
    }

    public function ssnfy_product_meta_start(){
        echo ssnfy_sk_single();
    }

    public function ssnfy_after_single_product_summary(){
        echo ssnfy_sk_single();
    }

    public function ssnfy_before_single_product_summary(){
        echo ssnfy_sk_single();
    }

    public function ssnfy_after_single_product(){
        echo ssnfy_sk_single();
    }

    public function ssnfy_add_custom_postbox() {
        global $post;
        $custom_checkbox_inventory = get_post_meta($post->ID, 'stock_req_check', true);
        $checked = empty($custom_checkbox_inventory) || $custom_checkbox_inventory === 'yes' ? 'yes' : 'no';
        woocommerce_wp_checkbox(
            array(
                'id'            => 'stock_req_check',
                'label'         => __('Stock Request Check', 'wproduct-estimated-shipping-date'),
                'description'   => __('Check here to show stock request form for the product.'),
                'desc_tip'      => true,
                'value'         => $checked ,
            )
        );
    }
    
    public function ssnfy_save_custom_postbox_data($product_id) {
        $checkbox_value = isset($_POST['stock_req_check']) && $_POST['stock_req_check'] === 'yes' ? 'yes' : 'no';
        update_post_meta($product_id, 'stock_req_check', $checkbox_value);
    }

	public function __construct() {
        add_action('woocommerce_process_product_meta', [$this, 'ssnfy_save_custom_postbox_data']);
        add_action('woocommerce_product_options_inventory_product_data', [$this, 'ssnfy_add_custom_postbox']);
        // Last Date 
        if(get_option( 'ssnfy-checkout-page-check', 'before_add_to_cart_button' )=='before_add_to_cart_button'){
            add_action('woocommerce_share', [$this, 'ssnfy_wooc_share']); // For woocommerce_share
        }elseif(get_option( 'ssnfy-checkout-page-check' )=='after_add_to_cart_button'){
            add_action('woocommerce_product_meta_start', [$this, 'ssnfy_product_meta_start']); // For woocommerce_product_meta_start (woocommerce_product_meta_start)
        }elseif(get_option( 'ssnfy-checkout-page-check')=='after_single_product_summary'){
            add_action('woocommerce_after_single_product_summary', [$this, 'ssnfy_after_single_product_summary']); // For after_single_product_summary
        }elseif(get_option( 'ssnfy-checkout-page-check')=='before_single_product_summary'){
            add_action('woocommerce_before_single_product_summary', [$this, 'ssnfy_before_single_product_summary']); // For before_single_product_summary
        }elseif(get_option( 'ssnfy-checkout-page-check')=='after_single_product'){
            add_action('woocommerce_after_single_product', [$this, 'ssnfy_after_single_product']); // For after_single_product
        }
		add_filter( 'plugin_action_links', [$this,'ssnfy_settings_plugin_action_link'], 10, 2 );
		add_filter( 'whitelist_options', [$this,'ssnfy_plugin_settings_to_whitelist'] );
        add_action('admin_enqueue_scripts', [$this, 'ssnfy_all_assets_for_the_admin']);
        add_action('wp_enqueue_scripts', [$this, 'ssnfy_all_assets_for_the_public']);
		add_action('admin_menu', [$this,'ssnfy_admin_menu_test']);
        add_action('wp_head', [$this, 'ssnfy_taxoes_styles'],99);
	}
}
ClassProdSSNFY::instance();

