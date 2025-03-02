<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqResource\Pages;
use App\Models\Faq;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('FAQ Section')
                    ->schema([
                        TextInput::make('faq_section_heading')
                            ->label('Section Heading')
                            ->maxLength(255)
                            ->nullable(),
                        Textarea::make('faq_short_description')
                            ->label('Short Description')
                            ->rows(2)
                            ->nullable(),
                        Forms\Components\Repeater::make('faq_accordion')
                            ->label('FAQ Accordion')
                            ->schema([
                                TextInput::make('question_title')
                                    ->label('Question Title')
                                    ->required()
                                    ->maxLength(255),
                                Textarea::make('answer_text')
                                    ->label('Answer Text')
                                    ->rows(3)
                                    ->required(),
                            ])
                            ->collapsible()
                            ->collapsed()
                            ->reorderable()
                            ->itemLabel(fn(array $state): ?string => $state['question_title'] ?? null),
                    ]),

                Section::make('Call To Action Section - FAQ')
                    ->schema([
                        Textarea::make('faq_cta_short_description')
                            ->label('Short Description')
                            ->rows(2)
                            ->nullable(),
                        TextInput::make('faq_cta_button_text')
                            ->label('Call To Action Button Text')
                            ->maxLength(255)
                            ->nullable(),
                        TextInput::make('faq_cta_button_url')
                            ->label('Call To Action Button URL')
                            ->url()
                            ->nullable(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question_title')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('faq_section_heading')->sortable()->searchable(),
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
            'index' => Pages\ListFaqs::route('/'),
            'create' => Pages\CreateFaq::route('/create'),
            'edit' => Pages\EditFaq::route('/{record}/edit'),
        ];
    }
}