<?php

namespace App\Filament\Resources\BrandPartnerships\Pages;

use App\Filament\Resources\BrandPartnerships\BrandPartnershipResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditBrandPartnership extends EditRecord
{
    protected static string $resource = BrandPartnershipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
