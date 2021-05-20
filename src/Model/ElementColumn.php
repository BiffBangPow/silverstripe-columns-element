<?php
namespace BiffBangPow\Element\Model;

use BiffBangPow\Element\ColumnsElement;
use BiffBangPow\Extension\SortableExtension;
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
     * @var array
     */
    private static $db = [
        'Name' => 'Varchar',
        'Description' => 'HTMLText',
    ];

    /**
     * @var array
     */
    private static $has_one = [
        'Columns' => ColumnsElement::class,
    ];

    private static $extensions = [
        SortableExtension::class
    ];

    /**
     * @var array
     */
    private static $summary_fields = [
        'Name' => 'Name',
        'Description' => 'Description'
    ];
}