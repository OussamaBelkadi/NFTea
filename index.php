<?php
       @include 'connect.php';
        $select = mysqli_query($conn,"SELECT * FROM collection");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NFTea</title>
    <link rel="stylesheet" href="Collection.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script defer src="main.js"></script>
    <script defer src="./logic.js"></script>

</head>
<body>
      <!--header--->
      <header>
        <a href="index.html" class="logo"><img src="./img/LOGO" alt="logo"></a>
            <ul class="NAVBAR">
            <i class="bi bi-x-circle clo-ico" id="close"></i>
                 <li> <a href="index.php">HOME</a> </li>
                 <li> <a href="collection.php">COLLECTION</a> </li>
                 <li> <a href="statistic.php">STATISTICS</a> </li> 
            </ul>
            <i class="bi bi-list resp-ico" id="open"></i>
            
    </header>

    <!--First page of Home-->
    <section class="container">
                <div class="first">
                    <div class="des-buynft">Trade NFTs from major marketplaces with 0% Rarible fees on aggregated listings. Earn RARI rewards.</div>
            
                    <div class="buy">BUY NFTS</div>
                </div>
                <div class="Second">
                    <div class="sell-nfts">SELL NFTS</div>
                    <div class="des-sell"> EVERY TREE IN THE FOREST KNOWS ABOUT CREATING VALUE AND ABOUT RECIPROCITY</div>
                </div> 
                <div class="bnt-pg1">
                    <button class="buy-nft">BUY NFTS</button>
                    <button class="learn-more" style="--clr:#1e9bff">LEARN MORE</button>
                    <!-- <div class="header-img">
                    <img  class="nonous" src="./img/header img.png" alt="header-img">
                    </div> -->
                </div>
                
    </section>
    
   <section id="collection" class="section-place">
        <div class="add-collection">
            <h2>OUR COLLECTION</h2>
            <a href="addcollection.php"><button>ADD NEW COLLECTION</button></a>
        </div>
        <div class="add-nft">
            <a href="addnft.php"><button>ADD NEW NFT</button></a>
         </div> 

    
       <div class="content-box">
        <?php
        
         while($row = mysqli_fetch_assoc($select)){
  
         ?>

        
        
        <div class="box">
            <!-- <a href="#" class="btn-open">Open</a> -->
            <a class="btn-open" href="NFTs.php?id=<?=$row['id']?>">Open</a>
            <img src="img/<?= $row['image']?>" alt="image de collection">
            <h3><?= $row['nom']?></h3>
            <p><b><?= $row['artiste']?></b></p>
            
            <a href="deletecollection.php?id=<?= $row['id']?>" name="delete" class="btn_remove-C">Remove</a>
            <a href="updatecollection.php?id=<?= $row['id']?>" name="update" class="btn-update-C" >Update</a>
        </div>
        
        
        <?php }; ?>
    </div>

   </section>
<section class="service">
    <img src="img/img-deco1.png" alt="image dicorative" class="img-tchach" >
    <div class="heading">
        <h3>What we actually do?</h3>
        <p>
            NFT's ate transforming the way commerce is transsated, contracts are enforced, </BR> investments are held, and value is transoffered, Every tree in the forest knows </BR> about creating value and value is transferred every tout reciprocity.</p>
        </p>
    </div>
    <div class="cards">
        <!--WALLET-->
        <div class="card"> 
            <div class="light"></div>
            <img src="img/wallet.png" alt="image descriptive">
            <h3>Set up your wallet</h3>
            <p>
                NFT's ate transforming the way commerce is transacted
            </p>
        </div>    
        <div class="card">
            <!--Create Collection-->
            <div class="light"></div>
            <img src="img/add-collection.png" alt="image descriptive">
            <h3>Create your collection</h3>
            <p class="ketba">
                NFT's ate transforming the way commerce is transacted
            </p>
        </div>
        <div class="card">
            <!--Geft-->
            <div class="light"></div>
            <img src="img/gift.png" alt="image descriptive" class="tswira">
            <h3>Daily Geft NFTS</h3>
            <p>
                NFT's ate transforming the way commerce is transacted
            </p>
        </div>
    </div>
</section>
<section class="info">
    <div class="info-nft">
        <p>NFTs evolved from the ERC-721 standard. Developed by some of the same people responsible for the ERC-20 smart contract, ERC-721 defines the minimum interface—ownership details, security, and metadata—required for the exchange and distribution of gaming tokens. The ERC-1155 standard takes the concept further by reducing the transaction and storage costs required for NFTs and batching multiple types of non-fungible tokens into a single contract.</p>
        <img src="img/Logo-nfts.png" alt="logo NFTS">
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
</body>
</html>