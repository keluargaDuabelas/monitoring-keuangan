<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KecamatanResource\Pages;
use App\Filament\Resources\KecamatanResource\RelationManagers;
use App\Models\Kecamatan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KecamatanResource extends Resource
{
    protected static ?string $model = Kecamatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                ->label('Nama kecamatan')
                ->required()
                ->maxLength(255),
                Forms\Components\Select::make('anggaran_id')
                    ->label('Anggaran')
                    ->relationship('anggaran', 'nama') // Mengambil data dari relasi kecamatan
                    ->required(),
                    Forms\Components\Select::make('realisasi_id')
                    ->label('Realiasasi')
                    ->relationship('realisasi', 'nama') // Mengambil data dari relasi kecamatan
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table

                ->columns([
                    TextColumn::make('nama')
                        ->label('Nama Kecamatan'),
                        TextColumn::make('anggaran.nama')
                        ->label('Nama Anggaran'),
                        TextColumn::make('anggaran.anggaran')
                        ->label('Anggaran')

                        ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.'))
                        ,
                        TextColumn::make('realisasi.nama')
                        ->label('Nama Realisasi'),
                        TextColumn::make('realisasi.realisasi')
                        ->label('Realisasi')
                        ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),
                ])
                ->filters([])

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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKecamatans::route('/'),
            'create' => Pages\CreateKecamatan::route('/create'),
            'edit' => Pages\EditKecamatan::route('/{record}/edit'),
        ];
    }
}
