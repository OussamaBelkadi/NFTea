<?php

@include 'connect.php';
$id =$_GET['id'];

if(isset($_POST['update_nft'])){

    $nft_name = $_POST['nft_name'];
    $nft_description = $_POST['nft_description'];
    $nft_prix = $_POST['nft_prix'];
    $nft_image = $_FILES['nft_image']['name'];
    $nft_image_tmp_name = $_FILES['nft_image']['tmp_name'];
    $nft_image_folder = 'img/' .$nft_image;

    if(empty($nft_name) || empty($nft_description) || empty($nft_prix) || empty($nft_image) ){
       $message[]= 'please fill out all';
    } else{
        $update = " UPDATE nft SET nom='$nft_name', description='$nft_description', prix='$nft_prix', image='$nft_image' WHERE id=$id";
        $upload = mysqli_query($conn,$update);
        if($upload){
            move_uploaded_file( $nft_image_tmp_name, $nft_image_folder);
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
        $select = mysqli_query($conn,"SELECT * FROM nft");
        $row = mysqli_fetch_assoc($select);
        ?>

<form action="<?php $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
    <h1>UPDATE NFT</h1>
    <input type="text" placeholder="enter name" value=""<?php $row['nom']; ?> name="nft_name" > <br>
    <input type="text" placeholder="enter description" value=""<?php $row['description']; ?> name="nft_description" > <br>
    <input type="text" placeholder="enter prix" value=""<?php $row['prix']; ?> name="nft_prix" > <br>
    <input type="file" accept="image/jpeg, image/png image/jpg" value=""<?php $row['image']; ?> name="nft_image" > <br>
    <input type="submit" name="update_nft" value="update nft" >
    <a href="index.php">GO BACK</a>
</form>

</body>
</html>