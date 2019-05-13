<?php

namespace AccountingBundle;

use AccountingBundle\DependancyEnjection\AccountingExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AccountingBundle extends Bundle
{
    public function __construct()
    {

    }

    public function getContainerExtension()
    {
        return new AccountingExtension();
    }
}
