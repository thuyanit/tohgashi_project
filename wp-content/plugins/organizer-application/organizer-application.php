<?php
/**
 * Plugin Name:Organizer Application
 * Plugin URI: No site
 * Description: Application for Organizer
   Author: Mr.VietSy Allgrow Labo
   Version: 1.0
   Author URI: http://example.com
 */
defined( 'ORGANIZER_APP' ) OR define( 'ORGANIZER_APP', plugin_dir_path(__FILE__) );
//Create by ms.thuyanit
if( !function_exists('randomPass') ){
    function randomPass($lengthVar=4){
        $pass='';
        $poss='123456789abcdefghikmnpqrstvwxyz@#$!';
        $i=0;
        while($i<$lengthVar){
            $pass.=substr($poss,mt_rand(0,strlen($poss)-1),1);
            $i++;
        }return $pass;
    }
}
function application_org_admin(){
    add_menu_page(
        __( 'Custom Menu Title', 'textdomain' ),
        '申込み状況',
        'manage_options',
        'application-org',
        'fc_application_org_admin',
        '',
        2
    );
}
add_action( 'admin_menu', 'application_org_admin' );
function fc_application_org_admin(){
    global $wpdb;

    $location = 1;
    $location_list = array(1, 2, 3, 4);
    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $location_list) ) {
        $location = $_SESSION['location'];
    }
    
    if( $_GET['action'] && $_GET['id'] ) 
    {
        $id = $_GET['id'];

        if ($_GET['action']==='accept') {
            $status = 1;
            $link_rd = admin_url('admin.php?page=application-org');
        }else{
            $status = 2;
            $link_rd = admin_url('admin.php?page=application-org');
        }

        $update = $wpdb->update( 
            'register_togashi_link', 
            array( 
                'status' => $status,
            ), 
            array( 'id' => $id, 'catalog_id'=>$location ), 
            array( 
                '%s',
            ), 
            array( '%d', '%d' )
        );

        if( $status==1 && $update )
        {
            /*Get thong tin*/
            $info = $wpdb->get_row("SELECT togashi_id FROM register_togashi_link WHERE id = ".$id." AND catalog_id = ".$location);
            if( isset($info->togashi_id) ) {
                $user_info = $wpdb->get_row("SELECT * FROM register_togashi WHERE id = ".$info->togashi_id);

                if( $user_info ) {
                    /*Tao User Thanh Vien*/
                    $user = $user_info->email_dk;
                    $pass = randomPass(10);

                    $user_id = username_exists( $user );
                    if ( !$user_id and email_exists($user) == false )
                    {
                        /*Tạo user*/
                        $user_id = wp_create_user( $user, $pass, $user );
                        $user_ob = get_user_by( 'id', $user_id );
                        $user_ob->add_role( 'administrator' );

                        // update_user_meta($user_ob->ID, 'primary_blog', 2);
                        // update_user_meta($user_ob->ID, 'show_welcome_panel', 2);
                        delete_user_meta($user_ob->ID, 'wp_2_capabilities');
                        delete_user_meta($user_ob->ID, 'wp_2_user_level');
                        
                        add_user_to_blog(3, $user_ob->ID, 'administrator');
                         //Send info account to Exhibitor
                        $mailsend="ms.thuyanit@gmail.com";
                        $namesend="Tohgashi Event Tool";
                        $mailto=$user;
                        $name_company=$user_info->company_name;
                        $subject="賃貸住宅フェア２０１７ 参加お申込み　承認";
                        $info_account= '<p>参加お申込みが承認されました。 <br> 以下の情報で管理画面にログインし、追加情報のご登録をお願い致します</p>'.
                        '<p>ユーザー名:      '.$user.'</p>
                        <p>パスワード:      '.$pass.'</p>
                        <p style="color:red;">※パスワードは変更できません。厳重に保管願います。</p>
                        <p>管理画面: http://zenchin-form.com/exhibitor/admin </p>';
                        $sendaccount=sendaccount($mailsend, $namesend,$mailto, $name_company, $subject, $info_account);
                        if($sendaccount){
                            echo "Send account sucess";
                        }
                        else{
                            echo "Send account failed";
                        }
                        //End sendmail
                    }
                    else {
                        $msg = __('User already exists.  Password inherited.');
                    }
                }
            }
        }

        echo '<script type="text/javascript">
                window.location = "'.$link_rd.'";
            </script>';
    } 
    else 
    {
        //if($location!=4){
            $list_reg = $wpdb->get_results( 
                "SELECT register_togashi.id, register_togashi_link.id as link_id, company_name, email_dk, catalog_id, number_booth, status, check1, check2
                 FROM register_togashi
                 LEFT JOIN register_togashi_link
                 ON register_togashi.id = register_togashi_link.togashi_id
                 WHERE catalog_id = ".$location
            ); 

            if( $list_reg ) 
            {
                foreach ($list_reg as $key => $val) 
                {

                    /*Name check*/
                    $check = array();
                    if( $val->check1>0 )  { $check[] = 'カタログ'; }
                    if( $val->check2>0 )  { $check[] = '同梱'; }
                    $val->check_name = implode(" ・ ", $check);

                    $accept_url = admin_url('admin.php?page=application-org&action=accept&id='.$val->link_id);     
                    $val->accept_url = $accept_url;

                    $deny_url   = admin_url('admin.php?page=application-org&action=deny&id='.$val->link_id);
                    $val->deny_url = $deny_url;
                    
                    $detail_url = admin_url('admin.php?page=application-detail&id='.$val->id);
                    $val->detail_url = $detail_url;

                    $list_reg[$key] = $val;
                }
            }
        //}//end location different from Nagora
        include_once(ORGANIZER_APP.'/template/layout-all.php');
    }	
}


