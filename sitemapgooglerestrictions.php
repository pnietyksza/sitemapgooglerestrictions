<?php
/**
* 2007-2023 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
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
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2023 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

declare(strict_types=1);

use PrestaShop\PrestaShop\Adapter\SymfonyContainer;

if (!defined('_PS_VERSION_')) {
    exit;
}

class SitemapGoogleRestrictions extends Module
{
    protected $config_form = false;

    public function __construct()
    {
        $this->name = 'sitemapgooglerestrictions';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'Patryk Nietyksza';
        $this->need_instance = 0;
        $this->bootstrap = true;
        parent::__construct();
        $this->displayName = $this->l('Sitemap with Google restrictions');
        $this->description = $this->l('Sitemap generator with Google restrictions');
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    public function install()
    {
        Configuration::updateValue('SITEMAPGOOGLERESTRICTIONS_LIVE_MODE', false);

        return parent::install() &&
            $this->registerHook('header') &&
            $this->registerHook('displayBackOfficeHeader');
    }

    public function uninstall()
    {
        Configuration::deleteByName('SITEMAPGOOGLERESTRICTIONS_LIVE_MODE');

        return parent::uninstall();
    }

    public function getTabs()
    {
        return [
            [
                'class_name' => 'AdminWkCreateSitemap',
                'visible' => true,
                'name' => 'Create sitemap',
                'parent_class_name' => 'CONFIGURE',
            ]
        ];
    }
    
    public function getContent() : void
    {
        $route = SymfonyContainer::getInstance()->get('router')->generate('sitemap_google_restriction_form');

        Tools::redirectAdmin($route);
    }
}
