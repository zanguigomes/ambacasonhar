<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentResource\Pages;
use App\Filament\Resources\DocumentResource\RelationManagers;
use App\Models\Document;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Forms\Components\Section;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Conteúdo';
    protected static ?string $navigationLabel = 'Documentos';
    protected static ?string $modelLabel = 'Documento';
    protected static ?string $slug = 'documento';
    protected static ?int $navigationSort = 6;

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

                        Forms\Components\FileUpload::make('file')
                            ->getUploadedFileNameForStorageUsing(
                                fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                                    ->prepend('documento-'),
                            )
                            ->acceptedFileTypes(['application/pdf'])
                            ->maxSize(50000)
                            ->disk('public')
                            ->directory('documents')
                            ->label('Inserir documento (PDF)'),

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

                        Forms\Components\Grid::make(2)
                            ->schema([

                                Forms\Components\Select::make('type')
                                    ->options([
                                        'Despacho'              => 'Despacho',
                                        'Decreto Presidencial'  => 'Decreto Presidencial',
                                        'Comunicado'            => 'Comunicado',
                                        'Legislação'            => 'Legislação',
                                        'Arquivo'               => 'Arquivo',
                                    ])
                                    ->label('Tipo')
                                    ->native(false),

                                Forms\Components\TextInput::make('section')
                                    ->label('Área')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\Toggle::make('secrecy')
                                    ->label('Documento restrito')
                                    ->required(),

                                Forms\Components\Toggle::make('active')
                                    ->label('Activo')
                                    ->required()
                                    ->label('Ativo'),

                            ]),

                    ])->columnSpan(8),

                Section::make()
                    ->schema([

                        Forms\Components\TextInput::make('pages')
                            ->label('Número de Páginas')
                            ->required()
                            ->numeric(),

                        Forms\Components\TextInput::make('size')
                            ->label('Tamanho (KB ou MB)')
                            ->required(),

                        Forms\Components\DatePicker::make('date_pub')
                        ->label('Data emissão')
                        ->native(false)
                            ->required(),
                        Forms\Components\TextInput::make('number')
                        ->label('Nº do Documento (Caso exista)')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('series')
                        ->label('Série do Documento (Caso exista)')
                            ->maxLength(255),

                    ])->columnSpan(4)

            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pages')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_pub')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                ->before(function (Document $document){
                    Storage::delete('public/' . $document->file);
                }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                    ->before(function (Document $document){
                        Storage::delete('public/' . $document->file);
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
            'index' => Pages\ListDocuments::route('/'),
            'create' => Pages\CreateDocument::route('/create'),
            'edit' => Pages\EditDocument::route('/{record}/edit'),
        ];
    }
}
