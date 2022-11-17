<?php

@include 'connect.php';
$id =$_GET['id'];

if(isset($_POST['update_collection'])){

    $collection_name = $_POST['collection_name'];
    $artiste_name = $_POST['artiste_name'];
    $collection_image = $_FILES['collection_image']['name'];
    $collection_image_tmp_name = $_FILES['collection_image']['tmp_name'];
    $collection_image_folder = 'img/' .$collection_image;

    if(empty($collection_name) || empty($artiste_name) || empty($collection_image) ){
       $message[]= 'please fill out all';
    } else{
        $update = " UPDATE collection SET nom='$collection_name', artiste='$artiste_name', image='$collection_image' WHERE id=$id";
        $upload = mysqli_query($conn,$update);
        if($upload){
            move_uploaded_file( $collection_image_tmp_name, $collection_image_folder);
            $message[]= 'new product added';
        } else{
            $message[]= 'not added';
        }
    }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="addcl.css" rel="stylesheet">
</head>
<body>
<?php 

if(isset($message)){
    foreach($message as $message){
        echo '<span>'.$message.'</span>';
    }
}
?>
<?php
        $select = mysqli_query($conn,"SELECT * FROM collection");
        $row = mysqli_fetch_assoc($select);
        ?>

<form action="<?php $_SERVER['PHP_SELF']?>" method="POST" class="frm" enctype="multipart/form-data">
    <h1>UPDATE COLLECTION</h1>
    <input type="text" placeholder="enter name" value=""<?php $row['nom']; ?> name="collection_name" > <br>
    <input type="text" placeholder="enter artiste" value=""<?php $row['artiste']; ?> name="artiste_name" > <br>
    <input type="file" accept="image/jpeg, image/png image/jpg" value=""<?php $row['image']; ?> name="collection_image" > <br>
    <input type="submit" class="btn" name="update_collection" value="update collection" >
    <a href="index.php">GO BACK</a>
</form>

</body>
</html>