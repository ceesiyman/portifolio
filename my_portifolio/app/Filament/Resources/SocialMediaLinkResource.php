<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocialMediaLinkResource\Pages;
use App\Models\SocialMediaLink;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;

class SocialMediaLinkResource extends Resource
{
    protected static ?string $model = SocialMediaLink::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';

    protected static ?string $navigationGroup = 'Settings'; // Optional: Grouping in Filament navigation

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('platform')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('link')
                    ->url()
                    ->required()
                    ->maxLength(500),
                
                TextInput::make('icon')
                    ->maxLength(255)
                    ->placeholder('FontAwesome class or image URL'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
{
    return $table
        ->columns([
            TextColumn::make('platform')
                ->sortable()
                ->searchable(),

            TextColumn::make('link')
                ->limit(30)
                ->url(fn ($record) => $record->link, true), // Opens in a new tab

            TextColumn::make('icon')
                ->limit(20),
            
            TextColumn::make('created_at')
                ->dateTime('d M Y'),
        ])
        ->filters([])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
}


    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSocialMediaLinks::route('/'),
            'create' => Pages\CreateSocialMediaLink::route('/create'),
            'edit' => Pages\EditSocialMediaLink::route('/{record}/edit'),
        ];
    }
}
