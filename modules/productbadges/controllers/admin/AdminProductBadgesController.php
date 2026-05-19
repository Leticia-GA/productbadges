<?php

class AdminProductBadgesController extends ModuleAdminController
{
    public function __construct()
    {
        $this->table = 'product_badge';
        $this->className = 'ProductBadge';
        $this->identifier = 'id_badge';
        $this->bootstrap = true;

        $this->addRowAction('edit');
        $this->addRowAction('delete');

        parent::__construct();
    }

    public function renderList()
    {
        $this->fields_list = [
            'id_badge' => [
                'title' => $this->l('ID'),
                'class' => 'fixed-width-xs',
            ],
            'bg_color' => [
                'title' => $this->l('Background color'),
            ],
            'text_color' => [
                'title' => $this->l('Text color'),
            ],
            'position' => [
                'title' => $this->l('Position'),
            ],
            'active' => [
                'title' => $this->l('Active'),
                'type' => 'bool',
                'active' => 'status',
            ],
        ];

        return parent::renderList();
    }

    public function renderForm()
    {
        $this->fields_form = [
            'legend' => [
                'title' => $this->l('Product Badge'),
            ],
            'input' => [
                [
                    'type' => 'text',
                    'label' => $this->l('Background color'),
                    'name' => 'bg_color',
                    'required' => true,
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Text color'),
                    'name' => 'text_color',
                    'required' => true,
                ],
                [
                    'type' => 'select',
                    'label' => $this->l('Position'),
                    'name' => 'position',
                    'options' => [
                        'query' => [
                            ['id' => 'left', 'name' => $this->l('Left')],
                            ['id' => 'right', 'name' => $this->l('Right')],
                        ],
                        'id' => 'id',
                        'name' => 'name',
                    ],
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Text'),
                    'name' => 'text',
                    'lang' => true,
                    'required' => true,
                ],
                [
                    'type' => 'switch',
                    'label' => $this->l('Active'),
                    'name' => 'active',
                    'values' => [
                        ['id' => 1, 'value' => 1, 'label' => $this->l('Yes')],
                        ['id' => 0, 'value' => 0, 'label' => $this->l('No')],
                    ],
                ],
            ],
            'submit' => [
                'title' => $this->l('Save'),
            ],
        ];

        return parent::renderForm();
    }

    public function postProcess()
    {
        return parent::postProcess();
    }
}