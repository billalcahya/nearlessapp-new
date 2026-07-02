<?php

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                Section::make('Frequently Asked Questions (FAQ)')
                    ->columnSpanFull()
                    ->schema([
                        Select::make('service_id')
                            ->label('Tautkan ke Layanan (Opsional)')
                            ->relationship('service', 'name')
                            ->searchable()
                            ->preload()
                            ->helperText('Kosongkan jika ini adalah Pertanyaan Umum (General FAQ).'),

                        TextInput::make('question')
                            ->label('Pertanyaan (Question)')
                            ->placeholder('Contoh: Apakah bisa bayar menggunakan QRIS?')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('answer')
                            ->label('Jawaban (Answer)')
                            ->placeholder('Contoh: Ya, kami menerima pembayaran via QRIS, GoPay, dan Transfer Bank.')
                            ->rows(4)
                            ->required(),
                        Toggle::make('is_active')
                            ->label('Active Status')
                            ->default(true),
                    ]),
            ]);
    }
}
