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

class AboutUsSectionResource extends Resource
{
    protected static ?string $model = AboutUsSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle'; // Choose an appropriate icon

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
                        Textarea::make('about_us_description')
                            ->label('Description')
                            ->rows(3)
                            ->nullable(),
                        FileUpload::make('about_us_meeting_image')
                            ->label('Section Image')
                            ->image()
                            ->directory('page-images')
                            ->nullable(),
                        TextInput::make('experience_years')
                            ->label('Experience Years')
                            ->numeric()
                            ->nullable(),
                        TextInput::make('experience_text')
                            ->label('Experience Text')
                            ->maxLength(255)
                            ->nullable(),
                        Textarea::make('experience_description')
                            ->label('Experience Description')
                            ->rows(2)
                            ->nullable(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page_slug')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('about_us_title')->sortable()->searchable(),
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
            'index' => Pages\ListAboutUsSections::route('/'),
            'create' => Pages\CreateAboutUsSection::route('/create'),
            'edit' => Pages\EditAboutUsSection::route('/{record}/edit'),
        ];
    }
}