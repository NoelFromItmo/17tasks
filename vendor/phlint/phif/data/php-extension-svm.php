<?php

class SVM
{
    function __construct() {}
    function crossvalidate(array $problem, int $number_of_folds) : float {}
    function getOptions() : array {}
    function setOptions(array $params) : bool {}
    function train(array $problem, array $weights = []) : SVMModel {}
}

class SVMModel
{
    function __construct(string $filename = '') {}
    function checkProbabilityModel() : bool {}
    function getLabels() : array {}
    function getNrClass() : int {}
    function getSvmType() : int {}
    function getSvrProbability() : float {}
    function load(string $filename) : bool {}
    function predict(array $data) : float {}
    function predict_probability(array $data) : float {}
    function save(string $filename) : bool {}
}
