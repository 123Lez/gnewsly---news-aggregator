<?php

declare(strict_types=1);

/*
 * This file is part of the WebPush library.
 *
 * (c) Louis Lagrange <lagrange.louis@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\WebPush;

class Notification
{
    /** @var Subscription */
    private $subscription;

    /** @var null|string */
    private $payload;

    /** @var array Options : TTL, urgency, topic */
    private $options;

    /** @var array Auth details : GCM, VAPID */
    private $auth;

    /**
     * Notification constructor.
     *
     * @param Subscription $subscription
     * @param null|string $payload
     * @param array $options
     * @param array $auth
     */
    public function __construct(Subscription $subscription, ?string $payload, array $options, array $auth)
    {
        $this->subscription = $subscription;
        $this->payload = $payload;
        $this->options = $options;
        $this->auth = $auth;
    }

    /**
     * @return Subscription
     */
    public function getSubscription(): Subscription
    {
        return $this->subscription;
    }

    /**
     * @return null|string
     */
    public function getPayload(): ?string
    {
        return $this->payload;
    }

    /**
     * @param array $defaultOptions
     *
     * @return array
     */
    public function getOptions(array $defaultOptions = []): array
    {
        $options = $this->options;
        $options['TTL'] = array_key_exists('TTL', $options) ? $options['TTL'] : $defaultOptions['TTL'];
        $options['urgency'] = array_key_exists('urgency', $options) ? $options['urgency'] : $defaultOptions['urgency'];
        $options['topic'] = array_key_exists('topic', $options) ? $options['topic'] : $defaultOptions['topic'];

        return $options;
    }

    /**
     * @param array $defaultAuth
     *
     * @return array
     */
    public function getAuth(array $defaultAuth): array
    {
        return count($this->auth) > 0 ? $this->auth : $defaultAuth;
    }
}
