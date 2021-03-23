<?php

namespace SRC\Booking\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\Booking\Adapters\Gateways\TariffCalculationGateway;
use SRC\Booking\Adapters\Presenters\RegisterVM;
use SRC\Booking\Infra\Factory\TariffCalculationFactory;

class Register extends Action
{
    public function __construct(
        private TariffCalculationFactory $calculationFactory,
        private RegisterVM $registerVM,
        private \SRC\Booking\Adapters\Gateways\Register $repository,
        private \SRC\Booking\Infra\Validator\Register $registerValidator,
        private \SRC\Booking\Infra\Factory\TariffCalculationFactory $tariffCalculationFactory
    )
    {}

    public function handle(): ResponseInterface
    {
        $this->registerValidator->validate($this->body);
        $presenter = new \SRC\Booking\Adapters\Presenters\Register($this->registerVM);
        $gateway = new TariffCalculationGateway($this->tariffCalculationFactory);
        $controller = new \SRC\Booking\Adapters\Controllers\Register(
            $presenter,
            $this->repository,
            $gateway
        );
        $controller->handle($this->body, $this->args['userId']);

        return JsonResponse::build(201, $presenter->getData());
    }
}