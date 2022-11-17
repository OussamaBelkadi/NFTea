<?php 

  @include 'connect.php';
  $coln = $_GET['id'];
  $select = mysqli_query($conn,"SELECT * FROM nft WHERE idcollection = $coln");

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NFTea</title>
    <link rel="stylesheet" href="NFTs.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>
<body>
      <!--header--->
      <header>
        <a href="index.html" class="logo"><img src="./img/LOGO" alt="logo"></a>
            <ul class="NAVBAR">
                <i class="bi bi-x-circle clo-ico" id="close"></i>
                 <li> <a href="index.php">HOME</a> </li>
                 <li> <a href="Collection.css">COLLECTION</a> </li>
                 <li> <a href="statistic.css">STATISTICS</a> </li> 
            </ul>
                <i class="bi bi-list resp-ico" id="open"></i>
    </header>

    <!--PAGE NFTs-->
    <section class="containerr">
       <div class="NFT-content">
            <h3>OUR NFTs</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi nobis omnis accusamus,eius laboriosam beatae. Rerum pariatur hic optio, quam assumenda .</p>
        </div>      
    </div>       
   </section>
  
   <section id="collection">
   
    <div class="NFTs-body">

    <?php       
       
       while($val= mysqli_fetch_assoc($select)){

       ?>
        <div class="box-nft">
        <img src="img/<?= $val['image']?>" alt="image de nft">
            <h3><?= $val['nom']?></h3> 
            <p><?= $val['description']?></p>  
            <h4><?= $val['prix']?></h4>  
            <a href="deletenft.php?id=<?= $val['id']?>" name="deletenft" class="btn_remove-N">Remove</a>
            <a href="updatenft.php?id=<?= $val['id']?>" name="update" class="btn-update-N" >Update</a>
        </div>
        <?php }; ?>
    </div>
   </section>






    <!-- foooter -->
    <footer >
        <section class="footer">
            <div class="footer-content">
                <div>
                    <H3>NFTea</H3>
                    <p>Lorem ipsum dolor sit amet adipisicing elit. <br> Lorem ipsum dolor sit amet adipisicing. <br> Aliquam sapiente ipsum suscipit  <br> Sequi dicta.</p>
                </div>
                <div>
                    <h3>Navigation</h3>
                    <ul>
                        <li>Home</li>
                        <li>Collection</li>
                        <li>Statistics</li>
                    </ul>
                </div>
                <div>
                    <h3>Quick link</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Instagram</li>
                        <li>Twitter</li>
                    </ul>
                </div>
                <div>
                    <img src="./img/footer-img.jpg" alt="">
                </div>
            </div>
            <div class="copyright">
                <p>© Copyright 2022 Desgined. All Rights Reserved.</p>
            </div>  
        </section> 
    </footer>  
    <script src="./logic.js"></script>
</body>
</html>