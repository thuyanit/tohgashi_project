<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('exhibitors-application/css/style.css'); ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div id="basic_appication">
	<div class="head">
		<a href="<?php echo admin_url('admin.php?page=foundation');?>">出展基本申込み <span>申込み期限 <?php echo $date_f;?></span></a>
		<a class="active" href="<?php echo admin_url('admin.php?page=construction');?>">工事申込・各種申請 <span>申込み期限 <?php echo $date_c;?></span></a>
	</div>
	<form id="construction_form" action="" method="post">
		<div class="group_radio">
			<div>２次側電気利用申請<br>24時間送電</div>
			<div>
				<label>
					<input type="radio" name="electric_use" class="need" value="必要" />
					<span></span>必要　
				</label>
			</div>
			<div>
				<label>
					<input type="radio" name="electric_use" class="noneed" value="不要" />
					<span></span>不要
				</label>
			</div>
		</div>
		<div class="content_construction">
			<div class="input_form field_fill">
				<label for="">100V電力</label>
				<p><input type="number" name="100V" id="100V" min="0" value="" class="w175"><span>kw</span></p>
			</div><!--- line 1 nhà thầu-->
			<div class="input_form field_fill">
				<label for="">200V電力</label>
				<p>
					<input type="number" name="200V" id="200V" min="0" value="" class="w175"><span>kw</span>
					<span>合計</span>
					<input type="text" name="total_kw" id="total_kw" value="" class="w175" readonly>
					<span>kw × ¥12,000-</span>
				</p>
			</div><!--- line 1 nhà thầu-->
			<div class="option_construction">
				<p class="title_option">2次側電気配線工事</p>
				<div class="content_left">
					<div class="input_form">
						<label for="">アームスポット</label>
						<p>
							<span>¥3,000</span>
							<input type="number" name="optional_electric1" id="optional_electric1" min="0" value="" class="w175">
							<span>灯</span>
						</p>
					</div><!--- line 1 nhà thầu-->
					<div class="input_form">
						<label for="">アームスポット</label>
						<p>
							<span>¥3,500</span>
							<input type="number" name="optional_electric2" id="optional_electric2" min="0" value="" class="w175">
							<span>灯</span>
						</p>
					</div><!--- line 1 nhà thầu-->
					<div class="input_form">
						<label for="">アームスポット</label>
						<p>
							<span>¥3,500</span>
							<input type="number" name="optional_electric3" id="optional_electric3" min="0" value="" class="w175">
							<span>灯</span>
						</p>
					</div><!--- line 1 nhà thầu-->
					<div class="input_form">
						<label for="">アームスポット</label>
						<p>
							<span>¥3,000</span>
							<input type="number" name="optional_electric4" id="optional_electric4" min="0" value="" class="w175">
							<span>個</span>
						</p>
					</div><!--- line 1 nhà thầu-->
					<div class="input_form">
						<label for="">アームスポット</label>
						<p>
							<span>¥4,000</span>
							<input type="number" name="optional_electric5" id="optional_electric5" min="0" value="" class="w175">
							<span>個</span>
						</p>
					</div><!--- line 1 nhà thầu-->
					<div class="input_form">
						<label for="">アームスポット</label>
						<p>
							<span>¥2,000</span>
							<input type="number" name="optional_electric6" id="optional_electric6" min="0" value="" class="w175">
							<span>kw</span>
						</p>
					</div><!--- line 1 nhà thầu-->
				</div><!-- End content left  -->
				<div class="content_right">
					<img src="<?php echo plugins_url('exhibitors-application/images/image_construction.jpg'); ?>"/>
					<div class="input" id="attachment_file2">
	                    <!--<p><span id="upload_button2">図面添付</span></p>-->
	                    <input id="upload_button2" type="button" class=" " value="図面添付" readonly/>
	                    <input type="text" class="input_image" id="image_url2" name="attachment_file2" readonly />
	                </div>
				</div><!-- End content right  -->
			</div><!-- End OPTION -->
		</div><!-- End content Form  -->
		<input name="submit_construction" id="submit_construction" value="確　定" readonly />
	</form>
	<!-- <div id="end_form_construction">
		<div>
			<p>天井構造・バルーン届け出</p>
			<p>天井構造・バルーン届け出</p>
			<p>天井構造・バルーン届け出</p>
			<p>天井構造・バルーン届け出</p>
		</div>
		<div>
			<p><a href="">申込みフォーマットダウンロード</a></p>
			<p><a href="">申込みフォーマットダウンロード</a></p>
			<p><a href="">申込みフォーマットダウンロード</a></p>
			<p><a href="">申込みフォーマットダウンロード</a></p>
			
		</div>
		<div>
			<p><a href="">申込みフォーマットと図面を送信</a></p>
			<p><a href="">申込みフォーマットと図面を送信</a></p>
			<p><a href="">申込みフォーマットと図面を送信</a></p>
			<p><a href="">申込みフォーマットと図面を送信</a></p>
		</div>
	</div>
	<p class="notice_end">申込みフォーマットに押印し、図面と一緒に送信してください</p> -->
