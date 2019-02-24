<?php
/**
 * @copyright Sharapov A. <alexander@sharapov.biz>
 * @link      http://www.sharapov.biz/
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html GNU General Public License
 * Date: 2019-02-23
 * Time: 19:58
 */

namespace Sharapov\PHPMLT\Filter;

/**
 * Filter collection
 */
class FilterCollection implements \Countable, \IteratorAggregate {
  /**
   * @var array
   */
  private $_filters;

  /**
   * FilterCollection constructor.
   *
   * @param array $filters
   */
  public function __construct(array $filters = []) {
    $this->_filters = array_values($filters);
  }

  /**
   * @param FilterInterface $filter
   *
   * @return $this
   */
  public function add(FilterInterface $filter) {
    $this->_filters[] = $filter;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function count() {
    return count($this->_filters);
  }

  /**
   * Returns the array of contained options.
   * @return array
   */
  public function all() {
    return $this->_filters;
  }

  /**
   * {@inheritdoc}
   */
  public function getIterator() {
    return new \ArrayIterator($this->_filters);
  }

  /**
   * @return \Sharapov\PHPMLT\Filter\FilterCollection
   */
  public function hasJoinClips() {


    return array_filter((array)$this->getIterator(), function($filter) {
      print_r($filter);
      //if($filter instanceof JoinClip) {
        //return $filter->all();
      //}
    }, ARRAY_FILTER_USE_BOTH);
  }
}
