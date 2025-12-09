<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon  = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Beranda';
    protected static ?string $navigationLabel = 'Produk';
    protected static ?string $modelLabel      = 'Produk';
    protected static ?string $pluralModelLabel = 'Produk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Produk')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Produk')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(2),

                        Forms\Components\Textarea::make('short_description')
                            ->label('Deskripsi Singkat')
                            ->rows(3)
                            ->maxLength(500)
                            ->helperText('Ditampilkan di kartu produk (beranda & halaman produk).')
                            ->columnSpan(2),

                        Forms\Components\FileUpload::make('image')
                            ->label('Gambar Produk')
                            ->image()
                            ->directory('products')
                            ->imageEditor()
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('16:9')
                            ->columnSpan(1),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true)
                            ->columnSpan(1),
                    ]),

                Forms\Components\Section::make('Deskripsi Lengkap')
                    ->description('Konten detail produk, seperti penjelasan kredit & persyaratan usia (mirip isi berita).')
                    ->schema([
                        Forms\Components\RichEditor::make('description')
                            ->label('Deskripsi Lengkap')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'strike',
                                'bulletList',
                                'orderedList',
                                'blockquote',
                                'link',
                                'h2',
                                'h3',
                                'undo',
                                'redo',
                            ])
                            ->columnSpanFull()
                            ->fileAttachmentsDirectory('products/attachments'),
                    ])
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->square(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Produk')
                    ->searchable()
                    ->wrap()
                    ->limit(40),

                Tables\Columns\TextColumn::make('short_description')
                    ->label('Deskripsi Singkat')
                    ->limit(60)
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Aktif'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d-m-Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif')
                    ->trueLabel('Aktif')
                    ->falseLabel('Nonaktif'),
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
            'index'  => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit'   => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
