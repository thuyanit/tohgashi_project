<?php
define( 'THEME_PATH', get_stylesheet_directory() );

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

session_start();
if( $_POST['submit_form'] )
{
    unset( $_POST['submit_form'] );
    $info = serialize($_POST);
    $_SESSION['register_info'] = $info;

    include_once(THEME_PATH.'/template/layout-confirm.php');
    exit;
}
elseif($_POST['sent_info'])
{
    if( isset($_SESSION['register_info']) ) 
    {
        global $wpdb;
        $data = unserialize($_SESSION['register_info']);

        if( is_array($data) )
        {
            unset( $data['submit_form'] );

            /*Insert Bảng Đăng ký*/
            $d=getdate();
            $date_dk=$d['year']."-".$d['mon']."-".$d['mday'];

            $insert_reg = $wpdb->insert( 'register_togashi',
                array(
                    'company_name' => $data['company_name'],
                    'email_dk'=> $data['email'],
                    'date_dk'=>$date_dk,
                ),
                array(
                    '%s',
                    '%s',
                    '%s',
                )
            );

            if( $insert_reg )
            {
                $insert_id = $wpdb->insert_id;
                $data_meta = array();
                $not_meta  = array('company_name', 'email'); /*Các input không lấy đê insert vào bảng đăng ký meta*/
                foreach ($data as $key => $val) 
                {
                    if( !in_array($key, $not_meta) ) {
                        if( is_array($val) ) {$val = serialize($val);}
                        $data_meta[$key] = $val;
                    }
                }

                /*Inset togashi paymen*/
                // $data_paymen = array(
                //     'pay_company_name'=>$data['company_name'],
                //     'pay_position'=>$data['position'],
                //     'pay_zipcode1'=>$data['zipcode1'],
                //     'pay_zipcode2'=>$data['zipcode2'],
                //     'pay_prefectures'=>$data['prefectures'],
                //     'pay_city'=>$data['city'],
                //     'pay_address'=>$data['address'],
                //     'pay_building_name'=>$data['building_name'],
                //     'pay_tel'=>$data['tel'],
                //     'pay_fax'=>$data['fax'],
                //     'register_id'=>$insert_id,
                // );
                // $wpdb->insert( 'exhibitor_payment',
                //     $data_paymen,
                //     array(
                //         '%s',
                //         '%s',
                //         '%s',
                //         '%s',
                //         '%s',
                //         '%s',
                //         '%s',
                //         '%s',
                //         '%s',
                //         '%s',
                //     )
                // );

                /*Xử lý địa điểm*/
                $location = $data['catalogue'];
                foreach ($location as $k_l => $v_l) 
                {
                    // if( is_numeric($k_l) && !empty($v_l['sophong']) ) //Comment because Don't must ne input number of booths
                    // {
                        $check1 = 0; 
                        $check2 = 0;
                        if( isset($v_l['check1']) || isset($v_l['check2']) ) 
                        {
                            if( isset($v_l['check1']) ) { $check1 = $v_l['check1']; }
                            if( isset($v_l['check2']) ) { $check2 = $v_l['check2']; }

                            // $wpdb->insert( 'register_togashi_link',
                            //     array(
                            //         'togashi_id' => $insert_id,
                            //         'catalog_id' => $k_l,
                            //         'number_booth'    => $v_l['sophong'],
                            //         'status'     => 0,
                            //         'check1'     => $check1,
                            //         'check2'     => $check2,
                            //     ),
                            //     array( '%s', '%s', '%s', '%s', '%s' )
                            // );
                        }
                        $wpdb->insert( 'register_togashi_link',
                            array(
                                'togashi_id' => $insert_id,
                                'catalog_id' => $k_l,
                                'number_booth'    => $v_l['sophong'],
                                'status'     => 0,
                                'check1'     => $check1,
                                'check2'     => $check2,
                            ),
                            array( '%s', '%s', '%s', '%s', '%s' )
                        );
                    // }//End check edit 09-08-2017
                }

                /*Insert Đăng ký meta*/
                foreach ($data_meta as $k => $v) 
                {
                    $wpdb->insert( 'register_togashi_meta',
                        array(
                            'togashi_id' => $insert_id,
                            'meta_key'=> $k,
                            'meta_value' => $v,
                        ),
                        array( '%s', '%s', '%s' )
                    );
                }

                /*Xử lý gửi mail*/
                $msg_rig  = ""; $msg_mail = '';

                if( is_array($data) )
                {
                    ob_start();
                    include_once(THEME_PATH.'/template/layout-mail.php');
                    $content = ob_get_contents();
                    ob_clean();
                    ob_end_flush();

                    $mailto = $data['email'];
                    $name   = $data['company_name'];

                    if( $content!="" )
                    {
                        require_once(THEME_PATH.'/libs/class.phpmailer.php');

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
                        $mail->Username    = 'allgrowlabo.wp@gmail.com';  //Mail gửi đi
                        $mail->Password    = 'lugazayihryeroqd';

                        // Mail người gửi
                        $mail->setFrom('allgrowlabo.wp@gmail.com', '賃貸住宅フェア');    /*Email hiển thị người gửi là ai, trường hợp ko dùng tên của gmail server*/

                        // Mail người trả lời về
                        $mail->addReplyTo('allgrowlabo.wp@gmail.com', '賃貸住宅フェア');    /*Mail khi người nhận nhấn trả lời*/

                        // Mail người nhận
                        $mail->AddAddress($mailto, $name);

                        // Tiêu dề
                        $mail->Subject = '賃貸住宅フェア2017　参加お申込み';

                        // Charset
                        $mail->CharSet = 'utf-8';

                        $body = $content;

                        //$mail->Body = $body;
                        $mail->MsgHTML($body); //nội dung dạng html

                        if($mail->Send() == false){
                            $msg_mail_false = 'Send mail failed';
                        } else{
                            $msg_mail_true  = 'Send mail success';
                        }
                    }
                }

                unset($_SESSION['register_info']);
                $msg_rig_true = 'Register success';

                include_once(THEME_PATH.'/template/layout-ok.php');

            } else {
                $msg_rig_false = 'Register Failed';
            }
            /*End if insert*/
        }
        /*End Session*/
    }
    exit;
}


function get_val($name, $data=NULL)
{
    if( isset($_POST[$name]) ) {
        return $_POST[$name];
    }
    if( isset($_SESSION['register_info']) )
    {
        $data = unserialize($_SESSION['register_info']);
        if( isset($data[$name]) ) {
            return $data[$name];
        }
    }
    return FALSE;
}


function get_select($name, $val="", $data=NULL)
{
    if( isset($_POST[$name]) ) {
        if( $_POST[$name]==$val ) {
            return 'selected';
        }
    }

    if( isset($_SESSION['register_info']) )
    {
        $data = unserialize($_SESSION['register_info']);
        if( isset($data[$name]) && $data[$name]==$val) {
            return 'selected';
        }
    }

    return FALSE;
}



// Edit giao diện admin
// function admin_style() {
//   wp_enqueue_style('admin-styles', get_template_directory_uri().'/css/admin.css');
// }
// add_action('admin_enqueue_scripts', 'admin_style'); 
add_action ( 'after_setup_theme' , 'remove_core_updates' ); function remove_core_updates () { if (! current_user_can ( 'update_core' )){ return ;} add_action ( 'init' , create_function ( '$a' , "remove_action( 'Init', 'wp_version_check' );" ), 2 ); add_filter ( 'pre_option_update_core' , '__return_null' ); add_filter ( 'pre_site_transient_update_core' , '__return_null' ); }