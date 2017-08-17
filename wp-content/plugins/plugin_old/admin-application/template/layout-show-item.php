<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('admin-application/css/style.css'); ?>">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
<div id="dashboard">
	<div class="list_goods">
		<h2 class="title">レンタル備品 一覧</h2>
		<table>
			<thead>
				<tr>
					<td>hinh</td>
					<td>ten</td>
					<td>thong so</td>
					<td>gia</td>
					<td>so item</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<?php foreach($shop_togashi as $val): ?>
				<tr>
					<td>
						<?php foreach($val->item_imgs as $img): ?>
						<p><img src="<?php echo $img ?>" alt=""/></p>
						<?php endforeach; ?>
					</td>
					<td><?php echo $val->item_name ?></td>
					<td><?php echo $val->op_specification ?></td>
					<td><?php echo $val->op_gia ?></td>
					<td></td>
					<td></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		
	</div>
</div>