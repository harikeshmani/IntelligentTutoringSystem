<?php
include("auth.php");
$user_id = $_SESSION['userid'];
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php") ?>
	</head>
	<body>
		<div class="body">
			<?php include("menu.php") ?>
			<div role="main" class="main">
				<section class="page-header">
					<div class="container">
						<div class="row">
						</div>
						<div class="row">
							<div class="col">
								<h1>Working Memory Game List</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<h4>Working Memory Game List</h4>
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Icon</th>
										<th>Game Name :</th>
										<th>Open Link :</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$list = mysqli_query($link, "SELECT * FROM tbl_game_type where  game_type='memory' ");
									while($list_data=mysqli_fetch_array($list))
									{
									echo "<tr>";
										echo "<td><img src='api/game_icon/games working memory.png' alt='working memory' height='38' width='62'></td>";
										echo "<td>".$list_data['game_name']."</td>";
										echo "<td><a href='".$list_data['game_link']."'><button type= 'submit' class='btn btn-primary'>Link</button></a></td>";
									echo "</tr>";
									} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<?php include("footer.php") ?>
			</div>
			<!-- Vendor -->
			<?php include("footer_files.php") ?>			
			
		</body>
	</html>