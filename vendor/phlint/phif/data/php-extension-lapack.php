<?php

class Lapack
{
    function eigenValues(array $a, array $left = [], array $right = []) : array {}
    function identity(int $n) : array {}
    function leastSquaresByFactorisation(array $a, array $b) : array {}
    function leastSquaresBySVD(array $a, array $b) : array {}
    function pseudoInverse(array $a) : array {}
    function singularValues(array $a) : array {}
    function solveLinearEquation(array $a, array $b) : array {}
}

class lapackexception extends Exception {}
