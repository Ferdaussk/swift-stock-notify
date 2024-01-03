<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function ssnfy_sk_single(){
    global $product;
    $product_id = get_the_id();
    $this_is_checkss = get_post_meta($product_id, 'stock_req_check', true); // This is the correct function
    if($this_is_checkss==true){
        if (!$product->is_in_stock()) {
            echo !empty(get_option( 'ssnfy-top-title-check','Stock Request'))?'<button id="openFormButton">'.esc_html(get_option( 'ssnfy-top-title-check','Stock Request')).'</button>':esc_html__('Please type the button name.','swift-stock-notify');
            echo '<div id="ssnfyOverlay"></div>';
            // Product is out of stock, display notification or form
            echo '<div id="ssnfyPopup" class="ssnfy-form-wrap">';
                echo '<div class="custom-stock-notification-message">'.esc_html__('This product is currently out of stock.','swift-stock-notify').'</div>';

                // Add a form for users to apply for stock notification
                echo '<form class="custom-stock-notification-form" method="post">';
                echo '<label class="ssnfy-email-l" for="email">'.esc_html__('Enter your email to receive a notification when the product is back in stock:','swift-stock-notify').'</label>';
                echo '<input type="email" class="ssnfy-email-input" name="email" placeholder="E-mail here" required>';
                echo '<label class="ssnfy-msg-l" for="name">'.esc_html__('Your Message (Optional):','swift-stock-notify').'</label>';
                echo '<input type="text" class="ssnfy-msg-input" name="name" placeholder="What do you want to say?" value="Requested"><br>';
                echo '<input class="ssnfy-submit" type="submit" name="submit_notification" value="Submit">';
                echo '</form>';
            echo '</div>';
            // Handle form submission
            if (isset($_POST['submit_notification'])) {
                $email = sanitize_email($_POST['email']);
                $text = sanitize_text_field($_POST['name']);

                if (is_email($email)) {
                    // For simplicity, we're just displaying a success message
                    echo '<p class="custom-stock-notification-success">'.esc_html__('Notification submitted successfully!','swift-stock-notify').'</p>';

                    // Send email notification
                    $subject = esc_html__('Stock Notification','swift-stock-notify');
                    $OptionalMsg = 
                    $message = '<div><h2>'.esc_html__('A user has requested notification for product ','swift-stock-notify').'<b style="color:red">('.$product->get_name().')</b>'.esc_html__(' restock. ','swift-stock-notify').'<b>'.esc_html__('Requested email: ','swift-stock-notify').'</b>' . $email.'</h2></br><p><b>'.esc_html__('Massage: ','swift-stock-notify').'</b>'.$text.'</p></div>';
                    $headers = array('Content-Type: text/html; charset=UTF-8');

                    // Email address where you want to receive notifications
                    $admin_email = get_option( 'ssnfy-estimass-presets', 'reciver@mail.com' );

                    wp_mail($admin_email, $subject, $message, $headers);
                } else {
                    echo '<p class="custom-stock-notification-error">'.esc_html__('Invalid email address. Please try again.','swift-stock-notify').'</p>';
                }
            }
        }
    }
}