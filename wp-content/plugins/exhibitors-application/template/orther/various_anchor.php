<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('exhibitors-application/css/style.css'); ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<div id="various_applications">

    <h1>アンカー打設作業承認申請</h1>
<form action="" method="post">
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
$(".group_btn a.mailto").click(function(){
     // e.preventDefault();
    $("form").submit();
});
//notice dealine
$("a.expries").click(function(){
    var notice = $(this).attr('data-notice');
    alert(''+notice+'登録\nの期限が切られています。\n管理者へお知らせください。');
    window.location = "http://zenchin-form.com/exhibitor/wp-admin/";
});
</script>
<?php
if($_POST){
    global $wpdb;
    $id=$_POST["togashi_id"];
    $email= $_POST["email_dk"];
    $local_ex=$_POST["location"];
    $d=getdate();
    $date=$d['year']."-".$d['mon']."-".$d['mday'];
    if(empty($ck_anchor)){
        $wpdb->insert(
                'cache_anchor',
                array(
                    'togashi_id'=>$id,
                    'email_dk' => $email,
                    'location'=> $local_ex,
                    'status' => 1,
                    'date_send'=>$date
                ),
                array(
                    '%d',
                    '%s',
                    '%d',
                    '%s',
                    '%s'
                )
        );
    }
}
?>

