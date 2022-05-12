<nav class="navbar navbar-dark navbar-expand-sm bg-dark">
			<a href="../browse/index.php" class="navbar-brand"><img src="../images/logo-navbar.png" width="100px" alt="Netflix"></a>
			<!-- Button (gebruikt standaard bootstrap jquery) -->
			<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarMenu">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a href="../browse/index.php" class="nav-link">Home</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">Movies</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">Series</a>
					</li>
				</ul>
			</div>
			<div class="collapse navbar-collapse" id="navbarMenu">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item" style="margin-top: 6px;">
						<input type="text" name="search" id="filter" placeholder="Search...">
					</li>
					<li class="nav-item">
						<a href="../settings" class="nav-link"><i class="fas fa-cog"></i></a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link"><img src="../images/icons/netflix-dummy.png" width="25px"></a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link"><img src="../images/icons/netflix-dummy-2.jpg" width="25px"></a>
					</li>
<!-- 					<li class="nav-item">
						<form method="POST" action="../php/logout.inc.php">
							<button class="btn btn-secondary btn-sm" type="submit" name="logout-submit" style="height: 25px;">Logout</button>
						</form>
					</li> -->
					<li class="nav-item">
						<a href="../php/logout.inc.php" class="nav-link btn-logout">Logout</a>
					</li>

				</ul>
			</div>
		</nav>
