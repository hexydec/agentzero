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
	 * @param array<string> $tokens An array of tokens to match against
	 * @return void
	 */
	public function match(\stdClass $obj, string $search, array $tokens) : void {
		$type = $this->type;
		$searchlower = \mb_strtolower($search);
		foreach ($tokens AS $i => $token) {
			$tokenlower = \mb_strtolower($token);
			switch ($type) {

				// match from start of string
				case 'start':
					if (\str_starts_with($tokenlower, $searchlower)) {
						$this->set($obj, $token, $i, $tokens, $search);
					}
					break;

				// match anywhere in the string
				case 'any':
					if (\str_contains($tokenlower, $searchlower)) {
						$this->set($obj, $token, $i, $tokens, $search);
					}
					break;

				// match end of token
				case 'end':
					if (\str_ends_with($tokenlower, $searchlower)) {
						$this->set($obj, $token, $i, $tokens, $search);
					}
					break;

				// match anywhere in the string
				case 'exact':
					if ($tokenlower === $searchlower) {
						$this->set($obj, $token, $i, $tokens, $search);
						break 2;
					} else {
						break;
					}
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