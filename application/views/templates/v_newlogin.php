<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body style="padding:0; background:#efefef; margin:0px; font-family:Arial, Helvetica, sans-serif;">
 <table border="0" cellpadding="0" cellspacing="0" bgcolor="#fff" >
 <tr>
  <td  valign="top"  width="50px" style="padding-top:5px;"> </td>
 <td  height="50px"  width="600px" style="border-bottom:1px solid #eee; font-size:12px; padding-left:10px;color:#888;background:#ccc;">
 <img src="<?=base_url()?>images/user.png" />
 <span style="color:#fff;font-size:20px;font-weight:bold;padding-left:10px;padding-top:10px">Login Details</span></td>
 <td   width="50px" > &nbsp;</td>
 </tr>
<tr>
  <td  width="5px" > &nbsp;</td>
  <td  valign="top"  width="100px" style="border-bottom:1px solid #eee;">
  <p><span style="font-weight:normal; font-size:12px;color:#919191;">Hi <b><?=$name?></b>, </span></p>
  <p><span style="font-size:12px;color:#979797;">Your login details for  <b><?=$url?></b> is </p><br/><br/>
  <p style="margin-top:20px;"><span style="font-size:13px;color:#555;">User Name - <b><?=$uname?></b><br/></p>
  <p style="margin-top:20px;"><span style="font-size:13px;color:#555;">Password - <b><?=$password?></b><br/></p><br/><br/>
  
  <p style="color:#aaa;font-size:12px;">You can change your login details through your profile after login. </p>
  </td> <td  width="5px" > &nbsp;</td>
 </tr>

<tr>
 <td  width="5px" >&nbsp;</td>
 <td><p style="color:#989898;font-size:12px;">Regards,<br/>
 <span style="color:#555;"><?=$fromName?></span></p></td>
</tr>
</table>

</body>
</html>
