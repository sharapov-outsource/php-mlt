<?php
/**
 * @copyright Sharapov A. <alexander@sharapov.biz>
 * @link      http://www.sharapov.biz/
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html GNU General Public License
 * Date: 2019-02-22
 * Time: 11:13
 */

namespace Sharapov\PHPMLT\Driver;

use Sharapov\PHPMLT\Filter\FilterCollection;

interface DriverInterface {
  public function __construct($containerName);

  public function setInputFiles(array $inputCollection);

  public function setInputFile($path);

  public function setOutputFile($path);

  public function getCommand();
}
