dcawizard Contao Extension
==========================

This extension provides a widget to handle external table records in the edit mode of the parent record.

## How to use

```php
// DCA defnition
'prices' => array
(
    'label'                 => &$GLOBALS['TL_LANG']['tl_iso_products']['prices'],
    'inputType'             => 'dcaWizard',

    // Define the foreign table
    'foreignTable'          => 'tl_iso_prices',

    // Define the foreign field (e.g. fid instead of pid)
    'foreignField'          => 'fid',

    // Use the callback to determine the foreign table
    'foreignTableCallback'  => array('tl_iso_prices', 'getTableName'),

    // Add special params to the link of the button
    'params'                  => array
    (
        // Change the do parameter
        'do'                  => 'member',

        // Add new parameter, for example to filter the list
        'filterField'         => 'group',
    ),

    'eval'                  => array
    (
        // A list of fields to be displayed in the table
        'fields' => array('id', 'name', 'alias'),

        // Header fields of the table (leave empty to use labels)
        'headerFields' => array('ID', 'Name', 'Alias'),

        // Use a custom label for the edit button
        'editButtonLabel' => $GLOBALS['TL_LANG']['tl_iso_products']['prices_edit_button'],

        // Use a custom label for the apply button
        'applyButtonLabel' => $GLOBALS['TL_LANG']['tl_iso_products']['prices_apply_button'],
        
        // Set a label if no records are found
        'emptyLabel' => $GLOBALS['TL_LANG']['tl_iso_products']['prices_empty_label'],

        // Order records by a particular field
        'orderField' => 'name DESC',

        // Hide the popup button (record list functionality only)
        'hideButton' => true,
        
        // Show operations next to every row (disabled by default)
        'showOperations' => true,

        // Define which operations you want to list
        // If this one is not defined, are all listed
        'operations' => array('edit', 'delete'),

        // Use the callback to generate the list
        'listCallback' => array('Isotope\tl_iso_prices', 'generateWizardList'),
    ),
),

// Example list callback:
/**
 * Generate a list of prices for a wizard in products
 * @param object
 * @param string
 * @return string
 */
public function generateWizardList($objRecords, $strId)
{
    $strReturn = '';

    while ($objRecords->next()) {
        $strReturn .= '<li>' . $objRecords->name . ' (ID: ' . $objRecords->id . ')' . '</li>';
    }

    return '<ul id="sort_' . $strId . '">' . $strReturn . '</ul>';
}
```

## Using the dcaWizard together with DC_Multilingual

If you want to use the dcaWizard to manage a foreign table that is generated by [DC_Multilingual](https://github.com/terminal42/contao-DC_Multilingual) you can simply use

```php
    'inputType'             => 'dcaWizardMultilingual',
```

so the translated entries will not be listed.

If you do not use the `language` database column to separate entries (see `langColumn` setting in `DC_Multilingual`, you can specify the matching column name in the `eval` section as well:

```php
    'eval' => array
    (
        'langColumn' => 'language_column_name',
    ),
)
```