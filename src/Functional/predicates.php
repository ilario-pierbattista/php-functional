<?php

declare(strict_types=1);

namespace Widmogrod\Functional;

/**
 * @var callable
 */
const eql = 'Widmogrod\Functional\eql';

/**
 * eql :: a -> a -> Bool
 *
 * @param mixed $expected
 * @param mixed $value
 *
 * @return mixed
 */
function eql($expected, $value = null)
{
    return curryN(2, function ($expected, $value) {
        return $expected === $value;
    })(...func_get_args());
}

/**
 * @var callable
 */
const lt = 'Widmogrod\Functional\lt';

/**
 * lt :: a -> a -> Bool
 *
 * @param mixed $expected
 * @param mixed $value
 *
 * @return mixed
 */
function lt($expected, $value = null)
{
    return curryN(2, function ($expected, $value) {
        return $value < $expected;
    })(...func_get_args());
}

/**
 * @var callable
 */
const orr = 'Widmogrod\Functional\orr';

/**
 * orr :: (a -> Bool) -> (a -> Bool) -> a -> Bool
 *
 * @param callable      $predicateA
 * @param callable|null $predicateB
 * @param mixed         $value
 *
 * @return \Closure|bool
 */
function orr(callable $predicateA, callable $predicateB = null, $value = null)
{
    return curryN(3, function (callable $a, callable $b, $value) {
        return $a($value) || $b($value);
    })(...func_get_args());
}

/**
 * @var callable
 */
const andd = 'Widmogrod\Functional\andd';

/**
 * andd :: (a -> Bool) -> (a -> Bool) -> a -> Bool
 *
 * @param callable      $predicateA
 * @param callable|null $predicateB
 * @param mixed         $value
 *
 * @return \Closure|bool
 */
function andd(callable $predicateA, callable $predicateB = null, $value = null)
{
    return curryN(3, function (callable $a, callable $b, $value) {
        return $a($value) && $b($value);
    })(...func_get_args());
}

/**
 * @var callable
 */
const not = 'Widmogrod\Functional\andd';

/**
 * not :: (a -> Bool) -> a -> Bool
 *
 * @param callable      $predicate
 * @param mixed         $value
 *
 * @return \Closure|bool
 */
function not(callable $predicate, $value = null)
{
    return curryN(2, function (callable $p, $value) {
        return ! $p($value);
    })(...func_get_args());
}
