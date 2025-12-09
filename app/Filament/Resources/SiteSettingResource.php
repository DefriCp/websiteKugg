<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSettingResource\Pages;
use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SiteSettingResource extends Resource
{
    protected static ?string $model = SiteSetting::class;

    protected static ?string $navigationIcon  = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Pengaturan Situs';
    protected static ?string $navigationGroup = 'Beranda';

    public static function form(Form $form): Form
    {
        return $form->schema([
            // IDENTITAS
            Forms\Components\Section::make('Identitas Situs')
                ->schema([
                    Forms\Components\TextInput::make('site_name')
                        ->label('Nama Situs')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('tagline')
                        ->label('Tagline')
                        ->maxLength(255),
                ])
                ->columns(2),

            // TAMPILAN & HERO
            Forms\Components\Section::make('Tampilan & Hero')
                ->schema([
                    Forms\Components\FileUpload::make('logo')
                        ->label('Logo Situs')
                        ->image()
                        ->directory('logo'),

                    Forms\Components\FileUpload::make('hero_background')
                        ->label('Gambar Hero 1')
                        ->image()
                        ->directory('hero'),

                    Forms\Components\FileUpload::make('hero_background_2')
                        ->label('Gambar Hero 2')
                        ->image()
                        ->directory('hero'),

                    Forms\Components\FileUpload::make('hero_background_3')
                        ->label('Gambar Hero 3')
                        ->image()
                        ->directory('hero'),
                ])
                ->columns(2),

            // KONTAK
            Forms\Components\Section::make('Informasi Kontak')
                ->schema([
                    Forms\Components\Textarea::make('address')
                        ->label('Alamat')
                        ->rows(3),

                    Forms\Components\TextInput::make('phone')
                        ->label('Telepon Kantor')
                        ->maxLength(50),

                    Forms\Components\TextInput::make('whatsapp')
                        ->label('Nomor WhatsApp (6288...)')
                        ->maxLength(50),

                    Forms\Components\TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->maxLength(191),
                ])
                ->columns(2),

            // SOSMED
            Forms\Components\Section::make('Sosial Media')
                ->schema([
                    Forms\Components\TextInput::make('instagram_url')
                        ->label('Link Instagram')
                        ->placeholder('https://instagram.com/...'),

                    Forms\Components\TextInput::make('facebook_url')
                        ->label('Link Facebook')
                        ->placeholder('https://facebook.com/...'),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('site_name')
                    ->label('Nama Situs')
                    ->searchable(),

                Tables\Columns\TextColumn::make('tagline')
                    ->label('Tagline')
                    ->limit(40),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Telepon')
                    ->limit(20),

                Tables\Columns\TextColumn::make('whatsapp')
                    ->label('WhatsApp')
                    ->limit(20),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diubah')
                    ->dateTime('d-m-Y H:i'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListSiteSettings::route('/'),
            'create' => Pages\CreateSiteSetting::route('/create'),
            'edit'   => Pages\EditSiteSetting::route('/{record}/edit'),
        ];
    }
}
