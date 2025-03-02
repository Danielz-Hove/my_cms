<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServicesSectionResource\Pages;
use App\Models\ServicesSection;
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
use Filament\Forms\Components\FileUpload;

class ServicesSectionResource extends Resource
{
    protected static ?string $model = ServicesSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog'; // Choose an appropriate icon

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
                Section::make('Services Section Content')
                    ->schema([
                        TextInput::make('services_title')
                            ->label('Title')
                            ->maxLength(255)
                            ->nullable(),
                        Textarea::make('services_subtext')
                            ->label('Subtext')
                            ->rows(2)
                            ->nullable(),
                        Repeater::make('service_cards')
                            ->label('Service Cards')
                            ->schema([
                                TextInput::make('card_title')
                                    ->label('Card Title')
                                    ->required()
                                    ->maxLength(255),
                                Textarea::make('card_description')
                                    ->label('Card Description')
                                    ->rows(3)
                                    ->nullable(),
                                TextInput::make('card_button_text')
                                    ->label('Read More Button Text')
                                    ->maxLength(255)
                                    ->default('Read More')
                                    ->nullable(),
                                TextInput::make('card_button_url')
                                    ->label('Read More Button URL')
                                    ->url()
                                    ->nullable(),
                                FileUpload::make('card_image')
                                    ->label('Card Image')
                                    ->image()
                                    ->directory('page-images')
                                    ->nullable(),
                            ])
                            ->columns(2)
                            ->collapsible()
                            ->collapsed()
                            ->reorderable()
                            ->itemLabel(fn(array $state): ?string => $state['card_title'] ?? null),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page_slug')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('services_title')->sortable()->searchable(),
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
            'index' => Pages\ListServicesSections::route('/'),
            'create' => Pages\CreateServicesSection::route('/create'),
            'edit' => Pages\EditServicesSection::route('/{record}/edit'),
        ];
    }
}