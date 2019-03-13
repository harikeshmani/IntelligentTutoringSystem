<header id="header" class="header-narrow" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 57, 'stickySetTop': '-55px', 'stickyChangeLogo': false}">
	<div class="header-body">
		<div class="header-container container">
			<div class="header-row">
				<div class="header-column">
					<div class="header-row">
						<div class="header-logo">
							<a href="index.php">
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
										<?php if(isset($_SESSION['user_id'])) { ?>
										<li>
											<a class="nav-link" href="home.php">
												Home
											</a>
										</li>
										<li class="dropdown">
											<a class="dropdown-item dropdown-toggle" href="#">
												Profile
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="profile.php">Your Profile</a></li>
												<li><a class="dropdown-item" href="account.php">Your Account</a></li>
												<li><a class="dropdown-item" href="file.php">Your Files</a></li>
												<li><a class="dropdown-item" href="history.php">History</a></li>
												<li><a class="dropdown-item" href="earnings.php">Your Earning</a></li>
											</ul>
										</li>
										<li class="dropdown">
											<a class="dropdown-item dropdown-toggle">
												Messages
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="messages.php">Your Messages</a></li>
												<li><a class="dropdown-item" href="requests.php">Your Requests</a></li>
												<li><a class="dropdown-item" href="notification.php">Notifications</a></li>
											</ul>
										</li>
										<li>
											<a class="nav-link" href="add_session.php">
												Add Session
											</a>
										</li>
										<li>
											<a class="nav-link" href="customer_service.php">
												customer service
											</a>
										</li>
										<li>
											<a class="nav-link" href="logout.php">
												logout
											</a>
										</li>
										<li class="dropdown">
											<a class="dropdown-item dropdown-toggle">
												Select Language
											</a>
											<ul class="dropdown-menu">
												
												<li><a class="dropdown-item" href="../hn/index.php">Hindi</a></li>
												<li><a class="dropdown-item" href="../mt/index.php">Marathi</a></li>
												<li><a class="dropdown-item" href="../telugu/index.php">Telugu</a></li>
											</ul>
										</li>
										<?php } else { ?>
										<li class="dropdown">
											<a class="dropdown-item dropdown-toggle" >
												Select Language
											</a>
											<ul class="dropdown-menu">
												
												<li><a class="dropdown-item" href="../hn/index.php">Hindi</a></li>
												<li><a class="dropdown-item" href="../mt/index.php">Marathi</a></li>
												<li><a class="dropdown-item" href="../telugu/index.php">Telugu</a></li>
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