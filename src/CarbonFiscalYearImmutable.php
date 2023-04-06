<?php

namespace LaracraftTech\CarbonExtensions;

use Carbon\CarbonImmutable;

class CarbonFiscalYearImmutable extends CarbonImmutable
{
    use CarbonFiscalYearTrait;

    /**
     * @param $time
     * @param $tz
     */
    public function __construct($time = null, $tz = null)
    {
        parent::__construct($time, $tz);

        $this->ensureFiscalYearStartIsSet();
    }
}
