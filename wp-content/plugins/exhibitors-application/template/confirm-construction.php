<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('exhibitors-application/css/style.css'); ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div id="confirm_construction">
	<div class="top_content">
		<h1>出展基礎・工事（電気工事）</h1>
		<h2>お申込み内容確認</h2>
		<p class="top_confirm">以下のお申込み内容でよろしければ、「申込む」ボタンをクリックしてください。<br>お申込みと同時にご担当者様宛に、お申込み内容確認メールを送信いたします。</p>
	</div>
	
	<form action="" method="post">
		<div class="block_content">
			<div class="input_form">
				<label for="">２次側電気利用申請<br>24時間送電</label>
				<div class="input">
					<p><?php echo get_val_construction('electric_use');?></p>
				</div>
			</div><!-- end input_form 1-->
			<?php //if( get_val_construction('electric_use')=="必要"):?>
			<div class="input_form">
				<label for="">100V電力</label>
				<div class="input">
					<p><?php echo get_val_construction('100V');?> kw</p>
				</div>
			</div><!-- end input_form 2-->
			 <div class="input_form col4">
				<label for="">200V電力 </label>
				<div class="input input1">
					<p><?php echo get_val_construction('200V');?> kw</p>
				</div>
				<label class="label2" for="">合計 </label>
				<div class="input input2">
					<?php	
						// $e100V = $_POST['100V'];
						// $e200V = $_POST['200V'];
						// $total_kw = ($e100V + $e200V);
					?>
					<!--<p><?php //echo number_format($total_kw); ?>　kw × ¥12,000-</p>-->
					<p><?php echo get_val_construction('total_kw'); ?>　kw × ¥12,000-</p>
				</div>
			</div><!-- end input_form 8-->
			<?php //endif;?>
			<div class="input_form collapse_rows">
				<label for="">2次側電気配線工事</label>
				<div class="input">
					<p>
						<span>アームスポット</span>
						<span><?php echo get_val_construction('optional_electric1');?>　灯 × ¥3,000- </span>
					</p>
					<p>
						<span>アームスポット</span>
						<span><?php echo get_val_construction('optional_electric2');?>　灯 × ¥3,500- </span>
					</p>
					<p>
						<span>アームスポット</span>
						<span><?php echo get_val_construction('optional_electric3');?>　灯 × ¥3,500- </span>
					</p>
					<p>
						<span>アームスポット</span>
						<span><?php echo get_val_construction('optional_electric4');?>　個  × ¥3,000- </span>
					</p>
					<p>
						<span>アームスポット</span>
						<span><?php echo get_val_construction('optional_electric5');?>　個  × ¥4,000- </span>
					</p>
					<p>
						<span>アームスポット</span>
						<span><?php echo get_val_construction('optional_electric6');?>　kw × ¥2,000- </span>
					</p>
					<p class="total_electrical">
						<span>合計金額</span>
						<span>
							<?php
								$e100V = $_POST['100V'];
								$e200V = $_POST['200V'];
								$total_kw = ($e100V + $e200V);
								$optional_electric1 = $_POST['optional_electric1']; 
								$optional_electric2 = $_POST['optional_electric2']; 
								$optional_electric3 = $_POST['optional_electric3']; 
								$optional_electric4 = $_POST['optional_electric4']; 
								$optional_electric5 = $_POST['optional_electric5']; 
								$optional_electric6 = $_POST['optional_electric6']; 
								$total_payment = ($optional_electric1*'3000')+($optional_electric2*'3500')+($optional_electric3*'3500')+($optional_electric4*'3000')+($optional_electric5*'4000')+($optional_electric6*'2000')+$total_kw*'12000';
							?>
							<span class="total_price"><?php echo number_format($total_payment); ?><span class="unit">円</span> <span class="txt_small">（税抜）</span></span>
						</span>
					</p>
				</div>
			</div>
		</div>
		<div class="block_content attachment_file">
			<div class="input_form">
				<label for="">図面添付 </label>
				<div class="input">
					<p>
						<?php 
						echo get_val_construction('attachment_file2');
						?>
					</p>
				</div>
			</div><!-- end input_form 10-->
		</div>
	    <div class="button_form">
			<p><input id="back_form" value="修正する" onclick="history.back(-1)"></p>
			<p><input id="sent_construction" type="submit" name="sent_construction" value="申込む"></p>
		</div>
		
	</form>
</div>