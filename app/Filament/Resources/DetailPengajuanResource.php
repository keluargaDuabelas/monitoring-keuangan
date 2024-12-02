<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DetailPengajuanResource\Pages;
use App\Filament\Resources\DetailPengajuanResource\RelationManagers;
use App\Models\DetailPengajuan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DetailPengajuanResource extends Resource
{
    protected static ?string $model = DetailPengajuan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('rekening.kode')
                ->label('Kode Rekening'),
                TextColumn::make('pengajuan.kegiatan')
                ->label('Nama kegiatan'),
                TextColumn::make('pengajuan.sub_kegiatan')
                ->label('Nama Sub Kegiatan'),
                TextColumn::make('uraian')
                ->label('Uraian'),
                TextColumn::make('volume')
                    ->label('Koefisien / Volume')
                    ->formatStateUsing(fn ($state) => number_format($state, 0, ',', '.'))
                    ->alignCenter(),

                TextColumn::make('satuan')
                    ->label('Satuan'),

                TextColumn::make('harga')
                    ->label('Harga')
                    ->formatStateUsing(fn ($state) => number_format($state, 0, ',', '.'))
                    ->alignRight(),

                TextColumn::make('ppn')
                    ->label('PPN %')
                    
                    ->alignRight(),

                TextColumn::make('jumlah')
                    ->label('Jumlah')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.'))
                    ->alignRight(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListDetailPengajuans::route('/'),
            'create' => Pages\CreateDetailPengajuan::route('/create'),
            'edit' => Pages\EditDetailPengajuan::route('/{record}/edit'),
        ];
    }
}
