<?php
/**
 * Plugin Name:Admin Application
 * Plugin URI: No site
 * Description: Application for Admin Screen
   Author: Mr.VietSy
   Version: 1.0
   Author URI: http://example.com
 */
defined( 'ADMIN_APP' ) OR define( 'ADMIN_APP', plugin_dir_path(__FILE__) );

/*============================================================================================================
============================================ Admin List Exhibitor ============================================
=============================================================================================================*/

function list_exhibitor_admin(){
    add_menu_page(
        __( 'Custom Menu Title', 'textdomain' ),
        '確定出店社 一覧',
        'manage_options',
        'exhibitor-list-admin',
        'fc_list_exhibitor_admin',
        // plugins_url( 'admin-application/images/icon-all.png' ),
        '',
        2 );
}
add_action( 'admin_menu', 'list_exhibitor_admin' );

function fc_list_exhibitor_admin(){
    global $wpdb;

    $location = 1;
    $location_list = array(1, 2, 3, 4);
    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $location_list) ) {
        $location = $_SESSION['location'];
    }
    //if($location!=4){
    	// Fix 5262017
	    // Set query to count of record
	    //$year = $_GET['year'];
	    if($_GET['year']){
	    	$year=$_GET['year'];
	    }
	    else{
	    	$year=date(Y);
	    }

	    if (empty($year)) {
	        $query_count = "SELECT COUNT(*) as allItem
	         FROM register_togashi
	         LEFT JOIN register_togashi_link
	         ON register_togashi.id = register_togashi_link.togashi_id
	         WHERE catalog_id = ".$location." AND register_togashi_link.status = 1";
	    } else {
	        $query_count = "SELECT COUNT(*) as allItem
	         FROM register_togashi
	         LEFT JOIN register_togashi_link
	         ON register_togashi.id = register_togashi_link.togashi_id
	         WHERE catalog_id = ".$location." AND register_togashi_link.status = 1 AND date_dk LIKE '".$year."%'";
	    }
	    $count_tmp = $wpdb->get_results($query_count);

	    $count_all = 0;
	    if( isset($count_tmp[0]->allItem) ) {
	        $count_all = $count_tmp[0]->allItem;
	    }

	    $item    = 30;
	    $current = max( 1, (int) $_GET['paged']);
	    $start   = (int) ($current - 1) * $item;
	    $total   = (int) ($count_all / $item) + 1;

	    $paginate_links = "";
	    $paginate_links = paginate_links(
	        array(
	            // 'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	            // Fix 5262017
	            'base' => '%_%',
	            'format' => '?paged=%#%',
	            'current' => $current,
	            'total' => $total,
	            'prev_text' => ' < ',
	            'next_text' => ' > ',
	        )
	    );
	    // Fix 5262017
	    // Set query to get list detail
	    if (empty($year)) {
	        $query_list = "SELECT register_togashi.id, register_togashi_link.id as link_id, company_name, email_dk, catalog_id, number_booth, status, check1, check2
	         FROM register_togashi
	         LEFT JOIN register_togashi_link
	         ON register_togashi.id = register_togashi_link.togashi_id
	         WHERE catalog_id = ".$location." AND register_togashi_link.status = 1
	         LIMIT ".$item." OFFSET ".$start;
	    } else {
	        $query_list = "SELECT register_togashi.id, register_togashi_link.id as link_id, company_name, email_dk, catalog_id, number_booth, status, check1, check2
	         FROM register_togashi
	         LEFT JOIN register_togashi_link
	         ON register_togashi.id = register_togashi_link.togashi_id
	         WHERE catalog_id = ".$location." AND register_togashi_link.status = 1 AND date_dk LIKE '".$year."%'
	         LIMIT ".$item." OFFSET ".$start;
	    }
	    $list_reg = $wpdb->get_results($query_list);

	    if( $list_reg )
	    {
	        foreach ($list_reg as $key => $val)
	        {

	            /*Name check*/
	            $check = array();
	            if( $val->check1>0 )  { $check[] = 'カタログ'; }
	            if( $val->check2>0 )  { $check[] = '同梱'; }
	            $val->check_name = implode(" ・ ", $check);

	            $detail_url = admin_url('admin.php?page=list-detail&id='.$val->id);
	            $val->detail_url = $detail_url;

	            $list_reg[$key] = $val;
	        }
	    }
    //}
    
    //Down Button 1(Excel1) + Buttton 4(Excel3) + Edit button 3 ( Excel 4) By ms.thuyanit
    $ques = array(
      'a'=>array(
          'title'=>'不動産会社向け',
          'value'=>array(
              '団体・協会',
              '家賃収納',
              '賃貸管理システム',
              '高齢者住宅仲介',
              '営業支援',
              '仲介支援',
              '放置自転車撤去サービス',
              'サイト運営',
              '家賃債務保証',
              '業務支援',
              '保険',
              '資格',
              '24時間コールセンター',
              '鍵管理システム',
              '浄水器レンタル',
              '教育',
              '不動産会社FC',
              '決済代行サービス',
          ),
      ),

      'b'=>array(
          'title'=>'住宅設備・建材',
          'value'=>array(
              '鍵',
              'バルコニー建材',
              '水回り',
              '防犯機器',
              '設備リース',
              '浴室',
              '見守りシステム',
              '宅配BOX',
              '電力削減提案',
              '住宅設備',
              '壁紙',
              '畳',
              '床材',
              '防犯カメラ',
              '太陽光',
              '室内干し',
              '防災機器',
              '外壁リフォーム',
              'ブロードバンド',
              'ガス機器',
              '自転車置場',
              'ゴミBOX',
              'エクステリア・ガーデニング商材',
              '塗装剤',
          ),
      ),

      'c'=>array(
          'title'=>'オーナー向け',
          'value'=>array(
              '家賃収納',
              '高齢者住宅',
              'サイト運営・情報・出版',
              'ハウスクリーニング',
              '高齢者向け保険',
              '設備紹介サイト',
              '家事代行',
              '農地活用',
              'リノベーション',
              'コンアルティング',
              '定期借地',
              '建物診断',
              '賃貸管理',
              'シェアハウス',
              '資格',
          ),
      ),

      'd'=>array(
          'title'=>'建築・コンセプト土地活用',
          'value'=>array(
              'トランクルーム',
              '戸建て賃貸',
              '高齢者住宅',
              '駐車場運営FC',
              'ランドリー経営',
              '建築・企画',
              'そのほか土地活用',
          ),
      ),

      'e'=>array(
          'title'=>'税務・相続対策',
          'value'=>array(
              '税務',
              '相続対策',
          ),
      ),

      'f'=>array(
          'title'=>'法律',
          'value'=>array(
              '法律',
          ),
      ),

      'g'=>array(
          'title'=>'リフォームリノベーション',
          'value'=>array(
              'リノベーション',
              '防水工事',
              '原状回復',
              '給排水管',
              '外壁リフォーム',
              '耐震補強',
              'リノベーションFC',
          ),
      ),

      'h'=>array(
          'title'=>'不動産投資・資産運用',
          'value'=>array(
              '収益用不動産販売',
              '海外不動産',
              '金融',
          ),
      ),

      'k'=>array(
          'title'=>'その他',
          'value'=>array(
              'マッサージ',
              '葬儀会館運営FC',
          ),
      ),
  );

    $list_company = $wpdb->get_results( 
        "SELECT register_togashi.id, register_togashi_link.id as company_id, company_name, number_booth, date_dk, email_dk,check1, check2
        FROM register_togashi
        LEFT JOIN register_togashi_link
        ON register_togashi.id = register_togashi_link.togashi_id
        WHERE catalog_id = ".$location." AND register_togashi_link.status = 1"
    );
    $list_foundation = $wpdb->get_results( "SELECT * FROM exhibitor_foundation WHERE location='".$location."'");
    $list_construction = $wpdb->get_results( "SELECT * FROM exhibitor_construction WHERE location='".$location."'");
    if( $list_company )
    {
        foreach ($list_company as $key => $val) 
        {
            $val->qty_booth=NULL;
            $val->qty_booth_price = "";
            //get excel 1
            $val->spot_100W = NULL;
            $val->outlet_500W = NULL;
            $val->primary_electric = NULL;
            $val->distribution_board =NULL;
            $val->fee_usage_electric=NULL;
            $val->reception_electric=NULL;
            $val->counter_chair=NULL;
            $val->register_name=NULL;
            
            $val->ceiling_structure ="";
            $val->use_of_fire ="";
            $val->drainage_construction ="";
            $val->anchor_construction ="";
            $val->qty_car ="";
            $val->model_car ="";
            $val->from_time ="";
            $val->to_time ="";
            $val->qty_booth ="";
            $val->carpet_color ="";
            $val->number_nameplate="";
            $val->roof="";
            $val->company_name_plate_reg="";
            $val->table="";
            $val->chair="";
            if( $list_foundation ) 
            {
                foreach ($list_foundation as $k => $v) 
                {  
                    if( $v->togashi_id== $val->id) 
                    {
                        $v->info = @unserialize($v->info);
                        if( isset($v->info['qty_booth'])&&($v->info['qty_booth']==1)) {
                            $val->qty_booth=1;
                            $val->qty_booth_price = 53000;
                            $val->spot_100W = 2;
                            $val->outlet_500W = 1;
                            $val->primary_electric = '1kw';
                            $val->distribution_board ='1kw';
                            $val->fee_usage_electric=1;
                            $val->reception_electric=1;
                            $val->counter_chair=1;
                            $val->register_name=1;
                        }   
                        if( isset($v->info['qty_booth'])&&($v->info['qty_booth']==2)) {
                            $val->qty_booth=2;
                            $val->qty_booth_price = 94000;
                            $val->spot_100W = 4;
                            $val->outlet_500W = 2;
                            $val->primary_electric = '2kw';
                            $val->distribution_board ='2kw';
                            $val->fee_usage_electric=2;
                            $val->reception_electric=1;
                            $val->counter_chair=1;
                            $val->register_name=1;
                        }    
                        if( isset($v->info['qty_booth'])&&($v->info['qty_booth']==3)) {
                            $val->qty_booth=3;
                            $val->qty_booth_price = 147000;
                            $val->spot_100W = 6;
                            $val->outlet_500W = 3;
                            $val->primary_electric = '3kw';
                            $val->distribution_board ='3kw';
                            $val->fee_usage_electric=3;
                            $val->reception_electric=1;
                            $val->counter_chair=1;
                            $val->register_name=1;
                        } 

                        // Get value for excel 1
                        if( isset($v->info['ceiling_structure']) ) {
                            $val->ceiling_structure = $v->info['ceiling_structure'];
                        }  
                        if( isset($v->info['use_of_fire']) ) {
                            $val->use_of_fire = $v->info['use_of_fire'];
                        }  
                        if( isset($v->info['drainage_construction']) ) {
                            $val->drainage_construction = $v->info['drainage_construction'];
                        }  
                        if( isset($v->info['anchor_construction']) ) {
                            $val->anchor_construction = $v->info['anchor_construction'];
                        }  
                        if( isset($v->info['qty_car']) ) {
                            $val->qty_car = $v->info['qty_car'];
                        }
                        if( isset($v->info['model_car']) ) {
                            $val->model_car = $v->info['model_car'];
                        } 
                        if( isset($v->info['from_time']) ) {
                            $val->from_time = $v->info['from_time'];
                        } 
                        if( isset($v->info['to_time']) ) {
                            $val->to_time = $v->info['to_time'];
                        } 
                        if( isset($v->info['qty_booth']) ) {
                            $val->qty_booth = $v->info['qty_booth'];
                        } 
                        if( isset($v->info['carpet_color']) ) {
                            $val->carpet_color = $v->info['carpet_color'];
                        } 
                        // khúc sau
                        if( isset($v->info['number_nameplate']) ) {
                            $val->number_nameplate = $v->info['number_nameplate'];
                        } 
                        if( isset($v->info['roof']) ) {
                            $val->roof = $v->info['roof'];
                        } 
                        if( isset($v->info['company_name_plate_reg']) ) {
                            $val->company_name_plate_reg = $v->info['company_name_plate_reg'];
                        } 
                        if( isset($v->info['table']) ) {
                            $val->table = $v->info['table'];
                        } 
                        if( isset($v->info['chair']) ) {
                            $val->chair = $v->info['chair'];
                        }
                  
                        break;
                    }
                }
            }
            //Exhibitor Construction  
            $val->type1 ="";
            $val->type2 ="";
            $val->electric_use="";
            $val->optional_electric1 = "";
            $val->optional_electric2 = "";
            $val->optional_electric3 = "";
            $val->optional_electric4 = "";
            $val->optional_electric5 = "";
            $val->optional_electric6 = "";
            if( $list_construction ) 
            {
                foreach ($list_construction as $k => $v) 
                {  
                    if( $v->togashi_id== $val->id) 
                    {
                        $v->info = @unserialize($v->info);
                        if( isset($v->info['100V']) ) {
                            $val->type1 = $v->info['100V'];
                        }   
                        if( isset($v->info['200V']) ) {
                            $val->type2 = $v->info['200V'];
                        } 
                        if( isset($v->info['electric_use']) ) {
                            $val->electric_use = $v->info['electric_use'];
                        }    
                        if( isset($v->info['optional_electric1']) ) {
                            $val->optional_electric1 = $v->info['optional_electric1'];
                        }   
                        if( isset($v->info['optional_electric2']) ) {
                            $val->optional_electric2 = $v->info['optional_electric2'];
                        }   
                        if( isset($v->info['optional_electric3']) ) {
                            $val->optional_electric3 = $v->info['optional_electric3'];
                        }   
                        if( isset($v->info['optional_electric4']) ) {
                            $val->optional_electric4 = $v->info['optional_electric4'];
                        }   
                        if( isset($v->info['optional_electric5']) ) {
                            $val->optional_electric5 = $v->info['optional_electric5'];
                        }   
                        if( isset($v->info['optional_electric6']) ) {
                            $val->optional_electric6 = $v->info['optional_electric6'];
                        }   
                        break;
                    }
                }
            }
            $list_orders = $wpdb->get_results( "SELECT * FROM orders WHERE catalog_id='".$location."'");
            $val->total_order="";
            if($list_orders) 
            {
                foreach ($list_orders as $k => $v) 
                {  
                    if( $v->customer_id== $val->id) 
                    {
                        if( $v->total_price){
                             $val->total_order= $v->total_price;
                        } 
                        break;
                    }
                }
            }
            //Meta
            $list_meta = $wpdb->get_results( "SELECT * FROM register_togashi_meta");
            if($list_meta){
                foreach ($list_meta as $k => $v) {
                    if( $v->togashi_id== $val->id){
                        $key_tmp = $v->meta_key;
                        $val_tmp = $v->meta_value;
                        if( !isset($val->$key_tmp) ) {
                            $val->$key_tmp = $val_tmp;
                        }
                    }
                }
            }
            if( isset($val->choose) ) {
                $choose = @unserialize($val->choose);
                if( is_array($choose) ) {
                    $val->choose = $choose;
                }
            }
            // Order2 
            $list_orders2 =  $wpdb->get_results(
                "SELECT orders.id, order_items.id as order_items_id, customer_id, product_detail, product_spec_detail
                FROM orders
                LEFT JOIN order_items ON orders.id = order_items.order_id
                LEFT JOIN order_items_spec ON order_items.id = order_items_spec.order_items_id
                WHERE catalog_id = ".$location." AND customer_id = ".$val->id
            );  

            if( $list_orders2 )
            {
                $tam = array();
                foreach ($list_orders2 as $key => $v2)
                {
                    $v2->product_detail             = @json_decode($v2->product_detail);
                    $v2->product_spec_detail        = @json_decode($v2->product_spec_detail);

                    $tmp_v2 = (array) $v2; unset($tmp_v2['product_spec_detail']);

                    if( !isset($tam[$v2->order_items_id]) ) {
                        $tam[$v2->order_items_id] = $tmp_v2;   
                        $tam[$v2->order_items_id]['product_spec_detail'][] = $v2->product_spec_detail; 
                    } else {
                        $tam[$v2->order_items_id]['product_spec_detail'][] = $v2->product_spec_detail;
                    }
                }
                $val->list_orders2 = (object) $tam;
            }
        }
    }
    include_once(ADMIN_APP.'/template/layout-exhibitor-list-admin.php');
}


