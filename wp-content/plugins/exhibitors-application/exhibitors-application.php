<?php
/**
 * Plugin Name:Exhibitors Application
 * Plugin URI: Chưa có website
 * Description: Ứng dụng của Exhibitors
   Author: ms.thuyanit
   Version: 1.0
   Author URI: http://example.com
 */
defined( 'EXHIBITOR_APP' ) OR define( 'EXHIBITOR_APP', plugin_dir_path(__FILE__) );
/*========================================================================================
==========================   Exhibition Billing Address   ================================
========================================================================================*/
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
function fee_billing_address(){
    add_menu_page(
        __( '出展料ご請求先', 'textdomain' ),
        '出展料ご請求先',
        'manage_options',
        'fee-billing-address',
        'fc_fee_billing_address',
        // plugins_url( 'admin-application/images/icon-upload-red.png' ),
        '',
        2
    );
}
add_action( 'admin_menu', 'fee_billing_address' );

function fc_fee_billing_address(){
    global $wpdb;

    $location_name = array(
        1=> '九州会場　5/17（水）・18（木）',
        2=> '東京会場　7/25（火）・26（水）',
        3=> '大阪会場　9/29（金）・30（土）',
        4=> '名古屋会場　11/7（火）・8（水）',
    );
    $login_user = wp_get_current_user()->user_email;
    $reg_data = $wpdb->get_row("SELECT * FROM register_togashi WHERE email_dk = '".$login_user."'"); 

    $get_location_user = $wpdb->get_results("SELECT togashi_id, catalog_id FROM register_togashi_link WHERE togashi_id = '".$reg_data->id."' and status=1"); 
    
    $tmpv = array();
    foreach ($get_location_user as $key) {
      $tmpv[]= $key->catalog_id;
    }
    $location=$get_location_user[0]->catalog_id;
    $location_list=$tmpv;   
    // $location = 1;
    // $location_list = array(1, 2, 3, 4);
    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $location_list) ) {
        $location = $_SESSION['location'];
    }
    
    $year=date('Y');
    $date_billing = $wpdb->get_row("SELECT dealine_billing FROM dealine_app WHERE location = '".$location."'AND date_setting LIKE '".$year."%'");
    // echo "<pre>";
    // print_r($date_billing);
    // echo "</pre>";
    if($date_billing){
        $nows = date('Y-m-d');
        $currentDay = strtotime($nows);
        $date = strtotime($date_billing->dealine_billing); 
        //Nếu chưa hết hạn đăng kí
        if($date>=$currentDay){
            if ($reg_data) {
                $link_data = $wpdb->get_row("SELECT * FROM register_togashi_link WHERE catalog_id = '".$location."' AND togashi_id = '".$reg_data->id."'"); 
                $meta_data = $wpdb->get_results("SELECT meta_key, meta_value FROM register_togashi_meta WHERE togashi_id = '".$reg_data ->id."'");
                if ($meta_data) {
                    foreach ($meta_data as $value) {
                        $tmp = $value->meta_key;
                        if (!isset($reg_data->$tmp)) {
                            $reg_data->$tmp = $value->meta_value;
                        }
                    }
                }
                if ($link_data) {

                    $link_data->location_name = $location_name[$location];         
                }

                $paymen_data = $wpdb->get_row( 
                    "SELECT *
                    FROM exhibitor_payment
                    WHERE register_id = '".$reg_data->id."'AND location='".$location."'"
                );
                // echo "<pre>";
                // print_r($reg_data);
                // echo "</pre>";
                if (empty($paymen_data) && $_POST) {
                    $d=getdate();
                    $date_dk=$d['year']."-".$d['mon']."-".$d['mday'];

                    $insert = $wpdb->insert( 
                        'exhibitor_payment', 
                        array( 
                            'register_id' => $reg_data->id,
                            'pay_company_name' => $_POST['company_name'],
                            'pay_position' => $_POST['position'],
                            'pay_person_in_charge'=>$_POST['person_in_charge'],
                            'pay_zipcode1'=> $_POST['zipcode1'],
                            'pay_zipcode2' => $_POST['zipcode2'],
                            'pay_prefectures' => $_POST['prefectures'],
                            'pay_city' => $_POST['city'],
                            'pay_address' => $_POST['address'],
                            'pay_building_name' => $_POST['building_name'],
                            'pay_tel' => $_POST['tel'],
                            'pay_fax' => $_POST['fax'],
                            'pay_remarks' => $_POST['remarks'],
                            'location' => $location,
                            'date_dk'=>$date_dk,
                        ), 
                        array( 
                            '%d',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%d',
                            '%s',)
                        // ), 
                        // array( '%d' ) 
                    );
                    echo '<script type="text/javascript">
                            window.location = "'.admin_url('admin.php?page=fee-billing-address').'";
                        </script>';
                }
                if (!empty($paymen_data) && $_POST) {
                    $update = $wpdb->update( 
                        'exhibitor_payment', 
                        array( 
                            'pay_company_name' => $_POST['company_name'],
                            'pay_position' => $_POST['position'],
                            'pay_person_in_charge'=>$_POST['person_in_charge'],
                            'pay_zipcode1'=> $_POST['zipcode1'],
                            'pay_zipcode2' => $_POST['zipcode2'],
                            'pay_prefectures' => $_POST['prefectures'],
                            'pay_city' => $_POST['city'],
                            'pay_address' => $_POST['address'],
                            'pay_building_name' => $_POST['building_name'],
                            'pay_tel' => $_POST['tel'],
                            'pay_fax' => $_POST['fax'],
                            'pay_remarks' => $_POST['remarks'],
                        ), 
                        array( 'id' => $paymen_data->id ),
                        array( 
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                        ), 
                        array( '%d' ) 
                    );

                    echo '<script type="text/javascript">
                            window.location = "'.admin_url('admin.php?page=fee-billing-address').'";
                        </script>';
                }

                include_once(EXHIBITOR_APP.'/template/add-billing-address.php');
            }
            else{
                echo '<script type="text/javascript">
                            window.location = "'.admin_url('admin.php?page=dashboard').'";
                        </script>';
            }
        }
        //Nếu hết hạn đăng kí
        else{
    		echo "<script>alert('出展料ご請求先 登録\\nの期限が切られています。\\n管理者へお知らせください。');</script>";
        	echo '<script type="text/javascript">
                        window.location = "'.admin_url('admin.php?page=dashboard').'";
                    </script>';
        }
    }
    // If admin don't setup dealine
    else{
        echo "<script>alert('You can't register now.);</script>";
        echo '<script type="text/javascript">
                            window.location = "'.admin_url('admin.php?page=dashboard').'";
                        </script>';
    }
}