//accept
function application_org_accept(){
    add_submenu_page(
        'application-org',
        '確定済み',
        '確定済み',
        'manage_options',
        'application-accept',
        'fc_application_org_accept' 
    );

}
add_action( 'admin_menu', 'application_org_accept' );
function fc_application_org_accept(){
    global $wpdb;

    $location = 1;
    $location_list = array(1, 2, 3, 4);
    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $location_list) ) {
        $location = $_SESSION['location'];
    }
    //if($location!=4){
        $list_reg = $wpdb->get_results( 
            "SELECT register_togashi.id, register_togashi_link.id as link_id, company_name, email_dk, catalog_id, number_booth, status, check1, check2
             FROM register_togashi
             LEFT JOIN register_togashi_link
             ON register_togashi.id = register_togashi_link.togashi_id
             WHERE catalog_id = ".$location." AND register_togashi_link.status = 1"
        ); 

        if( $list_reg ) 
        {
            foreach ($list_reg as $key => $val) 
            {

                /*Name check*/
                $check = array();
                if( $val->check1>0 )  { $check[] = 'カタログ'; }
                if( $val->check2>0 )  { $check[] = '同梱'; }
                $val->check_name = implode(" ・ ", $check);
                
                $detail_url = admin_url('admin.php?page=application-detail&id='.$val->id);
                $val->detail_url = $detail_url;

                $list_reg[$key] = $val;
            }
        }

    //}// End location diferent from Nagora   
    
    include_once(ORGANIZER_APP.'/template/layout-accept.php');

}


