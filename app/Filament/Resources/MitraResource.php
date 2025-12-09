<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MitraResource\Pages;
use App\Models\Mitra;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MitraResource extends Resource
{
    protected static ?string $model = Mitra::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Mitra Kerjasama';
    protected static ?string $navigationGroup = 'Beranda';
    protected static ?string $pluralModelLabel = 'Mitra';
    protected static ?string $modelLabel = 'Mitra';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Mitra')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Mitra')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Select::make('type')
                            ->label('Tipe Mitra')
                            ->options([
                                'pendana'    => 'Mitra Pendana',
                                'juru_bayar' => 'Mitra Juru Bayar',
                            ])
                            ->required(),

                        Forms\Components\FileUpload::make('logo_path')
                            ->label('Logo Mitra')
                            ->directory('mitra-logos')
                            ->image()
                            ->imageEditor()
                            ->maxSize(2048)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('website')
                            ->label('Website / Link')
                            ->url()
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Deskripsi & Status')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(4)
                            ->columnSpan(2),

                        Forms\Components\TextInput::make('sort_order')
                            ->label('Urutan Tampil')
                            ->numeric()
                            ->default(0),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Mitra')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('type')
                    ->label('Tipe')
                    ->colors([
                        'success' => 'pendana',
                        'info'    => 'juru_bayar',
                    ])
                    ->formatStateUsing(fn (string $state) => $state === 'pendana'
                        ? 'Mitra Pendana'
                        : 'Mitra Juru Bayar'
                    ),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Update Terakhir')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->label('Tipe Mitra')
                    ->options([
                        'pendana'    => 'Mitra Pendana',
                        'juru_bayar' => 'Mitra Juru Bayar',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order');
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListMitras::route('/'),
            'create' => Pages\CreateMitra::route('/create'),
            'edit'   => Pages\EditMitra::route('/{record}/edit'),
        ];
    }
}
