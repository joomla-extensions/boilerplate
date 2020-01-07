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
use Joomla\Database\DatabaseDriver;

/**
 * Joomlathing plugin.
 *
 * @package   [PACKAGE_NAME]
 * @since     1.0.0
 */
class plgContentJoomlathing extends CMSPlugin
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
	 * This is an event that is called right before the content is deleted.
	 *
	 * @param   string  $context  The context of the content passed to the plugin (added in 1.6).
	 * @param   object  $article  A JTableContent object.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onContentBeforeDelete($context, $article)
	{

	}

	/**
	 * This is an event that is called right after the content is deleted.
	 *
	 * @param   string  $context  The context of the content passed to the plugin (added in 1.6).
	 * @param   object  $article  A JTableContent object.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onContentAfterDelete($context, $article)
	{

	}

	/**
	 * This is a request for information that should be placed
	 * immediately before the generated content.
	 *
	 * @param   string   $context  The context of the content being passed to the plugin.
	 * @param   object   &$row     The article object.  Note $article->text is also available
	 * @param   mixed    &$params  The article params
	 * @param   integer  $page     The 'page' number
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onContentBeforeDisplay($context, &$row, &$params, $page=0)
	{

	}

	/**
	 * This is a request for information that should be placed immediately
	 * after the generated content.
	 *
	 * @param   string   $context  The context of the content being passed to the plugin
	 * @param   object   &$row     The article object
	 * @param   object   &$params  The article params
	 * @param   integer  $page     The 'page' number
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onContentAfterDisplay ($context, &$row, &$params, $page=0)
	{
		// Access to plugin parameters
		$sample = $this->params->get('sample', '42');
	}

	/**
	 * This is an event that is called right before the content
	 * is saved into the database.
	 *
	 * @param   string  $context  The context of the content passed to the plugin (added in 1.6).
	 * @param   object  $article  A JTableContent object.
	 * @param   bool    $isNew    If the content is just about to be created.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onContentBeforeSave($context, $article, $isNew)
	{

	}

	/**
	 * This is an event that is called after the content is saved
	 * into the database.
	 *
	 * @param   string  $context  The context of the content passed to the plugin (added in 1.6)
	 * @param   object  $article  A JTableContent object
	 * @param   bool    $isNew    If the content has just been created
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onContentAfterSave($context, $article, $isNew)
	{

	}

	/**
	 * This is a request for information that should be placed between the
	 * content title and the content body.
	 *
	 * @param   string   $context  The context of the content being passed to the plugin.
	 * @param   object   &$row     The article object.  Note $article->text is also available
	 * @param   mixed    &$params  The article params
	 * @param   integer  $page     The 'page' number
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onContentAfterTitle($context, &$row, &$params, $page = 0)
	{

	}

	/**
	 * This is an event that is called when the contents state is changed.
	 *
	 * @param   string   $context  The context for the content passed to the plugin.
	 * @param   array    $pks      A list of primary key ids of the content that has changed state.
	 * @param   integer  $value    The value of the state that the content has been changed to.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onContentChangeState($context, $pks, $value)
	{

	}

	/**
	 * This is the first stage in preparing content for output and is the
	 * most common point for content orientated plugins to do their work.
	 *
	 * @param   string   $context  The context of the content being passed to the plugin.
	 * @param   object   &$row     The article object.  Note $article->text is also available
	 * @param   mixed    &$params  The article params
	 * @param   integer  $page     The 'page' number
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onContentPrepare($context, &$row, &$params, $page = 0)
	{

	}
}
