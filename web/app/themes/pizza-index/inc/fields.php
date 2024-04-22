<?php
/**
 * Register custom fields.
 *
 * @package pizza-index
 */

use Extended\ACF\Fields\Textarea;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Location;

// Register custom fields for the pizza post type.
register_extended_field_group([
    'title' => 'Pizza',
    'fields' => [
        Textarea::make('Description')
            ->helperText('Describe the pizza in detail.')
            ->required(),
        Repeater::make('Descriptives')
            ->fields([
                Text::make('Word')
                    ->required(),
            ])
            ->required(),
    ],
    'location' => [
        Location::where('post_type', 'pizza'),
    ],
]);