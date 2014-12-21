<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Fergus Morrow - Code</title>

		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/theme.css" rel="stylesheet">
		<link href="css/gh-site.css" rel="stylesheet">
	</head>

	<body>
		<div class="wrap">
			<div class="container">
				<nav class="main-nav">
					<ul>
						<li><a href="http://fergus.london/">My Blog</a></li>
					</ul>
				</nav>

				<div class="blog-header">
					<a href="http://fergus.london/">
						<h1 class="blog-title">Fergus Morrow...</h1>
					</a>
					<p class="lead blog-description">... <em>and his code.</em></p>
				</div>
			</div>

			<div class="fw-breaker" id="gh-image"></div>

			<div class="container">
				<div class="row">
					<div class="col-sm-12 blog-main">
						
						<!-- Categories -->
						<?php foreach( $page->Categories() as $title => $category ): ?>
						<article class="blog-post">
							
							<!-- Category Information -->
							<header>
								<h2 class="blog-post-title"><?php echo $title; ?></h2>
								<p class="blog-post-meta">
									<?php foreach( $category['langs'] as $lang ): ?>
									<span class="label label-primary"><?php echo $lang; ?></span>
								<?php endforeach; ?>
								</p>
							</header>

							<p class="lead"><?php echo $category['desc']; ?></p>
							<!-- EOF Category Information -->

							<!-- Repositories -->
							<?php foreach( $category['repositories'] as $repo ): ?>
							<div class="repository">
								<h3><span class="label label-info"><?php echo $repo->getLanguage();?></span> <?php echo $repo->getName(); ?></h3>
								<p><?php echo $repo->getDescription(); ?></p>

								<div class="view-repo">
									<a href="<?php echo $repo->getHtmlUrl(); ?>">
										<i class="fa fa-github"></i>
										<span>View Repository</span>
									</a>
								</div>
							</div>
							<? endforeach; ?>							
							<!-- EOF Repositories -->
							
						</article>
						<? endforeach; ?>
						<!-- EOF Categories -->

					</div>
				</div>
			</div>
		</div>

		<div class="footer">
			<div class="container">
				<footer class="blog-footer">
					<ul class="link-icons">
						<li><a href="http://stackoverflow.com/users/1475897/fergus-morrow"><i class="fa fa-stack-exchange"></i></a></li>
						<li><a href="skype:fergus.morrow"><i class="fa fa-skype"></i></a></li>
						<li><a href="https://bitbucket.org/fmorrow"><i class="fa fa-bitbucket"></i></a></li>
						<li><a href="http://www.twitter.com/FergusMorrow"><i class="fa fa-twitter"></i></a></li>
					</ul>

					<span>Hosted on <i class="fa fa-github"></i>.</span>
					<span>All source code available is licensed under the GNU General Public License; unless otherwise mentioned.</span>
				</footer>
			</div><!-- /.container -->
		</div>

		<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/randomise.jq.js"></script>
		<script src="js/main.js"></script>
		
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			
			ga('create', 'UA-57659640-1', 'auto');
			ga('send', 'pageview');
		</script>
	</body>
</html>