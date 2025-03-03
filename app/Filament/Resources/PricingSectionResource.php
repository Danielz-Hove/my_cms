<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PricingSectionResource\Pages;
use App\Models\PricingSection;
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

class PricingSectionResource extends Resource
{
    protected static ?string $model = PricingSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar'; // Choose an appropriate icon

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Pricing Section Content')
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page_slug')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('pricing_title')->sortable()->searchable(),
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
            'index' => Pages\ListPricingSections::route('/'),
            'create' => Pages\CreatePricingSection::route('/create'),
            'edit' => Pages\EditPricingSection::route('/{record}/edit'),
        ];
    }
}