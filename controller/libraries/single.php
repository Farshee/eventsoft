<?php

$valid_formats = array("jpg","jpeg","JPG", "png", "gif", "bmp");
$max_file_size = 1024*1024*5;


$msg=array();

function build_image($width, $height,$uniq_file_name,$dir,$type='crop',$quality=100,$compress=100){
  list($w, $h) = getimagesize($_FILES['image']['tmp_name']);
  $image_info=$_FILES['image']['type'];
  if($width==0&&$height==0){
	$width=floor(($compress/100)*$w);
	$height=floor(($compress/100)*$h);
  }if($type=='crop'){
  $ratio = max($width/$w, $height/$h);
  $h = ceil($height / $ratio);
  $x = ($w - $width / $ratio) / 2;
  $w = ceil($width / $ratio);
  }
  $path = $dir.$width.'x'.$height.'_'.$uniq_file_name;
  $imgString = file_get_contents($_FILES['image']['tmp_name']);
  $image = imagecreatefromstring($imgString);
  $tmp = imagecreatetruecolor($width, $height);
  imagealphablending( $tmp, false );
  imagesavealpha( $tmp, true );
  if($type=='crop'){
	imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
  }else{
	 imagecopyresampled($tmp,$image, 0, 0, 0, 0, $width, $height, $w, $h);
  }
  switch ($image_info) {
    case 'image/jpeg':
      imagejpeg($tmp, $path, $quality);
      break;
    case 'image/png':
	  ($quality==100)?$quality=0:$quality=abs(9-floor($quality/10));
      imagepng($tmp, $path, $quality);
      break;
    case 'image/gif':
      imagegif($tmp, $path);
      break;
	case 'image/vnd.wap.wbmp':
	  $foreground_color = imagecolorallocate($tmp, 255, 0, 0);
      imagewbmp($tmp, $path, $foreground_color);
      break;
    default:
      exit;
      break;
	}
  return $path;
  imagedestroy($image);
  imagedestroy($tmp);
}
?>
