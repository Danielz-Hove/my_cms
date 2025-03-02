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
use Filament\Forms\Components\Select;

class HeroSectionResource extends Resource
{
    protected static ?string $model = HeroSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';

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