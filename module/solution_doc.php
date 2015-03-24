<link href="../css/css.css" rel="stylesheet" type="text/css" />
<?php $code = $_lang == 'vn' ? 'vn_solution' : 'en_solution';
$parentWhere = "and parent = (select id from tbl_content_category where code='$code')";
echo "<br/>";
$parentRecord = getRecord("tbl_content","1=1 ".$parentWhere);
$cat = killInjection($_REQUEST['cat']);
if ($cat=='') $cat = $parentRecord['parent'];
$per_page = 10;
$p=0;
if ($_REQUEST['p']!='') $p=killInjection($_REQUEST['p']);

$sql = "select * from tbl_content where status=0 $parentWhere order by sort,date_added desc limit ".$per_page*$p.",".$per_page;
$result = @mysql_query($sql,$conn);
$i=0;
while($row=mysql_fetch_assoc($result))
{ ?>
<table align="center" border="0" width="98%" cellspacing="0" cellpadding="0">
	<tr>
       <td width="19%"><a href="./?frame=solution_doc_detail&id=<?php echo $row['id']?>">
        <img src="<?php echo $row['image']=='' ? "images/content/default_image.jpg" : $row['image'] ?>" width="122" height="85" border="0" /></a></td>
      <td width="81%" align="left" valign="top" style="padding-left:5px">
	  		<a href="./?frame=solution_doc_detail&id=<?php echo $row['id']?>" class="link5"><?php echo $row['name']?></a>
        <br />
        <?php echo $row['detail_short']?>
       <!-- <a href="./?frame=solution_doc_detail&id=<?php echo $row['id']?>"><img src="images/more.gif" width="49" height="11" border="0" /></a--></td>
      </td>
    </tr>
   <tr>
        <td colspan="2" id="boder_button">&nbsp;</td>
   </tr>
   <tr><td colspan="2">&nbsp;</td></tr>
</table>
<?php }?>

<table align="center" cellSpacing=0 cellPadding=0 width="98%" border=0>
<?php $rowPage       = $_lang=="vn" ? "Bài đăng" : "Posts";
$pagePage       = $_lang=="vn" ? "Trang" : "Page";
$titleFirst     = $_lang=="vn" ? "Đầu Tiên" : "First";
$titlePrevious  = $_lang=="vn" ? "Về trước" : "Previous";
$titleNext      = $_lang=="vn" ? "Tiếp theo" : "Next";
$titleLast      = $_lang=="vn" ? "Cuối cùng" : "Last";

$total = countRecord("tbl_content","status=0 and parent=".$cat);
$pages = countPages($total,$per_page);
echo '<tr><td colspan="2" align="center"></td></tr>';
echo '<tr><td class="smallfont" align="left"><b>'.$total.'</b> '.$rowPage.'</td>';
echo '<td class="smallfont" align="right">'.$pagePage.' : ';
$param="";
if ($p>1) echo '<a class="aLink3" title="'.$titleFirst.'" href="./?frame='.$_REQUEST['frame'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p=0">[&lt;&lt;]</a> ';
if ($p>0) echo '<a class="aLink3" title="'.$titlePrevious.'" href="./?frame='.$_REQUEST['frame'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p='.($p-1).'">[&lt;]</a> ';
$from=($p-10>0?$p-10:0);
$to=($p+10<$pages?$p+10:$pages);
for ($i=$from;$i<$to;$i++){
	if ($i!=$p) echo '<a class="aLink3" href="./?frame='.$_REQUEST['frame'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p='.$i.'">'.($i+1).' </a>';
	else echo '<b>'.($i+1).'</b> ';
}
if ($p<$i-1) echo '<a class="aLink3" title="'.$titleNext.'" href="./?frame='.$_REQUEST['frame'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p='.($p+1).'">[&gt;]</a> ';
if ($p<$pages-1) echo '<a class="aLink3" title="'.$titleLast.'" href="./?frame='.$_REQUEST['frame'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p='.($pages-1).'">[&gt;&gt;]</a>'; 
echo '</td></tr>';
?>
</table><br>

