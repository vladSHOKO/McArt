<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(' . SITE_TEMPLATE_PATH . '/' . 'images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <h1 class="mb-2">' . $APPLICATION->GetTitle() . '</h1>';

//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()
$css = $APPLICATION->GetCSSArray();
if(!is_array($css) || !in_array("/bitrix/css/main/font-awesome.css", $css))
{
	$strReturn .= '<link href="'.CUtil::GetAdditionalFileURL("/bitrix/css/main/font-awesome.css").'" type="text/css" rel="stylesheet" />'."\n";
}

$strReturn .= '<div>';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$arrow = ($index > 0? '<span class="mx-2 text-white">&bullet;</span>' : '');

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
		        '.$arrow.'
				<a id="bx_breadcrumb_'.$index.'" href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="item">
					<span>'.$title.'</span>
				</a>
				';
	}
	else
	{
		$strReturn .= '
			<strong class="text-white">
				'.$arrow.'
				<span>'.$title.'</span>
			</strong>';
	}
}

$strReturn .= '<div style="clear:both"></div></div></div>
            </div>
        </div>
    </div>';

return $strReturn;
?>

