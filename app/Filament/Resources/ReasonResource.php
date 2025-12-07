<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReasonResource\Pages;
use App\Models\Reason;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ReasonResource extends Resource
{
    protected static ?string $model = Reason::class;

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';
    protected static ?string $navigationGroup = 'Beranda';
    protected static ?string $navigationLabel = 'Alasan (Kenapa Harus)';

    public static function form(Form $form): Form
{
    return $form->schema([
        Forms\Components\Select::make('type')
            ->label('Jenis Data')
            ->options([
                'about' => 'Tentang Kami',
                'why'   => 'Kenapa harus Gilang Gemilang',
            ])
            ->default('why')
            ->required()
            ->live(), // supaya form bereaksi ketika jenis data diubah

        Forms\Components\TextInput::make('title')
            ->label('Judul')
            ->maxLength(255)
            // wajib diisi hanya jika jenis data = "Kenapa Harus"
            ->required(fn (Get $get) => $get('type') === 'why')
            // sembunyikan field kalau jenis data = "Tentang Kami"
            ->hidden(fn (Get $get) => $get('type') === 'about'),

        Forms\Components\Textarea::make('description')
            ->label('Deskripsi')
            ->rows(3),

        Forms\Components\FileUpload::make('image')
            ->label('Gambar')
            ->image()
            ->directory('reasons')
            ->required(fn (Get $get) => $get('type') === 'why')
            ->hidden(fn (Get $get) => $get('type') === 'about'),

        Forms\Components\TextInput::make('sort_order')
            ->label('Urutan')
            ->numeric()
            ->default(0)
            ->hidden(fn (Get $get) => $get('type') === 'about'),
    ])->columns(2);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->label('Jenis')
                    ->badge()
                    ->formatStateUsing(fn ($state) => $state === 'about' ? 'Tentang Kami' : 'Kenapa Harus'),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d-m-Y H:i'),
            ])
            ->defaultSort('sort_order')
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
            'index'  => Pages\ListReasons::route('/'),
            'create' => Pages\CreateReason::route('/create'),
            'edit'   => Pages\EditReason::route('/{record}/edit'),
        ];
    }
}
