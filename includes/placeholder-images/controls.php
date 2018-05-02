<?php
/**
 * Element Controls
 * @package  Cornerstone Placeholder Images
* @author    Michael Bourne
* @license   GPL3
* @link      https://xthemetips.com
* @since     0.0.1
 */

return array(
  'width' => array(
    'type' => 'number',
    'ui'   => array(
      'title' => __( 'Width in px', 'placeholder-images-cornerstone' ),
    ),
  ),

  'height' => array(
    'type' => 'number',
    'ui'   => array(
      'title' => __( 'Height in px', 'placeholder-images-cornerstone' ),
    ),
  ),

  'custom_text' => array(
    'type' => 'text',
    'ui'   => array(
      'title' => __( 'Custom Text ', 'placeholder-images-cornerstone' ),
    ),
  ),

  'text_color' => array(
    'type' => 'color',
    'ui'   => array(
      'title' => __( 'Text Color', 'placeholder-images-cornerstone' ),
    ),
    'options' => array(
      'output_format' => 'hsl',
    ),
  ),

  'background_color' => array(
    'type' => 'color',
    'ui'   => array(
      'title' => __( 'Background Color', 'placeholder-images-cornerstone' ),
    ),
    'options' => array(
      'output_format' => 'hsl',
    ),
  ),
  'common' => array( '!style' )
);