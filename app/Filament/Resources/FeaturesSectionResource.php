<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeaturesSectionResource\Pages;
use App\Models\FeaturesSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;

class FeaturesSectionResource extends Resource
{
    protected static ?string $model = FeaturesSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-view-columns'; // Choose an appropriate icon

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
                Section::make('Features Section Content')
                    ->schema([
                        TextInput::make('feature_title')
                            ->label('Feature Title')
                            ->maxLength(255),
                        Textarea::make('description')
                            ->label('Description')
                            ->rows(2)
                            ->nullable(),
                        FileUpload::make('icon')
                            ->label('Icon/Image')
                            ->image()
                            ->directory('page-images')
                            ->nullable(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page_slug')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('feature_title')->sortable()->searchable(),
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
            'index' => Pages\ListFeaturesSections::route('/'),
            'create' => Pages\CreateFeaturesSection::route('/create'),
            'edit' => Pages\EditFeaturesSection::route('/{record}/edit'),
        ];
    }
}