<!DOCTYPE html>
<html lang="pt">

<head>
	<?php include('header.php') ?>
	<!-- Adicione o jQuery CDN -->
	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
	<div class="wrapper">
		<?php include('menu.php') ?>

		<div class="main">
			<?php include('topo.php') ?>

			<!-- Corpo principal --->
			<main class="content">
				<?php include('corpo.php'); ?>
				<!-- Conteúdo estático carregado aqui -->
			</main>

			<footer class="footer">
				<?php include('footer.php') ?>
			</footer>
		</div>
	</div>
	<script src="/static/js/app.js"></script>
</body>

</html>