<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')
                    ->schema([
                        TextInput::make('code')
                            ->label('Code')
                            ->unique(ignoreRecord: true)
                            // ->autocomplete(false)
                            ->required(),
                        TextInput::make('name')->label('Product Name')
                            ->required()
                            ->live()
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                        TextInput::make('slug')
                            ->required()
                            ->readOnly()
                            ->unique(ignoreRecord: true),
                        Textarea::make('description')
                            ->label('Description (if any)')
                            ->columnSpanFull()
                    ])->columnSpan(2),
                Section::make('')
                    ->schema([
                        TextInput::make('url')
                            ->label('Website (if any)')
                            ->url()
                            ->suffixIcon('heroicon-m-globe-alt'),
                        FileUpload::make('image')
                            ->imageEditor()
                            ->image(),
                        Forms\Components\Toggle::make('is_visible')
                            ->label('Is Visible')
                            ->default(true)
                            ->required(),
                    ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image'),
                Tables\Columns\TextColumn::make('code')
                    ->label('Code & Product Title')
                    ->description(fn(Product $record): string => $record->name)
                    ->searchable(['code', 'name']),
                // Tables\Columns\TextColumn::make('name')
                //     ->label('Product Name')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('slug')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('url')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_visible')
                    ->label('Visible'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            // 'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
