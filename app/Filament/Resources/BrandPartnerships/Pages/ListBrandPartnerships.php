<?php

namespace App\Filament\Resources\BrandPartnerships\Pages;

use App\Filament\Resources\BrandPartnerships\BrandPartnershipResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBrandPartnerships extends ListRecords
{
    protected static string $resource = BrandPartnershipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