//List Detail
function list_detail_admin(){
    add_submenu_page(
        NULL,
        'Detail',
        'Detail',
        'manage_options',
        'list-detail',
        'fc_list_detail_admin'
    );
}
add_action( 'admin_menu', 'list_detail_admin' );

function fc_list_detail_admin(){
    global $wpdb;

    $location_name = array(
        1=> '九州会場　5/17（水）・18（木）',
        2=> '東京会場　7/25（火）・26（水）',
        3=> '大阪会場　9/29（金）・30（土）',
        4=> '名古屋会場　11/7（火）・8（水）',
    );

    $location = 1;
    $location_list = array(1, 2, 3, 4);
    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $location_list) ) {
        $location = $_SESSION['location'];
    }

    if( $_GET['id'] ) {
        $id = $_GET['id'];

        /*Kiem tra id ton tai hay ko*/
        $detail = $wpdb->get_row(
            "SELECT register_togashi.id, register_togashi_link.id as link_id, company_name, email_dk, catalog_id, number_booth, status, check1, check2
             FROM register_togashi
             LEFT JOIN register_togashi_link
             ON register_togashi.id = register_togashi_link.togashi_id
             WHERE catalog_id = ".$location." AND register_togashi.id = ".$id
        );

        if( $detail )
        {
            $meta = $wpdb->get_results( "SELECT * FROM register_togashi_meta WHERE togashi_id = ".$detail->id );
            $billing_data = $wpdb->get_results( "SELECT * FROM exhibitor_payment WHERE register_id = ".$detail->id );
            foreach ($meta as $key => $value) {

                $key_tmp = $value->meta_key;
                $val_tmp = $value->meta_value;

                if( !isset($detail->$key_tmp) ) {
                    $detail->$key_tmp = $val_tmp;
                }
            }

            unset($detail->catalogue);
            if( isset($detail->choose) ) {
                $choose = @unserialize($detail->choose);
                if( is_array($choose) ) {
                    $detail->choose = $choose;
                }
            }

            $detail->location_name = $location_name[$location];

            include_once(ADMIN_APP.'/template/layout-list-detail.php');
        }
        else {
            echo 'This user do not register at this location';
        }
    }
}

