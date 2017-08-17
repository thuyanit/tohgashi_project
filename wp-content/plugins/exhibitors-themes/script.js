 jQuery(document).ready(function(){
    jQuery('#user_login').attr( "placeholder", "Email" );
    jQuery('#user_pass').attr( "placeholder", "Password" );
    jQuery('p#nav a').attr("href","http://zenchin-form.com/exhibitor/wp-login.php?action=lostpassword");
    jQuery('form#lostpasswordform').attr("action","http://zenchin-form.com/wp-login.php?action=lostpassword");
 });