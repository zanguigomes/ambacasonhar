<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Filament\Resources\GalleryResource\RelationManagers;
use App\Models\Category;
use App\Models\Gallery;
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

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Conteúdo';
    protected static ?string $navigationLabel = 'Galeria de fotos';
    protected static ?string $modelLabel = 'Galeria de fotos';
    protected static ?string $slug = 'galeria-de-fotos';
    protected static ?int $navigationSort = 7;

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
                    ->label('Título')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->maxLength(255),
                    Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\Select::make('category')
                    ->options(Category::all()->pluck('title', 'title'))
                    ->required()
                    ->native(false)
                    ->label('Categoria')
                    ->preload()
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

                Forms\Components\Textarea::make('head_line')
                    ->label('Descrição')
                    ->required()
                    ->maxLength(16777215)
                    ->columnSpanFull(),


                ])->columnSpan(6),

                Section::make()
                ->schema([
                    Forms\Components\FileUpload::make('thumbnail')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('galleries_covers')
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth('955')
                    ->imageResizeTargetHeight('650')
                    ->label('Imagem de Capa'),

                    Forms\Components\Toggle::make('active')
                    ->required()
                    ->label('Ativo'),

                ])->columnSpan(6),

                Forms\Components\FileUpload::make('images')
                ->label('Lista de Imagens da Galeria')
                ->image()
                ->disk('public')
                ->directory('gallery_images')
                ->preserveFilenames()
                ->multiple()
                ->columnSpanFull(),
        ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                ->label('Capa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                ->label('Título')
                    ->searchable(),
                    Tables\Columns\IconColumn::make('active')
                    ->boolean()
                    ->label('Estado'),

                Tables\Columns\TextColumn::make('created_at')
                ->label('Publica em')
                    ->dateTime('d/m/Y')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                ->before(function (Gallery $gallery){
                    Storage::delete('public/' . $gallery->thumbnail);
                    foreach($gallery->images as $img){
                        Storage::delete('public/' . $img);
                    }
                    //Storage::delete('public/' . $gallery->images);
                }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                    ->before(function (Gallery $gallery){
                        Storage::delete('public/' . $gallery->thumbnail);
                        //Storage::delete('public/' . $gallery->images);
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
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
