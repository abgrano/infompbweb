<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DailyLocalPriceResource\Pages;
use App\Filament\Resources\DailyLocalPriceResource\RelationManagers;
use App\Models\DailyLocalPrice;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DailyLocalPriceResource extends Resource
{
    protected static ?string $model = DailyLocalPrice::class;

    protected static ?string $navigationGroup = 'Local Information';
    protected static ?string $label = 'Local Pepper Price';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $activeNavigationIcon = 'heroicon-s-star';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('city_id')
                    ->relationship('city', 'name')
                    ->required(),
                Forms\Components\DatePicker::make('date_data')
                    ->required(),
                Forms\Components\TextInput::make('black')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('white')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('city.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_data')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('black')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('white')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListDailyLocalPrices::route('/'),
            'create' => Pages\CreateDailyLocalPrice::route('/create'),
            'edit' => Pages\EditDailyLocalPrice::route('/{record}/edit'),
        ];
    }
}
