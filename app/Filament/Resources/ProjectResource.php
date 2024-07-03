<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Category;
use App\Models\Project;
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

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Conteúdo';
    protected static ?string $navigationLabel = 'Projectos';
    protected static ?string $modelLabel = 'Projecto';
    protected static ?string $slug = 'projecto';
    protected static ?int $navigationSort = 5;

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

                Forms\Components\Grid::make(2)
                ->schema([

                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                        ->label('Título'),
                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->maxLength(255),
                ]),

                Forms\Components\Textarea::make('head_line')
                    ->maxLength(16777215)
                    ->label('Resumo'),
                Forms\Components\RichEditor::make('content')
                    ->required()
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('attachments')
                    ->fileAttachmentsVisibility('private')
                    ->label('Conteúdo'),


                Forms\Components\Grid::make(2)
                    ->schema([
                Forms\Components\Select::make('area')
                    ->label('Categoria')
                    ->options(Category::all()->pluck('title', 'title'))
                    ->searchable(),

                Forms\Components\Select::make('status')
                        ->options([
                            'Em curso' => 'Em curso',
                            'Concluído' => 'Concluído',
                            'Cancelado' => 'Cancelado',
                        ])
                        ->label('Estado')
                        ->native(false),
                ]),

            ])->columnSpan(8),

            Section::make()
                ->schema([
                    Forms\Components\FileUpload::make('thumb')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('projects')
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth('955')
                    ->imageResizeTargetHeight('650')
                    ->label('Imagem de Capa'),


                Forms\Components\TextInput::make('coordination')
                        ->maxLength(255)
                        ->label('Coordenação'),
                Forms\Components\DatePicker::make('date_start')
                ->label('Data Início')
                ->native(false),
                Forms\Components\DatePicker::make('date_end')
                ->label('Data Fim')
                ->native(false),

                Forms\Components\DatePicker::make('created_at')
                    ->required()
                    ->native(false)
                    ->label('Publica em'),

                Forms\Components\Toggle::make('active')
                    ->required()
                    ->label('Ativo'),
            ])->columnSpan(4)

        ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumb')
                    ->width(100)
                    ->disk('public')
                    ->label('Capa'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->searchable(),
                Tables\Columns\TextColumn::make('area')
                    ->label('Área')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_start')
                    ->label('Data de início')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Estado actual')
                    ->searchable(),
                Tables\Columns\TextColumn::make('active')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                ->before(function (Project $project){
                    Storage::delete('public/' . $project->thumb);
                }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                    ->before(function (Project $project){
                        Storage::delete('public/' . $project->thumb);
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
