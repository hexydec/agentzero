<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class props {

	/**
	 * @var string $type The type of search to use when matching - start|any|end|exact
	 */
	protected string $type;

	/**
	 * @var array<string,string|int|bool>|\Closure $props An array of properties to set when matched, or a closure that generates the properties
	 */
	protected array|\Closure $props;

	/**
	 * Creates a props object
	 * 
	 * @param string $type The type of search to use when matching - start|any|end|exact
	 * @param array<string,string|int|bool>|\Closure $props An array of properties to set when matched, or a closure that generates the properties
	 */
	public function __construct(string $type, array|\Closure $props) {
		$this->type = $type;
		$this->props = $props;
	}

	/**
	 * Match tokens against this property
	 * 
	 * @param \stdClass $obj A stdClass object to push the matched properties into
	 * @param string $search The string to match
	 * @param array<string> $tokens An array of tokens
	 * @param array<string> $tokenslower The same array of tokens, but with te values lowercased
	 * @return void
	 */
	public function match(\stdClass $obj, string $search, array $tokens, array $tokenslower) : void {
		$type = $this->type;
		$searchlower = \mb_strtolower($search);
		foreach ($tokenslower AS $i => $item) {
			switch ($type) {

				// match exact string
				case 'exact':
					if ($item === $searchlower) {
						$this->set($obj, $tokens[$i], $i, $tokens, $search);
						break 2;
					} else {
						break;
					}

				// match from start of string
				case 'start':
					if (\str_starts_with($item, $searchlower)) {
						$this->set($obj, $tokens[$i], $i, $tokens, $search);
					}
					break;

				// match anywhere in the string
				case 'any':
					if (\str_contains($item, $searchlower)) {
						$this->set($obj, $tokens[$i], $i, $tokens, $search);
					}
					break;

				// match end of token
				case 'end':
					if (\str_ends_with($item, $searchlower)) {
						$this->set($obj, $tokens[$i], $i, $tokens, $search);
					}
					break;
			}
		}
	}

	/**
	 * Sets parsed UA properties, and calls callbacks to generate properties and sets them to the output object
	 * 
	 * @param \stdClass $obj A stdClass object to which the properties will be set
	 * @param string $value The current token value
	 * @param int $i The ID of the current token
	 * @param array<string> $tokens The tokens array
	 * @param string $key The string that was matched in the token
	 * @return void
	 */
	protected function set(\stdClass $obj, string $value, int $i, array $tokens, string $key) : void {
		$props = $this->props;
		if ($props instanceof \Closure) {
			$props = $props($value, $i, $tokens, $key);
		}
		if (\is_array($props)) {
			foreach ($props AS $key => $item) {
				if ($item !== null && !isset($obj->{$key})) {
					$obj->{$key} = $item;
				}
			}
		}
	}
}