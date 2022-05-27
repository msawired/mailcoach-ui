<x-mailcoach::layout
    :originTitle="$originTitle ?? __('Settings')"
    :originHref="$originHref ?? null"
    :title="$title ?? null"
>
    <x-slot name="nav">
        <x-mailcoach::navigation>
            <x-mailcoach::navigation-item :href="route('account')">
                {{ __('Profile') }}
            </x-mailcoach::navigation-item>
            <x-mailcoach::navigation-item :href="route('password')">
                {{ __('Password') }}
            </x-mailcoach::navigation-item>
            <x-mailcoach::navigation-item :href="route('users')">
                {{ __('Users') }}
            </x-mailcoach::navigation-item>

            <x-mailcoach::navigation-group icon="fas fa-cogs" :title="__('Configuration')">
                <x-mailcoach::navigation-item :href="route('appConfiguration')">
                    {{__('App') }}
                </x-mailcoach::navigation-item>

                <x-mailcoach::navigation-item :href="route('editor')">
                    {{ __('Editor') }}
                </x-mailcoach::navigation-item>

                <x-mailcoach::navigation-item :href="route('tokens')">
                    {{ __('API Tokens') }}
                </x-mailcoach::navigation-item>

            </x-mailcoach::navigation-group>

            <x-mailcoach::navigation-group icon="fas fa-server" :title="__('Drivers')">
                <x-mailcoach::navigation-item :href="route('mailConfiguration')">
                    {{ __('Campaigns') }}
                </x-mailcoach::navigation-item>

                <x-mailcoach::navigation-item :href="route('transactionalMailConfiguration')">
                    {{ __('Transactional Mail') }}
                </x-mailcoach::navigation-item>
            </x-mailcoach::navigation-group>
        </x-mailcoach::navigation>
    </x-slot>

    {{ $slot }}
</x-mailcoach::layout>
