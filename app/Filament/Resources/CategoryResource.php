<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Set;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationGroup = 'Conteúdo';
    protected static ?string $modelLabel = 'Categoria';
    protected static ?string $slug = 'categorias';
    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                ->required()
                ->maxLength(2048)
                ->live(onBlur: true)
                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                ->label('Título'),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(2048),
                Forms\Components\Grid::make(1)
                ->schema([
                Forms\Components\RichEditor::make('description')
                ->label('Descrição')
                ]),

                Forms\Components\Toggle::make('active')
                    ->required()
                    ->label('Ativo'),

                Forms\Components\DatePicker::make('published_at')
                ->required()
                ->native(false)
                ->label('Publica em'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                ->searchable()
                ->label('Título'),
            Tables\Columns\IconColumn::make('active')
                ->boolean()
                ->label('Estado'),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime('d/m/Y')
                ->label('Criado em'),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime('d/m/Y')
                ->label('Actualizado em'),
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCategories::route('/'),
        ];
    }
}
