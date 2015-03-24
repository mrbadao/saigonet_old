<?php
$rConfig = getRecord('tbl_config',"code = 'facebook_like'");
$facebook_fanpage = $rConfig['detail'];
?>
<iframe width="100px" src="//www.facebook.com/plugins/like.php?href=<?php echo $facebook_fanpage; ?>&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=false&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe>