<?php

namespace App\Filament\Resources\DropPoints;

use App\Filament\Resources\DropPoints\Pages\CreateDropPoint;
use App\Filament\Resources\DropPoints\Pages\EditDropPoint;
use App\Filament\Resources\DropPoints\Pages\ListDropPoints;
use App\Filament\Resources\DropPoints\Schemas\DropPointForm;
use App\Filament\Resources\DropPoints\Tables\DropPointsTable;
use App\Models\DropPoint;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DropPointResource extends Resource
{
    protected static ?string $model = DropPoint::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'DropPoint';

    public static function form(Schema $schema): Schema
    {
        return DropPointForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DropPointsTable::configure($table);
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
            'index' => ListDropPoints::route('/'),
            'create' => CreateDropPoint::route('/create'),
            'edit' => EditDropPoint::route('/{record}/edit'),
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
