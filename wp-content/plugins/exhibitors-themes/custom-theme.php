<?php
/*
Plugin Name: Exhibitors Network
Plugin URI: http://example.com/
Description: My Network Exhibitors Theme.
Author: ms.thuyanit
Version: 1.0
Author URI: http://example.com
*/

include_once('my_functions.php');

if( !function_exists('my_get_location') ) {
	function my_get_location($sl=NULL) {
		$location = array(
			1 => '九州会場',
			2 => '東京会場',
			3 => '大阪会場',
			4 => '名古屋会場',
		);
		if( $sl != NULL && isset($location[$sl]) ) {
			return $location[$sl];
		}

		return $location;
	}	
}

function insert_style_theme() {
    wp_enqueue_style('my-admin-theme', plugins_url('admin.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'insert_style_theme');

//Hide Screen Options tab
function hide_screen_options_tab()
{
    return false;
}
add_filter('screen_options_show_screen', 'hide_screen_options_tab');

// Hide Help tab 
function hide_help() {
    echo '<style type="text/CSS">
           #contextual-help-link-wrap { display: none !important; }
         </style>';
}
add_action('admin_head', 'hide_help');
//Thay doi chữ Footer
function remove_footer_admin () {
	echo 'Copyright © tohgashi co., ltd. All Rights Reserved.';
}
add_filter('admin_footer_text', 'remove_footer_admin');

//remove vesion wp
function my_footer_shh() {
    remove_filter( 'update_footer', 'core_update_footer' ); 
}
add_action( 'admin_menu', 'my_footer_shh' );

//Remove Admin Menu Bar
function remove_admin_bar_links() {
global $wp_admin_bar;

//Remove WordPress Logo Menu Items
$wp_admin_bar->remove_menu('my-sites'); // 'Visit Site'
$wp_admin_bar->remove_menu('wp-logo'); // Removes WP Logo and submenus completely, to remove individual items, use the below mentioned codes
$wp_admin_bar->remove_menu('about'); // 'About WordPress'
$wp_admin_bar->remove_menu('wporg'); // 'WordPress.org'
$wp_admin_bar->remove_menu('documentation'); // 'Documentation'
$wp_admin_bar->remove_menu('support-forums'); // 'Support Forums'
$wp_admin_bar->remove_menu('feedback'); // 'Feedback'

//Remove Site Name Items
$wp_admin_bar->remove_menu('site-name'); // Removes Site Name and submenus completely, To remove individual items, use the below mentioned codes
$wp_admin_bar->remove_menu('edit-site'); // 'edit Site'
$wp_admin_bar->remove_menu('view-site'); // 'Visit Site'
$wp_admin_bar->remove_menu('dashboard'); // 'Dashboard'
$wp_admin_bar->remove_menu('themes'); // 'Themes'
$wp_admin_bar->remove_menu('widgets'); // 'Widgets'
$wp_admin_bar->remove_menu('menus'); // 'Menus'

// Remove Comments Bubble
$wp_admin_bar->remove_menu('comments');

//Remove Update Link if theme/plugin/core updates are available
$wp_admin_bar->remove_menu('updates');

//Remove '+ New' Menu Items
$wp_admin_bar->remove_menu('new-content'); // Removes '+ New' and submenus completely, to remove individual items, use the below mentioned codes
$wp_admin_bar->remove_menu('new-post'); // 'Post' Link
$wp_admin_bar->remove_menu('new-media'); // 'Media' Link
$wp_admin_bar->remove_menu('new-link'); // 'Link' Link
$wp_admin_bar->remove_menu('new-page'); // 'Page' Link
$wp_admin_bar->remove_menu('new-user'); // 'User' Link

// Remove 'Howdy, username' Menu Items
$wp_admin_bar->remove_menu('my-account'); // Removes 'Howdy, username' and Menu Items
$wp_admin_bar->remove_menu('user-actions'); // Removes Submenu Items Only
$wp_admin_bar->remove_menu('user-info'); // 'username'
$wp_admin_bar->remove_menu('edit-profile'); // 'Edit My Profile'
$wp_admin_bar->remove_menu('logout'); // 'Log Out'
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

//Ẩn Menu admin
function vnkings_admin_menus() {
   remove_menu_page( 'index.php' ); // Menu Bảng tin
   remove_menu_page( 'edit.php' ); // Menu Post
   remove_menu_page( 'upload.php' ); // Menu Media
   remove_menu_page( 'edit.php?post_type=page' ); // Menu Trang
   remove_menu_page( 'edit-comments.php' ); // Menu Bình luận
   remove_menu_page( 'themes.php' ); // Menu Giao diện
   remove_menu_page( 'plugins.php' ); // Menu Plugins
   remove_menu_page( 'users.php' ); // Menu Thành viên
   remove_menu_page( 'tools.php' ); // Menu Công cụ
   remove_menu_page( 'options-general.php' ); // Menu cài đặt
}
add_action( 'admin_menu', 'vnkings_admin_menus' );


// //add Logo Exhibitors
function add_logo_togashi(  ) {
	global $wp_admin_bar;
	$wp_admin_bar->add_menu(array('id' => 'logo', 'title' =>'<img src="http://zenchin-form.com/exhibitors/wp-content/plugins/exhibitors-themes/images/logo.png");>', 'href' => admin_url()));
}
 add_action( 'admin_bar_menu', 'add_logo_togashi');
 
  function add_select_location() {
	global $wp_admin_bar;
	$menu_id = 'Location';
	$wp_admin_bar->add_menu(array('id' => $menu_id, 'title' => __('Location'), 'href' => '/'));
}
add_action('admin_bar_menu', 'add_select_location', 101);
// //add location
// function add_location_admin_bar( $wp_admin_bar ) {
//   $location 	 = 1;
//   $location_list = array(1, 2, 3, 4);
//   if( isset($_SESSION['location']) && in_array($_SESSION['location'], $location_list) ) {
//       $location = $_SESSION['location'];
//   }
// 	$args = array(
// 		'id'    => 'location',
// 		'title' => my_get_location($location),
// 		'href'  => '#',
// 		'meta'  => array( 'class' => 'location' )
// 	);
// 	$wp_admin_bar->add_node( $args );
// }
//  add_action( 'admin_bar_menu', 'add_location_admin_bar', 100 );

// //add location
function add_location_admin_bar( $wp_admin_bar ) {
	global $wpdb;
	$user_login_nw = wp_get_current_user()->user_email;
	$get_user_nw = $wpdb->get_row("SELECT * FROM register_togashi WHERE email_dk = '".$user_login_nw."'");
	$get_location_user = $wpdb->get_results("SELECT togashi_id, catalog_id FROM register_togashi_link WHERE togashi_id = '".$get_user_nw->id."' and status=1");	
	
	$tmpv = array();
	foreach ($get_location_user as $key) {
	  $tmpv[]= $key->catalog_id;
	}
	$location=$get_location_user[0]->catalog_id;
	$location_list=$tmpv;	
  	//$location 	 = 1;
  	//$location_list = array(1, 2, 3, 4);
  
	if( isset($_SESSION['location']) && in_array($_SESSION['location'], $location_list) ) {
		$location = $_SESSION['location'];
	}
	$args = array(
		'id'    => 'location',
		'title' => my_get_location($location),
		'href'  => '#',
		'meta'  => array( 'class' => 'location' )
	);
	$wp_admin_bar->add_node( $args );
}
 add_action( 'admin_bar_menu', 'add_location_admin_bar', 100 );

//Select Location
session_start();
function select_location() {
	if( isset($_POST['select_go']) && isset($_POST['location']) ){
		$_SESSION['location'] = $_POST['location'];
		echo '<script type="text/javascript">
				window.location = "'.admin_url().'";
			</script>';
		exit;
	}
?>
<div id="select_location_admin">
	<form action="" method="post">
		<?php
		global $wpdb;
		$user_login = wp_get_current_user()->user_email;
		$get_user = $wpdb->get_row("SELECT * FROM register_togashi WHERE email_dk = '".$user_login."'");
		$get_location = $wpdb->get_results("SELECT * FROM register_togashi_link WHERE togashi_id = '".$get_user->id."' and status=1");
		// $get_location = $wpdb->get_results("SELECT * FROM register_togashi_link WHERE togashi_id = '".$get_user->id."'");
		?>
		<select name="location" id="select_location">
			<?php 
				foreach($get_location as $key =>$val){
					echo "<p>".$val->catalog_id."</p>" ;
			?>
			<?php if($val->catalog_id==1):?>
			<option value="1" <?php if(isset($_SESSION['location']) && $_SESSION['location']==1) echo 'selected=""' ?> >九州会場</option>
			<?php endif;?>
			
			<?php if($val->catalog_id==2):?>
			<option value="2" <?php if(isset($_SESSION['location']) && $_SESSION['location']==2) echo 'selected=""' ?> >東京会場</option>
				<?php endif;?>
			<?php if($val->catalog_id==3):?>
			<option value="3" <?php if(isset($_SESSION['location']) && $_SESSION['location']==3) echo 'selected=""' ?> >大阪会場</option>
				<?php endif;?>
			<?php if($val->catalog_id==4):?>
			<option value="4" <?php if(isset($_SESSION['location']) && $_SESSION['location']==4) echo 'selected=""' ?> >名古屋会場</option>
			<?php endif;?>
			<?php
				}
			?>
			<!--<option value="1" <?php //if(isset($_SESSION['location']) && $_SESSION['location']==1) echo 'selected=""' ?> >九州</option>
			<option value="2" <?php //if(isset($_SESSION['location']) && $_SESSION['location']==2) echo 'selected=""' ?> >東京</option>
			<option value="3" <?php //if(isset($_SESSION['location']) && $_SESSION['location']==3) echo 'selected=""' ?> >大阪</option>
			<option value="4" <?php //if(isset($_SESSION['location']) && $_SESSION['location']==4) echo 'selected=""' ?> >名古屋</option>-->
		</select>		
		<input name="select_go" id="select_go" type="submit" value="" />
	</form>
</div>
<?php
}
add_action( 'admin_bar_menu', 'select_location', 102);
function info_login(){
	global $wpdb;
  //hiện thông báo khi có người đăng ký mới
  $pedding_tmp = $wpdb->get_results( "SELECT COUNT(*) as allItem FROM register_togashi WHERE status = 0" );
  $pedding_all = 0;
  if( isset($pedding_tmp[0]->allItem) ) {
    $pedding_all = $pedding_tmp[0]->allItem;
  }
  
  global $current_user;
   get_currentuserinfo();

?>
<div id="info_login_admin">
	<div class="info_login">
		<div class="notice_msg">
			<?php
			global $wpdb;
			$log_u = wp_get_current_user()->user_email;
			$get_id_u = $wpdb->get_row("SELECT * FROM register_togashi WHERE email_dk = '".$log_u."'");
			$billing_u = $wpdb->get_row("SELECT *FROM exhibitor_payment WHERE register_id = ".$get_id_u->id);
			if(empty($billing_u)){?>
			<p class="number_msg">1</p>
			<div class="box_notice"><a href="<?php echo admin_url('admin.php?page=fee-billing-address'); ?>"><span class="red">出展料のご請求先をご登録してください</span></a></div>
			<?php	
			}
			else{
			?>
			<p class="number_msg"></p>
			<?php } ?>
		</div>
		<div class="username">
			<li><img src="<?php echo plugins_url('network-theme/images/person.png'); ?>">
			<?php 
			global $wpdb;
			$login_user = wp_get_current_user()->user_email;
			$data_login = $wpdb->get_row("SELECT * FROM register_togashi WHERE email_dk = '".$login_user."'");
				echo $data_login->company_name; 
			
			?>
			
			<img class="icon_arrow" src="<?php echo plugins_url('network-theme/images/show_info_login.png'); ?>">
				<ul>
					<li><a href="<?php echo admin_url('profile.php'); ?>">登録情報の変更</a></li>
					<li><a href="<?php echo wp_logout_url('wp-login.php?loggedout=true'); ?>">ログアウト</a></li>
				</ul>
			</li>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script> 
$(document).ready(function(){
    $("div.notice_msg").click(function(){
        $("div.box_notice").slideToggle("slow");
    });
});
</script>
<?php
}
add_action( 'admin_bar_menu', 'info_login', 103);
/*======================================================================================================================================
======================================================= DashBoard ======================================================================
======================================================================================================================================*/

defined( 'DASHBOARD_ADMIN' ) OR define( 'DASHBOARD_ADMIN', plugin_dir_path(__FILE__) );

// if( !function_exists('my_get_location') ) {
//   function my_get_location($sl=NULL) {
//     $location = array(
//       1 => '九州',
//       2 => '東京',
//       3 => '大阪',
//       4 => '名古屋',
//     );

//     if( $sl != NULL && isset($location[$sl]) ) {
//       return $location[$sl];
//     }

//     return $location;
//   } 
// }

function dashboard_admin_theme(){
    add_menu_page(
        __( 'Exhibitor', 'textdomain' ),
        null,
        'manage_options',
        'dashboard',
        'fc_dashboard_admin',
        '',
        1
    );
}
add_action( 'admin_menu', 'dashboard_admin_theme' );

function fc_dashboard_admin(){

  global $wpdb;
  //tat ca
  //$count_tmp = $wpdb->get_results( "SELECT COUNT(*) as allItem FROM register_togashi" );
  //$count_all = 0;
  //if( isset($count_tmp[0]->allItem) ) {
  //  $count_all = $count_tmp[0]->allItem;
  //}

  //cho duyet
  //$pedding_tmp = $wpdb->get_results( "SELECT COUNT(*) as allItem FROM register_togashi WHERE status = 0" );
  //$pedding_all = 0;
  //if( isset($pedding_tmp[0]->allItem) ) {
  //  $pedding_all = $pedding_tmp[0]->allItem;
  //}

  //tu choi duyet
  //$deny_tmp = $wpdb->get_results( "SELECT COUNT(*) as allItem FROM register_togashi WHERE status = 2" );
  //$deny_all = 0;
  //if( isset($deny_tmp[0]->allItem) ) {
  //  $deny_all = $deny_tmp[0]->allItem;
  //}

  /*Get location*/
  // session_start();
  // $location = 1;
  // $location_list = array(1, 2, 3, 4);
  // if( isset($_SESSION['location']) && in_array($_SESSION['location'], $location_list) ) {
  //    $location = $_SESSION['location'];
  // }

  /*Count location*/
  //$location_tmp = $wpdb->get_results( "SELECT COUNT(*) as allItem FROM register_togashi WHERE status = 1 AND location_".$location." > 0" );
  //$location_all = 0;
  //if( isset($location_tmp[0]->allItem) ) {
  //  $location_all = $location_tmp[0]->allItem;
  //}
	include_once(DASHBOARD_ADMIN.'/layout-dashboard.php');
}

?>

<?php
function custom_login_wp_tohgasgi_ex()
{
    echo '<link media="all" type="text/css" href="'.plugins_url('css/style.css', __FILE__).'" id="sau-login-css" rel="stylesheet">';
}
add_action( 'login_enqueue_scripts', 'custom_login_wp_tohgasgi_ex' );

//Add placeholder_ex input
function placeholder_ex() {
   wp_enqueue_script( 'script', plugins_url('exhibitors-themes/script.js'), array( 'jquery' ), 1.2 );
}
add_action( 'login_enqueue_scripts', 'placeholder_ex', 10 );

//Edit test
function change_form_login_text_ex( $translation, $text )
{
    if ( 'Username or Email Address' == $text ) { return ''; }
    if ( 'Password' == $text ) { return ''; }
    if ( 'Remember Me' == $text ) { return 'ログイン状態を保持する'; }
    if ( 'Log In' == $text || 'Log in' == $text ) { return 'ログイン'; }
    if ( 'Lost your password?' == $text ) { return 'パスワードをお忘れですか？'; }
    if ( 'Please enter your username or email address. You will receive a link to create a new password via email.' == $text ) { return 'ご登録いただいたユーザー名もしくはメールアドレスを入力してください。
新しいパスワードを設定するために必要なメールをお送り致します。'; }
	if ( 'Get New Password' == $text ) { return '新しいパスワードを送る'; }
	if ( 'You are now logged out.'== $text){ return '';}
    return $translation;
}
add_filter( 'gettext', 'change_form_login_text_ex', 10, 2 );
//Error loign
add_filter( 'login_errors', function( $error ) {
	global $errors;
	$err_codes = $errors->get_error_codes();

	// Invalid username.
	// Default: '<strong>ERROR</strong>: Invalid username. <a href="%s">Lost your password</a>?'
	if ( in_array( 'invalid_username', $err_codes ) ) {
		$error = '<p>無効なメールアドレスです。</p>';
	}

	// Incorrect password.
	// Default: '<strong>ERROR</strong>: The password you entered for the username <strong>%1$s</strong> is incorrect. <a href="%2$s">Lost your password</a>?'
	if ( in_array( 'incorrect_password', $err_codes ) ) {
		$error = '<p>パスワードが間違っています。</p>';
	}
	if ( in_array( 'empty_username', $err_codes ) ) {
		$error = '<p>無効なメールアドレスです。</p>';
	}
	if ( in_array( 'empty_password', $err_codes ) ) {
		$error = '<p>パスワードが間違っています。</p>';
	}
	return $error;
} );



// Redirect - Dashboard wp to my dashboard
function redirect_dashboard() {
  if (($_SERVER['REQUEST_URI'] == '/wp-admin/index.php' || $_SERVER['REQUEST_URI'] == '/wp-admin/' ) ) {
    wp_redirect(get_option('siteurl') . '/wp-admin/admin.php?page=dashboard');
    exit(0);
  }
  if (($_SERVER['REQUEST_URI'] == '/organizer/wp-admin/index.php' || $_SERVER['REQUEST_URI'] == '/organizer/wp-admin/' ) ) {
    wp_redirect(get_option('siteurl') . '/wp-admin/admin.php?page=dashboard');
    exit(0);
  }
  if (($_SERVER['REQUEST_URI'] == '/exhibitor/wp-admin/index.php' || $_SERVER['REQUEST_URI'] == '/exhibitor/wp-admin/' ) ) {
    wp_redirect(get_option('siteurl') . '/wp-admin/admin.php?page=dashboard');
    exit(0);
  }
  
}
add_action( 'init', 'redirect_dashboard' );
// Redirect - admin login to organizer 
function redirect_dashboard_ad_to_org() {
  if ( current_user_can('manage_options') && ($_SERVER['REQUEST_URI'] == '/organizer/wp-admin/index.php' || $_SERVER['REQUEST_URI'] == '/organizer/wp-admin/' ) ) {
    wp_redirect(get_option('siteurl') . '/wp-admin/admin.php?page=dashboard');
    exit(0);
  }
}
add_action( 'init', 'redirect_dashboard_ad_to_org' );
// Redirect - adnmin login to exhibitor
function redirect_dashboard_ad_to_exhibitors() {
  if ( current_user_can('manage_options') && ($_SERVER['REQUEST_URI'] == '/exhibitor/wp-admin/index.php' || $_SERVER['REQUEST_URI'] == '/exhibitor/wp-admin/' ) ) {
    wp_redirect(get_option('siteurl') . '/wp-admin/admin.php?page=dashboard');
    exit(0);
  }
}
add_action( 'init', 'redirect_dashboard_ad_to_exhibitors' );

// Redirect - Profile default of WP to profile-exhibitor
function redirect_profile_page() {
  if ( current_user_can('manage_options') && ($_SERVER['REQUEST_URI'] == '/exhibitor/wp-admin/profile.php') ) {
    wp_redirect(get_option('siteurl') . '/wp-admin/admin.php?page=profile-exhibitors');
    exit(0);
  }
}
add_action( 'init', 'redirect_profile_page' );
?>