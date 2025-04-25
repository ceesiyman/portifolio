<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\UrlColumn;
use Filament\Tables\Filters\Filter;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    

    protected static ?string $navigationGroup = 'Portfolio'; // Optional Grouping

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->required()
                    ->maxLength(1000)
                    ->columnSpanFull(),

                Repeater::make('tech_stack')
                    ->schema([
                        TextInput::make('tech')
                            ->placeholder('Enter a technology (e.g., Laravel, React, MySQL)')
                            ->required(),
                    ])
                    ->collapsible()
                    ->grid(2)
                    ->label('Tech Stack'),

                    FileUpload::make('image')
                    ->image()
                    ->directory('images') // Save inside public/images/
                    ->preserveFilenames() // Keep original filename
                    ->required(),
                

                TextInput::make('github_link')
                    ->url()
                    ->prefixIcon('heroicon-o-link')
                    ->placeholder('https://github.com/user/project'),

                TextInput::make('live_link')
                    ->url()
                    ->prefixIcon('heroicon-o-link')
                    ->placeholder('https://your-live-project.com'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
    ->circular()
    ->getStateUsing(fn ($record) => asset($record->image)), // Convert stored path to full URL


                TextColumn::make('title')
                    ->sortable()
                    ->searchable(),

                BadgeColumn::make('tech_stack')
                    ->label('Tech Stack')
                    ->formatStateUsing(fn ($state) => is_array($state) ? implode(', ', $state) : $state)

                    ->limit(30),

                TextColumn::make('github_link')
                    ->label('GitHub')
                    ->url(fn ($record) => $record->github_link, true), // Opens in a new tab

                TextColumn::make('live_link')
                    ->label('Live Demo')
                    ->url(fn ($record) => $record->live_link, true), // Opens in a new tab

                TextColumn::make('created_at')
                    ->dateTime('d M Y')
                    ->sortable(),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