if (! function_exists('item_detail_get_val')) {
    function item_detail_get_val($name, $data=NULL)
    {
        if( isset($data[$name]) ) {
            return $data[$name];
        }
        return FALSE;
    }
}

if (!function_exists('item_detail_get_select')) {
    function item_detail_get_select($name, $val="", $data=NULL)
    {
        if( isset($data[$name]) && $data[$name]==$val) {
            return 'selected';
        }
        return FALSE;
    }
}

/*============================================================================================================
=========================================   Admin Access Dealine      ==================================================
============================================================================================================*/
function registration_dealine_admin(){
    add_menu_page(
        __( 'Custom Menu Title', 'textdomain' ),
        '申込期限設定',
        'manage_options',
        'setup-dealine',
        'fc_registration_dealine_admin',
        null,
        3
    );
}
add_action( 'admin_menu', 'registration_dealine_admin' );

function fc_registration_dealine_admin(){
    global $wpdb;

    if($_GET['year']){
    	$year=$_GET['year'];
    }
    else{
    	$year=date('Y');
    }
	$location = 1;
    $location_list = array(1, 2, 3, 4);
    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $location_list) ) {
        $location = $_SESSION['location'];
    }

	$date = $wpdb->get_row("SELECT * FROM dealine_app WHERE location = ".$location." AND date_setting LIKE '".$year."%'");
	// echo "<pre>";
	// print_r($date);
	// echo "</pre>";
  
	if ($date) {
		$date->dealine_foundation = date('Y/m/d',strtotime($date->dealine_foundation));
		$date->dealine_construction = date('Y/m/d',strtotime($date->dealine_construction));
		$date->dealine_goods = date('Y/m/d',strtotime($date->dealine_goods));
	    //05-06-2017
	    $date->dealine_billing = date('Y/m/d',strtotime($date->dealine_billing));
	    $date->dealine_danger = date('Y/m/d',strtotime($date->dealine_danger));
	    $date->dealine_drainage = date('Y/m/d',strtotime($date->dealine_drainage));
	    $date->dealine_gar_air = date('Y/m/d',strtotime($date->dealine_gar_air));
	    $date->dealine_ceiling = date('Y/m/d',strtotime($date->dealine_ceiling));
	    $date->dealine_anchor = date('Y/m/d',strtotime($date->dealine_anchor));
	    $date->dealine_foods = date('Y/m/d',strtotime($date->dealine_foods));
	    //End

	    $dealine_foundation='';
		$dealine_construction='';
		$dealine_goods='';
		$dealine_billing='';
		$dealine_danger='';
		$dealine_drainage='';
		$dealine_gar_air='';
		$dealine_ceiling='';
		$dealine_anchor='';
		$dealine_foods='';
	    if($_POST['dealine_foundation']!=''){
	    	$update1 = strtotime($_POST['dealine_foundation']);
	    	$dealine_foundation=  date("Y/m/d", $update1);
	    }
		if($_POST['dealine_construction']!=''){
			$update2 = strtotime($_POST['dealine_construction']);
	    	$dealine_construction=  date("Y/m/d", $update2);
		}
		if($_POST['dealine_goods'] !=''){
			$update3= strtotime($_POST['dealine_goods']);
		    $dealine_goods=  date("Y/m/d", $update3);
		}

		if($_POST['dealine_billing']!=''){
			$update4 = strtotime($_POST['dealine_billing']);
	    	$dealine_billing=  date("Y/m/d", $update4);
		}

		if($_POST['dealine_danger']!=''){
		 	$update5 = strtotime($_POST['dealine_danger']);
		    $dealine_danger=  date("Y/m/d", $update5);
		}

		if($_POST['dealine_drainage']!=''){
			$update6= strtotime($_POST['dealine_drainage']);
		    $dealine_drainage=  date("Y/m/d", $update6);
		}
		if($_POST['dealine_gar_air']!=''){
			$update7 = strtotime($_POST['dealine_gar_air']);
		    $dealine_gar_air=  date("Y/m/d", $update7);
		}
	   	if($_POST['dealine_ceiling']!=''){
			$update8 = strtotime($_POST['dealine_ceiling']);
		    $dealine_ceiling=  date("Y/m/d", $update8);
	   	}

	   	if($_POST['dealine_anchor']!=''){
	   		$update9= strtotime($_POST['dealine_anchor']);
	    	$dealine_anchor=  date("Y/m/d", $update9);
	   	}

	   	if($_POST['dealine_foods']!=''){
	   		$update10= strtotime($_POST['dealine_foods']);
	    	$dealine_foods=  date("Y/m/d", $update10);
	   	}
		if ($_POST) {
			$date_setting =date("Y/m/d");
			$insert = $wpdb->update(
	            'dealine_app',
	            array(
	              'dealine_foundation' => 	$dealine_foundation,
	              'dealine_construction' =>  $dealine_construction,
	              'dealine_goods' => 	$dealine_goods,
                  'dealine_billing' =>  $dealine_billing,
                  'dealine_danger' =>  $dealine_danger,
                  'dealine_drainage' =>  $dealine_drainage,
                  'dealine_gar_air' =>  $dealine_gar_air,
                  'dealine_ceiling' =>  $dealine_ceiling,
                  'dealine_anchor' =>  $dealine_anchor,
                  'dealine_foods' =>  $dealine_foods,
                  'date_setting'=>$date_setting

	            ),
	            array( 'location' => $location ),
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
	            ),
	            array(
	                '%d'
	            )
	        );
			echo '<script type="text/javascript">
                    window.location = "'.admin_url('admin.php?page=setup-dealine').'";
                </script>';
		}
	}else{
		if ($_POST) {
		    $insert1 = strtotime($_POST['dealine_foundation']);
            $dealine1=  date("Y/m/d", $insert1);

            $insert2 = strtotime($_POST['dealine_construction']);
            $dealine2=  date("Y/m/d", $insert2);

            $insert3= strtotime($_POST['dealine_goods']);
            $dealine3=  date("Y/m/d", $insert3);
            //05-06-2017
            $insert4= strtotime($_POST['dealine_billing']);
            $dealine4=  date("Y/m/d", $insert4);

            $insert5= strtotime($_POST['dealine_danger']);
            $dealine5=  date("Y/m/d", $insert5);

            $insert6= strtotime($_POST['dealine_drainage']);
            $dealine6=  date("Y/m/d", $insert6);

            $insert7= strtotime($_POST['dealine_gar_air']);
            $dealine7=  date("Y/m/d", $insert7);

            $insert8= strtotime($_POST['dealine_ceiling']);
            $dealine8=  date("Y/m/d", $insert8);

            $insert9= strtotime($_POST['dealine_anchor']);
            $dealine9=  date("Y/m/d", $insert9);

            $insert10= strtotime($_POST['dealine_foods']);
            $dealine10=  date("Y/m/d", $insert10);
            $date_setting =date("Y/m/d");

			$insert = $wpdb->insert(
	            'dealine_app',
	            array(
	                'dealine_foundation' => $dealine1,
	                'dealine_construction' => $dealine2,
	                'dealine_goods' =>$dealine3,
                  'dealine_billing' => $dealine4,
                  'dealine_danger' => $dealine5,
                  'dealine_drainage' =>$dealine6,
                  'dealine_gar_air' => $dealine7,
                  'dealine_ceiling' => $dealine8,
                  'dealine_anchor' =>$dealine9,
                  'dealine_foods' =>$dealine10,
	                'location' => $location,
	                'date_setting'=> $date_setting
	            ),
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
	                '%d',
	                '%s',
	            )
	        );
			echo '<script type="text/javascript">
                    window.location = "'.admin_url('admin.php?page=setup-dealine').'";
                </script>';
		}
	}
    include_once(ADMIN_APP.'/template/layout-dealine-app.php');
}
/*============================================================================================================
============================================ Admin Goods =====================================================
=============================================================================================================*/