/*========================================================================================
==========================   Exhibition Foundation /Construction   =======================
========================================================================================*/
function foundation(){
    add_menu_page(
        __( '出展基礎・工事', 'textdomain' ),
        '出展基礎・工事',
        'manage_options',
        'foundation',
        'fc_foundation',
        // plugins_url( 'admin-application/images/icon-upload-red.png' ),
        '',
        3
    );
}
add_action( 'admin_menu', 'foundation' );
function fc_foundation(){
    session_start();
    $site   = str_replace("\\", "/", get_site_url());
    $base   = str_replace("\\", "/", get_home_path());
    global $wpdb;
    $data_foundation = unserialize($_SESSION['register_foundation']);
    $login_user_recent = wp_get_current_user()->user_email;
    $reg_data_recent = $wpdb->get_row("SELECT * FROM register_togashi WHERE email_dk = '".$login_user_recent."'");
    
    $get_location_user = $wpdb->get_results("SELECT togashi_id, catalog_id FROM register_togashi_link WHERE togashi_id = '".$reg_data_recent->id."' and status=1"); 
    
    $tmpv = array();
    foreach ($get_location_user as $key) {
      $tmpv[]= $key->catalog_id;
    }
    $location_recent=$get_location_user[0]->catalog_id;
    $location_list_recent=$tmpv;   
    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $location_list_recent)){
        $location_recent = $_SESSION['location'];
    }
    //Get dealine to button
    $year=date('Y');
    $date_btn = $wpdb->get_row("SELECT dealine_foundation, dealine_construction FROM dealine_app WHERE location = '".$location_recent."'AND date_setting LIKE '".$year."%'");
    if($date_btn){
    	$date_f =date('n/d',strtotime($date_btn->dealine_foundation));
		$date_c =date('n/d',strtotime($date_btn->dealine_construction));
    }

    $dealine_foundation = $wpdb->get_row("SELECT dealine_foundation FROM dealine_app WHERE location = '".$location_recent."'AND date_setting LIKE '".$year."%'");
	$checkdata = $wpdb->get_row("SELECT * FROM exhibitor_foundation WHERE togashi_id = '".$reg_data_recent->id."' and location='".$location_recent."'");
	$nows = date('Y-m-d');
    $currentDay = strtotime($nows);
    $date = strtotime($dealine_foundation->dealine_foundation); 
	if($dealine_foundation){
	    if($date>=$currentDay){
	        if(empty($checkdata)){
	            if($_POST['submit_choose_myself']){
	                unset($_POST['submit_choose_myself']);
	                $info_foundation = serialize($_POST);
	                $_SESSION['register_foundation'] = $info_foundation;
	                $img = str_replace("\\", "/", $_POST['attachment_file']);
	                $img = str_replace($site, "", $img);
	        
	                $image_url  = $_POST['attachment_file'];
	                $image_send = $base.substr($img, 1);
	        
	                $_SESSION['image_send'] = $image_send;
	                $_SESSION['image_url']  = $image_url;
	                include_once(EXHIBITOR_APP.'/template/confirm-foundation.php');
	                exit;
	            }
	            elseif($_POST['sent_form']){
	                if(isset($_SESSION['register_foundation'])){
	                    $data = unserialize($_SESSION['register_foundation']);
	                    if ($reg_data_recent) {
	                        if ($_POST) {
	                            $d=getdate();
	                            $date_dk=$d['year']."-".$d['mon']."-".$d['mday'];
	                            $choose=$data['package'];
	                            $choose_con=1;
	                            if($choose=='施工業者無し'){
	                                $choose_con=1;
	                            }
	                            if($choose=='パッケージブースを申し込む'){
	                                $choose_con=2;
	                            }
	                            if($choose=='事務局指定業者に依頼する'){
	                                $choose_con=3;
	                            }
	                            if($choose=='事務局指定業者以外に依頼する'){
	                                $choose_con=4;
	                            }
	                            $insert = $wpdb->insert(
	                                            'exhibitor_foundation',
	                                            array(
	                                                'togashi_id'=>$reg_data_recent->id,
	                                                'choose_con'=>$choose_con,
	                                                'info' => $_SESSION['register_foundation'],
	                                                'email_dk'=> $reg_data_recent->email_dk,
	                                                'location' => $location_recent,
	                                                'date_dk'=>$date_dk,
	                                            ),
	                                            array(
	                                                '%d',
	                                                '%s',
	                                                '%s',
	                                                '%s',
	                                                '%s',
	                                                '%s'
	                                            )
	                            );
	                            if($insert){
	                                //send mail confirm to exhibitor 
	                                $data_insert = unserialize($_SESSION['register_foundation']);

	                                if( is_array($data_insert) )
	                                {
	                                    if($location_recent==1){
	                                        $local_confirm="九州会場";
	                                    }
	                                    if($location_recent==2){
	                                        $local_confirm="東京会場";
	                                    }
	                                    if($location_recent==3){
	                                        $local_confirm="大阪会場";
	                                    }
	                                    if($location_recent==4){
	                                        $local_confirm="名古屋会場";
	                                    }
	                                    ob_start();
	                                    include_once(EXHIBITOR_APP.'/template/mail-foundation.php');
	                                    $content = ob_get_contents();
	                                    $title ='賃貸住宅フェア2017　出展基礎工事お申込み確認 <'.$local_confirm.'>';
	                                    ob_clean();
	                                    ob_end_flush();
	                                    $mailto = $reg_data_recent->email_dk;
	                                    $name   = $reg_data_recent->company_name;
	                                    // $mailto = 'annguyen092@gmail.com';
	                                    // $name   = 'An Nguyen';
	                                    if( $content!="" ){
	                                        $send = senmail('ms.thuyanit@gmail.com', 'annguyen',$mailto, $name,$title, $content, '');
	                                        if( $send ) {
	                                            echo "<script>alert('We have sent email confirm to you. Please check your email. Thank you!');</script>";
	                                        } else {
	                                            echo 'Send mail Failed';
	                                        }
	                                    }
	                                }// Ednd chekc $data_insert
	                                
	                                include_once(EXHIBITOR_APP.'/template/thanks-foundation.php');
	                                unset($_SESSION['register_foundation']);
	                                //End sendmail
	                            }
	                        } 
	                    }//register info
	                } // If isset sesion Register foundation 
	                //Send file to admin email
	                if( !empty($_SESSION['image_send']) && !empty($_SESSION['image_url']) ) 
	                {
	                    $replyto=$reg_data_recent->email_dk;
	                    $name_replyto=$reg_data_recent->company_name;
	                    $message='<p>出展基礎・工事（基礎工事）</p>
	                              <p>会社名: '.$name_replyto.'</p>
	                              <p>E-mail: '.$replyto.'</p>';
	                    $send = senmail($replyto, $name_replyto,'ms.thuyanit@gmail.com', 'annguyen', $reg_data_recent->company_name.' Send Attachment file', $message, $_SESSION['image_send']);
	                    if( $send ) {
	                        // echo 'Attachment file have been sent to admin email';
	                        unset($_SESSION['image_send']);
	                        unset($_SESSION['image_url']);
	                    } else {
	                        echo 'Attachment file have not been sent to admin email';
	                    }
	                
	                } //Session Attachment
	            }
	            else{
	                include_once(EXHIBITOR_APP.'/template/foundation.php');  
	            }
	        }
	        else{
	             include_once(EXHIBITOR_APP.'/template/view-foundation.php');  
	        }
	    }
	    else{
	        if(empty($checkdata)){
	            echo "<script>alert('出展基礎・工事 登録\\nの期限が切られています。\\n管理者へお知らせください。');</script>";
	            echo '<script type="text/javascript">
	                        window.location = "'.admin_url('admin.php?page=dashboard').'";
	                    </script>';
	        }
	        else{
	            include_once(EXHIBITOR_APP.'/template/view-foundation.php'); 
	        }
	    }
	}
	else{
	    echo "<script>alert('You can't register now.);</script>";
	    echo '<script type="text/javascript">window.location = "'.admin_url('admin.php?page=dashboard').'";</script>';
	}

}
/***************************************/
function construction(){
    add_submenu_page(
        'NULL',
        'Construction',
        'Construction',
        'manage_options',
        'construction',
        'fc_construction' 
    );
}
add_action( 'admin_menu', 'construction' );
function fc_construction(){
    session_start();
    $site2   = str_replace("\\", "/", get_site_url());
    $base2   = str_replace("\\", "/", get_home_path());
    global $wpdb;
    $data_construction = unserialize($_SESSION['register_construction']);

    $get_user = wp_get_current_user()->user_email;
    
    $get_info_company = $wpdb->get_row("SELECT * FROM register_togashi WHERE email_dk = '".$get_user."'");
    
    $get_location_user = $wpdb->get_results("SELECT togashi_id, catalog_id FROM register_togashi_link WHERE togashi_id = '".$get_info_company->id."' and status=1"); 
    
    $tmpv = array();
    foreach ($get_location_user as $key) {
      $tmpv[]= $key->catalog_id;
    }
    $local_val=$get_location_user[0]->catalog_id;
    $local_list_val=$tmpv;   
    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $local_list_val) ) {
        $local_val = $_SESSION['location'];
    }
    //Get dealine to button
    $year=date('Y');
    $date_cs = $wpdb->get_row("SELECT dealine_foundation, dealine_construction FROM dealine_app WHERE location = '".$local_val."' AND date_setting LIKE '".$year."%'");
	if($date_cs){
	    $date_f =date('n/d',strtotime($date_cs->dealine_foundation));
	    $date_c =date('n/d',strtotime($date_cs->dealine_construction));
	}

	$dealine_construction = $wpdb->get_row("SELECT dealine_construction FROM dealine_app WHERE location = '".$local_val."'AND date_setting LIKE '".$year."%'");
	$checkdata = $wpdb->get_row("SELECT * FROM exhibitor_construction WHERE togashi_id = '".$get_info_company->id."' and location='".$local_val."'");
	$nows = date('Y-m-d');
    $currentDay = strtotime($nows);
    $date = strtotime($dealine_construction->dealine_construction); 
	if($dealine_construction){
	    if($date>=$currentDay){
	        if(empty($checkdata)){ //Chua dang kí
	            if($_POST['submit_construction']){
	                unset( $_POST['submit_construction'] );
	                $info_construction = serialize($_POST);
	                $_SESSION['register_construction'] = $info_construction;
	                
	                 $img2 = str_replace("\\", "/", $_POST['attachment_file2']);
	                 $img2 = str_replace($site2, "", $img2);
	        
	                $image_url2  = $_POST['attachment_file2'];
	                $image_send2 = $base2.substr($img2, 1);
	        
	                $_SESSION['image_send2'] = $image_send2;
	                $_SESSION['image_url2']  = $image_url2;
	                
	                include_once(EXHIBITOR_APP.'/template/confirm-construction.php');
	                exit;
	            }
	            elseif($_POST['sent_construction']){
	                if( isset($_SESSION['register_construction']) ) 
	                {
	                    if ($get_info_company){
	                        if ($_POST){
	                            $d=getdate();
	                            $date_dk=$d['year']."-".$d['mon']."-".$d['mday'];
	                            $insert = $wpdb->insert(
	                                            'exhibitor_construction',
	                                            array(
	                                                'togashi_id'=>$get_info_company->id,
	                                                'info' => $_SESSION['register_construction'],
	                                                'email_dk'=> $get_info_company->email_dk,
	                                                'location' => $local_val,
	                                                'date_dk'=>$date_dk
	                                            ),
	                                            array(
	                                                '%d',
	                                                '%s',
	                                                '%s',
	                                                '%s',
	                                                '%s'
	                                            )
	                            );
	                            if($insert){
	                                //send mail confirm to exhibitor 
	                                $data_insert_construction = unserialize($_SESSION['register_construction']);
	                                if( is_array($data_insert_construction))
	                                {
	                                    if($local_val==1){
	                                        $local_confirm="九州会場";
	                                    }
	                                    if($local_val==2){
	                                        $local_confirm="東京会場";
	                                    }
	                                    if($local_val==3){
	                                        $local_confirm="大阪会場";
	                                    }
	                                    if($local_val==4){
	                                        $local_confirm="名古屋会場";
	                                    }
	                                    ob_start();
	                                    include_once(EXHIBITOR_APP.'/template/mail-construction.php');
	                                    $content_construction = ob_get_contents();
	                                    $title_construction ='賃貸住宅フェア2017　出展基礎工事お申込み確認 <'.$local_confirm.'>';
	                                    ob_clean();
	                                    ob_end_flush();
	                                    $mailto = $get_info_company->email_dk;
	                                    $name   = $get_info_company->company_name;
	                                   
	                                    if( $content_construction!="" ){
	                                        $send = senmail('ms.thuyanit@gmail.com', 'annguyen',$mailto, $name,$title_construction, $content_construction, '');
	                                        if( $send){
	                                            //echo "<script>alert('We have sent email confirm to you. Please check your email. Thank you!');</script>";
	                                        } else{
	                                            echo 'Send mail Failed';
	                                        }
	                                    }
	                                }// Ednd chekc $data_insert
	                                unset($_SESSION['register_construction']);
	                                include_once(EXHIBITOR_APP.'/template/thanks-construction.php');
	                                //End sendmail
	                            }
	                        } 
	                    }//register info construction
	                }
	                if( !empty($_SESSION['image_send2']) && !empty($_SESSION['image_url2']) ) 
	                {
	                    $replyto=$get_info_company->email_dk;
	                    $name_replyto=$get_info_company->company_name;
	                    $message='<p>出展基礎・工事（基礎工事）</p>
	                              <p>会社名: '.$name_replyto.'</p>
	                              <p>E-mail: '.$replyto.'</p>';
	                    $send = senmail($replyto, $name_replyto,'ms.thuyanit@gmail.com', 'annguyen', $get_info_company->company_name.' Send Attachment file', $message, $_SESSION['image_send2']);
	                    if( $send ) {
	                        //echo "<script>alert('Attachment file have been sent to Administrator. Thank you!');</script>";
	                        unset($_SESSION['image_send2']);
	                        unset($_SESSION['image_url2']);
	                    } else {
	                        echo 'Attachment file have not been sent to admin email';
	                    }
	                
	                } //Session attachment image
	                //include_once(EXHIBITOR_APP.'/template/thanks-construction.php');
	            }
	            else{
	                include_once(EXHIBITOR_APP.'/template/construction.php');  
	            }
	        }
	        else{ // Đã đăng kí
	            include_once(EXHIBITOR_APP.'/template/view-construction.php');  
	        }
	    }
	    else{
	        if(empty($checkdata)){
	            echo "<script>alert('電気工事申込 登録\\nの期限が切られています。\\n管理者へお知らせください。');</script>";
	            echo '<script type="text/javascript">
	                        window.location = "'.admin_url('admin.php?page=dashboard').'";
	                    </script>';
	        }
	        else{
	            include_once(EXHIBITOR_APP.'/template/view-construction.php'); 
	        }
	    }
	}
	else{
	    echo "<script>alert('You can't register now.);</script>";
	    echo '<script type="text/javascript">window.location = "'.admin_url('admin.php?page=dashboard').'";</script>';
	}
}
/*========================================================================================
==========================   Exhibition Profile (Information)   ==========================
========================================================================================*/
function profile_exhibitor(){
    add_menu_page(
        __( '出展社情報', 'textdomain' ),
        '出展社情報',
        'manage_options',
        'profile-exhibitors',
        'fc_profile_exhibitor',
        // plugins_url( 'admin-application/images/icon-upload-red.png' ),
        '',
        6
    );
}
add_action( 'admin_menu', 'profile_exhibitor' );

