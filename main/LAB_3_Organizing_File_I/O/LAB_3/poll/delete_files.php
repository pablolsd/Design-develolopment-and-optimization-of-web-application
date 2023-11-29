<?php
$files = ['2.txt', '3.txt', '4.txt', '5.txt'];

foreach ($files as $file) {
    file_put_contents($file, ''); 
}

echo "Содержимое файлов успешно удалено.";
foreach ($files as $file) {
	$currentContent = file_get_contents($file);
	echo "До: $file содержит '$currentContent'\n";
	file_put_contents($file, ''); 
}

?>

