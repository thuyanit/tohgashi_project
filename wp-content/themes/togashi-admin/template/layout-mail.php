<div id="wrapper">
    <header style="width: 1000px; margin:32px auto 40px;">
        <p style="color:#34495e; font-size:14px;font-weight: bold;">賃貸住宅フェア2017への参加お申込みを受け付けました。 <br>管理者による承認後、管理画面ログイン情報を別途メールにてお 知らせ致します。 </p>
    </header>
    <div id="content" style="width: 1000px;margin:0 auto;">
		<div class="main_content">
			<form>
				<div class="info_company" style="width: 1000px; margin:0 auto 45px;">
					<div class="input_form" style="display: table; width: 998px;
					border-top:1px solid #dee1e2; border-left:1px solid #dee1e2; border-right:1px solid #dee1e2; border-bottom: 1px solid #fff; overflow: hidden;">
						<label for="" style="width: 160px; display: table-cell;vertical-align: middle;padding:20px 0px; text-indent: 20px; font-size: 14px; background:#f5f6f6;">会社名</label>
						<div class="input" style="display: table-cell;vertical-align: middle; text-indent: 47px; width: 838px;">
							<p style="color:#34495e; font-size:14px;"><?php echo get_val('company_name') ?></p>
						</div>
					</div><!-- end input_form 1-->
					<div class="input_form" style="display: table; width: 998px;
					border-top:1px solid #dee1e2; border-left:1px solid #dee1e2; border-right:1px solid #dee1e2; border-bottom: 1px solid #fff; overflow: hidden;">
						<label for="" style="width: 160px; display: table-cell;vertical-align: middle;padding:20px 0px; text-indent: 20px; font-size: 14px; background:#f5f6f6;">代表者 氏名</label>
						<div class="input group_name" style="display: table-cell;vertical-align: middle; text-indent: 47px; width: 838px;">
							<p style="color:#34495e; font-size:14px;"><?php echo get_val('family_name').' '.get_val('given_name') ?></p>
						</div>
					</div><!-- end input_form 2-->
					<div class="input_form" style="display: table; width: 998px;
					border-top:1px solid #dee1e2; border-left:1px solid #dee1e2; border-right:1px solid #dee1e2; border-bottom: 1px solid #fff; overflow: hidden;">
						<label for="" style="width: 160px; display: table-cell;vertical-align: middle;padding:20px 0px; text-indent: 20px; font-size: 14px; background:#f5f6f6;">出展社名 </label>
						<div class="input" style="display: table-cell;vertical-align: middle; text-indent: 47px; width: 838px;">
							<p style="color:#34495e; font-size:14px;"><?php echo get_val('exhibitors_name') ?></p>
						</div>
					</div><!-- end input_form 3-->
					<div class="input_form" style="display: table; width: 998px;
					border-top:1px solid #dee1e2; border-left:1px solid #dee1e2; border-right:1px solid #dee1e2; border-bottom: 1px solid #fff; overflow: hidden;">
						<label for="" style="width: 160px; display: table-cell;vertical-align: middle;padding:20px 0px; text-indent: 20px; font-size: 14px; background:#f5f6f6;">出展商品サービス名 </label>
						<div class="input" style="display: table-cell;vertical-align: middle; text-indent: 47px; width: 838px;">
							<p style="color:#34495e; font-size:14px;"><?php echo get_val('exhibition_service_name') ?></p>
						</div>
					</div><!-- end input_form 4-->
					<div class="input_form" style="display: table; width: 998px;
					border-top:1px solid #dee1e2; border-left:1px solid #dee1e2; border-right:1px solid #dee1e2; border-bottom: 1px solid #fff; overflow: hidden;">
						<label for="" style="width: 160px; display: table-cell;vertical-align: middle;padding:20px 0px; text-indent: 20px; font-size: 14px; background:#f5f6f6;">ご担当者名</label>
						<div class="input" style="display: table-cell;vertical-align: middle; text-indent: 47px; width: 838px;">
							<p  style="color:#34495e; font-size:14px;" class="w315"><?php echo get_val('person_in_charge') ?></p>
						</div>
					</div><!-- end input_form 5-->
					<div class="input_form" style="display: table; width: 998px;
					border-top:1px solid #dee1e2; border-left:1px solid #dee1e2; border-right:1px solid #dee1e2; border-bottom: 1px solid #fff; overflow: hidden;">
						<label for="" style="width: 160px; display: table-cell;vertical-align: middle;padding:20px 0px; text-indent: 20px; font-size: 14px; background:#f5f6f6;">ご担当者 部署</label>
						<div class="input" style="display: table-cell;vertical-align: middle; text-indent: 47px; width: 838px;">
							<p style="color:#34495e; font-size:14px;" class="w315"><?php echo get_val('position') ?></p>
						</div>
					</div><!-- end input_form 6-->
					<div class="input_form col4" style="display: table; width: 998px;
					border-top:1px solid #dee1e2; border-left:1px solid #dee1e2; border-right:1px solid #dee1e2; border-bottom: 1px solid #fff; overflow: hidden;">
						<label for="" style="width: 160px; display: table-cell;vertical-align: middle;padding:20px 0px; text-indent: 20px; font-size: 14px; background:#f5f6f6;">郵便番号 </label>
						<div class="input input1" style="width:383px;display:table-cell; vertical-align: middle; text-indent: 47px;">
							<p style="color:#34495e; font-size:14px;" class="w95"><?php echo get_val('zipcode1').''.get_val('zipcode2') ?></p>
						</div>
						<label class="label2" for="" style="width: 160px; font-size: 14px; background:#f5f6f6; padding:20px 0; display: table-cell;vertical-align: middle; text-indent: 20px">都道府県 </label>
						<div class="input input2" style="width: 295px; display: table-cell; vertical-align: middle; text-indent: 47px;">
							<p style="color:#34495e; font-size:14px;"><?php echo get_val('prefectures') ?></p>
						</div>
					</div><!-- end input_form 7-->
					<div class="input_form col4" style="display: table; width: 998px;
					border-top:1px solid #dee1e2; border-left:1px solid #dee1e2; border-right:1px solid #dee1e2; border-bottom: 1px solid #fff; overflow: hidden;">
						<label for="" style="width: 160px; display: table-cell;vertical-align: middle;padding:20px 0px; text-indent: 20px; font-size: 14px; background:#f5f6f6;">市区 </label>
						<div class="input input1" style="width:383px;display:table-cell; vertical-align: middle; text-indent: 47px;">
							<p style="color:#34495e; font-size:14px;" ><?php echo get_val('city') ?></p>
						</div>
						<label class="label2" for="" style="width: 160px; font-size: 14px; background:#f5f6f6; padding:20px 0; display: table-cell;vertical-align: middle; text-indent: 20px">町村番地 </label>
						<div class="input input2" style="width: 295px; display: table-cell; vertical-align: middle; text-indent: 47px;">
							<p style="color:#34495e; font-size:14px;"><?php echo get_val('address') ?></p>
						</div>
					</div><!-- end input_form 8-->
					<div class="input_form" style="display: table; width: 998px;
					border-top:1px solid #dee1e2; border-left:1px solid #dee1e2; border-right:1px solid #dee1e2; border-bottom: 1px solid #fff; overflow: hidden;">
						<label for="" style="width: 160px; display: table-cell;vertical-align: middle;padding:20px 0px; text-indent: 20px; font-size: 14px; background:#f5f6f6;">ビル・マンション名</label>
						<div class="input" style="display: table-cell;vertical-align: middle; text-indent: 47px; width: 838px;">
							<p style="color:#34495e; font-size:14px;"><?php echo get_val('building_name') ?></p>
						</div>
					</div><!-- end input_form 9-->
					<div class="input_form" style="display: table; width: 998px;
					border-top:1px solid #dee1e2; border-left:1px solid #dee1e2; border-right:1px solid #dee1e2; border-bottom: 1px solid #fff; overflow: hidden;">
						<label for="" style="width: 160px; display: table-cell;vertical-align: middle;padding:20px 0px; text-indent: 20px; font-size: 14px; background:#f5f6f6;">電話番号 </label>
						<div class="input" style="display: table-cell;vertical-align: middle; text-indent: 47px; width: 838px;">
							<p style="color:#34495e; font-size:14px;"><?php echo get_val('tel') ?></p>
						</div>
					</div><!-- end input_form 10-->
					<div class="input_form" style="display: table; width: 998px;
					border-top:1px solid #dee1e2; border-left:1px solid #dee1e2; border-right:1px solid #dee1e2; border-bottom: 1px solid #fff; overflow: hidden;">
						<label for="" style="width: 160px; display: table-cell;vertical-align: middle;padding:20px 0px; text-indent: 20px; font-size: 14px; background:#f5f6f6;">Fax番号 </label>
						<div class="input" style="display: table-cell;vertical-align: middle; text-indent: 47px; width: 838px;">
							<p style="color:#34495e; font-size:14px;"><?php echo get_val('fax') ?></p>
						</div>
					</div><!-- end input_form 11-->
					<div class="input_form" style="display: table; width: 998px;
					border-top:1px solid #dee1e2; border-left:1px solid #dee1e2; border-right:1px solid #dee1e2; border-bottom: 1px solid #fff; overflow: hidden;">
						<label for="" style="width: 160px; display: table-cell;vertical-align: middle;padding:20px 0px; text-indent: 20px; font-size: 14px; background:#f5f6f6;">E-mail </label>
						<div class="input" style="display: table-cell;vertical-align: middle; text-indent: 47px; width: 838px;">
							<p style="color:#34495e; font-size:14px;"><?php echo get_val('email') ?></p>
						</div>
					</div><!-- end input_form 12-->
					<div class="input_form" style="display: table; width: 998px;
					border-top:1px solid #dee1e2; border-left:1px solid #dee1e2; border-right:1px solid #dee1e2; border-bottom: 1px solid #fff; overflow: hidden;">
						<label for="" style="width: 160px; display: table-cell;vertical-align: middle;padding:20px 0px; text-indent: 20px; font-size: 14px; background:#f5f6f6;">公式サイト掲載URL</label>
						<div class="input" style="display: table-cell;vertical-align: middle; text-indent: 47px; width: 838px;">
							<p style="color:#34495e; font-size:14px;"><?php echo get_val('url') ?></p>
						</div>
					</div><!-- end input_form 13-->
					<div class="input_form" style="display: table; width: 998px;
					border-top:1px solid #dee1e2; border-left:1px solid #dee1e2; border-right:1px solid #dee1e2; border-bottom: 2px solid #dee1e2; overflow: hidden;">
						<label for="" style="width: 160px; display: table-cell;vertical-align: middle;padding:20px 0px; text-indent: 20px; font-size: 14px; background:#f5f6f6;">緊急連絡先 </label>
						<div class="input" style="display: table-cell;vertical-align: middle; text-indent: 47px; width: 838px;">
							<p style="color:#34495e; font-size:14px;"><?php echo get_val('emergency_tel') ?></p>
						</div>
					</div><!-- end input_form 14-->
				</div>
				<!-- Selected Location -->
				<div class="selected_location" style="width: 1000px; margin:0 auto">
					<?php //if( !empty($data['catalogue'][1]['sophong']) ): ?> <!-- Commert 09-08-2017 beccause don't must be input number of booths -->
					<?php if((!empty($data['catalogue'][1]['check1']) )||(!empty($data['catalogue'][1]['check2']) )):?><!-- Add check -->
					<div style="margin: 0 0 10px; border: 1px solid #dee1e2;  display: table; width: 100%; background-color:#f5f6f6;">
						<div style=" width: 272px; height:auto; display: table-cell; vertical-align: middle;"><h4 style="padding:0 0 0 16px; margin:0; vertical-align: middle;font-size: 16px; font-weight: bold; color: #34495e;">九州会場　5/17（水）・18（木）</h4></div>
						<div style="width: 728px; height:auto; display: table-cell; background:#fff;">
							<div style="padding:0 24px; border-bottom: 1px solid #dee1e2; margin:0;">
								<ul style="list-style-type: none; margin:0; padding:0;">
									<li style="display: block; padding:16px 0; margin:0; list-style-type: none;">
										<div class="title" style=" width: 200px; display: table-cell; font-size: 14px; color: #34495e; padding-left: 72px; vertical-align: middle;">出展小間数</div>
										<div class="show_booths" style="width:408px; display: table-cell; vertical-align: middle;">
											<p style="padding:2px 0;">
												<span class="show_title" style="width:100px; display: inline-block; font-size: 12px; color: #34495e">出展料金</span>
												<span style="font-size:12px; color:#34495e;">22万円 <span style="font-size:10px; margin-left:5px;">（税抜）</span></span>
											</p>
											<p style="padding:2px 0;">
												<span style=" width: 100px; display: inline-block; font-size: 14px; color:#34495e; font-weight:bold;">出展希望</span>
												<span style="font-size:14px; font-weight: bold; color:#34495e;"><?php if(isset($data['catalogue'][1]['sophong'])) echo $data['catalogue'][1]['sophong']; ?>　小間</span>
											</p>
										</div>
									</li>
									<li style="display: block; padding:16px 0; margin:0; list-style-type: none; border-top:1px solid #dee1e2;">
										<div class="title" style=" width: 200px; display: table-cell; font-size: 14px; color: #34495e; padding-left: 72px; vertical-align: middle;">出展品目</div>
										<div class="show_booths" style="width:408px; display: table-cell; vertical-align: middle;">
											<p style="padding:2px 0;">
												<span style=" width: 100px; display: inline-block; font-size: 14px; font-weight: bold; color:#34495e;">カタログ</span>
												<?php if(isset($data['catalogue'][1]['check1'])): ?>
												<span style="font-size:14px; font-weight: bold; color:#34495e;">30,000 円 <span style="font-size:10px; margin-left:5px;">（税抜）</span>
												<?php endif; ?>
												<?php if(isset($data['catalogue'][1]['check2'])): ?>
												<span style="font-size:14px; font-weight: bold; color:#34495e;">50,000 円 <span style="font-size:10px; margin-left:5px;">（税抜）</span>
												<?php endif; ?>
											</p>
										</div>
									</li>
								</ul>									
							</div>
							<?php 
								$Tsophong = $data['catalogue'][1]['sophong'];
								$Tgiaphong1 = $data['catalogue'][1]['check1'];
								$Tgiaphong2 = $data['catalogue'][1]['check2'];
								$Total = $data['catalogue'][1]['sophong'] * '220000' + ($Tgiaphong1 + $Tgiaphong2);									
							?>
							<div class="content_total">
								<div class="total_title" style="width:200px; display: table-cell;font-size: 14px; color: #34495e; padding-left: 96px; vertical-align: middle;">合計金額</div>
								<div class="total_content" style="width:456px; display: table-cell; vertical-align: middle; font-size: 24px; color: #e74c3c; text-indent: 12px; padding:24px 0; font-weight: bold;"><?php echo number_format($Total); ?> 円 <span style="color:#34495e; font-size: 12px; text-indent: 12px;">（税抜）</span></div>
							</div>
						</div>
					</div>
					<?php //endif; ?><?php endif; //end add ?>
					<?php //if( !empty($data['catalogue'][2]['sophong']) ): ?> <!-- Commert 09-08-2017 beccause don't must be input number of booths -->
					<?php if((!empty($data['catalogue'][2]['check1']) )||(!empty($data['catalogue'][2]['check2']) )):?><!-- Add check -->
					<div style="margin: 0 0 10px; border: 1px solid #dee1e2; display: table; width: 100%; background-color:#f5f6f6;">
						<div style=" width: 272px; height:auto; display: table-cell; vertical-align: middle;"><h4 style="padding:0 0 0 16px; margin:0; vertical-align: middle;font-size: 16px; font-weight: bold; color: #34495e;">東京会場　7/25（火）・26（水）</h4></div>
						<div style="width: 728px; height:auto; display: table-cell; background:#fff;">
							<div style="padding:0 24px; border-bottom: 1px solid #dee1e2; margin:0;">
								<ul style="list-style-type: none; margin:0; padding:0;">
									<li style="display: block; padding:16px 0; margin:0; list-style-type: none;">
										<div class="title" style=" width: 200px; display: table-cell; font-size: 14px; color: #34495e; padding-left: 72px; vertical-align: middle;">出展小間数</div>
										<div class="show_booths" style="width:408px; display: table-cell; vertical-align: middle;">
											<p style="padding:2px 0;">
												<span class="show_title" style="width:100px; display: inline-block; font-size: 12px; color: #34495e">出展料金</span>
												<span style="font-size:12px; color:#34495e;">22万円 <span style="font-size:10px; margin-left:5px;">（税抜）</span></span>
											</p>
											<p style="padding:2px 0;">
												<span style=" width: 100px; display: inline-block; font-size: 14px; color:#34495e; font-weight:bold;">出展希望</span>
												<span style="font-size:14px; font-weight: bold; color:#34495e;"><?php if(isset($data['catalogue'][2]['sophong'])) echo $data['catalogue'][2]['sophong']; ?>　小間</span>
											</p>
										</div>
									</li>
									<li style="display: block; padding:16px 0; margin:0; list-style-type: none; border-top:1px solid #dee1e2;">
										<div class="title" style=" width: 200px; display: table-cell; font-size: 14px; color: #34495e; padding-left: 72px; vertical-align: middle;">出展品目</div>
										<div class="show_booths" style="width:408px; display: table-cell; vertical-align: middle;">
											<p style="padding:2px 0;">
												<span style=" width: 100px; display: inline-block; font-size: 14px; font-weight: bold; color:#34495e;">カタログ</span>
												<?php if(isset($data['catalogue'][2]['check1'])): ?>
												<span style="font-size:14px; font-weight: bold; color:#34495e;">30,000 円 <span style="font-size:10px; margin-left:5px;">（税抜）</span>
												<?php endif; ?>
												<?php if(isset($data['catalogue'][2]['check2'])): ?>
												<span style="font-size:14px; font-weight: bold; color:#34495e;">50,000 円 <span style="font-size:10px; margin-left:5px;">（税抜）</span>
												<?php endif; ?>
											</p>
										</div>
									</li>
								</ul>									
							</div>
							<?php 
								$Tsophong = $data['catalogue'][2]['sophong'];
								$Tgiaphong1 = $data['catalogue'][2]['check1'];
								$Tgiaphong2 = $data['catalogue'][2]['check2'];
								$Total = $data['catalogue'][2]['sophong'] * '220000' + ($Tgiaphong1 + $Tgiaphong2);									
							?>
							<div class="content_total">
								<div class="total_title" style="width:200px; display: table-cell;font-size: 14px; color: #34495e; padding-left: 96px; vertical-align: middle;">合計金額</div>
								<div class="total_content" style="width:456px; display: table-cell; vertical-align: middle; font-size: 24px; color: #e74c3c; text-indent: 12px; padding:24px 0; font-weight: bold;"><?php echo number_format($Total); ?> 円 <span style="color:#34495e; font-size: 12px; text-indent: 12px;">（税抜）</span></div>
							</div>
						</div>
					</div>
					<?php //endif; ?><?php endif; //end add ?>

					<?php //if( !empty($data['catalogue'][3]['sophong']) ): ?> <!-- Commert 09-08-2017 beccause don't must be input number of booths -->
					<?php if((!empty($data['catalogue'][3]['check1']) )||(!empty($data['catalogue'][3]['check2']) )):?><!-- Add check -->
					<div style="margin: 0 0 10px; border: 1px solid #dee1e2; display: table; width: 100%;  background-color:#f5f6f6;">
						<div style=" width: 272px; height:auto; display: table-cell; vertical-align: middle;"><h4 style="padding:0 0 0 16px; margin:0; vertical-align: middle;font-size: 16px; font-weight: bold; color: #34495e;">大阪会場　9/29（金）・30（土）</h4></div>
						<div style="width: 728px; height:auto; display: table-cell; background:#fff;">
							<div style="padding:0 24px; border-bottom: 1px solid #dee1e2; margin:0;">
								<ul style="list-style-type: none; margin:0; padding:0;">
									<li style="display: block; padding:16px 0; margin:0; list-style-type: none;">
										<div class="title" style=" width: 200px; display: table-cell; font-size: 14px; color: #34495e; padding-left: 72px; vertical-align: middle;">出展小間数</div>
										<div class="show_booths" style="width:408px; display: table-cell; vertical-align: middle;">
											<p style="padding:2px 0;">
												<span class="show_title" style="width:100px; display: inline-block; font-size: 12px; color: #34495e">出展料金</span>
												<span style="font-size:12px; color:#34495e;">22万円 <span style="font-size:10px; margin-left:5px;">（税抜）</span></span>
											</p>
											<p style="padding:2px 0;">
												<span style=" width: 100px; display: inline-block; font-size: 14px; color:#34495e; font-weight:bold;">出展希望</span>
												<span style="font-size:14px; font-weight: bold; color:#34495e;"><?php if(isset($data['catalogue'][3]['sophong'])) echo $data['catalogue'][3]['sophong']; ?>　小間</span>
											</p>
										</div>
									</li>
									<li style="display: block; padding:16px 0; margin:0; list-style-type: none; border-top:1px solid #dee1e2;">
										<div class="title" style=" width: 200px; display: table-cell; font-size: 14px; color: #34495e; padding-left: 72px; vertical-align: middle;">出展品目</div>
										<div class="show_booths" style="width:408px; display: table-cell; vertical-align: middle;">
											<p style="padding:2px 0;">
												<span style=" width: 100px; display: inline-block; font-size: 14px; font-weight: bold; color:#34495e;">カタログ</span>
												<?php if(isset($data['catalogue'][3]['check1'])): ?>
												<span style="font-size:14px; font-weight: bold; color:#34495e;">30,000 円 <span style="font-size:10px; margin-left:5px;">（税抜）</span>
												<?php endif; ?>
												<?php if(isset($data['catalogue'][3]['check2'])): ?>
												<span style="font-size:14px; font-weight: bold; color:#34495e;">50,000 円 <span style="font-size:10px; margin-left:5px;">（税抜）</span>
												<?php endif; ?>
											</p>
										</div>
									</li>
								</ul>									
							</div>
							<?php 
								$Tsophong = $data['catalogue'][3]['sophong'];
								$Tgiaphong1 = $data['catalogue'][3]['check1'];
								$Tgiaphong2 = $data['catalogue'][3]['check2'];
								$Total = $data['catalogue'][3]['sophong'] * '220000' + ($Tgiaphong1 + $Tgiaphong2);									
							?>
							<div class="content_total">
								<div class="total_title" style="width:200px; display: table-cell;font-size: 14px; color: #34495e; padding-left: 96px; vertical-align: middle;">合計金額</div>
								<div class="total_content" style="width:456px; display: table-cell; vertical-align: middle; font-size: 24px; color: #e74c3c; text-indent: 12px; padding:24px 0; font-weight: bold;"><?php echo number_format($Total); ?> 円 <span style="color:#34495e; font-size: 12px; text-indent: 12px;">（税抜）</span></div>
							</div>
						</div>
					</div>
					<?php //endif; ?><?php endif; //End add?>

					<?php //if( !empty($data['catalogue'][4]['sophong']) ): ?> <!-- Commert 09-08-2017 beccause don't must be input number of booths -->
					<?php if((!empty($data['catalogue'][4]['check1']) )||(!empty($data['catalogue'][4]['check2']) )):?><!-- Add check -->
					<div style="margin: 0 0 10px; border: 1px solid #dee1e2; display: table; width: 100%; background-color:#f5f6f6;">
						<div style=" width: 272px; height:auto; display: table-cell; vertical-align: middle;"><h4 style="padding:0 0 0 16px; margin:0; vertical-align: middle;font-size: 16px; font-weight: bold; color: #34495e;">名古屋会場　11/7（火）・8（水</h4></div>
						<div style="width: 728px; height:auto; display: table-cell; background:#fff;">
							<div style="padding:0 24px; border-bottom: 1px solid #dee1e2; margin:0;">
								<ul style="list-style-type: none; margin:0; padding:0;">
									<li style="display: block; padding:16px 0; margin:0; list-style-type: none;">
										<div class="title" style=" width: 200px; display: table-cell; font-size: 14px; color: #34495e; padding-left: 72px; vertical-align: middle;">出展小間数</div>
										<div class="show_booths" style="width:408px; display: table-cell; vertical-align: middle;">
											<p style="padding:2px 0;">
												<span class="show_title" style="width:100px; display: inline-block; font-size: 12px; color: #34495e">出展料金</span>
												<span style="font-size:12px; color:#34495e;">22万円 <span style="font-size:10px; margin-left:5px;">（税抜）</span></span>
											</p>
											<p style="padding:2px 0;">
												<span style=" width: 100px; display: inline-block; font-size: 14px; color:#34495e; font-weight:bold;">出展希望</span>
												<span style="font-size:14px; font-weight: bold; color:#34495e;"><?php if(isset($data['catalogue'][4]['sophong'])) echo $data['catalogue'][4]['sophong']; ?>小間</span>
											</p>
										</div>
									</li>
									<li style="display: block; padding:16px 0; margin:0; list-style-type: none; border-top:1px solid #dee1e2;">
										<div class="title" style=" width: 200px; display: table-cell; font-size: 14px; color: #34495e; padding-left: 72px; vertical-align: middle;">出展品目</div>
										<div class="show_booths" style="width:408px; display: table-cell; vertical-align: middle;">
											<p style="padding:2px 0;">
												<span style=" width: 100px; display: inline-block; font-size: 14px; font-weight: bold; color:#34495e;">カタログ</span>
												<?php if(isset($data['catalogue'][4]['check1'])): ?>
												<span style="font-size:14px; font-weight: bold; color:#34495e;">30,000 円 <span style="font-size:10px; margin-left:5px;">（税抜）</span>
												<?php endif; ?>
												<?php if(isset($data['catalogue'][4]['check2'])): ?>
												<span style="font-size:14px; font-weight: bold; color:#34495e;">50,000 円 <span style="font-size:10px; margin-left:5px;">（税抜）</span>
												<?php endif; ?>
											</p>
										</div>
									</li>
								</ul>									
							</div>
							<?php 
								$Tsophong = $data['catalogue'][4]['sophong'];
								$Tgiaphong1 = $data['catalogue'][4]['check1'];
								$Tgiaphong2 = $data['catalogue'][4]['check2'];
								$Total = $data['catalogue'][4]['sophong'] * '220000' + ($Tgiaphong1 + $Tgiaphong2);									
							?>
							<div class="content_total">
								<div class="total_title" style="width:200px; display: table-cell;font-size: 14px; color: #34495e; padding-left: 96px; vertical-align: middle;">合計金額</div>
								<div class="total_content" style="width:456px; display: table-cell; vertical-align: middle; font-size: 24px; color: #e74c3c; text-indent: 12px; padding:24px 0; font-weight: bold;"><?php echo number_format($Total); ?> 円 <span style="color:#34495e; font-size: 12px; text-indent: 12px;">（税抜）</span></div>
							</div>
						</div>
					</div>
					<?php //endif; ?><?php endif; //End add ?>
				</div>
				<!-- End Selected Location -->					

				<div class="questionnaire" style="width: 1000px;margin:0 auto; overflow: hidden;">
					<?php foreach ($ques as $name => $value): ?>
						<?php if(!empty($data['choose'][$name])): ?>
							<h3 style="font-size: 16px; color: #000; text-indent: 18px; line-height: 30px; background: #f5f6f6; margin: 30px auto 15px; width: 1000px;"><?php echo $value['title'] ?></h3>
							<div style="width: 100%; display: table;">
								<?php foreach ($value['value'] as $key => $val): ?>
									<?php if(in_array($name.$key,$data['choose'][$name])) echo '<label style="width: 33.33%; float:left; display: inline-block; padding:2px 0; color:#000; font-size: 14px;">'.$val.'</label>';?>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</form>
		</div><!-- end main content -->
	</div>
</div>