<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="site-blocks-cover overlay" style="background-image: url(<?= $arResult['DETAIL_PICTURE']['SAFE_SRC'] ?>);"
     data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded"><?= GetMessage("DETAILS") ?></span>
                <h1 class="mb-2"><?= $arResult['PREVIEW_TEXT'] ?></h1>
                <p class="mb-5"><strong
                            class="h2 text-success font-weight-bold"><?= $arResult['DISPLAY_PROPERTIES']['PRICE']['VALUE'] . ' ' . GetMessage("RUB") ?></strong>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="site-section site-section-sm">
    <div class="container">
        <div class="row">
            <div class="col-lg-8" style="margin-top: -150px;">
                <div class="mb-5">
                    <div class="slide-one-item home-slider owl-carousel">
                        <?
                        $gallery = $arResult['DISPLAY_PROPERTIES']['GALLERY_IMAGE']['FILE_VALUE'];
                        if (!empty($gallery)) {
                            foreach ($gallery as $image) {

                                echo '<div><img src="' . $image['SRC'] . '" alt="Image" class="img-fluid"></div>';
                            }
                        }


                        ?>
                    </div>
                </div>
                <div class="bg-white">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <strong class="text-success h1 mb-3"><?= $arResult['DISPLAY_PROPERTIES']['PRICE']['VALUE'] . ' ' . GetMessage("RUB") ?></strong>
                        </div>
                        <div class="col-md-6">
                            <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                                <li>
                                    <span class="property-specs">Дата обновления</span>
                                    <span class="property-specs-number"><?= substr($arResult['TIMESTAMP_X'], 0, 10) ?></span>

                                </li>
                                <li>
                                    <span class="property-specs">Количество этажей</span>
                                    <span class="property-specs-number"><?= $arResult['DISPLAY_PROPERTIES']['NUMBER_OF_FLOORS']['VALUE'] ?></span>

                                </li>
                                <li>
                                    <span class="property-specs">Площадь</span>
                                    <span class="property-specs-number"><?= $arResult['DISPLAY_PROPERTIES']['TOTAL_AREA']['VALUE'] ?></span>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text">Количество санузлов</span>
                            <strong class="d-block"><?= $arResult['DISPLAY_PROPERTIES']['NUMBER_OF_BATHROOMS']['VALUE'] ?></strong>
                        </div>
                        <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text">Наличие гаража</span>
                            <strong class="d-block"><?= $arResult['DISPLAY_PROPERTIES']['GARAGE']['VALUE'] ?></strong>
                        </div>
                    </div>
                    <h2 class="h4 text-black">Детальное описание</h2>
                    <?= $arResult['DETAIL_TEXT'] ?>

                    <div class="row mt-5">
                        <div class="col-12">
                            <h2 class="h4 text-black mb-3">Галерея изображений</h2>
                        </div>
                        <?
                        $gallery = $arResult['DISPLAY_PROPERTIES']['GALLERY_IMAGE']['FILE_VALUE'];
                        if (!empty($gallery)) {
                            foreach ($gallery as $image) {
                                echo '<div class="col-sm-6 col-md-4 col-lg-3 mb-4"><a href="' . $image['SRC'] . '" class="image-popup gal-item"><img src="' . $image['SRC'] . '" alt="Image" class="img-fluid"></a></div>';
                            }
                        }
                        ?>

                    </div>
                    <?
                    $additionalFiles = $arResult['DISPLAY_PROPERTIES']['ADDITIONAL_MATERIALS']['FILE_VALUE'];
                    if (!empty($additionalFiles)):
                    ?>
                    <div class="col-12">
                        <h2 class="h4 text-black mb-3">Дополнительные материалы</h2>
                    </div>
                    <div><?
                        foreach ($additionalFiles as $file) {
                            echo '<a href="' . $file['SRC'] . '">' . $file['ORIGINAL_NAME'] . '</a><br>';
                        }
                        ?>
                    </div>
                    <?endif;?>
                    <?
                    $links = $arResult['DISPLAY_PROPERTIES']['LINKS_TO_RESOURCES']['VALUE'];
                    if (!empty($links)):
                        ?>
                        <div class="col-12">
                            <h2 class="h4 text-black mb-3">Ссылки на внешние ресурсы</h2>
                        </div>
                        <div><?
                            foreach ($links as $link) {
                                echo '<a href="' . $link . '">' . $link . '</a><br>';
                            }
                            ?>
                        </div>
                    <?endif;?>

                </div>
            </div>
            <div class="col-lg-4 pl-md-5">

                <div class="bg-white widget border rounded">

                    <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
                    <form action="" class="form-contact-agent">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" id="phone" class="btn btn-primary" value="Send Message">
                        </div>
                    </form>
                </div>

                <div class="bg-white widget border rounded">
                    <h3 class="h4 text-black widget-title mb-3">Paragraph</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit qui explicabo, libero nam, saepe
                        eligendi. Molestias maiores illum error rerum. Exercitationem ullam saepe, minus, reiciendis
                        ducimus quis. Illo, quisquam, veritatis.</p>
                </div>

            </div>

        </div>
    </div>
</div>