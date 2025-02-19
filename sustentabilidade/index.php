<?php 
require_once('config.php');
require_once './vendor/connection.php';
$textos = $database->select('textos', '*', ['active' => 1]);
$texto =  array();
foreach ($textos as $key => $value) {
	$texto[$value['key']] = $value['texto'];
}
$relatorio = $database->get('relatorios', '*', ['active' => 1,'LIMIT' => 1]);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title><?php echo strip_tags($texto[1723748111]) ?></title>
	<meta name="theme-color" content="#003D3D"/>
	<meta name="description" content="" />	
	<meta property="og:url" content="" />
	<meta property='og:type' content='website' />
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	<link rel="shortcut icon" href="<?php echo URL ?>favicon.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<link href='https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,700,400,400italic|Exo+2:300,300italic,600,700,700italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo URL ?>src/css/all.css?ver=1.0.2">

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KRMCZKX');</script>
<!-- End Google Tag Manager -->

</head>
<body data-url="<?php echo URL ?>">

	<div id="main">
		
		<header id="header">
			<div class="container">
				<div class="row align-items-center py-3">
					<div class="col-4 col-md-2">
						<a href="<?php echo URL ?>#"><img src="<?php echo URL ?>src/img/flexivel.svg" alt="Flexivel"></a>
					</div>
					<div class="col">
						<input id="menu__toggle" type="checkbox" />
						<label class="menu__btn" for="menu__toggle">
							<span></span>
						</label>
						<div class="menu-header-menu-container">
							<div class="scroll-y">
								<ul>
									<li><a href="#compromisso-esg">Compromisso ESG</a></li>
									<li><a href="#nossos-numeros">Nossos números</a></li>
									<li><a href="#poliol-de-fontes-renovaveis">Poliol de fontes renováveis</a></li>
									<?php if($relatorio){ ?>
										<li><a href="#relatorio">Relatório <?php echo $relatorio['rotulo'] ?></a></li>
									<?php } ?>
									<li><a href="#pegada-de-carbono">Pegada de carbono</a></li>
									<li><a href="#blog">Blog</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<section id="banner" class="d-flex justify-content-center align-items-center">
			<div>
				<div class="container text-center">
					<div class="limit center">
						<h1 class="title large mb-4" data-aos="fade-up"><?php echo strip_tags($texto[1720807838]) ?></h1>
					</div>
					<div data-aos="fade-up" data-aos-delay="300">
						<?php echo $texto[1720807841] ?>
					</div>
				</div>
			</div>
		</section>


		<section id="compromisso-esg" class="space-y">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-7 mb-4 mb-md-0">
						<h2 class="title small mb-4" data-aos="fade-up">Compromisso <span class="d-block">ESG</span></h2>
						<div data-aos="fade-up" data-aos-delay="300">
							<?php echo $texto[1720807871] ?>
						</div>
					</div>
					<div class="col-12 col-md-5 offset-md-0">
						<div class="px-5 px-md-0">
							<img src="<?php echo URL ?>src/img/estrategia-esg.png" alt="Flexivel" data-aos="zoom-in-up" data-aos-anchor-placement="top-center" class="d-inline-block mb-4">						
						</div>

						<div class="passos">
							<?php for ($i=1; $i <= 17; $i++) { ?><div class="passo"><img src="<?php echo URL ?>src/img/passos/<?php echo $i ?>.svg" alt="Flexivel <?php echo $i ?>" class="img-passos d-block"></div><?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="nossos-numeros" class="space-y">
			<div class="container">				
				<div class="row text-center">
					<div class="col">
						<h2 class="title mb-4 primary-color" data-aos="fade-up"><?php echo strip_tags($texto[1720807914]) ?></h2>
						<div class="limit center mb-4" data-aos="fade-up" data-aos-delay="300">
							<?php echo $texto[1720807926] ?>
						</div>
						<div class="nossos-numeros row align-items-start">
							<?php echo $texto[1720867004] ?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<div class="effect">			
			<section id="poliol-de-fontes-renovaveis" class="space-y">
				<div class="container">				
					<div class="row">
						<div class="col-lg-10">
							<span class="secondary-color"><?php echo $texto[1720807935] ?></span>
							<h2 class="title mb-4 primary-color" data-aos="fade-up"><?php echo strip_tags($texto[1720807942]) ?></h2>

							<div class="row mb-4">
								<div class="col-md-6">
									<div data-aos="fade-up" data-aos-delay="300">
										<?php echo $texto[1720807951] ?>
									</div>
								</div>
								<div class="col-md-6">
									<div data-aos="fade-up" data-aos-delay="300">
										<?php echo $texto[1720869435] ?>
									</div>
								</div>
							</div>

							<div class="completar mb-5" data-aos="fade-up" data-aos-delay="300">
								<?php echo $texto[1720807972] ?>
							</div>

							<div data-aos="fade-up" data-aos-delay="300">
								<div class="row align-items-center">
									<div class="col-lg-7 mb-4 mb-lg-0">
										<?php echo $texto[1723665176] ?>
									</div>
									<div class="col-lg-5">

										<div class="row align-items-center">
											<div class="col-6 col-md-4 col-lg-12"><img src="<?php echo URL ?>src/img/campeas-da-inovacao-2024.svg" alt="selos" class="d-block m-auto"></div>
											<div class="col-6 col-md-4 col-lg-12"><img src="<?php echo URL ?>src/img/premio-plastico-sul-2024.png" alt="selos" class="d-block m-auto"></div>
											<div class="col-6 col-md-4 col-lg-12"><img src="<?php echo URL ?>src/img/intra-empreendedorismo-2024.png" alt="intra-empreendedorismo-2024" class="d-block m-auto"></div>
										</div>

									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</section>

			<?php if($relatorio){ ?>
				<section id="relatorio" class="space-y">
					<div class="container">				
						<div class="row align-items-center">
							<div class="col-md-8 col-lg-6 col-xl-7 mb-4 mb-md-0">
								<span class="secondary-color"><?php echo $relatorio['rotulo'] ?></span>
								<h2 class="title mb-4 primary-color" data-aos="fade-up"><?php echo $relatorio['nome'] ?></h2>
								<div class="mb-4" data-aos="fade-up" data-aos-delay="300">
									<?php echo $relatorio['descricao'] ?>
								</div>

								<?php $pdf = isset($relatorio['pdf']) ? $relatorio['pdf'] : '' ?>
								<?php $targetPathPdf = "upload/pdf/"; ?>
								
								<?php if( file_exists($targetPathPdf . $pdf) ){ ?>
									<a href="<?php echo $targetPathPdf . $pdf ?>" target="_blank" download="<?php echo $pdf ?>" class="btn-download primary-color d-flex align-items-center gap-2">
										<img src="<?php echo URL ?>src/img/download.svg" alt="download">
										<span>Baixar relatório</span>
									</a>
								<?php } ?>

							</div>
							<div class="col-md-4 col-lg-3">
								<?php $files = $database->select('files', '*', ['parent_id'=>$relatorio['id'],'LIMIT' => 1 ]);  ?>
								<?php if( $files ){ ?>
									<?php foreach ($files as $key => $file) {
										$sizes = unserialize($file['files']);
										?>
										<img src="<?php echo URL ?>upload/img/<?php echo $sizes['thumbnail'] ?>" alt="<?php echo $relatorio['nome'] ?>" class="d-block">
									<?php } ?>
								<?php } ?>
							</div>
						</div>
					</div>
				</section>
			<?php } ?>
		</div>

		<section id="pegada-de-carbono" class="animate space-y">
			<div class="container">				
				<div class="row">
					<div class="col-md-7 col-xl-6 offset-md-5 offset-xl-6">
						<p class="secondary-color">Pegada de Carbono</p>
						<h2 class="title mb-4" data-aos="fade-up"><?php echo strip_tags($texto[1720808363]) ?></h2>
						<div data-aos="fade-up" data-aos-delay="300">
							<?php echo $texto[1720808370] ?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="" class="space-y">
			<div class="container">				
				<div class="row text-center">
					<div class="col-md-10 offset-md-1">
						<div class="video">							
							<a href="" data-video="https://www.youtube.com/embed/<?php echo strip_tags($texto['youtube-video']) ?>?autoplay=1&rel=0" data-container=".video"><img src="https://img.youtube.com/vi/<?php echo strip_tags($texto['youtube-video']) ?>/maxresdefault.jpg" alt=""></a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="blog" class="space-y">
			<div class="container">				
				<div class="row">
					<div class="col-12 text-center mb-4">
						<h2 class="title mb-4 primary-color text-uppercase" data-aos="fade-up">Blog</h2>
						<div class="mb-4" data-aos="fade-up" data-aos-delay="300">
							<?php echo $texto[1720808395] ?>
						</div>
					</div>
					<div class="col-12">
						<div class="row">					
							<?php $posts = $database->select('blog', '*', ['active' => 1,'ORDER' => ['data' => 'DESC'],'LIMIT' => 3]); ?>

							<?php $delay = 400; foreach ($posts as $key => $value) { $delay = $delay+400; ?>
								<div class="col-md mb-4 mb-md-0">
									<div class="posts" data-aos="fade-up" data-aos-delay="<?php echo $delay ?>">
										<?php $files = $database->select('files', '*', ['parent_id'=>$value['id'],'LIMIT' => 1 ]);  ?>
										<?php if( $files ){ ?>
											<?php foreach ($files as $key => $file) {
												$sizes = unserialize($file['files']);
												?>
												<a href="<?php echo $value['link'] ?>" target="_blank"><img src="<?php echo URL ?>upload/img/<?php echo $sizes['thumbnail'] ?>" alt="<?php echo $value['nome'] ?>" class="d-block"></a>
											<?php } ?>
										<?php } ?>
										<div class="p-3">
											<h3 class="posts--title my-3"><?php echo $value['nome'] ?></h3>
											<a href="<?php echo $value['link'] ?>" target="_blank" class="text-uppercase">Leia mais »</a>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>

				</div>
			</div>
		</section>

		<footer id="footer" class="space-y">
			<div class="container">
				<div class="row">					
					<div class="col-6 col-lg-6 offset-3 offset-lg-0 mb-5">
						<img src="<?php echo URL ?>src/img/_flexivel.svg" alt="Flexivel">
					</div>
					<div class="col-lg mb-5">
						<?php echo $texto[1720874903] ?>
					</div>
					<div class="col-lg mb-5">
						<div class="pl-lg-5">
							<?php echo $texto[1720875078] ?>
						</div>
					</div>
				</div>
				<div class="row">					
					<div class="col-lg-4 mb-4 text-center text-lg-left">
						<p><small>© <?php echo date('Y') ?>. Grupo Flexível. Todos os direitos reservados.</small></p>
					</div>
					<div class="col-lg-4 mb-4 text-center">
						<a href="https://grupoflexivel.com.br/storage/app/uploads/public/637/6a2/8a8/6376a28a8d91f938661046.pdf" target="_blank">Política de privacidade</a> <span class="px-2">|</span> <a href="https://grupoflexivel.com.br/storage/app/uploads/public/637/6a2/8a8/6376a28a8d91f938661046.pdf" target="_blank">Política de qualidade</a>
					</div>
					<div class="col-lg-4">
						<div class="d-flex gap-2 justify-content-center justify-content-lg-end">
							<a href="https://www.facebook.com/grupoflexivel" target="_blank"><img src="<?php echo URL ?>src/img/facebook.svg" alt="facebook"></a>
							<a href="https://www.instagram.com/grupoflexivel/" target="_blank"><img src="<?php echo URL ?>src/img/instagram.svg" alt="instagram"></a>
							<a href="https://www.linkedin.com/company/grupoflexivel/?originalSubdomain=br" target="_blank"><img src="<?php echo URL ?>src/img/linkedin.svg" alt="linkedin"></a>
							<a href="https://www.youtube.com/channel/UC6zaHifVtXqpWIAfZ2OJ5pg" target="_blank"><img src="<?php echo URL ?>src/img/youtube.svg" alt="youtube"></a>
						</div>						
					</div>
				</div>
			</div>
		</footer>

	</div>

	<script src="<?php echo URL ?>src/js/all.js?ver=1.0"></script>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KRMCZKX" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

</body>
</html>