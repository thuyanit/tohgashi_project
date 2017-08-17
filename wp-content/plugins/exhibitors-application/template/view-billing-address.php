<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('exhibitors-application/css/style.css'); ?>">
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<div id="dashboard">
    <div id="billing_address">
        <h1>出展料ご請求先</h1>
        <div class="note">
            ※直前でのブースキャンセルは、下記のとおりキャンセル料が発生いたしますのでご注意ください。<br>
    　        キャンセル料は会期30 日前以内で出展料の100％、40 日前以内で同80%、60 日前以内で同50% です。カタログ出展、同梱サービスも同様です。<br>
            ※出展料金は<span class="red_txt">全て税別表記（消費税8%）</span>です。
        </div>
        <?php if ($link_data): ?>
            <div class="exhibition_location">
                <div class="detail_fee">
                    <div class="col name_location">
                    <?php echo $link_data->location_name; ?>
                    </div>
                    <div class="col">
                        <div class="booth">
                            <div class="title_head col">出展小間数</div>
                            <div class="fee col">
                                <p><span>出展料金</span><span>22万円（税抜)</span> </p>
                                <p><span>出展希望</span><span><?php echo $link_data->number_booth; ?>　小間</span></p>
                            </div>
                        </div>
                        <hr noshade color="#e5e5e5" width="95%" style="margin:0 auto" size="1">
                        <div class="catalogue">
                            <div class="title_head col">出展品目</div>
                            <div class="fee col">
                                <?php if(!empty($link_data->check1)): ?>
                                <p><span>カタログ</span><span>30,000 円（税抜）</span> </p>
                                <?php endif; ?>
                                <?php if(!empty($link_data->check2)): ?>
                                <p><span>同梱</span><span>50,000 円（税抜）</span></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    $Tsophong = $link_data->number_booth;
                    $Tgiaphong1 = $link_data->check1;
                    $Tgiaphong2 = $link_data->check2;
                    $Total = $link_data->number_booth * '220000' + ($Tgiaphong1 + $Tgiaphong2);
                ?>
                <div class="total_fee">
                    <div class="col"></div>
                    <div class="col"><p>合計金額</p><p><?php echo number_format($Total); ?><span class="unit">円</span><span class="small">（税抜)</span></p></div>
                </div>
            </div><!-- end Block location -->
            <form id="register_billing_address" action="" method="post">
                <div class="info_company">
                    <div class="input_form">
                        <label for="">出展費用ご請求先 会社名</label>
                        <div class="input">
                            <input type="text" name="company_name" id="company_name" value="<?php echo $check_payment->pay_company_name; ?>" placeholder="" class="w440">
                        </div>
                    </div><!-- end input_form 5-->
                    <div class="input_form">
                        <label for="">ご請求書 送付先部署</label>
                        <div class="input">
                            <input type="text" name="position" id="position" value="<?php echo $check_payment->pay_position; ?>" placeholder="" class="w230">
                        </div>
                    </div><!-- end input_form 6-->
                    <div class="input_form col4">
                        <label for="">送付先 郵便番号<span class="txt_red">※</span></label>
                        <div class="input input1">
                            <input type="text" name="zipcode1" id="zipcode1" value="<?php echo $check_payment->pay_zipcode1; ?>" placeholder="" class="w95" maxlength="3">
                            <span>ー</span>
                            <input type="text" name="zipcode2" id="zipcode2" value="<?php echo $check_payment->pay_zipcode2; ?>" placeholder="" class="w115" maxlength="4" onKeyUp="AjaxZip3.zip2addr('zipcode1','zipcode2','prefectures','city','address');">
                            <span class="comment">半角数字</span>
                        </div>
                        <label class="label2" for="">送付先 都道府県<span class="txt_red">※</span></label>
                        <div class="input input2">
                            <select class="w215" name="prefectures" id="prefectures">
                                <option <?php echo ($check_payment->pay_prefectures=='北海道')?"selected":"" ?> value="北海道">北海道</option>
                                <option <?php echo ($check_payment->pay_prefectures=='愛知県')?"selected":"" ?> value="愛知県">愛知県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='秋田県')?"selected":"" ?> value="秋田県">秋田県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='青森県')?"selected":"" ?> value="青森県">青森県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='千葉県')?"selected":"" ?> value="千葉県">千葉県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='愛媛県')?"selected":"" ?> value="愛媛県">愛媛県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='福井県')?"selected":"" ?> value="福井県">福井県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='福岡県')?"selected":"" ?> value="福岡県">福岡県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='福島県')?"selected":"" ?> value="福島県">福島県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='岐阜県')?"selected":"" ?> value="岐阜県">岐阜県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='群馬県')?"selected":"" ?> value="群馬県">群馬県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='広島県')?"selected":"" ?> value="広島県">広島県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='兵庫県')?"selected":"" ?> value="兵庫県">兵庫県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='茨城県')?"selected":"" ?> value="茨城県">茨城県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='石川県')?"selected":"" ?> value="石川県">石川県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='岩手県')?"selected":"" ?> value="岩手県">岩手県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='香川県')?"selected":"" ?> value="香川県">香川県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='鹿児島県')?"selected":"" ?> value="鹿児島県">鹿児島県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='神奈川県')?"selected":"" ?> value="神奈川県">神奈川県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='高知県')?"selected":"" ?> value="高知県">高知県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='熊本県')?"selected":"" ?> value="熊本県">熊本県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='京都府')?"selected":"" ?> value="京都府">京都府</option>
                                <option <?php echo ($check_payment->pay_prefectures=='三重県')?"selected":"" ?> value="三重県">三重県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='宮城県')?"selected":"" ?> value="宮城県">宮城県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='宮崎県')?"selected":"" ?> value="宮崎県">宮崎県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='長野県')?"selected":"" ?> value="長野県">長野県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='長崎県')?"selected":"" ?> value="長崎県">長崎県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='奈良県')?"selected":"" ?> value="奈良県">奈良県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='新潟県')?"selected":"" ?> value="新潟県">新潟県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='大分県')?"selected":"" ?> value="大分県">大分県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='岡山県')?"selected":"" ?> value="岡山県">岡山県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='沖縄県')?"selected":"" ?> value="沖縄県">沖縄県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='大阪府')?"selected":"" ?> value="大阪府">大阪府</option>
                                <option <?php echo ($check_payment->pay_prefectures=='佐賀県')?"selected":"" ?> value="佐賀県">佐賀県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='埼玉県')?"selected":"" ?> value="埼玉県">埼玉県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='滋賀県')?"selected":"" ?> value="滋賀県">滋賀県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='島根県')?"selected":"" ?> value="島根県">島根県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='静岡県')?"selected":"" ?> value="静岡県">静岡県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='栃木県')?"selected":"" ?> value="栃木県">栃木県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='徳島県')?"selected":"" ?> value="徳島県">徳島県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='東京都')?"selected":"" ?> value="東京都">東京都</option>
                                <option <?php echo ($check_payment->pay_prefectures=='鳥取県')?"selected":"" ?> value="鳥取県">鳥取県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='富山県')?"selected":"" ?> value="富山県">富山県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='和歌山県')?"selected":"" ?> value="和歌山県">和歌山県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='山形県')?"selected":"" ?> value="山形県">山形県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='山口県')?"selected":"" ?> value="山口県">山口県</option>
                                <option <?php echo ($check_payment->pay_prefectures=='山梨県')?"selected":"" ?> value="山梨県">山梨県</option>
                            </select>
                        </div>
                    </div><!-- end input_form 7-->
                    <div class="input_form col4">
                        <label for="">送付先 市区群 <span class="txt_red">※</span></label>
                        <div class="input input1">
                            <input type="text" name="city" id="city" value="<?php echo $check_payment->pay_city; ?>" placeholder="" class="w230">
                        </div>
                        <label class="label2" for="">送付先 町村番地  <span class="txt_red">※</span></label>
                        <div class="input input2">
                            <input type="text" name="address" id="address" value="<?php echo $check_payment->pay_address; ?>" placeholder="" class="w215">
                        </div>
                    </div><!-- end input_form 8-->
                    <div class="input_form">
                        <label for="">送付先 ビル・マンション名</label>
                        <div class="input">
                            <input type="text" name="building_name" id="building_name" value="<?php echo $check_payment->pay_building_name; ?>" placeholder="" class="w315">
                        </div>
                    </div><!-- end input_form 9-->
                    <div class="input_form">
                        <label for="">電話番号 <span class="txt_red">※</span></label>
                        <div class="input">
                            <input type="text" name="tel" id="tel" value="<?php echo $check_payment->pay_tel; ?>" placeholder="" class="w315">
                            <span class="comment">半角数字</span>
                        </div>
                    </div><!-- end input_form 10-->
                    <div class="input_form">
                        <label for="">Fax番号 <span class="txt_red">※</span></label>
                        <div class="input">
                            <input type="text" name="fax" id="fax" value="<?php echo $check_payment->pay_fax; ?>" placeholder="" class="w315">
                            <span class="comment">半角数字</span>
                        </div>
                    </div><!-- end input_form 11-->
                </div>
            </form>
        <?php endif; // Nếu vùng này có đăng kí từ form application ?>
        <?php if(!isset($link_data)):
            echo "You don't registed this location";
        endif;// Nếu vùng này chưa có đăng kí từ form application ?>
    </div>
</div>