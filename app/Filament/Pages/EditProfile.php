<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\Section;
use Filament\Pages\Page;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;

class EditProfile extends BaseEditProfile
{
    /* protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.edit-profile'; */

    protected static string $view = 'filament.pages.edit-profile';

    protected static string $layout = 'filament-panels::components.layout.index';

    protected function hasFullWidthFormActions(): bool
    {
        return false;
    }

    public static function getSlug(): string
    {
        return static::$slug ?? 'perfil';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
              /*   TextInput::make('username')
                    ->required()
                    ->maxLength(255), */
                    Section::make('Personal Information')
                    ->aside()
                ->schema([
                    $this->getNameFormComponent(),
                    $this->getEmailFormComponent(),
                    $this->getPasswordFormComponent(),
                    $this->getPasswordConfirmationFormComponent(),
                ])

            ]);
    }

}
