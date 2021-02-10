<?php

declare(strict_types=1);

namespace fuyutsuki\ConfigTester\utils;

/**
 * Interface JsonUnserializable
 * @package fuyutsuki\ConfigTester\utils
 */
interface JsonUnserializable {

    public static function jsonUnserialize(string $path): static;

}