//pending
function application_org_pending(){
    add_submenu_page(
        'application-org',
        '確定待ち',
        '確定待ち',
        'manage_options',
        'application-pending',
        'fc_application_org_pending'
    );

}
add_action( 'admin_menu', 'application_org_pending' );
function fc_application_org_pending(){
    global $wpdb;
    $location = 1;
    $location_list = array(1, 2, 3, 4);
    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $location_list) ) {
        $location = $_SESSION['location'];
    }
    //if($location !=4){
         $list_reg = $wpdb->get_results( 
            "SELECT register_togashi.id, register_togashi_link.id as link_id, company_name, email_dk, catalog_id, number_booth, status, check1, check2
             FROM register_togashi
             LEFT JOIN register_togashi_link
             ON register_togashi.id = register_togashi_link.togashi_id
             WHERE catalog_id = ".$location." AND register_togashi_link.status = 0"
        ); 

        if( $list_reg ) 
        {
            foreach ($list_reg as $key => $val) 
            {

                /*Name check*/
                $check = array();
                if( $val->check1>0 )  { $check[] = 'カタログ'; }
                if( $val->check2>0 )  { $check[] = '同梱'; }
                $val->check_name = implode(" ・ ", $check);

                $accept_url = admin_url('admin.php?page=application-pending&action=accept&id='.$val->link_id);     
                $val->accept_url = $accept_url;

                $deny_url   = admin_url('admin.php?page=application-pending&action=deny&id='.$val->link_id);
                $val->deny_url = $deny_url;
                
                $detail_url = admin_url('admin.php?page=application-detail&id='.$val->id);
                $val->detail_url = $detail_url;

                $list_reg[$key] = $val;
            }
        }
   // }// End location diferent from Nagora 
    if( $_GET['action'] && $_GET['id'] ) 
    {
        $id = $_GET['id'];

        if ($_GET['action']==='accept') {
            $status = 1;
            $link_rd = admin_url('admin.php?page=application-pending');
        }else{
            $status = 2;
            $link_rd = admin_url('admin.php?page=application-pending');
        }

        $update = $wpdb->update( 
            'register_togashi_link', 
            array( 
                'status' => $status,
            ), 
            array( 'id' => $id, 'catalog_id'=>$location ),
            array( 
                '%s',
            ), 
            array( '%d', '%d' )
        );

        if( $status==1 && $update )
        {
            /*Get thong tin*/
            $info = $wpdb->get_row("SELECT togashi_id FROM register_togashi_link WHERE id = ".$id." AND catalog_id = ".$location);
            if( isset($info->togashi_id) ) {
                $user_info = $wpdb->get_row("SELECT * FROM register_togashi WHERE id = ".$info->togashi_id);

                if( $user_info ) {
                    /*Tao User Thanh Vien*/
                    $user = $user_info->email_dk;
                    $pass = randomPass(10);

                    $user_id = username_exists( $user );
                    if ( !$user_id and email_exists($user) == false )
                    {
                        /*Tạo user*/
                        $user_id = wp_create_user( $user, $pass, $user );
                        $user_ob = get_user_by( 'id', $user_id );
                        $user_ob->add_role( 'administrator' );

                        // update_user_meta($user_ob->ID, 'primary_blog', 2);
                        // update_user_meta($user_ob->ID, 'show_welcome_panel', 2);
                        delete_user_meta($user_ob->ID, 'wp_2_capabilities');
                        delete_user_meta($user_ob->ID, 'wp_2_user_level');
                        
                        add_user_to_blog(3, $user_ob->ID, 'administrator');
                         //Send info account to Exhibitor
                        $mailsend="ms.thuyanit@gmail.com";
                        $namesend="Tohgashi Event Tool";
                        $mailto=$user;
                        $name_company=$user_info->company_name;
                        $subject="賃貸住宅フェア２０１７ 参加お申込み　承認";
                        $info_account= '<p>参加お申込みが承認されました。 <br> 以下の情報で管理画面にログインし、追加情報のご登録をお願い致します</p>'.
                        '<p>ユーザー名:      '.$user.'</p>
                        <p>パスワード:      '.$pass.'</p>
                        <p style="color:red;">※パスワードは変更できません。厳重に保管願います。</p>
                        <p>管理画面: http://zenchin-form.com/exhibitor/admin </p>';
                        $sendaccount=sendaccount($mailsend, $namesend,$mailto, $name_company, $subject, $info_account);
                        if($sendaccount){
                            echo "Send account sucess";
                        }
                        else{
                            echo "Send account failed";
                        }
                        //End sendmail

                    }
                    else {
                        $msg = __('User already exists.  Password inherited.');
                    }
                }
            }
        }

        echo '<script type="text/javascript">
                window.location = "'.$link_rd.'";
            </script>';
    } 
    else {
        include_once(ORGANIZER_APP.'/template/layout-pending.php');
    }
}


//refuse
function application_org_refuse(){
    add_submenu_page(
        'application-org',
        '否認済み',
        '否認済み',
        'manage_options',
        'application-refuse',
        'fc_application_org_refuse'
    );

}
add_action( 'admin_menu', 'application_org_refuse' );
function fc_application_org_refuse(){
    global $wpdb;

    $location = 1;
    $location_list = array(1, 2, 3, 4);
    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $location_list) ) {
        $location = $_SESSION['location'];
    }
    //if($location!=4){
         $list_reg = $wpdb->get_results( 
            "SELECT register_togashi.id, register_togashi_link.id as link_id, company_name, email_dk, catalog_id, number_booth, status, check1, check2
             FROM register_togashi
             LEFT JOIN register_togashi_link
             ON register_togashi.id = register_togashi_link.togashi_id
             WHERE catalog_id = ".$location." AND register_togashi_link.status = 2"
        ); 

        if( $list_reg ) 
        {
            foreach ($list_reg as $key => $val) 
            {

                /*Name check*/
                $check = array();
                if( $val->check1>0 )  { $check[] = 'カタログ'; }
                if( $val->check2>0 )  { $check[] = '同梱'; }
                $val->check_name = implode(" ・ ", $check);
                
                $detail_url = admin_url('admin.php?page=application-detail&id='.$val->id);
                $val->detail_url = $detail_url;

                $list_reg[$key] = $val;
            }
        }
    //}  // End location diferent from Nagora 
    include_once(ORGANIZER_APP.'/template/layout-refuse.php');
}


