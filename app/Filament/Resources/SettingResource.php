<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-vertical';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $modelLabel = 'Configurações';
    protected static ?string $slug = 'configuracoes';
    //protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                ->schema([
                    Forms\Components\Grid::make(2)
                    ->schema([
                    Forms\Components\TextInput::make('app_title')
                        ->label('Nome do projecto')
                        ->required()
                        ->maxLength(255)
                        ->live()
                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('app_slug', Str::slug($state))),
                    Forms\Components\TextInput::make('app_slug')
                        ->label('Slug')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('app_description')
                        ->label('Descrição do projecto')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('app_key_words')
                        ->label('Palavras-chave')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('app_google_id')
                        ->label('ID do Google')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('app_manager')
                        ->label('Responsável pelo projecto')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('app_version')
                        ->label('Versão do site')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\DateTimePicker::make('app_last_update')
                        ->label('Actualização')
                        ->native(false)
                        ->required(),
                    Forms\Components\TextInput::make('app_favicon')
                        ->label('URL do Logotipo')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('app_apple_touch_icon')
                        ->label('URL do Logotipo - verão Mobile')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('app_uri')
                        ->label('URL do site')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('app_email')
                        ->label('Email do projecto')
                        ->email()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('app_address')
                        ->label('Endereço do projecto')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('app_phone_number')
                        ->label('Telefone do projecto')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('app_phone_number_alt')
                        ->label('Telefone Alternativo')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('app_facebook_uri')
                        ->label('Endereço Facebook')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('app_whatsapp_uri')
                        ->label('WhatsApp')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('app_instagram_uri')
                        ->label('Endereço Instagram')
                        ->maxLength(255),
                    Forms\Components\Toggle::make('alerta_aniv')
                        ->required()
                        ->label('Ativar/Desativar alerta festas da cidade'),
                ])
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('app_title')
                    ->label('Título do site')
                    ->searchable(),
                Tables\Columns\TextColumn::make('app_key_words')
                    ->label('Palavras-Chave')
                    ->searchable(),
                Tables\Columns\TextColumn::make('app_last_update')
                    ->dateTime()
                    ->label('Última actualização')
                    ->sortable(),
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
            /* ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]); */
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
            'index' => Pages\ListSettings::route('/'),
            // 'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
