<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Beranda';
    protected static ?string $navigationLabel = 'Galeri Foto';

    public static function form(Form $form): Form
    {
    return $form->schema([
        Forms\Components\TextInput::make('title')
            ->label('Judul')
            ->maxLength(255),

        Forms\Components\FileUpload::make('image')
            ->label('Gambar')
            ->image()
            ->directory('galleries')
            ->required(),

        Forms\Components\DatePicker::make('published_at')
            ->label('Tanggal Publikasi')
            ->required()
            ->default(now())
            ->native(false), // pakai datepicker Filament
    ])->columns(2);
    }

   public static function table(Table $table): Table
    {
    return $table
        ->columns([
            Tables\Columns\ImageColumn::make('image')
                ->label('Gambar')
                ->square(),

            Tables\Columns\TextColumn::make('title')
                ->label('Judul')
                ->searchable(),

            Tables\Columns\TextColumn::make('published_at')
                ->label('Tgl Publish')
                ->date('d-m-Y')
                ->sortable(),
        ])
        ->defaultSort('published_at', 'desc')
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit'   => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
