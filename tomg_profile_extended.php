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

use Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Plugin\CMSPlugin;


JLoader::register('TomgProfileExtendedHelper', JPATH_PLUGINS . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'tomg_profile_extended' . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'tomg_profile_extended.helper.php');
/**
 * Tomg_profile_extended plugin.
 *
 * @package   plg_user_tomg_profile_extended
 * @since     1.0.0
 */
class PlgUserTomg_Profile_Extended extends CMSPlugin
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
   * plgUser_tomg_profile_extended constructor.
   *
   * @param          $subject
   * @param   array  $config
   */
  public function __construct(&$subject, $config = array()) {
    parent::__construct($subject, $config);
    echo __METHOD__.'<br />';
    
  }
  
  public function onContentPrepareData($context, $data){
    echo __METHOD__.'<br />';
  }
  public function onContentPrepareForm(Form $form, $data){
    echo __METHOD__.'<br />';
  }
  
}
