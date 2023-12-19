<?php

declare(strict_types=1);

use Rector\CodingStyle\Rector\Plus\UseIncrementAssignRector;
use Rector\CodingStyle\Rector\PostInc\PostIncDecToPreIncDecRector;
use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;
use Rector\Visibility\Rector\ClassMethod\ExplicitPublicClassMethodRector;
use RectorLaravel\Rector\Class_\AnonymousMigrationsRector;
use RectorLaravel\Rector\Class_\UnifyModelDatesWithCastsRector;
use RectorLaravel\Rector\ClassMethod\MigrateToSimplifiedAttributeRector;
use RectorLaravel\Rector\Expr\SubStrToStartsWithOrEndsWithStaticMethodCallRector\SubStrToStartsWithOrEndsWithStaticMethodCallRector;
use RectorLaravel\Rector\FuncCall\RemoveDumpDataDeadCodeRector;
use RectorLaravel\Rector\MethodCall\AssertStatusToAssertMethodRector;
use RectorLaravel\Rector\MethodCall\EloquentOrderByToLatestOrOldestRector;
use RectorLaravel\Rector\MethodCall\RedirectBackToBackHelperRector;
use RectorLaravel\Rector\MethodCall\RedirectRouteToToRouteHelperRector;
use RectorLaravel\Rector\PropertyFetch\ReplaceFakerInstanceWithHelperRector;
use RectorLaravel\Rector\StaticCall\RequestStaticValidateToInjectRector;
use RectorLaravel\Set\LaravelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__.'/app',
        __DIR__.'/config',
        __DIR__.'/database',
        __DIR__.'/public',
        __DIR__.'/resources',
        __DIR__.'/tests',
    ]);

    // Rector rules
    $rectorConfig->rule(ExplicitPublicClassMethodRector::class);

    // Laravel rules
    $rectorConfig->rule(AnonymousMigrationsRector::class);
    $rectorConfig->rule(UnifyModelDatesWithCastsRector::class);
    $rectorConfig->rule(AssertStatusToAssertMethodRector::class);
    $rectorConfig->rule(EloquentOrderByToLatestOrOldestRector::class);
    $rectorConfig->rule(MigrateToSimplifiedAttributeRector::class);
    $rectorConfig->rule(RedirectBackToBackHelperRector::class);
    $rectorConfig->rule(RedirectRouteToToRouteHelperRector::class);
    $rectorConfig->rule(RemoveDumpDataDeadCodeRector::class);
    $rectorConfig->rule(ReplaceFakerInstanceWithHelperRector::class);
    $rectorConfig->rule(RequestStaticValidateToInjectRector::class);
    $rectorConfig->rule(SubStrToStartsWithOrEndsWithStaticMethodCallRector::class);

    // Dets of rules
    $rectorConfig->sets([
        SetList::CODE_QUALITY,
        SetList::CODING_STYLE,
        SetList::DEAD_CODE,
        SetList::EARLY_RETURN,
        // SetList::NAMING,
        SetList::TYPE_DECLARATION,
        SetList::PHP_52,
        SetList::PHP_53,
        SetList::PHP_54,
        SetList::PHP_55,
        SetList::PHP_56,
        SetList::PHP_70,
        SetList::PHP_71,
        SetList::PHP_72,
        SetList::PHP_73,
        SetList::PHP_74,
        SetList::PHP_80,
        SetList::PHP_81,
        SetList::PHP_82,
        SetList::PHP_83,
        LaravelSetList::LARAVEL_50,
        LaravelSetList::LARAVEL_51,
        LaravelSetList::LARAVEL_52,
        LaravelSetList::LARAVEL_53,
        LaravelSetList::LARAVEL_54,
        LaravelSetList::LARAVEL_55,
        LaravelSetList::LARAVEL_56,
        LaravelSetList::LARAVEL_57,
        LaravelSetList::LARAVEL_58,
        LaravelSetList::LARAVEL_60,
        LaravelSetList::LARAVEL_70,
        LaravelSetList::LARAVEL_80,
        LaravelSetList::LARAVEL_90,
        LaravelSetList::LARAVEL_100,
        LaravelSetList::LARAVEL_CODE_QUALITY,
    ]);

    // Skip rules
    $rectorConfig->skip([
        UseIncrementAssignRector::class,
        PostIncDecToPreIncDecRector::class,
    ]);
};
