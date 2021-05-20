<?php

namespace BiffBangPow\Element;

use BiffBangPow\Element\Model\ElementColumn;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class ColumnsElement extends BaseElement
{
    /**
     * @var string
     */
    private static $table_name = 'ElementColumns';

    private static $singular_name = 'columns element';

    private static $plural_name = 'columns elements';

    private static $description = 'Displays the main focuses of your business';

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

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $conf = GridFieldConfig_RecordEditor::create(10);
        $conf->addComponent(new GridFieldSortableRows('Sort'));
        $fields->addFieldToTab(
            'Root.Columns',
            GridField::create('Columns', 'Columns', $this->Columns(), $conf)
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
        return 'columns-element';
    }
}
