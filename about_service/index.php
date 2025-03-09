<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О сервисе");
?>
<div class="site-section border-bottom">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
 <img alt="Image" src="<?=SITE_TEMPLATE_PATH . '/'?>images/about.jpg" class="img-fluid">
			</div>
			<div class="col-md-5 ml-auto" data-aos="fade-up" data-aos-delay="200">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"custom_about_field",
	Array(
		"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => ""
	)
);?>
			</div>
		</div>
	</div>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>