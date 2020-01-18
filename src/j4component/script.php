<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_joomlaextensionboilerplates
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

use Joomla\CMS\Installer\InstallerAdapter;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Log\Log;

/**
 * Script file of Joomlaextensionboilerplate Component
 *
 * @since  1.0.0
 */
class Com_JoomlaextensionboilerplatesInstallerScript
{
	/**
	 * Minimum Joomla version to check
	 *
	 * @var    string
	 * @since  1.0.0
	 */
	private $minimumJoomlaVersion = '4.0';

	/**
	 * Minimum PHP version to check
	 *
	 * @var    string
	 * @since  1.0.0
	 */
	private $minimumPHPVersion = JOOMLA_MINIMUM_PHP;

	/**
	 * Method to install the extension
	 *
	 * @param   InstallerAdapter  $parent  The class calling this method
	 *
	 * @return  boolean  True on success
	 *
	 * @since  1.0.0
	 */
	public function install($parent): bool
	{
		echo Text::_('COM_JOOMLAEXTENSIONBOILERPLATES_INSTALLERSCRIPT_INSTALL');

		return true;
	}

	/**
	 * Method to uninstall the extension
	 *
	 * @param   InstallerAdapter  $parent  The class calling this method
	 *
	 * @return  boolean  True on success
	 *
	 * @since  1.0.0
	 */
	public function uninstall($parent): bool
	{
		echo Text::_('COM_JOOMLAEXTENSIONBOILERPLATES_INSTALLERSCRIPT_UNINSTALL');

		return true;
	}

	/**
	 * Method to update the extension
	 *
	 * @param   InstallerAdapter  $parent  The class calling this method
	 *
	 * @return  boolean  True on success
	 *
	 * @since  1.0.0
	 *
	 */
	public function update($parent): bool
	{
		echo Text::_('COM_JOOMLAEXTENSIONBOILERPLATES_INSTALLERSCRIPT_UPDATE');

		return true;
	}

	/**
	 * Function called before extension installation/update/removal procedure commences
	 *
	 * @param   string            $type    The type of change (install, update or discover_install, not uninstall)
	 * @param   InstallerAdapter  $parent  The class calling this method
	 *
	 * @return  boolean  True on success
	 *
	 * @since  1.0.0
	 *
	 * @throws Exception
	 */
	public function preflight($type, $parent): bool
	{
		if ($type !== 'uninstall')
		{
			// Check for the minimum PHP version before continuing
			if (!empty($this->minimumPHPVersion) && version_compare(PHP_VERSION, $this->minimumPHPVersion, '<'))
			{
				Log::add(
					Text::sprintf('JLIB_INSTALLER_MINIMUM_PHP', $this->minimumPHPVersion),
					Log::WARNING,
					'jerror'
				);

				return false;
			}

			// Check for the minimum Joomla version before continuing
			if (!empty($this->minimumJoomlaVersion) && version_compare(JVERSION, $this->minimumJoomlaVersion, '<'))
			{
				Log::add(
					Text::sprintf('JLIB_INSTALLER_MINIMUM_JOOMLA', $this->minimumJoomlaVersion),
					Log::WARNING,
					'jerror'
				);

				return false;
			}
		}

		echo Text::_('COM_JOOMLAEXTENSIONBOILERPLATES_INSTALLERSCRIPT_PREFLIGHT');

		return true;
	}

	/**
	 * Function called after extension installation/update/removal procedure commences
	 *
	 * @param   string            $type    The type of change (install, update or discover_install, not uninstall)
	 * @param   InstallerAdapter  $parent  The class calling this method
	 *
	 * @return  boolean  True on success
	 *
	 * @since  1.0.0
	 *
	 */
	public function postflight($type, $parent)
	{
		echo Text::_('COM_JOOMLAEXTENSIONBOILERPLATES_INSTALLERSCRIPT_POSTFLIGHT');

		return true;
	}
}