//detail
function application_org_detail(){
    add_submenu_page(
        NULL,
        'Detail',
        'Detail',
        'manage_options',
        'application-detail',
        'fc_application_org_detail' 
    );

}
add_action( 'admin_menu', 'application_org_detail' );

function fc_application_org_detail(){
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
            $billing_data = $wpdb->get_results( "SELECT * FROM exhibitor_payment WHERE register_id = '".$detail->id."' AND location='".$location."'");
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

            $accept_url = admin_url('admin.php?page=application-org&action=accept&id='.$detail->link_id);     
            $detail->accept_url = $accept_url;

            $deny_url   = admin_url('admin.php?page=application-org&action=deny&id='.$detail->link_id);
            $detail->deny_url = $deny_url;

            include_once(ORGANIZER_APP.'/template/layout-detail.php');
        }
        else {
            echo 'This user do not register at this location';
        }        
    }
}

function dropdown_page()
{
    $page = array(
        'application-org' => '申込み状況',
        'application-accept' => '確定済み',
        'application-pending' => '確定待ち',
        'application-refuse' => '否認済み',
    );
?>
<div class="dropdown">
    <button onclick="myFunction()" class="dropbtn"><?php echo isset($_GET['page']) ? $page[$_GET['page']] : "" ?></button>
    <div id="myDropdown" class="dropdown-content">
        <a href="<?php echo admin_url('admin.php?page=application-org') ?>">申込み状況</a>
        <a href="<?php echo admin_url('admin.php?page=application-accept') ?>">確定済み</a>
        <a href="<?php echo admin_url('admin.php?page=application-pending') ?>">確定待ち</a>
        <a href="<?php echo admin_url('admin.php?page=application-refuse') ?>">否認済み</a>
    </div>
</div>
<script>
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<?php   
}

if (! function_exists('detail_get_val')) {
    function detail_get_val($name, $data=NULL)
    {
        if( isset($data[$name]) ) {
            return $data[$name];
        }
        return FALSE;
    }
}

if (!function_exists('detail_get_select')) {
    function detail_get_select($name, $val="", $data=NULL)
    {
        if( isset($data[$name]) && $data[$name]==$val) {
            return 'selected';
        }
        return FALSE;
    }
}

/*============================================================================================================
============================================ Organizer List Dowwn ============================================
=============================================================================================================*/

function download_exhibitor_org_admin(){
    add_menu_page(
        __( 'Custom Menu Title', 'textdomain' ),
        '確定出展社一覧',
        'manage_options',
        'exhibitor-list',
        'fc_download_exhibitor_org_admin',
        // plugins_url( 'organizer-application/images/icon-down.png' ),
        '',
        2
    );
}
add_action( 'admin_menu', 'download_exhibitor_org_admin' );

