<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

include('_inc/header.php');

if (file_exists('tmp/testxls.xls'))
{
    $_FILES['xlsfile']["tmp_name"] = 'tmp/testxls.xls';
}
if (@$_FILES["xlsfile"]["error"] > 0)
{
    echo "Error: " . $_FILES["xlsfile"]["error"] . "<br>";
    include('_inc/footer.php');
    exit;
}

include('extlib/PHPExcel/Classes/PHPExcel/IOFactory.php');

$inputFileType = PHPExcel_IOFactory::identify($_FILES['xlsfile']["tmp_name"]);
/**  Create a new Reader of the type that has been identified  **/
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
/**  Load $inputFileName to a PHPExcel Object  **/
$objPHPExcel = $objReader->load($_FILES['xlsfile']["tmp_name"]);

$output = (object) array();
$output->sheets = array();
for ($sheetNum = 0; $sheetNum < $objPHPExcel->getSheetCount(); $sheetNum++)
{
    $outputSheet = (object) array();
    $sheet = $objPHPExcel->getSheet($sheetNum);

    $outputSheet->title = $sheet->getTitle();
    $outputSheet->data = $sheet->toArray();
    $output->sheets[] = $outputSheet;
}

?>

<b>JSON</b>:
<textarea style="width: 100%; height: 40em">
<?php 
if (defined('JSON_PRETTY_PRINT'))
    echo json_encode($output, JSON_PRETTY_PRINT);
else
    echo json_encode($output);
?>
</textarea>

<?php 
include('_inc/footer.php');
?>

