<?php

/**
 * @param array $a
 * @return float
 */
function stats_absolute_deviation(array $a) : float {}

/**
 * @param float $par1
 * @param float $par2
 * @param float $par3
 * @param int $which
 * @return float
 */
function stats_cdf_beta(float $par1, float $par2, float $par3, int $which) : float {}

/**
 * @param float $par1
 * @param float $par2
 * @param float $par3
 * @param int $which
 * @return float
 */
function stats_cdf_binomial(float $par1, float $par2, float $par3, int $which) : float {}

/**
 * @param float $par1
 * @param float $par2
 * @param float $par3
 * @param int $which
 * @return float
 */
function stats_cdf_cauchy(float $par1, float $par2, float $par3, int $which) : float {}

/**
 * @param float $par1
 * @param float $par2
 * @param int $which
 * @return float
 */
function stats_cdf_chisquare(float $par1, float $par2, int $which) : float {}

/**
 * @param float $par1
 * @param float $par2
 * @param int $which
 * @return float
 */
function stats_cdf_exponential(float $par1, float $par2, int $which) : float {}

/**
 * @param float $par1
 * @param float $par2
 * @param float $par3
 * @param int $which
 * @return float
 */
function stats_cdf_f(float $par1, float $par2, float $par3, int $which) : float {}

/**
 * @param float $par1
 * @param float $par2
 * @param float $par3
 * @param int $which
 * @return float
 */
function stats_cdf_gamma(float $par1, float $par2, float $par3, int $which) : float {}

/**
 * @param float $par1
 * @param float $par2
 * @param float $par3
 * @param int $which
 * @return float
 */
function stats_cdf_laplace(float $par1, float $par2, float $par3, int $which) : float {}

/**
 * @param float $par1
 * @param float $par2
 * @param float $par3
 * @param int $which
 * @return float
 */
function stats_cdf_logistic(float $par1, float $par2, float $par3, int $which) : float {}

/**
 * @param float $par1
 * @param float $par2
 * @param float $par3
 * @param int $which
 * @return float
 */
function stats_cdf_negative_binomial(float $par1, float $par2, float $par3, int $which) : float {}

/**
 * @param float $par1
 * @param float $par2
 * @param float $par3
 * @param int $which
 * @return float
 */
function stats_cdf_noncentral_chisquare(float $par1, float $par2, float $par3, int $which) : float {}

/**
 * @param float $par1
 * @param float $par2
 * @param float $par3
 * @param float $par4
 * @param int $which
 * @return float
 */
function stats_cdf_noncentral_f(float $par1, float $par2, float $par3, float $par4, int $which) : float {}

/**
 * @param float $par1
 * @param float $par2
 * @param float $par3
 * @param int $which
 * @return float
 */
function stats_cdf_noncentral_t(float $par1, float $par2, float $par3, int $which) : float {}

/**
 * @param float $par1
 * @param float $par2
 * @param float $par3
 * @param int $which
 * @return float
 */
function stats_cdf_normal(float $par1, float $par2, float $par3, int $which) : float {}

/**
 * @param float $par1
 * @param float $par2
 * @param int $which
 * @return float
 */
function stats_cdf_poisson(float $par1, float $par2, int $which) : float {}

/**
 * @param float $par1
 * @param float $par2
 * @param int $which
 * @return float
 */
function stats_cdf_t(float $par1, float $par2, int $which) : float {}

/**
 * @param float $par1
 * @param float $par2
 * @param float $par3
 * @param int $which
 * @return float
 */
function stats_cdf_uniform(float $par1, float $par2, float $par3, int $which) : float {}

/**
 * @param float $par1
 * @param float $par2
 * @param float $par3
 * @param int $which
 * @return float
 */
function stats_cdf_weibull(float $par1, float $par2, float $par3, int $which) : float {}

/**
 * @param array $a
 * @param array $b
 * @return float
 */
function stats_covariance(array $a, array $b) : float {}

/**
 * @param float $x
 * @param float $a
 * @param float $b
 * @return float
 */
function stats_dens_beta(float $x, float $a, float $b) : float {}

/**
 * @param float $x
 * @param float $ave
 * @param float $stdev
 * @return float
 */
function stats_dens_cauchy(float $x, float $ave, float $stdev) : float {}

/**
 * @param float $x
 * @param float $dfr
 * @return float
 */
function stats_dens_chisquare(float $x, float $dfr) : float {}

/**
 * @param float $x
 * @param float $scale
 * @return float
 */
function stats_dens_exponential(float $x, float $scale) : float {}

/**
 * @param float $x
 * @param float $dfr1
 * @param float $dfr2
 * @return float
 */
function stats_dens_f(float $x, float $dfr1, float $dfr2) : float {}

/**
 * @param float $x
 * @param float $shape
 * @param float $scale
 * @return float
 */
function stats_dens_gamma(float $x, float $shape, float $scale) : float {}

/**
 * @param float $x
 * @param float $ave
 * @param float $stdev
 * @return float
 */
function stats_dens_laplace(float $x, float $ave, float $stdev) : float {}

/**
 * @param float $x
 * @param float $ave
 * @param float $stdev
 * @return float
 */
function stats_dens_logistic(float $x, float $ave, float $stdev) : float {}

/**
 * @param float $x
 * @param float $ave
 * @param float $stdev
 * @return float
 */
function stats_dens_normal(float $x, float $ave, float $stdev) : float {}

/**
 * @param float $x
 * @param float $n
 * @param float $pi
 * @return float
 */
