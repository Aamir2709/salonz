<?php
$success = false;
if(isset($_FILES['image'])){
    $errors = array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext = strtolower(end(explode('.',$_FILES['image']['name'])));
        $expensions = array("jpeg","jpg","png");

    if(in_array($file_ext,$expensions)==false){
        $errors[]="extension is not allowed, please choose a JPEG or a PNG file extension";
    }
    if($file_size> 2097152){
        $errors[] = 'File size must be exactly 2 MB';
    }
    if(empty($errors)==true){
        move_uploaded_file($file_tmp,"C:/xampp/htdocs/wpl/images/".$file_name);
        echo "Thank you for your feedback";
        $success=true;
    }
    else{
        print_r($errors);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>file</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form">
    <input type="file" name="image"/>
    <input type="submit"/>
    </form>
</body>
</html>