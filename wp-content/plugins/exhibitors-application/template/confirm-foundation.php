<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('exhibitors-application/css/style.css'); ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div id="confirm_foundation">
	<div class="top_content">
		<h1>出展基礎・工事（基礎工事）</h1>
		<h2>お申込み内容確認</h2>
		<p class="top_confirm">以下のお申込み内容でよろしければ、「申込む」ボタンをクリックしてください。<br>お申込みと同時にご担当者様宛に、お申込み内容確認メールを送信いたします。</p>
	</div>
	
	<form class="confirm_foundation" action="" method="post">
		<?php if(get_val_foundation('package')=="パッケージブースを申し込む"):?>
			<div class="block_content info_constract">
				<div class="input_form">
					<label for="">装飾業者指定<br>ブース内装飾施工</label>
					<div class="input">
						<p><?php echo get_val_foundation('package');?></p>
					</div>
				</div><!-- end input_form 1-->
				<div class="input_form">
					<label for="">パッケージ申込み小間数</label>
					<div class="input">
						<p><?php echo get_val_foundation('qty_booth');?></p>
					</div>
				</div><!-- end input_form 2-->
				<div class="input_form">
					<label for="">カーペット色</label>
					<div class="input">
						<p><?php echo get_val_foundation('carpet_color');?></p>
					</div>
				</div><!-- end input_form 3-->
				<div class="input_form">
					<label for="">Price Package</label>
					<div class="input">
						<p>
						<?php 
							if(get_val_foundation('qty_booth')==1){
								echo "¥53,000";
							}
							if(get_val_foundation('qty_booth')==2){
								echo "¥94,000";
							}
							if(get_val_foundation('qty_booth')==3){
								echo "¥147,000"; 
							}
						?>
						</p>
					</div>
				</div><!-- end input_form 4-->
			</div>
		<?php endif; ?>
		
		<?php 
		if( get_val_foundation('package')=="事務局指定業者以外に依頼する"):?>
		<div class="block_content info_constract">
			<div class="input_form">
				<label for="">装飾業者指定<br>ブース内装飾施工</label>
				<div class="input">
					<p><?php echo get_val_foundation('package');?></p>
				</div>
			</div><!-- end input_form 1-->
			<div class="input_form">
				<label for="">施工業者</label>
				<div class="input group_name">
					<p><?php echo get_val_foundation('name_company_supplier');?></p>
				</div>
			</div><!-- end input_form 2-->
			<div class="input_form">
				<label for="">郵便番号 </label>
				<div class="input">
					<p><?php echo get_val_foundation('zip1');?><?php echo get_val_foundation('zip2');?></p>
				</div>
			</div><!-- end input_form 3-->
			<div class="input_form">
				<label for="">住所 </label>
				<div class="input">
					<p><?php echo get_val_foundation('address');?></p>
				</div>
			</div><!-- end input_form 4-->
			<div class="input_form">
				<label for="">担当者</label>
				<div class="input">
					<p><?php echo get_val_foundation('person_in_change');?></p>
				</div>
			</div><!-- end input_form 5-->
			<div class="input_form">
				<label for="">電話番号</label>
				<div class="input">
					<p><?php echo get_val_foundation('tel');?></p>
				</div>
			</div><!-- end input_form 6-->
			<div class="input_form">
				<label for="">FAX番号</label>
				<div class="input">
					<p><?php echo get_val_foundation('fax');?></p>
				</div>
			</div><!-- end input_form 7-->
			<div class="input_form">
				<label for="">メールアドレス </label>
				<div class="input">
					<p><?php echo get_val_foundation('email');?></p>
				</div>
			</div><!-- end input_form 8-->
		</div>
		<!--file đính kèm  -->
		<div class="block_content attachment_file">
			<div class="input_form">
				<label for="">図面添付 </label>
				<div class="input">
					<p>
						<?php 
						echo get_val_foundation('attachment_file');
						?>
					</p>
				</div>
			</div><!-- end input_form 10-->
		</div>
		<?php endif; ?>
	<?php if(( get_val_foundation('package')=="施工業者無し")||( get_val_foundation('package')=="事務局指定業者に依頼する（トーガシ）")):?>
		<div class="block_content info_constract">
				<div class="input_form">
					<label for="">装飾業者指定<br>ブース内装飾施工</label>
					<div class="input">
						<p><?php echo get_val_foundation('package');?></p>
					</div>
				</div><!-- end input_form 1-->
		</div>
	<?php endif;?>

		<!--  Name Template - add 21-07-2017  -->
		<div class="block_content">
			<div class="input_form">
				<label for="">出展者バッジ </label>
				<div class="input ">
					<p>
						<?php echo get_val_foundation('nameplate');?>
						<span style="margin-left:30px">
							<?php if(get_val_foundation('nameplate')=='会期中のを追加する'):
								echo get_val_foundation('number_nameplate').'枚';
							endif;?>
						</span>
					</p>
				</div>
			</div><!-- end input_form 10-->
		</div>
		<!--  End nameplate -number_nameplate  -->
		
		<!--  Roof -Company name plate - Table/Chair  -->
		<div class="block_content">
			<div class="input_form">
				<label for="">荷物運搬車 </label>
				<div class="input input_collapse">
					<div><?php echo get_val_foundation('car');?></div>
					<div><p><?php echo get_val_foundation('qty_car');?></p><p><?php echo get_val_foundation('model_car');?></p></div>
					<div><p><?php echo get_val_foundation('from_time');?></p><p><?php echo get_val_foundation('to_time');?></p></div>
					<!-- Add 2 more form (same item)-->
					<div><p><?php echo get_val_foundation('qty_car2');?></p><p><?php echo get_val_foundation('model_car2');?></p></div>
					<div><p><?php echo get_val_foundation('from_time2');?></p><p><?php echo get_val_foundation('to_time2');?></p></div>

					<div><p><?php echo get_val_foundation('qty_car3');?></p><p><?php echo get_val_foundation('model_car3');?></p></div>
					<div><p><?php echo get_val_foundation('from_time3');?></p><p><?php echo get_val_foundation('to_time3');?></p></div>
					<!-- End add -->
				</div>
			</div><!-- end input_form 10-->
			<div class="input_form">
				<label for="">パラペット </label>
				<div class="input">
					<p><?php echo get_val_foundation('roof');?></p>
				</div>
			</div><!-- end input_form 10-->
			<div class="input_form col4">
				<label for="">社名版 </label>
				<div class="input input1">
					<p><?php echo get_val_foundation('company_name_plate');?></p>
				</div>
				<label class="label2" for="">社名版表記 </label>
				<div class="input input2">
					<p>
						<?php echo get_val_foundation('company_name_plate_reg');?>
					</p>
				</div>
			</div><!-- end input_form 7-->
			 <div class="input_form col4">
				<label for="">テーブル </label>
				<div class="input input1">
					<p><?php echo get_val_foundation('table');?></p>
				</div>
				<label class="label2" for="">折りたたみイス </label>
				<div class="input input2">
					<p><?php echo get_val_foundation('chair');?></p>
				</div>
			</div><!-- end input_form 8-->
		</div>
		<!-- -->
		<div class="block_content electrical_construction">
			<div class="input_form">
				<label for="">電気工事申込み<br>小間内２次電気工事</label>
				<div class="input">
					<p><?php echo get_val_foundation('package_electrical');?></p>
				</div>
			</div><!-- end input_form 1-->
			<?php if(get_val_foundation('package_electrical')=="自社で工事業者を手配する"):?>
			<div class="input_form">
				<label for="">施工業者</label>
				<div class="input group_name">
					<p><?php echo get_val_foundation('name_company_supplier2');?></p>
				</div>
			</div><!-- end input_form 2-->
			<div class="input_form">
				<label for="">郵便番号 </label>
				<div class="input">
					<p><?php echo get_val_foundation('zip3');?><?php echo get_val_foundation('zip4');?></p>
				</div>
			</div><!-- end input_form 3-->
			<div class="input_form">
				<label for="">住所 </label>
				<div class="input">
					<p><?php echo get_val_foundation('address2');?></p>
				</div>
			</div><!-- end input_form 4-->
			<div class="input_form">
				<label for="">担当者</label>
				<div class="input">
					<p><?php echo get_val_foundation('person_in_change2');?></p>
				</div>
			</div><!-- end input_form 5-->
			<div class="input_form">
				<label for="">電話番号</label>
				<div class="input">
					<p><?php echo get_val_foundation('tel2');?></p>
				</div>
			</div><!-- end input_form 6-->
			<div class="input_form">
				<label for="">FAX番号</label>
				<div class="input">
					<p><?php echo get_val_foundation('fax2');?></p>
				</div>
			</div><!-- end input_form 7-->
			<div class="input_form">
				<label for="">メールアドレス </label>
				<div class="input">
					<p><?php echo get_val_foundation('email2');?></p>
				</div>
			</div><!-- end input_form 8-->
			<?php endif; ?>
		</div>
		<!--       group_radio group_radio_2     -->
		<div class="block_content label_w200">
			<div class="input_form">
				<label for="">天井構造・バルーン届け出</label>
				<div class="input">
					<p><?php echo get_val_foundation('ceiling_structure');?></p>
				</div>
			</div><!-- end input_form 1-->
			<div class="input_form">
				<label for="">危険物持込・裸火使用</label>
				<div class="input">
					<p><?php echo get_val_foundation('use_of_fire');?></p>
				</div>
			</div><!-- end input_form 2-->
			<div class="input_form">
				<label for="">給排水・ガス・エアー工事</label>
				<div class="input">
					<p><?php echo get_val_foundation('drainage_construction');?></p>
				</div>
			</div><!-- end input_form 3-->
			<div class="input_form">
				<label for="">アンカー打設作業承認</label>
				<div class="input">
					<p><?php echo get_val_foundation('anchor_construction');?></p>
				</div>
			</div><!-- end input_form 4-->
		</div>
		<!--  Billing Address    -->
		<div class="block_content label_w200">
			<div class="input_form">
				<label for="">請求先確認</label>
				<div class="input">
					<p><?php echo get_val_foundation('payment');?></p>
				</div>
			</div><!-- end input_form 1-->
		</div>
	
		<div class="button_form">
			<p><input id="back_form" value="修正する" onclick="history.back(-1)"></p>
			<p><input id="sent_form" type="submit" name="sent_form" value="申込む"></p>
		</div>
		
	</form>
</div><!-- end Confirm Foundation  -->