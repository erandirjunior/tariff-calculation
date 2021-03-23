<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use SRC\TariffCalculation\Adapter\Controllers\TariffCalculationByRoom;
use SRC\TariffCalculation\Adapter\Gateways\GetCurrentExchangeValue;
use SRC\TariffCalculation\Adapter\Presenters\PresenterByRoom;

class TariffCalculationByRoomTest extends TestCase
{
    private TariffCalculationByRoom $controller;
    private PresenterByRoom $presenter;

    public function setUp(): void
    {
        $this->presenter = new PresenterByRoom(new MockVm());
        $currentExchangeGateway = new GetCurrentExchangeValue(new MockCurrentExchange());
        $repository = new \SRC\TariffCalculation\Adapter\Gateways\TariffCalculationByRoom(new MockTariffCalculationByRoom());
        $this->controller = new TariffCalculationByRoom(
            $this->presenter,
            $currentExchangeGateway,
            $repository
        );
    }

    public function testDollarToReal()
    {
        $this->controller->handle(2, 1, 1, 1);
        $this->assertEquals(['price' => 822.64], $this->presenter->getData());
    }

    public function testDollarToEUR()
    {
        $this->controller->handle(2, 3, 1, 1);
        $this->assertEquals(['price' => 144.6], $this->presenter->getData());
    }

    public function testEURToReal()
    {
        $this->controller->handle(3, 1, 1, 2);
        $this->assertEquals(['price' => 1334.16], $this->presenter->getData());
    }
}