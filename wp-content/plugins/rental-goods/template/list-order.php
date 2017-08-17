<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
<div id="order_list">
<h1>商品注文書</h1>
<table>
	<tr>
		<td>No.</td>
		<td class="total_price_ls">合計</td>
		<td>お申込み日</td>
		<td>詳細情報</td>
	</tr>
	<?php $i=1; foreach ($list_order as $val): ?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo "¥".$val->total_price; ?></td>
		<td><?php echo date('Y/m/d',strtotime($val->created)); ?></td>
		<td><span><a href="<?php echo admin_url('admin.php?page=order-details&id='.$val->id); ?>"><i class="fa fa-file" aria-hidden="true"></i></i>詳細情報</a></span></td>
	</tr>
	<?php $i++; endforeach; ?>
</table>
</div>