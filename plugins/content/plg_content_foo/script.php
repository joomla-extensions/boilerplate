<?php
/**
 * @package    [EXTENSION_NAME]
 *
 * @author     [AUTHOR] <[AUTHOR_EMAIL]>
 * @copyright  [COPYRIGHT]
 * @license    [LICENSE]
 * @link       [AUTHOR_URL]
 */

use Joomla\CMS\Installer\Adapter\PluginAdapter as CMSPluginAdapter;

defined('_JEXEC') or die;

/**
 * Foo script file.
 *
 * @package     A package name
 * @since       1.0
 */
class PlgContentFooInstallerScript
{
	/**
	 * Constructor
	 *
	 * @param   CMSPluginAdapter  $adapter  The object responsible for running this script
	 */
	public function __construct(CMSPluginAdapter $adapter) {}

	/**
	 * Called before any type of action
	 *
	 * @param   string  $route  Which action is happening (install|uninstall|discover_install|update)
	 * @param   CMSPluginAdapter  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	public function preflight($route, CMSPluginAdapter $adapter) {}

	/**
	 * Called after any type of action
	 *
	 * @param   string  $route  Which action is happening (install|uninstall|discover_install|update)
	 * @param   CMSPluginAdapter  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	public function postflight($route, CMSPluginAdapter $adapter) {}

	/**
	 * Called on installation
	 *
	 * @param   CMSPluginAdapter  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	public function install(CMSPluginAdapter $adapter) {}

	/**
	 * Called on update
	 *
	 * @param   CMSPluginAdapter  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	public function update(CMSPluginAdapter $adapter) {}

	/**
	 * Called on uninstallation
	 *
	 * @param   CMSPluginAdapter  $adapter  The object responsible for running this script
	 */
	public function uninstall(CMSPluginAdapter $adapter) {}
}
