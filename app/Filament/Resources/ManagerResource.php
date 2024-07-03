<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ManagerResource\Pages;
use App\Filament\Resources\ManagerResource\RelationManagers;
use App\Models\Manager;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class ManagerResource extends Resource
{
    protected static ?string $model = Manager::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Conteúdo';
    protected static ?string $navigationLabel = 'Galeria de Administradores';
    protected static ?string $modelLabel = 'Galeria de Administradores';
    protected static ?string $slug = 'galeria-de-administradores';
    protected static ?int $navigationSort = 8;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form

        ->schema([
            Forms\Components\Grid::make(1)
            ->schema([
                Forms\Components\FileUpload::make('avatar')
                ->image()
                ->imageEditor()
                ->disk('public')
                ->directory('managers')
                ->imageResizeTargetWidth('200')
                ->label('Foto'),
            ]),
            Forms\Components\TextInput::make('name')
            ->required()
            ->maxLength(2048)
            ->live(onBlur: true)
            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
            ->label('Nome'),

        Forms\Components\TextInput::make('slug')
            ->required()
            ->maxLength(2048),
        Forms\Components\Grid::make(1)
        ->schema([
        Forms\Components\RichEditor::make('description')
        ->label('Descrição')
        ]),
        Forms\Components\TextInput::make('function_time')
        ->label('Início / Fim de funções'),

        Forms\Components\DatePicker::make('create_at')
        ->native(false)
        ->label('Publica em'),
        Forms\Components\Toggle::make('active')
            ->required()
            ->label('Ativo'),
        ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Nome'),

                Tables\Columns\TextColumn::make('function_time')
                    ->sortable()
                    ->label('Início/Fim de funções'),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                ->before(function (Manager $manager){
                    Storage::delete('public/' . $manager->avatar);
                }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                    ->before(function (Manager $manager){
                        Storage::delete('public/' . $manager->avatar);
                    }),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageManagers::route('/'),
        ];
    }
}
