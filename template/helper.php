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

use \Joomla\CMS\Factory;
use \Joomla\CMS\HTML\HTMLHelper;
use \Joomla\CMS\Uri\Uri;

/**
 * Foo template helper.
 *
 * @package  [PACKAGE_NAME]
 * @since    1.0
 */
class tplFooHelper
{
	static public function template()
	{
		return Factory::getApplication()->getTemplate();
	}

	/**
	 * Method to get current Page Option
	 *
	 * @access public
	 *
	 * @param null
	 *
	 * @return mixed
	 * @since 1.0
	 */
	static public function getPageOption()
	{
		//return str_replace('_', '-', Factory::getApplication()->input->getCmd('option', ''));
		return Factory::getApplication()->input->getCmd('option', '');
	}

	/**
	 * Method to get current Page View
	 *
	 * @access public
	 *
	 * @param null
	 *
	 * @return mixed
	 * @since 1.0
	 */
	static public function getPageView()
	{
		return Factory::getApplication()->input->getCmd('view', '');
	}

	/**
	 * Method to get current Page Layout
	 *
	 * @access public
	 *
	 * @param null
	 *
	 * @return mixed
	 * @since version
	 */
	static public function getPageLayout()
	{
		return Factory::getApplication()->input->getCmd('layout', '');
	}

	/**
	 * Method to get current Page Task
	 *
	 * @access public
	 *
	 * @param null
	 *
	 * @return mixed
	 * @since 1.0
	 */
	static public function getPageTask()
	{
		return Factory::getApplication()->input->getCmd('task', '');
	}

	/**
	 * Method to get the current Menu Item ID
	 *
	 * @access public
	 *
	 * @param null
	 *
	 * @return int
	 * @since 1.0
	 */
	static public function getItemId()
	{
		return Factory::getApplication()->input->getInt('Itemid');
	}

	/**
	 * Method to get PageClass set with Menu Item
	 *
	 * @return mixed
	 * @since  1.0
	 */
	static public function getPageClass()
	{
		$activeMenu = Factory::getApplication()->getMenu()->getActive();
		$pageclass  = ($activeMenu) ? $activeMenu->params->get('pageclass_sfx', '') : '';

		return $pageclass;
	}

	/**
	 * Method to determine whether the current page is the Joomla! homepage
	 *
	 * @access public
	 *
	 * @param null
	 *
	 * @return bool
	 * @since  1.0
	 */
	static public function isHome()
	{
		// Fetch the active menu-item
		$activeMenu = Factory::getApplication()->getMenu()->getActive();

		// Return whether this active menu-item is home or not
		return (boolean) ($activeMenu) ? $activeMenu->home : false;
	}

	/**
	 * Method to fetch the current path
	 *
	 * @access public
	 *
	 * @param string $output Output type
	 *
	 * @return mixed
	 * @since  1.0
	 */
	static public function getPath($output = 'array')
	{
		$path = Uri::getInstance()->getPath();
		$path = preg_replace('/^\//', '', $path);
		if ($output == 'array')
		{
			$path = explode('/', $path);

			return $path;
		}

		return $path;
	}

	/**
	 * Generate a list of useful CSS classes for the body
	 *
	 * @access public
	 *
	 * @param null
	 *
	 * @return bool
	 * @since  1.0
	 */
	static public function setBodySuffix()
	{
		$classes   = array();
		$classes[] = 'option-' . self::getPageOption();
		$classes[] = 'view-' . self::getPageView();
		$classes[] = self::getPageLayout() ? 'layout-' . self::getPageLayout() : 'no-layout';
		$classes[] = self::getPageTask() ? 'task-' . self::getPageTask() : 'no-task';
		$classes[] = 'itemid-' . self::getItemId();
		$classes[] = self::getPageClass();
		$classes[] = self::isHome() ? 'path-home' : 'path-' . implode('-', self::getPath('array'));

		return implode(' ', $classes);
	}

	/**
	 * Method to manually override the META-generator
	 *
	 * @access public
	 *
	 * @param string $generator
	 *
	 * @return null
	 *
	 * @since  1.0
	 */
	static public function setGenerator($generator)
	{
		Factory::getDocument()->setGenerator($generator);
	}

	/**
	 * Method to get the current sitename
	 *
	 * @access public
	 *
	 * @param null
	 *
	 * @return string
	 * @since  1.0
	 */
	static public function getSitename()
	{
		return Factory::getConfig()->get('sitename');
	}

