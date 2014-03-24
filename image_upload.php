<?php
 
// This is a simplified example, which doesn't cover security of uploaded images. 
// This example just demonstrate the logic behind the process. 
 
 
// files storage folder
$dir = '../uploads/cms/';

$_FILES['file']['type'] = strtolower($_FILES['file']['type']);
 
if ($_FILES['file']['type'] == 'image/png' 
|| $_FILES['file']['type'] == 'image/jpg' 
|| $_FILES['file']['type'] == 'image/gif' 
|| $_FILES['file']['type'] == 'image/jpeg'
|| $_FILES['file']['type'] == 'image/pjpeg')
{	

switch ($_FILES['file']['type']) {
	case 'image/png': $ext = 'png'; break;
	case 'image/jpg': $ext = 'jpg'; break;
	case 'image/gif': $ext = 'gif'; break;
	case 'image/jpeg': $ext = 'jpg'; break;
	case 'image/pjpeg': $ext = 'jpg'; break;
}

    // setting file's mysterious name
    $filename = md5(date('YmdHis')).'.' .$ext;
    $file = $dir.$filename;

    // copying
    copy($_FILES['file']['tmp_name'], $file);

    // displaying file    
	$array = array(
		'image' => '/uploads/cms/'.$filename,
	);
	
	echo stripslashes(json_encode($array));   
    
}
 
?>