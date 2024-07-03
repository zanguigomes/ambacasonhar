<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Acesso';
    protected static ?string $modelLabel = 'Usuários';
    protected static ?string $slug = 'usuarios';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('name')
                ->label('Nome')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('email')
                ->label('Endereço Email')
                ->email()
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('password')
                ->label('Senha')
                ->password()
                ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                ->dehydrated(fn($state) => filled($state))
                ->required(fn (string $context): bool => $context === 'create')
                ->maxLength(255),
            Forms\Components\Select::make('roles')
                ->label('Função')
                ->multiple()
                ->relationship('roles','name', fn(Builder $query) => auth()->user()->hasRole('Administrador') ? null : $query->where('name', '!=', 'Administrador'))
                ->preload(),
            Forms\Components\Toggle::make('active')
                ->required()
                ->label('Ativo'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([

            Tables\Columns\TextColumn::make('name')
                ->label('Nome e Sobrenome')
                ->searchable(),
            Tables\Columns\TextColumn::make('email')
                ->label('Endereço Email')
                ->searchable(),
            Tables\Columns\TextColumn::make('roles.name')
                ->label('Função')
                ->searchable(),
            Tables\Columns\IconColumn::make('active')
                ->boolean(),
            Tables\Columns\TextColumn::make('created_at')
            ->label('Criado em')
            ->dateTime('d/m/Y H:s'),

        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make()->slideOver(),
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
            'index' => Pages\ManageUsers::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return auth()->user()->hasRole('Administrador')
            ? parent::getEloquentQuery()
            : parent::getEloquentQuery()->whereHas('roles',
            fn(Builder $query) => $query->where('name','!=','Administrador')
        );
    }
}
