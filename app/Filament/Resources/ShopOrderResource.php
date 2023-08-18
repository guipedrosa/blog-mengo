<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShopOrderResource\Pages;
use App\Filament\Resources\ShopOrderResource\RelationManagers;
use App\Models\ShopOrder;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ShopOrderResource extends Resource
{
    protected static ?string $model = ShopOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'E-Commerce';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('product_id')
                    ->relationship('product', 'name')
                    ->required(),
                Forms\Components\Select::make('order_status_id')
                    ->relationship('orderStatus', 'name')
                    ->required(),
                Forms\Components\TextInput::make('qty')
                    ->required(),
                Forms\Components\TextInput::make('subtotal')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('product.name'),
                Tables\Columns\TextColumn::make('orderStatus.name'),
                Tables\Columns\TextColumn::make('qty')->label('Quantity'),
                Tables\Columns\TextColumn::make('subtotal')->money('brl'),
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
            'index' => Pages\ListShopOrders::route('/'),
            'create' => Pages\CreateShopOrder::route('/create'),
            'edit' => Pages\EditShopOrder::route('/{record}/edit'),
        ];
    }    
}
