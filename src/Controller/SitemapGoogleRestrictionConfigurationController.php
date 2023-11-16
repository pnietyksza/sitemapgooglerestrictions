<?php

declare(strict_types=1);

namespace PrestaShop\Module\sitemapgooglerestrictions\Controller;

use FacebookAds\Http\Request;
use FacebookAds\Http\Response;
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;

class SitemapGoogleRestrictionConfigurationController extends FrameworkBundleAdminController
{
    public function index(
        Request $request
    ): Response {
        dump('dump index controller');
        exit;
    }
}
