<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('admin-application/css/style.css'); ?>">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
<div id="dashboard">
	<div class="list_goods">
		<h2 class="title">レンタル備品 一覧</h2>
		<div class="new_goods"><a href="<?php echo admin_url('admin.php?page=register-amenity-goods') ?>" class="add_new">備品登録</a></div>
		<table>
			<thead>
				<tr>
					<td>No.</td>
					<td>レンタル備品名</td>
					<td>仕様</td>
					<td>金額 </td>
					<td>備品番号 </td>
					<td>表示状態</td>
					<td></td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<?php $i=1; ?>
				<?php foreach ($shop_togashi as $key => $val): ?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $val->item_name; ?></td>
					<td><?php echo $val->op_specification; ?></td>
					<!-- <td><?php //echo $val->op_price; ?></td> -->
					<td>
					<?php
						$item_price=$val->item_price;
						if(!empty($item_price)){
							echo $item_price;
						}
						else{
							echo $val->op_price;
						}
					?>
					</td>
					<!-- <td><?php //echo $val->op_quantity_stock; ?></td> -->
					<td>
					<?php
						$item_number=$val->item_number;
						if(!empty($item_number)){
							echo $item_number;
						}
						else{
							echo $val->op_quantity_stock;
						}
					?>
					</td>
					<!-- <td><?php //echo $val->op_status; ?></td> -->
					<td>
					<?php 
						$status=$val->status;
						$op_status=$val->op_status;
						if(!empty($op_status)){
							echo $val->op_status;
						}
						else{
							if($status==1){
								echo "公開";
							}
							if($status==0){
								echo "非公開";
							}	
						}
					?>
					</td>

					<td class="icon_action">
					<a href="<?php echo $val->edit_item_url; ?>"><i class="fa fa-file" aria-hidden="true"></i>編集</a>
					</td>
					<td class="icon_action">
					<a href="<?php echo $val->remove_url; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
					</td>
				</tr>
				<?php $i++; ?>
				<?php endforeach; ?>
				
			</tbody>
		</table>
		
	</div>
</div>