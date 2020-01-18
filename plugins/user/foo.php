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

use Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Plugin\CMSPlugin;

/**
 * Foo plugin.
 *
 * @package   [PACKAGE_NAME]
 * @since     1.0.0
 */
class plgUserFoo extends CMSPlugin
{
	/**
	 * Application object
	 *
	 * @var    CMSApplication
	 * @since  1.0.0
	 */
	protected $app;

	/**
	 * Database object
	 *
	 * @var    JDatabaseDriver
	 * @since  1.0.0
	 */
	protected $db;

	/**
	 * Affects constructor behavior. If true, language files will be loaded automatically.
	 *
	 * @var    boolean
	 * @since  1.0.0
	 */
	protected $autoloadLanguage = true;

	/**
	 * onUserAuthorisation.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onUserAuthorisation()
	{

	}

	/**
	 * onUserAuthorisationFailure.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onUserAuthorisationFailure()
	{

	}

	/**
	 * onUserBeforeSave.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onUserBeforeSave()
	{

	}

	/**
	 * onUserAfterSave.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onUserAfterSave()
	{

	}

	/**
	 * onUserBeforeDelete.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onUserBeforeDelete()
	{

	}

	/**
	 * onUserAfterDelete.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onUserAfterDelete()
	{

	}

	/**
	 * onUserLogin.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onUserLogin()
	{

	}

	/**
	 * onUserLoginFailure.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onUserLoginFailure()
	{

	}

	/**
	 * onUserAfterLogin.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onUserAfterLogin()
	{

	}

	/**
	 * onUserLogout.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onUserLogout()
	{

	}

	/**
	 * onUserBeforeSaveGroup.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onUserBeforeSaveGroup()
	{

	}

	/**
	 * onUserAfterSaveGroup.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onUserAfterSaveGroup()
	{

	}

	/**
	 * onUserBeforeDeleteGroup.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onUserBeforeDeleteGroup()
	{

	}

	/**
	 * onUserAfterDeleteGroup.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onUserAfterDeleteGroup()
	{

	}
}
