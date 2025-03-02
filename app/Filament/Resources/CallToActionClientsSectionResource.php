<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CallToActionClientsSectionResource\Pages;
use App\Models\CallToActionClientsSection;
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
use Filament\Forms\Components\Repeater;

class CallToActionClientsSectionResource extends Resource
{
    protected static ?string $model = CallToActionClientsSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone'; // Choose an appropriate icon

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Call to Action Section')
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page_slug')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('cta_headline')->sortable()->searchable(),
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
            'index' => Pages\ListCallToActionClientsSections::route('/'),
            'create' => Pages\CreateCallToActionClientsSection::route('/create'),
            'edit' => Pages\EditCallToActionClientsSection::route('/{record}/edit'),
        ];
    }
}