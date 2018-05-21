<?php

/**
 * @param array $real
 * @return array
 */
function trader_acos(array $real) : array {}

/**
 * @param array $high
 * @param array $low
 * @param array $close
 * @param array $volume
 * @return array
 */
function trader_ad(array $high, array $low, array $close, array $volume) : array {}

/**
 * @param array $real0
 * @param array $real1
 * @return array
 */
function trader_add(array $real0, array $real1) : array {}

/**
 * @param array $high
 * @param array $low
 * @param array $close
 * @param array $volume
 * @param int $fastPeriod
 * @param int $slowPeriod
 * @return array
 */
function trader_adosc(array $high, array $low, array $close, array $volume, int $fastPeriod = 0, int $slowPeriod = 0) : array {}

/**
 * @param array $high
 * @param array $low
 * @param array $close
 * @param int $timePeriod
 * @return array
 */
function trader_adx(array $high, array $low, array $close, int $timePeriod = 0) : array {}

/**
 * @param array $high
 * @param array $low
 * @param array $close
 * @param int $timePeriod
 * @return array
 */
function trader_adxr(array $high, array $low, array $close, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @param int $fastPeriod
 * @param int $slowPeriod
 * @param int $mAType
 * @return array
 */
function trader_apo(array $real, int $fastPeriod = 0, int $slowPeriod = 0, int $mAType = 0) : array {}

/**
 * @param array $high
 * @param array $low
 * @param int $timePeriod
 * @return array
 */
function trader_aroon(array $high, array $low, int $timePeriod = 0) : array {}

/**
 * @param array $high
 * @param array $low
 * @param int $timePeriod
 * @return array
 */
function trader_aroonosc(array $high, array $low, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @return array
 */
function trader_asin(array $real) : array {}

/**
 * @param array $real
 * @return array
 */
function trader_atan(array $real) : array {}

/**
 * @param array $high
 * @param array $low
 * @param array $close
 * @param int $timePeriod
 * @return array
 */
function trader_atr(array $high, array $low, array $close, int $timePeriod = 0) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_avgprice(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @param float $nbDevUp
 * @param float $nbDevDn
 * @param int $mAType
 * @return array
 */
function trader_bbands(array $real, int $timePeriod = 0, float $nbDevUp = 0, float $nbDevDn = 0, int $mAType = 0) : array {}

/**
 * @param array $real0
 * @param array $real1
 * @param int $timePeriod
 * @return array
 */
function trader_beta(array $real0, array $real1, int $timePeriod = 0) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_bop(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $high
 * @param array $low
 * @param array $close
 * @param int $timePeriod
 * @return array
 */
function trader_cci(array $high, array $low, array $close, int $timePeriod = 0) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdl2crows(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdl3blackcrows(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdl3inside(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdl3linestrike(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdl3outside(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdl3starsinsouth(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdl3whitesoldiers(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @param float $penetration
 * @return array
 */
function trader_cdlabandonedbaby(array $open, array $high, array $low, array $close, float $penetration = 0) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdladvanceblock(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlbelthold(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlbreakaway(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlclosingmarubozu(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlconcealbabyswall(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlcounterattack(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @param float $penetration
 * @return array
 */
function trader_cdldarkcloudcover(array $open, array $high, array $low, array $close, float $penetration = 0) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdldoji(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdldojistar(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdldragonflydoji(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlengulfing(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @param float $penetration
 * @return array
 */
function trader_cdleveningdojistar(array $open, array $high, array $low, array $close, float $penetration = 0) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @param float $penetration
 * @return array
 */
function trader_cdleveningstar(array $open, array $high, array $low, array $close, float $penetration = 0) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlgapsidesidewhite(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlgravestonedoji(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlhammer(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlhangingman(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlharami(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlharamicross(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlhighwave(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlhikkake(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlhikkakemod(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlhomingpigeon(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlidentical3crows(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlinneck(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlinvertedhammer(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlkicking(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlkickingbylength(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlladderbottom(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdllongleggeddoji(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdllongline(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlmarubozu(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlmatchinglow(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @param float $penetration
 * @return array
 */
function trader_cdlmathold(array $open, array $high, array $low, array $close, float $penetration = 0) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @param float $penetration
 * @return array
 */
function trader_cdlmorningdojistar(array $open, array $high, array $low, array $close, float $penetration = 0) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @param float $penetration
 * @return array
 */
function trader_cdlmorningstar(array $open, array $high, array $low, array $close, float $penetration = 0) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlonneck(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlpiercing(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlrickshawman(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlrisefall3methods(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlseparatinglines(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlshootingstar(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlshortline(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlspinningtop(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlstalledpattern(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlsticksandwich(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdltakuri(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdltasukigap(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlthrusting(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdltristar(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlunique3river(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlupsidegap2crows(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $open
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_cdlxsidegap3methods(array $open, array $high, array $low, array $close) : array {}

/**
 * @param array $real
 * @return array
 */
function trader_ceil(array $real) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_cmo(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $real0
 * @param array $real1
 * @param int $timePeriod
 * @return array
 */
function trader_correl(array $real0, array $real1, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @return array
 */
function trader_cos(array $real) : array {}

/**
 * @param array $real
 * @return array
 */
function trader_cosh(array $real) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_dema(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $real0
 * @param array $real1
 * @return array
 */
function trader_div(array $real0, array $real1) : array {}

/**
 * @param array $high
 * @param array $low
 * @param array $close
 * @param int $timePeriod
 * @return array
 */
function trader_dx(array $high, array $low, array $close, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_ema(array $real, int $timePeriod = 0) : array {}

/**
 * @return int
 */
function trader_errno() : int {}

/**
 * @param array $real
 * @return array
 */
function trader_exp(array $real) : array {}

/**
 * @param array $real
 * @return array
 */
function trader_floor(array $real) : array {}

/**
 * @return int
 */
function trader_get_compat() : int {}

/**
 * @param int $functionId
 * @return int
 */
function trader_get_unstable_period(int $functionId) : int {}

/**
 * @param array $real
 * @return array
 */
function trader_ht_dcperiod(array $real) : array {}

/**
 * @param array $real
 * @return array
 */
function trader_ht_dcphase(array $real) : array {}

/**
 * @param array $real
 * @return array
 */
function trader_ht_phasor(array $real) : array {}

/**
 * @param array $real
 * @return array
 */
function trader_ht_sine(array $real) : array {}

/**
 * @param array $real
 * @return array
 */
function trader_ht_trendline(array $real) : array {}

/**
 * @param array $real
 * @return array
 */
function trader_ht_trendmode(array $real) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_kama(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_linearreg(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_linearreg_angle(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_linearreg_intercept(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_linearreg_slope(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @return array
 */
function trader_ln(array $real) : array {}

/**
 * @param array $real
 * @return array
 */
function trader_log10(array $real) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @param int $mAType
 * @return array
 */
function trader_ma(array $real, int $timePeriod = 0, int $mAType = 0) : array {}

/**
 * @param array $real
 * @param int $fastPeriod
 * @param int $slowPeriod
 * @param int $signalPeriod
 * @return array
 */
function trader_macd(array $real, int $fastPeriod = 0, int $slowPeriod = 0, int $signalPeriod = 0) : array {}

/**
 * @param array $real
 * @param int $fastPeriod
 * @param int $fastMAType
 * @param int $slowPeriod
 * @param int $slowMAType
 * @param int $signalPeriod
 * @param int $signalMAType
 * @return array
 */
function trader_macdext(array $real, int $fastPeriod = 0, int $fastMAType = 0, int $slowPeriod = 0, int $slowMAType = 0, int $signalPeriod = 0, int $signalMAType = 0) : array {}

/**
 * @param array $real
 * @param int $signalPeriod
 * @return array
 */
function trader_macdfix(array $real, int $signalPeriod = 0) : array {}

/**
 * @param array $real
 * @param float $fastLimit
 * @param float $slowLimit
 * @return array
 */
function trader_mama(array $real, float $fastLimit = 0, float $slowLimit = 0) : array {}

/**
 * @param array $real
 * @param array $periods
 * @param int $minPeriod
 * @param int $maxPeriod
 * @param int $mAType
 * @return array
 */
function trader_mavp(array $real, array $periods, int $minPeriod = 0, int $maxPeriod = 0, int $mAType = 0) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_max(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_maxindex(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $high
 * @param array $low
 * @return array
 */
function trader_medprice(array $high, array $low) : array {}

/**
 * @param array $high
 * @param array $low
 * @param array $close
 * @param array $volume
 * @param int $timePeriod
 * @return array
 */
function trader_mfi(array $high, array $low, array $close, array $volume, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_midpoint(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $high
 * @param array $low
 * @param int $timePeriod
 * @return array
 */
function trader_midprice(array $high, array $low, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_min(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_minindex(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_minmax(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_minmaxindex(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $high
 * @param array $low
 * @param array $close
 * @param int $timePeriod
 * @return array
 */
function trader_minus_di(array $high, array $low, array $close, int $timePeriod = 0) : array {}

/**
 * @param array $high
 * @param array $low
 * @param int $timePeriod
 * @return array
 */
function trader_minus_dm(array $high, array $low, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_mom(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $real0
 * @param array $real1
 * @return array
 */
function trader_mult(array $real0, array $real1) : array {}

/**
 * @param array $high
 * @param array $low
 * @param array $close
 * @param int $timePeriod
 * @return array
 */
function trader_natr(array $high, array $low, array $close, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @param array $volume
 * @return array
 */
function trader_obv(array $real, array $volume) : array {}

/**
 * @param array $high
 * @param array $low
 * @param array $close
 * @param int $timePeriod
 * @return array
 */
function trader_plus_di(array $high, array $low, array $close, int $timePeriod = 0) : array {}

/**
 * @param array $high
 * @param array $low
 * @param int $timePeriod
 * @return array
 */
function trader_plus_dm(array $high, array $low, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @param int $fastPeriod
 * @param int $slowPeriod
 * @param int $mAType
 * @return array
 */
function trader_ppo(array $real, int $fastPeriod = 0, int $slowPeriod = 0, int $mAType = 0) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_roc(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_rocp(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_rocr(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_rocr100(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_rsi(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $high
 * @param array $low
 * @param float $acceleration
 * @param float $maximum
 * @return array
 */
function trader_sar(array $high, array $low, float $acceleration = 0, float $maximum = 0) : array {}

/**
 * @param array $high
 * @param array $low
 * @param float $startValue
 * @param float $offsetOnReverse
 * @param float $accelerationInitLong
 * @param float $accelerationLong
 * @param float $accelerationMaxLong
 * @param float $accelerationInitShort
 * @param float $accelerationShort
 * @param float $accelerationMaxShort
 * @return array
 */
function trader_sarext(array $high, array $low, float $startValue = 0, float $offsetOnReverse = 0, float $accelerationInitLong = 0, float $accelerationLong = 0, float $accelerationMaxLong = 0, float $accelerationInitShort = 0, float $accelerationShort = 0, float $accelerationMaxShort = 0) : array {}

/**
 * @param int $compatId
 * @return void
 */
function trader_set_compat(int $compatId) {}

/**
 * @param int $functionId
 * @param int $timePeriod
 * @return void
 */
function trader_set_unstable_period(int $functionId, int $timePeriod) {}

/**
 * @param array $real
 * @return array
 */
function trader_sin(array $real) : array {}

/**
 * @param array $real
 * @return array
 */
function trader_sinh(array $real) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_sma(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @return array
 */
function trader_sqrt(array $real) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @param float $nbDev
 * @return array
 */
function trader_stddev(array $real, int $timePeriod = 0, float $nbDev = 0) : array {}

/**
 * @param array $high
 * @param array $low
 * @param array $close
 * @param int $fastK_Period
 * @param int $slowK_Period
 * @param int $slowK_MAType
 * @param int $slowD_Period
 * @param int $slowD_MAType
 * @return array
 */
function trader_stoch(array $high, array $low, array $close, int $fastK_Period = 0, int $slowK_Period = 0, int $slowK_MAType = 0, int $slowD_Period = 0, int $slowD_MAType = 0) : array {}

/**
 * @param array $high
 * @param array $low
 * @param array $close
 * @param int $fastK_Period
 * @param int $fastD_Period
 * @param int $fastD_MAType
 * @return array
 */
function trader_stochf(array $high, array $low, array $close, int $fastK_Period = 0, int $fastD_Period = 0, int $fastD_MAType = 0) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @param int $fastK_Period
 * @param int $fastD_Period
 * @param int $fastD_MAType
 * @return array
 */
function trader_stochrsi(array $real, int $timePeriod = 0, int $fastK_Period = 0, int $fastD_Period = 0, int $fastD_MAType = 0) : array {}

/**
 * @param array $real0
 * @param array $real1
 * @return array
 */
function trader_sub(array $real0, array $real1) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_sum(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @param float $vFactor
 * @return array
 */
function trader_t3(array $real, int $timePeriod = 0, float $vFactor = 0) : array {}

/**
 * @param array $real
 * @return array
 */
function trader_tan(array $real) : array {}

/**
 * @param array $real
 * @return array
 */
function trader_tanh(array $real) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_tema(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_trange(array $high, array $low, array $close) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_trima(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_trix(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_tsf(array $real, int $timePeriod = 0) : array {}

/**
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_typprice(array $high, array $low, array $close) : array {}

/**
 * @param array $high
 * @param array $low
 * @param array $close
 * @param int $timePeriod1
 * @param int $timePeriod2
 * @param int $timePeriod3
 * @return array
 */
function trader_ultosc(array $high, array $low, array $close, int $timePeriod1 = 0, int $timePeriod2 = 0, int $timePeriod3 = 0) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @param float $nbDev
 * @return array
 */
function trader_var(array $real, int $timePeriod = 0, float $nbDev = 0) : array {}

/**
 * @param array $high
 * @param array $low
 * @param array $close
 * @return array
 */
function trader_wclprice(array $high, array $low, array $close) : array {}

/**
 * @param array $high
 * @param array $low
 * @param array $close
 * @param int $timePeriod
 * @return array
 */
function trader_willr(array $high, array $low, array $close, int $timePeriod = 0) : array {}

/**
 * @param array $real
 * @param int $timePeriod
 * @return array
 */
function trader_wma(array $real, int $timePeriod = 0) : array {}
