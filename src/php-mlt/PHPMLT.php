<?php
/**
 * @copyright Sharapov A. <alexander@sharapov.biz>
 * @link      http://www.sharapov.biz/
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html GNU General Public License
 * Date: 2019-02-22
 * Time: 12:09
 */

namespace Sharapov\PHPMLT;

use Alchemy\BinaryDriver\ConfigurationInterface;
use FFMpeg\Driver\FFMpegDriver;
use FFMpeg\Exception\InvalidArgumentException;
use FFMpeg\Exception\RuntimeException;
use FFMpeg\Format\FormatInterface;
use Psr\Log\LoggerInterface;
use Sharapov\FFMpegExtensions\Input\FileInterface;
use Sharapov\FFMpegExtensions\Media\Audio;
use Sharapov\FFMpegExtensions\Media\CollectionInterface;
use Sharapov\FFMpegExtensions\Media\Video;
use Sharapov\PHPMLT\Driver\DriverInterface;
use Sharapov\PHPMLT\Driver\MLTDockerized;
use Sharapov\PHPMLT\Filter\FilterCollection;
use Sharapov\PHPMLT\Filter\FilterInterface;
use Sharapov\PHPMLT\Profile\ProfileInterface;

class PHPMLT {
  /** @var DriverInterface */
  private $_driver;

  /** @var ProfileInterface */
  private $_profile;

  /** @var FilterCollection */
  private $_filterCollection;

  /**
   * MLT constructor
   *
   * @param $driver
   */
  public function __construct(DriverInterface $driver) {
    $this->_driver = $driver;
    $this->_filterCollection = new FilterCollection();
  }

  public static function create($configuration = [], LoggerInterface $logger = null) {
    return new static(new MLTDockerized('sharapov/mlt-framework'));
  }

  public function setProfile(ProfileInterface $profileName) {
    $this->_profile = $profileName;

    return $this;
  }

  public function filter(FilterInterface $filter) {
    $this->_filterCollection->add($filter);

    return $this;
  }

  public function save($outputPathFile) {

    if($this->_filterCollection->hasJoinClips()) {
      print_r($this->_filterCollection->hasJoinClips());

      //$this->_driver->setInputFiles($this->_filterCollection->hasJoinClips());
    }

    //$this->_driver->setInputFile();
    $this->_driver->setOutputFile($outputPathFile);
print_r($this->_driver->getCommand());
   // shell_exec();
  }

  /**
   * Creates a new FFMpeg instance
   *
   * @param array|ConfigurationInterface $configuration
   * @param LoggerInterface $logger
   * public static function create($configuration = [], LoggerInterface $logger = null) {
   * return new static(MLTDriver::create($logger, $configuration));
   * }*/
}
