<form
    class="form-grid"
    wire:submit.prevent="save"
    @keydown.prevent.window.cmd.s="$wire.call('save')"
    @keydown.prevent.window.ctrl.s="$wire.call('save')"
    method="POST"
>
    @csrf
    @method('PUT')

    <x-mailcoach::text-field type="email" :label="__('Email')" name="user.email" wire:model.lazy="user.email" required />

    <x-mailcoach::text-field :label="__('Name')" name="user.name" wire:model.lazy="user.name" required />

    <div class="form-buttons">
        <x-mailcoach::button :label="__('Save user')" />
    </div>
</form>
