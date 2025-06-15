<?php

declare(strict_types=1);

namespace App\Filament\Pages;

use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Pages\Page;

class TestPage extends Page implements HasForms
{
    use InteractsWithForms;
    use InteractsWithFormActions;

    protected static string $view = 'filament.pages.test-page';

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-triangle';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function save(): void
    {
        $data = $this->form->getState();
        dd($data);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Actions\Action::make('save')
                ->label('Save')
                ->submit('save'),
        ];
    }
}
