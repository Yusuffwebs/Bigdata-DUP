<?php
require 'lib/aes.php';
require 'lib/aesctr.php';

$key = $_POST['kunci'];
$name=$_FILES['doc']['name'];
$namaFile = file_get_contents($_FILES['doc']['tmp_name']);
$encFile = AesCtr::decrypt($namaFile,$key,128);
$enkrip = file_put_contents("dekrip/".($_FILES['doc']['name']), $encFile);

if ($enkrip) {
	
	echo "File Has Been Decrypted";
	
}
?>

<script> document.location.href='dekrip/<?php echo $name;?>' </script>;