function list_amenity_goods_admin(){
    add_menu_page(
        __( 'Custom Menu Title', 'textdomain' ),
        'レンタル備品 登録',
        'manage_options',
        'amenity-goods',
        'fc_list_amenity_goods_admin',
        // plugins_url( 'admin-application/images/icon-upload-red.png' ),
        '',
        5
    );
}
add_action( 'admin_menu', 'list_amenity_goods_admin' );

function fc_list_amenity_goods_admin(){

    global $wpdb;
    // Nếu tồn tại action thi

    if( $_GET['action'] && $_GET['id']&&$_GET['action']==='remove')
    {
        $id = $_GET['id'];
        $delete = $wpdb->delete(
            'shop_togashi',
            array(
                'id' => $id,
            ),
            array( '%d')
        );
        $delete2 = $wpdb->delete(
            'shop_togashi_specification',
            array(
                'shop_id' => $id,
            ),
            array( '%d')
        );
        if($delete&&$delete2)
        {
        	echo "<script> alert('Remove sucess');</script>";
        }

        echo '<script type="text/javascript">
                 window.location = "'.admin_url('admin.php?page=amenity-goods').'";
            </script>';
    }
    else
    {
    // $shop_togashi = $wpdb->get_results(
    //     "SELECT * FROM shop_togashi WHERE status = 1"
    // );
	    // $shop_togashi = $wpdb->get_results(
	    //     "SELECT * FROM shop_togashi order by date_dk DESC"
	    // );

      // Fix 5262017
      //$year = $_GET['year'];
      if($_GET['year']){
    		$year = $_GET['year'];
		  }
	  	else{
	  		$year = date(Y);
	  	}

      $location = 1;
      $location_list = array(1, 2, 3, 4);
      if( isset($_SESSION['location']) && in_array($_SESSION['location'], $location_list) ) {
          $location = $_SESSION['location'];
      }
      // Set query to get list amenity
      if (empty($year)) {
          $shop_togashi = $wpdb->get_results(
              "SELECT * FROM shop_togashi WHERE location ='".$location."' ORDER BY date_dk DESC"
          );
      } else {
          $shop_togashi = $wpdb->get_results(
              "SELECT * FROM shop_togashi WHERE location ='".$location."' AND date_dk LIKE '".$year."%' ORDER BY date_dk DESC"
          );
      }

	    foreach ($shop_togashi as $key => $val)
	    {
	        /*Get op*/
	        // $shop_op = $wpdb->get_results(
	        //     "SELECT * FROM shop_togashi_specification WHERE status = 1 AND shop_id = ".$val->id
	        // );
	        $shop_op = $wpdb->get_results(
	            "SELECT * FROM shop_togashi_specification WHERE shop_id = ".$val->id
	        );
	        $val->shop_op = $shop_op;

	        $quantity_stock = "";
	        $specification = "";
	        $price = "";
	        $status = "";
	        foreach ($shop_op as $k => $v) {
	            $quantity_stock .= '<p>'.$v->quantity_stock.'</p>';
	            $specification .= '<p>'.$v->specification.'</p>';
	            $price .= '<p>'.$v->price.'</p>';

	            if( $v->status == 1 ) {
	                $status_n = '公開';
	            } else {
	                $status_n = '非公開';
	            }
	            $status .= '<p>'.$status_n.'</p>';
	        }
	        $val->op_quantity_stock = $quantity_stock;
	        $val->op_specification = $specification;
	        $val->op_price = $price;
	        $val->op_status = $status;
	        $val->edit_item_url = admin_url('admin.php?page=edit-item-amenity-goods&id='.$val->id);
	        // Nếu không tồn tại action thi
		    $remove_url = admin_url('admin.php?page=amenity-goods&action=remove&id='.$val->id);
		    $val->remove_url = $remove_url;

	        $shop_togashi[$key] = $val;
	    }
    //end
	include_once(ADMIN_APP.'/template/layout-list-goods.php');
	} // End else
}

