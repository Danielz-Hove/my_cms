<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use App\Models\TabbedFeature; // Import the TabbedFeature model
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
use Filament\Forms\Components\Group;
use Filament\Forms\Get;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\Str;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Set;
use Illuminate\Support\Facades\Storage;


class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Tabs::make('Tabs')
                ->tabs([
                    Tab::make('Page Details')
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
                    Tab::make('Hero Section')
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
                                        ->nullable(), // Optional icon
                                    Textarea::make('hero_description')
                                        ->label('Brief Description')
                                        ->rows(3),
                                    TextInput::make('hero_button_text')
                                        ->label('Button Text')
                                        ->maxLength(255),
                                    TextInput::make('hero_button_url')
                                        ->label('Button URL')
                                        ->url()
                                        ->nullable(), // Allows empty values
                                    TextInput::make('hero_video_url')
                                        ->label('Video URL')
                                        ->url()
                                        ->nullable(), // Allows empty values
                                    FileUpload::make('hero_background_image')
                                        ->label('Background Image')
                                        ->image()
                                        ->directory('page-images'),
                                    FileUpload::make('hero_foreground_image')
                                        ->label('Foreground Image')
                                        ->image()
                                        ->directory('page-images'),
                                ]),
                        ]),
                    Tab::make('Features Hero Section')
                        ->schema([
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
                        ]),
                    Tab::make('About Us')
                        ->schema([
                            Section::make('About Us Sections')
                                ->schema([
                                    Repeater::make('about_us_sections')
                                        ->label('About Us Sections')
                                        ->schema([
                                            Forms\Components\Select::make('type')
                                                ->options([
                                                    'about_us_main' => 'Main About Us Section',
                                                ])
                                                ->default('about_us_main')
                                                ->required()
                                                ->live(),

                                            Forms\Components\Group::make()
                                                ->schema([
                                                    TextInput::make('about_us_subheading')
                                                        ->label('Subheading')
                                                        ->maxLength(255),
                                                    TextInput::make('about_us_title')
                                                        ->label('Title')
                                                        ->maxLength(255),
                                                    Textarea::make('about_us_description')
                                                        ->label('Description')
                                                        ->rows(3),

                                                    Repeater::make('ceo_founder_sections')
                                                        ->label('Features-About Us')
                                                        ->schema([
                                                            FileUpload::make('ceo_founder_image')
                                                                ->label('image')
                                                                ->image()
                                                                ->directory('page-images'),
                                                            TextInput::make('ceo_founder_heading')
                                                                ->label('Heading'),
                                                            TextInput::make('ceo_founder_paragraph')
                                                                ->label('Paragraph'),
                                                        ])
                                                        ->columns(1)
                                                        ->collapsible()
                                                        ->collapsed()
                                                        ->reorderable()
                                                        ->itemLabel(fn (array $state): ?string => $state['ceo_founder_heading'] ?? null),

                                            Repeater::make('additional_about_us_icons')
                                                ->label('Icon List')
                                                ->schema([
                                                    FileUpload::make('icon')
                                                        ->label('Icon/Image')
                                                        ->image()
                                                        ->directory('page-images'),
                                                    TextInput::make('text')
                                                        ->label('Text'),
                                                ])
                                                ->columns(2)
                                                ->collapsible()
                                                ->collapsed()
                                                ->reorderable()
                                                ->itemLabel(fn (array $state): ?string => $state['text'] ?? null),

                                                    FileUpload::make('about_us_meeting_image')
                                                        ->label('Section Image')
                                                        ->image()
                                                        ->directory('page-images'),
                                                    Group::make()
                                                        ->schema([
                                                            TextInput::make('experience_years')
                                                                ->label('Counter')
                                                                ->numeric(),
                                                            TextInput::make('experience_text')
                                                                ->label('Text')
                                                                ->maxLength(255),
                                                            Textarea::make('experience_description')
                                                                ->label('Additional Text')
                                                                ->rows(2),
                                                        ])
                                                ])
                                                ->visible(fn (Get $get): bool => $get('type') === 'about_us_main'), // Show only when type is main
                                        ])
                                        ->collapsible()
                                        ->collapsed()
                                        ->reorderable()
                                        ->itemLabel(fn (array $state): ?string => $state['about_us_title'] ?? null),
                                ]),
                        ]),
                    Tab::make('Features Tabbed')
                        ->schema([
                            Section::make('Tabbed Features Section')
                                ->schema([
                                    TextInput::make('features_headline')
                                        ->label('Headline')
                                        ->maxLength(255),
                                    Textarea::make('features_subheading')
                                        ->label('Subheading')
                                        ->rows(2),
                                    Repeater::make('tabbedFeatures')
                                        ->label('Tabbed Items')
                                        ->relationship() // Automatically uses the tabbedFeatures relationship on Page
                                        ->schema([
                                            TextInput::make('tab_headline')
                                                ->label('Headline')
                                                ->required()
                                                ->maxLength(255),
                                            Repeater::make('tabList')
                                                ->label('Tab List')
                                                ->relationship() // Automatically uses the tabList relationship on TabbedFeature
                                                ->schema([
                                                    FileUpload::make('tab_list_icon')
                                                        ->label('Features Tab List Icon')
                                                        ->image()
                                                        ->directory('page-images'),
                                                    TextInput::make('tab_list_text')
                                                        ->label('Features Tab List Text')
                                                        ->maxLength(255),
                                                    FileUpload::make('tab_image')
                                                        ->label('Image')
                                                        ->image()
                                                        ->directory('page-images'),
                                                ]),
                                            Repeater::make('featureColumns')
                                                ->label('Feature Columns')
                                                ->relationship() // Uses the featureColumns relationship on TabbedFeature
                                                ->schema([
                                                    FileUpload::make('column_icon')
                                                        ->label('Icon')
                                                        ->image()
                                                        ->directory('page-images'),
                                                    TextInput::make('column_heading')
                                                        ->label('Heading')
                                                        ->maxLength(255),
                                                    Textarea::make('column_paragraph')
                                                        ->label('Paragraph')
                                                        ->rows(2),
                                                ]),
                                        ]),
                                ]),
                        ]),
                    Tab::make('Content')
                        ->schema([
                            Section::make('Content')
                                ->schema([
                                    RichEditor::make('content')
                                        ->label('Page Content')
                                        ->required()
                                        ->columnSpan('full'),
                                ]),
                        ]),
                    Tab::make('Call To Action & Clients')  // New Tab
                        ->schema([
                            Section::make('Call to Action Section (Blue Background)')
                                ->schema([
                                    TextInput::make('cta_headline')
                                        ->label('Headline')
                                        ->maxLength(255),
                                    Textarea::make('cta_description')
                                        ->label('Description')
                                        ->rows(3),
                                    TextInput::make('cta_button_text')
                                        ->label('Call To Action Button Text')
                                        ->maxLength(255),
                                    TextInput::make('cta_button_url')
                                        ->label('Call To Action Button URL')
                                        ->url()
                                        ->nullable(),
                                ]),

                            Section::make('Client Logos Section')
                                ->schema([
                                    Repeater::make('client_logos')
                                        ->label('Client Logos')
                                        ->schema([
                                            FileUpload::make('logo')
                                                ->label('Client Logo')
                                                ->image()
                                                ->directory('page-images'),
                                        ])
                                        ->columns(2)
                                        ->collapsible()
                                        ->collapsed()
                                        ->reorderable(),
                                ]),
                        ]),
                ])
                ->columnSpanFull(),
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