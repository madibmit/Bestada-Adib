<?php
$inputArray = [3,7,1,2,6,7,8,9,12,5,3,12];
$uniqueValues = array_unique($inputArray,);
rsort($uniqueValues);
print_r($uniqueValues);
$counts = array_count_values($inputArray);

foreach ($counts as $number => $count) {
	if ($count > 1) {
		echo "Angka $number muncul sebanyak $count kali.";
	}
}
?>
