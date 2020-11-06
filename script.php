<?php
/**
 * @package    plg_user_tomg_profile_extended
 *
 * @author     Thomas Goldbach <info@thomasgoldbach.de>
 * @copyright  A copyright
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       https://thomasgoldbach.de
 */

defined('_JEXEC') or die;

/**
 * Tomg_profile_extended script file.
 *
 * @package   plg_user_tomg_profile_extended
 * @since     1.0.0
 */
class plgUserTomg_profile_extendedInstallerScript
{
	/**
	 * Constructor
	 *
	 * @param   JAdapterInstance  $adapter  The object responsible for running this script
	 */
	public function __construct(JAdapterInstance $adapter) {}

	/**
	 * Called before any type of action
	 *
	 * @param   string  $route  Which action is happening (install|uninstall|discover_install|update)
	 * @param   JAdapterInstance  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	public function preflight($route, JAdapterInstance $adapter) {}

	/**
	 * Called after any type of action
	 *
	 * @param   string  $route  Which action is happening (install|uninstall|discover_install|update)
	 * @param   JAdapterInstance  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	public function postflight($route, JAdapterInstance $adapter) {
	  $ret_val    = false;
	  $db         = JFactory::getDbo();
	  $query      = $db->getQuery(true);
	  $fields     = array($db->quoteName('enabled') . ' = ' . 1);
	  $conditions = array($db->quoteName('name') . ' = ' . $db->quote(JText::_('PLG_USER_USER_TOMG_PROFILE_EXTENDED')));
	  
	  $message = '';
	  $query->update($db->quoteName('#__extensions'))->set($fields)->where($conditions);
	  
	  $db->setQuery($query);
	  
	  $enabled = true;
	  
	  try
	  {
		$db->execute();
	  }
	  catch(RuntimeException $e)
	  {
		$message = $e->getMessage();
		$enabled = false;
	  }
	  
	  if($enabled)
	  {
		$message .= JText::_("PLG_USER_TOMG_PROFILE_EXTENDED_ACTIVATED_SUCCESS");
	  }
	  else
	  {
		$message = JText::_("PLG_USER_TOMG_PROFILE_EXTENDEDF_ACTIVATED_FAIL") . '<br />' . $message;
	  }
	  
	  echo $message;
	  
	  return $ret_val;
	}

	/**
	 * Called on installation
	 *
	 * @param   JAdapterInstance  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	public function install(JAdapterInstance $adapter) {}

	/**
	 * Called on update
	 *
	 * @param   JAdapterInstance  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	public function update(JAdapterInstance $adapter) {}

	/**
	 * Called on uninstallation
	 *
	 * @param   JAdapterInstance  $adapter  The object responsible for running this script
	 */
	public function uninstall(JAdapterInstance $adapter) {}
}
