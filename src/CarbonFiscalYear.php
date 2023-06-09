<?php

namespace LaracraftTech\CarbonExtensions;

use Carbon\Carbon;

class CarbonFiscalYear extends Carbon
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
