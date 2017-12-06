<?php
/**
 * 2007-2017 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2017 PrestaShop SA
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

namespace PrestaShop\Module\AutoUpgrade;

use Tools14;

/**
 * Contains the module configuration
 */
class UpgradeConfiguration
{
    /**
     * @var array|mixed
     */
    private $config = array();

    private $performance;

    private $customModDesact;

    private $updateDefaultTheme;

    private $changeDefaultTheme;

    private $keepMails;

    private $backup;

    private $keepImages;

    /**
     * UpgradeConfiguration constructor.
     *
     * @param string $configFilePath Path to the config file
     */
    public function __construct($configFilePath = '')
    {
        if (!empty($configFilePath) && file_exists($configFilePath)) {
            $content = Tools14::file_get_contents($configFilePath);
            $this->config = @unserialize(base64_decode($content));
        }
    }

    /**
     * Provides convenience access to configuration
     *
     * @param string $key The configuration key to look up
     *
     * @return string|false The corresponding configuration, or false if not found
     */
    public function get($key, $default = false)
    {
        if (isset($this->config[$key])) {
            return trim($this->config[$key]);
        }

        return $default;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function has($key)
    {
        return isset($this->config[$key]);
    }
}
