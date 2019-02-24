<?php
/**
 * @copyright Sharapov A. <alexander@sharapov.biz>
 * @link      http://www.sharapov.biz/
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html GNU General Public License
 * Date: 2019-02-21
 * Time: 21:30
 */

namespace Sharapov\PHPMLT\Driver;

use Sharapov\PHPMLT\Filter\FilterCollection;

class MLTDockerized implements DriverInterface {
  /**
   * @var array
   */
  private $_input = [];
  private $_containerName;
  private $_containerPath = '/var/mlt/%s';
  private $_output;

  /**
   * Dockerized constructor.
   *
   * @param string $containerName
   */
  public function __construct($containerName) {
    $this->_containerName = $containerName;
  }

  /**
   * @param \Sharapov\PHPMLT\Filter\FilterCollection $filterCollection
   *
   * @return $this
   */
  public function setInputFiles(array $inputCollection) {


    print_r($inputCollection);

    die;
    foreach($filterCollection as $filter) {
      $this->setInputFile($filter);
    }

    return $this;
  }

  /**
   * @param string $path
   *
   * @return $this
   */
  public function setInputFile($path) {
    $pth = sprintf($this->_containerPath, uniqid());
    $ext = '.' . pathinfo($path, PATHINFO_EXTENSION);
    $this->_input[$pth . $ext] = $path;

    return $this;
  }

  /**
   * @param string $path
   *
   * @return $this
   */
  public function setOutputFile($path) {
    //$pth = sprintf($this->_containerPath, 'output');
    //$ext = ;
    $this->_output = $path;

    return $this;
  }

  public function getCommand() {
    $commands = [
      'docker run'
    ];
    // Operate by input array. For Docker environment we need to have local and container path separated by :
    // /path/to/local/file:/path/to/container/file
    foreach($this->_input as $cp => $lp) {
      $commands[] = '-v';
      $commands[] = sprintf("%s:%s", $lp, $cp);
    }

    // Set output file
    $commands[] = sprintf("%s:%s.%s",
                          $this->_output,
                          sprintf($this->_containerPath, 'output'),
                          pathinfo($this->_output, PATHINFO_EXTENSION)
    );

    $this->_output = sprintf($this->_containerPath, 'output') . pathinfo($this->_output, PATHINFO_EXTENSION);


    // Container executable name
    $commands[] = '-t';
    $commands[] = $this->_containerName;

    return array_merge($commands, array_keys($this->_input));
  }

  public function getOutputFile() {
    return $this->_output;
  }
}