function fc_profile_exhibitor(){
    global $wpdb;

    $login_user = wp_get_current_user()->user_email;

    $profile = $wpdb->get_row(
        "SELECT * FROM register_togashi WHERE email_dk = '".$login_user."'"
    );

    if ($profile) {
        $meta = $wpdb->get_results(
            "SELECT meta_key, meta_value FROM register_togashi_meta WHERE togashi_id = ".$profile->id
        );

        if ($meta) {
            foreach ($meta as $value) {
                $tmp = $value->meta_key;
                if (!isset($profile->$tmp)) {
                    $profile->$tmp = $value->meta_value;
                }
            }
        }

        if (!empty($profile->id) && $_POST) {
            $update = $wpdb->update( 
                'register_togashi', 
                array( 
                    'company_name' => $_POST['company_name'],
                ), 
                array( 'id' => $profile->id ),
                array( 
                    '%s',
                ), 
                array( '%d' ) 
            );

            $data_meta = array(
                'family_name' => $_POST['family_name'],
                'given_name' => $_POST['given_name'],
                'exhibitors_name' => $_POST['exhibitors_name'],
                'exhibition_service_name' => $_POST['exhibition_service_name'],
                'person_in_charge' => $_POST['person_in_charge'],
                'position' => $_POST['position'],
                'zipcode1' => $_POST['zipcode1'],
                'zipcode2' => $_POST['zipcode2'],
                'prefectures' => $_POST['prefectures'],
                'city' => $_POST['city'],
                'address' => $_POST['address'],
                'building_name' => $_POST['building_name'],
                'tel' => $_POST['tel'],
                'fax' => $_POST['fax'],
                'url' => $_POST['url'],
                'emergency_tel' => $_POST['emergency_tel'],
            );

            foreach ($data_meta as $key => $value) {
                $wpdb->update( 
                    'register_togashi_meta', 
                    array( 
                        'meta_value' => $value,
                    ), 
                    array( 'meta_key' => $key,'togashi_id' => $profile->id),
                    array( 
                        '%s',
                    ), 
                    array( '%s','%d' ) 
                );
            }
            echo '<script type="text/javascript">
                    window.location = "'.admin_url('admin.php?page=profile-exhibitors').'";
                </script>';
        }
    }

    include_once(EXHIBITOR_APP.'/template/profile.php');
}
/*========================================================================================
==========================   Exhibition Manual   =========================================
========================================================================================*/
function exhibitor_manual(){
    add_menu_page(
        __( '出展社マニュアル', 'textdomain' ),
        '出展社マニュアル',
        'manage_options',
        'exhibitor-manual',
        'fc_exhibitor_manual',
        // plugins_url( 'admin-application/images/icon-upload-red.png' ),
        '',
        7
    );
}
add_action( 'admin_menu', 'exhibitor_manual' );

