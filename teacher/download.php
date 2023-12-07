<?php include "teacher_header.php"?>
<?php include "teacher_menu.php"?>
  
<?php
    if(isset($_GET['file'])){
        $fileName = $_GET['file'];
        //$filePath = 'uploads/' . $fileName;
        //if(!empty($fileName) && file_exists($filePath)){
            
            //Define headers
            //header("Cache-Control: public");
            //header("Content-Description: File Transfer");
            header('Content-Type: application/octet-stream');
            header('Content-Dispostion: attachment; filename ="'.basename(uploads/$fileName).'"');
            header('Content-Length: ' . filesize(uploads/$fileName));
            
            //read files
            readfile(uploads/$fileName);
        }
?>

<?php include "teacher_footer.php"?>