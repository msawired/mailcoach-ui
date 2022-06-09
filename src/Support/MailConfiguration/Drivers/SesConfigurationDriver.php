<?php

namespace Spatie\MailcoachUi\Support\MailConfiguration\Drivers;

use Illuminate\Contracts\Config\Repository;

class SesConfigurationDriver extends MailConfigurationDriver
{
    public function name(): string
    {
        return 'ses';
    }

    public function isConfigured(): array
    {
        return [
            'default_from_mail' => 'required|email',
            'timespan_in_seconds' => 'required|numeric|gte:1',
            'mails_per_timespan' => 'required|numeric|gte:1',
            'ses_key' => 'required',
            'ses_secret' => 'required',
            'ses_region' => 'required',
            'ses_configuration_set' => 'required',
        ];
    }

    public function registerConfigValues(Repository $config, array $values)
    {
        $this
            ->setDefaultFromEmail($config, $values['default_from_mail'] ?? '')
            ->throttleNumberOfMailsPerSecond(
                $config,
                $values['mails_per_timespan'] ?? $values['ses_mails_per_second'] ?? 5,
                $values['timespan_in_seconds'] ?? 1,
            );

        $config->set('mail.mailers.transport', $this->name());
        $config->set('services.ses', [
            'key' => $values['ses_key'],
            'secret' => $values['ses_secret'],
            'region' => $values['ses_region'],
        ]);
        $config->set('mailcoach.ses_feedback', [
            'configuration_set' => $values['ses_configuration_set'] ?? '',
        ]);
    }
}