function fc_exhibitor_manual(){

    include_once(EXHIBITOR_APP.'/template/exhibitor-manual.php');
}
/*========================================================================================
==========================   Exhibition Vehice Certification   ===========================
========================================================================================*/
function vehice_certification(){
    add_menu_page(
        __( '搬入出車両証', 'textdomain' ),
        '搬入出車両証',
        'manage_options',
        'vehice-certification',
        'fc_vehice_certification',
        // plugins_url( 'admin-application/images/icon-upload-red.png' ),
        '',
        8
    );
}
add_action( 'admin_menu', 'vehice_certification' );

function fc_vehice_certification(){

    include_once(EXHIBITOR_APP.'/template/vehice_certification.php');
}
/*========================================================================================
==========================   View POST  ==================================
========================================================================================*/
function view_post(){
    add_menu_page(
       NULL,
        'View Post',
        'manage_options',
        'view-post',
        'fc_view_post',
        // plugins_url( 'admin-application/images/icon-upload-red.png' ),
        '',
        9
    );
}
add_action( 'admin_menu', 'view_post' );

function fc_view_post(){
    global $wpdb;
    $id=$_GET['id'];
    $view = $wpdb->get_results( 
        "SELECT * FROM wp_posts WHERE post_type = 'news' and post_status='publish' and ID=$id"
    );
    include_once(EXHIBITOR_APP.'/template/view-post.php');
}
/*=====================================================================================*/

