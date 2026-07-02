<?php

namespace App\Filament\Resources\Promos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;

class PromosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // Menampilkan Banner Promo
                ImageColumn::make('image')
                    ->label('Banner')
                    ->disk('public')
                    ->square()
                    ->size(50),

                // Nama Promo & Slug
                TextColumn::make('name')
                    ->label('Promo Name')
                    ->searchable()
                    ->sortable()
                    ->description(fn ($record) => $record->slug),

                // Tipe Promo dengan warna Badge dinamis
                TextColumn::make('type')
                    ->label('Type')
                    ->badge()
                    ->colors([
                        'primary' => 'bundle',
                        'success' => 'discount_nominal',
                        'warning' => 'discount_percentage',
                        'danger' => 'partnership_bonus',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'bundle' => 'Bundling Paket',
                        'discount_nominal' => 'Diskon (Rp)',
                        'discount_percentage' => 'Diskon (%)',
                        'partnership_bonus' => 'Bonus Kemitraan',
                        default => $state,
                    }),

                // Menampilkan Detail Harga/Bonus tergantung tipe data yang terisi
                TextColumn::make('details')
                    ->label('Value / Bonus')
                    ->state(function ($record) {
                        if ($record->type === 'bundle' && $record->package_price) {
                            return 'Rp ' . number_format($record->package_price, 0, ',', '.');
                        }
                        if ($record->type === 'partnership_bonus') {
                            return $record->bonus_item_name ?? '-';
                        }
                        return '-';
                    }),

                // Batas Minimal Sepatu
                TextColumn::make('min_transaction_items')
                    ->label('Min. Shoes')
                    ->alignCenter()
                    ->sortable()
                    ->formatStateUsing(fn ($state) => "{$state} Pairs"),

                // Status Aktif (Icon Centang / Silang)
                IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->sortable(),

                // Masa Berlaku Promo
                TextColumn::make('duration')
                    ->label('Duration')
                    ->state(function ($record) {
                        if (!$record->start_date && !$record->end_date) return 'Selamanya';
                        
                        $start = $record->start_date ? $record->start_date->format('d M Y') : '...';
                        $end = $record->end_date ? $record->end_date->format('d M Y') : '...';
                        return "{$start} - {$end}";
                    }),
            ])
            ->filters([
                // Filter Berdasarkan Tipe Promo
                SelectFilter::make('type')
                    ->label('Promo Type')
                    ->options([
                        'bundle' => 'Bundling Paket',
                        'discount_nominal' => 'Diskon (Rupiah)',
                        'discount_percentage' => 'Diskon (Persen)',
                        'partnership_bonus' => 'Bonus Kemitraan',
                    ]),

                // Filter Cepat Menampilkan Hanya yang Aktif
            
                    
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}