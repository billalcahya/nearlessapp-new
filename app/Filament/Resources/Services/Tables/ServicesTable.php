<?php

namespace App\Filament\Resources\Services\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\DeleteAction;

class ServicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                //

                TextColumn::make('name')
                    ->label('Service Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('estimated_duration')
                    ->label('Estimated Duration')
                    ->placeholder('Tidak ada estimasi durasi'),

                TextColumn::make('category.name')
                    ->badge()
                    ->color(fn(string $state): string => match (strtolower($state)) {
                        'standard kids' => 'info',
                        'standard' => 'warning',
                        'premium' => 'gray',
                        'older treatment' => 'primary',
                        default => 'gray',
                    }),

                TextColumn::make('base_price')
                    ->label('Base Price')
                    ->money('IDR')
                    ->placeholder('Tidak ada harga satuan'),

                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