// Register Amenity Goods
function register_amenity_goods_admin(){
   	add_submenu_page(
        NULL,
        'Register',
        'Register',
        'manage_options',
        'register-amenity-goods',
        'fc_register_amenity_goods_admin'
    );
}
add_action( 'admin_menu', 'register_amenity_goods_admin' );

function fc_register_amenity_goods_admin(){

    global $wpdb;
    $location = 1;
    $location_list = array(1, 2, 3, 4);
    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $location_list) ) {
        $location = $_SESSION['location'];
    }
    if( $_POST )
    {
        $d=getdate();
        $date_dk=$d['year']."-".$d['mon']."-".$d['mday'];
        /*Insert Shop*/
        $insert = $wpdb->insert(
            'shop_togashi',
            array(
                // 'item_number' => $_POST['item_number'],
                'item_name' => $_POST['item_name'],
                'item_imgs'=> @serialize($_POST['file_image']),
                'status' => $_POST['publish'],
                'date_dk'=>$date_dk,
                'location'=>$location,
            ),
            array(
                // '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%d'
            )
        );

        if( $insert ) {
            $insert_id = $wpdb->insert_id;

            $data_insert_op = array();
            if( count($_POST['specification']) ) {
                foreach ($_POST['specification'] as $key => $val) {
                    if( !empty($val) ) {
                        $item_row['shop_id']        = $insert_id;
                        $item_row['quantity_stock']  = $val;
                        $item_row['specification']  = $val;
                        $item_row['price']            = "";
                        $item_row['status']         = 0;
                        if( !empty($_POST['quantity_stock'][$key]) ) {
                            $item_row['quantity_stock']  =$_POST['quantity_stock'][$key];
                        }
                        if( !empty($_POST['gia'][$key]) ) {
                            $item_row['price']  =$_POST['gia'][$key];
                        }
                        if( !empty($_POST['check'][$key]) ) {
                            $item_row['status']  =$_POST['check'][$key];
                        }

                        $data_insert_op[] = $item_row;
                    }
                }
            }

            /*Insert OP*/
            if( count($data_insert_op) )
            {
                foreach ($data_insert_op as $v) {
                    $insert = $wpdb->insert(
                        'shop_togashi_specification',
                        $v,
                        array(
                            '%d',
                            '%s',
                            '%s',
                            '%s',
                            '%d',
                        )
                    );
                }
            }

            echo '<script type="text/javascript">
                    window.location = "'.admin_url('admin.php?page=amenity-goods').'";
                </script>';
        }
    }

	include_once(ADMIN_APP.'/template/layout-register-goods.php');
}

