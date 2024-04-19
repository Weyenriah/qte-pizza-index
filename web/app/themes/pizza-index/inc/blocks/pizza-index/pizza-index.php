<?php
/**
 * Register Pizza Index block.
 *
 * Documentation: https://www.advancedcustomfields.com/resources/blocks/
 */

use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\PostObject;
use Extended\ACF\Location;

register_block_type(__DIR__ . '/block.json');

register_extended_field_group([
    'title' => 'Pizza Index',
    'fields' => [
        Text::make('Title')
            ->required(),
        Repeater::make('Favorites')
            ->fields([
                PostObject::make('Pizza')
                    ->postTypes(['pizza'])
                    ->helperText('Select a pizza to showcase a bit extra! These will not be shown when user has searched or filtered list.')
                    ->required(),
            ])
            ->maxRows(3)
            ->required(),
    ],
    'location' => [
        Location::where('block', 'acf/pizza-index'),
    ],
]);