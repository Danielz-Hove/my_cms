<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\ImageColumn; // Import ImageColumn
use Illuminate\Support\Str;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Page Details')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) =>
                                $operation === 'create' ? $set('slug', Str::slug($state)) : null
                            ),
                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->disabled()
                            ->dehydrated()
                            ->unique(Page::class, 'slug', ignoreRecord: true),
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                            ])
                            ->default('draft')
                            ->required(),
                        Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->rows(2)
                            ->maxLength(160),

                        TextInput::make('meta_keywords')
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
                            ->nullable(), // Optional icon
                        Textarea::make('hero_description')
                            ->label('Brief Description')
                            ->rows(3),
                        TextInput::make('hero_button_text')
                            ->label('Button Text')
                            ->maxLength(255),
                        TextInput::make('hero_button_url')
                            ->label('Button URL')
                            ->url(),
                        TextInput::make('hero_video_url')
                            ->label('Video URL')
                            ->url(),
                        FileUpload::make('hero_background_image')
                            ->label('Background Image')
                            ->image()
                            ->directory('page-images'),
                        FileUpload::make('hero_foreground_image')
                            ->label('Foreground Image')
                            ->image()
                            ->directory('page-images'),
                    ]),
                Section::make('Features Hero Section')
                    ->schema([
                        Repeater::make('features')
                            ->label('Features')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Feature Title')
                                    ->required()
                                    ->maxLength(255),
                                Textarea::make('description')
                                    ->label('Description')
                                    ->rows(2),
                                FileUpload::make('icon')
                                    ->label('Icon/Image')
                                    ->image()
                                    ->directory('page-images'),
                            ])
                            ->columns(2)
                            ->collapsible()
                            ->collapsed()
                            ->reorderable()
                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? null),
                    ]),
                Section::make('Content')
                    ->schema([
                        RichEditor::make('content')
                            ->label('Page Content')
                            ->required()
                            ->columnSpan('full'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('slug')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'published' => 'success',
                    })
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}