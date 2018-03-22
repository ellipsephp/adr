<?php declare(strict_types=1);

namespace Ellipse\ADR;

interface DomainInterface
{
    /**
     * Return a payload from the given input array.
     *
     * @param array $input
     * @return \Ellipse\ADR\PayloadInterface
     */
    public function payload(array $input): PayloadInterface;
}
