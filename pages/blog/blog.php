<?php

require '../../config/db.php';

$noticias_por_pagina = 6;
$pagina_atual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$offset = ($pagina_atual - 1) * $noticias_por_pagina;

$search = isset($_GET['search']) ? $_GET['search'] : '';

if ($search) {
	$stmt = $conn->prepare("SELECT * FROM noticias WHERE titulo LIKE :search OR conteudo LIKE :search ORDER BY data_publicacao DESC LIMIT :offset, :limit");
	$stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
} else {
	$stmt = $conn->prepare("SELECT * FROM noticias ORDER BY data_publicacao DESC LIMIT :offset, :limit");
}

// Bind os parâmetros
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->bindValue(':limit', $noticias_por_pagina, PDO::PARAM_INT);
$stmt->execute();
$noticias = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($search) {
	$total_stmt = $conn->prepare("SELECT COUNT(*) FROM noticias WHERE titulo LIKE :search OR conteudo LIKE :search");
	$total_stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
} else {
	$total_stmt = $conn->query("SELECT COUNT(*) FROM noticias");
}
$total_noticias = $total_stmt->fetchColumn();
$total_paginas = ceil($total_noticias / $noticias_por_pagina);

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

	<section class=" mb-0">
		<div class="container">

			<div class="row">

				<div class="col-12 mb-4">
					<form class="row" method="GET" action="blog">
						<div class="col-lg-7 col-6">
							<input class="form-control form-control-lg"
								style="border: 1px solid #98a8b1; padding: 11px;"
								id="searchInput"
								name="search"
								type="text"
								placeholder="Buscar">
						</div>
						<div class="col-lg-2 col-3">
							<button type="submit" class="btn btn-primary w-100">BUSCAR</button>
						</div>
						<div class="col-lg-2 col-3">
							<a href="blog" class="btn btn-secondary w-100">LIMPAR BUSCA</a>
						</div>
					</form>
				</div>

				<?php foreach ($noticias as $noticia): ?>

					<div class="col-lg-4 mb-5">
						<div class="blog_content box-shadow mb-3">
							<a href="blog/detalhe" class="zoom_image mb-3">
								<img src="assets/img/blog.jpg" alt="" />
							</a>

							<div class="chamada_blog">
								<h3 class="">
									<?= htmlspecialchars($noticia['titulo']) ?>
								</h3>

								<p>
									<?= htmlspecialchars($noticia['conteudo']) ?>
								</p>
							</div>
						</div>
						<a href="blog/<?= $noticia['id'] ?>" class="leia">Saiba mais</a>
					</div><!-- col-lg-4 -->

				<?php endforeach; ?>

				<div class="col-12 my-3">
					<nav aria-label="Page navigation">
						<ul class="pagination">

						</ul>
					</nav>

					<nav aria-label="Paginação">
						<ul class="pagination justify-content-center">
							<li class="page-item <?= ($pagina_atual <= 1) ? 'disabled' : '' ?>">
								<a class="page-link" href="admin?pagina=<?= $pagina_atual - 1 ?>" tabindex="-1">Anterior</a>
							</li>
							<?php for ($i = 1; $i <= $total_paginas; $i++): ?>
								<li class="page-item <?= ($i == $pagina_atual) ? 'active' : '' ?>">
									<a class="page-link" href="admin?pagina=<?= $i ?>"><?= $i ?></a>
								</li>
							<?php endfor; ?>
							<li class="page-item <?= ($pagina_atual >= $total_paginas) ? 'disabled' : '' ?>">
								<a class="page-link" href="admin?pagina=<?= $pagina_atual + 1 ?>">Próximo</a>
							</li>
						</ul>
					</nav>

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