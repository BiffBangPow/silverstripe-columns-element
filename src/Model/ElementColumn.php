<?php

namespace BiffBangPow\Element\Model;

use BiffBangPow\Element\ColumnsElement;
use BiffBangPow\Extension\CallToActionExtension;
use BiffBangPow\Extension\SortableExtension;
use SilverStripe\Forms\DropdownField;
use SilverStripe\ORM\DataObject;

class ElementColumn extends DataObject
{
    /**
     * @var string
     */
    private static $table_name = 'BBP_ElementColumn';

    /**
     * @var string
     */
    private static $singular_name = 'Column';

    /**
     * @var string
     */
    private static $plural_name = 'Columns';

    /**
     * @config
     * @var string[]
     */
    private static $column_widths_small = [
        'col-12' => 'Full width',
        'col-6' => '1/2 width'
    ];

    /**
     * @config
     * @var string[]
     */
    private static $column_widths_large = [
        'col-lg-3' => '1/4 width',
        'col-lg-4' => '1/3 width',
        'col-lg-6' => '1/2 width',
        'col-lg-8' => '2/3 width',
        'col-lg-9' => '3/4 width',
        'col-lg-12' => 'Full width'
    ];

    private static $defaults = [
        'ColumnWidthSmall' => 'col-12',
        'ColumnWidthLarge' => 'col-lg-4'
    ];

    /**
     * @var array
     */
    private static $db = [
        'Name' => 'Varchar',
        'Description' => 'HTMLText',
        'ColumnWidthSmall' => 'Varchar',
        'ColumnWidthLarge' => 'Varchar'
    ];

    /**
     * @var array
     */
    private static $has_one = [
        'Columns' => ColumnsElement::class,
    ];

    private static $extensions = [
        SortableExtension::class,
        CallToActionExtension::class
    ];

    /**
     * @var array
     */
    private static $summary_fields = [
        'Name' => 'Name',
        'Description.Summary' => 'Description'
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName(['ColumnsID']);
        $fields->addFieldsToTab('Root.Main', [
            DropDownField::create(
                'ColumnWidthSmall',
                _t(__CLASS__ . '.ColumnWidthSmall', 'Column Width (Small Screens)'),
                $this->config()->get('column_widths_small')
            ),
            DropDownField::create(
                'ColumnWidthLarge',
                _t(__CLASS__ . '.ColumnWidthLarge', 'Column Width (Large Screens)'),
                $this->config()->get('column_widths_large')
            )
        ]);
        return $fields;
    }

    public function getColumnClass()
    {
        $class = ($this->ColumnWidthSmall != "") ? $this->ColumnWidthSmall : 'col-12';
        $class .= " " . ($this->ColumnWidthLarge != "") ? $this->ColumnWidthLarge : 'col-lg-4';

        return $class;
    }
}
