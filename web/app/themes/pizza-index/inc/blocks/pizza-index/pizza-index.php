<?php
/**
 * Register Pizza Index block.
 *
 * Documentation: https://www.advancedcustomfields.com/resources/blocks/
 */

use Extended\ACF\Fields\Text;
use Extended\ACF\Location;

register_block_type(__DIR__ . '/block.json');

register_extended_field_group([
    'title' => 'Pizza Index',
    'fields' => [
        Text::make('Title')
            ->required(),
    ],
    'location' => [
        Location::where('block', 'acf/pizza-index'),
    ],
]);