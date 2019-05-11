<?php
namespace Grav\Plugin;
use \GetMostCommonColors;

class ImageColorTwigExtension extends \Twig_Extension
{

  /**
  * returns the name of the class if required
  *
  * @return string the name of the class
  */
  public function getName()
  {
      return 'ImageColorTwigExtension';
  }

  /**
   * Return a list of all functions.
   *
   * @return array
   */
  public function getFunctions()
  {
      return [

          new \Twig_SimpleFunction('GetImageColor', [$this, 'imageColor']),
          new \Twig_SimpleFunction('GetContrastYIQ', [$this, 'getContrastYIQ']),
      ];
  }

  /**
   * Return all dominant colors
   *
   * @return array
   */
  public function imageColor($image,$num_results = 10, $reduce_brightness = true, $reduce_gradients = true, $delta = 10 )
  {

    $getmostcommoncolors = new GetMostCommonColors();
    $colors              = $getmostcommoncolors->Get_Color($image, $num_results, $reduce_brightness, $reduce_gradients, $delta);
    $keys                = array_keys($colors);

    return $keys;
  }

  /**
   * converts the RGB color space into YIQ
   *
   * @return string
   */
  public function getContrastYIQ($hexcolor)
  {

    $r = hexdec(substr($hexcolor,0,2));
    $g = hexdec(substr($hexcolor,2,2));
    $b = hexdec(substr($hexcolor,4,2));
    $yiq = (($r*299)+($g*587)+($b*114))/1000;

    return ($yiq >= 128) ? 'dark' : 'light';

  }

}
