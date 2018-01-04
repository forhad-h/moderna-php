<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i></a></li>
                    <li><a href="index.php">Home</a></li>
                    
                    <?php  if($GLOBALS["page"] == 'features.php') :?>
                    <li><a href="features.php">Features</a></li>
                    <?php endif;?>
                    
                    <?php  if($GLOBALS["page"] == 'portfolio.php') :?>
                    <li><a href="portfolio.php">Portfolio</a></li>
                    <?php endif;?>
                    
                    <?php  if($GLOBALS["page"] == 'contact.php') :?>
                    <li><a href="contact.php">Contact</a></li>
                    <?php endif;?>
                </ul>
            </div>
        </div>
    </div>
</section>