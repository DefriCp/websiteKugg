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
    protected static ?string $navigationLabel = 'Tentang/Alasan/Struktur';

    public static function form(Form $form): Form
    {
        return $form->schema([

            Forms\Components\Select::make('type')
                ->label('Jenis Data')
                ->options([
                    'about' => 'Tentang Kami',
                    'why'   => 'Kenapa Harus Gilang Gemilang',
                    'management' => 'Struktur Manajemen',
                ])
                ->required()
                ->live(),

            /* =====================
             | TENTANG KAMI
             ===================== */
            Forms\Components\Section::make('Tentang Kami')
                ->schema([

                    Forms\Components\Select::make('key')
                        ->label('Bagian')
                        ->options([
                            'informasi_umum' => 'Informasi Umum',
                            'visi' => 'Visi',
                            'misi' => 'Misi',
                        ])
                        ->required(),

                    Forms\Components\Textarea::make('description')
                        ->label('Isi')
                        ->rows(6)
                        ->required(),

                ])
                ->visible(fn (Get $get) => $get('type') === 'about'),

            /* =====================
             | KENAPA HARUS
             ===================== */
            Forms\Components\Section::make('Kenapa Harus Gilang Gemilang')
                ->schema([

                    Forms\Components\TextInput::make('title')
                        ->label('Judul')
                        ->required(),

                    Forms\Components\Textarea::make('description')
                        ->label('Deskripsi')
                        ->rows(4)
                        ->required(),

                    Forms\Components\FileUpload::make('image')
                        ->label('Gambar')
                        ->image()
                        ->directory('reasons')
                        ->required(),

                    Forms\Components\TextInput::make('sort_order')
                        ->label('Urutan')
                        ->numeric()
                        ->default(0),

                ])
                ->columns(2)
                ->visible(fn (Get $get) => $get('type') === 'why'),



             /* =====================
             | Struktur Manajemen
             ===================== */
            Forms\Components\Section::make('Struktur Manajemen')
                ->schema([

                    Forms\Components\TextInput::make('title')
                        ->label('Jabatan')
                        ->required(),

                    Forms\Components\Textarea::make('description')
                        ->label('Nama Lengkap')
                        ->required(),

                    Forms\Components\FileUpload::make('image')
                        ->image()
                        ->directory('management')
                        ->required(),

                    Forms\Components\TextInput::make('sort_order')
                        ->numeric()
                        ->default(0),

                ])
                ->visible(fn (Get $get) => $get('type') === 'management'),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('type')
                    ->label('Jenis')
                    ->badge()
                    ->formatStateUsing(fn ($state) =>
                        $state === 'about' ? 'Tentang Kami' : 'Kenapa Harus'
                    ),

                Tables\Columns\TextColumn::make('key')
                    ->label('Bagian')
                    ->badge()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y'),
            ])
            ->defaultSort('sort_order')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