function fc_download_exhibitor_org_admin(){
    global $wpdb;

    $location = 1;
    $location_list = array(1, 2, 3, 4);
    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $location_list) ) {
        $location = $_SESSION['location'];
    }

    $big = 999999999; // need an unlikely integer

    $count_tmp = $wpdb->get_results( 
        "SELECT COUNT(*) as allItem
         FROM register_togashi
         LEFT JOIN register_togashi_link
         ON register_togashi.id = register_togashi_link.togashi_id
         WHERE catalog_id = ".$location." AND register_togashi_link.status = 1"
    ); 

    $count_all = 0;
    if( isset($count_tmp[0]->allItem) ) {
        $count_all = $count_tmp[0]->allItem;
    }

    $item    = 15;
    $current = max( 1, (int) $_GET['paged']);
    $start   = (int) ($current - 1) * $item;
    $total   = (int) ($count_all / $item) + 1;

    $paginate_links = "";
    $paginate_links = paginate_links( 
        array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => $current,
            'total' => $total,
            'prev_text' => ' < ',
            'next_text' => ' > ',
        ) 
    );

    $list_reg = $wpdb->get_results( 
        "SELECT register_togashi.id, register_togashi_link.id as link_id, company_name, email_dk, catalog_id, number_booth, status, check1, check2
         FROM register_togashi
         LEFT JOIN register_togashi_link
         ON register_togashi.id = register_togashi_link.togashi_id
         WHERE catalog_id = ".$location." AND register_togashi_link.status = 1
         LIMIT ".$item." OFFSET ".$start
    ); 

    if( $list_reg ) 
    {
        foreach ($list_reg as $key => $val) 
        {

            /*Name check*/
            $check = array();
            if( $val->check1>0 )  { $check[] = 'カタログ'; }
            if( $val->check2>0 )  { $check[] = '同梱'; }
            $val->check_name = implode(" ・ ", $check);
            
            $detail_url = admin_url('admin.php?page=application-detail&id='.$val->id);
            $val->detail_url = $detail_url;

            $list_reg[$key] = $val;
        }
    }
    //Download button 
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
     $download_excel = $wpdb->get_results( 
        "SELECT register_togashi.id, register_togashi_link.id as company_id, company_name, number_booth, date_dk, email_dk,check1, check2
        FROM register_togashi
        LEFT JOIN register_togashi_link
        ON register_togashi.id = register_togashi_link.togashi_id
        WHERE catalog_id = ".$location." AND register_togashi_link.status = 1"
    );
    if( $download_excel )
    {
        foreach ($download_excel as $key => $val){
            //Meta
            $download_meta = $wpdb->get_results( "SELECT * FROM register_togashi_meta");
            if($download_meta){
                foreach ($download_meta as $k => $v) {
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
        }
    }
    
    //End download button 
    include_once(ORGANIZER_APP.'/template/layout-exhibitor-list.php');
}

/*============================================================================================================
============================================ Organizer List Speakers =========================================
=============================================================================================================*/
// Begin Comment By ms.thuyanit. Don't remove this code. Because . It will use after
/*function list_speak_org_admin(){
    add_menu_page(
        __( 'Custom Menu Title', 'textdomain' ),
        '講演者一覧',
        'manage_options',
        'list-speak',
        'fc_list_speak_org_admin',
        // plugins_url( 'organizer-application/images/icon-speak.png' ),
        '',
        2
    );
}
add_action( 'admin_menu', 'list_speak_org_admin' );

function fc_list_speak_org_admin(){
    include_once(ORGANIZER_APP.'/template/layout-list-speak.php');
}

//Danh Sach Cho Duyet
function list_speak_pending(){
    add_submenu_page(
        'list-speak',
        '確認待ち',
        '確認待ち',
        'manage_options',
        'list-speak-pending',
        'fc_list_speak_pending' 
    );
}
add_action( 'admin_menu', 'list_speak_pending' );

function fc_list_speak_pending(){
    include_once(ORGANIZER_APP.'/template/layout-list-speak-pending.php');
}

//Dang Ky
function list_speak_register(){
    add_submenu_page(
        'list-speak',
        '講演者登録',
        '講演者登録',
        'manage_options',
        'list-speak-register',
        'fc_list_speak_register' 
    );
}
add_action( 'admin_menu', 'list_speak_register' );

function fc_list_speak_register(){
    include_once(ORGANIZER_APP.'/template/layout-list-speak-register.php');
}

//Biễu diễn và thời gian biểu diễn
function list_speak_performances_date(){
    add_submenu_page(
        'list-speak',
        '講演日時',
        '講演日時',
        'manage_options',
        'list-speak-performances',
        'fc_list_speak_performances_date' 
    );
}
add_action( 'admin_menu', 'list_speak_performances_date' );

function fc_list_speak_performances_date(){
    include_once(ORGANIZER_APP.'/template/layout-list-speak-performances.php');
}
/*
// End comment code by ms.thuyanit. Don't Remove this code 

/*============================================================================================================
============================================ Hide Sub Menu First Item ========================================
=============================================================================================================*/

function hide_sub_first_item() {
    echo '<style type="text/CSS">
           #adminmenu>li>ul.wp-submenu-wrap>li.wp-first-item{display: none;}
         </style>';
}
add_action('admin_menu', 'hide_sub_first_item');
function sendaccount($mailsend, $namesend,$mailto, $name, $title, $content)
{
    include_once(ORGANIZER_APP.'libs/class.phpmailer.php');
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug  = 0;
    $mail->Debugoutput = 'html';
    $mail->SMTPAuth    = true;
    $mail->SMTPSecure  = 'ssl';
    $mail->Host        = 'smtp.gmail.com';
    $mail->Port        = 465;
    $mail->Username    = 'allgrowlabo.wp@gmail.com';
    $mail->Password    = 'lugazayihryeroqd';
    $mail->setFrom('allgrowlabo.wp@gmail.com', '賃貸住宅フェア');
    $mail->addReplyTo($mailsend, $namesend); 
    $mail->AddAddress($mailto, $name);
    $mail->Subject = $title;
    $mail->CharSet = 'utf-8';
    $body = $content;
    $mail->MsgHTML($body);

    if($mail->Send() == false){
        return FALSE;
    } else{
        return TRUE;
    }
} 