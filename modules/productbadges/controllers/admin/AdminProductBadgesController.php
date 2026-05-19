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
                'title' => 'ID',
                'class' => 'fixed-width-xs',
            ],
            'bg_color' => [
                'title' => 'Background color',
            ],
            'text_color' => [
                'title' => 'Text color',
            ],
            'position' => [
                'title' => 'Position',
            ],
            'active' => [
                'title' => 'Active',
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
                'title' => 'Product Badge',
            ],
            'input' => [
                [
                    'type' => 'text',
                    'label' => 'Background color',
                    'name' => 'bg_color',
                    'required' => true,
                ],
                [
                    'type' => 'text',
                    'label' => 'Text color',
                    'name' => 'text_color',
                    'required' => true,
                ],
                [
                    'type' => 'select',
                    'label' => 'Position',
                    'name' => 'position',
                    'options' => [
                        'query' => [
                            ['id' => 'left', 'name' => 'Left'],
                            ['id' => 'right', 'name' => 'Right'],
                        ],
                        'id' => 'id',
                        'name' => 'name',
                    ],
                ],
                [
                    'type' => 'text',
                    'label' => 'Text',
                    'name' => 'text',
                    'lang' => true,
                    'required' => true,
                ],
                [
                    'type' => 'switch',
                    'label' => 'Active',
                    'name' => 'active',
                    'values' => [
                        ['id' => 1, 'value' => 1, 'label' => 'Yes'],
                        ['id' => 0, 'value' => 0, 'label' => 'No'],
                    ],
                ],
            ],
            'submit' => [
                'title' => 'Save',
            ],
        ];

        return parent::renderForm();
    }

    public function postProcess()
    {
        return parent::postProcess();
    }
}