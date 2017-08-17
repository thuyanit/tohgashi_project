<?php get_header();?>
<?php
if(isset($msg_mail_false)){
?>
<div id="content">
    <div class="main_content">
            <section id="completed" class="step3">
                <div class="top_content">
                    <h3>ブース出展申し込み2017</h3>
                    <h2>お申込みありがとうございます</h2>
                    <p class="notice">
                        Send failed. Please typing again!
                    </p>
                </div>
            </section>
    </div><!-- end main content -->
</div>
<?php
}
if(isset($msg_mail_true)){
?>
<div id="content">
    <div class="main_content">
            <section id="completed" class="step3">
                <div class="top_content">
                    <h3>ブース出展申し込み2017</h3>
                    <h2>お申込みありがとうございます</h2>
                    <p class="notice">
                        ご担当者様宛に、お申込み内容確認メールをお送りいたしました。 <br>
                        詳細につきましてはメール内容をご覧ください。
                    </p>
                </div>
            </section>
    </div><!-- end main content -->
</div>
<?php
}
else{
?>
<div id="content">
    <div class="main_content">
            <section id="completed" class="step3">
                <div class="top_content">
                    <h3>ブース出展申し込み2017</h3>
                    <h2>お申込みありがとうございます</h2>
                    <p class="notice">
                        Send failed. Please typing again!
                    </p>
                </div>
            </section>
    </div><!-- end main content -->
</div>
<?php } ?>