<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialsStatisticsSectionResource\Pages;
use App\Models\TestimonialsStatisticsSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;

class TestimonialsStatisticsSectionResource extends Resource
{
    protected static ?string $model = TestimonialsStatisticsSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right'; // Choose an appropriate icon

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
                Section::make('Testimonials & Statistics Section Content')
                    ->schema([
                        // Add all the form fields for the Testimonials & Statistics Section
                        // Example for Testimonials:
                        TextInput::make('testimonial_title')
                            ->label('Testimonial Title')
                            ->maxLength(255)
                            ->nullable(),
                        Textarea::make('testimonial_paragraph')
                            ->label('Testimonial Paragraph')
                            ->rows(3)
                            ->nullable(),
                        FileUpload::make('testimonial_icon')
                            ->label('Testimonial Icon')
                            ->image()
                            ->directory('page-images')
                            ->nullable(),
                        // Example for Statistics:
                        TextInput::make('statistic_number')
                            ->label('Statistic Number')
                            ->numeric()
                            ->nullable(),
                        TextInput::make('statistic_text')
                            ->label('Statistic Text')
                            ->maxLength(255)
                            ->nullable(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page_slug')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('testimonial_title')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('statistic_number')->sortable(),
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
            'index' => Pages\ListTestimonialsStatisticsSections::route('/'),
            'create' => Pages\CreateTestimonialsStatisticsSection::route('/create'),
            'edit' => Pages\EditTestimonialsStatisticsSection::route('/{record}/edit'),
        ];
    }
}