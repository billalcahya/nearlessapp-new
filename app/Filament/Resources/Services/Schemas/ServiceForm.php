<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Checkbox;
use Illuminate\Support\Str;
use Filament\Forms\Components\Repeater;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('General Information')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')
                                ->label('Service Name')
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
                            ->label('Service Description')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),

                Section::make('Additional Information')
                    ->schema([
                        Grid::make(2)->schema([
                            Select::make('category_id')
                                ->label('Category')
                                ->relationship('category', 'name')
                                ->searchable()
                                ->preload()
                                ->required(),

                            TextInput::make('suitability')
                                ->label('Suitability')
                                ->maxLength(255),

                            Select::make('intensity')
                                ->label('Intensity Using')
                                ->options([
                                    'low' => 'Low',
                                    'medium' => 'Medium',
                                    'high' => 'High',
                                ]),

                            TextInput::make('sanitazion')
                                ->label('Sanitazion')
                                ->maxLength(255),

                            TextInput::make('base_price')
                                ->label('Base Price')
                                ->numeric()
                                ->prefix('Rp'),

                            TextInput::make('estimated_duration')
                                ->label('Estimated Duration')
                                ->numeric()
                                ->placeholder('e.g. 3')
                                ->suffix('Days')
                                ->helperText('Waktu rata-rata pengerjaan layanan ini.'),
                        ]),
                    ]),

                Section::make('Media & Visibility')
                    ->columnSpanFull()
                    ->schema([
                        Grid::make(1)->schema([

                            FileUpload::make('image')
                                ->label('Service Image')
                                ->image()
                                ->disk('public')
                                ->directory('services')
                                ->columnSpanFull(),

                            FileUpload::make('images')
                                ->label('Additional Images Before : After')
                                ->image()
                                ->disk('public')
                                ->directory('services')
                                ->multiple()
                                ->maxFiles(15)
                                ->columnSpanFull(),

                            Grid::make(3)->schema([
                                Toggle::make('is_active')
                                    ->label('Active Status')
                                    ->default(true),

                                Toggle::make('is_top_seller')
                                    ->label('Top Seller (Pricelist)')
                                    ->default(false),

                                Checkbox::make('show_on_landing')
                                    ->label('Show on Landing Page')
                                    ->default(true),
                            ]),

                            Repeater::make('whats_included')
                                ->label("What's Included Features")
                                ->schema([
                                    Grid::make(1)
                                        ->schema([
                                            TextInput::make('title')
                                                ->label('Judul Fitur'),


                                            Select::make('icon')
                                                ->label('Pilih Ikon')
                                                ->options([
                                                    'brush' => 'Brush / Scrub',
                                                    'sparkles' => 'Restoration / Clean',
                                                    'waves' => 'Laces / Waves',
                                                    'shield' => 'Sanitization / Shield',
                                                ])

                                        ])
                                        ->columnSpan(1),

                                    Textarea::make('description')
                                        ->label('Deskripsi Singkat')
                                        ->rows(5)

                                        ->columnSpan(1),
                                ])
                                ->columns(2)
                                ->collapsible()
                                ->columnSpanFull(),
                        ]),
                    ]),

                Section::make('Reviews & Feedback')
                    ->columnSpanFull()
                    ->schema([
                        Repeater::make('reviews')
                            ->label("Customer Reviews & Testimonials")
                            ->schema([
                                Grid::make(1)
                                    ->schema([
                                        TextInput::make('name_reviewer')
                                            ->label('Nama Reviewer')
                                            ->placeholder('Contoh: Adi Haryanto'),

                                        Select::make('rating')
                                            ->label('Rating')
                                            ->options([
                                                5 => '5 Bintang',
                                                4 => '4 Bintang',
                                                3 => '3 Bintang',
                                                2 => '2 Bintang',
                                                1 => '1 Bintang',
                                            ])
                                            ->default(5),
                                    ])
                                    ->columnSpan(1),

                                Textarea::make('comment')
                                    ->label('Isi Review / Komentar')
                                    ->rows(5)
                                    ->placeholder('Contoh: Brought my daily Air Force 1s back to life...')
                                    ->columnSpan(1),
                            ])
                            ->columns(2)
                            ->collapsible()
                            ->columnSpanFull()
                            ->addActionLabel('Tambah Review Baru'),
                    ]),

                Section::make('Comparison Service')
                    ->columnSpanFull()
                    ->schema([
                        Grid::make(2)->schema([ // Ubah jadi grid 2 agar sejajar
                            // Select Pertama
                            Select::make('comparison_service_id')
                                ->label('Comparison Service 1')
                                ->relationship(
                                    name: 'comparisonService',
                                    titleAttribute: 'name',
                                    modifyQueryUsing: fn($query, $record) => $query->where('is_active', true)
                                        ->when($record, fn($q) => $q->where('id', '!=', $record->id))
                                )
                                ->searchable()
                                ->preload(),

                            // Select Kedua (Tambahkan ini)
                            Select::make('comparison_service_two_id')
                                ->label('Comparison Service 2')
                                ->relationship(
                                    name: 'comparisonServiceTwo',
                                    titleAttribute: 'name',
                                    modifyQueryUsing: fn($query, $record) => $query->where('is_active', true)
                                        ->when($record, fn($q) => $q->where('id', '!=', $record->id))
                                )
                                ->searchable()
                                ->preload(),
                        ])
                    ]),
            ]);
    }
}
