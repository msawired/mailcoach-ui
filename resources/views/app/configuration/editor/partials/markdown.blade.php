<div>
    <x-mailcoach::help>
        {!! __('<a href=":link">Toast UI Editor</a> is a beautiful markdown editor. It also offers image uploads.', ['link' => 'https://ui.toast.com/tui-editor']) !!}
    </x-mailcoach::help>

    <div class="my-6">
        <x-mailcoach::warning>
            {{ __('The Markdown editor stores content in a structured way. When switching from or to this editor, content in existing templates and draft campaigns will get lost.') }}
        </x-mailcoach::warning>
    </div>

    <div class="my-4">
        <x-mailcoach::select-field
            :label="__('Initial Edit type')"
            name="editorSettings.markdown_initialEditType"
            wire:model.lazy="editorSettings.markdown_initialEditType"
            :options="['markdown' => 'Markdown', 'wysiwyg' => 'Wysiwyg']"
        />
    </div>

    <div class="my-4">
        <x-mailcoach::select-field
            :label="__('Preview style')"
            name="editorSettings.markdown_previewStyle"
            wire:model.lazy="editorSettings.markdown_previewStyle"
            :options="['vertical' => 'Vertical', 'tab' => 'Tab']"
        />
    </div>

    <div class="my-4">
        <x-mailcoach::text-field
            :label="__('Height')"
            name="editorSettings.markdown_height"
            wire:model.lazy="editorSettings.markdown_height"
        />
    </div>

    <div class="my-4">
        <x-mailcoach::text-field
            :label="__('Placeholder')"
            name="editorSettings.markdown_placeholder"
            wire:model.lazy="editorSettings.markdown_placeholder"
        />
    </div>
</div>