function my_media_lib_uploader_enqueue() {
    wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'my_media_lib_uploader_enqueue');

// Edit Item Amenity Goods
function edit_item_amenity_goods_admin(){
    add_submenu_page(
        NULL,
        'Edit',
        'Edit',
        'manage_options',
        'edit-item-amenity-goods',
        'fc_edit_item_amenity_goods_admin'
    );
}
add_action( 'admin_menu', 'edit_item_amenity_goods_admin' );

function fc_edit_item_amenity_goods_admin(){

    global $wpdb;
    $id=$_GET['id'];
    // $items = $wpdb->get_row( "SELECT * FROM shop_togashi WHERE status = 1" );
    $items = $wpdb->get_row( "SELECT * FROM shop_togashi wHERE id=$id");


    if( $items )
    {
        /*Get OP*/
        $items_op = $wpdb->get_results(
            "SELECT * FROM shop_togashi_specification WHERE shop_id = ".$items->id
        );

        $items->items_op = $items_op;

        $items->item_imgs = @unserialize($items->item_imgs);
        if( !is_array($items->item_imgs) ) {
            $items->item_imgs = array();
        }

        if( $_POST ) {

            $update = $wpdb->update(
                'shop_togashi',
                array(
                    // 'item_number' => $_POST['item_number'],
                    'item_name' => $_POST['item_name'],
                    'item_imgs'=> @serialize($_POST['file_image']),
                    'status' => $_POST['publish'],
                ),
                array( 'id' => $items->id ),
                array(
                    // '%s',
                    '%s',
                    '%s',
                    '%s',
                ),
                array( '%d' )
            );

            /*Xoa1 op cu*/
            $wpdb->delete( 'shop_togashi_specification', array( 'shop_id' => $items->id ), array( '%d' ) );

            /*Xu lu post, tao array insert op*/
            $data_insert_op = array();
            if( count($_POST['specification']) ) {
                foreach ($_POST['specification'] as $key => $val) {
                    if( !empty($val) ) {
                        $item_row['shop_id']        = $items->id;
                        $item_row['quantity_stock']  = $val;
                        $item_row['specification']  = $val;
                        $item_row['price']            = "";
                        $item_row['status']         = 0;
                        if( !empty($_POST['quantity_stock'][$key]) ) {
                            $item_row['quantity_stock']  =$_POST['quantity_stock'][$key];
                        }
                        if( !empty($_POST['gia'][$key]) ) {
                            $item_row['price']  =$_POST['gia'][$key];
                        }
                        if( !empty($_POST['check'][$key]) ) {
                            $item_row['status']  =$_POST['check'][$key];
                        }

                        $data_insert_op[] = $item_row;
                    }
                }
            }

            /*Insert OP*/
            if( count($data_insert_op) )
            {
                foreach ($data_insert_op as $v) {
                    $insert = $wpdb->insert(
                        'shop_togashi_specification',
                        $v,
                        array(
                            '%d',
                            '%s',
                            '%s',
                            '%s',
                            '%d',
                        )
                    );
                }
            }

            /*chuyen trang*/
            echo '<script type="text/javascript">
                    window.location = "'.admin_url('admin.php?page=amenity-goods').'";
                </script>';

        } else {
          include_once(ADMIN_APP.'/template/layout-edit-item-goods.php');
        }
    } else {
        echo 'No Found this ID';
    }
}


