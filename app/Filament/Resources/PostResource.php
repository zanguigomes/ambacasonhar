<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\RestoreAction;
use Illuminate\Support\Facades\Storage;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Conteúdo';
    protected static ?string $navigationLabel = 'Notícias';
    protected static ?string $modelLabel = 'Notícia';
    protected static ?string $slug = 'noticia';
    protected static ?int $navigationSort = 4;

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
                ->required()
                ->maxLength(16777215)
                ->label('Resumo'),
            Forms\Components\RichEditor::make('content')
                ->required()
                ->fileAttachmentsDisk('public')
                ->fileAttachmentsDirectory('attachments')
                ->fileAttachmentsVisibility('private')
                ->label('Conteúdo'),

            Forms\Components\Toggle::make('active')
                ->required()
                ->label('Ativo'),

        ])->columnSpan(8),

        Section::make()
        ->schema([
            Forms\Components\FileUpload::make('thumb')
            ->image()
            ->imageEditor()
            ->disk('public')
            ->directory('blog')
            ->imageResizeMode('cover')
            ->imageCropAspectRatio('16:9')
            ->imageResizeTargetWidth('955')
            ->imageResizeTargetHeight('650')
            ->label('Imagem de Capa'),

            Forms\Components\TextInput::make('thumb_legend')
                ->maxLength(255)
                ->label('Legenda da Capa'),

            Forms\Components\Select::make('category_id')
                ->relationship('category', 'title')
                ->required()
                ->label('Categoria')
                ->searchable()
                ->preload()
                ->createOptionForm([
                    //Creating a new Category from Post page
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

            Forms\Components\TextInput::make('source')
                ->maxLength(255)
                ->label('Fonte da notícia'),

            Forms\Components\TextInput::make('source_uri')
                ->label('Link da fonte')
                ->maxLength(255),

            Forms\Components\DatePicker::make('published_at')
                ->required()
                ->native(false)
                ->label('Publica em'),
            Forms\Components\Select::make('user_id')
                ->relationship('user', 'name')
                ->native(false)
                ->label('Por'),

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
                ->limit(60)
                ->label('Título')
                ->searchable(),
                Tables\Columns\ToggleColumn::make('active')
                ->label('Activo'),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime('d/m/Y')
                    ->label('Pulicado em'),
                Tables\Columns\TextColumn::make('user.name')
                ->label('Por'),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                ->before(function (Post $post){
                    Storage::delete('public/' . $post->thumb);
                }),
                // ->successRedirectUrl(route('posts.list')),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                    ->before(function (Post $post){
                        Storage::delete('public/' . $post->thumb);
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
