<?php
/**
 * Plugin Name: Rental Goods
 * Description: Rental equipment
 * Version: 1.0
 * Author: NhiAGL
 */

/**
* Create bb for rental equipment
*/
defined( 'ORDER_LINK' ) OR define( 'ORDER_LINK', plugin_dir_path(__FILE__) );
function rental_good_create_db() {
	global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE orders (
		id bigint(20) NOT NULL AUTO_INCREMENT,
		customer_id bigint(20) NOT NULL,
        catalog_id bigint(20) NOT NULL,
        total_price float(10,2) NOT NULL,
        created datetime NOT NULL,
        PRIMARY KEY (id)
	) $charset_collate;
    CREATE TABLE order_items (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        order_id bigint(20) NOT NULL,
        product_detail text NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;
	CREATE TABLE order_items_spec (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        order_items_id bigint(20) NOT NULL,
        product_spec_detail text NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}
register_activation_hook( __FILE__, 'rental_good_create_db' );

// With current site, it will have own function, own UI,..
$current_site =  trim(get_blog_details()->path, '/');
// If current site is exhibitors
// if ($current_site == 'exhibitors') {
	/**
	* Register a custom menu page.
	*/
	function rental_goods_menu() {
	    add_menu_page(
	        __( 'Rental Goods'),
	        'レンタル備品',
	        'manage_options',
	        'rental-goods',
	        'rental_goods',
	        '',
	        3
	    );
	}
	add_action( 'admin_menu', 'rental_goods_menu' );

	// Add css
	function add_my_stylesheet() {
	    wp_enqueue_style( 'style', plugins_url( '/css/style.css', __FILE__ ) );
	}
	add_action('admin_print_styles', 'add_my_stylesheet');

	/**
	 * Format list equipments , group by shop_id field
	 * @param  $array
	 * @return array
	 */
	function format_list_equipments($array) {
		// Group by key
		$key = 'shop_id';
		// Common fields
		$common1 = 'item_imgs';
		$common2 = 'item_name';
		// Set key for list fields have different value
		$common3 = 'shop_op';

		$return = [];
		foreach ($array as $k => $item) {

		    $item = (array) $array[$k];
			$value_key = $item[$key];
			// Set value for common fields
			if (!isset($return[$value_key][$common1])) {
				$return[$value_key][$common1] = $item[$common1];
			}
			if (!isset($return[$value_key][$common2])) {
				$return[$value_key][$common2] = $item[$common2];
			}
			unset($item[$key], $item[$common1], $item[$common2]);

			$return[$value_key][$common3][] = $item;
		}
		return $return;
	}

	/**
	 * Get list products to sell
	 * @return array
	 */
	function get_list_equipments()
	{
		global $wpdb;
		$location = get_current_location_id();
		// $query = $wpdb->get_results(
		// 	"SELECT shop_togashi.item_imgs , shop_togashi.item_name , shop_togashi_specification.id, shop_togashi_specification.shop_id, shop_togashi_specification.specification , shop_togashi_specification.price , shop_togashi_specification.quantity_stock
		// 	 FROM shop_togashi
		// 	 INNER JOIN shop_togashi_specification
		// 	 ON shop_togashi.id = shop_togashi_specification.shop_id
		// 	 WHERE shop_togashi.status = 1 AND shop_togashi_specification.status = 1 AND shop_togashi_specification.quantity_stock > 0 AND location='".$location."'"
		// );
		$query=$wpdb->get_results("SELECT * FROM shop_togashi WHERE status=1 and location='".$location."' ORDER BY id DESC");
		if($query){
			foreach ($query as $key => $val) {
				
				$query_spec = $wpdb->get_results("SELECT id, specification, price, quantity_stock FROM shop_togashi_specification WHERE status = 1 AND shop_id = ".$val->id);
				// $val->shop_op=$query_spec;
				if($query_spec){
					$val->shop_op=$query_spec;
				}
			}
		}
		$listShopId = [];
		if (count($query) > 0) {
			// $listShopId = format_list_equipments($query);
			$listShopId = $query;
		}
		return $listShopId;
		// echo "<pre>";
		// print_r($query);
		// echo "</pre>";
	}

	/**
	 * Get current customer login
	 * @return array
	 */
	function get_current_customer()
	{
		global $wpdb;
		$login_email = wp_get_current_user()->user_email;
	    $current_customer = $wpdb->get_row($wpdb->prepare("SELECT id, company_name, email_dk FROM register_togashi WHERE email_dk = %s", $login_email));
		return $current_customer;
	}

	/**
	 * Get current localtion id
	 * @return int
	 */
	function get_current_location_id()
	{
		global $wpdb;
		$userlogin = wp_get_current_user()->user_email;    
		$company_curent = $wpdb->get_row("SELECT * FROM register_togashi WHERE email_dk = '".$userlogin."'");
		$get_location_ex = $wpdb->get_results("SELECT togashi_id, catalog_id FROM register_togashi_link WHERE togashi_id = '".$company_curent->id."' and status=1"); 
		$temp_location = array();
		foreach ($get_location_ex as $key) {
		  $temp_location[]= $key->catalog_id;
		}
		$location=$get_location_ex[0]->catalog_id;
		$location_list=$temp_location;   
		// $location = 1;
	    // $location_list = array(1, 2, 3, 4);
	    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $location_list) ) {
	        $location = $_SESSION['location'];
	    }
		return $location;
	}

	/**
	 * Get order detail by order id
	 * @param  $order_id
	 * @return array
	 */
	function get_order_detail($order_id)
	{
		global $wpdb;
		// Get list products from order_id
		$list_products = $wpdb->get_results($wpdb->prepare(
			"SELECT order_items.id, order_items.product_detail, order_items_spec.product_spec_detail
			 FROM order_items
			 INNER JOIN order_items_spec ON order_items.id = order_items_spec.order_items_id
			 WHERE order_items.order_id = %d",
			 $order_id
		));
		return $list_products;
	}

	/**
	 * Check product spec exist (case: update a product, their product spec is removed to add new spec)
	 * @param  $product_spec_id int
	 * @return boolean
	 */
	function check_product_spec_exist($product_spec_id)
	{
		global $wpdb;
		$product_spec = $wpdb->get_row($wpdb->prepare("SELECT * FROM shop_togashi_specification WHERE id = %d", $product_spec_id));
		if (!empty($product_spec)) {
			return true;
		}
		return false;
	}
	/**
	 *Get dealine of rental good
	 *@param $dealine
	 *@return int
	 */
	if( !function_exists('get_number_date') ) {
	    function get_number_date($dealine){
	        $subs_date=0;
	        if($dealine != NULL) {
	            $now = date('Y-m-d');
	            $now_date = strtotime($now);
	            $date = strtotime($dealine); 
	            $dateDiff = ($date-$now_date);
	            $subs_date = floor($dateDiff / (60*60*24));
	        }
	        return $subs_date;
	    }   
	}
	/**
	* Rental equipment
	*/
	function rental_goods()
	{
		// Check, did the current customer make a purchase?
		global $wpdb;
		// Get current customer id
		//$current_customer = get_current_customer();
		// Get current location id
		$location = get_current_location_id();
		$year=date('Y');
		$dealine_goods = $wpdb->get_row("SELECT dealine_goods FROM dealine_app WHERE location = '".$location."'AND date_setting LIKE '".$year."%'");
		$nows = date('Y-m-d');
	    $currentDay = strtotime($nows);
	    $date = strtotime($dealine_goods->dealine_goods); 
		if($dealine_goods){
			if($date>=$currentDay){
				// Get order id
				//$current_order = $wpdb->get_row($wpdb->prepare("SELECT id, total_price FROM orders WHERE customer_id = %d AND catalog_id = %d", $current_customer->id, $location));
				// current_order is empty
				//if ($current_order) {
					// Check session, check product spec exist or not
					if (isset($_SESSION["cart_products"]) && isset($_SESSION["cart_products"][$location])) {
						$count = 0;
						foreach ($_SESSION["cart_products"][$location] as $key => $value) {
							foreach ($value['product_op'] as $k => $item) {
								$exist = check_product_spec_exist($k);
								// If product was changed
								if (!$exist) {
									// unset($_SESSION["cart_products"][$location][$key]);
									// $count ++;
								}
							}
						}
						if ($count > 0) {
							// Redirect to page orders
							$note = 'Some products have just updated their information. Please add products to your shopping cart again. Thank you!';
							include_once(plugin_dir_path(__FILE__).'template/order.php');
							exit;
						}
					}
					// If action: add_product, add_list_products, update_cart , save_order
					if ($_POST['add_product'] || $_POST['add_list_products'] || $_POST['update_cart'] || $_POST['save_order'] ) {
						include_once(plugin_dir_path(__FILE__).'function/cart-update.php');
					} else {
						include_once(plugin_dir_path(__FILE__).'template/order.php');
					}
				// Display order detail
				//} else {
					//include_once(plugin_dir_path(__FILE__).'template/order-detail.php');
				//}
			}
			else{
				echo "<script>alert('レンタル備品 登録\\nの期限が切られています。\\n管理者へお知らせください。');</script>";
            	echo '<script type="text/javascript">
                        window.location = "'.admin_url('admin.php?page=dashboard').'";
                    </script>';
			}
		}
		else{
			echo "<script>alert('You can't register now.);</script>";
    		echo '<script type="text/javascript">window.location = "'.admin_url('admin.php?page=dashboard').'";</script>';
		}
	}

	if ( ! function_exists( 'send_mail' ) ) {
		function send_mail($mail_to, $mail_from, $mail_reply, $mail_subject, $mail_setting, $template_url) {
			// Get current location id
			$location = get_current_location_id();
			
			// Get content mail
			ob_start();
			include_once($template_url);
			$content = ob_get_contents();
			ob_clean();
			ob_end_flush();

			if( $content != "" )
			{
				require_once(plugin_dir_path(__FILE__).'lib/class.phpmailer.php');

				$mail = new PHPMailer();
				$mail->IsSMTP();
				$mail->SMTPDebug  = 0;  // Hiển thị thông báo
										// 0 = off
										// 1 = message + error
										// 2 = message

				$mail->Debugoutput = 'html';
				$mail->SMTPAuth    = true;
				$mail->SMTPSecure  = 'ssl';
				$mail->Host        = $mail_setting['host'];
				$mail->Port        = $mail_setting['port'];
				$mail->Username    = $mail_setting['user'];  //Mail gửi đi
				$mail->Password    = $mail_setting['pass'];

				// Mail người gửi
				$mail->setFrom($mail_from['mail'], $mail_from['name']);    /*Email hiển thị người gửi là ai, trường hợp ko dùng tên của gmail server*/

				// Mail người trả lời về
				$mail->addReplyTo($mail_reply['mail'], $mail_reply['name']);    /*Mail khi người nhận nhấn trả lời*/

				// Mail người nhận
				$mail->AddAddress($mail_to['mail'], $mail_to['name']);

				// Tiêu dề
				$mail->Subject = $mail_subject;

				// Charset
				$mail->CharSet = 'utf-8';

				$body = $content;

				//$mail->Body = $body;
				$mail->MsgHTML($body); //nội dung dạng html

				if($mail->Send()){
					return true;
				} else{
					return false;
				}
			}
		}
	}
// }

function detail_rental_goods(){
    add_submenu_page(
        'rental-goods',
        '申込済み備品',
        '申込済み備品',
        'manage_options',
        'order-details',
        'fc_detail_rental_goods' 
    );

}
add_action( 'admin_menu', 'detail_rental_goods' );	

function fc_detail_rental_goods()
{
	global $wpdb;
	// Get current customer id
	$current_customer = get_current_customer();
	// Get current location id
	$location = get_current_location_id();
	// Get order id
	$list_order = $wpdb->get_results($wpdb->prepare("SELECT id, total_price, created FROM orders WHERE customer_id = %d AND catalog_id = %d", $current_customer->id, $location));

	if( $_GET['id'] ) 
	{
		$order_id = $_GET['id'];
		$order_detail = array();
		foreach ($list_order as $val) {
			if( $val->id == $order_id ) {
				$order_detail = $val;
			}
		}
		include_once(ORDER_LINK.'/template/order-detail.php');
	} 
	else {
		include_once(ORDER_LINK.'/template/list-order.php');
	}
}
?>
