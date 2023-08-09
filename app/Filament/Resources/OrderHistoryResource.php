<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderHistoryResource\Pages;
use App\Filament\Resources\OrderHistoryResource\RelationManagers;
use App\Models\OrderHistory;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderHistoryResource extends Resource
{
    protected static ?string $model = OrderHistory::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'E-Commerce';

    protected static ?string $navigationLabel = 'Order History';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('order_id')
                    ->required(),
                Forms\Components\TextInput::make('order_status')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('comments')
                    ->required()
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_id'),
                Tables\Columns\TextColumn::make('order_status'),
                Tables\Columns\TextColumn::make('comments'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
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
            'index' => Pages\ListOrderHistories::route('/'),
            'create' => Pages\CreateOrderHistory::route('/create'),
            'edit' => Pages\EditOrderHistory::route('/{record}/edit'),
        ];
    }    
}
