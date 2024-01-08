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
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationGroup = 'Data Setting';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $activeNavigationIcon = 'heroicon-s-star';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static int $globalSearchResultsLimit = 3;

    protected static ?string $recordTitleAttribute = 'name';
    public static function getGloballySearchableAttributes(): array
    {
        return ['code', 'name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Code' => $record->code,
        ];
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
                            ->disabled()
                            ->dehydrated()
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
                            ->label('Image (if any)')
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
                ImageColumn::make('image')
                    ->label('Image'),
                TextColumn::make('code')
                    ->label('Product Code')
                    ->sortable()
                    ->searchable(),
                // ->description(fn(Product $record): string => $record->name)
                // ->searchable(['code', 'name']),
                TextColumn::make('name')
                    ->label('Product Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('url')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                ToggleColumn::make('is_visible')
                    ->label('Visible'),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    EditAction::make()->color('warning'),
                    DeleteAction::make()
                ])
                    ->icon('heroicon-m-ellipsis-horizontal')
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
