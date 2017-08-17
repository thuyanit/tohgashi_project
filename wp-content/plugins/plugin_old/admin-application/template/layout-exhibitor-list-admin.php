
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('admin-application/css/style.css'); ?>">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
<script src="<?php echo plugins_url('organizer-application/js/jquery.table2excel.js'); ?>"></script>
<div id="dashboard">
	<div class="list_exhibitor_accept">
		<h2 class="title">確定出店者 一覧</h2>
		<div class="pagination">
			<?php echo $paginate_links; ?>
		</div>
	</div>
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
		<!--============================================================ Down Button 1 =============================================-->
		<table id="download1" class="table2excel1" style=" font-size:14px;margin:0 auto; display: none" border="1" cellspacing="0" cellpadding="5">
		    <tr style="font-weight:bold;text-align:center; vertical-align: middle;">
		        <td rowspan="4">出展社名</td>
		        <td rowspan="4">小間</td>
		        <td rowspan="4">カタログ</td>
		        <td rowspan="4">同梱</td>
		        <td rowspan="4">代表者</td>
		        <td rowspan="4">〒</td>
		        <td rowspan="4">住所①</td>
		        <td rowspan="4">住所②</td>
		        <td rowspan="4">担当</td>
		        <td rowspan="4">TEL</td>
		        <td rowspan="4">FAX</td>
		        <td rowspan="4">緊急連絡先</td>
		        <td rowspan="4">URL</td>
		        <td rowspan="4">MAIL</td>
		        <td rowspan="4">出展サービス</td>
		        <td rowspan="4">お申込み日</td>
		        <td rowspan="4">天井構造 バルーン</td>
		        <td rowspan="4">危険物</td>
		        <td rowspan="4">危険物 給排水</td>
		        <td rowspan="4">アンカー</td>
		        <td colspan="4" rowspan="2">車両</td>
		        <td colspan="10" rowspan="2">パッケージ</td>
		        <td colspan="5" rowspan="2">基礎申込み</td> <!--  merger 4 line   -->
		        <td rowspan="4">レンタル備品</td> <!-- Rental _ goods   -->
		    </tr>
		    <tr></tr>
		    <tr style="font-weight:bold;text-align:center; vertical-align: middle;">
		        <td rowspan="2">台数</td>
		        <td rowspan="2">車種</td>
		        <td rowspan="2">搬入時間</td>
		        <td rowspan="2">搬出時間</td>
		        <td rowspan="2">小間数</td>
		        <td rowspan="2">カーペット色</td>
		        <td rowspan="2">スポット（100W)</td>
		        <td rowspan="2">コンセント（500W)</td>
		        <td rowspan="2">一次電気工事</td>
		        <td rowspan="2">分電版工事</td>
		        <td rowspan="2">電気使用料</td>
		        <td>受付カウンター</td>
		        <td rowspan="2">カウンターチェア</td>
		        <td rowspan="2">記名受け</td>
		        <td rowspan="2">運営者 バッジ</td>
		        <td rowspan="2">パラペット</td>
		        <td rowspan="2">社名板</td>
		        <td rowspan="2">テーブル</td>
		        <td rowspan="2">折りたたみイス</td>
		    </tr>
		    <tr style="font-weight:bold;text-align:center; vertical-align: middle;">     
		        <td>W900XD450XH800</td>
		    </tr>
		    <?php foreach ($list_company as $key => $val):?>
		    <tr style="vertical-align: middle;text-align: left;">     
		        <td><?php echo $val->company_name ;?></td>
		        <td><?php echo $val->number_booth ;?></td>
		        <td><?php echo $val->check1 ;?></td>
		        <td><?php echo $val->check2 ;?></td>
		        <td><?php echo $val->family_name;echo $val->given_name;?></td>
		        <td><?php echo $val->zipcode1;echo $val->zipcode2; ?></td>
		        <td><?php echo $val->prefectures; echo $val->city; echo $val->address;?></td>
		        <td><?php echo $val->building_name ;?></td>
		        <td><?php echo $val->person_in_charge ;?></td>
		        <td><?php echo $val->tel ;?></td>
		        <td><?php echo $val->fax ;?></td>
		        <td><?php echo $val->emergency_tel ;?></td>
		        <td><?php echo $val->url ;?></td>
		        <td><?php echo $val->email_dk ;?></td>
		        <td>
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
		        <td><?php echo $val->date_dk ;?></td>
		        <td><?php echo $val->ceiling_structure ;?></td>
		        <td><?php echo $val->use_of_fire ;?></td>
		        <td><?php echo $val->drainage_construction ;?></td>
		        <td><?php echo $val->anchor_construction ;?></td>
		        <td><?php echo $val->qty_car ;?></td>
		        <td><?php echo $val->model_car ;?></td>
		        <td><?php echo $val->from_time ;?></td>
		        <td><?php echo $val->to_time ;?></td>
		        <td><?php echo $val->qty_booth;?></td>
		        <td><?php echo $val->carpet_color ;?></td>
		        <td><?php echo $val->spot_100W;?></td>
		        <td><?php echo $val->outlet_500W;?></td>
		        <td><?php echo $val->primary_electric;?></td>
		        <td><?php echo $val->distribution_board;?></td>
		        <td><?php echo $val->fee_usage_electric;?></td>
		        <td><?php echo $val->reception_electric;?></td>
		        <td><?php echo $val->counter_chair;?></td>
		        <td><?php echo $val->register_name;?></td>
		        <td><?php echo $val->number_nameplate ;?></td>
		        <td><?php echo $val->roof ;?></td>
		        <td><?php echo $val->company_name_plate_reg;?></td>
		        <td><?php echo $val->table ;?></td>
		        <td><?php echo $val->chair ;?></td>
		        <td>
		        <?php if($val->list_orders2):?>
		             <table border="0" cellspacing="0" cellpadding="5">
		                <tr>
		                    <?php foreach( $val->list_orders2 as $or2 ): ?>
		                    <td><?php echo $or2['product_detail']->product_name; ?>     </td>
		                    <?php endforeach; ?>
		                </tr>
		                
		                <tr>
		                <?php foreach( $val->list_orders2 as $or2 ): ?>
		                    <?php foreach( $or2['product_spec_detail'] as $or22 ): ?>
		                    <?php
			                	$qty  =  $or22->product_qty;
			                	$price = $or22->product_price;
			                	$total_each = $qty * $price;
			                ?>
		                    <td>
		                        <?php echo $or22->product_specification; ?><br>
		                        Quantity : <?php echo $or22->product_qty; ?><br>
		                        ¥ <?php echo $total_each; ?>
		                    </td>
		                   <?php endforeach; ?>
		                <?php endforeach; ?>
		                </tr> 
		            </table>
		            <?php endif; ?>
		        </td>
		    </tr>
		    <?php endforeach;?>
		</table>
		<!--============================================================ Down Button 2 =============================================-->
		<table id="testTable" style="width:100%;font-size:14px;margin:0 auto;text-align: left;display: none;" border="1">
		    <tr>
		        <th>出展社名</th>
		        <th>小間</th>
		        <th>お申込み日</th>
		        <th>天井構造 <br/> バルーン</th>
		        <th>危険物</th>
		        <th>給排水</th>
		        <th>アンカー</th>
		        <th>レンタル備品</th>
		    </tr>

		    <?php foreach ($orders as $item): ?>
		    <tr>
		        <td><?php echo $item->company_name; ?></td>
		        <td><?php echo $item->number_booth; ?></td>
		        <td><?php echo $item->date_dk; ?></td>
		        <td><?php echo $item->info['ceiling_structure']; ?></td>
		        <td><?php echo $item->info['use_of_fire']; ?></td>
		        <td><?php echo $item->info['drainage_construction']; ?></td>
		        <td><?php echo $item->info['anchor_construction']; ?></td>
		        <td>
		            <table border="0" cellspacing="0" cellpadding="5">
		            	<tr>
		                <?php foreach($item->product_detail as $pr): ?>
		                    <td><?php echo $pr->product_name ?></td>
		                <?php endforeach; ?>
		                </tr>

		                <tr>
		                <?php foreach($item->product_spec as $prod): ?>
		                	<?php
			                	$sl  =  $prod->product_qty;
			                	$gia = $prod->product_price;
			                	$tong = $sl * $gia;
			                ?>
		                    <td style="text-align: left;">
		                    	<?php echo $prod->product_specification; ?><br>
		                    	Quantity : <?php echo $prod->product_qty; ?><br>
		                    	¥ <?php echo $tong; ?>
		                    </td>
		                <?php endforeach; ?>
		                </tr>
		            </table>
		        </td>
		    </tr>
		    <?php endforeach ?>
		    
		</table>
		<!--============================================================ Down Button 2 =============================================-->
		<table id="testTable" style="width:100%;font-size:14px;margin:0 auto;text-align: left;display: none;" border="1">
		    <tr>
		        <th>出展社名</th>
		        <th>小間</th>
		        <th>お申込み日</th>
		        <th>天井構造 <br/> バルーン</th>
		        <th>危険物</th>
		        <th>給排水</th>
		        <th>アンカー</th>
		        <th colspan="9">レンタル備品</th>
		    </tr>

		    <?php foreach ($orders as $item): ?>
		    <tr>
		        <td><?php echo $item->company_name; ?></td>
		        <td><?php echo $item->number_booth; ?></td>
		        <td><?php echo $item->date_dk; ?></td>
		        <td><?php echo $item->info['ceiling_structure']; ?></td>
		        <td><?php echo $item->info['use_of_fire']; ?></td>
		        <td><?php echo $item->info['drainage_construction']; ?></td>
		        <td><?php echo $item->info['anchor_construction']; ?></td>
		        <td>
		            <table border="0" cellspacing="0" cellpadding="5">
		            	<tr>
		                <?php foreach($item->product_detail as $pr): ?>
		                    <td><?php echo $pr->product_name ?></td>
		                <?php endforeach; ?>
		                </tr>

		                <tr>
		                <?php foreach($item->product_spec as $prod): ?>
		                	<?php
			                	$sl  =  $prod->product_qty;
			                	$gia = $prod->product_price;
			                	$tong = $sl * $gia;
			                ?>
		                    <td style="text-align: left;">
		                    	<?php echo $prod->product_specification; ?><br>
		                    	Quantity : <?php echo $prod->product_qty; ?><br>
		                    	¥ <?php echo $tong; ?>
		                    </td>
		                <?php endforeach; ?>
		                </tr>
		            </table>
		        </td>
		    </tr>
		    <?php endforeach ?>
		    
		</table>
		<!--============================================================ End Down Button 2 =============================================-->
		
		<!-- Down button 3 -->
		<table class="table2excel2 noExl" style="display:none">
			<tr >
                <td style="text-align:center; vertical-align: middle; font-weight: bold;" rowspan="4">出展社名</td>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;" rowspan="4">小間</td>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;" rowspan="4">担当</td>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;" rowspan="4">TEL</td>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;" rowspan="4">FAX</td>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;" rowspan="4">携帯</td>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;" colspan="11">電気</td>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;" style="text-align:center; vertical-align: middle; font-weight: bold;" rowspan="4">金額</td>
            </tr>
            <tr>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;" colspan="4">パッケージ申込</td>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;" rowspan="3">24h電気供給</td>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;" colspan="6">２次電気配線（基本申込部）</td>
            </tr>
            <tr>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;" rowspan="2">スポット（100W)</td>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;" rowspan="2">コンセント（500W)</td>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;" rowspan="2">一次電気工事</td>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;" rowspan="2">分電版工事</td>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;">スポットライト</td>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;">アームスポット</td>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;">蛍光灯</td>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;">コンセント500W</td>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;">コンセント1kw/100W</td>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;" >分電盤工事</td>
            </tr>
            <tr>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;">¥3,000</td>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;">¥3,500</td>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;">¥3,500</td>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;">¥3,000</td>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;">¥4,000</td>
                <td style="text-align:center; vertical-align: middle; font-weight: bold;">¥2,000</td>
            </tr>
			<?php foreach ($list_company as $key => $val):?>
				<tr>
					<td style="text-align:left; vertical-align:middle;" class="company"><?php echo $val->company_name;?></td>
					<td style="text-align:left; vertical-align:middle;" class="number_booth"><?php echo $val->number_booth;?></td>
					<td style="text-align:left; vertical-align:middle;" class="person_in_charge"><?php echo $val->person_in_charge;?></td>
					<td style="text-align:left; vertical-align:middle;" class="tel"><?php echo $val->tel;?></td>
					<td style="text-align:left; vertical-align:middle;" class="fax"><?php echo $val->fax;?></td>
					<td style="text-align:left; vertical-align:middle;" class="emergency_phone"><?php echo $val->emergency_tel;?></td>
					<td style="text-align:left; vertical-align:middle;" class="spot_100W"><?php echo $val->spot_100W;?></td>
					<td style="text-align:left; vertical-align:middle;" class="spot_500W"><?php echo $val->outlet_500W;?></td>
					<td style="text-align:left; vertical-align:middle;" class="primary_electric"><?php echo $val->primary_electric;?></td>
					<td style="text-align:left; vertical-align:middle;" class="distribution_board"><?php echo $val->distribution_board;?></td>
					<td style="text-align:left; vertical-align:middle;" class="electric_use"><?php echo $val->electric_use;?></td>
					<td style="text-align:left; vertical-align:middle;" class="optional_electric1"><?php echo $val->optional_electric1;?></td>
					<td style="text-align:left; vertical-align:middle;" class="optional_electric2"><?php echo $val->optional_electric2;?></td>
					<td style="text-align:left; vertical-align:middle;" class="optional_electric3"><?php echo $val->optional_electric3;?></td>
					<td style="text-align:left; vertical-align:middle;" class="optional_electric4"><?php echo $val->optional_electric4;?></td>
					<td style="text-align:left; vertical-align:middle;" class="optional_electric5"><?php echo $val->optional_electric5;?></td>
					<td style="text-align:left; vertical-align:middle;" class="optional_electric6"><?php echo $val->optional_electric6;?></td>
					<?php
					$total = $val->optional_electric1 * 3000 + $val->optional_electric2 * 3500 + $val->optional_electric3* 3500
					+ $val->optional_electric4* 3000 + $val->optional_electric5* 4000 + $val->optional_electric6 * 2000;
					?>
					<td style="text-align:left; vertical-align:middle;"class="total"><?php echo "¥".number_format($total); ?></td>
				</tr>

			<?php endforeach ?>
		</table>

		<div class="down_box">
			<input class=" download_btn download_btn_excel" value="申込み状況一覧　ダウンロード" onclick="tableToExcel('download1', '申込み状況一覧')"/>
			<input class="download_btn" value="備品申込一覧　ダウンロード" onclick="tableToExcel('testTable', '備品申込一覧')" />
			<input class="download_btn_excel4" value="電気工事申込　ダウンロード" />
			<input class="download_btn download_btn_excel_3" value="請求先一覧　ダウンロード" />
			<!-- <form method="post">
				<input class="download_btn" name="export_csv" type="submit" value="export"  />
			</form> -->
		</div>
	</div>
