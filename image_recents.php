<?php
 
// This is a simplified example, which doesn't cover security of uploaded images. 
// This example just demonstrate the logic behind the process. 
 
 
// files storage folder
$upload_dir = '../uploads/cms/';
$path = '/uploads/cms/';

$handle = opendir($upload_dir);

while ($file = readdir($handle)) {
   if(!is_dir($upload_dir.$file) && !is_link($upload_dir.$file)) {

	if ($file != 'README.txt')
    $docs[] = $file;
   }
}

sort($docs);

foreach($docs as $key=>$file){

	$thumbLink = '/cmsRedactor/image_thumb.php?f='.$file;

    $array[] = array(
            'filelink' => $path.$file,
            'thumb' => $thumbLink,
            'image' => $path.$file,
            'folder' => 'Folder 5'
        ); 
        }   
echo stripslashes(json_encode($array));


 
?>