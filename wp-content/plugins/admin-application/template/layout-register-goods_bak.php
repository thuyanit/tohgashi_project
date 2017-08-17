<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('admin-application/css/style.css'); ?>">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div id="dashboard">
	<div class="register_amenity_goods">
		<h2 class="title">レンタル備品 登録</h2>
        <form class="form_register_amenity_goods" enctype="multipart/form-data" action="" method="post">
            <div class="input_form">
                <label for="">備品名</label>
                <div class="input">
                    <input type="text" name="item_name" value="">
                    <a class="add_spec"><i class="fa fa-plus" aria-hidden="true"></i>仕様</a>
                    <a class="sub_spec"><i class="fa fa-minus" aria-hidden="true"></i>仕様</a>
                </div>
            </div>
            <div class="input_form input_price_item">
                <label for="">価格</label>
                <div class="input">
                    <input type="text" name="item_price" value="">
                </div>
            </div>
            <div class="input_form frame_spec">
                <label for="">仕様</label>
                <div class="input" data-role="dynamic-fields">
                    <!-- <textarea name="specification" value=""></textarea> -->
                    <div class="form-inline">
                        <input type="text" class="form-control" name="quantity_stock[]" id="field-name" placeholder="備品番号">
                        <input type="text" class="form-control" name="specification[]" id="field-name" placeholder="仕様">
                        <input type="text" class="form-control" name="gia[]" id="field-name" placeholder="価格">
                        <select name="check[]">
                            <option value="1">公開</option>
                            <option value="0">非公開</option>
                        </select>
                        <button class="bodi" data-role="remove"><i class="fa fa-minus" aria-hidden="true"></i></button>
                        <button class="themzo" data-role="add"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
            <div class="input_form">
                <label for="">画像登録</label>
                <div class="input" id="output_img">
                    <p><span id="upload_button">ファイルを参照</span></p>
                </div>
            </div>
            <div class="input_form">
                <label for="">公開設定</label>
                <div class="input group_publish">
                    <input type="radio" name="publish" value="1" id="chk1" checked><label for="chk1"><span></span>公開　</label>
                    <input type="radio" name="publish" value="0" id="chk2"><label for="chk2"><span></span>非公開　</label>
                </div>
            </div>
            <hr noshade="" size="1px" color="#dee1e2">
            <div class="button_group">
            <input type="submit" value="登　録" class="registration">
            </div>
        </form>
        
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($){
  var mediaUploader;
  $('#upload_button').click(function(e) {
    e.preventDefault();
    // If the uploader object has already been created, reopen the dialog
      if (mediaUploader) {
      mediaUploader.open();
      return;
    }
    //Extend the wp.media object
    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose Image',
      button: {
      text: 'Choose Image'
    }, multiple: true, });

    // When a file is selected, grab the URL and set it as the text field's value
    // mediaUploader.on('select', function() {
    //   attachment = mediaUploader.state().get('selection').first().toJSON();
    //   $('#image-url').val(attachment.url);
    // });

    mediaUploader.on('select', function() {
        var selection = mediaUploader.state().get('selection');
        selection.map( function( attachment ) {
            attachment = attachment.toJSON();
            $("#output_img").append("<p><input class='input_image' name='file_image[]' value="+attachment.url+" readonly /></p>");
        });
    });
    // Open the uploader dialog
    mediaUploader.open();
  });
});
</script>

<script type="text/javascript">
$(function() {
    // Remove button click
    $(document).on(
        'click',
        '[data-role="dynamic-fields"] > .form-inline [data-role="remove"]',
        function(e) {
            e.preventDefault();
            $(this).closest('.form-inline').remove();
        }
    );
    // Add button click
    $(document).on(
        'click',
        '[data-role="dynamic-fields"] > .form-inline [data-role="add"]',
        function(e) {
            e.preventDefault();
            var container = $(this).closest('[data-role="dynamic-fields"]');
            new_field_group = container.children().filter('.form-inline:first-child').clone();
            new_field_group.find('input').each(function(){
                $(this).val('');
            });
            container.append(new_field_group);
        }
    );
});
</script>
<script type="text/javascript">
$(".frame_spec").hide();
$(".sub_spec").hide();
$(".add_spec").click(function(){
    $(".frame_spec").show();
    $(".input_price_item").hide();
    $(".sub_spec").show();
    $(".add_spec").hide();

});
$(".sub_spec").click(function(){
    $(".frame_spec").hide();
    $(".input_price_item").show();
    $(".add_spec").show();
    $(".sub_spec").hide();
    $("frame_spec input").val("");
});


</script>
