<?php

namespace SRC\TariffCalculation\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\TariffCalculation\Adapter\Gateways\GetCurrentExchangeValue;
use SRC\TariffCalculation\Adapter\Presenters\PresenterByRoom;

class TariffCalculationByRoom extends Action
{
    public function __construct(
        private PresenterByRoom $presenterByRoom,
        private GetCurrentExchangeValue $getCurrentExchangeValue,
        private \SRC\TariffCalculation\Adapter\Gateways\TariffCalculationByRoom $tariffCalculationByRoom
    )
    {}

    public function handle(): ResponseInterface
    {
        $controller = new \SRC\TariffCalculation\Adapter\Controllers\TariffCalculationByRoom(
            $this->presenterByRoom,
            $this->getCurrentExchangeValue,
            $this->tariffCalculationByRoom
        );

        $coinFrom = $this->body['coinFrom'];
        $coinTo = $this->body['coinTo'];
        $roomId = $this->args['id'];
        $seller = $this->body['sellerId'];
        $hotelId = $this->args['hotelId'];

        $controller->handle($coinFrom, $coinTo, $roomId, $seller, $hotelId);
        return JsonResponse::build(200, $this->presenterByRoom->getData());
    }
}