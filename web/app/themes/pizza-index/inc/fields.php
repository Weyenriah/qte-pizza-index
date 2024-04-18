<?php
/**
 * Register custom fields.
 */

use Extended\ACF\Fields\Textarea;
use Extended\ACF\Location;

// Register custom fields for the pizza post type.
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