<?php
/**
 * @package    Foo Name
 *
 * @author     Andrea Gentil - Anibal Sanchez <team@extly.com>
 * @copyright  Copyright (c)2007-2018 Andrea Gentil - Anibal Sanchez All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       https://www.extly.com
 */

/**
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

use Joomla\CMS\Installer\InstallerAdapter as CMSPluginAdapter;

defined('_JEXEC') or die;

/**
 * Foo script file.
 *
 * @package     A package name
 * @since       1.0
 */
class Com_FooInstallerScript
{
	/**
	 * Constructor
	 *
	 * @param   CMSPluginAdapter  $adapter  The object responsible for running this script
	 */
	public function __construct(CMSPluginAdapter $adapter)
	{

	}

	/**
	 * Called before any type of action
	 *
	 * @param   string            $route    Which action is happening (install|uninstall|discover_install|update)
	 * @param   CMSPluginAdapter  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	public function preflight($route, CMSPluginAdapter $adapter)
	{
		return true;
	}

	/**
	 * Called after any type of action
	 *
	 * @param   string            $route    Which action is happening (install|uninstall|discover_install|update)
	 * @param   CMSPluginAdapter  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	public function postflight($route, CMSPluginAdapter $adapter)
	{
		return true;
	}

	/**
	 * Called on installation
	 *
	 * @param   CMSPluginAdapter  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	public function install(CMSPluginAdapter $adapter)
	{
		return true;
	}

	/**
	 * Called on update
	 *
	 * @param   CMSPluginAdapter  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	public function update(CMSPluginAdapter $adapter)
	{
		return true;
	}

	/**
	 * Called on uninstallation
	 *
	 * @param   CMSPluginAdapter  $adapter  The object responsible for running this script
	 *
	 * @return  void
	 */
	public function uninstall(CMSPluginAdapter $adapter)
	{

	}
}
