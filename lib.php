<?php 
class tintuc 
{
	private $link;
	
	function connect($host,$user,$pass,$DB)
	{
		$this->link = mysqli_connect($host,$user,$pass,$DB) or die("Khong the ket noi toi DB");
		mysqli_query($this->link,"set names 'utf8'");
	}
	
	function fetch($kq)
	{
		return mysqli_fetch_array($kq);	
	}
	
	function query($sl)
	{
		return mysqli_query($this->link,$sl);
	}
	
	//lấy thể loại theo ngôn ngữ
	function get_theloai($lang)
	{
		$sl1="select * from theloai where lang='$lang' and AnHien=1 order by ThuTu ASC";
		return $kq1=$this->query($sl1);
	}
	
	//lấy loại tin theo thể loại
	function get_loaitintheoTL($idTL)
	{
		$sl2="select * from loaitin where idTL=$idTL and AnHien=1 order by ThuTu ASC";
		return $kq2=$this->query($sl2);
	}
	
	//lấy 4 tin nổi bật
	function get_tinnoibat($lang)
	{
		$sl2="select * from tin where AnHien=1 and lang='$lang' and TinNoibat=1 order by idTin DESC limit 0,4";
		return $kq2=$this->query($sl2);
	}
	
	//lấy 10 tin xem nhiều
	function get_tinxemnhieu($lang)
	{
		$sl="select * from tin where AnHien=1 and lang='$lang' order by SoLanXem DESC limit 0,10";
		return $kq=$this->query($sl);
	}
	
	//lấy chi tiết tin theo idTin
	function get_chitiettin($idTin)
	{
		$sl="select * from tin where idTin=$idTin";
		return $kq=$this->query($sl);
	}
	
	//lấy n tin cũ hơn
	function get_tincuhon($idTin,$sotin)
	{
		$sl="select * from tin where idLT in (select idLT from tin where idTin=$idTin) and idTin<$idTin order by idTin DESC limit 0,$sotin";
		return $kq=$this->query($sl);
	}
	
	//lấy n tin mới nhất
	function get_tinmoinhat($idTL,$sotin)
	{
		$sl="select * from tin where idLT in (select idLT from loaitin where idTL=$idTL)  and AnHien=1 order by idTin DESC limit 0,$sotin";
		return $kq=$this->query($sl);	
	}
	
	//lấy tin theo loại tin
	function get_tintheoLT($idLT)
	{
		$sl="select Ten from loaitin where idLT=$idLT";
		return $kq=$this->query($sl);	
	}
	
	
	//lấy ra các bình luận
	function get_binhluan($idTin)
	{
		$sl="select * from bandocykien where idTin=$idTin order by Ngay DESC";
		return $kq=$this->query($sl);
	}
	
	
	//Thêm 1 ý kiến bạn đọc
	function insert_ykienbandoc($idtin, $noidung, $email, $hoten)
	{
		$ngay=date("Y-m-d h:i:s", time());
		$sl="insert into bandocykien values(NULL, $idtin, '$ngay', '$noidung', '$email', '$hoten')";
		if($this->query($sl)) return true; else return false;
	}
	
	//Cập nhật số lần xem
	function update_solanxem($idTin)
	{
		$sl="update tin set SoLanXem=SoLanXem+1 where idTin=$idTin ";
		if($this->query($sl)) return true; else return false;
	}
	
	//Mã xác nhận
	function captcha()
	{
		$chuoi="QWERTYUIOPASDFGHJKLZXCVBNM0123456789";
		$dodai=6;
		$ma="";
		for($i=1;$i<=$dodai;$i++)
		{
			$vitri=rand(0,35); //strlen($chuoi)-1
			$ma.=substr($chuoi,$vitri,1);
		}
		return $ma;
	}
}
?>