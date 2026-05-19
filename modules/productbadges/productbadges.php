<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class ProductBadges extends Module
{
    public function __construct()
    {
        $this->name = 'productbadges';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Leti';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Product Badges');
        $this->description = $this->l('Manage reusable product badges.');
    }

    public function install()
    {
        return parent::install()
            && $this->installDB();
    }

    private function installDB()
    {
        include dirname(__FILE__) . '/sql/install.php';

        return true;
    }

    public function uninstall()
    {
        return parent::uninstall()
            && $this->uninstallDB();
    }

    private function uninstallDB()
    {
        include dirname(__FILE__) . '/sql/uninstall.php';

        return true;
    }
}
