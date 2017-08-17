<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('organizer-application/css/style.css'); ?>">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
<script src="<?php echo plugins_url('organizer-application/js/jquery.table2excel.js'); ?>"></script>
<div id="dashboard">
	<div class="list_exhibitor_accept">
		<h2 class="title">出展申込み状況</h2>
		<div class="pagination">
			<?php echo $paginate_links; ?>
		</div>
	</div>
<?php //if($location !=4): ?>
	<div class="list_exhibitor_accept">
		<table class="table2excel noExl">
			<?php foreach ($list_reg as $key => $val): ?>
			<tr>
				<td class="company"><?php echo $val->company_name; ?></td>
				<td class="number_booth"><?php echo $val->number_booth; ?>小間</td>
				<td class="option"><?php echo $val->check_name; ?></td>
				<td class="detail"><a href="<?php echo $val->detail_url; ?>"><i class="fa fa-file" aria-hidden="true"></i>詳細情報</a></td>
			</tr>
			<?php endforeach ?>
		</table>
		<input class="download_btn" value="出展社一覧　ダウンロード" />
	</div>
<?php //endif; ?>
	<!--++++++++++++++++++++++++++++++++++++-->
</div>
<!--++++++++++  Download Excel  ++++++++++++-->
<table class="download_to_excel" style="display: none">
	<tr>
		<td style="height: 40px;text-align:center; font-weight: bold;vertical-align: middle;">会社名</td>
		<td style="height: 40px;text-align:center; font-weight: bold;vertical-align: middle;">小間</td>
		<td style="height: 40px;text-align:center; font-weight: bold;vertical-align: middle;">カタログ</td>
		<td style="height: 40px;text-align:center; font-weight: bold;vertical-align: middle;">同梱</td>
		<td style="height: 40px;text-align:center; font-weight: bold;vertical-align: middle;">代表者 氏名</td>
		<td style="height: 40px;text-align:center; font-weight: bold;vertical-align: middle;">出展社名</td>
		<td style="height: 40px;text-align:center; font-weight: bold;vertical-align: middle;">出展商品サービス名</td>
		<td style="height: 40px;text-align:center; font-weight: bold;vertical-align: middle;">ご担当者名</td>
		<td style="height: 40px;text-align:center; font-weight: bold;vertical-align: middle;">ご担当者 役職</td>
		<td style="height: 40px;text-align:center; font-weight: bold;vertical-align: middle;">〒</td>
		<td style="height: 40px;text-align:center; font-weight: bold;vertical-align: middle;">住所①</td>
		<td style="height: 40px;text-align:center; font-weight: bold;vertical-align: middle;">住所②</td>
		<td style="height: 40px;text-align:center; font-weight: bold;vertical-align: middle;">TEL</td>
		<td style="height: 40px;text-align:center; font-weight: bold;vertical-align: middle;">Fax</td>
		<td style="height: 40px;text-align:center; font-weight: bold;vertical-align: middle;">E-mail</td>
		<td style="height: 40px;text-align:center; font-weight: bold;vertical-align: middle;">URL</td>
		<td style="height: 40px;text-align:center; font-weight: bold;vertical-align: middle;">出展サービス</td>
		<td style="height: 40px;text-align:center; font-weight: bold;vertical-align: middle;">緊急連絡先</td>
		<td style="height: 40px;text-align:center; font-weight: bold;vertical-align: middle;">お申込み日</td>
	</tr>
	<?php foreach ($download_excel as $key => $val):?>
		<tr>
		<td style="text-align:left; vertical-align: middle;"><?php echo $val->company_name;?></td>
		<td style="text-align:left; vertical-align: middle;"><?php echo $val->number_booth;?></td>
		<td style="text-align:left; vertical-align: middle;"><?php echo $val->check1;?></td>
		<td style="text-align:left; vertical-align: middle;"><?php echo $val->check2;?></td>
		<td style="text-align:left; vertical-align: middle;"><?php echo $val->family_name.$val->given_name;?></td>
		<td style="text-align:left; vertical-align: middle;"><?php echo $val->exhibitors_name;?></td>
		<td style="text-align:left; vertical-align: middle;"><?php echo $val->exhibition_service_name;?></td>
		<td style="text-align:left; vertical-align: middle;"><?php echo $val->person_in_charge;?></td>
		<td style="text-align:left; vertical-align: middle;"><?php echo $val->position;?></td>
		<td style="text-align:left; vertical-align: middle;"><?php echo $val->zipcode1.$val->zipcode1;?></td>
		<td style="text-align:left; vertical-align: middle;"><?php echo $val->prefectures.$val->city.$val->address;?></td>
		<td style="text-align:left; vertical-align: middle;"><?php echo $val->building_name;?></td>
		<td style="text-align:left; vertical-align: middle;"><?php echo $val->tel;?></td>
		<td style="text-align:left; vertical-align: middle;"><?php echo $val->fax;?></td>
		<td style="text-align:left; vertical-align: middle;"><?php echo $val->email_dk;?></td>
		<td style="text-align:left; vertical-align: middle;"><?php echo $val->url;?></td>
		<td style="text-align:left; vertical-align: middle;">
			<?php if( count($val->choose) ) {
		            foreach( $val->choose as $kc => $vc ) {
		                if( isset($ques[$kc]) ) {
		                    foreach ($vc as $c) {
		                        $c = str_replace($kc, "", $c);
		                        if( isset($ques[$kc]['value'][$c]) ) {
		                            echo $ques[$kc]['value'][$c].', ';
		                        }
		                    }
		                
		                }
		            }
		        } ?>
		</td>
		<td style="text-align:left; vertical-align: middle;"><?php echo $val->emergency_tel;?></td>
		<td style="text-align:left; vertical-align: middle;"><?php echo $val->date_dk;?></td>
	</tr>
	<?php endforeach;?>
</table>
<script>
	$("input.download_btn").click(function(){
		$(function() {
			$(".download_to_excel").table2excel({
				exclude: ".noExl",
				name: "Exhibitor List",
				filename: "Exhibitor List",
				fileext: ".xls",
				exclude_img: true,
				exclude_links: true,
				exclude_inputs: true
			});
		});
	});
</script>