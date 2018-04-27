<?php
/**
 * @package    [PACKAGE_NAME]
 *
 * @author     [AUTHOR] <[AUTHOR_EMAIL]>
 * @copyright  [COPYRIGHT]
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       [AUTHOR_URL]
 */

use Joomla\CMS\MVC\Controller\FormController;

defined('_JEXEC') or die;

/**
 * Foo Controller.
 *
 * @package  [PACKAGE_NAME]
 * @since    1.0.0
 */
class FooControllerFoo extends FormController
{
	/**
	 * The URL view list variable.
	 *
	 * @var    string
	 * @since  1.0.0
	 */
	protected $view_list = 'foos';
}
