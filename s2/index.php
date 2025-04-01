<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Компания");
?><main class="main">

		<!-- Hero Section -->
		<section id="hero" class="hero section dark-background">

			<img src="<?= DEFAULT_TEMPLATE_PATH ?>assets/img/hero-bg.jpg" alt="" data-aos="fade-in">

			<div id="hero-carousel" class="carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

				<div class="container position-relative">

					<div class="carousel-item active">
						<div class="carousel-container">
							<h2>Инновационные решения</h2>
							<p>Мы предлагаем передовые технологии и инновационные подходы для вашего бизнеса. Наши решения помогают оптимизировать процессы и повысить эффективность. Доверьтесь нашему опыту и профессионализму для достижения ваших целей.</p>
						</div>
					</div><!-- End Carousel Item -->

					<div class="carousel-item">
						<div class="carousel-container">
							<h2>Широкий спектр услуг</h2>
							<p>Мы предлагаем разнообразные услуги, адаптированные под ваши потребности. От проектирования до обслуживания — мы обеспечим полный цикл поддержки. Доверьтесь нам для достижения максимальной эффективности.</p>
						</div>
					</div><!-- End Carousel Item -->

					<div class="carousel-item">
						<div class="carousel-container">
							<h2>Успешные проекты</h2>
							<p>Наше портфолио включает множество успешных проектов в различных отраслях. Мы гордимся нашими достижениями и стремимся к новым высотам. Ознакомьтесь с нашими кейсами и убедитесь в нашем профессионализме.</p>
						</div>
					</div><!-- End Carousel Item -->

					<div class="carousel-item">
						<div class="carousel-container">
							<h2>Ваш надежный партнер</h2>
							<p>Мы стремимся стать вашим надежным партнером в бизнесе. Наши клиенты доверяют нам, потому что мы всегда нацелены на результат. Свяжитесь с нами, чтобы обсудить, как мы можем помочь вашему бизнесу расти.</p>
						</div>
					</div><!-- End Carousel Item -->

					<a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
						<span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
					</a>

					<a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
						<span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
					</a>

					<ol class="carousel-indicators"></ol>

				</div>

			</div>

		</section><!-- /Hero Section -->

		<!-- Featured Services Section -->
		<section id="featured-services" class="featured-services section">

			<div class="container">

				<div class="row gy-4">

					<div class="col-lg-3 col-md-6">
						<div class="service-item item-cyan position-relative">
							<div class="icon">
								<i class="bi bi-check-square-fill"></i>
							</div>
							<a href="#" class="stretched-link">
								<h3>Инновационные решения</h3>
							</a>
							<p>Мы предлагаем передовые технологии и инновационные подходы для вашего бизнеса. Наши решения помогают оптимизировать процессы и повысить эффективность.</p>
						</div>
					</div><!-- End Service Item -->

					<div class="col-lg-3 col-md-6"   >
						<div class="service-item item-orange position-relative">
							<div class="icon">
								<i class="bi bi-broadcast"></i>
							</div>
							<a href="#" class="stretched-link">
								<h3>Широкий спектр услуг</h3>
							</a>
							<p>Мы предлагаем разнообразные услуги, адаптированные под ваши потребности. От проектирования до обслуживания — мы обеспечим полный цикл поддержки. <</p>
						</div>
					</div><!-- End Service Item -->

					<div class="col-lg-3 col-md-6">
						<div class="service-item item-teal position-relative">
							<div class="icon">
								<i class="bi bi-easel"></i>
							</div>
							<a href="#" class="stretched-link">
								<h3>Успешные проекты</h3>
							</a>
							<p>Наше портфолио включает множество успешных проектов в различных отраслях. Мы гордимся нашими достижениями и стремимся к новым высотам. </p>
						</div>
					</div><!-- End Service Item -->

					<div class="col-lg-3 col-md-6">
						<div class="service-item item-red position-relative">
							<div class="icon">
								<i class="bi bi-bounding-box-circles"></i>
							</div>
							<a href="service-details.html" class="stretched-link">
								<h3>Ваш надежный партнер</h3>
							</a>
							<p>Мы стремимся стать вашим надежным партнером в бизнесе. Наши клиенты доверяют нам, потому что мы всегда нацелены на результат. </p>
							<a href="service-details.html" class="stretched-link"></a>
						</div>
					</div><!-- End Service Item -->
				</div>

			</div>

		</section><!-- /Featured Services Section -->

		<!-- About Section -->
		<section id="about" class="about section light-background">

			<div class="container">

				<div class="row gy-4">
					<div class="col-lg-6 position-relative align-self-start">
						<img src="<?= DEFAULT_TEMPLATE_PATH ?>assets/img/about.jpg" class="img-fluid" alt="">
					</div>
					<div class="col-lg-6 content"   >
						<h3>Преимущества и особенности наших инженерных решений.</h3>
						<p class="fst-italic">
							В современном мире промышленные предприятия сталкиваются с множеством вызовов, связанных с эффективностью и надежностью производственных процессов. Наша компания предлагает передовые инженерные решения, которые помогут вам справиться с этими задачами.
						</p>
						<ul>
							<li><i class="bi bi-check2-all"></i> <span>Мы используем технологии, которые позволяют значительно снизить энергопотребление.</span></li>
							<li><i class="bi bi-check2-all"></i> <span>Наши решения обеспечивают стабильную работу оборудования даже в самых сложных условиях.</span></li>
							<li><i class="bi bi-check2-all"></i> <span>Мы адаптируем наши решения под конкретные нужды вашего предприятия.</span></li>
						</ul>
						<p>
							Мы уверены, что наши решения помогут вам достичь новых высот в производительности и эффективности. Свяжитесь с нами, чтобы узнать больше о том, как мы можем помочь вашему бизнесу.
						</p>
					</div>
				</div>
			</div>

		</section><!-- /About Section -->

	</main><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>