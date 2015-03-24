<link href="../css/css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<table width="195"  border="0" cellspacing="0" cellpadding="0">	
<?php $catinfo= getRecord("tbl_product_category","id=".$cat);

$parentCode = $_lang=='vn'?'vn':'en';
$sqlParent = "select * from tbl_product_category where status=0 and parent=(select id from tbl_product_category where code='".$parentCode."') order by sort, date_added";
$resultParent = mysql_query($sqlParent,$conn);
while($rowParent = mysql_fetch_assoc($resultParent)){
	$isHaveChild = isHaveChild("tbl_product_category", $rowParent['id'])?0:1;
?>
<?php if($_REQUEST['frame']=='product_detail'){
	$catinfo = getRecord("tbl_product_category","id = (select parent from tbl_product where id=".$_REQUEST['id'].")");
}
?>
	<tr id="menu_cat<?php echo $rowParent['id']?>" <?php echo $catinfo['parent']!=$rowParent['id']?'':''?>>
		<td valign="middle">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">				
<?php $sqlChild = "select * from tbl_product_category where status=0 and parent='".$rowParent['id']."' order by sort, date_added";
$resultChild = mysql_query($sqlChild,$conn);
while($rowChild = mysql_fetch_assoc($resultChild)){
    $product_menu = mysql_query("SELECT * FROM `tbl_product` WHERE `parent` =".$rowChild['id'],$conn);
?>				
	<tr>
        <td class="style6"><img src="images/icon_1.gif" width="25" height="9" alt="<?php echo $rowChild['id'] ?>" /><a href="./?frame=product&cat=<?php echo $rowChild['id']?>" class="link2" onclick="showproductmenu1('#promenu_<?php echo $rowChild['id']?>')"><?php echo $rowChild['name']?></a>
        </td>
    </tr>
    <tr>
        <td>
            <table style='display:none;' width='100%' border='0' cellspacing='0' cellpadding='0' id='procat_<?php echo $rowChild['id']?>'>
                <?php
                if($product_menu){
                    while($row = mysql_fetch_assoc($product_menu)){
                        echo "<tr ><td  style=' padding-top: 3px; padding-left:10px; padding-bottom:3px;' class='smallfont' style='padding-left:10px;'><img src='images/icon_3.gif' width='25' height='9' /><a style='text-decoration: none;' href='./?frame=product_detail&id=".$row['id']."' class='aLink3'>".$row['name']."</a><td></tr>";
                    }
                }?>
            </table>
        </td>

    </tr>				
<?php }?>
			</table>
		</td>
	</tr>	
<?php }?>
</table>
