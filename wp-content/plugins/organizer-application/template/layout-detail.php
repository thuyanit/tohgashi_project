<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('organizer-application/css/style.css'); ?>">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
<div id="dashboard">
	<div class="exhibitor_detail">
		<h2><span class="company_name"><?php echo $detail->company_name ?></span>申込み情報 詳細</h2>
        <div class="info_company">
            <div class="input_form">
                <label for="">会社名</label>
                <div class="input">
                    <p><?php echo $detail->company_name ?></p> <!-- Tên công ty -->
                </div>
            </div>
            <div class="input_form">
                <label for="">代表者 氏名</label>
                <div class="input group_name">
                    <p><?php echo mb_convert_kana( $detail->family_name.' '.$detail->given_name, "KVC") ?></p><!-- Family + Given name -->
                </div>
            </div>
            <div class="input_form">
                <label for="">出展社名</label>
                <div class="input">
                    <p><?php echo $detail->exhibitors_name ?></p><!-- Exhibitor's name name -->
                </div>
            </div>
            <div class="input_form">
                <label for="">出展商品サービス名</label>
                <div class="input">
                    <p><?php echo $detail->exhibition_service_name ?></p><!-- Exhibition service name -->
                </div>
            </div>
             <div class="input_form col4">
                <label for="">ご担当者名</label>
                <div class="input input1">
                    <p><?php echo $detail->person_in_charge ?></p><!-- Person in charge -->
                </div>
                <label class="label2" for="">ご担当者 部署</label>
                <div class="input input2">
                    <p><?php echo $detail->position ?></p><!--  Position  -->
                </div>
            </div>
            <div class="input_form col4">
                <label for="">郵便番号</label>
                <div class="input input1">
                    <p><?php echo $detail->zipcode1.' '.$detail->zipcode2 ?></p> <!-- Zipcode1 + Zipcode2 -->
                </div>
                <label class="label2" for="">都道府県</label>
                <div class="input input2">
                    <p><?php echo $detail->prefectures ?></p><!-- Prefectures  -->
                </div>
            </div>
            <div class="input_form col4">
                <label for="">市区</label>
                <div class="input input1">
                    <p><?php echo $detail->city ?></p><!--   City -->
                </div>
                <label class="label2" for="">町村番地</label>
                <div class="input input2">
                    <p><?php echo $detail->address ?></p><!-- Address -->
                </div>
            </div>
            <div class="input_form">
                <label for="">ビル・マンション名</label>
                <div class="input">
                    <p><?php echo $detail->building_name ?></p><!--Building name-->
                </div>
            </div>
            <div class="input_form col4">
                <label for="">電話番号</label>
                <div class="input input1">
                    <p><?php echo $detail->tel ?></p><!-- TEL -->
                </div>
                <label class="label2" for="">Fax番号</label>
                <div class="input input2">
                    <p><?php echo $detail->fax ?></p><!-- Fax -->
                </div>
            </div>
			<div class="input_form col4 input_form_URL">
                <label for="">公式サイト掲載URL</label>
                <div class="input input1">
                    <p><a href="<?php echo $detail->url; ?>" title="<?php echo $detail->url; ?>"><?php echo $detail->url ?></a></p><!-- URL -->
                </div>
                <label class="label2" for="">E-mail</label>
                <div class="input input2">
                    <p><?php echo $detail->email_dk ?></p><!-- Email -->
                </div>
            </div>
            <div class="input_form">
                <label for="">緊急連絡先</label>
                <div class="input">
                    <p><?php echo $detail->emergency_tel ?></p><!---  Emergency tel -->
                </div>
            </div>
        </div>

        <div class="exhibition_location">
            <?php //if( !empty($detail->number_booth) ): ?> <!-- Comment because Don't must be input number of booths -->
            <div class="block_location">
                <div class="cell head"><?php echo $detail->location_name; ?></div> 
                <div class="cell">
                    <div class="row">
                        <p class="col col1">出展小間数</p>
                        <p class="col col2">
                            <span>出展料金</span> <br>
                            <span class="txt_bold">出展希望</span>
                        </p>
                        <p class="col col3">
                            22万円<span class="small">（税抜）</span><br>
                            <span class="txt_bold"><span class="number_booth"><?php echo $detail->number_booth ?></span>小間</span>
                        </p>
                    </div>
                    <hr noshade="" size="1" width="95%" style="margin:0 auto" color="#e5e5e5">
                     <div class="row">
                        <p class="col col1">出展品目</p>
                        <?php if(isset($detail->check1)&&$detail->check1>0): ?>
                        <div style="display: block;clear:both;width: 100%;">
                        <p class="col txt_bold col2">カタログ</p>
                        <p class="col txt_bold col3" ><span class="price">30,000</span>円<span class="small">（税抜）</span></p>
                        </div>
                        <?php endif; ?>
                        <?php if(isset($detail->check2)&&$detail->check2>0): ?>
                        <div style="display: block;clear:both;width: 100%;">
                        <p class="col txt_bold col2">同梱</p>
                        <p class="col txt_bold col3" ><span class="price">50,000</span>円<span class="small">（税抜）</span></p>
                        </div>
                        <?php endif; ?>   
                    </div>
                    <?php
                        $Tsophong = $detail->number_booth;
                        $Tgiaphong1 = $detail->check1;
                        $Tgiaphong2 = $detail->check2;
                        $Total = $detail->number_booth * '220000' + ($Tgiaphong1 + $Tgiaphong2);
                    ?>
                     <div class="row total">
                        <p class="col col1">合計金額</p>
                        <p class="col txt_red col2"><span class="total"><?php echo number_format($Total); ?></span><span class="txt_red_small">円</span><span class="small">（税抜）</span></p>
                    </div>
                </div>
            </div><!-- end Block location -->
            <?php //endif; ?> <!-- End comment 09-08-2017 -->


           <?php if($billing_data):?>
            <div class="address_payment">
                <div class="col col1">
                    出展費用 ご請求先
                </div>
                <div class="col">
                    <?php foreach ($billing_data as $val):?>
                    <p><?php echo $val->pay_company_name ?></p>
                    <p><span class="postcode"><?php echo $val->pay_zipcode1.' '.$val->pay_zipcode2 ?></span>
                        <?php echo $val->pay_prefectures.' '.$val->pay_city.' '.$val->pay_address.'  '.$val->pay_building_name ?></p>
                    <?php endforeach;?>
                </div>
            </div>
            <?php endif;?>
        </div>
        <?php if ($detail->status==0): ?>
         <div class="button_detail">            
            <a href="<?php echo $detail->deny_url; ?>" class="refuse_btn">否　　認</a>
            <a href="<?php echo $detail->accept_url; ?>" class="accept_btn">承　　認</a>            
        </div>
        <?php endif; ?>
        
    </div>
</div>