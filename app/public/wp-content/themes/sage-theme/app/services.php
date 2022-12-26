<?php
use App\Services\RegisterPostType;
use App\Services\ShortCodes;
use App\Services\HookFilters;
use App\Services\HookActions;
use App\Services\Ajax;

/**
 * Register Post Type
 */
$postTypes = new RegisterPostType();
$postTypes->init();


/**
 * Register Ajax
 */
$ajax = new Ajax();
$ajax->init();

/**
 * Register ShortCodes
 */
$shortCodes = new ShortCodes();
$shortCodes->init();

/**
 * Register Hook Actions
 */
$hookActions = new HookActions();
$hookActions->init();

/**
 * Register Hook Filters
 */
$hookFilters = new HookFilters();
$hookFilters->init();
