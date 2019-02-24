<?php
/**
 * @copyright Sharapov A. <alexander@sharapov.biz>
 * @link      http://www.sharapov.biz/
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html GNU General Public License
 * Date: 2019-02-22
 * Time: 11:13
 */

namespace Sharapov\PHPMLT\Profile;

interface ProfileInterface {
  public function getName();

  public function getWidth();

  public function getHeight();
}
