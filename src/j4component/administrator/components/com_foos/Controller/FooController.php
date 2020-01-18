<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_foos
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Foos\Administrator\Controller;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\FormController;
use Joomla\CMS\Router\Route;

/**
 * Controller for a single foo
 *
 * @since  1.0
 */
class FooController extends FormController
{
	/**
	 * Method to run batch operations.
	 *
	 * @param   object  $model  The model.
	 *
	 * @return  boolean   True if successful, false otherwise and internal error is set.
	 *
	 * @since   1.0
	 */
	public function batch($model = null)
	{
		$this->checkToken();

		$model = $this->getModel('Foo', 'Administrator', array());

		// Preset the redirect
		$this->setRedirect(Route::_('index.php?option=com_foos&view=foos' . $this->getRedirectToListAppend(), false));

		return parent::batch($model);
	}
}
