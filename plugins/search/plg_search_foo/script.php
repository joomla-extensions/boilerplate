<?php
/**
 * @package    Foo Name
 *
 * @author     Andrea Gentil - Anibal Sanchez <team@extly.com>
 * @copyright  Copyright (c)2007-2018 Andrea Gentil - Anibal Sanchez All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       https://www.extly.com
 */

use Joomla\CMS\Installer\Adapter\PluginAdapter as CMSPluginAdapter;

defined('_JEXEC') or die;

/**
 * Foo script file.
 *
 * @package     A package name
 * @since       1.0
 */
class PlgSearchFooInstallerScript
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
