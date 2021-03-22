<?php

namespace SRC\User\Domain\Register;

class Register
{
    public function __construct(
        private RegisterGateway $registerGateway,
        private Presenter $presenter
    )
    {}

    public function register(User $user): void
    {
        $this->registerIfEmailIsUnique($user);
    }

    public function registerIfEmailIsUnique(User $user): void
    {
        if ($this->registerGateway->checkIfEmailIsInUse($user->getEmail())) {
            throw new \DomainException('User already be registered!');
        }

        $this->registerData($user);
    }

    private function registerData(User $user): void
    {
        $registeredMoney = $this->registerGateway->register($user);
        $this->presenter->addData($registeredMoney);
    }
}