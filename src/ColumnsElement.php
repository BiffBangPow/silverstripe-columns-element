<?php

namespace BiffBangPow\Element;

use BiffBangPow\Element\Model\ElementColumn;
use BiffBangPow\Extension\CallToActionExtension;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;


class ColumnsElement extends BaseElement
{
    /**
     * @var string
     */
    private static $table_name = 'BBP_ElementColumns';
    private static $singular_name = 'columns element';
    private static $plural_name = 'columns elements';
    private static $description = 'Displays content in columns';

    private static $inline_editable = false;

    /**
     * @var array
     */
    private static $has_many = [
        'Columns' => ElementColumn::class,
    ];

    /**
     * @var array
     */
    private static $owns = [
        'Columns',
    ];

    private static $cascade_deletes = [
        'Columns'
    ];

    private static $extensions = [
        CallToActionExtension::class
    ];

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName(['Columns']);
        $fields->addFieldToTab(
            'Root.Main',
            GridField::create(
                'Columns',
                _t(__CLASS__ . '.Columns', 'Columns'),
                $this->Columns(),
                GridFieldConfig_RecordEditor::create()
                    ->addComponent(new GridFieldOrderableRows('Sort'))
            )
        );

        return $fields;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return 'Columns';
    }

    public function getSimpleClassName()
    {
        return 'bbp-columns-element';
    }
}