// function get_val_foundation($name, $data=NULL)
// {
//     if( isset($_POST[$name]) ) {
//         return $_POST[$name];
//     }
//     return FALSE;
// }
function get_val_foundation($name, $data=NULL)
{
    if( isset($_POST[$name]) ) {
        return $_POST[$name];
    }
    if( isset($_SESSION['register_foundation']) )
    {
        $data = unserialize($_SESSION['register_foundation']);
        if( isset($data[$name]) ) {
            return $data[$name];
        }
    }
    return FALSE;
}
function get_val_construction($name, $data=NULL)
{
    if( isset($_POST[$name]) ) {
        return $_POST[$name];
    }
    if( isset($_SESSION['register_construction']) )
    {
        $data = unserialize($_SESSION['register_construction']);
        if( isset($data[$name]) ) {
            return $data[$name];
        }
    }
    return FALSE;
}

function my_enqueue_media_lib_uploader() {
    wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'my_enqueue_media_lib_uploader');
function senmail($mailgui='', $mailnhan='',$mailto, $name, $title, $content, $file="")
{
    include_once(EXHIBITOR_APP.'libs/class.phpmailer.php');

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug  = 0;  // Hiển thị thông báo
                            // 0 = off
                            // 1 = message + error
                            // 2 = message

    $mail->Debugoutput = 'html';
    $mail->SMTPAuth    = true;
    $mail->SMTPSecure  = 'ssl';
    $mail->Host        = 'smtp.gmail.com';
    $mail->Port        = 465;
    $mail->Username    = 'allgrowlabo.wp@gmail.com';  /*Mail gửi đi*/
    $mail->Password    = 'lugazayihryeroqd';

    // Mail người gửi
    $mail->setFrom('allgrowlabo.wp@gmail.com', '賃貸住宅フェア');    /*Email hiển thị người gửi là ai, trường hợp ko dùng tên của gmail server*/

    // Mail người trả lời về
    //$mail->addReplyTo('allgrowlabo.wp@gmail.com', 'Allgrowlabo');    /*Mail khi người nhận nhấn trả lời*/
    $mail->addReplyTo($mailgui, $mailnhan); 
    //$mail->addReplyTo($mail_reply, $company);
    // Mail người nhận
    $mail->AddAddress($mailto, $name);

    // Tiêu dề
    $mail->Subject = $title;

    //Attach an image file
    if( $file!='' ) {
        $mail->addAttachment($file);
    }

    // Charset
    $mail->CharSet = 'utf-8';
    $body = $content;
    
    //$mail->Body = $body;
    $mail->MsgHTML($body); //nội dung dạng html

    if($mail->Send() == false){
        return FALSE; // thất bại
    } else{
        return TRUE; // thành công
    }
} 
//** Add menu 07-06-2017 *//
function various_applications(){
    add_menu_page(
        __( '各種申請', 'textdomain' ),
        '各種申請',
        'manage_options',
        'various_applications',
        'fc_various_applications',
        // plugins_url( 'admin-application/images/icon-upload-red.png' ),
        '',
        5
    );
}
add_action( 'admin_menu', 'various_applications' );

