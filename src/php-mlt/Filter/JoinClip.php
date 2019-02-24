<?php
/**
 * @copyright Sharapov A. <alexander@sharapov.biz>
 * @link      http://www.sharapov.biz/
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html GNU General Public License
 * Date: 2019-02-23
 * Time: 19:23
 */

namespace Sharapov\PHPMLT\Filter;

class JoinClip implements FilterInterface, \Countable, \IteratorAggregate {
  private $_clip = [];

  public function add($clip) {
    $this->_clip[] = $clip;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function count() {
    return count($this->_clip);
  }

  /**
   * Returns the array of contained options.
   * @return array
   */
  public function all() {
    return $this->_clip;
  }

  /**
   * {@inheritdoc}
   */
  public function getIterator() {
    return new \ArrayIterator($this->_clip);
  }
}
