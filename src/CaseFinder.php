<?php declare(strict_types=1);
/**
 * (c) 2005-2025 Dmitry Lebedev <dl@adios.ru>
 * This source code is part of the Ultra library.
 * Please see the LICENSE file for copyright and licensing information.
 */
namespace Ultra\Enum;

trait CaseFinder {
	use Cases;
	/**
	 * Проверить значения массива $haystack на принадлежность хотя бы одного из них
	 * к варианту текущего текущего перечисления с именем $needle.
	 * Вернёт TRUE, если искомый элемент присутствует в массиве $haystack, либо FALSE,
	 * если искомого элемента в массиве не существует, либо вернёт NULL,
	 * если в перечислении нет варианта с именем $needle.
	 */
	final public static function inArrayCase(string $needle, array $haystack): bool|null {
		if (!$case = self::getCaseByName($needle)) {
			return false;
		}

		return in_array($case, $haystack);
	}

	/**
	 * Найти элемент массива $haystack, который является экземпляром текущего перечисления
	 * с именем варианта перечисления $needle.
	 * Вернёт индекс массива $haystack для искомого экземпляра, либо FALSE, если искомого элемента
	 * в массиве не существует, либо вернёт NULL, если в перечислении нет варианта с именем $needle.
	 */
	final public static function searchCase(string $needle, array $haystack): int|string|false|null {
		if (!$case = self::getCaseByName($needle)) {
			return null;
		}

		return array_search($case, $haystack);
	}
}