function fc_various_applications(){
	global $wpdb;
	//Get location 
	$user = wp_get_current_user()->user_email;
    
    $company = $wpdb->get_row("SELECT * FROM register_togashi WHERE email_dk = '".$user."'");
    
    $location_u = $wpdb->get_results("SELECT togashi_id, catalog_id FROM register_togashi_link WHERE togashi_id = '".$company->id."' and status=1"); 
    
    $local_tmp = array();
    foreach ($location_u as $key) {
      $local_tmp[]= $key->catalog_id;
    }
    $local_ex=$location_u[0]->catalog_id;
    $local_list_ex=$local_tmp;   
    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $local_list_ex) ) {
        $local_ex = $_SESSION['location'];
    }
    switch ($local_ex) {
        case '1':
            $location_mail="九州会場";
            $PDF     ="PDF/kyusyu/kyusyu_danger.pdf";
            break;
        case '2':
            $location_mail="東京会場";
            $PDF     ="PDF/tokyo/tokyo_danger.pdf";
            break;
        case '3':
            $location_mail="大阪会場";
            $PDF     ="PDF/osaka/osaka_danger.pdf";
            break;
        case '4':
            $location_mail="名古屋会場";
            $PDF     ="PDF/nagoya/nagoya_danger.pdf";
            break;
        default:
            $location_mail="";
            $PDF     ="";
            break;
    }
    //Setting notice of dealine
    $nows = date('Y-m-d');
    $year=date('Y');
    $now_date = strtotime($nows);
    $date_danger = $wpdb->get_row("SELECT dealine_danger FROM dealine_app WHERE location = '".$local_ex."'AND date_setting LIKE '".$year."'");
    $date_drainage = $wpdb->get_row("SELECT dealine_drainage FROM dealine_app WHERE location = '".$local_ex."'AND date_setting LIKE '".$year."'");
    $date_gar_air = $wpdb->get_row("SELECT dealine_gar_air FROM dealine_app WHERE location = '".$local_ex."'AND date_setting LIKE '".$year."'");
    $date_ceiling = $wpdb->get_row("SELECT dealine_ceiling FROM dealine_app WHERE location = '".$local_ex."'AND date_setting LIKE '".$year."'");
    $date_anchor = $wpdb->get_row("SELECT dealine_anchor FROM dealine_app WHERE location = '".$local_ex."'AND date_setting LIKE '".$year."'");
    $date_foods = $wpdb->get_row("SELECT dealine_foods FROM dealine_app WHERE location = '".$local_ex."'AND date_setting LIKE '".$year."'");

    $date1 = strtotime($date_danger->dealine_danger);
    $date2 = strtotime($date_drainage->dealine_drainage);
    $date3 = strtotime($date_gar_air->dealine_gar_air);
    $date4 = strtotime($date_ceiling->dealine_ceiling);
    $date5 = strtotime($date_anchor->dealine_anchor);
    $date6 = strtotime($date_foods->dealine_foods);

    // include_once(EXHIBITOR_APP.'/template/various_applications.php');
    include_once(EXHIBITOR_APP.'/template/orther/various_danger.php');
}
/*** Separate group button ***/
function send_danger(){
    add_submenu_page(
        'various_applications',
        '危険物持込・裸火使用許可',
        '危険物持込・裸火使用許可',
        'manage_options',
        'danger',
        'fc_danger' 
    );

}
add_action( 'admin_menu', 'send_danger' );
function fc_danger(){
    global $wpdb;
    //Get location 
    $user = wp_get_current_user()->user_email;
    
    $company = $wpdb->get_row("SELECT * FROM register_togashi WHERE email_dk = '".$user."'");
    
    $location_u = $wpdb->get_results("SELECT togashi_id, catalog_id FROM register_togashi_link WHERE togashi_id = '".$company->id."' and status=1"); 
    
    $local_tmp = array();
    foreach ($location_u as $key) {
      $local_tmp[]= $key->catalog_id;
    }
    $local_ex=$location_u[0]->catalog_id;
    $local_list_ex=$local_tmp;   
    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $local_list_ex) ) {
        $local_ex = $_SESSION['location'];
    }
    switch ($local_ex) {
        case '1':
            $location_mail="九州会場";
            $PDF     ="PDF/kyusyu/kyusyu_danger.pdf";
            break;
        case '2':
            $location_mail="東京会場";
            $PDF     ="PDF/tokyo/tokyo_danger.pdf";
            break;
        case '3':
            $location_mail="大阪会場";
            $PDF     ="PDF/osaka/osaka_danger.pdf";
            break;
        case '4':
            $location_mail="名古屋会場";
            $PDF     ="PDF/nagoya/nagoya_danger.pdf";
            break;
        default:
            $location_mail="";
            $PDF     ="";
            break;
    }
    //Setting notice of dealine
    $nows = date('Y-m-d');
    $year=date('Y');
    $now_date = strtotime($nows);
    $date_danger = $wpdb->get_row("SELECT dealine_danger FROM dealine_app WHERE location = '".$local_ex."'AND date_setting LIKE '".$year."%'");
    $date1 = strtotime($date_danger->dealine_danger);
    $ck_dangrous=$wpdb->get_row("SELECT togashi_id FROM cache_dangrous WHERE location='".$local_ex."' and togashi_id='".$company->id."'");
    include_once(EXHIBITOR_APP.'/template/orther/various_danger.php');
}

