<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ValidasiResource\Pages;
use App\Filament\Resources\ValidasiResource\RelationManagers;
use App\Models\Pengajuan;
use App\Models\Validasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ValidasiResource extends Resource
{
    protected static ?string $model = Pengajuan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getPluralModelLabel(): string
    {
        return 'Validasi'; // Nama plural yang akan muncul di daftar
    }

    public static function getModelLabel(): string
    {
        return 'Validasi'; // Nama singular yang akan muncul di form atau detail
    }

    public static function getNavigationGroup(): ?string
{
    return 'Validasi';
}

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kegiatan')
                ->label('Nama Kegiatan')
                ->required()
                ->disabled()
                ->maxLength(255),

            Forms\Components\TextInput::make('sub_kegiatan')
                ->label('Sub Kegiatan')
                ->required()
                ->disabled()
                ->maxLength(255),
                Forms\Components\Select::make('kecamatan_id')
                ->label('kecamatan')
                ->relationship('kecamatan', 'nama') // Mengambil data dari relasi kecamatan
                ->required(),
              

            Forms\Components\Repeater::make('detail_pengajuans')
                ->relationship('detailPengajuans')
                ->label('Detail Pengajuan')
                ->schema([
                    Forms\Components\Select::make('rekening_id')
                        ->label('Kode Rekening')
                        ->relationship('rekening', 'nama') // Mengambil data dari relasi kecamatan
                        ->required()
                        ->columnSpan(2),
                    Forms\Components\TextInput::make('uraian')
                        ->label('Uraian')
                        ->required()
                        ->columnSpan(2),
                    Forms\Components\Select::make('satuan')
                    ->options([
                        'Buah' => 'Buah',
                        'Rim' => 'Rim',
                        'Meter' => 'Meter',
                        'Lembar' => 'Lembar',
                        'Kotak' => 'Kotak',
                        'Buku' => 'Buku',
                    ]),
                    Forms\Components\TextInput::make('harga')
                ->label('Harga Satuan')
                ->numeric()
                ->required()
                ->reactive()
                ,
                    Forms\Components\TextInput::make('volume')
                ->label('Volume')
                ->numeric()
                ->required()
                ->reactive()
                ->default(0)

                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                    $volume = (float) ($get('volume') ?? 0);
                    $harga = (float) ($get('harga') ?? 0);
                $jumlah = round($volume * $harga);

                    $set('jumlah', $jumlah);

                }),
                Forms\Components\TextInput::make('ppn')
                ->label('PPN (%)')
                ->numeric()
                ->default(0) // Default PPN is 11%
                ->reactive()

                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                    $volume = (float) ($get('volume') ?? 0);
                    $harga = (float) ($get('harga') ?? 0);
                    $ppn = (float) ($state ?? 0) / 100;

                  $kali = $volume * $harga;

                  $ppnAmount = $kali * $ppn;

                  $jumlah = round($kali + $ppnAmount);

                    $set('jumlah', $jumlah);

                }),

            Forms\Components\TextInput::make('jumlah')
                ->label('Jumlah')
                ->readonly() // Use readonly to prevent editing
                ->default(0),
            ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kegiatan')
                    ->label('Nama Kegiatan'),
                    TextColumn::make('sub_kegiatan')
                    ->label('Nama Sub Kategori'),
                  
                    TextColumn::make('totalJumlah')
            ->label('Total Jumlah')
            ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.'))
            ,
            TextColumn::make('status_berkas')
            ->badge()
            ->color(fn (string $state): string => match ($state) {
                'pengajuan' => 'gray',
                'verifikasi' => 'warning',
                'validasi' => 'success',
                'ditolak' => 'danger',
            }),
            ])
            ->filters([
                //
            ])
            ->actions([
                 Tables\Actions\EditAction::make() // Menggunakan ShowAction
                ->label('Lihat Detail')
                ->color('success') // Ubah label sesuai kebutuhan
                ->icon('heroicon-o-eye'), // Ikon mata
                Tables\Actions\Action::make('Validasi')
                ->action(function (Pengajuan $record) {
                    $record->update(['status_berkas' => 'validasi']);
                })
                ->requiresConfirmation()
                ->color('success')
                ->disabled(fn (Pengajuan $record) => $record->status_berkas !== 'verifikasi'), // Disable jika bukan pengajuan
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
            'index' => Pages\ListValidasis::route('/'),
            'create' => Pages\CreateValidasi::route('/create'),
            'edit' => Pages\EditValidasi::route('/{record}/edit'),
        ];
    }
}
