<?php

namespace Spatie\MailcoachUi\Support\MailConfiguration\Drivers;

use Illuminate\Contracts\Config\Repository;

class SendgridConfigurationDriver extends MailConfigurationDriver
{
    public function name(): string
    {
        return 'sendgrid';
    }

    public function isConfigured(): array
    {
        return [
            'default_from_mail' => 'required|email',
            'timespan_in_seconds' => 'required|numeric|gte:1',
            'mails_per_timespan' => 'required|numeric|gte:1',
            'sendgrid_api_key' => 'required',
            'sendgrid_signing_secret' => 'required',
        ];
    }

    public function registerConfigValues(Repository $config, array $values)
    {
        $this
            ->setDefaultFromEmail($config, $values['default_from_mail'] ?? '')
            ->throttleNumberOfMailsPerSecond(
                $config,
                $values['mails_per_timespan'] ?? $values['sendgrid_mails_per_second'] ?? 5,
                $values['timespan_in_seconds'] ?? 1,
            );

        $config->set('mail.mailers.mailcoach.transport', 'smtp');
        $config->set('mail.mailers.mailcoach.host', 'smtp.sendgrid.net');
        $config->set('mail.mailers.mailcoach.username', 'apikey');
        $config->set('mail.mailers.mailcoach.encryption', null);
        $config->set('mail.mailers.mailcoach.port', 587);

        $config->set('mail.mailers.mailcoach.password', $values['sendgrid_api_key']);

        $config->set('mailcoach.sendgrid_feedback', [
            'signing_secret' => $values['sendgrid_signing_secret'],
        ]);
    }
}
