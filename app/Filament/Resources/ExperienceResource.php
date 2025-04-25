<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExperienceResource\Pages;
use App\Models\Experience;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;

class ExperienceResource extends Resource
{
    protected static ?string $model = Experience::class;

    protected static ?string $navigationGroup = 'Portfolio'; // Optional Grouping
    protected static ?string $navigationIcon = 'heroicon-o-briefcase'; // Icon for sidebar

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('company')
                    ->required()
                    ->maxLength(255),

                TextInput::make('role')
                    ->required()
                    ->maxLength(255),

                DatePicker::make('start_date')
                    ->required()
                    ->format('Y-m-d'),

                DatePicker::make('end_date')
                    ->nullable()
                    ->format('Y-m-d'),

                Textarea::make('description')
                    ->maxLength(1000)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('company')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('role')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('start_date')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('end_date')
                    ->date('d M Y')
                    ->sortable()
                    ->label('End Date (if applicable)'),

                TextColumn::make('description')
                    ->limit(50), // Truncate long text
            ])
            ->filters([
                Filter::make('Current Positions')
                    ->query(fn ($query) => $query->whereNull('end_date')),
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
            'index' => Pages\ListExperiences::route('/'),
            'create' => Pages\CreateExperience::route('/create'),
            'edit' => Pages\EditExperience::route('/{record}/edit'),
        ];
    }
}
