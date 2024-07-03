<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
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

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Conteúdo';
    protected static ?string $navigationLabel = 'Páginas';
    protected static ?string $modelLabel = 'Página';
    protected static ?string $slug = 'paginas';
    protected static ?int $navigationSort = 3;

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


            ])->columnSpan(8),

            Section::make()
            ->schema([
                Forms\Components\TextInput::make('key')
                        ->required()
                        ->maxLength(255)
                        ->label('Chave (não editar este campo!)')
                        ->hintIcon('heroicon-m-question-mark-circle'),
                Forms\Components\DatePicker::make('published_at')
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
                /* Tables\Columns\TextColumn::make('key')
                ->label('Chave'), */
                Tables\Columns\TextColumn::make('title')
                ->searchable()
                ->limit(60)
                ->label('Título'),

                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime('d/m/Y')
                    ->label('Pulicado em'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d/m/Y')
                    ->label('Modificado em'),
                    Tables\Columns\ToggleColumn::make('active')

                ->label('Activo'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
