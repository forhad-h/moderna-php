
		<section id="featured">
			<!-- start slider -->
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<!-- Slider -->
						<div id="main-slider" class="flexslider">
							<ul class="slides">
                              <?php
                                $select = 'SELECT * FROM m_banners ORDER BY b_id DESC LIMIT 0, 3';
								$query = mysqli_query($GLOBALS['con'], $select);
								while($row = mysqli_fetch_assoc($query)) :
								
							  ?>
								<li>
									<img src="<?= 'm-admin/images/'.$row['b_img'];?>" alt="" />
									<div class="flex-caption">
										<h3><?= $row['b_heading'];?></h3>
										<p><?= substr($row['b_description'], 0, 100);?>...</p>
										<a href="<?= $row['b_url'];?>" class="btn btn-theme"><?= $row['b_cta'];?></a>
									</div>
								</li>
                              <?php endwhile;?>
							</ul>
						</div>
						<!-- end slider -->
					</div>
				</div>
			</div>
		</section>