<?php
/**
* Build Cornerstone Element
*
* @package   Cornerstone Placeholder Images
* @author    Michael Bourne
* @license   GPL3
* @link      https://xthemetips.com
* @since     0.0.2
*/


/**
*  Register our element
*/

add_action('cornerstone_register_elements', 'cspi_element_register_elements');
function cspi_element_register_elements()
{
	cornerstone_register_element('CSPI_Element', 'placeholder-images', PLACEHOLDER_IMAGES_CS_PATH . 'includes/placeholder-images');
}

add_filter('cornerstone_icon_map', 'cspi_element_icon_map');
function cspi_element_icon_map($icon_map)
{
	$icon_map['placeholder-images'] = PLACEHOLDER_IMAGES_CS_URL . 'assets/svg/placeholder-images.svg';
	return $icon_map;
}

function cspi_element_hslToHex($hsl)
{
    $hsl = str_replace(array('hsl(', 'hsla(', '%', ' ', ')'), '', $hsl);
    $hsl = explode(',', $hsl);

    $h = ($hsl[0] > 0) ? $hsl[0] / 360 : 0;
    $s = ($hsl[1] > 0) ? $hsl[1] / 100 : 0;
    $l = ($hsl[2] > 0) ? $hsl[2] / 100 : 0;


        $q = $l < 0.5 ? $l * (1 + $s) : $l + $s - $l * $s;
        $p = 2 * $l - $q;

        $r = cspi_element_hue2rgb($p, $q, $h + 1/3);
        $g = cspi_element_hue2rgb($p, $q, $h);
        $b = cspi_element_hue2rgb($p, $q, $h - 1/3);

    return cspi_element_rgb2hex($r) . cspi_element_rgb2hex($g) . cspi_element_rgb2hex($b);
}

function cspi_element_hue2rgb($p, $q, $t) {
    if ($t < 0) $t += 1;
    if ($t > 1) $t -= 1;
    if ($t < 1/6) return $p + ($q - $p) * 6 * $t;
    if ($t < 1/2) return $q;
    if ($t < 2/3) return $p + ($q - $p) * (2/3 - $t) * 6;

    return $p;
}

function cspi_element_rgb2hex($rgb) {
    return str_pad(dechex($rgb * 255), 2, '0', STR_PAD_LEFT);
}