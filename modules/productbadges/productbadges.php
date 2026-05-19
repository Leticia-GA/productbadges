<?php

require_once __DIR__ . '/classes/ProductBadge.php';

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
            && $this->installDB()
            && $this->registerHook('displayAdminProductsExtra')
            && $this->registerHook('actionProductSave')
            && $this->installTab();
    }

    private function installDB()
    {
        include dirname(__FILE__) . '/sql/install.php';

        return $result;
    }

    public function uninstall()
    {
        return parent::uninstall()
            && $this->uninstallDB();
    }

    private function uninstallDB()
    {
        include dirname(__FILE__) . '/sql/uninstall.php';

        return $result;
    }

    private function installTab()
    {
        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = 'AdminProductBadges';
        $tab->module = $this->name;
        $tab->id_parent = (int) Tab::getIdFromClassName('IMPROVE');

        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = 'Product Badges';
        }

        return $tab->add();
    }

    public function hookDisplayAdminProductsExtra($params)
    {
        $idProduct = (int)$params['id_product'];

        $badges = Db::getInstance()->executeS('
            SELECT *
            FROM ' . _DB_PREFIX_ . 'product_badge
            WHERE active = 1
        ');

        $rows = Db::getInstance()->executeS('
            SELECT id_badge
            FROM ' . _DB_PREFIX_ . 'product_badges
            WHERE id_product = ' . (int)$idProduct
        );

        $this->context->smarty->assign([
            'badges' => $badges,
            'assigned' => array_flip(array_column($rows, 'id_badge')),
        ]);

        return $this->display(
            __FILE__,
            'views/templates/admin/product_badges.tpl'
        );
    }

    public function hookActionProductSave($params)
    {
        $idProduct = (int)$params['id_product'];

        $badges = Tools::getValue('productbadges', []);

        Db::getInstance()->delete(
            'product_badges',
            'id_product = ' . (int)$idProduct
        );

        if (!is_array($badges)) {
            return;
        }

        foreach ($badges as $idBadge) {
            Db::getInstance()->insert('product_badges', [
                'id_product' => (int)$idProduct,
                'id_badge' => (int)$idBadge,
            ]);
        }
    }
}
