<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeaturesTabbedSectionResource\Pages;
use App\Models\FeaturesTabbedSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;

class FeaturesTabbedSectionResource extends Resource
{
    protected static ?string $model = FeaturesTabbedSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-table-cells'; // Choose an appropriate icon

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Page Metadata')
                    ->schema([
                        TextInput::make('page_slug')
                            ->label('Page Slug')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('page_title')
                            ->label('Page Title')
                            ->required()
                            ->maxLength(255),
                        Select::make('page_status')
                            ->label('Page Status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                            ])
                            ->default('draft')
                            ->required(),
                        Textarea::make('page_meta_description')
                            ->label('Meta Description')
                            ->rows(2)
                            ->maxLength(160),
                        TextInput::make('page_meta_keywords')
                            ->label('Meta Keywords')
                            ->maxLength(255),
                    ]),
                Section::make('Features Tabbed Section Content')
                    ->schema([
                        TextInput::make('features_headline')
                            ->label('Headline')
                            ->maxLength(255)
                            ->nullable(),
                        Textarea::make('features_subheading')
                            ->label('Subheading')
                            ->rows(2)
                            ->nullable(),
                        // Add all the form fields for the Tabbed Features Section
                        // For Example:
                        TextInput::make('tab_1_title')
                            ->label('Tab 1 Title')
                            ->maxLength(255)
                            ->nullable(),
                        Textarea::make('tab_1_content')
                            ->label('Tab 1 Content')
                            ->rows(3)
                            ->nullable(),
                        TextInput::make('tab_2_title')
                            ->label('Tab 2 Title')
                            ->maxLength(255)
                            ->nullable(),
                        Textarea::make('tab_2_content')
                            ->label('Tab 2 Content')
                            ->rows(3)
                            ->nullable(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page_slug')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('features_headline')->sortable()->searchable(),
                // Add other relevant columns
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFeaturesTabbedSections::route('/'),
            'create' => Pages\CreateFeaturesTabbedSection::route('/create'),
            'edit' => Pages\EditFeaturesTabbedSection::route('/{record}/edit'),
        ];
    }
}