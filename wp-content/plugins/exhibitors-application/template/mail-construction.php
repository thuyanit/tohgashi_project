<div >
<div style="width:1000px; margin:0 auto;">
	<h1 style="line-height: 32px;font-size: 18px;color: #34495e;text-indent: 15px;background-color: #f0f0f0;width: 100%;max-width: 1000px;border-bottom: 8px solid #8ca7d3;margin-bottom: 20px;">出展基礎・工事（電気工事）</h1>
	<form>
		<div style="width: 100%;overflow: hidden;margin: 0 auto 60px;color: #34495e;">
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2;border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;
    ">
				<label style="display: table-cell;vertical-align: middle;width: 160px;padding-left: 10px;font-size: 14px;color: #34495e;background: #f5f6f6;" for="">２次側電気利用申請<br>24時間送電</label>
				<div>
					<p style="line-height: 35px;font-size: 13px;text-indent: 20px;color: #34495e;"><?php echo get_val_construction('electric_use');?></p>
				</div>
			</div><!-- end input_form 1-->
			<?php if( get_val_construction('electric_use')=="必要"):?>
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2;border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;
    ">
				<label style="display: table-cell;vertical-align: middle;width: 160px;padding-left: 10px;font-size: 14px;color: #34495e;background: #f5f6f6;" for="">100V電力</label>
				<div>
					<p style="line-height: 35px;font-size: 13px;text-indent: 20px;color: #34495e;"><?php echo get_val_construction('100V');?> kw</p>
				</div>
			</div><!-- end input_form 2-->
			 <div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2;border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;
    ">
				<label style="display: table-cell;vertical-align: middle;width: 160px;padding-left: 10px;font-size: 14px;color: #34495e;background: #f5f6f6;" for="">200V電力 </label>
				<div style="width: 280px;">
					<p style="line-height: 35px;font-size: 13px;text-indent: 20px;color: #34495e;"><?php echo get_val_construction('200V');?> kw</p>
				</div>
				<label style="display: table-cell;vertical-align: middle;width: 160px;padding-left: 10px;font-size: 14px;color: #34495e;background: #f5f6f6;text-indent: 20px;" for="">合計 </label>
				<div style="width:295px;">
					<?php	
						// $e100V = $_POST['100V'];
						// $e200V = $_POST['200V'];
						// $total_kw = ($e100V + $e200V);
					?>
					<!--<p><?php //echo number_format($total_kw); ?>　kw × ¥12,000-</p>-->
					<p style="line-height: 35px;font-size: 13px;text-indent: 20px;color: #34495e;display: table;width: 95%;margin: 0 auto;padding: 10px 0;"><?php echo get_val_construction('total_kw'); ?>　kw × ¥12,000-</p>
				</div>
			</div><!-- end input_form 8-->
			<?php endif;?>
			<div style="display: table;width: 100%;max-width: 998px;border-top: 1px solid #dee1e2;border-left: 1px solid #dee1e2;border-right: 1px solid #dee1e2;border-bottom: 1px solid #fff;overflow: hidden;border-bottom: 2px solid #dee1e2;
    ">
				<label style="display: table-cell;vertical-align: top;width: 160px;padding-left: 10px;padding-top:20px;font-size: 14px;color: #34495e;background: #f5f6f6;" for="">2次側電気配線工事</label>
				<div>
					<p style="line-height: 35px;font-size: 13px;text-indent: 20px;color: #34495e;display: table;width: 95%;margin: 0 auto;border-bottom: 1px solid #dee1e2;padding: 10px 0;">
						<span style="width: 470px;text-indent: 0;display: table-cell;line-height: 35px;font-size:15px;color: #34495e;">アームスポット</span>
						<span style="display: table-cell;line-height: 35px;font-size:13px;text-indent: 20px;color: #34495e;"><?php echo get_val_construction('optional_electric1');?>　灯 × ¥3,000- </span>
					</p>
					<p style="line-height: 35px;font-size: 13px;text-indent: 20px;color: #34495e;display: table;width: 95%;margin: 0 auto;border-bottom: 1px solid #dee1e2;padding: 10px 0;">
						<span style="width: 470px;text-indent: 0;display: table-cell;line-height: 35px;font-size:15px;color: #34495e;">アームスポット</span>
						<span style="display: table-cell;line-height: 35px;font-size:13px;text-indent: 20px;color: #34495e;"><?php echo get_val_construction('optional_electric2');?>　灯 × ¥3,500- </span>
					</p>
					<p style="line-height: 35px;font-size: 13px;text-indent: 20px;color: #34495e;display: table;width: 95%;margin: 0 auto;border-bottom: 1px solid #dee1e2;padding: 10px 0;">
						<span style="width: 470px;text-indent: 0;display: table-cell;line-height: 35px;font-size:15px;color: #34495e;">アームスポット</span>
						<span style="display: table-cell;line-height: 35px;font-size:13px;text-indent: 20px;color: #34495e;"><?php echo get_val_construction('optional_electric3');?>　灯 × ¥3,500- </span>
					</p>
					<p style="line-height: 35px;font-size: 13px;text-indent: 20px;color: #34495e;display: table;width: 95%;margin: 0 auto;border-bottom: 1px solid #dee1e2;padding: 10px 0;">
						<span style="width: 470px;text-indent: 0;display: table-cell;line-height: 35px;font-size:15px;color: #34495e;">アームスポット</span>
						<span style="display: table-cell;line-height: 35px;font-size:13px;text-indent: 20px;color: #34495e;"><?php echo get_val_construction('optional_electric4');?>　個  × ¥3,000- </span>
					</p>
					<p style="line-height: 35px;font-size: 13px;text-indent: 20px;color: #34495e;display: table;width: 95%;margin: 0 auto;border-bottom: 1px solid #dee1e2;padding: 10px 0;">
						<span style="width: 470px;text-indent: 0;display: table-cell;line-height: 35px;font-size:15px;color: #34495e;">アームスポット</span>
						<span style="display: table-cell;line-height: 35px;font-size:13px;text-indent: 20px;color: #34495e;"><?php echo get_val_construction('optional_electric5');?>　個  × ¥4,000- </span>
					</p>
					<p style="line-height: 35px;font-size: 13px;text-indent: 20px;color: #34495e;display: table;width: 95%;margin: 0 auto;border-bottom: 1px solid #dee1e2;padding: 10px 0;">
						<span style="width: 470px;text-indent: 0;display: table-cell;line-height: 35px;font-size:15px;color: #34495e;">アームスポット</span>
						<span style="display: table-cell;line-height: 35px;font-size:13px;text-indent: 20px;color: #34495e;"><?php echo get_val_construction('optional_electric6');?>　kw × ¥2,000- </span>
					</p>
					<p style="line-height: 35px;display: table;width: 95%;margin: 0 auto;padding: 10px 0;text-indent: 20px;color: #34495e;">
						<span style="font-size: 14px;font-weight: bold;width: 470px;text-indent: 0;display: table-cell;line-height: 35px;color: #34495e;" >合計金額</span>
						<span style="display: table-cell;line-height: 35px;font-size:13px;text-indent: 0px;color: #34495e;">
							<?php
								$e100V = get_val_construction('100V');
								$e200V = get_val_construction('200V');
								$total_kw = ($e100V + $e200V);
								$optional_electric1 = get_val_construction('optional_electric1'); 
								$optional_electric2 = get_val_construction('optional_electric2'); 
								$optional_electric3 = get_val_construction('optional_electric3'); 
								$optional_electric4 = get_val_construction('optional_electric4'); 
								$optional_electric5 = get_val_construction('optional_electric5'); 
								$optional_electric6 = get_val_construction('optional_electric6'); 
								$total_payment = ($optional_electric1*'3000')+($optional_electric2*'3500')+($optional_electric3*'3500')+($optional_electric4*'3000')+($optional_electric5*'4000')+($optional_electric6*'2000')+$total_kw*'12000';
							?>
							<span style="font-size: 24px;font-weight: bold;color: #e74c3c;"><?php echo number_format($total_payment); ?><span style="font-size: 16px;font-weight: bold;color: #e74c3c;line-height: 35px;">円</span> <span style="font-size: 12px;color: #34495e;font-weight: normal;">（税抜）</span></span>
						</span>
					</p>
				</div>
			</div>
		</div>
	</form>
</div>
</div>