function stats_dens_pmf_binomial(float $x, float $n, float $pi) : float {}

/**
 * @param float $n1
 * @param float $n2
 * @param float $N1
 * @param float $N2
 * @return float
 */
function stats_dens_pmf_hypergeometric(float $n1, float $n2, float $N1, float $N2) : float {}

/**
 * @param float $x
 * @param float $n
 * @param float $pi
 * @return float
 */
function stats_dens_pmf_negative_binomial(float $x, float $n, float $pi) : float {}

/**
 * @param float $x
 * @param float $lb
 * @return float
 */
function stats_dens_pmf_poisson(float $x, float $lb) : float {}

/**
 * @param float $x
 * @param float $dfr
 * @return float
 */
function stats_dens_t(float $x, float $dfr) : float {}

/**
 * @param float $x
 * @param float $a
 * @param float $b
 * @return float
 */
function stats_dens_uniform(float $x, float $a, float $b) : float {}

/**
 * @param float $x
 * @param float $a
 * @param float $b
 * @return float
 */
function stats_dens_weibull(float $x, float $a, float $b) : float {}

/**
 * @param array $a
 * @return number
 */
function stats_harmonic_mean(array $a) {}

/**
 * @param array $a
 * @return float
 */
function stats_kurtosis(array $a) : float {}

/**
 * @param float $a
 * @param float $b
 * @return float
 */
function stats_rand_gen_beta(float $a, float $b) : float {}

/**
 * @param float $df
 * @return float
 */
function stats_rand_gen_chisquare(float $df) : float {}

/**
 * @param float $av
 * @return float
 */
function stats_rand_gen_exponential(float $av) : float {}

/**
 * @param float $dfn
 * @param float $dfd
 * @return float
 */
function stats_rand_gen_f(float $dfn, float $dfd) : float {}

/**
 * @param float $low
 * @param float $high
 * @return float
 */
function stats_rand_gen_funiform(float $low, float $high) : float {}

/**
 * @param float $a
 * @param float $r
 * @return float
 */
function stats_rand_gen_gamma(float $a, float $r) : float {}

/**
 * @param int $n
 * @param float $pp
 * @return int
 */
function stats_rand_gen_ibinomial(int $n, float $pp) : int {}

/**
 * @param int $n
 * @param float $p
 * @return int
 */
function stats_rand_gen_ibinomial_negative(int $n, float $p) : int {}

/**
 * @return int
 */
function stats_rand_gen_int() : int {}

/**
 * @param float $mu
 * @return int
 */
function stats_rand_gen_ipoisson(float $mu) : int {}

/**
 * @param int $low
 * @param int $high
 * @return int
 */
function stats_rand_gen_iuniform(int $low, int $high) : int {}

/**
 * @param float $df
 * @param float $xnonc
 * @return float
 */
function stats_rand_gen_noncenral_chisquare(float $df, float $xnonc) : float {}

/**
 * @param float $df
 * @param float $xnonc
 * @return float
 */
function stats_rand_gen_noncentral_chisquare(float $df, float $xnonc) : float {}

/**
 * @param float $dfn
 * @param float $dfd
 * @param float $xnonc
 * @return float
 */
function stats_rand_gen_noncentral_f(float $dfn, float $dfd, float $xnonc) : float {}

/**
 * @param float $df
 * @param float $xnonc
 * @return float
 */
function stats_rand_gen_noncentral_t(float $df, float $xnonc) : float {}

/**
 * @param float $av
 * @param float $sd
 * @return float
 */
function stats_rand_gen_normal(float $av, float $sd) : float {}

/**
 * @param float $df
 * @return float
 */
function stats_rand_gen_t(float $df) : float {}

/**
 * @return array
 */
function stats_rand_get_seeds() : array {}

/**
 * @param string $phrase
 * @return array
 */
function stats_rand_phrase_to_seeds(string $phrase) : array {}

/**
 * @return float
 */
function stats_rand_ranf() : float {}

/**
 * @param int $iseed1
 * @param int $iseed2
 * @return void
 */
function stats_rand_setall(int $iseed1, int $iseed2) {}

/**
 * @param array $a
 * @return float
 */
function stats_skew(array $a) : float {}

/**
 * @param array $a
 * @param bool $sample
 * @return float
 */
function stats_standard_deviation(array $a, bool $sample = false) : float {}

/**
 * @param int $x
 * @param int $n
 * @return float
 */
function stats_stat_binomial_coef(int $x, int $n) : float {}

/**
 * @param array $arr1
 * @param array $arr2
 * @return float
 */
function stats_stat_correlation(array $arr1, array $arr2) : float {}

/**
 * @param int $n
 * @return float
 */
function stats_stat_factorial(int $n) : float {}

/**
 * @param array $arr1
 * @param array $arr2
 * @return float
 */
function stats_stat_independent_t(array $arr1, array $arr2) : float {}

/**
 * @param array $arr1
 * @param array $arr2
 * @return float
 */
function stats_stat_innerproduct(array $arr1, array $arr2) : float {}

/**
 * @param array $arr1
 * @param array $arr2
 * @return float
 */
function stats_stat_paired_t(array $arr1, array $arr2) : float {}

/**
 * @param array $arr
 * @param float $perc
 * @return float
 */
function stats_stat_percentile(array $arr, float $perc) : float {}

/**
 * @param array $arr
 * @param float $power
 * @return float
 */
function stats_stat_powersum(array $arr, float $power) : float {}

/**
 * @param array $a
 * @param bool $sample
 * @return float
 */
function stats_variance(array $a, bool $sample = false) : float {}
