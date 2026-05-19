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
            && $this->registerHook('displayProductAdditionalInfo')
            && $this->registerHook('displayProductListReviews')
            && $this->registerHook('displayHome')
            && $this->registerHook('header')
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
            && $this->uninstallDB()
            && $this->uninstallTab();
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

    private function uninstallTab()
    {
        $idTab = (int) Tab::getIdFromClassName('AdminProductBadges');

        if (!$idTab) {
            return true;
        }

        $tab = new Tab($idTab);

        return $tab->delete();
    }

    public function hookDisplayAdminProductsExtra($params)
    {
        $idProduct = (int)$params['id_product'];

        $idLang = (int)$this->context->language->id;

        $badges = Db::getInstance()->executeS('
            SELECT b.*, COALESCE(bl.text, b.id_badge) as text
            FROM ' . _DB_PREFIX_ . 'product_badge b
            LEFT JOIN ' . _DB_PREFIX_ . 'product_badge_lang bl
                ON b.id_badge = bl.id_badge AND bl.id_lang = ' . $idLang . '
            WHERE b.active = 1
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

    private function getProductBadges($idProduct)
    {
        return Db::getInstance()->executeS('
            SELECT b.*, bl.text
            FROM ' . _DB_PREFIX_ . 'product_badge b
            INNER JOIN ' . _DB_PREFIX_ . 'product_badges pb
                ON pb.id_badge = b.id_badge
            LEFT JOIN ' . _DB_PREFIX_ . 'product_badge_lang bl
                ON b.id_badge = bl.id_badge AND bl.id_lang = ' . (int) $this->context->language->id . '
            WHERE pb.id_product = ' . (int)$idProduct . '
            AND b.active = 1
        ');
    }

    public function hookDisplayProductAdditionalInfo($params)
    {
        $idProduct = (int)$params['product']['id_product'];

        $badges = $this->getProductBadges($idProduct);

        $this->context->smarty->assign([
            'badges' => $badges,
        ]);

        return $this->display(
            __FILE__,
            'views/templates/hook/product_badges.tpl'
        );
    }

    public function getContent()
    {
        Tools::redirectAdmin($this->context->link->getAdminLink('AdminProductBadges'));
    }

    public function hookDisplayProductListReviews($params)
    {
        $idProduct = (int)$params['product']['id_product'];

        $badges = $this->getProductBadges($idProduct);

        if (empty($badges)) {
            return '';
        }

        $this->context->smarty->assign([
            'badges' => $badges,
        ]);

        return $this->display(
            __FILE__,
            'views/templates/hook/product_badges.tpl'
        );
    }

    public function hookDisplayHome($params)
    {
        $badges = [];

        if (!empty($params['product']['id_product'])) {
            $badges = $this->getProductBadges((int)$params['product']['id_product']);
        }

        if (empty($badges)) {
            return '';
        }

        $this->context->smarty->assign([
            'badges' => $badges,
        ]);

        return $this->display(
            __FILE__,
            'views/templates/hook/product_badges.tpl'
        );
    }

    public function hookHeader()
    {
        if ($this->context->controller instanceof ProductController
            || $this->context->controller instanceof CategoryController
            || $this->context->controller instanceof SearchController
            || $this->context->controller instanceof IndexController
        ) {
            $this->context->controller->registerStylesheet(
                'module-productbadges',
                'modules/' . $this->name . '/views/css/productbadges.css',
                [
                    'media' => 'all',
                    'priority' => 150,
                ]
            );
        }
    }
}