<!-- Table button 4  -->
<table class="table3excel noExl" style="display: none">
    <tr>
        <td style="width:250px;text-align:center">出展社名</td>
        <td style="width:80px;text-align:center">〒</td>
        <td style="width:150px;text-align:center">住所①</td>
        <td style="width:150px;text-align:center">住所②</td>
        <td style="width:150px;text-align:center">担当</td>
        <td style="width:100px;text-align:center">TEL</td>
        <td style="width:150px;text-align:center">FAX</td>
        <td style="width:80px;text-align:center">パッケージ</td>
        <td style="width:100px;text-align:center">電気</td>
        <td style="width:80px;text-align:center">備品</td>
        <td style="width:100px;text-align:center">合計</td>
    </tr>
    <?php foreach ($list_company as $key => $val):?>
    <tr style="padding: 10px 0px">
    	<td style="text-align:left;vertical-align: top;"><?php echo $val->company_name;?></td>
        <td style="text-align:left;vertical-align: top;"><?php echo $val->zipcode1; echo $val->zipcode2;?></td>
        <td style="text-align:left;vertical-align: top;"><?php echo $val->prefectures; echo $val->city; echo $val->address;?></td>
        <td style="text-align:left;vertical-align: top;"><?php echo $val->building_name;?></td>
        <td style="text-align:left;vertical-align: top;"><?php echo $val->person_in_charge;?></td>
        <td style="text-align:left;vertical-align: top;"><?php echo $val->tel;?></td>
        <td style="text-align:left;vertical-align: top;"><?php echo $val->fax;?></td>
        <td style="text-align:left;vertical-align: top;"><?php 
	        $fee_qty_booth=(float)($val->qty_booth_price);
	        echo "¥".number_format($fee_qty_booth);?>
        </td>
        <td style="text-align:left;vertical-align: top;"><?php 
	        $total=(($val->type1)+($val->type2))*12000+($val->optional_electric1)*3000+($val->optional_electric2)*3500+($val->optional_electric3)*3500+($val->optional_electric4)*3000+($val->optional_electric5)*4000+($val->optional_electric6)*2000;
	        echo "¥".number_format($total);
        ?>
        </td>
        <td style="text-align:left;vertical-align: top;"><?php 
        	$total_order=(float)($val->total_order);
        	echo "¥".number_format($total_order);?>
        </td>
        <td style="text-align:left;vertical-align: top;">
        	<?php
        	$total_rows=$val->qty_booth_price+(($val->type1)+($val->type2))*12000+($val->optional_electric1)*3000+($val->optional_electric2)*3500+($val->optional_electric3)*3500+($val->optional_electric4)*3000+($val->optional_electric5)*4000+($val->optional_electric6)*2000+($val->total_order);
        	echo " ¥".number_format($total_rows);
        	?>
        </td>
    </tr>
    <?php endforeach;?>
</table>
	<!--++++++++++++++++++++++++++++++++++++-->
</div>
<script>
	// Start Javascript Down Button 2 + button 1
	var tableToExcel = (function() {
	  var uri = 'data:application/vnd.ms-excel;base64,'
	    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
	    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
	    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
	  return function(table, name) {
	    if (!table.nodeType) table = document.getElementById(table)
	    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
	    window.location.href = uri + base64(format(template, ctx))
	  }
	})()
	// End Javascript Down Button 2

	$("input.download_btn_excel4").click(function(){
		$(function() {
			$(".table2excel2").table2excel({
				exclude: ".noExl",
				name: "Excel Document Name",
				filename: "電気工事申込",
				fileext: ".xls",
				exclude_img: true,
				exclude_links: true,
				exclude_inputs: true
			});
		});
	});
	$("input.download_btn_excel_3").click(function(){
		$(function() {
			$(".table3excel").table2excel({
				exclude: ".noExl",
				name: "請求先一覧",
				filename: "請求先一覧",
				fileext: ".xls",
				exclude_img: true,
				exclude_links: true,
				exclude_inputs: true
			});
		});
	});
</script>