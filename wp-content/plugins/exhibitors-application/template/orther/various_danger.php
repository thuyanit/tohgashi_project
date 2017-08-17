<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('exhibitors-application/css/style.css'); ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<div id="various_applications">
    <h1>危険物持込・裸火使用許可</h1>
    <form action="" method="post">
        <div class="group_btn">
    	    <p><a href="<?php echo plugins_url($PDF); ?>" download="危険物持込・裸火使用許可.pdf">申請フォーマットダウンロード</a></p>
            <?php
            if($date1>=$now_date){
            ?>
                <p><a class="mailto" id="send1" target="_blank" key="<?php echo '危険物持込・裸火使用許可 - '.$company->company_name. ' <' .$location_mail.'>'; ?>" href="">申請・図面送信</a></p>
            <?php   
            }
            else{
            ?>
                <p><a class="expries" data-notice="危険物持込・裸火使用許可">申請・図面送信</a></p>
            <?php
            }
            ?>
        </div>
    	<input type="hidden" name="togashi_id" value="<?php echo $company->id; ?>">
    	<input type="hidden" name="email_dk" value="<?php echo $company->email_dk; ?>">
    	<input type="hidden" name="location" value="<?php echo $local_ex; ?>">
    </form>
    <!--<a href="mailto:yourbestfriend@example.com?subject=registerProtocolHandler()%20FTW!&amp;body=Check%20out%20what%20I%20learned%20at%20http%3A%2F%2Fupdates.html5rocks.com%2F2012%2F02%2FGetting-Gmail-to-handle-all-mailto-links-with-registerProtocolHandler%0A%0APlus%2C%20flawless%20handling%20of%20the%20subject%20and%20body%20parameters.%20Bonus%20from%20RFC%202368!" target="_blank">this mailto: link</a>-->
	
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
    if(empty($ck_dangrous)){
        $wpdb->insert(
                'cache_dangrous',
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