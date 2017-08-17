<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('exhibitors-application/css/style.css'); ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
	<!--<div id="dashboard">-->
		<div id="basic_appication">
			<div class="head">
				<a class="active" href="<?php echo admin_url('admin.php?page=foundation');?>">出展基本申込み<span>申込み期限 <?php echo $date_f; ?></span></a>
				<a href="<?php echo admin_url('admin.php?page=construction');?>">工事申込・各種申請 <span>申込み期限 <?php echo $date_c; ?></span></a>
			</div>
			<form id="foundation_form" method="post" action="" enctype="multipart/form-data">
				<div class="choose_booth_contractor">
					<div>装飾業者指定<br>ブース内装飾施工</div>
					<div>
						<label>
							<input type="radio" name="package" class="choose1" value="施工業者無し" />
							<span></span>施工業者無し
						</label>
					</div>
					<div>
						<label>
							<input type="radio" name="package" class="choose2" value="パッケージブースを申し込む" />
							<span></span>パッケージブースを申し込む
						</label>
					</div>
					<div>
						<label>
							<input type="radio" name="package" class="choose3" value="事務局指定業者に依頼する（トーガシ）" />
							<span></span>事務局指定業者に依頼する（トーガシ）
						</label>
					</div>
					<div>
						<label>
							<input type="radio" name="package" class="choose4" value="事務局指定業者以外に依頼する" />
							<span></span>事務局指定業者以外に依頼する
						</label>
					</div>
				</div>
				<div class="content_selected">
					<div class="package_booth">
						<div class="number_booth">
							<span>パッケージ申込み小間数</span>
							<span><input type="number" name="qty_booth" value="" min="1" max="3"></span>
							<span>小間</span>
							</p>
						</div><!--- line 5 sô điện thoại  -->
						<div class="carpet_color">
							<div>カーペット色</div>
							<div>
								<label>
									<input type="radio" name="carpet_color" value="グレー"/>
									<span></span>グレー　
								</label>
							</div>
							<div>
								<label>
									<input type="radio" name="carpet_color" value="青"/>
									<span></span>青
								</label>
							</div>
							<div>
								<label>
									<input type="radio" name="carpet_color" value="赤"/>
									<span></span>赤　
								</label>
							</div>
							<div>
								<label>
									<input type="radio" name="carpet_color" value="緑"/>
									<span></span>緑
								</label>
							</div>
						</div>
						<div class="table_price">
							<div class="column"><img src="<?php echo plugins_url('exhibitors-application/images/foundation.png'); ?>"></div>
							<div class="column">
								<div class="table">
									<div class="thead">
										<span>パッケージ１小間</span><span>(１小間/9㎡)</span>
									</div>
									<div>
										<p><span>床面カーペット</span><span>1小間</span></p>
										<p><span>スポットライト(100w)</span><span>２灯</span></p>
										<p><span>コンセント(500w)</span><span>１個</span></p>
										<p><span>1次電気工事費</span><span>１式</span></p>
										<p><span>分電盤工事費</span><span>１式</span></p>
										<p><span>電気使用量</span><span>１式</span></p>
										<p><span>受付カウンター</span><span>１台</span></p>
										<p>(W900×D450×H800)</p>
										<p><span>カウンターチェア</span><span>１脚</span></p>
										<p><span>貴名受</span><span>１個</span></p>
										<p class="total_table">¥53,000</p>
									</div>
								</div>
								<div class="table">
									<div class="thead">
										<span>パッケージ２小間 </span><span>２小間/18㎡)</span>
									</div>
									<div>
										<p><span>床面カーペット</span><span>2小間</span></p>
										<p><span>スポットライト(100w)</span><span>４灯</span></p>
										<p><span>コンセント(500w)</span><span>２個</span></p>
										<p><span>1次電気工事費</span><span>１式</span></p>
										<p><span>分電盤工事費</span><span>１式</span></p>
										<p><span>電気使用量</span><span>１式</span></p>
										<p><span>受付カウンター</span><span>１台</span></p>
										<p>(W900×D450×H800)</p>
										<p><span>カウンターチェア</span><span>１脚</span></p>
										<p><span>貴名受</span><span>１個</span></p>
										<p class="total_table">¥94,000</p>
									</div>
								</div>
								<div class="table">
									<div class="thead">
										<span>パッケージ３小間 </span><span>(３小間/27㎡)</span>
									</div>
									<div>
										<p><span>床面カーペット</span><span>3小間</span></p>
										<p><span>スポットライト(100w)</span><span>６灯</span></p>
										<p><span>コンセント(500w)</span><span>３個</span></p>
										<p><span>1次電気工事費</span><span>１式</span></p>
										<p><span>分電盤工事費</span><span>１式</span></p>
										<p><span>電気使用量</span><span>１式</span></p>
										<p><span>受付カウンター</span><span>１台</span></p>
										<p>(W900×D450×H800)</p>
										<p><span>カウンターチェア</span><span>１脚</span></p>
										<p><span>貴名受</span><span>１個</span></p>
										<p class="total_table">¥147,000</p>
									</div>
								</div>
							</div>
						</div><!-- ============== table_price ======================= -->

					</div><!--display Case2 -->
					<div class="myself choose_myself">
						<div class="notice_foundation">
							<p>事務局指定業者（トーガシ）以外に依頼するを選択した場合、下記のご記入をお願いします。</p>
							<p>※自社装飾の出展者は、小間装飾計画が会場規定及び消防法に適しているかの許可を受けるため、必ず図面を添付してください。</p>
						</div>
						<div class="input_form">
							<label for="">施工業者 <span class="require">※</span></label>
							<p><input type="text" name="name_company_supplier" id="name_company_supplier" value="" class="w465"></p>
						</div><!--- line 1 nhà thầu-->
						<div class="input_form">
							<label for="">郵便番号 <span class="require">※</span></label>
							<p>
								<input type="text" name="zip1" id="zip1" value="" class="w95">ー<input type="text" name="zip2" id="zip2" value="" class="w115" onKeyUp="AjaxZip3.zip2addr('zip1','zip2','address','address','');">
								<span>半角英数</span>
							</p>
						</div><!--- line 2 mã bưu điện-->
						<div class="input_form">
							<label for="">住所 <span class="require">※</span></label>
							<p><input type="text" name="address" id="address" value="" class="w465"></p>
						</div><!--- line 3 địa chỉ-->
						<div class="input_form">
							<label for="">担当者 <span class="require">※</span></label>
							<p><input type="text" name="person_in_change" id="person_in_change" value="" class="w465"></p>
						</div><!--- line 4 người phụ trách  -->
						<div class="input_form">
							<label for="">電話番号 <span class="require">※</span></label>
							<p>
								<input type="tel" name="tel" id="tel" value="" class="w465">
								<span>半角英数</span>
							</p>
						</div><!--- line 5 sô điện thoại  -->
						<div class="input_form">
							<label for="">FAX番号 <span class="require">※</span></label>
							<p>
								<input type="text" name="fax" id="fax" value="" class="w465">
								<span>半角英数</span>
							</p>
						</div><!--- line 6 số fax -->
						<div class="input_form">
							<label for="">メールアドレス <span class="require">※</span></label>
							<p>
								<input type="email" name="email" id="email" value="" class="w465">
								<span>半角英数</span>
							</p>
						</div><!--- line 7  Địa chi mail -->
						<div class="input" id="attachment_file">
 							<input id="upload_button" type="button" class="" value="図面添付" readonly/>
 							<input type="text" id="image_url" name="attachment_file" readonly/>
		                </div>
					</div><!--display Case1 -->
				</div>
				<!---   Genaral  -->
				<div class="content_selected"><div class="myself">
					<div id="nameplate">
						<div class="group_radio">
							<div>出展者バッジ</div>
							<div>
								<label>
									<input type="radio" name="nameplate" class="need" value="会期中のを追加する" />
									<span></span>会期中のを追加する
								</label>
							</div>
							<div>
								<input type="number" name="number_nameplate" value="" class="w95"/>
								<span></span><span class="unit_number">枚</span>
							</div>
							<div>
								<label>
									<input type="radio" name="nameplate" class="noneed" value="会期中のの追加なし" />
									<span></span>会期中のの追加なし<span class="red_txt">※追加をしない場合は1小間につき3枚支給</span>
								</label>
							</div>
						</div>
					</div>	<!-- =========== end table_name_card - Số bảng tên công ty ===================-->
					<div id="the_car">
						<div class="group_radio">
							<div>荷物運搬車</div>
							<div>
								<label>
									<input type="radio" name="car" class="choose1" value="車利用なし" />
									<span></span>車利用なし　
								</label>
							</div>
							<div>
								<label>
									<input type="radio" name="car" class="choose2" value="ホール内車進入無し（荷捌き場停め、搬入口より手運び）" />
									<span></span>ホール内車進入無し（荷捌き場停め、搬入口より手運び）
								</label>
							</div>
							<div>
								<label>
									<input type="radio" name="car" class="choose3" value="ホール内車進入有り（小間横停車、荷降ろし）" />
									<span></span>ホール内車進入有り（小間横停車、荷降ろし）
								</label>
							</div>
						</div><!-- end group radio 2  -->
						<div id="form_the_car">
							<div class="input_form qty_car">
								<label for="">台数　</label>
								<p>
									<input type="text" name="qty_car" id="qty_car" value="" class="w180">
									<span>車種</span><input type="text" name="model_car" id="model_car" value="" class="w180">
								</p>
							</div><!--- line 1-->
							<div class="input_form">
								<label for="">希望時間</label>
								<p>
									<span>搬入</span><input type="text" name="from_time" id="from_time" value="" class="w135">
									<span class="marginleft">搬出</span><input type="text" name="to_time" id="to_time" value="" class="w180">
								</p>
							</div><!--- line 2-->
							<!-- Add 2 more form (same item) 07-08-2017 -->
						
							<div class="input_form qty_car">
								<label for="">台数　</label>
								<p>
									<input type="text" name="qty_car2" id="qty_car2" value="" class="w180">
									<span>車種</span><input type="text" name="model_car2" id="model_car2" value="" class="w180">
								</p>
							</div><!--- line 1-->
							<div class="input_form">
								<label for="">希望時間</label>
								<p>
									<span>搬入</span><input type="text" name="from_time2" id="from_time2" value="" class="w135">
									<span class="marginleft">搬出</span><input type="text" name="to_time2" id="to_time2" value="" class="w180">
								</p>
							</div><!--- line 2-->
						
							<div class="input_form qty_car">
								<label for="">台数　</label>
								<p>
									<input type="text" name="qty_car3" id="qty_car3" value="" class="w180">
									<span>車種</span><input type="text" name="model_car3" id="model_car3" value="" class="w180">
								</p>
							</div><!--- line 1-->
							<div class="input_form">
								<label for="">希望時間</label>
								<p>
									<span>搬入</span><input type="text" name="from_time3" id="from_time3" value="" class="w135">
									<span class="marginleft">搬出</span><input type="text" name="to_time3" id="to_time3" value="" class="w180">
								</p>
							</div><!--- line 2-->
						
						<!-- End add -->
						</div>
						
					</div><!-- =======================  End the_car ===========================-->
					<div id="description">
						<div class="group_radio">
							<div class="roof">
								<div class="name_group">パラペット　</div>
								<div>
									<label>
										<input type="radio" name="roof" value="必要" />
										<span></span>必要
									</label>
								</div>
								<div>
									<label>
										<input type="radio" name="roof" value="不要" />
										<span></span>不要  <span class="red_txt">※1社につき1枚(角小間は2枚)</span>
									</label>
								</div>
							</div><!-- End first line  -->
							<div class="company_name_plate">
								<div class="name_group">社名版</div>
								<div>
									<label>
										<input type="radio" name="company_name_plate" class="need" value="必要" />
										<span></span>必要
									</label>
								</div>
								<div>
									<label>
										<input type="radio" name="company_name_plate" class="noneed" value="不要" />
										<span></span>不要  <span class="red_txt">※1社につき1枚(角小間は1枚)</span>　
									</label>
								</div>
							</div><!-- end second line  -->
						</div> <!-- group_radio-->
						<div class="input_form need_company_name_plate">
							<label for="">社名版表記</label>
							<p><input type="text" name="company_name_plate_reg" id="company_name_plate_reg" value="" class="w250"><br><span>※株式会社当の法人表記は省略させていただきます。　自体はゴシック体・スミ文字とします。</span></p>
						</div><!--- line 1-->
						
						
						<div class="group_radio table_chair">
							<div class="table">
								<div class="name_group">テーブル　</div>
								<div>
									<label>
										<input type="radio" name="table" class="need" value="必要" />
										<span></span>必要 
									</label>
								</div>
								<div>
									<label>
										<input type="radio" name="table" class="noneed" value="不要" />
										<span></span>不要 <span class="red_txt">※1小間につき1台</span>
									</label>
								</div>
							</div><!-- End first line  -->
	
							<div class="chair">
								<div class="name_group">折りたたみイス</div>
								<div>
									<label>
										<input type="radio" name="chair" class="need" value="必要" />
										<span></span>必要
									</label>
								</div>
								<div>
									<label>
										<input type="radio" name="chair" class="noneed" value="不要" />
										<span></span>不要 <span class="red_txt">※1小間につき2脚</span>
									</label>
								</div>
							</div><!-- end second line  -->
						</div>
					</div><!-- ==========================  End Description  =========================== -->
				
					<div id="wrap_electrical_construction">
						<div class="electrical_construction">
							<div>電気工事申込み<br>小間内２次電気工事</div>
							<div>
								<label>
									<input type="radio" name="package_electrical" class="choose1" value="事務局指定業者に依頼" />
									<span></span>事務局指定業者に依頼　
								</label>
							</div>
							<div>
								<label>
									<input type="radio" name="package_electrical" class="choose2" value="自社で工事業者を手配する" />
									<span></span>自社で工事業者を手配する　
								</label>
							</div>
							<div>
								<label>
									<input type="radio" name="package_electrical" class="choose3" value="電気利用なし" />
									<span></span>電気利用なし　
								</label>
							</div>
						</div><!-- =================== end electrical_construction  ================-->
						<div class="content_selected content_electrical_construction">
							<div class="electrical_myself">
								<p>事務局指定業者以外に依頼するを選択した場合、下記のご記入をお願いします</p>
								<div class="input_form">
									<label for="">施工業者</label>
									<p><input type="text" name="name_company_supplier2" id="name_company_supplier2" value="" class="w465"></p>
								</div><!--- line 1 nhà thầu-->
								<div class="input_form">
									<label for="">郵便番号</label>
									<p>
										<input type="text" name="zip3" id="zip3" value="" class="w95">ー<input type="text" name="zip4" id="zip4" value="" class="w115" onKeyUp="AjaxZip3.zip2addr('zip3','zip4','address2','address2','');">
										<span>半角英数</span>
									</p>
								</div><!--- line 2 mã bưu điện-->
								<div class="input_form">
									<label for="">住所</label>
									<p><input type="text" name="address2" id="address2" value="" class="w465"></p>
								</div><!--- line 3 địa chỉ-->
								<div class="input_form">
									<label for="">担当者</label>
									<p><input type="text" name="person_in_change2" id="person_in_change2" value="" class="w465"></p>
								</div><!--- line 4 người phụ trách  -->
								<div class="input_form">
									<label for="">電話番号</label>
									<p>
										<input type="tel" name="tel2" id="tel2" value="" class="w465">
										<span>半角英数</span>
									</p>
								</div><!--- line 5 sô điện thoại  -->
								<div class="input_form">
									<label for="">FAX番号</label>
									<p>
										<input type="text" name="fax2" id="fax2"value="" class="w465">
										<span>半角英数</span>
									</p>
								</div><!--- line 6 số fax -->
								<div class="input_form">
									<label for="">メールアドレス</label>
									<p>
										<input type="email" name="email2" id="email2" value="" class="w465">
										<span>半角英数</span>
									</p>
								</div><!--- line 7  Địa chi mail -->
							</div><!--display Case2 -->
						</div><!-- ==================End Content Select child ==============-->
					</div><!--- End wrap_electrical_construction ---->
				

					<div class="group_radio group_radio_2">
						<div class="first_line">
							<div class="name_group">天井構造・バルーン届け出</div>
							<div>
								<label>
									<input type="radio" name="ceiling_structure" class="need" value="必要" />
									<span></span>必要
								</label>
							</div>
							<div>
								<label>
									<input type="radio" name="ceiling_structure" class="noneed" value="不要" />
									<span></span>不要
								</label>
							</div>
						</div><!-- End first line  -->
	
						<div class="second_line">
							<div class="name_group">危険物持込・裸火使用</div>
							<div>
								<label>
									<input type="radio" name="use_of_fire" class="need" value="必要" />
									<span></span>必要
								</label>
							</div>
							<div>
								<label>
									<input type="radio" name="use_of_fire" class="noneed" value="不要" />
									<span></span>不要
								</label>
							</div>
						</div><!-- end second line  -->
						<div class="third_line">
							<div class="name_group">給排水・ガス・エアー工事</div>
							<div>
								<label>
									<input type="radio" name="drainage_construction" class="styled" value="必要" />
									<span></span>必要
								</label>
							</div>
							<div>
								<label>
									<input type="radio" name="drainage_construction" class="styled" value="不要" />
									<span></span>不要
								</label>
							</div>
						</div><!-- end second line  -->
						<div class="four_line">
							<div class="name_group">アンカー打設作業承認</div>
							<div>
								<label>
									<input type="radio" name="anchor_construction" class="styled" value="必要" />
									<span></span>必要
								</label>
							</div>
							<div>
								<label>
									<input type="radio" name="anchor_construction" class="styled" value="不要" />
									<span></span>不要
								</label>
							</div>
						</div><!-- end second line  -->
					</div>

					<div id="billing_construction_fee">
						<div class="group_radio method_payment">
							<div>請求先確認</div>
							<div>
								<label>
									<input type="radio" name="payment" class="transfer_bank" value="銀行振込" />
									<span></span>銀行振込
								</label>
							</div>
							<div>
								<label>
									<input type="radio" name="payment" class="cash" value="会期中に現金で支払う" />
									<span></span>会期中に現金で支払う
								</label>
							</div>
						</div>
					</div>
				</div></div>
				<input name="submit_choose_myself" id="submit_choose_myself" value="確　定" readonly />
	</form>
	</ div><!-- end Basic Application  -->
	</div><!-- end Dashboard  -->
	<script src="<?php echo plugins_url('exhibitors-application/js/validate.js'); ?>"></script>

<script type="text/javascript">
jQuery(document).ready(function($){

  var mediaUploader;

  $('#upload_button').click(function(e) {
    e.preventDefault();
    // If the uploader object has already been created, reopen the dialog
      if (mediaUploader) {
      mediaUploader.open();
      return;
    }
    // Extend the wp.media object
    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose Image',
      button: {
      text: 'Choose Image'
    }, multiple: false });

    // When a file is selected, grab the URL and set it as the text field's value
    mediaUploader.on('select', function() {
      attachment = mediaUploader.state().get('selection').first().toJSON();
      $('#image_url').val(attachment.url);
    });
    // Open the uploader dialog
    mediaUploader.open();
  });

});
</script>











