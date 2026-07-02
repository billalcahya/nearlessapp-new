<?php

namespace App\Filament\Resources\Promos\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DatePicker;
use Illuminate\Support\Str;

class PromoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Main Promo Details')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')
                                ->label('Promo Name')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                ->afterStateUpdated(
                                    fn(string $operation, $state, callable $set) =>
                                    $operation === 'create' ? $set('slug', Str::slug($state)) : null
                                ),

                            TextInput::make('slug')
                                ->label('Slug')
                                ->required()
                                ->unique(ignoreRecord: true)
                                ->disabled()
                                ->dehydrated()
                                ->maxLength(255),
                        ]),

                        Textarea::make('description')
                            ->label('Promo Description')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),

                Section::make('Promo Configuration & Logic')
                    ->schema([
                        Grid::make(2)->schema([
                            Select::make('type')
                                ->label('Promo Type')
                                ->required()
                                ->live() 
                                ->options([
                                    'bundle' => 'Bundling Paket (Kuantitas)',
                                    'discount_nominal' => 'Potongan Harga (Rupiah)',
                                    'discount_percentage' => 'Potongan Harga (Persen)',
                                    'partnership_bonus' => 'Bonus Kemitraan (Free Item/Hadiah)',
                                ])
                                ->default('bundle'),

                            TextInput::make('min_transaction_items')
                                ->label('Minimum Shoes (Pairs)')
                                ->numeric()
                                ->default(1)
                                ->helperText('Minimal sepatu yang dicuci untuk mengaktifkan promo ini.'),

                            TextInput::make('package_price')
                                ->label('Special Package Price')
                                ->numeric()
                                ->prefix('Rp')
                                ->visible(fn (callable $get) => $get('type') === 'bundle')
                                ->required(fn (callable $get) => $get('type') === 'bundle'),

                            TextInput::make('bonus_item_name')
                                ->label('Bonus Gift / Item Name')
                                ->placeholder('e.g. Free Voucher Makan Burjo AA')
                                ->maxLength(255)
                                ->visible(fn (callable $get) => $get('type') === 'partnership_bonus')
                                ->required(fn (callable $get) => $get('type') === 'partnership_bonus'),
                        ]),
                    ]),

                Section::make('Media & Availability Duration')
                    ->columnSpanFull()
                    ->schema([
                        FileUpload::make('image')
                            ->label('Promo Banner Image')
                            ->image()
                            ->disk('public')
                            ->directory('promos')
                            ->columnSpanFull(),

                        Grid::make(3)->schema([
                            DatePicker::make('start_date')
                                ->label('Start Date')
                                ->placeholder('Mulai Berlaku'),

                            DatePicker::make('end_date')
                                ->label('End Date')
                                ->placeholder('Masa Kedaluwarsa'),

                            Toggle::make('is_active')
                                ->label('Active Status')
                                ->default(true)
                                ->inline(false),
                        ]),
                    ]),
            ]);
    }
}