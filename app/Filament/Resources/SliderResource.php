<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Filament\Resources\SliderResource\RelationManagers;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Forms\Components\Section;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Conteúdo';
    protected static ?string $modelLabel = 'Slider';
    protected static ?string $slug = 'sliders';
    protected static ?int $navigationSort = 9;

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
            Forms\Components\FileUpload::make('cover')
            ->image()
            ->imageEditor()
            ->disk('public')
            ->directory('sliders')
            ->imageResizeMode('contain')
            ->imageResizeTargetWidth('910')
            ->label('Imagem de Capa'),

            Forms\Components\Grid::make()
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


            Forms\Components\RichEditor::make('description')
                ->required()
                ->maxLength(16777215)
                ->label('Descrição'),

            Forms\Components\Grid::make()
                ->schema([
                    Forms\Components\TextInput::make('link')
                        ->required()
                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                        ->label('Link'),

                        Forms\Components\DatePicker::make('published_at')
                        ->required()
                        ->native(false)
                        ->label('Publica em'),
                ]),


            Forms\Components\Toggle::make('active')
                ->required()
                ->label('Ativo'),

            ])->columnSpan(4)

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover')
                    ->label('Capa')
                    ->searchable(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->searchable(),

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
                Tables\Actions\DeleteAction::make()
                ->before(function (Slider $slider){
                    Storage::delete('public/' . $slider->cover);
                }),
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
            'index' => Pages\ManageSliders::route('/'),
        ];
    }
}
