<?php
session_start();
// Add product to session or create new one
// Add list products
if ($_POST["add_list_products"]) {
    $product_ids = $_POST['product_ids'];
    foreach ($product_ids as $value) {
        set_products_session($value, $location);
    }
// Add a product
} elseif ($_POST["add_product"]) {
    $product_id = $_POST['add_product'];
    set_products_session($product_id, $location);
// Update cart
} elseif ($_POST['update_cart']) {
    // update or remove items
    if(isset($_POST["product_qty"]) || isset($_POST["remove_code"]))
    {
    	// Update item quantity in product session
    	if(isset($_POST["product_qty"]) && is_array($_POST["product_qty"])){
    		foreach($_POST["product_qty"] as $key => $val){
                foreach ($val as $k => $value) {
                    if(is_numeric($value)){
        				$_SESSION["cart_products"][$location][$key]["product_op"][$k]["product_qty"] = $value;
        			}
                }
    		}
    	}
    	// Remove an item from product session
    	if(isset($_POST["remove_code"]) && is_array($_POST["remove_code"])){
    		foreach($_POST["remove_code"] as $key => $val){
                foreach ($val as $k) {
                    unset($_SESSION["cart_products"][$location][$key]["product_op"][$k]);
                }
                if (empty($_SESSION["cart_products"][$location][$key]["product_op"])) {
                    // Remove this group product data in session
                    unset($_SESSION["cart_products"][$location][$key]);
                }
    		}
    	}
    }
// Save order to database
} elseif ($_POST['save_order']) {
    global $wpdb;
    // Get current location id
    $location = get_current_location_id();
    // Get customer id
    $current_customer = get_current_customer();
    // Get total price
    $total_price = $_POST['total_price'];

    $insert_result = $wpdb->insert( 'orders',
        array(
            'customer_id' => $current_customer->id,
            'catalog_id' => $location,
            'total_price' => $total_price,
            'created' => current_time( 'mysql' )
        ),
        array(
            '%d',
            '%d',
            '%d',
            '%s'
        )
    );

    if ($insert_result) {
        // Get order id
        $order_id = $wpdb->insert_id;
        foreach ($_SESSION["cart_products"][$location] as $key => $item) {
            $product_detail = [
                'product_img' => $item['product_img'],
                'product_name' => $item['product_name']
            ];
            $product_detail = json_encode($product_detail);
            $insert_item_result = $wpdb->insert( 'order_items',
                array(
                    'order_id' => $order_id,
                    'product_detail' => $product_detail
                ),
                array(
                    '%d',
                    '%s'
                )
            );
            if ($insert_item_result) {
                $order_item_id = $wpdb->insert_id;
                foreach ($item['product_op'] as $k => $val) {
                    $product_spec_detail = [
                        'product_specification' => $val['product_specification'],
                        'product_price' => $val['product_price'],
                        'product_qty' => $val['product_qty']
                    ];
                    $product_spec_detail = json_encode($product_spec_detail);
                    $insert_item_spec_result = $wpdb->insert( 'order_items_spec',
                        array(
                            'order_items_id' => $order_item_id,
                            'product_spec_detail' => $product_spec_detail
                        ),
                        array(
                            '%d',
                            '%s'
                        )
                    );
                    if ($insert_item_spec_result) {
                        $quantity_stock = $val['qty_stock'] - $val['product_qty'];
                        $update_stock_result = $wpdb->update( 'shop_togashi_specification',
                            array( 'quantity_stock' => $quantity_stock ),
                            array( 'id' => $k ),
                            array( '%d'),
                            array( '%d')
                        );
                        if (!$update_stock_result) {
                            echo 'Update quantity_stock of product_id'.$key.' is failed';
                        }
                    } else {
                        echo 'Insert detail order of product_spec_id'.$k.' is failed';
                    }
                }
            } else {
                echo 'Insert detail order of product_id'.$key.' is failed';
            }
        }
        include_once(plugin_dir_path(__DIR__).'template/order-thanks.php');
        // Send order mail
        $mail_to = [
            'mail' => $current_customer->email_dk,
            'name' => $current_customer->company_name
        ];
        $mail_from = [
            'mail' => 'allgrowlabo.wp@gmail.com',
            'name' => 'Allgrow Labo'
        ];
        $mail_reply = [
            'mail' => 'allgrowlabo.wp@gmail.com',
            'name' => 'Allgrow Labo'
        ];
        $mail_subject = "レンタル備品の確認";
        $mail_setting = [
            'host' => 'smtp.gmail.com',
            'port' => 465,
            'user' => 'allgrowlabo.wp@gmail.com',
            'pass' => 'lugazayihryeroqd'
        ];
        $template_url = ABSPATH . 'wp-content/plugins/rental-goods/template/mail-order.php';
        $send_mail = send_mail($mail_to, $mail_from, $mail_reply, $mail_subject, $mail_setting, $template_url);
        // Remove session cart_products
        unset($_SESSION["cart_products"][$location]);
    } else {
        echo 'Insert order is failed';
    }
}

// Render to view cart
if (!$_POST['save_order']) {
    include_once(plugin_dir_path(__DIR__).'template/order-confirm.php');
}

/**
 * Sett session for list products
 * @param $product_id
 * @return array
 */
function set_products_session($product_id, $location)
{
    $product_qty = $_POST['product_qty'][$product_id];
    $group_product_id = $_POST['group_product_id'.$product_id];
    // If quantity > 0, add data to session
    if ($product_qty > 0) {
        // Update or create product session with new item
        $product_data = [];
        $product_data = [
            'product_specification'=> $_POST['product_specification'.$product_id],
            'product_price'=> $_POST['product_price'.$product_id],
            'product_qty'=> $product_qty,
            'qty_stock' => $_POST['qty_stock'.$product_id]
        ];
        if (!isset($_SESSION["cart_products"][$location][$group_product_id]['product_img'])) {
            $_SESSION["cart_products"][$location][$group_product_id]['product_img'] = $_POST['product_img'.$group_product_id];
        }
        if (!isset($_SESSION["cart_products"][$location][$group_product_id]['product_name'])) {
            $_SESSION["cart_products"][$location][$group_product_id]['product_name'] = $_POST['product_name'.$group_product_id];
        }
        $_SESSION["cart_products"][$location][$group_product_id]['product_op'][$product_id] = $product_data;
    }
}

?>
