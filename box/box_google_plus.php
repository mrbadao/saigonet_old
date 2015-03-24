<?php
$rConfig = getRecord('tbl_config',"code = 'gplusone'");
$google_plus_url = $rConfig['detail'];
?>
<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>
<g:plusone size="medium" href="<?php echo $google_plus_url;?>"></g:plusone>