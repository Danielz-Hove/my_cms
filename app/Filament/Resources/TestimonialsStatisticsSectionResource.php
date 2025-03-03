<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialsStatisticsSectionResource\Pages;
use App\Models\TestimonialsStatisticsSection;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class TestimonialsStatisticsSectionResource extends Resource
{
    protected static ?string $model = TestimonialsStatisticsSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    //protected static ?string $navigationGroup = 'Content'; // Optional: Group in the navigation

    protected static ?string $navigationLabel = 'Testimonials & Stats'; // Optional: Custom label

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Testimonials & Statistics Section Content')
                    ->schema([
                        TextInput::make('title')
                            ->label('Section Title')
                            ->maxLength(255)
                            ->required(),

                        Textarea::make('subtext')
                            ->label('Section Subtext')
                            ->rows(2)
                            ->nullable(),

                        Repeater::make('testimonials')
                            ->label('Testimonials')
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Testimonial Image')
                                    ->image()
                                    ->directory('testimonial-images')
                                    ->imageEditor()
                                    ->nullable(),

                                TextInput::make('testimonial_title')
                                    ->label('Testimonial Title')
                                    ->maxLength(255)
                                    ->required(),

                                Select::make('star_rating')  // Use the imported Rating Component
                                    ->label('Star Rating')
                                    ->options([
                                        '1' => '1 Star',
                                        '2' => '2 Stars',
                                        '3' => '3 Stars',
                                        '4' => '4 Stars',
                                        '5' => '5 Stars',
                                    ])
                                    ->default('5')
                                    ->required(),

                                Textarea::make('paragraph')
                                    ->label('Testimonial Paragraph')
                                    ->rows(3)
                                    ->required(),
                            ])
                            ->columns(2)
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['testimonial_title'] ?? null)
                            ->reorderable()
                            ->cloneable()
                            ->deletable()
                            ->addable(),
                    ]),


                Section::make('Statistics')
                    ->schema([
                        Repeater::make('statistics')
                            ->schema([
                                TextInput::make('statistic_number')
                                    ->label('Statistic Number')
                                    ->numeric()
                                    ->required()
                                    ->minValue(0)
                                    ->maxValue(999999),  // Example range
                                TextInput::make('statistic_text')
                                    ->label('Statistic Text')
                                    ->maxLength(255)
                                    ->required(),
                            ])
                            ->columns(2)
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['statistic_text'] ?? null),

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('page_slug')->sortable()->searchable(),
                TextColumn::make('page_title')->sortable()->searchable(),

                // Example displaying first testimonial's author
                TextColumn::make('testimonials.0.testimonial_title')
                    ->label('First Testimonial Title')
                    ->sortable()
                    ->searchable(),
                 ImageColumn::make('testimonials.0.image')->label('First Testimonial Image'),
                // Example displaying first statistic's number
                TextColumn::make('statistics.0.statistic_number')
                    ->label('First Statistic')
                    ->sortable(),

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