function send_drainage(){
    add_submenu_page(
        'various_applications',
        '給排水工事許可申請',
        '給排水工事許可申請',
        'manage_options',
        'drainage',
        'fc_drainage' 
    );

}
add_action( 'admin_menu', 'send_drainage' );
function fc_drainage(){
        global $wpdb;
    //Get location 
    $user = wp_get_current_user()->user_email;
    
    $company = $wpdb->get_row("SELECT * FROM register_togashi WHERE email_dk = '".$user."'");
    
    $location_u = $wpdb->get_results("SELECT togashi_id, catalog_id FROM register_togashi_link WHERE togashi_id = '".$company->id."' and status=1"); 
    
    $local_tmp = array();
    foreach ($location_u as $key) {
      $local_tmp[]= $key->catalog_id;
    }
    $local_ex=$location_u[0]->catalog_id;
    $local_list_ex=$local_tmp;   
    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $local_list_ex) ) {
        $local_ex = $_SESSION['location'];
    }
    switch ($local_ex) {
        case '1':
            $location_mail="九州会場";
            $PDF     ="PDF/kyusyu/kyusyu_drainage.pdf";
            break;
        case '2':
            $location_mail="東京会場";
            $PDF     ="PDF/tokyo/tokyo_drainage.pdf";
            break;
        case '3':
            $location_mail="大阪会場";
            $PDF     ="PDF/osaka/osaka_drainage.pdf";
            break;
        case '4':
            $location_mail="名古屋会場";
            $PDF     ="PDF/nagoya/nagoya_drainage.pdf";
            break;
        default:
            $location_mail="";
            $PDF     ="";
            break;
    }
    //Setting notice of dealine
    $nows = date('Y-m-d');
    $year=date('Y');
    $now_date = strtotime($nows);
    $date_drainage = $wpdb->get_row("SELECT dealine_drainage FROM dealine_app WHERE location = '".$local_ex."'AND date_setting LIKE '".$year."%'");
    $date2 = strtotime($date_drainage->dealine_drainage);
    $ck_drainage=$wpdb->get_row("SELECT togashi_id FROM cache_drainage WHERE location='".$local_ex."' and togashi_id='".$company->id."'");
    include_once(EXHIBITOR_APP.'/template/orther/various_drainage.php');
}

function send_gas_air(){
    add_submenu_page(
        'various_applications',
        'ガス･エアー工事許可申請',
        'ガス･エアー工事許可申請',
        'manage_options',
        'gas_air',
        'fc_gas_air' 
    );

}
add_action( 'admin_menu', 'send_gas_air' );
function fc_gas_air(){
    global $wpdb;
    //Get location 
    $user = wp_get_current_user()->user_email;
    
    $company = $wpdb->get_row("SELECT * FROM register_togashi WHERE email_dk = '".$user."'");
    
    $location_u = $wpdb->get_results("SELECT togashi_id, catalog_id FROM register_togashi_link WHERE togashi_id = '".$company->id."' and status=1"); 
    
    $local_tmp = array();
    foreach ($location_u as $key) {
      $local_tmp[]= $key->catalog_id;
    }
    $local_ex=$location_u[0]->catalog_id;
    $local_list_ex=$local_tmp;   
    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $local_list_ex) ) {
        $local_ex = $_SESSION['location'];
    }
    switch ($local_ex) {
        case '1':
            $location_mail="九州会場";
            $PDF     ="PDF/kyusyu/kyusyu_gas_air.pdf";
            break;
        case '2':
            $location_mail="東京会場";
            $PDF     ="PDF/tokyo/tokyo_gas_air.pdf";
            break;
        case '3':
            $location_mail="大阪会場";
            $PDF     ="PDF/osaka/osaka_gas_air.pdf";
            break;
        case '4':
            $location_mail="名古屋会場";
            $PDF     ="PDF/nagoya/nagoya_gas_air.pdf";
            break;
        default:
            $location_mail="";
            $PDF     ="";
            break;
    }
    //Setting notice of dealine
    $nows = date('Y-m-d');
    $year=date('Y');
    $now_date = strtotime($nows);
    $date_gar_air = $wpdb->get_row("SELECT dealine_gar_air FROM dealine_app WHERE location = '".$local_ex."'AND date_setting LIKE '".$year."%'");
    $date3 = strtotime($date_gar_air->dealine_gar_air);
    $ck_gar_air=$wpdb->get_row("SELECT togashi_id FROM cache_gar_air WHERE location='".$local_ex."' and togashi_id='".$company->id."'");
    include_once(EXHIBITOR_APP.'/template/orther/various_gas_air.php');
}

function send_ceiling(){
    add_submenu_page(
        'various_applications',
        '天井構造・バルーン届出',
        '天井構造・バルーン届出',
        'manage_options',
        'ceiling',
        'fc_ceiling' 
    );

}
add_action( 'admin_menu', 'send_ceiling' );
function fc_ceiling(){
        global $wpdb;
    //Get location 
    $user = wp_get_current_user()->user_email;
    
    $company = $wpdb->get_row("SELECT * FROM register_togashi WHERE email_dk = '".$user."'");
    
    $location_u = $wpdb->get_results("SELECT togashi_id, catalog_id FROM register_togashi_link WHERE togashi_id = '".$company->id."' and status=1"); 
    
    $local_tmp = array();
    foreach ($location_u as $key) {
      $local_tmp[]= $key->catalog_id;
    }
    $local_ex=$location_u[0]->catalog_id;
    $local_list_ex=$local_tmp;   
    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $local_list_ex) ) {
        $local_ex = $_SESSION['location'];
    }
    switch ($local_ex) {
        case '1':
            $location_mail="九州会場";
            $PDF     ="PDF/kyusyu/kyusyu_ceiling.pdf";
            break;
        case '2':
            $location_mail="東京会場";
            $PDF     ="PDF/tokyo/tokyo_ceiling.pdf";
            break;
        case '3':
            $location_mail="大阪会場";
            $PDF     ="PDF/osaka/osaka_ceiling.pdf";
            break;
        case '4':
            $location_mail="名古屋会場";
            $PDF     ="PDF/nagoya/nagoya_ceiling.pdf";
            break;
        default:
            $location_mail="";
            $PDF     ="";
            break;
    }
    //Setting notice of dealine
    $nows = date('Y-m-d');
    $year=date('Y');
    $now_date = strtotime($nows);
    $date_ceiling = $wpdb->get_row("SELECT dealine_ceiling FROM dealine_app WHERE location = '".$local_ex."'AND date_setting LIKE '".$year."%'");
    $date4 = strtotime($date_ceiling->dealine_ceiling);
    $ck_ceiling=$wpdb->get_row("SELECT togashi_id FROM cache_ceiling WHERE location='".$local_ex."' and togashi_id='".$company->id."'");
    include_once(EXHIBITOR_APP.'/template/orther/various_ceiling.php');
}

