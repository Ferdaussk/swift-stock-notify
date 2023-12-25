<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function ssnfy_sk_single(){
    global $product;
    $product_id = get_the_id();
    $this_is_checkss = get_post_meta($product_id, '_custom_checkbox_inventory', true); // This is the correct function
    if($this_is_checkss==true){
        if (!$product->is_in_stock()) {
            echo !empty(get_option( 'wpesd-top-title-check'))?'<button id="openFormButton">'.esc_html(get_option( 'wpesd-top-title-check','Stock Request')).'</button>':'';
            echo '<div id="ssnfyOverlay"></div>';
            // Product is out of stock, display notification or form
            echo '<div id="ssnfyPopup" class="ssnfy-form-wrap">';
                echo '<div class="custom-stock-notification-message">'.esc_html__('This product is currently out of stock.','swift-stock-notify').'</div>';

                // Add a form for users to apply for stock notification
                echo '<form class="custom-stock-notification-form" method="post">';
                echo '<label class="ssnfy-email-l" for="email">'.esc_html__('Enter your email to receive a notification when the product is back in stock:','swift-stock-notify').'</label>';
                echo '<input type="email" name="email" placeholder="E-mail here" required>';
                echo '<label class="ssnfy-msg-l" for="name">'.esc_html__('Your Message (Optional):','swift-stock-notify').'</label>';
                echo '<input type="text" name="name" placeholder="What do you want to say?"><br>';
                echo '<input class="ssnfy-submit" type="submit" name="submit_notification" value="Submit">';
                echo '</form>';
            echo '</div>';
            // Handle form submission
            if (isset($_POST['submit_notification'])) {
                $email = sanitize_email($_POST['email']);
                $text = sanitize_text_field($_POST['name']);

                if (is_email($email)) {
                    // Save the email or perform other actions (e.g., store in a database)
                    // For simplicity, we're just displaying a success message
                    echo '<p class="custom-stock-notification-success">'.esc_html__('Notification submitted successfully!','swift-stock-notify').'</p>';

                    // Send email notification
                    $subject = 'Stock Notification';
                    $message = $text.' <----> A user has requested notification for product ('.$product->get_name().') restock. Requested email: ' . $email;
                    $headers = array('Content-Type: text/html; charset=UTF-8');

                    // Replace 'your@email.com' with the actual email address where you want to receive notifications
                    $admin_email = 'ferdauskhansk4925@gmail.com';

                    wp_mail($admin_email, $subject, $message, $headers);
                } else {
                    echo '<p class="custom-stock-notification-error">'.esc_html__('Invalid email address. Please try again.','swift-stock-notify').'</p>';
                }
            }
        }
    }
}