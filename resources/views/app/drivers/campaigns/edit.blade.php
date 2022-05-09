<x-mailcoach-ui::layout-settings :title="__('Campaigns')">
    <form
        class="form-grid"
        action="{{ route('mailConfiguration') }}"
        method="POST"
        x-cloak
        x-data="{ driver: '{{ old('driver', $mailConfiguration->driver ?? 'ses') }}' }"
    >
        @csrf
        @method('PUT')

        <x-mailcoach::select-field
            :label="__('Driver')"
            name="driver"
            x-model="driver"
            :options="[
                'ses' => 'Amazon SES',
                'sendgrid' => 'SendGrid',
                'mailgun' => 'Mailgun',
                'postmark' => 'Postmark',
                'postal' => 'Postal',
                'smtp' => 'SMTP',
            ]"
        />

        @php($key = $mailConfiguration->driver . '_mails_per_second')
        <x-mailcoach::text-field
            :label="__('Mails per timespan')"
            name="mails_per_timespan"
            type="number"
            :value="$mailConfiguration->mails_per_timespan ?? $mailConfiguration->$key ?? 5"
            inputClass="input-sm"
        />

        <x-mailcoach::text-field
            :label="__('Timespan in seconds')"
            name="timespan_in_seconds"
            type="number"
            :value="$mailConfiguration->timespan_in_seconds ?? 1"
            inputClass="input-sm"
        />

        <div class="form-grid" x-show="driver === 'ses'">
            @include('mailcoach-ui::app.drivers.campaigns.partials.ses')
        </div>

        <div class="form-grid" x-show="driver === 'mailgun'">
            @include('mailcoach-ui::app.drivers.campaigns.partials.mailgun')
        </div>

        <div class="form-grid" x-show="driver === 'sendgrid'">
            @include('mailcoach-ui::app.drivers.campaigns.partials.sendgrid')
        </div>

        <div class="form-grid" x-show="driver === 'postmark'">
            @include('mailcoach-ui::app.drivers.campaigns.partials.postmark')
        </div>

        <div class="form-grid" x-show="driver === 'postal'">
            @include('mailcoach-ui::app.drivers.campaigns.partials.postal')
        </div>

        <div class="form-grid" x-show="driver === 'smtp'">
            @include('mailcoach-ui::app.drivers.campaigns.partials.smtp')
        </div>

        <x-mailcoach::text-field :label="__('Default from mail')" name="default_from_mail" type="text" :value="$mailConfiguration->default_from_mail"/>

        <div class="form-buttons">
            <x-mailcoach::button :label="__('Save configuration')" />
            <x-mailcoach::button-secondary x-on:click="$store.modals.open('send-test')" :label="__('Send Test')" />
        </div>

    </form>

    <x-mailcoach::modal title="Send Test" name="send-test" :open="$errors->has('to_email') || $errors->has('from_email')">
        @include('mailcoach-ui::app.drivers.campaigns.partials.sendTestMail')
    </x-mailcoach::modal>
</x-mailcoach-ui::layout-settings>
