<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('organizer-application/css/style.css'); ?>">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
<div id="dashboard">
	<h2 class="title">出展申込み状況</h2>
	<div class="select_applocation">
	<?php dropdown_page() ?>
	</div>
<?php //if ( $location !=4): ?>
	<div class="list_exhibitor">	
		<?php foreach ($list_reg as $key => $val): ?>
			<p class="row">
				<span class="col company"><?php echo $val->company_name; ?></span>
				<span class="col number_booth"><?php echo $val->number_booth; ?>小間</span>
				<span class="col option"><?php echo $val->check_name; ?></span>
				<span class="col detail"><a href="<?php echo $val->detail_url; ?>"><i class="fa fa-file" aria-hidden="true"></i>詳細情報</a></span>
				<span class="col confirm">
					<!--<?php //if ($val->status == 0): ?>-->
					<!--<a href="<?php //echo $val->accept_url; ?>" class="accept_btn"></a>-->
					<!--<a href="<?php //echo $val->deny_url; ?>" class="refuse_btn"></a>-->
					<!--<?php //endif; ?>-->
					
					<?php if ($val->status==0): ?>
					<a href="<?php echo $val->accept_url; ?>" class="accept_btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
					<a href="<?php echo $val->deny_url; ?>" class="refuse_btn"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
					<?php endif; ?>
					<?php if ($val->status==1): ?>
					<a class="no_click_accept" title="accepted"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
					<a class="no_click_refuse hidden"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
					<?php endif; ?>
					<?php if ($val->status==2): ?>
					<a class="no_click_accept hidden"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
					<a class="no_click_refuse" title="Refused"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
					<?php endif; ?>
				</span>
			</p>
		<?php endforeach; ?>
		<p class="row bottom"></p>
	</div>
<?php //endif; ?>
	<!--++++++++++++++++++++++++++++++++++++-->
</div>