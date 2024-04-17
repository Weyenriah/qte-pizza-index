<?php
/**
 * Register custom fields for Pizzas CPT.
 */

use Extended\ACF\Fields\Textarea;
use Extended\ACF\Location;

register_extended_field_group([
    'title' => 'Pizza',
    'fields' => [
        Textarea::make('Description')
            ->helperText('Describe the pizza in detail.')
            ->required(),
    ],
    'location' => [
        Location::where('post_type', 'pizza'),
    ],
]);