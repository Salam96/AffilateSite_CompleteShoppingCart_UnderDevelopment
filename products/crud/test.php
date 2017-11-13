<?php
$filename = 'db.php';
function CheckSyntax($fileName, $checkIncludes = true)
{
        // If it is not a file or we can't read it throw an exception
	if(!is_file($fileName) || !is_readable($fileName))
		throw new Exception("Cannot read file ".$fileName);}
	if (is_readable($filename)) {
		echo 'The file is readable';
	} else {
		echo 'The file is not readable';
	}
	?>