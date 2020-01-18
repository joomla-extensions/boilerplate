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
use Joomla\CMS\Event as CmsEvent;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\Database\DatabaseDriver;
use Joomla\Event\DispatcherInterface;

/**
 * Joomlaextensionboilerplate plugin.
 *
 * @package   [PACKAGE_NAME]
 * @since     1.0.0
 */
class plgBehaviourJoomlaextensionboilerplate extends CMSPlugin
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
	 * @var    DatabaseDriver
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
	 * Constructor
	 *
	 * @param   DispatcherInterface &$subject   The object to observe
	 * @param   array               $config     An optional associative array of configuration settings.
	 *                                          Recognized key values include 'name', 'group', 'params', 'language'
	 *                                          (this list is not meant to be comprehensive).
	 *
	 * @since  1.0.0
	 */
	public function __construct(&$subject, $config = array())
	{
		$this->allowLegacyListeners = false;

		parent::__construct($subject, $config);
	}

	/**
	 * Runs when a new table object is being created
	 *
	 * @param   CmsEvent\Table\ObjectCreateEvent $event The event to handle
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onTableObjectCreate(CmsEvent\Table\ObjectCreateEvent $event)
	{

	}

	/**
	 * Post-processor for $table->store($updateNulls)
	 *
	 * @param   CmsEvent\Table\AfterStoreEvent $event The event to handle
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onTableAfterStore(CmsEvent\Table\AfterStoreEvent $event)
	{

	}

	/**
	 * Pre-processor for $table->delete($pk)
	 *
	 * @param   CmsEvent\Table\BeforeDeleteEvent $event The event to handle
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onTableBeforeDelete(CmsEvent\Table\BeforeDeleteEvent $event)
	{

	}
}
