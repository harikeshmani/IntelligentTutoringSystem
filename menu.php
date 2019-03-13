<?php
$lang = $_GET['lang'];
if($lang=='hn') { ?>
<header id="header" class="header-narrow" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 57, 'stickySetTop': '-55px', 'stickyChangeLogo': false}">
	<div class="header-body">
		<div class="header-container container">
			<div class="header-row">
				<div class="header-column">
					<div class="header-row">
						<div class="header-logo">
							<a href="index.php?lang=hn">
								<img alt="sterlite Garv" width="100" height="48" src="img/logo.png">
							</a>
						</div>
					</div>
				</div>
				<div class="header-column justify-content-end">
					<div class="header-row">
						<div class="header-nav">
							<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
								<nav class="collapse">
									<ul class="nav nav-pills" id="mainNav">
										<?php if(isset($_SESSION['userid'])) { ?>
										<li>
											<a class="nav-link" href="home.php?lang=hn">
												होम
											</a>
										</li>
										<li class="dropdown">
											<a class="dropdown-item dropdown-toggle" href="#">
												प्रोफाइल
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="profile.php?lang=hn">आपका प्रोफाइल </a></li>
												<li><a class="dropdown-item" href="account.php?lang=hn">आपका अकाउंट </a></li>
												<li><a class="dropdown-item" href="file.php?lang=hn">आपकी फाइल्स </a></li>
												<li><a class="dropdown-item" href="history.php?lang=hn">इतिहास </a></li>
											</ul>
										</li>
										<li class="dropdown">
											<a class="dropdown-item dropdown-toggle">
												संदेश
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="messages.php?lang=hn">आपके संदेश</a></li>
												<li><a class="dropdown-item" href="requests.php?lang=hn">आपका अनुरोध</a></li>
												<li><a class="dropdown-item" href="notification.php?lang=hn">नोटिफिकेशन्स</a></li>
											</ul>
										</li>
										<li>
											<a class="nav-link" href="customer_service.php?lang=hn">
												ग्राहक सेवा 
											</a>
										</li>
										<li>
											<a class="nav-link" href="paynow.php?lang=hn">
												अब भुगतान करें
											</a>
										</li>
										<li>
											<a class="nav-link" href="logout.php?lang=hn">
												लॉगआउट 											
											</a>
										</li>
										<li class="dropdown">
											<a class="dropdown-item dropdown-toggle">
												भाषा चुनिए
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="index.php?lang=eng">अंग्रेज़ी</a></li>
												<li><a class="dropdown-item" href="index.php?lang=mt">मराठी</a></li>
												<li><a class="dropdown-item" href="index.php??lang=tl">तेलुगु</a></li>
											</ul>
										</li>
										<?php } else { ?>
										<li>
											<a class="nav-link" href="role.php?lang=hn">
												लॉगिन करें 
											</a>
										</li>
										<li class="dropdown">
											<a class="dropdown-item dropdown-toggle" >
												भाषा चुनिए
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="index.php?lang=eng">अंग्रेज़ी</a></li>
												<li><a class="dropdown-item" href="index.php?lang=mt">मराठी</a></li>
												<li><a class="dropdown-item" href="index.php?lang=tl">तेलुगु</a></li>
											</ul>
										</li>
										<?php	} ?>
									</ul>
								</nav>
							</div>
							<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
							<i class="fas fa-bars"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<?php } else if($lang=='mt') { ?>
<header id="header" class="header-narrow" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 57, 'stickySetTop': '-55px', 'stickyChangeLogo': false}">
	<div class="header-body">
		<div class="header-container container">
			<div class="header-row">
				<div class="header-column">
					<div class="header-row">
						<div class="header-logo">
							<a href="index.php?lang=mt">
								<img alt="sterlite Garv" width="100" height="48" src="img/logo.png">
							</a>
						</div>
					</div>
				</div>
				<div class="header-column justify-content-end">
					<div class="header-row">
						<div class="header-nav">
							<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
								<nav class="collapse">
									<ul class="nav nav-pills" id="mainNav">
										<?php if(isset($_SESSION['userid'])) { ?>
										<li>
											<a class="nav-link" href="home.php?lang=mt">
												घर
											</a>
										</li>
										<li class="dropdown">
											<a class="dropdown-item dropdown-toggle" href="#">
												प्रोफाइल
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="profile.php?lang=mt">तुमचे व्यक्तिमत्व </a></li>
												<li><a class="dropdown-item" href="account.php?lang=mt">तुमचे खाते</a></li>
												<li><a class="dropdown-item" href="file.php?lang=mt">तुमच्या फाइल्स </a></li>
												<li><a class="dropdown-item" href="history.php?lang=mt">इतिहास </a></li>
											</ul>
										</li>
										<li class="dropdown">
											<a class="dropdown-item dropdown-toggle">
												सम्भाषण 
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="messages.php?lang=mt">तुमचे सम्भाषण </a></li>
												<li><a class="dropdown-item" href="requests.php?lang=mt">तुमच्या  विनंत्या</a></li>
												<li><a class="dropdown-item" href="notification.php?lang=mt">सूचना</a></li>
											</ul>
										</li>
										<li>
											<a class="nav-link" href="customer_service.php?lang=mt">
												ग्राहक सेवा 
											</a>
										</li>
										<li>
											<a class="nav-link" href="paynow.php?lang=mt">
												पैसे भरा 
											</a>
										</li>
										<li>
											<a class="nav-link" href="logout.php?lang=mt">
												
												लॉग आउट 
											</a>
										</li>
										<li class="dropdown">
											<a class="dropdown-item dropdown-toggle">
												
												भाषा निवडा
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="index.php?lang=eng">इंग्रजी</a></li>
												<li><a class="dropdown-item" href="index.php?lang=hn">हिंदी</a></li>
												<li><a class="dropdown-item" href="index.php?lang=tl">तेलगु</a></li>
											</ul>
										</li>
										<?php } else { ?>
                                        <li>
											<a class="nav-link" href="role.php?lang=mt">
												लॉगिन 
											</a>
										</li>
										<li class="dropdown">
											<a class="dropdown-item dropdown-toggle">
												भाषा निवडा
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="index.php?lang=eng">इंग्रजी</a></li>
												<li><a class="dropdown-item" href="index.php?lang=hn">हिंदी</a></li>
												<li><a class="dropdown-item" href="index.php?lang=tl">तेलगु</a></li>
											</ul>
										</li>
										<?php	} ?>
									</ul>
								</nav>
							</div>
							<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
							<i class="fas fa-bars"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<?php } else if($lang=='tl') { ?>
<header id="header" class="header-narrow" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 57, 'stickySetTop': '-55px', 'stickyChangeLogo': false}">
	<div class="header-body">
		<div class="header-container container">
			<div class="header-row">
				<div class="header-column">
					<div class="header-row">
						<div class="header-logo">
							<a href="index.php?lang=tl">
								<img alt="sterlite Garv" width="100" height="48" src="img/logo.png">
							</a>
						</div>
					</div>
				</div>
				<div class="header-column justify-content-end">
					<div class="header-row">
						<div class="header-nav">
							<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
								<nav class="collapse">
									<ul class="nav nav-pills" id="mainNav">
										<?php if(isset($_SESSION['userid'])) { ?>
										<li>
											<a class="nav-link" href="home.php?lang=tl">
												హోమ్
											</a>
										</li>
										<li class="dropdown">
											<a class="dropdown-item dropdown-toggle" href="#">
												ప్రొఫైల్
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="profile.php?lang=tl">మీ ప్రొఫైల్</a></li>
												<li><a class="dropdown-item" href="account.php?lang=tl">మీ ఖాతా</a></li>
												<li><a class="dropdown-item" href="file.php?lang=tl">మీ ఫైళ్ళు</a></li>
												<li><a class="dropdown-item" href="history.php?lang=tl">చరిత్ర</a></li>
											</ul>
										</li>
										<li class="dropdown">
											<a class="dropdown-item dropdown-toggle">
												సందేశాలు
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="messages.php?lang=tl">మీ సందేశాలు</a></li>
												<li><a class="dropdown-item" href="requests.php?lang=tl">మీ అభ్యర్థనలు</a></li>
												<li><a class="dropdown-item" href="notification.php?lang=tl">ప్రకటనలు</a></li>
											</ul>
										</li>
										<li>
											<a class="nav-link" href="customer_service.php?lang=tl">
												వినియోగదారుల సేవ
											</a>
										</li>
										<li>
											<a class="nav-link" href="pay_now.php?lang=tl">
												ఇప్పుడు చెల్లించండి
											</a>
										</li>
										<li>
											<a class="nav-link" href="logout.php?lang=tl">
												లాగ్అవుట్
											</a>
										</li>
										<li class="dropdown">
											<a class="dropdown-item dropdown-toggle">
												భాషను ఎంచుకోండి
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="index.php?lang=eng">English</a></li>
												<li><a class="dropdown-item" href="index.php?lang=hn">हिंदी</a></li>
												<li><a class="dropdown-item" href="index.php?lang=mt">मराठी</a></li>
											</ul>
										</li>
										<?php } else { ?>
										<li>
											<a class="nav-link" href="role.php?lang=tl">
												లాగిన్
											</a>
										</li>
										<li class="dropdown">
											<a class="dropdown-item dropdown-toggle" >
												భాషను ఎంచుకోండి
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="index.php?lang=eng">English</a></li>
												<li><a class="dropdown-item" href="index.php?lang=hn">हिंदी</a></li>
												<li><a class="dropdown-item" href="index.php?lang=mt">मराठी</a></li>
											</ul>
										</li>
										<?php	} ?>
									</ul>
								</nav>
							</div>
							<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
							<i class="fas fa-bars"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<?php } else { ?>
<header id="header" class="header-narrow" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 57, 'stickySetTop': '-55px', 'stickyChangeLogo': false}">
	<div class="header-body">
		<div class="header-container container">
			<div class="header-row">
				<div class="header-column">
					<div class="header-row">
						<div class="header-logo">
							<a href="index.php?lang=eng">
								<img alt="sterlite Garv" width="100" height="48" src="img/logo.png">
							</a>
						</div>
					</div>
				</div>
				<div class="header-column justify-content-end">
					<div class="header-row">
						<div class="header-nav">
							<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
								<nav class="collapse">
									<ul class="nav nav-pills" id="mainNav">
										<?php if(isset($_SESSION['userid'])) { ?>
										<li>
											<a class="nav-link" href="home.php?lang=hn">
												Home
											</a>
										</li>
										<li class="dropdown">
											<a class="dropdown-item dropdown-toggle" href="#">
												Profile
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="profile.php?lang=eng">Your Profile</a></li>
												<li><a class="dropdown-item" href="account.php?lang=eng">Your Account</a></li>
												<li><a class="dropdown-item" href="file.php?lang=eng">Your Files </a></li>
												<li><a class="dropdown-item" href="history.php?lang=eng">History</a></li>
											</ul>
										</li>
										<li class="dropdown">
											<a class="dropdown-item dropdown-toggle">
												Messages
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="messages.php?lang=eng">Your Messages</a></li>
												<li><a class="dropdown-item" href="requests.php?lang=eng">Your Requests</a></li>
												<li><a class="dropdown-item" href="notification.php?lang=eng">Notifications</a></li>
											</ul>
										</li>
										<li>
											<a class="nav-link" href="customer_service.php?lang=eng">
												Customer Service
											</a>
										</li>
										<li>
											<a class="nav-link" href="pay_now.php?lang=eng">
												Pay Now
											</a>
										</li>
										<li>
											<a class="nav-link" href="logout.php?lang=eng">
												Logout
											</a>
										</li>
										<li class="dropdown">
											<a class="dropdown-item dropdown-toggle">
												change language
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="index.php?lang=hn">हिंदी</a></li>
												<li><a class="dropdown-item" href="index.php?lang=mt">मराठी</a></li>
												<li><a class="dropdown-item" href="index.php?lang=tl">తెలుగు</a></li>
											</ul>
										</li>
										<?php } else { ?>
										<li>
											<a class="nav-link" href="role.php?lang=eng">
												Log in
											</a>
										</li>
										<li class="dropdown">
											<a class="dropdown-item dropdown-toggle" >
												Change Language
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="index.php?lang=hn">हिंदी</a></li>
												<li><a class="dropdown-item" href="index.php?lang=mt">मराठी</a></li>
												<li><a class="dropdown-item" href="index.php?lang=tl">తెలుగు</a></li>
											</ul>
										</li>
										<?php	} ?>
									</ul>
								</nav>
							</div>
							<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
							<i class="fas fa-bars"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<?php } ?>