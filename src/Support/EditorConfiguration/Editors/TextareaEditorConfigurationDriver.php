<?php

namespace Spatie\MailcoachUi\Support\EditorConfiguration\Editors;

use Spatie\Mailcoach\Http\Livewire\TextAreaEditorComponent;

class TextareaEditorConfigurationDriver extends EditorConfigurationDriver
{
    public static function label(): string
    {
        return 'Textarea';
    }

    public function getClass(): string
    {
        return TextAreaEditorComponent::class;
    }

    public function validationRules(): array
    {
        return [];
    }

    public static function settingsPartial(): ?string
    {
        return 'mailcoach-ui::app.configuration.editor.partials.textarea';
    }
}
