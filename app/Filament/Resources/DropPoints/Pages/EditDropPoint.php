<?php

namespace App\Filament\Resources\DropPoints\Pages;

use App\Filament\Resources\DropPoints\DropPointResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditDropPoint extends EditRecord
{
    protected static string $resource = DropPointResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
