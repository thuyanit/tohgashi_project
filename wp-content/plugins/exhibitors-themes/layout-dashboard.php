<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('exhibitors-themes/css/style.css'); ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<div id="dashboard">
    <div class="colleft news">
        <h1>お知らせ</h1>
	    <?php 
	    global $wpdb;
	    $location = 1;
	    $location_list = array(1, 2, 3, 4);
	    if( isset($_SESSION['location']) && in_array($_SESSION['location'], $location_list) ) {
	        $location = $_SESSION['location'];
	    }
	    $select = "SELECT ID, post_date, post_content, post_title,post_type FROM wp_posts WHERE post_type = 'news' and post_status='publish'";
	    $query_post = $wpdb->get_results($select);
	    foreach ($query_post as $key=>$val) {
	        $meta_post = $wpdb->get_results( "SELECT * FROM wp_postmeta");
	            if($meta_post){
	                foreach ($meta_post as $k => $v) {
	                    if( $v->post_id== $val->ID){
	                        $key_tmp = $v->meta_key;
	                        $val_tmp = $v->meta_value;
	                        if( !isset($val->$key_tmp) ) {
	                            $val->$key_tmp = $val_tmp;
	                        }
	                    }
	                }
	        }
	    }
	    foreach($query_post as $key=>$data){
	       if($data->_location_tohgashi==$location){
	            echo "<p><span class='date_post'>".date('n/d',strtotime($data->post_date))."</span><span class='title'><a href='".admin_url('admin.php?page=view-post&id='.$data->ID)."'>".$data->post_title."</a></span></p>";
	       }
	    }
		?>
	    <div class="group_download">
	        <a href="<?php echo admin_url('admin.php?page=exhibitor-manual') ?>">出展社マニュアル</a>
	        <a href="<?php echo admin_url('admin.php?page=vehice-certification') ?>">搬入出車両証</a>
	    </div>
    </div><!-- End news  -->	
    <div class="colright control_btn">
        <?php
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
        if( isset($_SESSION['location']) && in_array($_SESSION['location'], $location_list) ) {
            $location = $_SESSION['location'];
        }
        $year=date('Y');
	    $date = $wpdb->get_row("SELECT * FROM dealine_app WHERE location = '".$location."' AND date_setting LIKE '".$year."%'");
	    if($date){
		    $nows = date('Y-m-d');
		    $now_date = strtotime($nows);

		    $date1 = strtotime($date->dealine_billing);
		    $datediff = ($date1-$now_date);
		    $numberDay1= floor($datediff / (60*60*24));

			$date2 = strtotime($date->dealine_foundation);
			$dateDiff2 = ($date2-$now_date);
			$numberDay2 = floor($dateDiff2 / (60*60*24));

			$date3 = strtotime($date->dealine_goods);
			$dateDiff3 = ($date3-$now_date);
			$numberDay3 = floor($dateDiff3 / (60*60*24));

			$date4 = strtotime($date->dealine_construction);
			$dateDiff4 = ($date4-$now_date);
			$numberDay4 = floor($dateDiff4 / (60*60*24));

			$date5 = strtotime($date->dealine_danger);
			$dateDiff5 = ($date5-$now_date);
			$numberDay5 = (float)floor($dateDiff5 / (60*60*24));

			$date6 = strtotime($date->dealine_drainage);
			$dateDiff6 = ($date6-$now_date);
			$numberDay6 = floor($dateDiff6 / (60*60*24));

			$date7 = strtotime($date->dealine_gar_air);
			$dateDiff7 = ($date7-$now_date);
			$numberDay7 = floor($dateDiff7 / (60*60*24));

			$date8 = strtotime($date->dealine_ceiling);
			$dateDiff8 = ($date8-$now_date);
			$numberDay8 = floor($dateDiff8 / (60*60*24));

			$date9 = strtotime($date->dealine_anchor);
			$dateDiff9 = ($date9-$now_date);
			$numberDay9 = floor($dateDiff9 / (60*60*24));

			$date10 = strtotime($date->dealine_foods);
			$dateDiff10 = ($date10-$now_date);
			$numberDay10 = floor($dateDiff10 / (60*60*24));

			//CHECK DATA HAVE REGISTERED?
			$ck_payment=$wpdb->get_row("SELECT register_id FROM exhibitor_payment WHERE register_id='".$get_user_nw->id."'");
			$ck_foundation=$wpdb->get_row("SELECT togashi_id FROM exhibitor_foundation WHERE location='".$location."' and togashi_id='".$get_user_nw->id."'");
			$ck_construction=$wpdb->get_row("SELECT togashi_id FROM exhibitor_construction WHERE location='".$location."' and togashi_id='".$get_user_nw->id."'");
			$ck_order=$wpdb->get_row("SELECT customer_id FROM orders WHERE catalog_id='".$location."' and customer_id='".$get_user_nw->id."'");

			$ck_dangrous=$wpdb->get_row("SELECT togashi_id FROM cache_dangrous WHERE location='".$location."' and togashi_id='".$get_user_nw->id."'");
			$ck_drainage=$wpdb->get_row("SELECT togashi_id FROM cache_drainage WHERE location='".$location."' and togashi_id='".$get_user_nw->id."'");
			$ck_gar_air=$wpdb->get_row("SELECT togashi_id FROM cache_gar_air WHERE location='".$location."' and togashi_id='".$get_user_nw->id."'");
			$ck_ceiling=$wpdb->get_row("SELECT togashi_id FROM cache_ceiling WHERE location='".$location."' and togashi_id='".$get_user_nw->id."'");
			$ck_anchor=$wpdb->get_row("SELECT togashi_id FROM cache_anchor WHERE location='".$location."' and togashi_id='".$get_user_nw->id."'");
			$ck_foods=$wpdb->get_row("SELECT togashi_id FROM cache_foods WHERE location='".$location."' and togashi_id='".$get_user_nw->id."'");
		    ?>
			<!-- Button 1 Fee Billing address -->
			<p>
			    <span class="btn"><a href="<?php echo admin_url('admin.php?page=fee-billing-address') ?>" class="register_billing_address"><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/1_syuttenryo.png'); ?>" alt="" width="32" height="32"/>出展料ご請求先</a></span>
			    <?php 
			    if(empty($ck_payment)){
			        if($date1){
			        	if($date1>strtotime($nows)){?>
					       <span class="notice_dealine">期限まであと<span class="date"><?php echo $numberDay1; ?>日</span>です</span>
			        	<?php }
			        	elseif(strtotime($nows)==$date1){
			        	?>
							<span class="notice_dealine">期限は<span class="date">今日</span>までです。</span>
			        	<?php
			        	}
			            else{?>
					        <span class="notice_dealine">期限が切れる</span>
			            <?php }
			        }
			    }//End empty billing address
			    else{?>
			        <span class="notice_dealine">登録済み</span>
			    <?php }//End have registered ?>
			</p>

			<!-- Button 2: Foundation -->
			<p>
			    <span class="btn"><a href="<?php echo admin_url('admin.php?page=foundation') ?>" class="setting"><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/2_kouji.png'); ?>" alt="" width="32" height="32"/>出展基礎・工事申込み</a></span>
			    <?php 
			    if(empty($ck_foundation)){
			        if($date2){
			        	if($date2>strtotime($nows)){?>
					       <span class="notice_dealine">期限まであと<span class="date"><?php echo $numberDay2; ?>日</span>です</span>
			        	<?php }
			        	elseif(strtotime($nows)==$date2){
			        	?>
							<span class="notice_dealine">期限は<span class="date">今日</span>までです。</span>
			        	<?php
			        	}
			            else{?>
					        <span class="notice_dealine">期限が切れる</span>
			            <?php }
			        }
			    }//End empty foundation
			    else{?>
			        <span class="notice_dealine">登録済み</span>
			    <?php }//End have registered ?>
			</p>

			<!-- Button 3: Rental goods  -->
			<p>
			    <span class="btn"><a href="<?php echo admin_url('admin.php?page=rental-goods') ?>" class="rental_goods"><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/3_rental.png'); ?>" alt="" width="32" height="32"/>レンタル備品申込み</a></span>
			    <?php 
			    if(empty($ck_order)){
			        if($date3){
			        	if($date3>strtotime($nows)){?>
					       <span class="notice_dealine">期限まであと<span class="date"><?php echo $numberDay3; ?>日</span>です</span>
			        	<?php }
			        	elseif(strtotime($nows)==$date3){
			        	?>
							<span class="notice_dealine">期限は<span class="date">今日</span>までです。</span>
			        	<?php
			        	}
			            else{?>
					        <span class="notice_dealine">期限が切れる</span>
			            <?php }
			        }
			    }//End empty rental goods
			    else{?>
			        <span class="notice_dealine">登録済み</span>
			    <?php }//End have registered ?>
			</p>

			<!-- Button 4: Construction -->
			<p>
			    <span class="btn"><a href="<?php echo admin_url('admin.php?page=construction') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/4_denki.png'); ?>" alt="" width="32" height="32"/>電気工事申込</a></span>
			    <?php 
			    if(empty($ck_construction)){
			        if($date4){
			        	if($date4>strtotime($nows)){?>
					       <span class="notice_dealine">期限まであと<span class="date"><?php echo $numberDay4; ?>日</span>です</span>
			        	<?php }
			        	elseif(strtotime($nows)==$date4){
			        	?>
							<span class="notice_dealine">期限は<span class="date">今日</span>までです。</span>
			        	<?php
			        	}
			            else{?>
					        <span class="notice_dealine">期限が切れる</span>
			            <?php }
			        }
			    }//End empty construction
			    else{?>
			        <span class="notice_dealine">登録済み</span>
			    <?php }//End have registered ?>
			</p>
			<!-- Add at 05 - 06 - 2017 by ms.thuyanit -->
	        <!-- Button 5: Dangerous -->
			<p>
			    <?php 
			    if(empty($ck_dangrous)){
			        if($date5){
			        	if($date5>strtotime($nows)){?>
			        	   <span class="btn"><a href="<?php echo admin_url('admin.php?page=danger') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/5_kiken.png'); ?>" alt="" width="32" height="32"/>危険物持込・裸火使用許可</a></span>
					       <span class="notice_dealine">期限まであと<span class="date"><?php echo $numberDay5; ?>日</span>です</span>
			        	<?php }
			        	elseif(strtotime($nows)==$date5){
			        	?>
			        		<span class="btn"><a href="<?php echo admin_url('admin.php?page=danger') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/5_kiken.png'); ?>" alt="" width="32" height="32"/>危険物持込・裸火使用許可</a></span>
							<span class="notice_dealine">期限は<span class="date">今日</span>までです。</span>
			        	<?php
			        	}
			            else{?>
			            	<span class="btn"><a class="expries" data-notice="危険物持込・裸火使用許可" ><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/5_kiken.png'); ?>" alt="" width="32" height="32"/>危険物持込・裸火使用許可</a></span>
					        <span class="notice_dealine">期限が切れる</span>
			            <?php }
			        }
			    }//End empty drangrous
			    else{?>
			    	<span class="btn"><a href="<?php echo admin_url('admin.php?page=danger') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/5_kiken.png'); ?>" alt="" width="32" height="32"/>危険物持込・裸火使用許可</a></span>
			        <span class="notice_dealine">登録済み</span>
			    <?php }//End have registered ?>
			</p>
			<!-- Button 6: Drainage -->
			<p>
			    <?php 
			    if(empty($ck_drainage)){
			        if($date6){
			        	if($date6>strtotime($nows)){?>
			        	    <span class="btn"><a href="<?php echo admin_url('admin.php?page=drainage') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/6_kyusui.png'); ?>" alt="" width="32" height="32"/>給排水工事許可申請</a></span>
					        <span class="notice_dealine">期限まであと<span class="date"><?php echo $numberDay6; ?>日</span>です</span>
			        	<?php }
			        	elseif(strtotime($nows)==$date6){
			        	?>
			        		<span class="btn"><a href="<?php echo admin_url('admin.php?page=drainage') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/6_kyusui.png'); ?>" alt="" width="32" height="32"/>給排水工事許可申請</a></span>
							<span class="notice_dealine">期限は<span class="date">今日</span>までです。</span>
			        	<?php
			        	}
			            else{?>
			            	<span class="btn"><a class="expries" data-notice="給排水工事許可申請" ><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/6_kyusui.png'); ?>" alt="" width="32" height="32"/>給排水工事許可申請</a></span>
					        <span class="notice_dealine">期限が切れる</span>
			            <?php }
			        }
			    }//End empty drainage
			    else{?>
			    	<span class="btn"><a href="<?php echo admin_url('admin.php?page=drainage') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/6_kyusui.png'); ?>" alt="" width="32" height="32"/>給排水工事許可申請</a></span>
			        <span class="notice_dealine">登録済み</span>
			    <?php }//End have registered ?>
			</p>
			<!-- Button 7: Gar/ Air -->
			<p>
			    <?php 
			    if(empty($ck_gar_air)){
			        if($date7){
			        	if($date7>strtotime($nows)){?>
			        		<span class="btn"><a href="<?php echo admin_url('admin.php?page=gas_air') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/7_gas.png'); ?>" alt="" width="32" height="32"/>ガス･エアー工事許可申請</a></span>
					       <span class="notice_dealine">期限まであと<span class="date"><?php echo $numberDay7; ?>日</span>です</span>
			        	<?php }
			        	elseif(strtotime($nows)==$date7){
			        	?>
			        		<span class="btn"><a href="<?php echo admin_url('admin.php?page=gas_air') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/7_gas.png'); ?>" alt="" width="32" height="32"/>ガス･エアー工事許可申請</a></span>
							<span class="notice_dealine">期限は<span class="date">今日</span>までです。</span>
			        	<?php
			        	}
			            else{?>
			            	<span class="btn"><a class="expries" data-notice="ガス･エアー工事許可申請" ><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/7_gas.png'); ?>" alt="" width="32" height="32"/>ガス･エアー工事許可申請</a></span>
					        <span class="notice_dealine">期限が切れる</span>
			            <?php }
			        }
			    }//End empty gar- air
			    else{?>
			    	<span class="btn"><a href="<?php echo admin_url('admin.php?page=gas_air') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/7_gas.png'); ?>" alt="" width="32" height="32"/>ガス･エアー工事許可申請</a></span>
			        <span class="notice_dealine">登録済み</span>
			    <?php }//End have registered ?>
			</p>
			<!-- Button 8 : Ceiling -->
			<p>
			    <?php 
			    if(empty($ck_ceiling)){
			        if($date8){
			        	if($date8>strtotime($nows)){?>
			        	   <span class="btn"><a href="<?php echo admin_url('admin.php?page=ceiling') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/8-tenjo.png'); ?>" alt="" width="32" height="32"/>天井構造・バルーン届出</a></span>
					       <span class="notice_dealine">期限まであと<span class="date"><?php echo $numberDay8; ?>日</span>です</span>
			        	<?php }
			        	elseif(strtotime($nows)==$date8){
			        	?>
			        		 <span class="btn"><a href="<?php echo admin_url('admin.php?page=ceiling') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/8-tenjo.png'); ?>" alt="" width="32" height="32"/>天井構造・バルーン届出</a></span>
							<span class="notice_dealine">期限は<span class="date">今日</span>までです。</span>
			        	<?php
			        	}
			            else{?>
			            	 <span class="btn"><a class="expries" data-notice="天井構造・バルーン届出" ><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/8-tenjo.png'); ?>" alt="" width="32" height="32"/>天井構造・バルーン届出</a></span>
					        <span class="notice_dealine">期限が切れる</span>
			            <?php }
			        }
			    }//End empty Ceiling
			    else{?>
			    	<span class="btn"><a href="<?php echo admin_url('admin.php?page=ceiling') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/8-tenjo.png'); ?>" alt="" width="32" height="32"/>天井構造・バルーン届出</a></span>
			        <span class="notice_dealine">登録済み</span>
			    <?php }//End have registered ?>
			</p>
			<!-- Button 9 : Anchor -->
			<p>
			    <?php 
			    if(empty($ck_anchor)){
			        if($date9){
			        	if($date9>strtotime($nows)){?>
			        	   <span class="btn"><a href="<?php echo admin_url('admin.php?page=anchor') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/9_anchor.png'); ?>" alt="" width="32" height="32"/>アンカー打設作業承認申請</a></span>
					       <span class="notice_dealine">期限まであと<span class="date"><?php echo $numberDay9; ?>日</span>です</span>
			        	<?php }
			        	elseif(strtotime($nows)==$date9){
			        	?>
			        		<span class="btn"><a href="<?php echo admin_url('admin.php?page=anchor') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/9_anchor.png'); ?>" alt="" width="32" height="32"/>アンカー打設作業承認申請</a></span>
							<span class="notice_dealine">期限は<span class="date">今日</span>までです。</span>
			        	<?php
			        	}
			            else{?>
			            	<span class="btn"><a class="expries" data-notice="アンカー打設作業承認申請" ><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/9_anchor.png'); ?>" alt="" width="32" height="32"/>アンカー打設作業承認申請</a></span>
					        <span class="notice_dealine">期限が切れる</span>
			            <?php }
			        }
			    }//End empty anchor
			    else{?>
			    	<span class="btn"><a href="<?php echo admin_url('admin.php?page=anchor') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/9_anchor.png'); ?>" alt="" width="32" height="32"/>アンカー打設作業承認申請</a></span>
			        <span class="notice_dealine">登録済み</span>
			    <?php }//End have registered ?>
			</p>
			<!-- Button 10 : Foods -->
			<p>
			    <?php 
			    if(empty($ck_foods)){
			        if($date10){
			        	if($date10>strtotime($nows)){?>
			        		 <span class="btn"><a href="<?php echo admin_url('admin.php?page=food') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/10_inshokuken.png'); ?>" alt="" width="32" height="32"/>飲食券申込書</a></span>
					       <span class="notice_dealine">期限まであと<span class="date"><?php echo $numberDay10; ?>日</span>です</span>
			        	<?php }
			        	elseif(strtotime($nows)==$date10){
			        	?>
			        		 <span class="btn"><a href="<?php echo admin_url('admin.php?page=food') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/10_inshokuken.png'); ?>" alt="" width="32" height="32"/>飲食券申込書</a></span>
							<span class="notice_dealine">期限は<span class="date">今日</span>までです。</span>
			        	<?php
			        	}
			            else{?>
			            	 <span class="btn"><a class="expries" data-notice="飲食券申込書" ><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/10_inshokuken.png'); ?>" alt="" width="32" height="32"/>飲食券申込書</a></span>
					        <span class="notice_dealine">期限が切れる</span>
			            <?php }
			        }
			    }//End empty fooods
			    else{?>
			    	<span class="btn"><a href="<?php echo admin_url('admin.php?page=food') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/10_inshokuken.png'); ?>" alt="" width="32" height="32"/>飲食券申込書</a></span>
			        <span class="notice_dealine">登録済み</span>
			    <?php }//End have registered ?>
			</p>
		<?php
		}//End if isset date
		else{?>
			<p>
				<span class="btn"><a href="<?php echo admin_url('admin.php?page=fee-billing-address') ?>" class="register_billing_address"><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/1_syuttenryo.png'); ?>" alt="" width="32" height="32"/>出展料ご請求先</a></span>
			</p>
			<p>
				<span class="btn"><a href="<?php echo admin_url('admin.php?page=foundation') ?>" class="setting"><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/2_kouji.png'); ?>" alt="" width="32" height="32"/>出展基礎・工事申込み</a></span>
			</p>
			<p>
				<span class="btn"><a href="<?php echo admin_url('admin.php?page=rental-goods') ?>" class="rental_goods"><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/3_rental.png'); ?>" alt="" width="32" height="32"/>レンタル備品申込み</a></span>
			</p> 
			<p>
				<span class="btn"><a href="<?php echo admin_url('admin.php?page=construction') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/4_denki.png'); ?>" alt="" width="32" height="32"/>電気工事申込</a></span>
			</p>

			<p>
				<span class="btn"><a href="<?php echo admin_url('admin.php?page=danger') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/5_kiken.png'); ?>" alt="" width="32" height="32"/>危険物持込・裸火使用許可</a></span>
			</p>
			<p>
				<span class="btn"><a href="<?php echo admin_url('admin.php?page=drainage') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/6_kyusui.png'); ?>" alt="" width="32" height="32"/>給排水工事許可申請</a></span>
			</p>
			<p>
				<span class="btn"><a href="<?php echo admin_url('admin.php?page=gas_air') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/7_gas.png'); ?>" alt="" width="32" height="32"/>ガス･エアー工事許可申請</a></span>
			</p>
			<p>
				<span class="btn"><a href="<?php echo admin_url('admin.php?page=ceiling') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/8-tenjo.png'); ?>" alt="" width="32" height="32"/>天井構造・バルーン届出</a></span>
			</p>
			<p>
				<span class="btn"><a href="<?php echo admin_url('admin.php?page=anchor') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/9_anchor.png'); ?>" alt="" width="32" height="32"/>アンカー打設作業承認申請</a></span>
			</p>
			<p>
				<span class="btn"><a href="<?php echo admin_url('admin.php?page=food') ?>" class=""><img src="<?php echo plugins_url('exhibitors-themes/images/icon_btn/10_inshokuken.png'); ?>" alt="" width="32" height="32"/>飲食券申込書</a></span>
			</p>
		<?php
		}
		?>

        
    </div><!-- End Control button -->
</div>
<script>
//notice dealine
$(".btn a.expries").click(function(){
    var notice = $(this).attr('data-notice');
    alert(""+notice+"登録\nの期限が切られています。\n管理者へお知らせください。");
});
</script>