</div>
<script>
	$('#construction_form .field_fill input[type=number]').change(function(){
		var use100V = $("#100V").val();
		var use200V = $("#200V").val();
		var use100V_number =parseFloat(use100V);
		var use200V_number =parseFloat(use200V);
		var total_kw;
		if(use100V!=""&&use200V!=""){
			total_kw = use100V_number+use200V_number;
			$('#construction_form').find('input[name="total_kw"]').val(total_kw);
		}
		if(use100V==""){
			total_kw = use200V_number;
			$('#construction_form').find('input[name="total_kw"]').val(total_kw);
		}
		if(use200V==""){
			total_kw = use100V_number;
			$('#construction_form').find('input[name="total_kw"]').val(total_kw);
		}
		if(use100V==""&&use200V==""){
			$('#construction_form').find('input[name="total_kw"]').val(0);
		}
	});
	
	// $('#construction_form .group_radio input[class="need"]').click(function(){
	// 	   	$('.content_construction .field_fill').fadeIn();
	// });
	// $('#construction_form .group_radio input[class="noneed"]').click(function(){
	// 	   	$('.content_construction .field_fill').hide();
 //    		$('.content_construction .field_fill input').val('');
	// });
	
	
	$("#submit_construction").click(function(){
		var electric_use = $('input[name=electric_use]:checked','#construction_form').val();
		var use100V = $("#100V").val();
		var use200V = $("#200V").val();
    	if(electric_use=="必要")
    	{
    		if(use100V == ""||use200V == "")
			{
				$('html, body').animate({scrollTop: '0px'}, 1000);
				if(use100V=="" || use100V==null)
	            {
	                $("#100V").addClass("field_not_valid");
	                 
	            }
	            else
	            {
	                $("#100V").removeClass("field_not_valid"); 
	            }
	            if(use200V=="" || use200V==null)
	            {
	                $("#200V").addClass("field_not_valid");
	                 
	            }
	            else
	            {
	                $("#200V").removeClass("field_not_valid"); 
	            }
			}
			else{
				$("#construction_form").submit();
			}
    	}
    	if(electric_use=="不要")
    	{
    		$("#construction_form").submit();
    	}
    	if(electric_use==null){
    		alert("Please choose");
    	}
		
	});
</script>
	<script type="text/javascript">
	// jQuery(document).ready(function($){
	//   var mediaUploader;
	//   $('#upload_button2').click(function(e) {
	//     e.preventDefault();
	//     // If the uploader object has already been created, reopen the dialog
	//       if (mediaUploader) {
	//       mediaUploader.open();
	//       return;
	//     }
	//     //Extend the wp.media object
	//     mediaUploader = wp.media.frames.file_frame = wp.media({
	//       title: 'Choose Image',
	//       button: {
	//       text: 'Choose Image'
	//     }, multiple: true, });
	//     mediaUploader.on('select', function() {
	//         var selection = mediaUploader.state().get('selection');
	//         selection.map( function( attachment ) {
	//             attachment = attachment.toJSON();
	//             $("#attachment_file2").append("<p class='list_attachment_file'><input class='input_image' name='image[]' value="+attachment.url+" readonly /></p>");
	//         });
	//     });
	//     // Open the uploader dialog
	//     mediaUploader.open();
	//   });
	// });
	</script>
<script type="text/javascript">
jQuery(document).ready(function($){

  var mediaUploader;

  $('#upload_button2').click(function(e) {
    e.preventDefault();
    // If the uploader object has already been created, reopen the dialog
      if (mediaUploader) {
      mediaUploader.open();
      return;
    }
    // Extend the wp.media object
    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose Image',
      button: {
      text: 'Choose Image'
    }, multiple: false });

    // When a file is selected, grab the URL and set it as the text field's value
    mediaUploader.on('select', function() {
      attachment = mediaUploader.state().get('selection').first().toJSON();
      $('#image_url2').val(attachment.url);
    });
    // Open the uploader dialog
    mediaUploader.open();
  });

});
</script>
			