<?php
/**
 * @copyright Sharapov A. <alexander@sharapov.biz>
 * @link      http://www.sharapov.biz/
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html GNU General Public License
 * Date: 2019-02-21
 * Time: 21:21
 */

namespace Sharapov\PHPMLT\Profile;

class HDV1080 implements ProfileInterface {
  private $_name = 'hdv_1080_25p';
  //public $frame_rate_num = 25;
  //public $frame_rate_den = 1;
  private $_width = 720;
  private $_height = 576;
  //public $progressive = 0;
  //public $sample_aspect_num = 64;
  //public $sample_aspect_den = 45;
  //public $display_aspect_num = 16;
  //public $display_aspect_den = 9;

  public function getName() {
    return $this->_name;
  }

  public function getWidth() {
    return $this->_width;
  }

  public function getHeight() {
    return $this->_height;
  }
}
