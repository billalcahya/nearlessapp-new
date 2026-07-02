<?php

namespace App\Filament\Resources\DropPoints\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;

class DropPointForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('brand_partnership_id')
                    ->relationship('brandPartnership', 'brand_name')
                    ->label('Brand Partner (Opsional)')
                    ->nullable(),
                TextInput::make('name')
                    ->required(),
                Textarea::make('address')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image_path')
                    ->label('Foto Lokasi Drop Point')
                    ->image() 
                    ->disk('public') 
                    ->directory('drop-points') 
                    ->maxSize(2048) 
                    ->columnSpanFull(),
                KeyValue::make('operational_hours')
                    ->label('Jam Operasional')
                    ->keyLabel('Hari / Periode')
                    ->valueLabel('Jam Kerja')
                    ->keyPlaceholder('Contoh: Mon - Fri')
                    ->valuePlaceholder('Contoh: 08:00 - 20:00')
                    ->columnSpanFull(),
                TextInput::make('coordinates'),
                Toggle::make('is_active')
                    ->required()
                    ->default(true),
            ]);
    }
}
