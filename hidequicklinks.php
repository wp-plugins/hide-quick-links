<?php
/*
Plugin Name: Hide Quick Links
Plugin URI: http://www.mclanka.com
Description: This plugin hides the quick links in wordpress 3.3
Author: Udara Madushan
Version: 1.0
Author URI: http://udara.mclanka.com
*/
function controller(){
    echo '<link rel="stylesheet" type="text/css" href="' .plugins_url('wp-admin.css', __FILE__). '">';
    echo'<style type="text/css">';
    $wp_links=get_option('wp_links');

     $plugin_link=get_option('plugin_link');
      $comment_link=get_option('comment_link');
       $option_link=get_option('option_link');

    if($wp_links=='y'){
        echo '#wp-admin-bar-wp-logo {
               display: none;
               }';
    }else{
        echo '#wp-admin-bar-wp-logo {
               display: block;
               }';

    }
    if($plugin_link=='y'){
        echo '#wp-admin-bar-updates {
               display: none;
               }';
    }else{
        echo '#wp-admin-bar-updates {
               display: block;
               }';

    }
     if($comment_link=='y'){
        echo '#wp-admin-bar-comments {
               display: none;
               }';
    }else{
        echo '#wp-admin-bar-comments {
               display: block;
               }';

    }
    if($option_link=='y'){
        echo '#wp-admin-bar-new-content{
               display: none;
               }';
    }else{
        echo '#wp-admin-bar-new-content {
               display: block;
               }';
    }   
    echo '</style>';
}
 add_action('admin_head', 'controller');
function control_panel(){
    add_options_page(
            'Manage Qick Links',
            'Manage Qick Links',
            'manage_options',
            __FILE__,
            'update_settings'
            );
}
add_action('admin_menu','control_panel');
function update_settings(){
?>
     <style type="text/css">

        div.message {
    background: none repeat scroll 0 0 #7C7B79;
    border: 2px solid white;
    border-radius:12px;
    color: white;
    font-size: 14px;
    font-weight: bold;
    margin: 10px auto;
    padding: 10px;
    text-align: center;
    width: 500px;
}
        div.plug_form{
            width:500px;
            margin:auto;
            margin-top:30px;
            height: 280px;
            padding:10px;
            background: url(<?php bloginfo('url');?>/wp-content/plugins/hide-quick-links/form-bg.png) no-repeat;

        }

        div.plug_form label {
    display: block;
    font-size: 13px;
    font-weight: bold;
    margin: 6px;
    padding: 5px;
    width: 152px;
}

div.plug_form table{
	width:415px;
	
}

         div.plug_form input.text {
    background: none repeat scroll 0 0 #666666;
    border: 2px solid white;
    border-radius: 5px 5px 5px 5px;
    color: white;
    margin: 3px;
    text-align: center;
    width: 50px;
}
p.genaral-message {
    color: darkRed;
    font-size: 12px;
    font-weight: bold;
   padding-left: 10px;
}
ul.plugin-ul li{
    color: darkRed;
    list-style: disc outside none;
    margin-left: 23px;

}
.bottom-info {
    font-size: 20px;
    margin: 20px auto auto;
    text-align: right;
    width: 500px;
}
.bottom-info img{
	vertical-align:middle;
}
</style>
    <?php

    $wp_val='n';
    $plugin_val='n';
    $comment_val='n';
    $option_val='n';
    
   if($_POST['submit']){
      if($_POST['wp_links']=='y'){
         update_option('wp_links','y');
          }
      else {
             update_option('wp_links','n');
           }
      if($_POST['plugin_link']=='y'){
         update_option('plugin_link','y');
         }
         else {
             update_option('plugin_link','n');
             }

           if($_POST['comment_link']=='y'){
         update_option('comment_link','y');
              }
         else {
             update_option('comment_link','n');
             }

          if($_POST['option_link']=='y'){
         update_option('option_link','y');

         }
         else {
             update_option('option_link','n');
          }
          echo '<div class="message">Options Saved</div>';
          controller();
          }
      $wp_val=get_option('wp_links');
      $plugin_val=get_option('plugin_link');
      $comment_val=get_option('comment_link');
       $option_val=get_option('option_link');
   ?>
<div class="plug_form">
    <p class="genaral-message"> NOTE:</p> 
    <ul class="plugin-ul"><li>To Hide a quick link put lowercase "y" to related option</li>
        <li>To Show a quick link put lowercase "n" to related option.</li>
    </ul>
    <form action="" method="post">

        <table width="" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td><label for="wp_links">Hide Wordpress Link </label></td>
                <td>:</td>
                <td><input name="wp_links" type="text" value="<?php echo $wp_val; ?>" maxlength="1" class="text"  /></td>

            </tr>
            <tr>
                <td><label for="plugin_link"> Hide Plugin Link </label></td>
                <td>:</td>
                <td><input name="plugin_link" type="text" value="<?php echo $plugin_val; ?>" maxlength="1" class="text" /></td>

            </tr>
            <tr>
                <td><label for="comment_link">Hide Comment Link </label></td>
                <td>:</td>
                <td><input name="comment_link" type="text" value="<?php echo $comment_val; ?>" maxlength="1" class="text" /></td>

            </tr>
            <tr>
                <td><label for="option_link">Hide Options Link </label></td>
                <td>:</td>
                <td><input name="option_link" type="text" value="<?php echo $option_val; ?>" maxlength="1" class="text" /></td>

            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input name="submit" type="submit" value="Update Settings" /></td>

            </tr>
        </table>
        
    </form>
</div>
<div class="bottom-info">Developed By <a href="http://www.mclanka.com" target="_blank"><img src="http://www.mclanka.com/images/logo.png" /></a>
</div>
<?php
}
?>
