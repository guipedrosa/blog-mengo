<?php

namespace App\Filament\Resources\OrderHistoryResource\Pages;

use App\Filament\Resources\OrderHistoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderHistory extends EditRecord
{
    protected static string $resource = OrderHistoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
