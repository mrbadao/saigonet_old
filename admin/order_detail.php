<?php $errMsg =''?>
<?php switch ($_GET['action']){
	case 'del' :
		$id = $_GET['id'];
		$sql = "delete from tbl_order where id='".$id."'";
		$result = mysql_query($sql,$conn);
		echo mysql_error();
		if ($result) $errMsg = "Đã xóa thành công.";
			else $errMsg = "Không thể xóa dữ liệu !";
		break;
}
?>
<form method="POST" name="frmForm" action="./">
<input type="hidden" name="act" value="order_detail">
<input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>">
<?php $orderId=$_REQUEST['id'];
if ($orderId=='') return;
$orderinfo=getRecord("tbl_order","id=".$orderId);

?>

<table width="100%" border="0" cellpadding="2" cellspacing="0">
	<tr><td class="3" height="10"></td></tr>
	
	<tr>
		<td width="15%" class="smallfont" align="right">Họ và tên</td>
		<td width="1%" class="smallfont" align="center">:</td>
		<td width="83%" class="smallfont"><b><?php echo $orderinfo['order_name']?></b></td>
	</tr>
	
	<tr>
		<td width="15%" class="smallfont" align="right">Công ty</td>
		<td width="1%" class="smallfont" align="center">:</td>
		<td width="83%" class="smallfont"><b><?php echo $orderinfo['order_company']?></b></td>
	</tr>
	
	<tr>
		<td width="15%" class="smallfont" align="right">Địa chỉ</td>
		<td width="1%" class="smallfont" align="center">:</td>
		<td width="83%" class="smallfont"><b><?php echo $orderinfo['order_address']?></b></td>
	</tr>
	
	<tr>
		<td width="15%" class="smallfont" align="right">Tình / thành phố</td>
		<td width="1%" class="smallfont" align="center">:</td>
		<td width="83%" class="smallfont"><b><?php echo $orderinfo['order_city']?></b></td>
	</tr>
	
	<tr>
		<td width="15%" class="smallfont" align="right">Quốc gia</td>
		<td width="1%" class="smallfont" align="center">:</td>
		<td width="83%" class="smallfont"><b><?php echo $orderinfo['order_country']?></b></td>
	</tr>
	
	<tr>
		<td width="15%" class="smallfont" align="right">Điện thoại</td>
		<td width="1%" class="smallfont" align="center">:</td>
		<td width="83%" class="smallfont"><b><?php echo $orderinfo['order_phone']?></b></td>
	</tr>
	
	<tr>
		<td width="15%" class="smallfont" align="right">E-mail</td>
		<td width="1%" class="smallfont" align="center">:</td>
		<td width="83%" class="smallfont"><b><?php echo $orderinfo['order_email']?></b></td>
	</tr>
	
	<tr>
		<td width="15%" class="smallfont" align="right">Tình trạng đơn hàng</td>
		<td width="1%" class="smallfont" align="center">:</td>
		<td width="83%" class="smallfont"><b style = '<?php echo $orderinfo['order_status'] == 0 ? "color:red;'>Chưa xữ lí" : "color:green;'>Đã xữ lí"?></b></td>
	</tr>
	
	<tr><td class="3" height="10"></td></tr>
</table>

<table border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
	<tr>
		<th width="20" class="title">STT</th>
		<th class="title">Mã hàng</th>
		<th class="title">Tên SP</th>
		<th class="title">Số lượng</th>
		<th class="title">Đơn giá</th>
		<th class="title">Thành tiền</th>    
	</tr>
  
<?php $page = $_GET["page"];

$order_codelist = explode("|", $orderinfo['order_codelist']);
$order_amoutlist = explode("|", $orderinfo['order_amoutlist']);
$order_price = explode("|", $orderinfo['order_price']);

$total_price=0;

for($i=0;$i<count($order_codelist);$i++){
	$sql = "SELECT `name`,`price` FROM `tbl_product` WHERE `code`='".$order_codelist[$i]."'" ;
    $result = mysql_query($sql,$conn);
    $row = mysql_fetch_array($result);
	$color = $i%2 ? '#d5d5d5' : '#e5e5e5';
?>
  	<tr>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="center">
			<?php echo $i+1?>
		</td>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="center"><?php echo $order_codelist[$i]?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont"><?php echo $row['name']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="center"><?php echo $order_amoutlist[$i]?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="right"><?php echo number_format($row['price'])?>&nbsp;<font color="#FF0000"><?php echo $currencyUnit?></font></td>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="right"><?php $total_price+=$order_amoutlist[$i]*$row['price']; echo number_format($order_amoutlist[$i]*$row['price'])?>&nbsp;<font color="#FF0000"><?php echo $currencyUnit?></font></td>
	</tr>

<?php }
	if (isset($_POST['btnDel'])){
	$step = $orderinfo['order_status'] == 0 ? 1 : 0;
	$result = mysql_query("UPDATE `tbl_order` SET `order_status` = '".$step."', `last_modified` = now() WHERE `tbl_order`.`id` =".$orderId.";",$conn);
	if ($result){
		echo "<script>window.location='./?act=order'</script>";
	}
	else{
		$errMsg = 'Xãy ra lỗi !';
	}
}

?>
    <tr>  
        <td ></td>
        <td ></td>
        <td ></td>
        <td ></td>
        <td align="center"></td>
        <td align="right"><?php echo  number_format($total_price)?>&nbsp;<font color="#FF0000"><?php echo $currencyUnit?></td>
	</tr>
</table>
<input type="submit" value="<?php echo $orderinfo['order_status'] == 0 ? "Đánh dấu" : "Bỏ đánh dấu"?>" name="btnDel" onclick="return confirm('Bạn có chắc chắn muốn thực hiện thao tác này ?');" class="button">
</form>
<script language="JavaScript">
function chkallClick(o) {
  	var form = document.frmForm;
	for (var i = 0; i < form.elements.length; i++) {
		if (form.elements[i].type == "checkbox" && form.elements[i].name!="chkall") {
			form.elements[i].checked = document.frmForm.chkall.checked;
		}
	}
}
</script>
<?php if($errMsg!=''){echo '<p align=center class="err">'.$errMsg.'<br></p>';}?>

<table width="100%">
	<tr><td height="10"></td></tr>
	<tr><td class="smallfont"><?php echo 'Tổng số hàng : <b>'.count($order_codelist).'</b>'?></td></tr>
</table>