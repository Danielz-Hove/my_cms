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
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\FileUpload; // Import FileUpload
use Illuminate\Support\Str; // Import the Str class for slug generation
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select as FormSelect; //Prevent naming conflict with Tables\Columns\Select

class FeaturesTabbedSectionResource extends Resource
{
    protected static ?string $model = FeaturesTabbedSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-table-cells';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Page Metadata')
                    ->schema([
                        TextInput::make('page_slug')
                            ->label('Page Slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->afterStateUpdated(fn (callable $set, $state) => $set('page_slug', Str::slug($state)))
                            ->reactive(),
                        TextInput::make('page_title')
                            ->label('Page Title')
                            ->required()
                            ->maxLength(255)
                            ->afterStateUpdated(fn (callable $set, $state) => $set('page_slug', Str::slug($state)))
                            ->reactive(),
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

                        Repeater::make('tabs')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Tab Title')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('subtitle') // Added Subtitle
                                    ->label('Tab Subtitle')
                                    ->maxLength(255)
                                    ->nullable(),
                                MarkdownEditor::make('content')
                                    ->label('Tab Content')
                                    ->columnSpanFull(),
                                FileUpload::make('image')
                                    ->label('Tab Image')
                                    ->image() // Optional: only allow images
                                    ->directory('tab-images') // Optional: directory for uploads
                                    ->columnSpanFull(),

                                Repeater::make('icon_list') // Nested Repeater for Icon List
                                    ->label('Icon List')
                                    ->schema([
                                        FormSelect::make('icon')  //Added FormSelect here to prevent the naming conflict
                                            ->label('Icon')
                                            ->options([
                                                'heroicon-o-check-circle' => 'Check Circle',
                                                'heroicon-o-star'         => 'Star',
                                                'heroicon-o-heart'        => 'Heart',
                                                // Add more icon options here
                                            ])
                                            ->searchable(),
                                        TextInput::make('text')
                                            ->label('Text')
                                            ->required()
                                            ->maxLength(255),
                                    ])
                                    ->columns(2) // Adjust columns as needed for icon/text layout
                                    ->addActionLabel('Add Icon'),
                            ])
                            ->columns(1)  // Display fields in a single column within each repeater item
                            ->addActionLabel('Add Tab'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('page_slug')->sortable()->searchable(),
                TextColumn::make('page_title')->sortable()->searchable(),
                TextColumn::make('features_headline')->sortable()->searchable(),
                TextColumn::make('page_status')->sortable(),
                TextColumn::make('page_meta_description')->limit(50),
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