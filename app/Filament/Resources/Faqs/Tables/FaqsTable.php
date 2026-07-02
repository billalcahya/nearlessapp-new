<?php

namespace App\Filament\Resources\Faqs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class FaqsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                //
                 TextColumn::make('service.name')
                    ->label('Service ID')
                    ->searchable()
                    ->sortable()
                    ->default('FAQ Umum'),
                TextColumn::make('question')
                    ->label('Question')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('answer')
                    ->label('Answer')
                    ->searchable()
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
            ->filters([
                //
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
