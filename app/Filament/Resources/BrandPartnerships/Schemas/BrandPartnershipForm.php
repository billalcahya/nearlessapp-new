<?php

namespace App\Filament\Resources\BrandPartnerships\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\KeyValue;

class BrandPartnershipForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Kemitraan')
                    ->columnSpanFull()
                    ->description('Detail utama mengenai kerja sama dengan brand.')
                    ->schema([
                        TextInput::make('brand_name')
                            ->label('Nama Brand')
                            ->required()
                            ->maxLength(255),

                        FileUpload::make('logo_path')
                            ->label('Logo Brand')
                            ->image()
                            ->disk('public')
                            ->directory('brand-logos')
                            ->required(),

                        TextInput::make('website_url')
                            ->label('URL Website')
                            ->url()
                            ->maxLength(255),

                        TextInput::make('partnership_period')
                            ->label('Periode Kemitraan')
                            ->placeholder('Contoh: Jan 2026 - Jun 2026 atau Sekarang')
                            ->maxLength(255),

                        TextInput::make('collaboration_type')
                            ->label('Tipe Kolaborasi')
                            ->placeholder('Contoh: Tech Partner, Sponsor, dll')
                            ->maxLength(255),

                        Toggle::make('is_active')
                            ->label('Status Aktif')
                            ->default(true)
                            ->required(),

                        Textarea::make('reason_for_partnership')
                            ->label('Alasan Kerja Sama')
                            ->required()
                            ->columnSpanFull(),

                        Textarea::make('project_outcome')
                            ->label('Hasil / Dampak Proyek')
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Daftar Lokasi Drop Point')
                    ->columnSpanFull()
                    ->description('Kelola semua titik drop point yang dimiliki oleh partner ini.')
                    ->schema([
                        // Menggunakan Repeater untuk relasi hasMany ke tabel drop_points
                        Repeater::make('dropPoints')
                            ->relationship('dropPoints') // Sesuai nama fungsi relasi di model BrandPartnership
                            ->label('Lokasi Drop Point')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama Drop Point')
                                    ->placeholder('Misal: Gudang Utama / Cabang Jakarta')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('coordinates')
                                    ->label('Koordinat Lokasi')
                                    ->placeholder('Latitude, Longitude')
                                    ->maxLength(255),

                                Textarea::make('address')
                                    ->label('Alamat Lengkap')
                                    ->required()
                                    ->columnSpanFull(),
                                    
                                FileUpload::make('image_path')
                                    ->label('Foto Lokasi Drop Point')
                                    ->image()
                                    ->disk('public')
                                    ->directory('drop-points')
                                    ->columnSpanFull(),

                                KeyValue::make('operational_hours')
                                    ->label('Jam Operasional')
                                    ->keyLabel('Hari / Periode')
                                    ->valueLabel('Jam Kerja')
                                    ->keyPlaceholder('Contoh: Mon - Fri')
                                    ->valuePlaceholder('Contoh: 08:00 - 20:00')
                                    ->columnSpanFull(),
                                
                                Toggle::make('is_active')
                                    ->label('Drop Point Aktif')
                                    ->default(true)
                                    ->required(),
                            ])
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}