	/**
     * Method to set some Meta data
     *
	 * @access public
	 *
	 * @param null
	 *
	 * @return null
	 * @since  1.0
    */
	static public function setMetadata()
	{
		$doc    = Factory::getDocument();

		$doc->setHtml5(true);
		$doc->setMetaData('X-UA-Compatible', 'IE=edge', true);
		$doc->setMetaData('viewport', 'width=device-width, initial-scale=1.0');
		//self::setGenerator(self::getSitename());
	}

	/**
	 * Method to load CSS
	 *
	 * @access public
	 *
	 * @param null
	 *
	 * @since  1.0
	 */
	static public function loadCss()
	{
		HTMLHelper::_('stylesheet', 'template.css', ['version' => 'auto', 'relative' => true]);

		// Check for a custom CSS file
		$userCss = JPATH_SITE . '/templates/' . self::template() . '/css/user.css';

		if (file_exists($userCss) && filesize($userCss) > 0)
		{
			HTMLHelper::_('stylesheet', 'user.css', ['version' => 'auto', 'relative' => true]);
		}
	}

	/**
	 * Method to load JS
	 *
	 * @access public
	 *
	 * @param null
	 *
	 * @since  1.0
	 */
	static public function loadJs()
	{
		HTMLHelper::_('script', 'template.js', ['version' => 'auto', 'relative' => true]);
	}

	/**
	 * Method to set Analytics
	 *
	 * @param   int   $analytics  Number to indicate wich type of analytics to use
	 * @param   array   $options      Array of extra options
	 * @param   object  &$response    Authentication response object
	 *
	 * @return string
	 * @since  1.0
	 */
	static public function setAnalytics($analyticsType = null, $analyticsId = null)
	{
		$doc        = Factory::getDocument();
		$bodyScript = '';

		if (!$analyticsType)
		{
			return false;
		}

		if (!$analyticsId)
		{
			return false;
		}

		switch ($analyticsType)
		{
			case 0:
				break;

			case 1:
				// Universal Google Universal Analytics - loaded in head
				$headScript = "
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', '" . $analyticsId . "', 'auto');
        ga('send', 'pageview');
      ";
				$doc->addScriptDeclaration($headScript);

				break;

			case 2:
				// Google Tag Manager - party loaded in head
				$headScript = "
  <!-- Google Tag Manager -->
  (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','" . $analyticsId . "');
  <!-- End Google Tag Manager -->

          ";
				$doc->addScriptDeclaration($headScript);

				// Google Tag Manager - partly loaded directly after body
				$bodyScript = "<!-- Google Tag Manager -->
<noscript><iframe src=\"//www.googletagmanager.com/ns.html?id=" . $analyticsId . "\" height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>
<!-- End Google Tag Manager -->
";

				break;

			case 3:
				// Mixpanel.com - loaded in head
				$headScript = "
<!-- start Mixpanel -->(function(e,b){if(!b.__SV){var a,f,i,g;window.mixpanel=b;b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(\".\");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;\"undefined\"!==typeof d?c=b[d]=[]:d=\"mixpanel\";c.people=c.people||[];c.toString=function(b){var a=\"mixpanel\";\"mixpanel\"!==d&&(a+=\".\"+d);b||(a+=\" (stub)\");return a};c.people.toString=function(){return c.toString(1)+\".people (stub)\"};i=\"disable time_event track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.union people.track_charge people.clear_charges people.delete_user\".split(\" \");
for(g=0;g<i.length;g++)f(c,i[g]);b._i.push([a,e,d])};b.__SV=1.2;a=e.createElement(\"script\");a.type=\"text/javascript\";a.async=!0;a.src=\"undefined\"!==typeof MIXPANEL_CUSTOM_LIB_URL?MIXPANEL_CUSTOM_LIB_URL:\"file:\"===e.location.protocol&&\"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js\".match(/^\/\//)?\"https://cdn.mxpnl.com/libs/mixpanel-2-latest.min.js\":\"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js\";f=e.getElementsByTagName(\"script\")[0];f.parentNode.insertBefore(a,f)}})(document,window.mixpanel||[]);
mixpanel.init(\"" . $analyticsId . "\");<!-- end Mixpanel -->
      ";
				$doc->addScriptDeclaration($headScript);

				break;

			default:
				break;
		}

		return $bodyScript;
	}

}