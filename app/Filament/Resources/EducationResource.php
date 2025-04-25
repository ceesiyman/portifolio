<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EducationResource\Pages;
use App\Models\Education;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;

class EducationResource extends Resource
{
    protected static ?string $model = Education::class;

    protected static ?string $navigationGroup = 'Portfolio'; // Optional Grouping
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap'; // Sidebar icon

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('institution')
                    ->required()
                    ->maxLength(255),

                TextInput::make('degree')
                    ->required()
                    ->maxLength(255),

                TextInput::make('start_year')
                    ->numeric()
                    ->minValue(1900)
                    ->maxValue(date('Y'))
                    ->required(),

                TextInput::make('end_year')
                    ->numeric()
                    ->minValue(1900)
                    ->maxValue(date('Y') + 10) // Allows some future years
                    ->nullable()
                    ->label('End Year (if applicable)'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('institution')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('degree')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('start_year')
                    ->sortable(),

                TextColumn::make('end_year')
                    ->sortable()
                    ->label('End Year (if applicable)'),
            ])
            ->filters([
                Filter::make('Ongoing Studies')
                    ->query(fn ($query) => $query->whereNull('end_year')),
            ])
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
            'index' => Pages\ListEducation::route('/'),
            'create' => Pages\CreateEducation::route('/create'),
            'edit' => Pages\EditEducation::route('/{record}/edit'),
        ];
    }
}
