<?php
if(!session_id())
	session_start();

error_reporting(0);

require("config.php");
require("common_start.php");
require("lib/func.lib.php");

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Cty TNHH ĐIỆN TỬ VIỄN THÔNG SÀI GÒN</title>
<script language="javascript" src="lib/varAlert.<?php echo $_lang?>.unicode.js"></script>
<script language="javascript" src="lib/javascript.lib.js"></script>
<script language="javascript">
function btnSearch_onclick(){
	if(test_empty(document.frmSearch.keyword.value)){
		alert(mustInput_Search);document.frmSearch.keyword.focus();return false;
	}
	document.frmSearch.submit();
	return true;
}

</script>
<script>
function $(url,id,eval_str){
    if(document.getElementById){var x=(window.ActiveXObject)?new ActiveXObject("Microsoft.XMLHTTP"):new XMLHttpRequest();}
    if(x){x.onreadystatechange=function() {
        el=document.getElementById(id);
        el.innerHTML='<img src="images/weather/loading.gif" align="left" />';
        if(x.readyState==4&&x.status==200){
            el.innerHTML='';
            el=document.getElementById(id);
            el.innerHTML=x.responseText;
            eval(eval_str);
            }
        }
    x.open("GET",url,true);x.send(null);
    }
}

function change(id){
	$('weather.php?id='+id,'noidung');
}
</script>
<link href="css/css.css" rel="stylesheet" type="text/css">
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
body {
	background-color: #CCCCCC;
	margin-top: 0px;
}
-->
</style>
<link rel="icon" type="image/png"  href="favition.png">
</head>

