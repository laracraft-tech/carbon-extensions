<?php

namespace LaracraftTech\CarbonExtensions;

use Carbon\Carbon;
use LaracraftTech\CarbonExtensions\Exceptions\InvalidFiscalYearException;

class CarbonFiscalYear extends Carbon
{
    /**
     * The month of the year when the fiscal year starts.
     * @var int
     */
    protected static int $fiscalYearStartMonth;

    /**
     * The day in the month of the year when the fiscal year starts.
     * @var int
     */
    protected static int $fiscalYearStartDay;

    /**
     * @param $time
     * @param $tz
     */
    public function __construct($time = null, $tz = null)
    {
        parent::__construct($time, $tz);

        $this->ensureFiscalYearStartIsSet();
    }

    /**
     * Set the start of the fiscal year before you start using the class.
     *
     * @param int $month
     * @param int $day
     * @return void
     */
    public static function setFiscalYearStart(int $month, int $day): void
    {
        self::$fiscalYearStartMonth = $month;
        self::$fiscalYearStartDay = $day;
    }

    private function ensureFiscalYearStartIsSet()
    {
        if (empty(self::$fiscalYearStartMonth) || empty(self::$fiscalYearStartDay)) {
            throw new InvalidFiscalYearException();
        }
    }

    public function startOfYear(): CarbonFiscalYear
    {
        $year = $this->year;

        if ($this->month < self::$fiscalYearStartMonth ||
            ($this->month == self::$fiscalYearStartMonth && $this->day < self::$fiscalYearStartDay)
        ) {
            $year -= 1;
        }

        return $this->setDate($year, self::$fiscalYearStartMonth, self::$fiscalYearStartDay)->startOfDay();
    }

    public function endOfYear(): CarbonFiscalYear
    {
        return $this->startOfYear()->copy()->addYear()->subDay()->endOfDay();
    }
}
