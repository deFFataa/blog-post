<?php

namespace App\Filament\App\Resources\Posts\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Kirschbaum\Commentions\Filament\Infolists\Components\CommentsEntry;

class PostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->columns(1)
            ->components([
                Grid::make(2)
                ->schema([
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('title'),
                TextEntry::make('content')
                    ->columnSpanFull(),
                IconEntry::make('is_published')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                ]),

                Section::make('Comments')
                    ->components([
                        CommentsEntry::make('comments'),
                    ]),
            ]);
    }
}
