<?php
/**
 * @copyright Sharapov A. <alexander@sharapov.biz>
 * @link      http://www.sharapov.biz/
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html GNU General Public License
 * Date: 2019-02-22
 * Time: 12:51
 */

namespace Sharapov\PHPMLT\Driver;

use Alchemy\BinaryDriver\AbstractBinary;
use Alchemy\BinaryDriver\Configuration;
use Alchemy\BinaryDriver\ConfigurationInterface;
use Alchemy\BinaryDriver\Exception\ExecutableNotFoundException as BinaryDriverExecutableNotFound;
use Psr\Log\LoggerInterface;
use Sharapov\PHPMLT\Exception\ExecutableNotFoundException;

class MLTDriver extends AbstractBinary {
  /**
   * {@inheritdoc}
   */
  public function getName() {
    return 'mlt';
  }

  /**
   * Creates an FFMpegDriver.
   *
   * @param LoggerInterface $logger
   * @param array|Configuration $configuration
   *
   * @return \Sharapov\PHPMLT\Driver\MLTDriver
   */
  public static function create(LoggerInterface $logger = null, $configuration = []) {
    if(!$configuration instanceof ConfigurationInterface) {
      $configuration = new Configuration($configuration);
    }

    $binaries = $configuration->get('ffmpeg.binaries', ['avconv', 'ffmpeg']);

    if(!$configuration->has('timeout')) {
      $configuration->set('timeout', 300);
    }

    try {
      return static::load('docker run', $logger, $configuration);
    } catch (BinaryDriverExecutableNotFound $e) {
      throw new ExecutableNotFoundException('Unable to load FFMpeg', $e->getCode(), $e);
    }
  }
}
