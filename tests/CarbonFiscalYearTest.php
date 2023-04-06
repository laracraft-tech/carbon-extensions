<?php

use LaracraftTech\CarbonExtensions\CarbonFiscalYear;
use LaracraftTech\CarbonExtensions\CarbonFiscalYearImmutable;

it('can detect fiscal year start and end', function () {
    //set fiscal year
    CarbonFiscalYear::setFiscalYearStart(4, 1);

    $date = CarbonFiscalYear::parse("2022-03-30");
    expect($date->startOfYear()->format("Y-m-d"))->toBe("2021-04-01")
        ->and($date->endOfYear()->format("Y-m-d"))->toBe("2022-03-31");

    $date = CarbonFiscalYear::parse("2022-04-02");
    expect($date->startOfYear()->format("Y-m-d"))->toBe("2022-04-01")
        ->and($date->endOfYear()->format("Y-m-d"))->toBe("2023-03-31");

    //another fiscal year
    CarbonFiscalYear::setFiscalYearStart(10, 1);

    $date = CarbonFiscalYear::parse("2023-05-11");
    expect($date->startOfYear()->format("Y-m-d"))->toBe("2022-10-01")
        ->and($date->endOfYear()->format("Y-m-d"))->toBe("2023-09-30");
});

it('works with im/mutable', function () {
    CarbonFiscalYear::setFiscalYearStart(4, 1);
    $mutableDate = CarbonFiscalYear::parse("2022-03-30");
    $mutableDate2 = $mutableDate->addYear();

    expect($mutableDate)->toBe($mutableDate2);

    CarbonFiscalYearImmutable::setFiscalYearStart(4, 1);
    $immutableDate = CarbonFiscalYearImmutable::parse("2022-03-30");
    $immutableDate2 = $immutableDate->addYear();

    expect($immutableDate)->not->toBe($immutableDate2);
});
