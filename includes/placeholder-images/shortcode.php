<?php
/**
 * Shortcode handler
 * @package   Cornerstone Placeholder Images
* @author    Michael Bourne
* @license   GPL3
* @link      https://xthemetips.com
* @since     0.0.1
*/

$text = urlencode($custom_text);

$tcolour = cspi_element_hslToHex($text_color);

$bcolour = cspi_element_hslToHex($background_color);

$width = preg_replace("/[^0-9]/", "", $width);
$height = preg_replace("/[^0-9]/", "", $height);

$imageurl = '//via.placeholder.com/' . $width . 'x' . $height . '/' . $bcolour . '/' . $tcolour . '?text=' . $text;

echo '<!-- Placeholder image by Placeholder.com | Custom Cornerstone Element by Michael Bourne from URSA6 -->';
echo '<img src="' . $imageurl . '" id="' . $id . '" class="' . $class . '" />';