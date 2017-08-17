<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('exhibitors-application/css/style.css'); ?>">
<div id="dashboard">
<div id="information">
    <h1>出展者情報</h1>
    <p>変更したい項目を修正し、「変更内容を登録する」ボタンを押してください。
    <br><span class="txt_red">※</span>印の項目は入力必須項目です。</p>
    <form id="information_form" action="" method="post">
        <div class="info_company">
            <div class="input_form">
                <label for="">会社名 <span class="txt_red">※</span></label>
                <div class="input">
                    <input type="text" name="company_name" id="company_name" value="<?php echo $profile->company_name; ?>" placeholder="" class="w440">
                </div>
            </div><!-- end input_form 1-->
            <div class="input_form">
                <label for="">代表者 氏名 <span class="txt_red">※</span></label>
                <div class="input group_name">
                    <span>姓</span>
                    <input type="text" name="family_name" id="family_name" value="<?php echo $profile->family_name; ?>" placeholder="" class="w228">
                    <span>名</span>
                    <input type="text" name="given_name" id="given_name" value="<?php echo $profile->given_name; ?>" placeholder="" class="w228">
                    <span>全角</span>
                </div>
            </div><!-- end input_form 2-->
            <div class="input_form">
                <label for="">出展社名 <span class="txt_red">※</span></label>
                <div class="input">
                    <input type="text" name="exhibitors_name" id="exhibitors_name" value="<?php echo $profile->exhibitors_name; ?>" placeholder="" class="w440">
                    <span class="note"><span class="txt_red">※</span>イベントの案内などに記載する社名</span>
                </div>
            </div><!-- end input_form 3-->
            <div class="input_form">
                <label for="">出展商品サービス名 <span class="txt_red">※</span></label>
                <div class="input">
                    <input type="text" name="exhibition_service_name" id="exhibition_service_name" value="<?php echo $profile->exhibition_service_name; ?>" placeholder="" class="w440">
                </div>
            </div><!-- end input_form 4-->
            <div class="input_form">
                <label for="">ご担当者名</label>
                <div class="input">
                    <input type="text" name="person_in_charge" id="person_in_charge" value="<?php echo $profile->person_in_charge; ?>" placeholder="" class="w315">
                </div>
            </div><!-- end input_form 5-->
            <div class="input_form">
                <label for="">ご担当者 部署</label>
                <div class="input">
                    <input type="text" name="position" id="position" value="<?php echo $profile->position; ?>" placeholder="" class="w315">
                </div>
            </div><!-- end input_form 6-->
            <div class="input_form col4">
                <label for="">郵便番号 <span class="txt_red">※</span></label>
                <div class="input input1">
                    <input type="text" name="zipcode1" id="zipcode1" value="<?php echo $profile->zipcode1; ?>" placeholder="" class="w95" maxlength="3">
                    <span>ー</span>
                    <input type="text" name="zipcode2" id="zipcode2" value="<?php echo $profile->zipcode2; ?>" placeholder="" class="w112" maxlength="4" onKeyUp="AjaxZip3.zip2addr('zipcode1','zipcode2','prefectures','city','address');">
                    <span class="note">半角数字</span>
                </div>
                <label class="label2" for="">都道府県 <span class="txt_red">※</span></label>
                <div class="input input2">
                    <select class="w215" name="prefectures" id="prefectures">
                            <option <?php echo ($profile->prefectures=='北海道')?"selected":"" ?> value="北海道">北海道</option>
                            <option <?php echo ($profile->prefectures=='青森県')?"selected":"" ?> value="青森県">青森県</option>
                            <option <?php echo ($profile->prefectures=='岩手県')?"selected":"" ?> value="岩手県">岩手県</option>
                            <option <?php echo ($profile->prefectures=='宮城県')?"selected":"" ?> value="宮城県">宮城県</option>
                            <option <?php echo ($profile->prefectures=='秋田県')?"selected":"" ?> value="秋田県">秋田県</option>
                            <option <?php echo ($profile->prefectures=='山形県')?"selected":"" ?> value="山形県">山形県</option>
                            <option <?php echo ($profile->prefectures=='福島県')?"selected":"" ?> value="福島県">福島県</option>
                            <option <?php echo ($profile->prefectures=='茨城県')?"selected":"" ?> value="茨城県">茨城県</option>
                            <option <?php echo ($profile->prefectures=='栃木県')?"selected":"" ?> value="栃木県">栃木県</option>
                            <option <?php echo ($profile->prefectures=='群馬県')?"selected":"" ?> value="群馬県">群馬県</option>
                            <option <?php echo ($profile->prefectures=='埼玉県')?"selected":"" ?> value="埼玉県">埼玉県</option>
                            <option <?php echo ($profile->prefectures=='千葉県')?"selected":"" ?> value="千葉県">千葉県</option>
                            <option <?php echo ($profile->prefectures=='東京都')?"selected":"" ?> value="東京都">東京都</option>
                            <option <?php echo ($profile->prefectures=='神奈川県')?"selected":"" ?> value="神奈川県">神奈川県</option>
                            <option <?php echo ($profile->prefectures=='新潟県')?"selected":"" ?> value="新潟県">新潟県</option>
                            <option <?php echo ($profile->prefectures=='富山県')?"selected":"" ?> value="富山県">富山県</option>
                            <option <?php echo ($profile->prefectures=='石川県')?"selected":"" ?> value="石川県">石川県</option>
                            <option <?php echo ($profile->prefectures=='福井県')?"selected":"" ?> value="福井県">福井県</option>
                            <option <?php echo ($profile->prefectures=='山梨県')?"selected":"" ?> value="山梨県">山梨県</option>
                            <option <?php echo ($profile->prefectures=='長野県')?"selected":"" ?> value="長野県">長野県</option>
                            <option <?php echo ($profile->prefectures=='岐阜県')?"selected":"" ?> value="岐阜県">岐阜県</option>
                            <option <?php echo ($profile->prefectures=='静岡県')?"selected":"" ?> value="静岡県">静岡県</option>
                            <option <?php echo ($profile->prefectures=='愛知県')?"selected":"" ?> value="愛知県">愛知県</option>
                            <option <?php echo ($profile->prefectures=='三重県')?"selected":"" ?> value="三重県">三重県</option>
                            <option <?php echo ($profile->prefectures=='滋賀県')?"selected":"" ?> value="滋賀県">滋賀県</option>
                            <option <?php echo ($profile->prefectures=='京都府')?"selected":"" ?> value="京都府">京都府</option>
                            <option <?php echo ($profile->prefectures=='大阪府')?"selected":"" ?> value="大阪府">大阪府</option>
                            <option <?php echo ($profile->prefectures=='兵庫県')?"selected":"" ?> value="兵庫県">兵庫県</option>
                            <option <?php echo ($profile->prefectures=='奈良県')?"selected":"" ?> value="奈良県">奈良県</option>
                            <option <?php echo ($profile->prefectures=='和歌山県')?"selected":"" ?> value="和歌山県">和歌山県</option>
                            <option <?php echo ($profile->prefectures=='鳥取県')?"selected":"" ?> value="鳥取県">鳥取県</option>
                            <option <?php echo ($profile->prefectures=='島根県')?"selected":"" ?> value="島根県">島根県</option>
                            <option <?php echo ($profile->prefectures=='岡山県')?"selected":"" ?> value="岡山県">岡山県</option>
                            <option <?php echo ($profile->prefectures=='広島県')?"selected":"" ?> value="広島県">広島県</option>
                            <option <?php echo ($profile->prefectures=='山口県')?"selected":"" ?> value="山口県">山口県</option>
                            <option <?php echo ($profile->prefectures=='徳島県')?"selected":"" ?> value="徳島県">徳島県</option>
                            <option <?php echo ($profile->prefectures=='香川県')?"selected":"" ?> value="香川県">香川県</option>
                            <option <?php echo ($profile->prefectures=='愛媛県')?"selected":"" ?> value="愛媛県">愛媛県</option>
                            <option <?php echo ($profile->prefectures=='高知県')?"selected":"" ?> value="高知県">高知県</option>
                            <option <?php echo ($profile->prefectures=='福岡県')?"selected":"" ?> value="福岡県">福岡県</option>
                            <option <?php echo ($profile->prefectures=='佐賀県')?"selected":"" ?> value="佐賀県">佐賀県</option>
                            <option <?php echo ($profile->prefectures=='長崎県')?"selected":"" ?> value="長崎県">長崎県</option>
                            <option <?php echo ($profile->prefectures=='熊本県')?"selected":"" ?> value="熊本県">熊本県</option>
                            <option <?php echo ($profile->prefectures=='大分県')?"selected":"" ?> value="大分県">大分県</option>
                            <option <?php echo ($profile->prefectures=='宮崎県')?"selected":"" ?> value="宮崎県">宮崎県</option>
                            <option <?php echo ($profile->prefectures=='鹿児島県')?"selected":"" ?> value="鹿児島県">鹿児島県</option>
                            <option <?php echo ($profile->prefectures=='沖縄県')?"selected":"" ?> value="沖縄県">沖縄県</option>
                    </select>
                </div>
            </div><!-- end input_form 7-->
            <div class="input_form col4">
                <label for="">市区 <span class="txt_red">※</span></label>
                <div class="input input1">
                    <input type="text" name="city" id="city" value="<?php echo $profile->city; ?>" placeholder="" class="w315">
                </div>
                <label class="label2" for="">町村番地 <span class="txt_red">※</span></label>
                <div class="input input2">
                    <input type="text" name="address" id="address" value="<?php echo $profile->address; ?>" placeholder="" class="w215">
                </div>
            </div><!-- end input_form 8-->
            <div class="input_form">
                <label for="">ビル・マンション名</label>
                <div class="input">
                    <input type="text" name="building_name" id="building_name" value="<?php echo $profile->building_name; ?>" placeholder="" class="w440">
                </div>
            </div><!-- end input_form 9-->
            <div class="input_form">
                <label for="">電話番号 <span class="txt_red">※</span></label>
                <div class="input">
                    <input type="text" name="tel" id="tel" value="<?php echo $profile->tel; ?>" placeholder="" class="w315">
                    <span class="note">半角数字</span>
                </div>
            </div><!-- end input_form 10-->
            <div class="input_form">
                <label for="">Fax番号 <span class="txt_red">※</span></label>
                <div class="input">
                    <input type="text" name="fax" id="fax" value="<?php echo $profile->fax; ?>" placeholder="" class="w315">
                    <span class="note">半角数字</span>
                </div>
            </div><!-- end input_form 11-->
            <div class="input_form">
                <label for="">E-mail <span class="txt_red">※</span></label>
                <div class="input">
                    <input type="text" name="email" id="email" value="<?php echo $profile->email_dk; ?>" placeholder="" class="w440" readonly="disable">
                    <span class="note">半角英数字</span>
                </div>
            </div><!-- end input_form 12-->
            <div class="input_form">
                <label for="">公式サイト掲載URL</label>
                <div class="input">
                    <input type="text" name="url" id="url" value="<?php echo $profile->url; ?>" placeholder="" class="w440">
                    <span class="note">半角英数字</span>
                </div>
            </div><!-- end input_form 13-->
            <div class="input_form">
                <label for="">緊急連絡先 <span class="txt_red">※</span></label>
                <div class="input">
                    <input type="text" name="emergency_tel" id="emergency_tel" value="<?php echo $profile->emergency_tel; ?>" placeholder="" class="w315">
                    <span class="note">※携帯電話番号など</span>
                </div>
            </div><!-- end input_form 14-->
        </div>
        <input type="submit" name="update_profile" class="update_btn" value="変更内容を登録する"/>
    </form>
</div>
</div>