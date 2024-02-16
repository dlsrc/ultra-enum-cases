<?php declare(strict_types=1);
/**
 * (c) 2005-2024 Dmitry Lebedev <dl@adios.ru>
 * This source code is part of the Ultra library.
 * Please see the LICENSE file for copyright and licensing information.
 */
namespace Ultra\Enum;

trait Cases {
	/**
	 * Найти вариант перечисления по имени варианта для текущего типа. Вернуть вариант
	 * перечисления с указанным именем, либо значение NULL, если в текущем перечислении вариант
	 * отсутствует.
	 */
	final public static function getCaseByName(string $name, self|null $default = null): self|null {
		foreach(self::cases() as $case) {
			if ($name == $case->name) {
				return $case;
			}
		}

		return null;
	}

	/**
	 * Возвращает вариант по его порядковому номеру в списке вариантов текщего перечисления,
	 * указанному в первом аргументе. Нумерация порядковых номеров начинается с нуля.
	 * Значение $id может быть отрицательным, тогда поиск варианта будет происходить с конца,
	 * -1 будет означать последний вариант, -2 — предпоследний и т.д.
	 * Если вариант с указанным порядковым номером не найден, метод вернёт NULL.
	 * В качестве альтернативы, вторым необязательным аргументом можно передать экземпляр
	 * перечесления, который будет использован по умолчанию.
	 */
	final public static function getCaseById(int $id, self|null $default = null): self|null {
		if (!$cases = self::cases()) {
			return null;
		}

		if ($id < 0) {
			$id = $id + count($cases);
		}

		return $cases[$id] ?? $default;
	}
}
