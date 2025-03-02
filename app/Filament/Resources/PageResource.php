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
use Filament\Forms\Components\Group;
use Illuminate\Support\Str;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Set;
use Filament\Forms\Get;
use Filament\Tables\Columns\ImageColumn;

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
                                    ->afterStateUpdated(fn(string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
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
                                            ->rows(3)
                                            ->nullable(),
                                        TextInput::make('hero_button_text')
                                            ->label('Button Text')
                                            ->maxLength(255)
                                            ->nullable(),
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
                                            ->directory('page-images')
                                            ->nullable(),
                                        FileUpload::make('hero_foreground_image')
                                            ->label('Foreground Image')
                                            ->image()
                                            ->directory('page-images')
                                            ->nullable(),
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
                                            ])
                                            ->columns(2)
                                            ->collapsible()
                                            ->collapsed()
                                            ->reorderable()
                                            ->itemLabel(fn(array $state): ?string => $state['title'] ?? null),
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
                                                            ->maxLength(255)
                                                            ->nullable(),
                                                        TextInput::make('about_us_title')
                                                            ->label('Title')
                                                            ->maxLength(255)
                                                            ->nullable(),
                                                        Textarea::make('about_us_description')
                                                            ->label('Description')
                                                            ->rows(3)
                                                            ->nullable(),

                                                        Repeater::make('ceo_founder_sections')
                                                            ->label('Features-About Us')
                                                            ->schema([
                                                                FileUpload::make('ceo_founder_image')
                                                                    ->label('image')
                                                                    ->image()
                                                                    ->directory('page-images')
                                                                    ->nullable(),
                                                                TextInput::make('ceo_founder_heading')
                                                                    ->label('Heading')
                                                                    ->nullable(),
                                                                TextInput::make('ceo_founder_paragraph')
                                                                    ->label('Paragraph')
                                                                    ->nullable(),
                                                            ])
                                                            ->columns(1)
                                                            ->collapsible()
                                                            ->collapsed()
                                                            ->reorderable()
                                                            ->itemLabel(fn(array $state): ?string => $state['ceo_founder_heading'] ?? null),

                                                        Repeater::make('additional_about_us_icons')
                                                            ->label('Icon List')
                                                            ->schema([
                                                                FileUpload::make('icon')
                                                                    ->label('Icon/Image')
                                                                    ->image()
                                                                    ->directory('page-images')
                                                                    ->nullable(),
                                                                TextInput::make('text')
                                                                    ->label('Text')
                                                                    ->nullable(),
                                                            ])
                                                            ->columns(2)
                                                            ->collapsible()
                                                            ->collapsed()
                                                            ->reorderable()
                                                            ->itemLabel(fn(array $state): ?string => $state['text'] ?? null),

                                                        FileUpload::make('about_us_meeting_image')
                                                            ->label('Section Image')
                                                            ->image()
                                                            ->directory('page-images')
                                                            ->nullable(),
                                                        Group::make()
                                                            ->schema([
                                                                TextInput::make('experience_years')
                                                                    ->label('Counter')
                                                                    ->numeric()
                                                                    ->nullable(),
                                                                TextInput::make('experience_text')
                                                                    ->label('Text')
                                                                    ->maxLength(255)
                                                                    ->nullable(),
                                                                Textarea::make('experience_description')
                                                                    ->label('Additional Text')
                                                                    ->rows(2)
                                                                    ->nullable(),
                                                            ])
                                                    ])
                                                    ->visible(fn(Get $get): bool => $get('type') === 'about_us_main'), // Show only when type is main
                                            ])
                                            ->collapsible()
                                            ->collapsed()
                                            ->reorderable()
                                            ->itemLabel(fn(array $state): ?string => $state['about_us_title'] ?? null),
                                    ]),
                            ]),
                        Tab::make('Features Tabbed')
                            ->schema([
                                Section::make('Tabbed Features Section')
                                    ->schema([
                                        TextInput::make('features_headline')
                                            ->label('Headline')
                                            ->maxLength(255)
                                            ->nullable(),
                                        Textarea::make('features_subheading')
                                            ->label('Subheading')
                                            ->rows(2)
                                            ->nullable(),
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
                                                            ->directory('page-images')
                                                            ->nullable(),
                                                        TextInput::make('tab_list_text')
                                                            ->label('Features Tab List Text')
                                                            ->maxLength(255)
                                                            ->nullable(),
                                                        FileUpload::make('tab_image')
                                                            ->label('Image')
                                                            ->image()
                                                            ->directory('page-images')
                                                            ->nullable(),
                                                    ]),
                                                Repeater::make('featureColumns')
                                                    ->label('Feature Columns')
                                                    ->relationship() // Uses the featureColumns relationship on TabbedFeature
                                                    ->schema([
                                                        FileUpload::make('column_icon')
                                                            ->label('Icon')
                                                            ->image()
                                                            ->directory('page-images')
                                                            ->nullable(),
                                                        TextInput::make('column_heading')
                                                            ->label('Heading')
                                                            ->maxLength(255)
                                                            ->nullable(),
                                                        Textarea::make('column_paragraph')
                                                            ->label('Paragraph')
                                                            ->rows(2)
                                                            ->nullable(),
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
                                            ->maxLength(255)
                                            ->nullable(),
                                        Textarea::make('cta_description')
                                            ->label('Description')
                                            ->rows(3)
                                            ->nullable(),
                                        TextInput::make('cta_button_text')
                                            ->label('Call To Action Button Text')
                                            ->maxLength(255)
                                            ->nullable(),
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
                                                    ->directory('page-images')
                                                    ->nullable(),
                                            ])
                                            ->columns(2)
                                            ->collapsible()
                                            ->collapsed()
                                            ->reorderable(),
                                    ]),
                            ]),
                        Tab::make('Testimonials & Statistics')
                            ->schema([
                                Section::make('Testimonials Section')
                                    ->schema([
                                        Repeater::make('testimonials')
                                            ->label('Testimonials')
                                            ->relationship() // Use relationship()
                                            ->schema([
                                                FileUpload::make('testimonial_icon')
                                                    ->label('Icon')
                                                    ->image()
                                                    ->directory('page-images')
                                                    ->nullable(),
                                                TextInput::make('testimonial_title')
                                                    ->label('Title')
                                                    ->maxLength(255)
                                                    ->nullable(),
                                                TextInput::make('testimonial_subtitle')
                                                    ->label('Subtitle')
                                                    ->maxLength(255)
                                                    ->nullable(),
                                                Forms\Components\Select::make('testimonial_stars') // Use Select component
                                                    ->label('Stars (1-5)')
                                                    ->options([
                                                        1 => '1 Star',
                                                        2 => '2 Stars',
                                                        3 => '3 Stars',
                                                        4 => '4 Stars',
                                                        5 => '5 Stars',
                                                    ])
                                                    ->default(5)
                                                    ->nullable(),
                                                Textarea::make('testimonial_paragraph')
                                                    ->label('Paragraph')
                                                    ->rows(3)
                                                    ->nullable(),
                                            ])
                                            ->columns(2)
                                            ->collapsible()
                                            ->collapsed()
                                            ->reorderable()
                                            ->itemLabel(fn(array $state): ?string => $state['testimonial_title'] ?? null),
                                    ]),
                                Section::make('Statistics Section')
                                    ->schema([
                                        Repeater::make('statistics')
                                            ->label('Statistics')
                                            ->relationship() // Use relationship()
                                            ->schema([
                                                TextInput::make('statistic_number')
                                                    ->label('Number')
                                                    ->numeric()
                                                    ->nullable(),
                                                TextInput::make('statistic_text')
                                                    ->label('Text')
                                                    ->maxLength(255)
                                                    ->nullable(),
                                            ])
                                            ->columns(2)
                                            ->collapsible()
                                            ->collapsed()
                                            ->reorderable()
                                            ->itemLabel(fn(array $state): ?string => $state['statistic_text'] ?? null),
                                    ]),
                            ]),
                        Tab::make('Services')
                            ->schema([
                                Section::make('Services Section')
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
                            ]),
                        Tab::make('Pricing')
                            ->schema([
                                Section::make('Pricing Section')
                                    ->schema([
                                        TextInput::make('pricing_title')
                                            ->label('Title')
                                            ->maxLength(255)
                                            ->nullable(),
                                        Textarea::make('pricing_subtext')
                                            ->label('Subtext')
                                            ->rows(2)
                                            ->nullable(),
                                        Repeater::make('pricing_plans')
                                            ->label('Pricing Plans')
                                            ->schema([
                                                TextInput::make('plan_heading')
                                                    ->label('Plan Heading')
                                                    ->required()
                                                    ->maxLength(255),
                                                TextInput::make('plan_amount')
                                                    ->label('Amount')
                                                    ->numeric()
                                                    ->required(),
                                                Textarea::make('plan_paragraph')
                                                    ->label('Paragraph')
                                                    ->rows(2)
                                                    ->nullable(),
                                                Repeater::make('plan_features')
                                                    ->label('Feature List')
                                                    ->schema([
                                                        FileUpload::make('feature_icon')
                                                            ->label('Feature Icon')
                                                            ->image()
                                                            ->directory('page-images')
                                                            ->nullable(),
                                                        TextInput::make('feature_text')
                                                            ->label('Feature Text')
                                                            ->maxLength(255)
                                                            ->nullable(),
                                                    ])
                                                    ->columns(2)
                                                    ->collapsible()
                                                    ->collapsed()
                                                    ->reorderable()
                                                    ->itemLabel(fn(array $state): ?string => $state['feature_text'] ?? null),
                                                TextInput::make('plan_button_text')
                                                    ->label('Buy Now Button Text')
                                                    ->maxLength(255)
                                                    ->default('Buy Now')
                                                    ->nullable(),
                                                TextInput::make('plan_button_url')
                                                    ->label('Buy Now Button URL')
                                                    ->url()
                                                    ->nullable(),
                                            ])
                                            ->collapsible()
                                            ->collapsed()
                                            ->reorderable()
                                            ->itemLabel(fn(array $state): ?string => $state['plan_heading'] ?? null),
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
                    ->color(fn(string $state): string => match ($state) {
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
