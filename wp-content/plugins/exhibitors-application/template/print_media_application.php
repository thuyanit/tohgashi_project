<!-- <link rel="stylesheet" type="text/css" href="<?php //echo plugins_url('exhibitors-application/css/screen_media.css'); ?>" media="screen, projection"> -->
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('exhibitors-application/css/print_media.css'); ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
function myFunction() {
    window.print();
}
</script>
<div class="print_foundation">
 <!-- <input type="image" src="<?php //echo plugins_url('exhibitors-application/images/btn_print.jpg'); ?>" alt="プリントアウトする" onclick="window.print();"> -->
  <input class="btn_print" type="button" value="プリントアウトする" onclick="myFunction();">
<div id="information">
    <form id="information_form">
        <div class="info_company">
            <div class="input_form">
                <label for="">会社名 </label>
                <div class="input">
                    <p><?php echo $profile->company_name; ?></p>
                </div>
            </div><!-- end input_form 1-->
            <div class="input_form">
                <label for="">代表者 氏名 </label>
                <div class="input group_name">
                    <span><?php echo $profile->family_name; ?><?php echo $profile->given_name; ?></span>
                </div>
            </div><!-- end input_form 2-->
            <div class="input_form">
                <label for="">出展社名 </label>
                <div class="input">
                   <p><?php echo $profile->exhibitors_name; ?></p>
                </div>
            </div><!-- end input_form 3-->
            <div class="input_form">
                <label for="">出展商品サービス名 </label>
                <div class="input">
                   <p><?php echo $profile->exhibition_service_name; ?></p>
                </div>
            </div><!-- end input_form 4-->
            <div class="input_form">
                <label for="">ご担当者名</label>
                <div class="input">
                    <p><?php echo $profile->person_in_charge; ?></p>
                </div>
            </div><!-- end input_form 5-->
            <div class="input_form">
                <label for="">ご担当者 部署</label>
                <div class="input">
                    <p><?php echo $profile->position; ?></p>
                </div>
            </div><!-- end input_form 6-->
            <div class="input_form col4">
                <label for="">郵便番号 </label>
                <div class="input input1">
                	<p><?php echo $profile->zipcode1; ?> - <?php echo $profile->zipcode2; ?></p>
                </div>
                <label class="label2" for="">都道府県 </label>
                <div class="input input2">
                   <p><?php echo $profile->prefectures; ?></p>
                </div>
            </div><!-- end input_form 7-->
            <div class="input_form col4">
                <label for="">市区 </label>
                <div class="input input1">
                    <p><?php echo $profile->city; ?></p>
                </div>
                <label class="label2" for="">町村番地 </label>
                <div class="input input2">
                    <p><?php echo $profile->address; ?></p>
                </div>
            </div><!-- end input_form 8-->
            <div class="input_form">
                <label for="">ビル・マンション名</label>
                <div class="input">
                    <p><?php echo $profile->building_name; ?></p>
                </div>
            </div><!-- end input_form 9-->
            <div class="input_form">
                <label for="">電話番号 </label>
                <div class="input">
                    <p><?php echo $profile->tel; ?></p>
                </div>
            </div><!-- end input_form 10-->
            <div class="input_form">
                <label for="">Fax番号 </label>
                <div class="input">
                    <p><?php echo $profile->fax; ?></p>
                </div>
            </div><!-- end input_form 11-->
            <div class="input_form">
                <label for="">E-mail </label>
                <div class="input">
                    <p><?php echo $profile->email_dk; ?></p>
                </div>
            </div><!-- end input_form 12-->
            <div class="input_form">
                <label for="">公式サイト掲載URL</label>
                <div class="input">
                    <p><?php echo $profile->url; ?></p>
                </div>
            </div><!-- end input_form 13-->
            <div class="input_form">
                <label for="">緊急連絡先 </label>
                <div class="input">
                    <?php echo $profile->emergency_tel; ?>
                </div>
            </div><!-- end input_form 14-->
        </div>
    </form>
</div>


