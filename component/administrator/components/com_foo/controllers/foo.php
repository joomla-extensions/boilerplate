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

	protected $default_view = 'foo';

	/**
	 * Method to get a model object, loading it if required.
	 *
	 * @param   string $name   The model name. Optional.
	 * @param   string $prefix The class prefix. Optional.
	 * @param   array  $config Configuration array for model. Optional.
	 *
	 * @return  \JModelLegacy  The model.
	 *
	 * @since   1.0.0
	 */
	public function getModel($name = 'Foo', $prefix = 'FoosModel', $config = array('ignore_request' => true))
	{
		return parent::getModel($name, $prefix, $config);
	}

	/**
	 * Typical view method for MVC based architecture
	 *
	 * This function is provide as a default implementation, in most cases
	 * you will need to override it in your own controllers.
	 *
	 * @param   boolean $cachable  If true, the view output will be cached
	 * @param   array   $urlparams An array of safe URL parameters and their variable types, for valid values see {@link \JFilterInput::clean()}.
	 *
	 * @return  \JControllerLegacy  A \JControllerLegacy object to support chaining.
	 *
	 * @since   1.0.0
	 */
	public function display($cachable = false, $urlparams = array())
	{
		return parent::display($cachable, $urlparams); // TODO: Change the autogenerated stub
	}


}
