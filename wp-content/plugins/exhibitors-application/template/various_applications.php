<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('exhibitors-application/css/style.css'); ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<div id="various_applications">
    <h1>危険物持込・裸日仕様許可</h1>
    <div class="group_btn">
	    <p><a href="<?php echo plugins_url('PDF/123.pdf'); ?>" download="危険物持込・裸日仕様許可.pdf">申請フォーマットダウンロード</a></p>
        <?php
        if($date1>=$now_date){
        ?>
            <p><a class="mailto" id="send1" key="<?php echo '危険物持込・裸日仕様許可 - '.$company->company_name. ' <' .$location_mail.'>'; ?>" href="">申請・図面送信</a></p>
        <?php   
        }
        else{
        ?>
            <p><a class="expries" data-notice="危険物持込・裸日仕様許可">申請・図面送信</a></p>
        <?php
        }
        ?>
    </div>

    <h1>給排水工事許可申請</h1>
    <div class="group_btn">
	    <p><a href="<?php echo plugins_url('PDF/123.pdf'); ?>" download="給排水工事許可申請.pdf">申請フォーマットダウンロード</a></p>
        <?php
        if($date2>=$now_date){
        ?>
        <p><a class="mailto" id="send2" key="<?php echo '給排水工事許可申請 - '.$company->company_name. ' <' .$location_mail.'>'; ?>" href="">申請・図面送信</a></p>
        <?php   
        }
        else{
        ?>
        <p><a class="expries" data-notice="給排水工事許可申請">申請・図面送信</a></p>
        <?php
        }
        ?>
    </div>

    <h1>ガス･エアー工事許可申請</h1>
    <div class="group_btn">
	    <p><a href="<?php echo plugins_url('PDF/123.pdf'); ?>" download="ガス･エアー工事許可申請.pdf">申請フォーマットダウンロード</a></p>
        <?php
        if($date3>=$now_date){
        ?>
            <p><a class="mailto" id="send3" key="<?php echo 'ガス･エアー工事許可申請 - '.$company->company_name. ' <' .$location_mail.'>'; ?>" href="">申請・図面送信</a></p>
        <?php   
        }
        else{
        ?>
        <p><a class="expries" data-notice="ガス･エアー工事許可申請">申請・図面送信</a></p>
        <?php
        }
        ?>
    </div>

    <h1>天井構造・バルーン届出</h1>
    <div class="group_btn">
	    <p><a href="<?php echo plugins_url('PDF/123.pdf'); ?>" download="天井構造・バルーン届出.pdf">申請フォーマットダウンロード</a></p>
        <?php
        if($date4>=$now_date){
        ?>
            <p><a class="mailto" id="send4" key="<?php echo '天井構造・バルーン届出 - '.$company->company_name. ' <' .$location_mail.'>'; ?>" href="">申請・図面送信</a></p>
        <?php   
        }
        else{
        ?>
        <p><a class="expries" data-notice="天井構造・バルーン届出">申請・図面送信</a></p>
        <?php
        }

        ?>
    </div>

    <h1>アンカー打設作業承認申請</h1>
    <div class="group_btn">
	    <p><a href="<?php echo plugins_url('PDF/123.pdf'); ?>" download="アンカー打設作業承認申請.pdf">申請フォーマットダウンロード</a></p>
        <?php
        if($date5>=$now_date){
        ?>
            <p><a class="mailto" id="send5" key="<?php echo 'アンカー打設作業承認申請 - '.$company->company_name. ' <' .$location_mail.'>'; ?>" href="">申請・図面送信</a></p>
        <?php   
        }
        else{
        ?>
        <p><a class="expries" data-notice="アンカー打設作業承認申請">申請・図面送信</a></p>
        <?php
        }

        ?>
    </div>

    <h1>飲食権申込書</h1>
    <div class="group_btn">
	    <p><a href="<?php echo plugins_url('PDF/123.pdf'); ?>" download="飲食権申込書.pdf">申請フォーマットダウンロード</a></p>
        <?php
        if($date6>=$now_date){
        ?>
        <p><a class="mailto" id="send6" key="<?php echo '飲食権申込書 - '.$company->company_name. ' <' .$location_mail.'>'; ?>" href="">申請・図面送信</a></p>
        <?php   
        }
        else{
        ?>
        <p><a class="expries" data-notice="飲食権申込書">申請・図面送信</a></p>
        <?php
        }

        ?>
	</div>

<form action="" method="post">
	<input type="hidden" name="click_button" value="">
	<input type="hidden" name="togashi_id" value="<?php echo $company->id; ?>">
	<input type="hidden" name="email_dk" value="<?php echo $company->email_dk; ?>">
	<input type="hidden" name="location" value="<?php echo $local_ex; ?>">
</form>
	
<script>
$(".group_btn a.mailto").each(function(){
    var getSubject = $(this).attr("key");
    var organizer = 'ms.thuyanit@gmail.com';
    $(this).attr('href','mailto:'+organizer+'?subject='+getSubject+'');
});
</script>
<script type="text/javascript">  
$(".group_btn a.mailto").click(function(e){
    e.preventDefault();
     var click = $(this).attr('id');
     var togashi_id = $('input[name=togashi_id]').val();
     var email_dk = $('input[name=email_dk]').val();
     var location = $('input[name=location]').val();
     $('input[name=click_button]').val(click);
     var click_button = $('input[name=click_button]').val();
     //alert(click_button);
     //alert(''+togashi_id+email_dk+location+''); 
     $.ajax({
            url : 'http://zenchin-form.com/wp-content/plugins/exhibitors-application/save_cache.php',
            type : 'post',
            data : {
            click_button : click_button,
            togashi_id   : togashi_id,
            email_dk     : email_dk,
            location     : location
            },
            success : function (result)
            {
                //alert(result);
            }
        });       
});
//notice dealine
$("a.expries").click(function(){
    var notice = $(this).attr('data-notice');
    alert(''+notice+'登録\nの期限が切られています。\n管理者へお知らせください。');
    window.location = "http://zenchin-form.com/exhibitor/wp-admin/";
});
</script>
