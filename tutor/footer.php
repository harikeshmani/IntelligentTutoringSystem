		<footer id="footer">
			<div class="container">
				<div class="row">
					<div class="footer-ribbon">
						<span>Get in Touch</span>
					</div>
					<div class="col-lg-3">
						<div class="newsletter">
							<h4>Newsletter</h4>
							<p>Keep up on our always evolving product features and technology. Enter your e-mail and subscribe to our newsletter.</p>
							
							<div class="alert alert-success d-none" id="newsletterSuccess">
								<strong>Success!</strong> You've been added to our email list.
							</div>
							
							<div class="alert alert-danger d-none" id="newsletterError"></div>
							
							<form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST">
								<div class="input-group">
									<input class="form-control form-control-sm" placeholder="Email Address" name="newsletterEmail" id="newsletterEmail" type="text">
									<span class="input-group-append">
										<button class="btn btn-light" type="submit">Go!</button>
									</span>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-3">
						<h4>Latest Tweets</h4>
						<div id="tweet" class="twitter" data-plugin-tweets data-plugin-options="{'username': '', 'count': 2}">
							<p>Please wait...</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="contact-details">
							<h4>Contact Us</h4>
							<ul class="contact">
								<li><p><i class="fas fa-map-marker-alt"></i> <strong>Address:</strong> 9B & 9C, 9th Floor, South Tower, Godrej One, Pirojshanagar, Vikhroli (East), Mumbai, Maharashtra - 400079</p></li>
								<li><p><i class="fas fa-phone"></i> <strong>Phone:</strong> (022) 3045 0450</p></li>
								<li><p><i class="far fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">info@sterlitegarv.in</a></p></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-2">
						<h4>Follow Us</h4>
						<ul class="social-icons">
							<li class="social-icons-facebook"><a href="" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
							<li class="social-icons-twitter"><a href="" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
							<li class="social-icons-linkedin"><a href="" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<div class="container">
					<div class="row">
						<div class="col-lg-1">
							<a href="index.html" class="logo">
								<img alt="sterlite Garv" class="img-fluid" src="img/logo.png">
							</a>
						</div>
						<div class="col-lg-7">
							<p>© Copyright 2018. All Rights Reserved.</p>
						</div>
						<div class="col-lg-4">
							<nav id="sub-menu">
								<ul>
									<li><a href="#">FAQ's</a></li>
									<li><a href="#">Sitemap</a></li>
									<li><a href="#">Contact</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</footer>