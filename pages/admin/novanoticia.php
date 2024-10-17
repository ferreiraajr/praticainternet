<?php
require '../../config/db.php';

$title_page = "Nova Noticia | ";
include dirname(__FILE__) . '/../includes/header.php'; ?>


<main class="main mb-0" data-animate="top" data-delay="3">
	<aside class="banner_topo bnr-blog"></aside>

	<header class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1>
						<span>Nova Noticia</span>
					</h1>
				</div>
			</div>
		</div>
	</header>

	<section class=" mb-0">
		<div class="container">

			<div class="row">
				<div class="col-12 my-3">

					<form action="processa-noticia" method="POST">

				</div>
				<div class="row ">
			        <div class="col-md-12">
			        	<div class="form-group">
			        		<label for="titulo">TITULO</label>
			        		<input type="text" id="titulo" name="titulo" class="form-control" required="required"  />
			        	</div>
			        </div>

			        <div class="col-md-12">
			        	<div class="form-group">
			        		<label for="conteudo">CONTEÚDO</label>
			          		<textarea rows="5" id="conteudo" name="conteudo" class="form-control" required="required" ></textarea>
			        	</div>
			        </div>
 
			        <div class="col-md-4">
			        	<input type="submit" value="ENVIAR" class="btn btn-1 px-4" />
			        </div>

	      		</div><!-- row -->
				</form>
			</div>
		</div>
		</div>
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