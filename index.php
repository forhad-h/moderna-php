<?php
    require_once('functions/functions.php');
	get_header();
	get_banner();
?>
        
		<section class="callaction">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="big-cta">
							<div class="cta-text">
                            <?php
						       $select = "SELECT * FROM m_others WHERE o_name = 'site-heading'";
							   $row = mysqli_fetch_assoc(mysqli_query($con, $select));
							?>
								<h2><?= $row['o_value'];?></h2>
                              
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="row">
                        <?php
							$select = 'SELECT * FROM m_features ORDER BY f_id DESC LIMIT 0, 4';
							$query = mysqli_query($con, $select);
							while($row = mysqli_fetch_assoc($query)) :
						?>
							<div class="col-lg-3">
								<div class="box">
									<div class="box-gray aligncenter">
										<h4><?= $row['f_heading'];?></h4>
										<div class="icon">
											<i class="<?= $row['f_icon'];?>"></i>
										</div>
										<p>
											<?= substr($row['f_description'], 0, 80);?>...
										</p>

									</div>
									<div class="box-bottom">
										<a href="<?= $row['f_url'];?>">Learn more</a>
									</div>
								</div>
							</div>
                        <?php endwhile; ?>
						</div>
					</div>
				</div>
				<!-- divider -->
				<div class="row">
					<div class="col-lg-12">
						<div class="solidline">
						</div>
					</div>
				</div>
				<!-- end divider -->
				<!-- Portfolio Projects -->
				<div class="row">
					<div class="col-lg-12">
						<h4 class="heading">Recent Works</h4>
						<div class="row">
							<section id="projects">
								<ul id="thumbs" class="portfolio">
                                <?php
		  							$select = 'SELECT * FROM m_portfolio ORDER BY p_id DESC LIMIT 0, 4';
		  							$query = mysqli_query($con, $select);
		  							while($row = mysqli_fetch_assoc($query)) :
		  						?>
									<!-- Item Project and Filter Name -->
									<li class="col-lg-3 design" data-id="id-0" data-type="web">
										<div class="item-thumbs">
											<!-- Fancybox - Gallery Enabled - Title - Full Image -->
											<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Work 1" href="<?= $row['p_url'];?>">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
											<!-- Thumb Image and Description -->
											<img src="<?= 'm-admin/images/'.$row['p_img'];?>" alt="<?= $row['p_img'];?>">
										</div>
									</li>
                                  <?php endwhile;?>
									<!-- End Item Project -->
								</ul>
							</section>
						</div>
					</div>
				</div>

			</div>
		</section>
        
<?php
    get_footer();
?>