<?php
require '../../config/db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $conn->prepare("SELECT * FROM noticias WHERE id = :id");
$stmt->execute(['id' => $id]);
$noticia = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$noticia) {
	echo "Notícia não encontrada.";
	exit;
}

$title_page = "Blog | ";
include dirname(__FILE__) . '/../includes/header.php'; ?>


<main class="main mb-0" data-animate="top" data-delay="3">
	<aside class="banner_topo bnr-blog"></aside>

	<header class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1>
						<span>Blog</span>
					</h1>
				</div>
			</div>
		</div>
	</header>

	<section class=" mb-4">
		<div class="container">

			<div class="row">

				<article class="col-12">
					<div class="cabecalho mb-4 pb-2">
						<h2 class="topic5"><?= htmlspecialchars($noticia['titulo']) ?></h2>
						<time style="color:#3056bb"><img src="assets/img/icones/calendar.jpg" style="vertical-align: baseline;" alt=""><?= htmlspecialchars($noticia['data_publicacao']) ?></time>

						<hr class="">
					</div>


					<p class="text-center">
						<img src="assets/img/foto.jpg" alt="" class="img-fluid mb-3">
					</p>

					<p>
						<?= htmlspecialchars($noticia['conteudo']) ?>
					</p>




					<p>
						<a href="javascript:history.go(-1);" class="btn btn-1 mt-3"> &laquo; Voltar</a>
					</p>
				</article>


				<div class="col-md-12 mt-4 col-lg-10 col-xl-8">
					<h5 class="topic5">Comentários</h5>
					<?php
					$stmt = $conn->prepare("SELECT * FROM comentarios WHERE noticia_id = :noticia_id ORDER BY data_comentario DESC");
					$stmt->execute(['noticia_id' => $id]);
					$comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

					foreach ($comentarios as $comentario): ?>
						<div class="comentario mb-3">
							<div class="d-block">
								<h6 class="fw-bold text-primary mb-1"><?= htmlspecialchars($comentario['nome']) ?></h6>
								<p class="text-muted small mb-0">
								<?= htmlspecialchars($comentario['data_comentario']) ?>
								</p>
							</div>

							<p class="mt-3 mb-4 pb-2">
							<?= htmlspecialchars($comentario['comentario']) ?>
							</p>
						</div>
					<?php endforeach; ?>


					<form class=" py-3 border-0" method="POST" action="processa-comentario">
						<h5 class="topic5">Deixe um comentário</h5>
						<div class="row ">
							<input type="hidden" name="noticia_id" value="<?= $noticia['id'] ?>">
							<div class="col-md-12">
								<div class="form-group">
									<input class="form-control" type="text" id="nome" name="nome" placeholder="Nome" style="border: 1px solid #98a8b1;">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea class="form-control" id="comentario" name="comentario" placeholder="Comentario" rows="4" style="border: 1px solid #98a8b1;"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="float-right pt-1">
									<button type="submit" class="btn btn-primary btn-sm" data-mdb-button-initialized="true">PUBLICAR</button>
								</div>
							</div>
						</div>
					</form>

				</div>
			</div>

		</div><!-- row -->

		</div> <!-- container -->
	</section>

	<aside>
		<?php
		$banner = rand(1, 6);
		?>
		<a href="<?= $config['whatsapp']; ?>" target="_blank">
			<img src="assets/img/banner/0<?= $banner; ?>.png" class="d-none d-md-block w-100">
			<img src="assets/img/banner/mobile0<?= $banner; ?>.jpg" class="d-block d-md-none w-100">
		</a>
	</aside>
</main>


<?php

include dirname(__FILE__) . '/../includes/footer.php';

?>