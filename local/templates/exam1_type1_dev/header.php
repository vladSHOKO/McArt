<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/local/templates/.default/include/header.php";
use Bitrix\Main\Application;
?><main class="main">
    <?if(Application::getInstance()->getContext()->getRequest()->getRequestedPageDirectory() != "/s2/"): ?>

		<!-- Page Title -->
		<div class="page-title dark-background">
			<div class="container position-relative">
				<h1>Заголовок страницы</h1>
				<p>Короткий текст для страницы под H1</p>
				<nav class="breadcrumbs">
					<ol>
						<li><a href="#">Главная</a></li>
						<li><a href="#">Раздел 1</a></li>
						<li><a href="#">Раздел 1.1</a></li>
						<li class="current">Заголовок страницы</li>
					</ol>
				</nav>
			</div>
		</div>
    <?endif;?>