<div>
   <div style="width: 100%;max-width: 1000px;color: #34495e;margin:0 auto">
	<div>
		<h1 style="line-height: 32px;font-size: 18px;color: #34495e;text-indent: 15px;background-color: #f0f0f0;width: 100%;max-width: 1000px;border-bottom: 8px solid #8ca7d3;margin-bottom: 20px;">出展基礎・工事（基礎工事）</h1>
	</div>
	
	<form>
		<?php if(get_val_foundation('package')=="パッケージブースを申し込む"):?>
			<div style="width: 100%; overflow: hidden;margin: 0 auto 60px;">
				<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;" >
					<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6;"for="">装飾業者指定<br>ブース内装飾施工</label>
					<div style="display: table-cell;vertical-align: middle;width: 838px;text-indent: 47px;">
						<p><?php echo get_val_foundation('package');?></p>
					</div>
				</div><!-- end input_form 1-->
				<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;" >
					<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6;"for="">パッケージ申込み小間数</label>
					<div style="display: table-cell;vertical-align: middle;width: 838px;text-indent: 47px;">
						<p><?php echo get_val_foundation('qty_booth');?></p>
					</div>
				</div><!-- end input_form 2-->
				<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;" >
					<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6;"for="">カーペット色</label>
					<div style="display: table-cell;vertical-align: middle;width: 838px;text-indent: 47px;">
						<p><?php echo get_val_foundation('carpet_color');?></p>
					</div>
				</div><!-- end input_form 3-->
				<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;border-bottom: 2px solid #dee1e2;" >
					<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6;"for="">Price Package</label>
					<div style="display: table-cell;vertical-align: middle;width: 838px;text-indent: 47px;">
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
		<div style="width: 100%; overflow: hidden;margin: 0 auto 60px;">
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;" >
				<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6;" for="">装飾業者指定<br>ブース内装飾施工</label>
				<div style="display: table-cell;vertical-align: middle;width: 838px;text-indent: 47px;">
					<p><?php echo get_val_foundation('package');?></p>
				</div>
			</div><!-- end input_form 1-->
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;" >
				<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6;"for="">施工業者</label>
				<div style="display: table-cell;vertical-align: middle;width: 838px;text-indent: 47px;">
					<p><?php echo get_val_foundation('name_company_supplier');?></p>
				</div>
			</div><!-- end input_form 2-->
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;" >
				<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6;"for="">郵便番号 </label>
				<div style="display: table-cell;vertical-align: middle;width: 838px;text-indent: 47px;">
					<p><?php echo get_val_foundation('zip1');?><?php echo get_val_foundation('zip2');?></p>
				</div>
			</div><!-- end input_form 3-->
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;" >
				<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6;"for="">住所 </label>
				<div style="display: table-cell;vertical-align: middle;width: 838px;text-indent: 47px;">
					<p><?php echo get_val_foundation('address');?></p>
				</div>
			</div><!-- end input_form 4-->
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;" >
				<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6;"for="">担当者</label>
				<div style="display: table-cell;vertical-align: middle;width: 838px;text-indent: 47px;">
					<p><?php echo get_val_foundation('person_in_change');?></p>
				</div>
			</div><!-- end input_form 5-->
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;" >
				<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6;" for="">電話番号</label>
				<div style="display: table-cell;vertical-align: middle;width: 838px;text-indent: 47px;">
					<p><?php echo get_val_foundation('tel');?></p>
				</div>
			</div><!-- end input_form 6-->
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;">
				<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6;" for="">FAX番号</label>
				<div style="display: table-cell;vertical-align: middle;width: 838px;text-indent: 47px;">
					<p><?php echo get_val_foundation('fax');?></p>
				</div>
			</div><!-- end input_form 7-->
			<div style="border-bottom: 2px solid #dee1e2;display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;overflow: hidden;" >
				<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6;" for="">メールアドレス </label>
				<div style="display: table-cell;vertical-align: middle;width: 838px;text-indent: 47px;">
					<p><?php echo get_val_foundation('email');?></p>
				</div>
			</div><!-- end input_form 8-->
		</div>
		<?php endif; ?>
		<?php if(( get_val_foundation('package')=="施工業者無し")||( get_val_foundation('package')=="事務局指定業者に依頼する（トーガシ）")):?>
			<div style="width: 100%; overflow: hidden;margin: 0 auto 60px;">
				<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;" >
					<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6;" for="">装飾業者指定<br>ブース内装飾施工</label>
					<div style="display: table-cell;vertical-align: middle;width: 838px;text-indent: 47px;">
						<p><?php echo get_val_foundation('package');?></p>
					</div>
				</div><!-- end input_form 1-->
			</div>
		<?php endif;?>
		
		<!--  Name Template - add 21-07-2017  -->
		<div style="width: 100%; overflow: hidden;margin: 0 auto 60px;">
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;overflow: hidden;border-bottom: 2px solid #dee1e2;" >
				<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6;" for="">出展者バッジ</label>
				<div style="display: table-cell;vertical-align: middle;width: 838px;text-indent: 47px;">
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
		<div style="width: 100%; overflow: hidden;margin: 0 auto 60px;">
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;">
				<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6;" for="">荷物運搬車 </label>
				<div style="display: table-cell;vertical-align: middle;width: 838px;text-indent: 47px;" >
					<div style="display:table;width:100%"><?php echo get_val_foundation('car');?></div>
					<div style="display:table;width:100%"><p style="width: 283px;vertical-align: middle;display: table-cell;"><?php echo get_val_foundation('qty_car');?></p><p style="vertical-align: middle;display: table-cell;"><?php echo get_val_foundation('model_car');?></p></div>
					<div style="display:table;width:100%"><p style="width: 283px;vertical-align: middle;display: table-cell;"><?php echo get_val_foundation('from_time');?></p><p style="vertical-align: middle;display: table-cell;"><?php echo get_val_foundation('to_time');?></p></div>
					<!-- Add 2 more form (same item)-->
					<div style="display:table;width:100%"><p style="width: 283px;vertical-align: middle;display: table-cell;"><?php echo get_val_foundation('qty_car2');?></p><p style="vertical-align: middle;display: table-cell;"><?php echo get_val_foundation('model_car2');?></p></div>
					<div style="display:table;width:100%"><p style="width: 283px;vertical-align: middle;display: table-cell;"><?php echo get_val_foundation('from_time2');?></p><p style="vertical-align: middle;display: table-cell;"><?php echo get_val_foundation('to_time2');?></p></div>

					<div style="display:table;width:100%"><p style="width: 283px;vertical-align: middle;display: table-cell;"><?php echo get_val_foundation('qty_car3');?></p><p style="vertical-align: middle;display: table-cell;"><?php echo get_val_foundation('model_car3');?></p></div>
					<div style="display:table;width:100%"><p style="width: 283px;vertical-align: middle;display: table-cell;"><?php echo get_val_foundation('from_time3');?></p><p style="vertical-align: middle;display: table-cell;"><?php echo get_val_foundation('to_time3');?></p></div>
					<!-- End add -->
				</div>
			</div><!-- end input_form 10-->
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;" >
				<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6;"for="">パラペット </label>
				<div style="display: table-cell;vertical-align: middle;width: 838px;text-indent: 47px;">
					<p><?php echo get_val_foundation('roof');?></p>
				</div>
			</div><!-- end input_form 10-->
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;" >
				<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6;"for="">社名版 </label>
				<div style="display: table-cell; vertical-align: middle;width: 383px;text-indent: 47px;">
					<p><?php echo get_val_foundation('company_name_plate');?></p>
				</div>
				<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6; text-indent:20px;" for="">社名版表記 </label>
				<div style="display: table-cell; vertical-align: middle;width: 295px;text-indent: 47px;">
					<p>
						<?php echo get_val_foundation('company_name_plate_reg');?>
					</p>
				</div>
			</div><!-- end input_form 7-->
			 <div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #dee1e2;overflow: hidden;" >
				<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6;" for="">テーブル </label>
				<div style="display: table-cell; vertical-align: middle;width: 383px;text-indent: 47px;">
					<p><?php echo get_val_foundation('table');?></p>
				</div>
				<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6; text-indent:20px;"  for="">折りたたみイス </label>
				<div style="display: table-cell; vertical-align: middle;width: 295px;text-indent: 47px;">
					<p><?php echo get_val_foundation('chair');?></p>
				</div>
			</div><!-- end input_form 8-->
		</div>
		<!-- -->
		<div style="width: 100%; overflow: hidden;margin: 0 auto 60px;">
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;" >
				<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6; text-indent:20px;" for="">電気工事申込み<br>小間内２次電気工事</label>
				<div style="display: table-cell;vertical-align: middle;width: 838px;text-indent: 47px;">
					<p><?php echo get_val_foundation('package_electrical');?></p>
				</div>
			</div><!-- end input_form 1-->
			<?php if(get_val_foundation('package_electrical')=="自社で工事業者を手配する"):?>
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;" >
				<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6; text-indent:20px;" for="">施工業者</label>
				<div style="display: table-cell;vertical-align: middle;width: 838px;text-indent: 47px;">
					<p><?php echo get_val_foundation('name_company_supplier2');?></p>
				</div>
			</div><!-- end input_form 2-->
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;" >
				<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6; text-indent:20px;" for="">郵便番号 </label>
				<div style="display: table-cell;vertical-align: middle;width: 838px;text-indent: 47px;">
					<p><?php echo get_val_foundation('zip3');?><?php echo get_val_foundation('zip4');?></p>
				</div>
			</div><!-- end input_form 3-->
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;" >
				<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6; text-indent:20px;" for="">住所 </label>
				<div style="display: table-cell;vertical-align: middle;width: 838px;text-indent: 47px;">
					<p><?php echo get_val_foundation('address2');?></p>
				</div>
			</div><!-- end input_form 4-->
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;" >
				<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6; text-indent:20px;" for="">担当者</label>
				<div style="display: table-cell;vertical-align: middle;width: 838px;text-indent: 47px;">
					<p><?php echo get_val_foundation('person_in_change2');?></p>
				</div>
			</div><!-- end input_form 5-->
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;" >
				<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6; text-indent:20px;" for="">電話番号</label>
				<div style="display: table-cell;vertical-align: middle;width: 838px;text-indent: 47px;">
					<p><?php echo get_val_foundation('tel2');?></p>
				</div>
			</div><!-- end input_form 6-->
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;" >
				<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6; text-indent:20px;" for="">FAX番号</label>
				<div style="display: table-cell;vertical-align: middle;width: 838px;text-indent: 47px;">
					<p><?php echo get_val_foundation('fax2');?></p>
				</div>
			</div><!-- end input_form 7-->
			<div style="border-bottom: 2px solid #dee1e2;display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;overflow: hidden;" >
				<label style="display: table-cell;vertical-align: middle;width: 150px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6; text-indent:20px;" for="">メールアドレス </label>
				<div style="display: table-cell;vertical-align: middle;width: 838px;text-indent: 47px;">
					<p><?php echo get_val_foundation('email2');?></p>
				</div>
			</div><!-- end input_form 8-->
			<?php endif; ?>
		</div>
		<!--       group_radio group_radio_2     -->
		<div style="width: 100%; overflow: hidden;margin: 0 auto 60px;">
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;" >
				<label style="display: table-cell;vertical-align: middle;width: 200px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6;" for="">天井構造・バルーン届け出</label>
				<div style="display: table-cell;vertical-align: middle;width: 798px;text-indent: 47px;">
					<p><?php echo get_val_foundation('ceiling_structure');?></p>
				</div>
			</div><!-- end input_form 1-->
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;" >
				<label style="display: table-cell;vertical-align: middle;width: 200px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6;" for="">危険物持込・裸火使用</label>
				<div style="display: table-cell;vertical-align: middle;width: 798px;text-indent: 47px;">
					<p><?php echo get_val_foundation('use_of_fire');?></p>
				</div>
			</div><!-- end input_form 2-->
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;" >
				<label style="display: table-cell;vertical-align: middle;width: 200px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6;" for="">給排水・ガス・エアー工事</label>
				<div style="display: table-cell;vertical-align: middle;width:798px;text-indent: 47px;">
					<p><?php echo get_val_foundation('drainage_construction');?></p>
				</div>
			</div><!-- end input_form 3-->
			<div style="border-bottom: 2px solid #dee1e2;display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;;overflow: hidden;" >
				<label style="display: table-cell;vertical-align: middle;width: 200px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6;" for="">アンカー打設作業承認</label>
				<div style="display: table-cell;vertical-align: middle;width: 798px;text-indent: 47px;">
					<p><?php echo get_val_foundation('anchor_construction');?></p>
				</div>
			</div><!-- end input_form 4-->
		</div>
		<!--  Billing Address    -->
		<div style="width: 100%; overflow: hidden;margin: 0 auto 60px;">
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2; border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;" >
				<label style="display: table-cell;vertical-align: middle;width: 200px;padding: 20px 0px 20px 10px;font-size: 14px;color: #34495e;background: #f5f6f6;" for="">請求先確認</label>
				<div style="display: table-cell;vertical-align: middle;width: 798px;text-indent: 47px;">
					<p><?php echo get_val_foundation('payment');?></p>
				</div>
			</div><!-- end input_form 1-->
			
		</div>
	</form>
</div><!-- end Confirm Foundation  -->
</div>