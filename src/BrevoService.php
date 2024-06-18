<?php

namespace JakGH\LaravelBrevoMailer;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class BrevoService
{
    protected PendingRequest $http;

    protected string $host = 'https://api.brevo.com/v3';

    protected ?array $emailFrom = null;

    protected ?string $smsFrom = null;

    public function __construct(string $key, array $options = [])
    {
        if (array_key_exists('host', $options)) {
            $this->host = $options['host'];
        }

        if (array_key_exists('emailFrom', $options)) {
            $this->setEmailFrom($options['emailFrom']);
        }       

        $this->http = Http::withHeaders([
            'accept' => 'application/json',
            'content-type' => 'application/json',
            'api-key' => $key,
        ])->baseUrl($this->host);
    }

    public function sendEmail( BrevoEmailMessage $email, array $options = []): ?array
    {
        if (blank($email->from)) {
            $email->from($this->emailFrom);
        } elseif (array_key_exists('emailFrom', $options)) {
            $email->from($options['emailFrom']);
        }
        $response = $this->http->post('/smtp/email', $email->toArray());

        if (! $response->successful()) {
            throw new \Exception( $response->message() );
        }

        return json_decode($response->body(), true);
    }   

    public function setEmailFrom(array $emailFrom): static
    {
        $this->emailFrom = $emailFrom;

        return $this;
    }
    
}
