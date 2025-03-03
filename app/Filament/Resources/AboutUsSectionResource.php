<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutUsSectionResource\Pages;
use App\Models\AboutUsSection;
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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select as FormsSelect;

class AboutUsSectionResource extends Resource
{
    protected static ?string $model = AboutUsSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('About Us Section Content')
                    ->schema([
                        TextInput::make('about_us_subheading')
                            ->label('Subheading')
                            ->maxLength(255)
                            ->nullable(),
                        TextInput::make('about_us_title')
                            ->label('Title')
                            ->maxLength(255)
                            ->nullable(),
                        RichEditor::make('about_us_description')
                            ->label('Description')
                            ->nullable()
                            ->columnSpanFull(),
                        FileUpload::make('about_us_meeting_image')
                            ->label('Section Image')
                            ->image()
                            ->directory('page-images')
                            ->imagePreviewHeight('200')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->nullable(),
                        TextInput::make('experience_years')
                            ->label('Experience Years')
                            ->numeric()
                            ->nullable(),
                        Textarea::make('experience_description')
                            ->label('Experience Description')
                            ->rows(2)
                            ->nullable(),

                        Repeater::make('about_us_features')
                            ->label('Features')
                            ->schema([
                                TextInput::make('heading')
                                    ->label('Heading')
                                    ->required()
                                    ->maxLength(255),
                                Textarea::make('paragraph')
                                    ->label('Paragraph')
                                    ->rows(2)
                                    ->required(),
                            ])
                            ->collapsible()
                            ->collapsed()
                            ->reorderable(),
                            //->addButtonLabel('Add Feature'),

                        Repeater::make('about_us_iconlist')  // Icon List Repeater
                            ->label('Icon List')
                            ->schema([
                                 FormsSelect::make('icon')
                                    ->label('Icon')
                                    ->options([
                                        'heroicon-o-check-circle' => 'Check Circle',
                                        'heroicon-o-star'        => 'Star',
                                        'heroicon-o-heart'       => 'Heart',
                                        'heroicon-o-thumb-up'   => 'Thumb Up',
                                        // Add more icon options as needed
                                    ])
                                    ->searchable()
                                    ->required(),
                                TextInput::make('text')        // 'text' for clarity
                                    ->label('Text')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->collapsible()
                            ->collapsed()
                            ->reorderable()
                            //->addButtonLabel('Add Icon + Text'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('page_slug')->sortable()->searchable(),
                TextColumn::make('about_us_title')->sortable()->searchable(),
                ImageColumn::make('about_us_meeting_image')->label('Image'),
                TextColumn::make('page_status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'published' => 'success',
                    }),

                TextColumn::make('features_list') // Features List
                    ->label('Features')
                    ->formatStateUsing(function ($record) {
                        if (!$record->about_us_features) {
                            return 'No features added.';
                        }

                        $featuresOutput = '';
                        foreach ($record->about_us_features as $feature) {
                            $heading = $feature['heading'] ?? '';
                            $paragraph = $feature['paragraph'] ?? '';
                            $featuresOutput .= '<b>' . e($heading) . '</b>: ' . e($paragraph) . '<br>';
                        }

                        return  \Illuminate\Support\Str::of($featuresOutput)->toHtmlString();
                    })
                    ->html(),

                TextColumn::make('icon_list')  // Icon List
                    ->label('Icon List')
                    ->formatStateUsing(function ($record) {
                        if (!$record->about_us_iconlist) {
                            return 'No items in the icon list.';
                        }

                        $iconListOutput = '';
                        foreach ($record->about_us_iconlist as $item) {
                            $icon = $item['icon'] ?? '';
                            $text = $item['text'] ?? '';
                            $iconListOutput .= '<i class="' . $icon . '"></i> ' . e($text) . '<br>';
                        }

                        return  \Illuminate\Support\Str::of($iconListOutput)->toHtmlString();
                    })
                    ->html(),
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
            'index' => Pages\ListAboutUsSections::route('/'),
            'create' => Pages\CreateAboutUsSection::route('/create'),
            'edit' => Pages\EditAboutUsSection::route('/{record}/edit'),
        ];
    }

    public static function getTableQuery(): Builder
    {
        return parent::getTableQuery()->orderBy('page_slug', 'asc');
    }
}