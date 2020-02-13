<?php
/**
 * @package    [PACKAGE_NAME]
 *
 * @author     [AUTHOR] <[AUTHOR_EMAIL]>
 * @copyright  [COPYRIGHT]
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       [AUTHOR_URL]
 */

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\AdminController;

/**
 * Joomlaextensionboilerplates Controller.
 *
 * @package  [PACKAGE_NAME]
 * @since    1.0.0
 */
class JoomlaextensionboilerplateControllerJoomlaextensionboilerplates extends AdminController
{
	/**
	 * The prefix to use with controller messages.
	 *
	 * @var    string
	 * @since  1.0.0
	 */
	protected $text_prefix = 'com_joomlaextensionboilerplate_joomlaextensionboilerplate';

	/**
	 * Method to get a model object, loading it if required.
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  \JModelLegacy  The model.
	 *
	 * @since   1.0.0
	 */
	public function getModel(
		$name = 'Joomlaextensionboilerplate',
		$prefix = 'JoomlaextensionboilerplatesModel',
		$config = ['ignore_request' => true]
	) {
		return parent::getModel($name, $prefix, $config);
	}
}
