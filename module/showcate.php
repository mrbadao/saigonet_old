<link href="../css/css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script type="text/javascript">
function showproductmenu1(promenu){
    if($(promenu).css('display')== "none") $(promenu).css('display','table');
    else $(promenu).css('display','none')

}
</script>
<table width="195"  border="0" cellspacing="0" cellpadding="0">	
<tr><td colspan="2">&nbsp;</td></tr>
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
        <td class="smallfont"><img src="images/icon_3.gif" width="25" height="9" />
            <b style="cursor: pointer;" onclick="showproductmenu1('#promenu_<?php echo $rowChild['id']?>')"><?php echo $rowChild['name']." (".countRecord("tbl_product","parent=".$rowChild['id']).")";?></b>
        </td>
    </tr>	
    <tr><td><table style='display:none;' width='100%' border='0' cellspacing='0' cellpadding='0' id='promenu_<?php echo $rowChild['id']?>'>	
        <?php
        if($product_menu){ 
            $flag = true;
            while($row = mysql_fetch_assoc($product_menu)){
                echo "<tr><td class='smallfont' style='padding-left:10px;'><br/><img src='images/icon_1.gif' width='25' height='9' /><a style='text-decoration: none;' href='./?frame=product_detail&id=".$row['id']."' class='aLink3'>".$row['name']."</a><td></tr>";
            }
        } 
    ?>	
    </table></td><tr>
    <tr><td colspan="2">&nbsp;</td></tr>	
<?php }?>
			</table>
		</td>
	</tr>	
<?php }?>
</table>


<table align="center" cellSpacing=0 cellPadding=0 width="98%" border=0>
<?php $rowPage       = $_lang=="vn" ? "Danh mục" : "Categories";
$pagePage       = $_lang=="vn" ? "Trang" : "Page";
$titleFirst     = $_lang=="vn" ? "Đầu tiên" : "First";
$titlePrevious  = $_lang=="vn" ? "VVề trước" : "Previous";
$titleNext      = $_lang=="vn" ? "Tiếp theo" : "Next";
$titleLast      = $_lang=="vn" ? "Cuối cùng" : "Last";

$total = countRecord("tbl_product_category","status=0 and parent=77");
$pages = countPages($total,$per_page);
echo '<tr><td colspan="2" align="center"></td></tr>';
echo '<tr><td class="smallfont" align="right"><b>'.$total.'</b> '.$rowPage.'</td></tr>';
?>
</table><br>