<?php

namespace App\Filament\Resources\BrandPartnerships;

use App\Filament\Resources\BrandPartnerships\Pages\CreateBrandPartnership;
use App\Filament\Resources\BrandPartnerships\Pages\EditBrandPartnership;
use App\Filament\Resources\BrandPartnerships\Pages\ListBrandPartnerships;
use App\Filament\Resources\BrandPartnerships\Schemas\BrandPartnershipForm;
use App\Filament\Resources\BrandPartnerships\Tables\BrandPartnershipsTable;
use App\Models\BrandPartnership;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BrandPartnershipResource extends Resource
{
    protected static ?string $model = BrandPartnership::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Brand';

    public static function form(Schema $schema): Schema
    {
        return BrandPartnershipForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BrandPartnershipsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBrandPartnerships::route('/'),
            'create' => CreateBrandPartnership::route('/create'),
            'edit' => EditBrandPartnership::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
