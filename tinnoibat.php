<?php defined("web") or die("Bạn không có quyền truy cập trang này!!!!"); ?>
<style>
#tinnoibat{width:460px; border: 1px solid #2029C0; min-height:300px;	}
#tinnoibat #top1 { height:160px; text-align:justify; 
			     padding-right:5px; color:#036;  font-size:16px}
#tinnoibat #top1 a { color:#900; text-decoration:none; font-size:18px }
#tinnoibat #top1 a:hover { color:#F60; text-decoration:underline} 
#tinnoibat #top1 p { margin-top:0px; margin-bottom:10px}
#tinnoibat #top1 img { margin-right:5px}
#tinnoibat #top3 div { width:33.3%; float:left; text-align:center}
#tinnoibat #top3  a { text-decoration:none; color:#C60}
#tinnoibat #top3  a:hover { text-decoration:underline; color:#069}
</style>

<?php 
	//$sl="select * from tin where AnHien=1 and lang='vi' and TinNoibat=1 order by idTin DESC limit 0,4";
//	$kq=mysqli_query($link,$sl);
	$kq=$tin->get_tinnoibat($lang);
	$d=$tin->fetch($kq);
?>
<div id="tinnoibat">
    <div id="top1">
    <img width=150 height=120 align=left src="<?php echo $d['urlHinh']; ?>" />
      <p><a href="#"> <?php echo $d['TieuDe']; ?> </a> </p>
        <?php echo $d['TomTat']; ?>    
    </div>  
    <div id="top3">
    <?php
    while($d=mysqli_fetch_array($kq)){
		?>
		<div> 
        <img src="<?php echo $d['urlHinh']; ?>" width="140" height="90" /><br />
         <a href="#"> <?php echo $d['TieuDe']; ?> </a> 
         </div>
       <?php } ?>  
    </div>
    
</div>
