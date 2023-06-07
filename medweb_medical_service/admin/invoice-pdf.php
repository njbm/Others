<?php
require_once('../config.php');

$s = file_get_contents($http."test/index.html");
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($s);
$mpdf->Output();