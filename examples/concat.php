<?php
/**
 * @copyright Sharapov A. <alexander@sharapov.biz>
 * @link      http://www.sharapov.biz/
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html GNU General Public License
 * Date: 2019-02-21
 * Time: 21:08
 */

require_once dirname(__FILE__) . '/../vendor/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('UTC');

// Init mlt library
$mlt = \Sharapov\PHPMLT\PHPMLT::create();
$mlt
  ->setProfile(new \Sharapov\PHPMLT\Profile\HDV1080())
  ->filter((new \Sharapov\PHPMLT\Filter\JoinClip())
             ->add('source/1-dropmock10.mov')
             ->add('source/1-dropmock11.mov')
  )
  ->save('source/_out.mp4');

