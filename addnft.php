
<?php 
@include 'connect.php';

if(isset($_POST['add_nft'])){

    $nft_name = $_POST['nft_name'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $id_collection = $_POST['select_collection'];
    $nft_image = $_FILES['nft_image']['name'];
    $nft_image_tmp_name = $_FILES['nft_image']['tmp_name'];
    $nft_image_folder = 'img/' .$nft_image;

    if(empty($nft_name) || empty($description) || empty($nft_image) || empty($id_collection) || empty($prix)  ){
       $message[]= 'please fill out all';
    } else{
        $insert = "INSERT INTO nft (nom,description,prix,image,idcollection) VALUES('$nft_name','$description','$prix','$nft_image','$id_collection')";
        $upload = mysqli_query($conn,$insert);
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
    <title>Form</title>
</head>
<body>

    <?php 

    if(isset($message)){
        foreach($message as $message){
            echo '<span>'.$message.'</span>';
        }
    }
    
   
 
        

    ?>


    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
    <h1>ADD NEW NFT</h1>
    <input type="text" placeholder="enter name" name="nft_name" > <br>
    <input type="text" placeholder="enter description" name="description" > <br>
    <input type="text" placeholder="enter prix" name="prix" > <br>
    <input type="file" accept="image/jpeg, image/png image/jpg" name="nft_image" > <br>
    
        <select name="select_collection" >
        <?php

                $sql = "SELECT * FROM `collection`";
                $result = mysqli_query($conn,$sql);
                $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);

                foreach($rows as $row){
                    ?>
                    <option value="<?= $row['id']?>"> <?= $row['nom']?> </option>
   
                    <?php
                
                }  
            
    
            
           
            ?>
            </select>
    

    <input type="submit" name="add_nft" value="add nft" >
    <a href="index.php">GO BACK</a>
</form>
</body>
</html>