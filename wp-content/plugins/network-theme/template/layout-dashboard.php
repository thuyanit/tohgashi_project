<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('network-theme/css/style.css'); ?>">
<div id="dashboard">
	<h2 class="title">全会場申込み状況</h2>
	<!--++++++++++++++++++++++++++++++++++++-->
	<ul class="status_general">
		<!-- <li><span class="txt_top">全会場申込み</span><span><?php //echo $count_all; ?><?php //echo $sy; ?></span></li>
		<li><span class="txt_top">確定待ち申込み</span><span><?php //echo $pedding_all; ?></span></li>
		<li><span class="txt_top">否認済み</span><span><?php //echo $deny_all; ?></span></li> -->
		<li><span class="txt_top">全会場申込み</span><span><?php echo $accept_count_all; ?><?php echo $sy; ?></span></li>
		<li><span class="txt_top">確定待ち申込み</span><span><?php echo $pending_count_all; ?></span></li>
		<li><span class="txt_top">否認済み</span><span><?php echo $refuse_count_all; ?></span></li>
	</ul>
	<!--++++++++++++++++++++++++++++++++++++-->
	<div class="statistics">
		<div class="exhibitor_status">
			<p class="title_big">
				<span>本会場確定済み出展社</span>　　　  
				<span><?php echo $location_all; ?></span>
			</p>
			<table>
				<tr>
					<td>小間申込み</td>
					<td><?php echo $location_sp; ?></td>
					<td>カタログ</td>
					<td><?php echo $location_c1; ?></td>
				</tr>
				<tr>
					<td>同梱</td>
					<td><?php echo $location_c2; ?></td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<?php 
			if ( get_current_blog_id()==1) {?>
				<p class="view_detail"><a href="<?php echo admin_url('admin.php?page=exhibitor-list-admin') ?>">出展社一覧の確認</a></p>
			<?php } ?>
			<?php if ( get_current_blog_id()==2) {?>
				<p class="view_detail"><a href="<?php echo admin_url('admin.php?page=application-accept') ?>">出展社一覧の確認</a></p>
			<?php } ?>
		</div>
		<div class=" exhibitor_status speaker_status">
			<p class="title_big">
				<span>講演者オファー　</span>　　                    
				<span>54</span>
			</p>
			<table>
				<tr>
					<td>講演確定済み</td>
					<td>220</td>
					<td>日時確定済み</td>
					<td>20</td>
				</tr>
				<tr>
					<td>講演日時登録</td>
					<td>20</td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<p class="view_detail">講演者の確認</p>
		</div>
	</div>
</div>