function send_anchor(){
    add_submenu_page(
        'various_applications',
        'アンカー打設作業承認申請',
        'アンカー打設作業承認申請',
        'manage_options',
        'anchor',
        'fc_anchor' 
    );

}
add_action( 'admin_menu', 'send_anchor' );
function fc_anchor(){
    global $wpdb;
    //Get location 
    $user = wp_get_current_user()->user_email;
    
    $company = $wpdb->get_row("SELECT * FROM register_togashi WHERE email_dk = '".$user."'");
    
    $location_u = $wpdb->get_results("SELECT togashi_id, catalog_id FROM register_togashi_link WHERE togashi_id = '".$company->id."' and status=1"); 
    
    $local_tmp = array();
    foreach ($location_u as $key) {
      $local_tmp[]= $key->catalog_id;
    }
    $local_ex=$location_u[0]->catalog_id;
    $local_list_ex=$local_tmp;   
    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $local_list_ex) ) {
        $local_ex = $_SESSION['location'];
    }
    switch ($local_ex) {
        case '1':
            $location_mail="九州会場";
            break;
        case '2':
            $location_mail="東京会場";
            break;
        case '3':
            $location_mail="大阪会場";
            break;
        case '4':
            $location_mail="名古屋会場";
            break;
        default:
            $location_mail="";
            break;
    }
    //Setting notice of dealine
    $nows = date('Y-m-d');
    $year=date('Y');
    $now_date = strtotime($nows);
    $date_anchor = $wpdb->get_row("SELECT dealine_anchor FROM dealine_app WHERE location = '".$local_ex."'AND date_setting LIKE '".$year."%'");
    $date5 = strtotime($date_anchor->dealine_anchor);
    $ck_anchor=$wpdb->get_row("SELECT togashi_id FROM cache_anchor WHERE location='".$local_ex."' and togashi_id='".$company->id."'");
    include_once(EXHIBITOR_APP.'/template/orther/various_anchor.php');
}

function send_food(){
    add_submenu_page(
        'various_applications',
        '飲食券申込書',
        '飲食券申込書',
        'manage_options',
        'food',
        'fc_food' 
    );

}
add_action( 'admin_menu', 'send_food' );
function fc_food(){
            global $wpdb;
    //Get location 
    $user = wp_get_current_user()->user_email;
    
    $company = $wpdb->get_row("SELECT * FROM register_togashi WHERE email_dk = '".$user."'");
    
    $location_u = $wpdb->get_results("SELECT togashi_id, catalog_id FROM register_togashi_link WHERE togashi_id = '".$company->id."' and status=1"); 
    
    $local_tmp = array();
    foreach ($location_u as $key) {
      $local_tmp[]= $key->catalog_id;
    }
    $local_ex=$location_u[0]->catalog_id;
    $local_list_ex=$local_tmp;   
    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $local_list_ex) ) {
        $local_ex = $_SESSION['location'];
    }
    switch ($local_ex) {
        case '1':
            $location_mail="九州会場";
            $PDF     ="PDF/kyusyu/kyusyu_food.pdf";
            break;
        case '2':
            $location_mail="東京会場";
            $PDF     ="PDF/tokyo/tokyo_food.pdf";
            break;
        case '3':
            $location_mail="大阪会場";
            $PDF     ="PDF/osaka/osaka_food.pdf";
            break;
        case '4':
            $location_mail="名古屋会場";
            $PDF     ="PDF/nagoya/nagoya_food.pdf";
            break;
        default:
            $location_mail="";
            $PDF     ="";
            break;
    }
    //Setting notice of dealine
    $nows = date('Y-m-d');
    $year=date('Y');
    $now_date = strtotime($nows);
    $date_foods = $wpdb->get_row("SELECT dealine_foods FROM dealine_app WHERE location = '".$local_ex."'AND date_setting LIKE '".$year."%'");
    $date6 = strtotime($date_foods->dealine_foods);
    $ck_foods=$wpdb->get_row("SELECT togashi_id FROM cache_foods WHERE location='".$local_ex."' and togashi_id='".$company->id."'");
    include_once(EXHIBITOR_APP.'/template/orther/various_food.php');
}

/*** Add menu date 13-7-2017  ***/
function print_media(){
    add_menu_page(
        __( '基本申込確認 当日プリントアウトしてお持ちく ださい。', 'textdomain' ),
        '基本申込確認<br><span>当日プリントアウトしてお持ちく ださい。</span>',
        'manage_options',
        'print-applied',
        'fc_print_media',
        // plugins_url( 'admin-application/images/icon-upload-red.png' ),
        '',
        9
    );
}
add_action( 'admin_menu', 'print_media' );
function fc_print_media(){
	global $wpdb;
	//Get location 
	$user_prt = wp_get_current_user()->user_email;
    
    $company_prt = $wpdb->get_row("SELECT * FROM register_togashi WHERE email_dk = '".$user_prt."'");
    
    $lc = $wpdb->get_results("SELECT togashi_id, catalog_id FROM register_togashi_link WHERE togashi_id = '".$company_prt->id."' and status=1"); 
    
    $lc_tmp = array();
    foreach ($lc as $key) {
      $lc_tmp[]= $key->catalog_id;
    }
    $local_prt=$lc[0]->catalog_id;
    $local_prt_list=$lc_tmp;   
    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $local_prt_list) ) {
        $local_prt = $_SESSION['location'];
    }
    //Get information Profile
    $profile = $wpdb->get_row(
        "SELECT * FROM register_togashi WHERE email_dk = '".$user_prt."'"
    );

    if ($profile) {
        $meta = $wpdb->get_results(
            "SELECT meta_key, meta_value FROM register_togashi_meta WHERE togashi_id = ".$profile->id
        );

        if ($meta) {
            foreach ($meta as $value) {
                $tmp = $value->meta_key;
                if (!isset($profile->$tmp)) {
                    $profile->$tmp = $value->meta_value;
                }
            }
        }
    }
    //Get information Foundation
    $checkdata = $wpdb->get_row("SELECT * FROM exhibitor_foundation WHERE togashi_id = '".$company_prt->id."' and location='".$local_prt."'");
    include_once(EXHIBITOR_APP.'/template/print_media_application.php');

}