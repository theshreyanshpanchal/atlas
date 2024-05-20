<?php

namespace Laraverse\Atlas;

use Laraverse\Atlas\Traits\Cities;
use Laraverse\Atlas\Traits\PaymentProducts;
use Laraverse\Atlas\Traits\Countries;
use Laraverse\Atlas\Traits\Currencies;
use Laraverse\Atlas\Traits\PaymentMethods;
use Laraverse\Atlas\Traits\States;
use Laraverse\Atlas\Traits\Timezones;

class Client
{
    use Cities;
    use Countries;
    use Currencies;
    use PaymentMethods;
    use PaymentProducts;
    use States;
    use Timezones;
}