// hien thi Item Amenity Goods
function show_item_amenity_goods(){
    add_submenu_page(
        NULL,
        'Show',
        'Show',
        'manage_options',
        'show-item-amenity-goods',
        'fc_show_item_amenity_goods'
    );
}
add_action( 'admin_menu', 'show_item_amenity_goods' );

function fc_show_item_amenity_goods(){

    global $wpdb;

    // $shop_togashi = $wpdb->get_results(
    //     "SELECT * FROM shop_togashi WHERE status = 1"
    // );
    $shop_togashi = $wpdb->get_results(
        "SELECT * FROM shop_togashi"
    );

    foreach ($shop_togashi as $key => $val)
    {
        /*Get op*/
        // $shop_op = $wpdb->get_results(
        //     "SELECT * FROM shop_togashi_specification WHERE status = 1 AND shop_id = ".$val->id
        // );
        $shop_op = $wpdb->get_results(
            "SELECT * FROM shop_togashi_specification WHERE shop_id = ".$val->id
        );
        $val->shop_op = $shop_op;

        $val->item_imgs = @unserialize($val->item_imgs);
        if( !is_array($val->item_imgs) ) { $val->item_imgs = array(); }

        $quantity_stock = "";
        $specification = "";
        $price = "";
        foreach ($shop_op as $k => $v) {
            $quantity_stock .= '<p>'.$v->quantity_stock.'</p>';
            $specification .= '<p>'.$v->specification.'</p>';
            $price .= '<p>'.$v->price.'</p>';
        }

        $val->op_quantity_stock = $quantity_stock;
        $val->op_specification = $specification;
        $val->op_price = $price;
        $val->op_status = $status;

        $val->edit_item_url = admin_url('admin.php?page=edit-item-amenity-goods&id='.$val->id);

        $shop_togashi[$key] = $val;
    }
    include_once(ADMIN_APP.'/template/layout-show-item.php');
}
/*===========================================================================
==============   MENU  SPEAKERS - NGUOI THAM GIA BIEU DIEN   ================
=============================================================================*/
// Begin Comment code by ms.thuyanit . This code will use again. Don't Remove
/*
function speakers_admin(){
    add_menu_page(
        __( 'Custom Menu Title', 'textdomain' ),
        '講演者一覧',
        'manage_options',
        'speaker-all',
        'fc_speakers_admin',
        null,
        // '',
        6
    );
     add_submenu_page(
        'speaker-all',
        '',
        '',
        'manage_options',
        'speaker-all'
    );
}
add_action( 'admin_menu', 'speakers_admin' );

function fc_speakers_admin(){
	include_once(ADMIN_APP.'/template/layout-all-speakers.php');
}
//accept
function speakers_pending(){

    add_submenu_page(
        'speaker-all',
        '確認待ち',
        '確認待ち',
        'manage_options',
        'speaker-pending',
        'fc_speakers_pending'
    );

}
add_action( 'admin_menu', 'speakers_pending' );

function fc_speakers_pending(){
  include_once(ADMIN_APP.'/template/layout-pending-speakers.php');
}

//pending
function speakers_registration(){
    add_submenu_page(
        'speaker-all',
        '講演者登録',
        '講演者登録',
        'manage_options',
        'speakers-registration',
        'fc_speakers_registration'
    );

}
add_action( 'admin_menu', 'speakers_registration' );

function fc_speakers_registration(){
  include_once(ADMIN_APP.'/template/layout-registration-speakers.php');
}

//refuse
function speakers_datetime(){
    add_submenu_page(
        'speaker-all',
        '講演日時',
        '講演日時',
        'manage_options',
        'speaker-datetime',
        'fc_speakers_datetime'
    );
}
add_action( 'admin_menu', 'speakers_datetime' );

function fc_speakers_datetime(){
  include_once(ADMIN_APP.'/template/layout-datetime-speakers.php');
}*/
//End comment By ms.thuyanit. This code DON'T REMOVE . WILL MAKE IT AFTER
// function my_active_menu_css() {
//     wp_enqueue_style('admin-application', plugins_url('/css/active-menu.css', __FILE__),fc_my_admin_theme);
// }
// add_action('admin_enqueue_scripts', 'my_active_menu_css');
function my_active_menu_css() {
    wp_enqueue_style('admin-application', plugins_url('/css/active-menu.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'my_active_menu_css');

function create_posttype() {

    register_post_type( 'news',
        array(
            'labels' => array(
                'name' => __( '投稿' ),
                'menu_name'     => __('新規お知らせ登録'),
                'singular_name' => __( '新規お知らせ登録' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'news'),
            'hierarchical' => false,
            'show_ui'       => true,
            'show_in_menu'  => true,
            'menu_position'       => 5,
            'supports' => array(
                'title',
                'editor',
                // 'excerpt',
                'thumbnail'
                // 'comments'
            ),
        )
    );
}
add_action( 'init', 'create_posttype' );
add_action( 'admin_bar_menu', 'remove_wp_nodes', 999 );
function remove_wp_nodes()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_node( 'archive' );
}

/// Fix 5262017
/// Add function search by year into admin bar
function add_search_year_admin_bar() {
    global $wp_admin_bar;
    if ( !is_super_admin() || !is_admin_bar_showing() ) return;
    // Get current page
    if (isset($_GET['page'])) {
        $current_page = $_GET['page'];
    } elseif (isset($_GET['post_type'])) {
        $current_page = $_GET['post_type'];
    }
    $query = "";
    if (isset($current_page) && ($current_page == 'exhibitor-list-admin' || $current_page == 'amenity-goods' || $current_page == 'news' || $current_page == 'dashboard' ||$current_page=='setup-dealine')) {
    	// Get post status if current_page = news
	    $post_status = $_GET['post_status'];
	    // Get current year
	    $current_year = $_GET['year'];
    	// Display select box 'search by year'
        // Get location
        $location = 1;
        $location_list = array(1, 2, 3, 4);
        if( isset($_SESSION['location']) && in_array($_SESSION['location'], $location_list) ) {
            $location = $_SESSION['location'];
        }
        // Set query to get list year
        switch ($current_page) {
            case 'exhibitor-list-admin':
                $query = "SELECT YEAR(date_dk)
                    FROM register_togashi
                    INNER JOIN register_togashi_link ON register_togashi.id = register_togashi_link.togashi_id
                    WHERE register_togashi_link.catalog_id = ".$location." AND register_togashi_link.status = 1 AND YEAR(date_dk) != ".date(Y)."
                    ORDER BY date_dk DESC";
                $link = admin_url('admin.php?page=exhibitor-list-admin');
                break;
            case 'amenity-goods':
                $query = "SELECT YEAR(date_dk) FROM shop_togashi WHERE YEAR(date_dk) != ".date(Y)." ORDER BY date_dk DESC";
                $link = admin_url('admin.php?page=amenity-goods');
                break;
            case 'news':
                if (isset($post_status)) {
                    $query = "SELECT YEAR(post_date) FROM wp_posts WHERE post_type = 'news' AND post_status = '".$post_status."' AND YEAR(post_date) != ".date(Y)." ORDER BY post_date DESC";
                    $link = admin_url('edit.php?post_status='.$post_status.'&post_type=news');
                } else {
                    $query = "SELECT YEAR(post_date) FROM wp_posts WHERE post_type = 'news' AND YEAR(post_date) != ".date(Y)." ORDER BY post_date DESC";
                    $link = admin_url('edit.php?post_type=news');
                }
                break;
            // Add select year to dealine page by ms.thuyanit 21-07-2017 
            case 'setup-dealine':
                 $query = "SELECT YEAR(date_setting)
                    FROM dealine_app
                    WHERE location= ".$location."
                    AND YEAR(date_setting) != ".date(Y)."
                    ORDER BY date_setting DESC";
                $link = admin_url('admin.php?page=setup-dealine');
                break;
            //End add
            case 'dashboard':
                $query = "SELECT YEAR(date_dk)
                    FROM register_togashi
                    INNER JOIN register_togashi_link ON register_togashi.id = register_togashi_link.togashi_id
                    WHERE register_togashi_link.catalog_id = ".$location." 
                    AND YEAR(date_dk) != ".date(Y)."
                    ORDER BY date_dk DESC";
                $link = admin_url('admin.php?page=dashboard');
                break;
        }
        // Add select box
        $default_Y=date("Y");
        $wp_admin_bar->add_node( array(
            'id' => 'search_year',
            'title' => __( '<select onchange="location = this.value;"><option value='.$link.'&year='.$default_Y.'>'.$default_Y.'</option>'),
        ) );
        // Get list year
        if ($query) {
            global $wpdb;
            $list_year = $wpdb->get_col($query);
            $list_year = array_unique($list_year);
            foreach ($list_year as $k => $val) {
                $select = "";
                // Get value is selected
                if ($current_year == $val) {
                    $select = "selected";
                }
                // Add option with value is year from list_year
                $wp_admin_bar->add_menu( array(
                    'title' => __('<option value='.$link.'&year='.$val.' '.$select.'>'.$val.'</option>'),
                ));
            }
        }
        $wp_admin_bar->add_node( array(
            'title' => __( '</select>'),
        ) );
    }
}
add_action('admin_bar_menu', 'add_search_year_admin_bar', 200);

// Style of select box 'search by year'
function style_search_year_admin_bar() {
    echo '<style type="text/css">
  #wp-admin-bar-search_year select {
        position: relative;
        font-size: 14px;
        border-radius: 3px;
        left: 320px;
        top: 25px;
        height: 33px;
        padding: 0 5px;
        text-align: center;
        text-align-last: center;
  }
    </style>';
}
add_action( 'admin_head', 'style_search_year_admin_bar' );

/********************************************************* *
* ********** CUSTOM DISPLAY POST PANEL - NEWS ************ *
* ******************************************************** */
/*  ** 1.0 - Add location to wp-postmeta ** */
function location_meta_post()
{
    $location = 1;
    $location_list = array(1, 2, 3, 4);
    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $location_list) ) {
        $location = $_SESSION['location'];
    }
    switch ($location) {
      case '1':
        $name_location='九州会場';
      break;
      case '2':
        $name_location='東京会場';
      break;
      case '3':
        $name_location='大阪会場';
      break;
      case '4':
        $name_location='名古屋会場';
      break;
      default:
          $name_location='';
        break;
    }
    add_meta_box( 'news', $name_location, 'location_meta_post_output', 'news' );
}
add_action( 'add_meta_boxes', 'location_meta_post' );