<body>
<table width="1010" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td><a href="http://saigonet.com.vn" target="_blank" title="Saigonet" style="border:none;"><img style="border:none;" src="images/banner.jpg"/></a></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" align="right" ><?php include('box/box_facebook.php'); include('box/box_google_plus.php')?></td>
      </tr>
      <tr>
        <td class="style1"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="9%%"><a href="./" class="link1">TRANG CHỦ</a></td>
              <td width="9%"><a href="./?frame=intro" class="link1">GIỚI THIỆU</a></td>
              <td width="9%"><a href="./?frame=showcate" class="link1">SẢN PHẨM</a></td> 
              <td width="17%"><a href="./?frame=solution_doc" class="link1">GIẢI PHÁP &amp; TÀI LIỆU</a></td> 
              <td width="9%"><a href="./?frame=service" class="link1">DỊCH VỤ</a></td> 
              <td width="14%"><a href="./?frame=news" class="link1">TIN TỨC &amp; SỰ KIỆN</a></td>
              <td width="8%"><a href="./?frame=contact" class="link1">LIÊN HỆ</a></td>
              <td width="2%"><img src="images/icon_search.gif" width="11" height="11" /></td>
              <form action="./" method="get" name="frmSearch">
                <input type="hidden" name="act" value="search"/>
                <input type="hidden" name="frame" value="search"/>
                <td width="3%"><input name="keyword" type="text" class="search" value="Nhập sản phẩm tìm kiếm ..." onFocus="this.value='';"/></td>
                <td width="10%"><input name="Submit" type="submit" class="style19" value="Tìm kiếm !" onClick="return btnSearch_onclick();"/></td>
              </form>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td class="style4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr valign="top">
              <td width="193"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                 
                  <tr>
                    <td class="style15"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        
                        
                        <tr>
                            <td class="style15">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td class="style17">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="3%"><img src="images/c_bg1.jpg" width="6" height="29" /></td>
                                                    <td width="97%" class="style11">DANH MỤC SẢN PHẨM</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <?php include('module/product_category.php')?>
                            </td>
                        </tr>
						
						<tr>
                          <td><?php $code = $_lang == 'vn' ? 'vn_download' : 'en_download';
						$parentWhere = "parent = (select id from tbl_content_category where code='$code')";
						$download = getRecord("tbl_content",$parentWhere);
						{?>
                              <a href="images/content/download_s173.doc" target="_blank"><img src="images/download.gif" width="193" height="28" border="0"/></a>
                              <?php }?>
                          </td>
                        </tr>
						
                    </table></td>
                  </tr>
                  <tr>
                    <td class="style15"><?php include('box/box_left_top.php')?></td>
                  </tr>
				  
				   <tr>
                    <td class="style15"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="images/httt.jpg" width="193" height="29" /></td>
                        </tr>
                        <tr>
                          <td class="style5"><table width="190" border="0" cellspacing="1" cellpadding="1">
                              <tr>
                                <td height="20" colspan="2" align="center" valign="top"><table width="160" border="0" align="center">
                                    <tr>
                                      <td align="center"><img src="images/hotline.jpg" alt="hot line" width="165" height="49" /><br />
                                        <a href="bando/sodo.php" target="_blank"><img src="images/sodo.gif" width="165" height="49" border="0" /></a></td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td align="center"><?php include('box/box_yahoo.php')?></td>
                              </tr>
                          </table></td>
                        </tr>
                    </table></td>
                  </tr>
				  
                  <tr>
                    <td class="style15"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td class="style17"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="3%"><img src="images/c_bg1.jpg" width="6" height="29" /></td>
                                <td width="97%" class="style11">THỐNG KÊ TRUY CẬP</td>
                              </tr>
                          </table></td>
                        </tr>
                        <?php include('box/box_total.php')?>
                    </table></td>
                  </tr>
                  <tr>
                    <td class="style15"><?php include('box/box_left_bottom.php')?></td>
                  </tr>
              </table></td>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center" style="padding-bottom: 5px"><!--<img src="images/banner01.jpg" width="600px;"/>-->
						<img src="images/slide/1.jpg" name="slide" style="width:600px; height:175px;">	
						</div>
						<script type="text/javascript">
							// khởi tạo image 
								var img1 = new Image()
								img1.src="images/slide/1.jpg"
								var img2 = new Image()
								img2.src="images/slide/2.jpg"
								var img3 = new Image()
								img3.src="images/slide/3.jpg"
								var img4 = new Image()
								img4.src="images/slide/4.jpg"
								var img5 = new Image()
								img5.src="images/slide/5.jpg"
								var img6 = new Image()
								img6.src="images/slide/6.jpg"
							var currentimage = 1; // gán value currentimage=1 

							function changeimage(){
								document.images.slide.src=eval("img"+currentimage+".src"); // lấy image từ url "img/nameimages.jpg" cái này các bạn có thể tùy biến url của image
								if(currentimage < 7)
								   currentimage ++;
								else{
									currentimage=1;//reset currentimage về 0 nếu currentimage < 6

									}
									
									setTimeout("changeimage()",1000);
							}

								changeimage();// khởi chạy hàm

						</script>
					</td>
                  </tr>
                  <tr>
                    <td class="style16"><?php
					if( empty( $_REQUEST['frame'] ) )
					{
						include('module/home.php');
					}
					else 
					{?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="style17"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="6"><img src="images/c_bg1.jpg" width="6" height="29" /></td>
                                  <td class="style11"><?php include('module/processTitle.php')?></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td class="style20"><table width="100%" border="0">
                                <tr>
                                  <td><?php include('module/processFrame.php')?></td>
                                </tr>
                            </table></td>
                          </tr>
                        </table>
                      <?php }
				?>
                    </td>
                  </tr>
              </table></td>
              <td width="193"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="style15"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="images/cart_bg1.jpg" width="193" height="7" /></td>
                        </tr>
                        <tr>
                          <td class="style7"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="43%" rowspan="2" align="center"><img src="images/cart.jpg" width="62" height="58" /></td>
                                <td width="57%" class="style9"><a style="text-decoration: none;" href='<?php echo "./?frame=cart'> GIỎ HÀNG"; ?> </a></td>
                              </tr>
                              <?php $cnt=0;
					$tongcong=0;
					$cart=$_SESSION['cart'];if ($cart<>''){
					foreach ($cart as $product){
						$sql = "select * from tbl_product where id='".$product[0]."'";
						$result = mysql_query($sql,$conn);
						if (mysql_num_rows($result)>0){
						$pro = mysql_fetch_assoc($result)?>
                              <?php }
					$tongcong=$tongcong+$product[1];
					$cnt=$cnt+1;
					} }				
				?>
                              <tr>
                                <td valign="top" class="style8"><span class="style10">
                                  <?php echo $tongcong?>
                                </span> sản phẩm </td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td><img src="images/cart_bg2.jpg" width="193" height="7" /></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td class="style15"><?php include('box/box_right_top.php')?></td>
                  </tr>
                  <tr>
                    <td class="style15"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td class="style17"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="3%"><img src="images/c_bg1.jpg" width="6" height="29" /></td>
                                <td width="97%" class="style11">SẢN PHẨM BÁN CHẠY <img src="images/new.gif" width="33" height="16" align="absmiddle" /></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td class="style12"><marquee height="300" behavior="scroll" direction="up" scrolldelay="100" scrollamount="3" onMouseOver="this.stop();" onMouseOut="this.start();">
                            <?php include('module/product_special.php')?>
                            </marquee>
                          </td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td class="style15"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td class="style17"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="3%"><img src="images/c_bg1.jpg" width="6" height="29" /></td>
                                <td width="97%" class="style11">THÔNG TIN CẦN BIẾT</td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td class="style12"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                
                              </tr>
                              <tr>
                                <td colspan="2" style="padding-left:0px; padding-right:0px;"><table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#6666666" id="table4535" style="BORDER-COLLAPSE: collapse">
                                    <tr>
                                          <div id="noidung" style="float:left; padding-top:8px;"></div>
                                        <script>$('weather.php','noidung');</script></td>
                                    </tr>
                                </table></td>
                              </tr>
                              
                              <tr>
                                <td height="5px"></td>
                              </tr>
                          </table></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td class="style15"><?php include('box/box_right_bottom.php')?></td>
                  </tr>
              </table></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td class="" style="background-color:#76c840; border-radius:0px 0px 10px 10px; padding:10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>&nbsp;</td>
              <td class="">&nbsp;</td>
              <td align="right">&nbsp;</td>
            </tr>
            <tr valign="top">
              <td bgcolor="">&nbsp;</td>
              <td bgcolor="" class="style25"><strong style="font-size: 12px; color:#000000;">CÔNG TY TNHH ĐIỆN TỬ VIỄN THÔNG SÀI GÒN </strong><br>
                ĐỊA CHỈ: 86/6/3 Trần Thái Tông, P15, Q Tân Bình, TP Hồ Chí Minh<br>
                Email: sales@saigonet.com.vn<br>
                Điện thoại: 0989 921 827</td>
              <td align="right" bgcolor="" style="color:#FFFFFF; padding:5px;" valign="bottom">&nbsp;
            </tr>
            <tr>
              <td width="8%" bgcolor=""></td>
              <td width="87%" bgcolor="" class="">&nbsp;</td>
              <td width="5%" align="right" bgcolor=""></td>
            </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <!--td bgcolor="#FFFFFF"><img src="Hinh/space.jpg" width="5" height="5"></td-->
  </tr>
</table>
</body>
</html>
<?php require("common_end.php"); ?>