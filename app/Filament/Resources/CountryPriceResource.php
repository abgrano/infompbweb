<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CountryPriceResource\Pages;
use App\Filament\Resources\CountryPriceResource\RelationManagers;
use App\Models\CountryPrice;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CountryPriceResource extends Resource
{
    protected static ?string $model = CountryPrice::class;

    protected static ?string $navigationGroup = 'International Information';

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
                Forms\Components\Select::make('country_id')
                    ->relationship('country', 'name')
                    ->required(),
                Forms\Components\Toggle::make('status')
                    ->required(),
                Forms\Components\DatePicker::make('date_data')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('country.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('date_data')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('black')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('white')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListCountryPrices::route('/'),
            'create' => Pages\CreateCountryPrice::route('/create'),
            'edit' => Pages\EditCountryPrice::route('/{record}/edit'),
        ];
    }
}
