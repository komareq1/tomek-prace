<?php
$data = file_get_contents('egzamin.html'); 

$imgParts = explode('<img', $data);
array_shift($imgParts);

foreach ($imgParts as $img) {
    $srcParts = explode('src="', $img);
    if (count($srcParts) > 1) {
        $src = explode('"', $srcParts[1])[0];
        echo "<img src='$src' style='max-width:200px;'><br>"; 
    }
}
?>