<?php if(!empty($checkdata)): ?>
<div id="confirm_foundation" class="view_foundation_construction">

	<div class="top_content">
		<h1>出展基礎・工事（基礎工事）</h1>
	</div>
	<?php
    $data_select=unserialize($checkdata->info);
    ?>
	<form action="" method="post" class="confirm_foundation">
		<?php 
		if( ($data_select['package']=="施工業者無し")||($data_select['package']=="事務局指定業者に依頼する（トーガシ）")):?>
			<div class="block_content info_constract">
				<div class="input_form">
					<label for="">装飾業者指定<br>ブース内装飾施工</label>
					<div class="input">
						<p><?php echo $data_select['package']; ?></p>
					</div>
				</div><!-- end input_form 1-->
			</div>
			
		<?php endif; ?>
		
		<?php if($data_select['package']=="パッケージブースを申し込む"):?>
			<div class="block_content info_constract">
				<div class="input_form">
					<label for="">装飾業者指定<br>ブース内装飾施工</label>
					<div class="input">
						<p><?php echo $data_select['package'];?></p>
					</div>
				</div><!-- end input_form 1-->
				<div class="input_form">
					<label for="">パッケージ申込み小間数</label>
					<div class="input">
						<p><?php echo $data_select['qty_booth'];?></p>
					</div>
				</div><!-- end input_form 2-->
				<div class="input_form">
					<label for="">カーペット色</label>
					<div class="input">
						<p><?php echo $data_select['carpet_color'];?></p>
					</div>
				</div><!-- end input_form 3-->
				<div class="input_form">
					<label for="">Price Package</label>
					<div class="input">
						<p>
						<?php 
							if($data_select['qty_booth']==1){
								echo "¥53,000";
							}
							if($data_select['qty_booth']==2){
								echo "¥94,000";
							}
							if($data_select['qty_booth']==3){
								echo "¥147,000"; 
							}
						?>
						</p>
					</div>
				</div><!-- end input_form 4-->
			</div>
		<?php endif; ?>
		
		<?php 
		if( $data_select['package']=="事務局指定業者以外に依頼する"):?>
		<div class="block_content info_constract">
			<div class="input_form">
				<label for="">装飾業者指定<br>ブース内装飾施工</label>
				<div class="input">
					<p><?php echo $data_select['package'];?></p>
				</div>
			</div><!-- end input_form 1-->
			<div class="input_form">
				<label for="">施工業者</label>
				<div class="input group_name">
					<p><?php echo $data_select['name_company_supplier'];?></p>
				</div>
			</div><!-- end input_form 2-->
			<div class="input_form">
				<label for="">郵便番号 </label>
				<div class="input">
					<p><?php echo $data_select['zip1'];echo $data_select['zip2'];?></p>
				</div>
			</div><!-- end input_form 3-->
			<div class="input_form">
				<label for="">住所 </label>
				<div class="input">
					<p><?php echo $data_select['address'];?></p>
				</div>
			</div><!-- end input_form 4-->
			<div class="input_form">
				<label for="">担当者</label>
				<div class="input">
					<p><?php echo $data_select['person_in_change'];?></p>
				</div>
			</div><!-- end input_form 5-->
			<div class="input_form">
				<label for="">電話番号</label>
				<div class="input">
					<p><?php echo $data_select['tel'];?></p>
				</div>
			</div><!-- end input_form 6-->
			<div class="input_form">
				<label for="">FAX番号</label>
				<div class="input">
					<p><?php echo $data_select['fax'];?></p>
				</div>
			</div><!-- end input_form 7-->
			<div class="input_form">
				<label for="">メールアドレス </label>
				<div class="input">
					<p><?php echo $data_select['email'];?></p>
				</div>
			</div><!-- end input_form 8-->
		</div>
		<!--file đính kèm  -->
	
		<?php endif; ?>

		<!--  Name Template - add 21-07-2017  -->
		<div class="block_content">
			<div class="input_form">
				<label for="">出展者バッジ </label>
				<div class="input ">
					<p>
						<?php echo $data_select['nameplate'];?>
						<span style="margin-left:30px">
							<?php if($data_select['nameplate']=='会期中のを追加する'):
								echo $data_select['number_nameplate'].'枚';
							endif;?>
						</span>
					</p>
				</div>
			</div><!-- end input_form 10-->
		</div>
		<!--  End nameplate -number_nameplate  -->

		<!--  Roof -Company name plate - Table/Chair  -->
		<div class="block_content">
			<div class="input_form">
				<label for="">荷物運搬車 </label>
				<div class="input input_collapse">
					<div><?php echo $data_select['car'];?></div>
					<div><p><?php echo $data_select['qty_car'] ;?></p><p><?php echo $data_select['model_car'];?></p></div>
					<div><p><?php echo $data_select['from_time'];?></p><p><?php echo $data_select['to_time'];?></p></div>
					<!-- Add 2 more form (same item) -->
					<div><p><?php echo $data_select['qty_car2'] ;?></p><p><?php echo $data_select['model_car2'];?></p></div>
					<div><p><?php echo $data_select['from_time2'];?></p><p><?php echo $data_select['to_time2'];?></p></div>

					<div><p><?php echo $data_select['qty_car3'] ;?></p><p><?php echo $data_select['model_car3'];?></p></div>
					<div><p><?php echo $data_select['from_time3'];?></p><p><?php echo $data_select['to_time3'];?></p></div>
					<!-- End add -->
				</div>
			</div><!-- end input_form 10-->
			<div class="input_form">
				<label for="">パラペット </label>
				<div class="input">
					<p><?php echo $data_select['roof'];?></p>
				</div>
			</div><!-- end input_form 10-->
			<div class="input_form col4">
				<label for="">社名版 </label>
				<div class="input input1">
					<p><?php echo $data_select['company_name_plate'];?></p>
				</div>
				<label class="label2" for="">社名版表記 </label>
				<div class="input input2">
					<p>
						<?php echo $data_select['company_name_plate_reg'];?>
					</p>
				</div>
			</div><!-- end input_form 7-->
			 <div class="input_form col4">
				<label for="">テーブル </label>
				<div class="input input1">
					<p><?php echo $data_select['table'];?></p>
				</div>
				<label class="label2" for="">折りたたみイス </label>
				<div class="input input2">
					<p><?php echo $data_select['chair'];?></p>
				</div>
			</div><!-- end input_form 8-->
		</div>
		<!-- -->
		<div class="block_content electrical_construction">
			<div class="input_form">
				<label for="">電気工事申込み<br>小間内２次電気工事</label>
				<div class="input">
					<p><?php echo $data_select['package_electrical'];?></p>
				</div>
			</div><!-- end input_form 1-->
			<?php if($data_select['package_electrical']=="自社で工事業者を手配する"):?>
			<div class="input_form">
				<label for="">施工業者</label>
				<div class="input group_name">
					<p><?php echo $data_select['name_company_supplier2'];?></p>
				</div>
			</div><!-- end input_form 2-->
			<div class="input_form">
				<label for="">郵便番号 </label>
				<div class="input">
					<p><?php echo $data_select['zip3'];echo $data_select['zip4'];?></p>
				</div>
			</div><!-- end input_form 3-->
			<div class="input_form">
				<label for="">住所 </label>
				<div class="input">
					<p><?php echo $data_select['address2'];?></p>
				</div>
			</div><!-- end input_form 4-->
			<div class="input_form">
				<label for="">担当者</label>
				<div class="input">
					<p><?php echo $data_select['person_in_change2'];?></p>
				</div>
			</div><!-- end input_form 5-->
			<div class="input_form">
				<label for="">電話番号</label>
				<div class="input">
					<p><?php echo $data_select['tel2'];?></p>
				</div>
			</div><!-- end input_form 6-->
			<div class="input_form">
				<label for="">FAX番号</label>
				<div class="input">
					<p><?php echo $data_select['fax2'];?></p>
				</div>
			</div><!-- end input_form 7-->
			<div class="input_form">
				<label for="">メールアドレス </label>
				<div class="input">
					<p><?php echo $data_select['email2'];?></p>
				</div>
			</div><!-- end input_form 8-->
			<?php endif; ?>
		</div>
		<!--       group_radio group_radio_2     -->
		<div class="block_content label_w200">
			<div class="input_form">
				<label for="">天井構造・バルーン届け出</label>
				<div class="input">
					<p><?php echo $data_select['ceiling_structure'];?></p>
				</div>
			</div><!-- end input_form 1-->
			<div class="input_form">
				<label for="">危険物持込・裸火使用</label>
				<div class="input">
					<p><?php echo $data_select['use_of_fire'];?></p>
				</div>
			</div><!-- end input_form 2-->
			<div class="input_form">
				<label for="">給排水・ガス・エアー工事</label>
				<div class="input">
					<p><?php echo $data_select['drainage_construction'];?></p>
				</div>
			</div><!-- end input_form 3-->
			<div class="input_form">
				<label for="">アンカー打設作業承認</label>
				<div class="input">
					<p><?php echo $data_select['anchor_construction'];?></p>
				</div>
			</div><!-- end input_form 4-->
		</div>
		<!--  Billing Address    -->
		<div class="block_content label_w200">
			<div class="input_form">
				<label for="">請求先確認</label>
				<div class="input">
					<p><?php echo $data_select['payment'];?></p>
				</div>
			</div><!-- end input_form 1-->
		</div>
	</form>
</div><!-- end Confirm Foundation  -->
</div><!-- Print foundation -->
<?php endif; ?>
 <script type="text/javascript">
/*--This JavaScript method for Print command--*/
    function PrintDoc() {
        var toPrint = document.getElementById('printarea');
        var popupWin = window.open('', '_blank', 'width=350,height=150,location=no,left=200px');
        popupWin.document.open();
        popupWin.document.write('<html><title>::Preview::</title><link rel="stylesheet" type="text/css" href="print.css" /></head><body onload="window.print()">')
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.write('</html>');
        popupWin.document.close();
    }
/*--This JavaScript method for Print Preview command--*/
    function PrintPreview() {
        var toPrint = document.getElementById('printarea');
        var popupWin = window.open('', '_blank', 'width=350,height=150,location=no,left=200px');
        popupWin.document.open();
        popupWin.document.write('<html><title>::Print Preview::</title><link rel="stylesheet" type="text/css" href="Print.css" media="screen"/></head><body">')
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.write('</html>');
        popupWin.document.close();
    }
</script>