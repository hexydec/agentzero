<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class languages {

	/**
	 * Generates a configuration array for matching languages
	 * 
	 * @return array<string,props> An array with keys representing the string to match, and values a props object defining how to generate the match and which properties to set
	 */
	public static function get() : array {
		$languages = [
			'af' => 'Afrikaans',
			'sq' => 'Albanian',
			'ar' => 'Arabic (Standard)',
			'hy' => 'Armenian',
			'as' => 'Assamese',
			'ast' => 'Asturian',
			'az' => 'Azerbaijani',
			'eu' => 'Basque',
			'bg' => 'Bulgarian',
			'be' => 'Belarusian',
			'bn' => 'Bengali',
			'bs' => 'Bosnian',
			'br' => 'Breton',
			'my' => 'Burmese',
			'ca' => 'Catalan',
			'ch' => 'Chamorro',
			'ce' => 'Chechen',
			'zh' => 'Chinese',
			'cv' => 'Chuvash',
			'co' => 'Corsican',
			'cr' => 'Cree',
			'hr' => 'Croatian',
			'cs' => 'Czech',
			'da' => 'Danish',
			'nl' => 'Dutch (Standard)',
			'en' => 'English',
			'eo' => 'Esperanto',
			'et' => 'Estonian',
			'fo' => 'Faeroese',
			'fa' => 'Farsi',
			'fj' => 'Fijian',
			'fi' => 'Finnish',
			'fr' => 'French (Standard)',
			'fy' => 'Frisian',
			'fur' => 'Friulian',
			'gd' => 'Gaelic (Scots)',
			'gl' => 'Galacian',
			'ka' => 'Georgian',
			'de' => 'German (Standard)',
			'el' => 'Greek',
			'gu' => 'Gujurati',
			'ht' => 'Haitian',
			'he' => 'Hebrew',
			'hi' => 'Hindi',
			'hu' => 'Hungarian',
			'is' => 'Icelandic',
			'id' => 'Indonesian',
			'iu' => 'Inuktitut',
			'ga' => 'Irish',
			'it' => 'Italian (Standard)',
			'ja' => 'Japanese',
			'kn' => 'Kannada',
			'ks' => 'Kashmiri',
			'kk' => 'Kazakh',
			'km' => 'Khmer',
			'ky' => 'Kirghiz',
			'tlh' => 'Klingon',
			'ko' => 'Korean',
			'la' => 'Latin',
			'lv' => 'Latvian',
			'lt' => 'Lithuanian',
			'lb' => 'Luxembourgish',
			'mk' => 'FYRO Macedonian',
			'ms' => 'Malay',
			'ml' => 'Malayalam',
			'mt' => 'Maltese',
			'mi' => 'Maori',
			'mr' => 'Marathi',
			'mo' => 'Moldavian',
			'nv' => 'Navajo',
			'ng' => 'Ndonga',
			'ne' => 'Nepali',
			'no' => 'Norwegian',
			'nb' => 'Norwegian (Bokmal)',
			'nn' => 'Norwegian (Nynorsk)',
			'oc' => 'Occitan',
			'or' => 'Oriya',
			'om' => 'Oromo',
			'pl' => 'Polish',
			'pt' => 'Portuguese',
			'pa' => 'Punjabi',
			'qu' => 'Quechua',
			'rm' => 'Rhaeto-Romanic',
			'ro' => 'Romanian',
			'ru' => 'Russian',
			'sz' => 'Sami (Lappish)',
			'sg' => 'Sango',
			'sa' => 'Sanskrit',
			'sc' => 'Sardinian',
			'sd' => 'Sindhi',
			'si' => 'Singhalese',
			'sr' => 'Serbian',
			'sk' => 'Slovak',
			'sl' => 'Slovenian',
			'so' => 'Somani',
			'sb' => 'Sorbian',
			'es' => 'Spanish',
			'sx' => 'Sutu',
			'sw' => 'Swahili',
			'sv' => 'Swedish',
			'ta' => 'Tamil',
			'tt' => 'Tatar',
			'te' => 'Teluga',
			'th' => 'Thai',
			'tig' => 'Tigre',
			'ts' => 'Tsonga',
			'tn' => 'Tswana',
			'tr' => 'Turkish',
			'tk' => 'Turkmen',
			'uk' => 'Ukrainian',
			'hsb' => 'Upper Sorbian',
			'ur' => 'Urdu',
			've' => 'Venda',
			'vi' => 'Vietnamese',
			'vo' => 'Volapuk',
			'wa' => 'Walloon',
			'cy' => 'Welsh',
			'xh' => 'Xhosa',
			'ji' => 'Yiddish',
			'zu' => 'Zulu',
			'in' => 'India'
		];
		$fn = function (string $value, int $i, array $tokens, string $match) : ?array {
			if ($value === $match) {
				return ['language' => $value];
			} else {
				$len = \strlen($match);
				$value = \str_replace('_', '-', $value);
				$letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				if (\str_starts_with($value, $match.'-') && \strlen($value) === $len + 3 && \strspn($value, $letters, $len + 1, 2) === 2) {
					return ['language' => $match.'-'.\strtoupper(\substr($value, $len + 1, 2))];
				}
			}
			return null;
		};
		$lang = function (string $value) use ($languages): ?array {
			$value = \str_replace('_', '-', \explode('/', $value)[1]);
			$lang = \mb_strtolower(\mb_substr($value, 0, 2));
			$len = \mb_strlen($value);
			if (isset($languages[$lang]) && \in_array($len, [2, 5, 10], true)) {
				if ($len > 2 && \mb_strpos($value, '-') === 2) {
					if ($len === 5) {
						$suffix = '-'.\strtoupper(\mb_substr($value, 3, 2));
					} elseif (\mb_strpos($value, '-', 3) === 7) {
						$suffix = '-'.\strtoupper(\mb_substr($value, 8, 2));
					}
				}
				return ['language' => $lang.($suffix ?? '')];
			}
			return null;
		};
		$config = [
			'Language/' => new props('start', $lang),
			'ByteLocale/' => new props('start', $lang),
			'ByteFullLocale/' => new props('start', $lang),
			'FBLC/' => new props('start', $lang),
		];
		foreach (\array_keys($languages) AS $key) {
			$config[$key] = new props('start', $fn);
		}
		return $config;
	}
}