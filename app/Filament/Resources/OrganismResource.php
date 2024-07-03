<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrganismResource\Pages;
use App\Filament\Resources\OrganismResource\RelationManagers;
use App\Models\Category;
use App\Models\Organism;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class OrganismResource extends Resource
{
    protected static ?string $model = Organism::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationGroup = 'Conteúdo';
    protected static ?string $navigationLabel = 'Órgãos e Serviços';
    protected static ?string $modelLabel = 'Órgãos e serviços';
    protected static ?string $slug = 'orgaos-e-servicos';
    protected static ?int $navigationSort = 2;
    protected static bool $hasTitleCaseModelLabel = false;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
            ->schema([
                Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                        ->label('Nome do Organismo'),

                Forms\Components\TextInput::make('slug')
                        ->required()
                        ->maxLength(255),
                Forms\Components\Grid::make(2)

                ->schema([
                    Forms\Components\Select::make('type')
                        ->options([
                            'Administração' => 'Administração',
                            'Secretaria'    => 'Secretaria',
                            'Instituição'   => 'Instituição',
                            'Delegação'     => 'Delegação',
                            'Direcção'      => 'Direcção',
                            'Gabinete'      => 'Gabinete',
                            'Serviço'      => 'Serviço',
                        ])
                        ->default('Serviço')
                        ->required()
                        ->label('Tipo')
                        ->native(false),

                    Forms\Components\Select::make('category')
                        ->options(Category::all()->pluck('title', 'title'))
                        ->required()
                        ->label('Categoria')
                        ->searchable()
                        ->createOptionForm([
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
                        ]),
                ]),


                Forms\Components\Textarea::make('head_line')
                ->label('Resumo')
                    ->maxLength(16777215)
                    ->label('Resumo'),
                Forms\Components\RichEditor::make('content')
                ->label('Conteúdo')
                    ->required()
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('attachments')
                    ->fileAttachmentsVisibility('private')
                    ->label('Conteúdo'),
                Forms\Components\Grid::make(2)
                    ->schema([
                Forms\Components\TextInput::make('location')
                ->label('Endereço')
                    ->maxLength(255),

                Forms\Components\TextInput::make('time_table')
                ->label('Horário')
                    ->maxLength(255),
                ]),

            ])->columnSpan(8),

            Section::make()
                ->schema([
                    Forms\Components\TextInput::make('manager')
                    ->label('Gestor')
                    ->maxLength(255),
                    Forms\Components\FileUpload::make('avatar')
                    ->label('Foto do Gestor')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('managers')
                    ->imageResizeMode('cover')
                    ->imageResizeTargetWidth('200'),

                Forms\Components\TextInput::make('phone')
                ->label('Telefone da instiuição')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                ->label('Email da instiuição')
                    ->email()
                    ->maxLength(255),

                Forms\Components\Toggle::make('active')
                    ->required()
                    ->default(1),
            ])->columnSpan(4)

        ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')
                    ->square()
                    ->disk('public')
                    ->label('Responsável'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Órgão')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipo'),
                Tables\Columns\TextColumn::make('category')
                    ->label('Categoria'),
                Tables\Columns\IconColumn::make('active')
                    ->boolean()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                ->before(function (Organism $organism){
                    Storage::delete('public/' . $organism->avatar);
                }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                    ->before(function (Organism $organism){
                        Storage::delete('public/' . $organism->avatar);
                    }),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListOrganisms::route('/'),
            'create' => Pages\CreateOrganism::route('/create'),
            'edit' => Pages\EditOrganism::route('/{record}/edit'),
        ];
    }
}
