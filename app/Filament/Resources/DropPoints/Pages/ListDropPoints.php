<?php

namespace App\Filament\Resources\DropPoints\Pages;

use App\Filament\Resources\DropPoints\DropPointResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDropPoints extends ListRecords
{
    protected static string $resource = DropPointResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
