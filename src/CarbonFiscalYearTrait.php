<?php

namespace LaracraftTech\CarbonExtensions;

use Carbon\CarbonInterface;

trait CarbonFiscalYearTrait
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
            throw new CarbonFiscalYearException();
        }
    }

    public function startOfYear(): CarbonInterface
    {
        $year = $this->year;

        if ($this->month < self::$fiscalYearStartMonth ||
            ($this->month == self::$fiscalYearStartMonth && $this->day < self::$fiscalYearStartDay)
        ) {
            $year -= 1;
        }

        return $this->setDate($year, self::$fiscalYearStartMonth, self::$fiscalYearStartDay)->startOfDay();
    }

    public function endOfYear(): CarbonInterface
    {
        return $this->startOfYear()->copy()->addYear()->subDay()->endOfDay();
    }
}
