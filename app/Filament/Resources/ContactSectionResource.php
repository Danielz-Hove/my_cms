<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactSectionResource\Pages;
use App\Models\ContactSection;
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
use Filament\Forms\Components\Placeholder; // Import Placeholder

class ContactSectionResource extends Resource
{
    protected static ?string $model = ContactSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope'; // Choose an appropriate icon

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Contact Section Content')
                    ->schema([
                        TextInput::make('contact_title')
                            ->label('Title')
                            ->maxLength(255)
                            ->nullable(),
                        Textarea::make('contact_subtitle')
                            ->label('Subtitle')
                            ->rows(2)
                            ->nullable(),
                        TextInput::make('contact_sidebar_title')
                            ->label('Sidebar Title')
                            ->maxLength(255)
                            ->nullable(),
                        Textarea::make('contact_paragraph')
                            ->label('Paragraph')
                            ->rows(3)
                            ->nullable(),
                        Repeater::make('contact_features')
                            ->label('Contact Features')
                            ->schema([
                                 /* Use Font Awesome Class instead of image upload */
                                TextInput::make('icon')
                                    ->label('Icon (Font Awesome Class)')
                                    ->placeholder('e.g., fa fa-phone')
                                    ->maxLength(255)
                                    ->nullable(),
                                TextInput::make('heading')
                                    ->label('Heading')
                                    ->maxLength(255)
                                    ->nullable(),
                                Textarea::make('description')
                                    ->label('Description')
                                    ->rows(2)
                                    ->nullable(),
                            ])
                            ->columns(3)
                            ->collapsible()
                            ->collapsed()
                            ->reorderable()
                            ->itemLabel(fn(array $state): ?string => $state['heading'] ?? null),
                    ]),
                 Section::make('Help Text')
                    ->description('Enter the Font Awesome class name for the Contact Feature icons. Examples: `fa fa-phone`, `fa fa-envelope`, `fa fa-map-marker`')
                    ->schema([
                        Placeholder::make('font_awesome_link')
                            ->content(fn () => "<a href='https://fontawesome.com/search' target='_blank' class='text-primary-500 hover:underline'>Find Font Awesome Icons Here</a>"),
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page_slug')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('contact_title')->sortable()->searchable(),
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
            'index' => Pages\ListContactSections::route('/'),
            'create' => Pages\CreateContactSection::route('/create'),
            'edit' => Pages\EditContactSection::route('/{record}/edit'),
        ];
    }
}