function location_meta_post_output( $post )
{
    $location = 1;
    $location_list = array(1, 2, 3, 4);
    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $location_list) ) {
        $location = $_SESSION['location'];
    }
    $location_tohgashi = get_post_meta( $post->ID, '_location_tohgashi', true );  
    echo ('<input type="hidden" id="location_tohgashi" name="location_tohgashi" value="'.$location.'" readonly/>');
}
function location_meta_post_save( $post_id )
{
    $location_tohgashi = sanitize_text_field( $_POST['location_tohgashi'] );
    update_post_meta( $post_id, '_location_tohgashi', $location_tohgashi );
}
add_action( 'save_post', 'location_meta_post_save' );
/* ** 2.0 - Function custom display  ** */
function custom_show_post_panel( $query ) {
    global $wpdb;
    $location = 1;
    $location_list = array(1, 2, 3, 4);
    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $location_list) ) {
        $location = $_SESSION['location'];
    }
    $query->set( 'meta_key', '_location_tohgashi');
    if(!isset($_GET['year'])){
    	$today = getdate();
    	$query->set( 'year', $today['year'] );
    }
    $meta_query = array(
        array(
            'key' => '_location_tohgashi',
            'value' => $location,
            'type' => 'BIGINT',
            'compare' => '='
        )
    );
    $query->set( 'meta_query', $meta_query );
    return $query;
}
if ( is_admin() ) add_filter('pre_get_posts', 'custom_show_post_panel');
