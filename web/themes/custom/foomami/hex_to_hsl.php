<?php

/**
 * Converts hex color strings to array of HSL values.
 * Code based on JS version: https://css-tricks.com/converting-color-spaces-in-javascript/.
 * Formula here: https://www.rapidtables.com/convert/color/rgb-to-hsl.html.
 *
 * @param string $hexString
 *   The 6-character hexadecimal color code, optionally with a leading hash
 *
 * @return array
 *   Array containing hue, saturation, and lightness values.
 *   $hue: integer of value 0-360 indicating the hue on a color wheel.
 *   $saturation: string of saturation as a percentage (0% all gray, 100% full color).
 *   $lightness: string of lightness as a percentage (0% darkened to black, 50% full color, 100% lightened to white).
 */
function hex_to_hsl($hexString) {
  // Convert hexcode pairs to rgb values (0-255).
  $hexVal = trim($hexString, '#');
  $r0 = hexdec($hexVal[0] . $hexVal[1]);
  $g0 = hexdec($hexVal[2] . $hexVal[3]);
  $b0 = hexdec($hexVal[4] . $hexVal[5]);

  // Convert rgb's 0-255 to decimal values.
  $r = bcdiv($r0, 255, 16);
  $g = bcdiv($g0, 255, 16);
  $b = bcdiv($b0, 255, 16);

  // Calculate Hue.
  $c_min = min($r, $g, $b);
  $c_max = max($r, $g, $b);
  $delta = $c_max - $c_min;

  if ($delta == 0) {
    $h = 0;
  }
  else {
    switch ($c_max) {
      case $r:
        $h = bcmod((($g - $b) / $delta), 6, 16);
        break;

      case $g:
        $h = (($b - $r) / $delta) + 2;
        break;

      case $b:
        $h = (($r - $g) / $delta) + 4;
        break;

      default:
        $h = 0;
        break;
    }
  }

  $h = round($h * 60);

  while ($h < 0) {
    $h += 360;
  }

  // Calculate Lightness.
  $l = ($c_max + $c_min) / 2;

  // Calculate Saturation.
  $s = $delta == 0 ? 0 : $delta / (1 - abs((2 * $l) - 1));

  // Convert Saturation and Lightness to percentages.
  $s = round($s * 100);
  $l = round($l * 100);

  return [$h, $s, $l];
}
