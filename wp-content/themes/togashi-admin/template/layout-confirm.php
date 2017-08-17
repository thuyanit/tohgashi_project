<?php get_header(); ?>
			<div class="top_content">
				<h3>ブース出展申し込み2017</h3>
				<h2>お申込み内容確認</h2>
				<p class="top_confirm">以下のお申込み内容でよろしければ、「申込む」ボタンをクリックしてください。<br />お申込みと同時にご担当者様宛に、お申込み内容確認メールを送信いたします。</p>
			</div>
			<div class="main_content">
				<form id="application_form" action="" method="post" class="comfirm_form">
					<div class="info_company">
						<div class="input_form">
							<label for="">会社名 </label>
							<div class="input">
								<p class="w440"><?php echo get_val('company_name') ?></p>
							</div>
						</div><!-- end input_form 1-->
						<div class="input_form">
							<label for="">代表者 氏名 </label>
							<div class="input group_name">
								<p class="w440"><?php echo mb_convert_kana(get_val('family_name').' '.get_val('given_name'),'KVC'); ?></p>
							</div>
						</div><!-- end input_form 2-->
						<div class="input_form">
							<label for="">出展社名 </label>
							<div class="input">
								<p class="w440"><?php echo get_val('exhibitors_name') ?></p>
							</div>
						</div><!-- end input_form 3-->
						<div class="input_form">
							<label for="">出展商品サービス名 </label>
							<div class="input">
								<p class="w440"><?php echo get_val('exhibition_service_name') ?></p>
							</div>
						</div><!-- end input_form 4-->
						<div class="input_form">
							<label for="">ご担当者名</label>
							<div class="input">
								<p class="w315"><?php echo get_val('person_in_charge') ?></p>
							</div>
						</div><!-- end input_form 5-->
						<div class="input_form">
							<label for="">ご担当者 部署</label>
							<div class="input">
								<p class="w315"><?php echo get_val('position') ?></p>
							</div>
						</div><!-- end input_form 6-->
						<div class="input_form col4">
							<label for="">郵便番号 </label>
							<div class="input input1">
								<p class="w95"><?php echo get_val('zipcode1').''.get_val('zipcode2') ?></p>
							</div>
							<label class="label2" for="">都道府県 </label>
							<div class="input input2">
								<p><?php echo get_val('prefectures') ?></p>
							</div>
						</div><!-- end input_form 7-->
						<div class="input_form col4">
							<label for="">市区 </label>
							<div class="input input1">
								<p class="w315"><?php echo get_val('city') ?></p>
							</div>
							<label class="label2" for="">町村番地 </label>
							<div class="input input2">
								<p class="w215"><?php echo get_val('address') ?></p>
							</div>
						</div><!-- end input_form 8-->
						<div class="input_form">
							<label for="">ビル・マンション名</label>
							<div class="input">
								<p class="w440"><?php echo get_val('building_name') ?></p>
							</div>
						</div><!-- end input_form 9-->
						<div class="input_form">
							<label for="">電話番号 </label>
							<div class="input">
								<p class="w315"><?php echo get_val('tel') ?></p>
							</div>
						</div><!-- end input_form 10-->
						<div class="input_form">
							<label for="">Fax番号 </label>
							<div class="input">
								<p class="w315"><?php echo get_val('fax') ?></p>
							</div>
						</div><!-- end input_form 11-->
						<div class="input_form">
							<label for="">E-mail </label>
							<div class="input">
								<p class="w440"><?php echo get_val('email') ?></p>
							</div>
						</div><!-- end input_form 12-->
						<div class="input_form">
							<label for="">公式サイト掲載URL</label>
							<div class="input">
								<p class="w440"><?php echo get_val('url') ?></p>
							</div>
						</div><!-- end input_form 13-->
						<div class="input_form">
							<label for="">緊急連絡先 </label>
							<div class="input">
								<p class="w315"><?php echo get_val('emergency_tel') ?></p>
							</div>
						</div><!-- end input_form 14-->
					</div>
					<!-- Selected Location -->
					<div class="selected_location">
						<?php //if( !empty($_POST['catalogue'][1]['sophong']) ): ?> <!-- Commert 09-08-2017 beccause don't must be input number of booths -->
						<?php if((!empty($_POST['catalogue'][1]['check1']) )||(!empty($_POST['catalogue'][1]['check2']) )):?><!-- Add check -->
						<div class="selected_location_box">
							<div class="select_location_title"><h4>九州会場　5/17（水）・18（木）</h4></div>
							<div class="select_location_content">
								<div class="content_booths">
									<ul>
										<li>
											<div class="title">出展小間数</div>
											<div class="show_booths">
												<p>
													<span class="show_title">出展料金</span>
													<span>22万円 <span class="small">（税抜）</span></span>
												</p>
												<p>
													<span class="show_title_2 font_14">出展希望</span>
													<span class="font_14"><?php if(isset($_POST['catalogue'][1]['sophong'])) echo $_POST['catalogue'][1]['sophong']; ?>　小間</span>
												</p>
											</div>
										</li>
										<li>
											<div class="title">出展品目</div>
											<div class="show_booths">
												<p>
													<?php if(isset($_POST['catalogue'][1]['check1'])): ?>
													<span class="show_title_2 font_14">カタログ</span>
													<span class="font_14">30,000 円<span class="small">（税抜）</span></span><br>
													<?php endif; ?>
													<?php if(isset($_POST['catalogue'][1]['check2'])): ?>
													<span class="show_title_2 font_14">同梱</span>
													<span class="font_14">50,000 円<span class="small">（税抜）</span></span>
													<?php endif; ?>
												</p>
											</div>
										</li>
									</ul>
								</div>
								<?php
									$Tsophong = $_POST['catalogue'][1]['sophong'];
									$Tgiaphong1 = $_POST['catalogue'][1]['check1'];
									$Tgiaphong2 = $_POST['catalogue'][1]['check2'];
									$Total = $_POST['catalogue'][1]['sophong'] * '220000' + ($Tgiaphong1 + $Tgiaphong2);
								?>
								<div class="content_total">
									<div class="total_title">合計金額</div>
									<div class="total_content"><?php echo number_format($Total); ?> <span class="red_unit">円</span> <span>（税抜）</span></div>
								</div>
							</div>
						</div>
						<?php //endif; ?><?php endif;//End add?>

						<?php //if( !empty($_POST['catalogue'][2]['sophong']) ): ?> <!-- Commert 09-08-2017 beccause don't must be input number of booths -->
						<?php if((!empty($_POST['catalogue'][2]['check1']) )||(!empty($_POST['catalogue'][2]['check2']) )):?><!-- Add check -->
						<div class="selected_location_box">
							<div class="select_location_title"><h4>東京会場　7/25（火）・26（水）</h4></div>
							<div class="select_location_content">
								<div class="content_booths">
									<ul>
										<li>
											<div class="title">出展小間数</div>
											<div class="show_booths">
												<p>
													<span class="show_title">出展料金</span>
													<span>22万円 <span class="small">（税抜）</span></span>
												</p>
												<p>
													<span class="show_title_2 font_14">出展希望</span>
													<span class="font_14"><?php if(isset($_POST['catalogue'][2]['sophong'])) echo $_POST['catalogue'][2]['sophong']; ?>小間</span>
												</p>
											</div>
										</li>
										<li>
											<div class="title">出展品目</div>
											<div class="show_booths">
												<p>
													<?php if(isset($_POST['catalogue'][2]['check1'])): ?>
													<span class="show_title_2 font_14">カタログ</span>
													<span class="font_14">30,000 円<span class="small">（税抜）</span></span><br>
													<?php endif; ?>
													<?php if(isset($_POST['catalogue'][2]['check2'])): ?>
													<span class="show_title_2 font_14">同梱</span>
													<span class="font_14">50,000 円<span class="small">（税抜）</span></span>
													<?php endif; ?>
												</p>
											</div>
										</li>
									</ul>
								</div>
								<?php
									$Tsophong = $_POST['catalogue'][2]['sophong'];
									$Tgiaphong1 = $_POST['catalogue'][2]['check1'];
									$Tgiaphong2 = $_POST['catalogue'][2]['check2'];
									$Total = $_POST['catalogue'][2]['sophong'] * '220000' + ($Tgiaphong1 + $Tgiaphong2);
								?>
								<div class="content_total">
									<div class="total_title">合計金額</div>
									<div class="total_content"><?php echo number_format($Total); ?> <span class="red_unit">円</span><span>（税抜）</span></div>
								</div>
							</div>
						</div>
						<?php //endif; ?><?php endif; //End add?>

						<?php //if( !empty($_POST['catalogue'][3]['sophong']) ): ?> <!-- Commert 09-08-2017 beccause don't must be input number of booths -->
						<?php if((!empty($_POST['catalogue'][3]['check1']) )||(!empty($_POST['catalogue'][3]['check2']) )):?><!-- Add check -->
						<div class="selected_location_box">
							<div class="select_location_title"><h4>大阪会場　9/29（金）・30（土）</h4></div>
							<div class="select_location_content">
								<div class="content_booths">
									<ul>
										<li>
											<div class="title">出展小間数</div>
											<div class="show_booths">
												<p>
													<span class="show_title">出展料金</span>
													<span>22万円 <span class="small">（税抜）</span></span>
												</p>
												<p>
													<span class="show_title_2 font_14">出展希望</span>
													<span class="font_14"><?php if(isset($_POST['catalogue'][3]['sophong'])) echo $_POST['catalogue'][3]['sophong']; ?>　小間</span>
												</p>
											</div>
										</li>
										<li>
											<div class="title">出展品目</div>
											<div class="show_booths">
												<p>
													<?php if(isset($_POST['catalogue'][3]['check1'])): ?>
													<span class="show_title_2 font_14">カタログ</span>
													<span class="font_14">30,000 円<span class="small">（税抜）</span></span><br>
													<?php endif; ?>
													<?php if(isset($_POST['catalogue'][3]['check2'])): ?>
													<span class="show_title_2 font_14">同梱</span>
													<span class="font_14">50,000 円<span class="small">（税抜）</span></span>
													<?php endif; ?>
												</p>
											</div>
										</li>
									</ul>
								</div>
								<?php
									$Tsophong = $_POST['catalogue'][3]['sophong'];
									$Tgiaphong1 = $_POST['catalogue'][3]['check1'];
									$Tgiaphong2 = $_POST['catalogue'][3]['check2'];
									$Total = $_POST['catalogue'][3]['sophong'] * '220000' + ($Tgiaphong1 + $Tgiaphong2);
								?>
								<div class="content_total">
									<div class="total_title">合計金額</div>
									<div class="total_content"><?php echo number_format($Total); ?> <span class="red_unit">円</span> <span>（税抜）</span></div>
								</div>
							</div>
						</div>
						<?php //endif; ?><?php endif; //End add ?>

						<?php //if( !empty($_POST['catalogue'][4]['sophong']) ): ?> <!-- Commert 09-08-2017 beccause don't must be input number of booths -->
						<?php if((!empty($_POST['catalogue'][4]['check1']) )||(!empty($_POST['catalogue'][4]['check2']) )):?><!-- Add check -->
						<div class="selected_location_box">
							<div class="select_location_title"><h4>名古屋会場　11/7（火）・8（水</h4></div>
							<div class="select_location_content">
								<div class="content_booths">
									<ul>
										<li>
											<div class="title">出展小間数</div>
											<div class="show_booths">
												<p>
													<span class="show_title">出展料金</span>
													<span>22万円 <span class="small">（税抜）</span></span>
												</p>
												<p>
													<span class="show_title_2 font_14">出展希望</span>
													<span class="font_14"><?php if(isset($_POST['catalogue'][4]['sophong'])) echo $_POST['catalogue'][4]['sophong']; ?>　小間</span>
												</p>
											</div>
										</li>
										<li>
											<div class="title">出展品目</div>
											<div class="show_booths">
												<p>
													<?php if(isset($_POST['catalogue'][4]['check1'])): ?>
													<span class="show_title_2 font_14">カタログ</span>
													<span class="font_14">30,000 円<span class="small">（税抜）</span></span><br>
													<?php endif; ?>
													<?php if(isset($_POST['catalogue'][4]['check2'])): ?>
													<span class="show_title_2 font_14">同梱</span>
													<span class="font_14">50,000 円<span class="small">（税抜）</span></span>
													<?php endif; ?>
												</p>
											</div>
										</li>
									</ul>
								</div>
								<?php
									$Tsophong = $_POST['catalogue'][4]['sophong'];
									$Tgiaphong1 = $_POST['catalogue'][4]['check1'];
									$Tgiaphong2 = $_POST['catalogue'][4]['check2'];
									$Total = $_POST['catalogue'][4]['sophong'] * '220000' + ($Tgiaphong1 + $Tgiaphong2);
								?>
								<div class="content_total">
									<div class="total_title">合計金額</div>
									<div class="total_content"><?php echo number_format($Total); ?> <span class="red_unit">円</span><span>（税抜）</span></div>
								</div>
							</div>
						</div>
						<?php //endif; ?><?php endif; //End add?>
					</div>
					<!-- End Selected Location -->
					<!-- Note Bottom -->
					<div class="note_bottom">
						<p>※直前でのブースキャンセルは、下記のとおりキャンセル料が発生いたしますのでご注意ください。<br><span class="indent">キャンセル料は会期30 日前以内で出展料の100％、40 日前以内で同80%、60 日前以内で同50% です。カタログ出展、同梱サービスも同様です。</span></p>
						<p>※出展料金は<span class="txt_red">全て税別表記（消費税8%）</span>です。</p>
					</div>
					<!-- End Note Bottom-->
					<div class="questionnaire">
						<?php foreach ($ques as $name => $data): ?>
							<?php if(!empty($_POST['choose'][$name])): ?>
								<?php
								// echo "<pre>";
								// print_r($data);
								// echo"</pre>";
								?>
								<!-- <h3 class="title"><?php //echo $data['title'] ?></h3> -->
								<div class="selectbox">
									<?php foreach ($data['value'] as $key => $val): ?>
										<?php if(in_array($name.$key,$_POST['choose'][$name])) echo '<label>'.$val.'</label>';?>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
					<div class="button_form">
						<p><input id="back_form" value="修正する" onclick="history.back(-1)"></p>
						<p><input id="sent_form" type="submit" name="sent_info" value="申込む"></p>
					</div>
				</form>
			</div><!-- end main content -->
<?php get_footer(); ?>