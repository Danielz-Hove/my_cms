<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WebsiteSettingsResource\Pages;
use App\Models\WebsiteSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;  // Import TextColumn

class WebsiteSettingsResource extends Resource
{
    protected static ?string $model = WebsiteSettings::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationLabel = 'Website Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Navbar Settings')
                    ->schema([
                        TextInput::make('navbar_logo_text')
                            ->label('Logo Text (if no image)')
                            ->maxLength(255)
                            ->nullable(),
                        FileUpload::make('navbar_logo_image')
                            ->label('Logo Image')
                            ->image()
                            ->directory('website-settings')
                            ->nullable(),
                        Repeater::make('navbar_links')
                            ->label('Navigation Links')
                            ->schema([
                                TextInput::make('text')
                                    ->label('Link Text')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('link')
                                    ->label('Link URL')
                                    ->url()
                                    ->required(),
                            ])
                            ->columns(2)
                            ->collapsible()
                            ->collapsed()
                            ->reorderable()
                            ->itemLabel(fn(array $state): ?string => $state['text'] ?? null),
                        TextInput::make('navbar_button_text')
                            ->label('Get Started Button Text')
                            ->maxLength(255)
                            ->nullable(),
                    ]),
                Section::make('Footer Settings')
                    ->schema([
                        TextInput::make('footer_logo_text')
                            ->label('Logo Text (if no image)')
                            ->maxLength(255)
                            ->nullable(),
                        FileUpload::make('footer_logo_image')
                            ->label('Logo Image')
                            ->image()
                            ->directory('website-settings')
                            ->nullable(),
                        Textarea::make('footer_address')
                            ->label('Address Text')
                            ->rows(3)
                            ->nullable(),
                        TextInput::make('footer_phone')
                            ->label('Phone Number')
                            ->tel()
                            ->nullable(),
                        TextInput::make('footer_email')
                            ->label('Email Address')
                            ->email()
                            ->nullable(),
                        Repeater::make('footer_social_icons')
                            ->label('Social Icons')
                            ->schema([
                                TextInput::make('text')
                                    ->label('Icon Class Name (e.g., fab fa-facebook)')
                                    ->required()
                                    ->maxLength(255), // Use Font Awesome or similar
                                TextInput::make('url')
                                    ->label('URL')
                                    ->url()
                                    ->required(),
                            ])
                            ->columns(2)
                            ->collapsible()
                            ->collapsed()
                            ->reorderable()
                            ->itemLabel(fn(array $state): ?string => $state['text'] ?? null),
                        TextInput::make('footer_copyright')
                            ->label('Copyright Information')
                            ->maxLength(255)
                            ->nullable(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Add columns to display in the table (e.g., logo text, etc.)
                TextColumn::make('navbar_logo_text')->label('Navbar Logo Text'), // Example column
            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                \Filament\Tables\Actions\BulkActionGroup::make([
                    \Filament\Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListWebsiteSettings::route('/'),
            'create' => Pages\CreateWebsiteSettings::route('/create'),
            'edit' => Pages\EditWebsiteSettings::route('/{record}/edit'),
        ];
    }
}