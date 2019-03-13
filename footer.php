<?php
$lang = $_GET['lang'];
if($lang=='hn') { ?>
<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="footer-ribbon">
				<span>संपर्क में रहें </span>
			</div>
			<div class="col-lg-3">
				<div class="newsletter">
					<h4>समाचार पत्रिका</h4>
					<p>हमारी हमेशा विकसित उत्पाद सुविधाओं और प्रौद्योगिकी पर बने रहें। अपना ई-मेल दर्ज करें और हमारे न्यूज़लेटर की सदस्यता लें.</p>
					
					<div class="alert alert-success d-none" id="newsletterSuccess">
						<strong>सफलता!</strong> आपको हमारी ईमेल सूची में जोड़ा गया है।
					</div>
					<div class="alert alert-danger d-none" id="newsletterError"></div>
					<form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST">
						<div class="input-group">
							<input class="form-control form-control-sm" placeholder="ईमेल पता" name="newsletterEmail" id="newsletterEmail" type="text">
							<span class="input-group-append">
								<button class="btn btn-light" type="submit"> जाओ!</button>
							</span>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-3">
				<h4>नवीनतम ट्वीट</h4>
				<div id="tweet" class="twitter" data-plugin-tweets data-plugin-options="{'username': '', 'count': 2}">
					<p>कृपया प्रतीक्षा करें...</p>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="contact-details">
					<h4>हमसे संपर्क करें</h4>
					<ul class="contact">
						<li><p><i class="fas fa-map-marker-alt"></i> <strong>
						पता:</strong> 9B & 9C, 9वीं मंजिल, साउथ टॉवर, गोदरेज वन, पिरोजशानगर, विक्रोली (पूर्व), मुंबई, महाराष्ट्र - 400079</p></li>
						<li><p><i class="fas fa-phone"></i> <strong>फ़ोन:</strong> (022) 3045 0450</p></li>
						<li><p><i class="far fa-envelope"></i> <strong>ईमेल:</strong> <a href="mailto:mail@example.com">info@sterlitegarv.in</a></p></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-2">
				<h4>हमारा अनुसरण करें</h4>
				<ul class="social-icons">
					<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
					<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
					<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-1">
					<a href="index.html" class="logo">
						<img alt="sterlite Garv Website Template" class="img-fluid" src="img/logo.png">
					</a>
				</div>
				<div class="col-lg-7">
					<p>© कॉपीराइट 2018. सभी अधिकार सुरक्षित।</p>
				</div>
				<div class="col-lg-4">
					<nav id="sub-menu">
						<ul>
							<li><a href="page-faq.html">पूछे जाने वाले प्रश्न के</a></li>
							<li><a href="sitemap.html">साइटमैप</a></li>
							<li><a href="contact-us.html">
							संपर्क करें</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php	} else if($lang=='mt') { ?>
<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="footer-ribbon">
				<span>संपर्कात रहाण्यासाठी</span>
			</div>
			<div class="col-lg-3">
				<div class="newsletter">
					<h4>वृत्तपत्र</h4>
					<p>आमची नेहमीच उदयोन्मुख उत्पादन वैशिष्ट्ये आणि तंत्रज्ञान ठेवा. आपला ई-मेल भरा आणि आमच्या वृत्तपत्राची सदस्यता घ्या.</p>
					
					<div class="alert alert-success d-none" id="newsletterSuccess">
						<strong>यश!</strong> आपल्याला आमच्या ईमेल सूचीमध्ये जोडले गेले आहे.
					</div>
					
					<div class="alert alert-danger d-none" id="newsletterError"></div>
					
					<form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST">
						<div class="input-group">
							<input class="form-control form-control-sm" placeholder="Email Address" name="newsletterEmail" id="newsletterEmail" type="text">
							<span class="input-group-append">
								<button class="btn btn-light" type="submit">जा!</button>
							</span>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-3">
				<h4>नवीनतम ट्वीट</h4>
				<div id="tweet" class="twitter" data-plugin-tweets data-plugin-options="{'username': '', 'count': 2}">
					<p>कृपया थांबा...</p>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="contact-details">
					<h4>आमच्याशी संपर्क साधा</h4>
					<ul class="contact">
						<li><p><i class="fas fa-map-marker-alt"></i> <strong>पत्ता:</strong> 9B & 9C, 9 वा मजला, दक्षिण टॉवर, गोदरेज वन, पािरोजानगर, विक्रोळी (पूर्व), मुंबई, महाराष्ट्र - 400079</p></li>
						<li><p><i class="fas fa-phone"></i> <strong>फोन:</strong> (022) 3045 0450</p></li>
						<li><p><i class="far fa-envelope"></i> <strong>ईमेल:</strong> <a href="mailto:mail@example.com">info@sterlitegarv.in</a></p></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-2">
				<h4>आमच्या मागे या</h4>
				<ul class="social-icons">
					<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
					<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
					<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-1">
					<a href="index.html" class="logo">
						<img alt="sterlite Garv Website Template" class="img-fluid" src="img/logo.png">
					</a>
				</div>
				<div class="col-lg-7">
					<p>© कॉपीराइट 2018. सर्व हक्क राखीव.</p>
				</div>
				<div class="col-lg-4">
					<nav id="sub-menu">
						<ul>
							<li><a href="page-faq.html">नेहमी विचारले जाणारे प्रश्न</a></li>
							<li><a href="sitemap.html">साइटमॅप</a></li>
							<li><a href="contact-us.html">संपर्क साधा</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php	} else if($lang=='tl') { ?>
<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="footer-ribbon">
				<span>అందుబాటులో ఉండు
				</span>
			</div>
			<div class="col-lg-3">
				<div class="newsletter">
					<h4>వార్తా</h4>
					<p>మా ఎల్లప్పుడూ అభివృద్ధి చెందుతున్న ఉత్పత్తి లక్షణాలు మరియు సాంకేతికతను కొనసాగించండి. మీ ఇ-మెయిల్ను ఎంటర్ చేసి, మా వార్తాలేఖకు చందా చేయండి</p>
					
					<div class="alert alert-success d-none" id="newsletterSuccess">
						<strong>విజయం!</strong> మీరు మా ఇమెయిల్ జాబితాకు జోడించబడ్డారు.
					</div>
					
					<div class="alert alert-danger d-none" id="newsletterError"></div>
					
					<form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST">
						<div class="input-group">
							<input class="form-control form-control-sm" placeholder="Email Address" name="newsletterEmail" id="newsletterEmail" type="text">
							<span class="input-group-append">
								<button class="btn btn-light" type="submit">వెళ్ళండి!</button>
							</span>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-3">
				<h4>తాజా ట్వీట్లు
				</h4>
				<div id="tweet" class="twitter" data-plugin-tweets data-plugin-options="{'username': '', 'count': 2}">
					<p>దయచేసి వేచి ఉండండి...</p>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="contact-details">
					<h4>మమ్మల్ని సంప్రదించండి</h4>
					<ul class="contact">
						<li><p><i class="fas fa-map-marker-alt"></i> <strong>చిరునామా:</strong> 9B & 9C,
						9 వ అంతస్తు, సౌత్ టవర్, గోద్రేజ్ వన్, పిరోజ్షానగర్, విఖ్రోలి (ఈస్ట్), ముంబై, మహారాష్ట్ర - 400079</p></li>
						<li><p><i class="fas fa-phone"></i> <strong>ఫోన్:</strong> (022) 3045 0450</p></li>
						<li><p><i class="far fa-envelope"></i> <strong>ఇమెయిల్:</strong> <a href="mailto:mail@example.com">info@sterlitegarv.in</a></p></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-2">
				<h4>మమ్మల్ని అనుసరించు</h4>
				<ul class="social-icons">
					<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
					<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
					<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-1">
					<a href="index.html" class="logo">
						<img alt="sterlite Garv Website Template" class="img-fluid" src="img/logo.png">
					</a>
				</div>
				<div class="col-lg-7">
					<p>© కాపీరైట్ 2018. అన్ని హక్కులు.</p>
				</div>
				<div class="col-lg-4">
					<nav id="sub-menu">
						<ul>
							<li><a href="../page-faq.html">
							తరచుగా అడిగే ప్రశ్నలు యొక్క</a></li>
							<li><a href="../sitemap.html">సైట్ మ్యాప్
							Saiṭ myāp</a></li>
							<li><a href="../contact-us.html">సంప్రదించండి</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php	} else { ?>
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
					<li class="social-icons-facebook"><a href="#" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
					<li class="social-icons-twitter"><a href="#" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
					<li class="social-icons-linkedin"><a href="#" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-1">
					<a href="index.html" class="logo">
						<img alt="sterlite Garv Website Template" class="img-fluid" src="img/logo.png">
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
<?php	}	?>