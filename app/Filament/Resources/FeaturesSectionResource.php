<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeaturesSectionResource\Pages;
use App\Models\FeaturesSection; // Ensure this class exists in the specified namespace
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
use Filament\Forms\Components\Repeater; // Import Repeater Component


class FeaturesSectionResource extends Resource
{
    protected static ?string $model = FeaturesSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-view-columns'; // Choose an appropriate icon

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Features Section Content')
                    ->schema([
                        Repeater::make('features') // Changed name to 'features' (plural)
                            ->label('Features') // Label for the Repeater
                            ->schema([
                                FileUpload::make('icon')
                                    ->label('Icon')
                                    ->image()
                                    ->directory('feature-icons')
                                    ->nullable(),
                                TextInput::make('heading')
                                    ->label('Heading')
                                    ->maxLength(255)
                                    ->required(), // Add validation as needed
                                Textarea::make('text')
                                    ->label('Text')
                                    ->rows(2)
                                    ->nullable(),
                            ])
                            ->columns(3) // Adjust the number of columns as desired
                            ->collapsible() // Optional: Make each repeater item collapsible
                            ->collapsed(true) // Optional: Make the repeater items collapsed by default
                            ->reorderable()    // Optional: Allow reordering of items
                            ->defaultItems(1),  // Optional:  Start with one item
                            //->minItems(1)    // Optional: Minimum number of items allowed

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page_slug')->sortable()->searchable(),
               // Tables\Columns\TextColumn::make('feature_title')->sortable()->searchable(), // Removed this - no longer directly on the FeaturesSection model
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