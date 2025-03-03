<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroSectionResource\Pages;
use App\Models\HeroSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;

class HeroSectionResource extends Resource
{
    protected static ?string $model = HeroSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Hero Section Content')
                    ->schema([
                        TextInput::make('hero_title')
                            ->label('Main Title')
                            ->maxLength(255),
                        TextInput::make('hero_subtitle')
                            ->label('Subheading Text')
                            ->maxLength(255),
                        FileUpload::make('hero_subtitle_icon')
                            ->label('Subheading Icon')
                            ->image()
                            ->directory('page-images')
                            ->nullable(),
                        Textarea::make('hero_description')
                            ->label('Brief Description')
                            ->rows(3)
                            ->nullable(),
                        TextInput::make('hero_button_text')
                            ->label('Button Text')
                            ->maxLength(255)
                            ->nullable(),
                        TextInput::make('hero_button_url')
                            ->label('Button URL')
                            ->url()
                            ->nullable(),
                        TextInput::make('hero_video_url')
                            ->label('Video URL')
                            ->url()
                            ->nullable(),
                        FileUpload::make('hero_background_image')
                            ->label('Background Image')
                            ->image()
                            ->directory('page-images')
                            ->nullable(),
                        FileUpload::make('hero_foreground_image')
                            ->label('Foreground Image')
                            ->image()
                            ->directory('page-images')
                            ->nullable(),
                    ]),
                Section::make('Hero Section Features')
                    ->schema([
                        Repeater::make('hero_features')
                            ->label('Features')
                            ->schema([
                                FileUpload::make('icon')
                                    ->label('Icon')
                                    ->image()
                                    ->directory('feature-icons')
                                    ->nullable(),
                                TextInput::make('heading')
                                    ->label('Heading')
                                    ->maxLength(255),
                                Textarea::make('paragraph')
                                    ->label('Paragraph')
                                    ->rows(2),
                            ])
                            ->collapsible()
                            ->collapsed()
                            ->defaultItems(0) //Set the default number of items
                            //->addButtonLabel('Add Feature')
                            ->itemLabel(fn (array $state): ?string => $state['heading'] ?? null), //Display heading as the item label

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page_slug')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('hero_title')->sortable()->searchable(),
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
            'index' => Pages\ListHeroSections::route('/'),
            'create' => Pages\CreateHeroSection::route('/create'),
            'edit' => Pages\EditHeroSection::route('/{record}/edit'),
        ];
    }
}