<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('exhibitors-application/css/style.css'); ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div id="confirm_construction" class="view_foundation_construction">
	<div class="head">
		<a href="<?php echo admin_url('admin.php?page=foundation');?>">出展基本申込み <span>申込み期限 <?php echo $date_f;?></span></a>
		<a class="active" href="<?php echo admin_url('admin.php?page=construction');?>">工事申込・各種申請 <span>申込み期限 <?php echo $date_c;?></span></a>
	</div>
	<div class="top_content">
		<h1>出展基礎・工事（電気工事）</h1>
	</div>
	<?php
    $data_select=unserialize($checkdata->info);
    ?>
	<form action="" method="post">
		<div class="block_content">
			<div class="input_form">
				<label for="">２次側電気利用申請<br>24時間送電</label>
				<div class="input">
					<p><?php echo $data_select['electric_use'];?></p>
				</div>
			</div><!-- end input_form 1-->
			<?php if( $data_select['electric_use']=="必要"):?>
			<div class="input_form">
				<label for="">100V電力</label>
				<div class="input">
					<p><?php echo $data_select['100V'];?> kw</p>
				</div>
			</div><!-- end input_form 2-->
			 <div class="input_form col4">
				<label for="">200V電力 </label>
				<div class="input input1">
					<p><?php echo $data_select['200V'];?> kw</p>
				</div>
				<label class="label2" for="">合計 </label>
				<div class="input input2">
					<?php	
						// $e100V = $_POST['100V'];
						// $e200V = $_POST['200V'];
						// $total_kw = ($e100V + $e200V);
					?>
					<!--<p><?php //echo number_format($total_kw); ?>　kw × ¥12,000-</p>-->
					<p><?php echo $data_select['total_kw']; ?>　kw × ¥12,000-</p>
				</div>
			</div><!-- end input_form 8-->
			<?php endif;?>
			<div class="input_form collapse_rows">
				<label for="">2次側電気配線工事</label>
				<div class="input">
					<p>
						<span>アームスポット</span>
						<span><?php echo $data_select['optional_electric1'];?>　灯 × ¥3,000- </span>
					</p>
					<p>
						<span>アームスポット</span>
						<span><?php echo $data_select['optional_electric2'];?>　灯 × ¥3,500- </span>
					</p>
					<p>
						<span>アームスポット</span>
						<span><?php echo $data_select['optional_electric3'];?>　灯 × ¥3,500- </span>
					</p>
					<p>
						<span>アームスポット</span>
						<span><?php echo $data_select['optional_electric4'];?>　個  × ¥3,000- </span>
					</p>
					<p>
						<span>アームスポット</span>
						<span><?php echo $data_select['optional_electric5'];?>　個  × ¥4,000- </span>
					</p>
					<p>
						<span>アームスポット</span>
						<span><?php echo $data_select['optional_electric6'];?>　kw × ¥2,000- </span>
					</p>
					<p class="total_electrical">
						<span>合計金額</span>
						<span>
							<?php
								$e100V = $data_select['100V'];
								$e200V = $data_select['200V'];
								$total_kw = ($e100V + $e200V);
								$optional_electric1 = $data_select['optional_electric1']; 
								$optional_electric2 = $data_select['optional_electric2']; 
								$optional_electric3 = $data_select['optional_electric3']; 
								$optional_electric4 = $data_select['optional_electric4']; 
								$optional_electric5 = $data_select['optional_electric5']; 
								$optional_electric6 = $data_select['optional_electric6']; 
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
						<?php echo $data_select['attachment_file2']; ?>
					</p>
				</div>
			</div><!-- end input_form 10-->
		</div>
		
	</form>
</div>