<?php get_header(); ?>
    <div class="top_content">
        <h3>ブース出展申し込み2017</h3>
        <p class="instruction">
            以下の項目に必要事項をご記入後、「確認」ボタンをクリックしてください。<br>
            <span class="txt_red">※</span>印の項目は入力必須項目です。必ずご記入ください。
        </p>
        <div class="note">
            <p>※直前でのブースキャンセルは、下記のとおりキャンセル料が発生いたしますのでご注意ください。<br>
　                       キャンセル料は会期30 日前以内で出展料の100％、40 日前以内で同80%、60 日前以内で同50% です。カタログ出展、同梱サービスも同様です。</p>
            <p>※出展料金は<span class="txt_red">全て税別表記（消費税8%）</span>です。</p>
        </div>
    </div>
            
    <div class="main_content">
        <form id="application_form" action="" method="post">
            <p id="error">エラー項目をご確認ください</p>
            <div class="info_company">
                <div class="input_form">
                    <label for="">会社名 <span class="txt_red">※</span></label>
                    <div class="input">
                        <input type="text" name="company_name" id="company_name" value="" placeholder="" class="w440">
                    </div>
                </div><!-- end input_form 1-->
                <div class="input_form">
                    <label for="">代表者 氏名 <span class="txt_red">※</span></label>
                    <div class="input group_name">
                        <span>姓</span>
                        <input type="text" name="family_name" id="family_name" value="" placeholder="" class="w228">
                        <span>名</span>
                        <input type="text" name="given_name" id="given_name" value="" placeholder="" class="w228">
                        <span>全角</span>
                    </div>
                </div><!-- end input_form 2-->
                <div class="input_form">
                    <label for="">出展社名 <span class="txt_red">※</span></label>
                    <div class="input">
                        <input type="text" name="exhibitors_name" id="exhibitors_name" value="" placeholder="" class="w440">
                        <span class="note"><span class="txt_red">※</span>イベントの案内などに記載する社名</span>
                    </div>
                </div><!-- end input_form 3-->
                <div class="input_form">
                    <label for="">出展商品サービス名 <span class="txt_red">※</span></label>
                    <div class="input">
                        <input type="text" name="exhibition_service_name" id="exhibition_service_name" value="" placeholder="" class="w440">
                    </div>
                </div><!-- end input_form 4-->
                <div class="input_form">
                    <label for="">ご担当者名 <span class="txt_red">※</span></label>
                    <div class="input">
                        <input type="text" name="person_in_charge" id="person_in_charge" value="" placeholder="" class="w315">
                    </div>
                </div><!-- end input_form 5-->
                <div class="input_form">
                    <label for="">ご担当者 部署 <span class="txt_red">※</span></label>
                    <div class="input">
                        <input type="text" name="position" id="position" value="" placeholder="" class="w315">
                    </div>
                </div><!-- end input_form 6-->
                <div class="input_form col4">
                    <label for="">郵便番号 <span class="txt_red">※</span></label>
                    <div class="input input1">
                        <input type="text" name="zipcode1" id="zipcode1" value="" placeholder="" class="w95" maxlength="3">
                        <span>ー</span>
                        <input type="text" name="zipcode2" id="zipcode2" value="" placeholder="" class="w112" maxlength="4" onKeyUp="AjaxZip3.zip2addr('zipcode1','zipcode2','prefectures','city','address');">
                        <span class="note">半角数字</span>
                    </div>
                    <label class="label2" for="">都道府県 <span class="txt_red">※</span></label>
                    <div class="input input2">
                        <select class="w215" name="prefectures" id="prefectures">
                        	<option value="北海道">北海道</option>
							<option value="青森県">青森県</option>
							<option value="岩手県">岩手県</option>
							<option value="宮城県">宮城県</option>
							<option value="秋田県">秋田県</option>
							<option value="山形県">山形県</option>
							<option value="福島県">福島県</option>
							<option value="茨城県">茨城県</option>
							<option value="栃木県">栃木県</option>
							<option value="群馬県">群馬県</option>
							<option value="埼玉県">埼玉県</option>
							<option value="千葉県">千葉県</option>
							<option value="東京都">東京都</option>
							<option value="神奈川県">神奈川県</option>
							<option value="新潟県">新潟県</option>
							<option value="富山県">富山県</option>
							<option value="石川県">石川県</option>
							<option value="福井県">福井県</option>
							<option value="山梨県">山梨県</option>
							<option value="長野県">長野県</option>
							<option value="岐阜県">岐阜県</option>
							<option value="静岡県">静岡県</option>
							<option value="愛知県">愛知県</option>
							<option value="三重県">三重県</option>
							<option value="滋賀県">滋賀県</option>
							<option value="京都府">京都府</option>
							<option value="大阪府">大阪府</option>
							<option value="兵庫県">兵庫県</option>
							<option value="奈良県">奈良県</option>
							<option value="和歌山県">和歌山県</option>
							<option value="鳥取県">鳥取県</option>
							<option value="島根県">島根県</option>
							<option value="岡山県">岡山県</option>
							<option value="広島県">広島県</option>
							<option value="山口県">山口県</option>
							<option value="徳島県">徳島県</option>
							<option value="香川県">香川県</option>
							<option value="愛媛県">愛媛県</option>
							<option value="高知県">高知県</option>
							<option value="福岡県">福岡県</option>
							<option value="佐賀県">佐賀県</option>
							<option value="長崎県">長崎県</option>
							<option value="熊本県">熊本県</option>
							<option value="大分県">大分県</option>
							<option value="宮崎県">宮崎県</option>
							<option value="鹿児島県">鹿児島県</option>
							<option value="沖縄県">沖縄県</option>
                        </select>
                    </div>
                </div><!-- end input_form 7-->
                <div class="input_form col4">
                    <label for="">市区 <span class="txt_red">※</span></label>
                    <div class="input input1">
                        <input type="text" name="city" id="city" value="" placeholder="" class="w315">
                    </div>
                    <label class="label2" for="">町村番地 <span class="txt_red">※</span></label>
                    <div class="input input2">
                        <input type="text" name="address" id="address" value="" placeholder="" class="w215">
                    </div>
                </div><!-- end input_form 8-->
                <div class="input_form">
                    <label for="">ビル・マンション名</label>
                    <div class="input">
                        <input type="text" name="building_name" id="building_name" value="" placeholder="" class="w440">
                    </div>
                </div><!-- end input_form 9-->
                <div class="input_form">
                    <label for="">電話番号 <span class="txt_red">※</span></label>
                    <div class="input">
                        <input type="text" name="tel" id="tel" value="" placeholder="" class="w315">
                        <span class="note">半角数字</span>
                    </div>
                </div><!-- end input_form 10-->
                <div class="input_form">
                    <label for="">Fax番号 <span class="txt_red">※</span></label>
                    <div class="input">
                        <input type="text" name="fax" id="fax" value="" placeholder="" class="w315">
                        <span class="note">半角数字</span>
                    </div>
                </div><!-- end input_form 11-->
                <div class="input_form">
                    <label for="">E-mail <span class="txt_red">※</span></label>
                    <div class="input">
                        <input type="text" name="email" id="email" value="" placeholder="" class="w440">
                        <span class="note">半角英数字</span><span id="showerror"></span>
                        <input type="text" name="email2" id="email2" value="" class="w440" placeholder="">
                        <span class="note">確認のため2度入力してください。</span>
                    </div>
                </div><!-- end input_form 12-->
                <div class="input_form">
                    <label for="">公式サイト掲載URL</label>
                    <div class="input">
                        <input type="text" name="url" id="url" value="" placeholder="" class="w440">
                        <span class="note">半角英数字</span>
                    </div>
                </div><!-- end input_form 13-->
                <div class="input_form">
                    <label for="">緊急連絡先 <span class="txt_red">※</span></label>
                    <div class="input">
                        <input type="text" name="emergency_tel" id="emergency_tel" value="" placeholder="" class="w315">
                        <span class="note">※携帯電話番号など</span>
                    </div>
                </div><!-- end input_form 14-->
            </div>
            <div class="area_event">
                <p class="note">※ブース出展企業はカタログ設置は無料。</p>
                <div class="content">
                    <div class="row">
                        <p class="cell">九州会場　5/17（水）・18（木）</p>
                        <p class="cell">出展小間数</p>
                        <p class="cell">
                            <span class="title">出展料金</span>　     　　
                            <span>22万円<span class="small">（税抜）</span></span> <br>
                            <span class="title title_2">出展希望</span>
                            <span><input type="text" name="catalogue[1][sophong]" class="w55">小間</span>
                        </p>
                        <p class="cell">出展品目</p>
                        <p class="cell">
                            <span class="title"><input type="checkbox" name="catalogue[1][check1]" value="30000" id="ck1"><label for="ck1"><span></span>カタログ</label></span>
                            <span>3 万円<span class="small">（税別）</span></span> <br>
                            <span class="title"><input type="checkbox" name="catalogue[1][check2]" value="50000" id="ck2"><label for="ck2"><span></span>同梱</label></span>
                            <span>5 万円<span class="small">（税別）</span></span>
                        </p>
                    </div><!-- end row -->
                    <div class="row">
                        <p class="cell">東京会場　7/25（火）・26（水）</p>
                        <p class="cell">出展小間数</p>
                        <p class="cell">
                            <span class="title">出展料金</span>　     　　
                            <span>22万円<span class="small">（税抜）</span></span> <br>
                            <span class="title title_2">出展希望</span>
                            <span><input type="text" name="catalogue[2][sophong]" class="w55">小間</span>
                        </p>
                        <p class="cell">出展品目</p>
                        <p class="cell">
                            <span class="title"><input type="checkbox" name="catalogue[2][check1]" value="30000" id="ck3"><label for="ck3"><span></span>カタログ</label></span>
                            <span>3 万円<span class="small">（税別）</span></span> <br>
                            <span class="title"><input type="checkbox" name="catalogue[2][check2]" value="50000" id="ck4"><label for="ck4"><span></span>同梱</label></span>
                            <span>5 万円<span class="small">（税別）</span></span>
                        </p>
                    </div><!-- end row -->
                    <div class="row">
                        <p class="cell">大阪会場　9/29（金）・30（土）</p>
                        <p class="cell">出展小間数</p>
                        <p class="cell">
                            <span class="title">出展料金</span>　     　　
                            <span>22万円<span class="small">（税抜）</span></span> <br>
                            <span class="title title_2">出展希望</span>
                            <span><input type="text" name="catalogue[3][sophong]" class="w55">小間</span>
                        </p>
                        <p class="cell">出展品目</p>
                        <p class="cell">
                            <span class="title"><input type="checkbox" name="catalogue[3][check1]" value="30000" id="ck5"><label for="ck5"><span></span>カタログ</label></span>
                            <span>3 万円<span class="small">（税別）</span></span> <br>
                            <span class="title"><input type="checkbox" name="catalogue[3][check2]" value="50000" id="ck6"><label for="ck6"><span></span>同梱</label></span>
                            <span>5 万円<span class="small">（税別）</span></span>
                        </p>
                    </div><!-- end row -->
                    <div class="row">
                        <p class="cell">名古屋会場　11/7（火）・8（水）</p>
                        <p class="cell">出展小間数</p>
                        <p class="cell">
                            <span class="title">出展料金</span>　     　　
                            <span>22万円<span class="small">（税抜）</span></span> <br>
                            <span class="title title_2">出展希望</span>
                            <span><input type="text" name="catalogue[4][sophong]" class="w55">小間</span>
                        </p>
                        <p class="cell">出展品目</p>
                        <p class="cell">
                            <span class="title"><input type="checkbox" name="catalogue[4][check1]" value="30000" id="ck7"><label for="ck7"><span></span>カタログ</label></span>
                            <span>3 万円<span class="small">（税別）</span></span> <br>
                            <span class="title"><input type="checkbox" name="catalogue[4][check2]" value="50000" id="ck8"><label for="ck8"><span></span>同梱</label></span>
                            <span>5 万円<span class="small">（税別）</span></span>
                        </p>
                    </div><!-- end row -->
                </div>

            </div><!-- end Area Event  -->
            <div class="questionnaire">
                <p class="note">リーフレット等作成に当り、貴社の展示されます出展商品・サービス内容につきまして、下記よりお選びください。（3つまで選択可）</p>

                <?php foreach ($ques as $name => $data): ?>
                <h3 class="title"><?php echo $data['title'] ?></h3>
                <div class="selectbox">
                    <?php foreach ($data['value'] as $key => $val): ?>
                        <label>
                            <input class="select_box" type="checkbox" name="choose[<?php echo $name ?>][]" value="<?php echo $name.$key ?>" id="<?php echo $name.$key ?>" /><span></span><?php echo $val ?>
                        </label>
                    <?php endforeach; ?>
                </div>
                <?php endforeach; ?>

            </div>
            <?php 
                $d=getdate();
                $datepost=$d['year']."-".$d['mon']."-".$d['mday'];
            ?>
            <input type="hidden" name="date_register" value="<?php echo $datepost; ?>">
            <input id="submit_form" name="submit_form" value="入力内容を確認する" readonly>
           <!--  <p id="submit_form">入力内容を確認する</p> -->
        </form>
    </div><!-- end main content -->
<?php get_footer(); ?>