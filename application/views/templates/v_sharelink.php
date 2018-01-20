<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body style="padding:0; background:#efefef; margin:0px; font-family:Arial, Helvetica, sans-serif;">
<!--
 <table border="0" cellpadding="0" cellspacing="0" bgcolor="#fff" >
 <tr>
  <td  valign="top"  width="50px" style="padding-top:5px;"> </td>
 <td  height="50px"  width="600px" style="border-bottom:1px solid #eee; font-size:12px; padding-left:10px;color:#888;background:#ccc;">
 <img src="<?=base_url()?>images/user.png" />
 <span style="color:#fff;font-size:20px;font-weight:bold;padding-left:10px;padding-top:10px">Share URL</span></td>
 <td   width="50px" > &nbsp;</td>
 </tr>
<tr>
  <td  width="5px" > &nbsp;</td>
  <td  valign="top"  width="100px" style="border-bottom:1px solid #eee;">
  <p><span style="font-weight:normal; font-size:12px;color:#919191;">Hi, </span></p>
  <p><span style="font-size:12px;color:#979797;">The Url for Dynamic Deck is   <b><?=$link?></b> is </p><br/><br/>
  <p style="margin-top:20px;"><span style="font-size:13px;color:#555;">Password - <b><?=$password?></b><br/></p><br/><br/>
  </td> <td  width="5px" > &nbsp;</td>
 </tr>

<tr>
 <td  width="5px" >&nbsp;</td>
 <td><p style="color:#989898;font-size:12px;">Regards,<br/>
 <span style="color:#555;"><?=$fromName?></span></p></td>
</tr>
</table>-->
<table border="0" cellpadding="0" cellspacing="0" bgcolor="#fff">
<tbody><tr>
 <td valign="top" width="50px" style="padding-top:5px"> </td>


<td> <span style="color:#fff;font-size:20px;font-weight:bold;padding-left:10px;padding-top:10px">Share URL</span></td>
<td width="50px"> &nbsp;</td>
</tr>
<tr>
 <td width="5px"> &nbsp;</td>
 </tr><tr><td valign="top" width="100%" style="border-bottom:1px solid #eee">
   <p><span style="font-weight:normal;font-size:12px;color:#919191 ">Hello, </span></p></td></tr>
  <tr><td> <p><span style="font-size:12px;color:#979797 ">The Url for Dynamic Deck is </span></p>
     <p><b><a href="<?=$link?>" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://dynamicdeck.labsls.com/Organisation/listdeck/47/share&amp;source=gmail&amp;ust=1507441869034000&amp;usg=AFQjCNES8WmmJ-TMHobveWRh83ImueTjCg"><?=$link?></a></b> </p>
 <p style="margin-top:20px"><span style="font-size:13px;color:#555">Password - <b><?=$password?></b><br></span></p><br>
 </td> <td width="5px"> &nbsp;</td>
</tr>
<?php if($msg!='') { ?>
 <tr>
    <td> 
     <p><span style="font-size:12px;color:#979797 "><?=$msg?> </span></p>
     <p><b><a href="http://dynamicdeck.labsls.com/Investor/signup" target="_blank" >Click Dynamic Deck </a></b> </p>  
	</td> 
	<td width="5px"> &nbsp;</td>
</tr>
<?php }  ?>
	

<tr>
<td width="5px">&nbsp;</td>
<td><p style="color:#989898 ;font-size:12px">Regards,<br>
<span style="color:#555">Dynamic Deck</span></p></td>
</tr>
</tbody></table>

</body>
</html>
