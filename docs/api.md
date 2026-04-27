# AgentZero API Documentation

## `agentzero::parse(string $ua, array $hints = [], array $config = []) : agentzero|false`

Parses a User Agent string and returns a `\hexydec\agentzero\agentzero` object on success, or `false` if the string could not be parsed (e.g. empty string, longer than 2000 characters, or produces no recognisable tokens).

The optional `$hints` parameter accepts an array of [Client Hint](#client-hints) header values. The optional `$config` parameter accepts an [array of configuration options](#configuration).

The returned object has the following properties:

### `type`

Indicates whether the UA string is a `human` or a `robot`

### `category`

The category of device, possible values where the `type` is `human` are:

- `desktop`
- `tablet`
- `mobile`
- `vr`
- `tv`
- `console`

For robots the possible values are:

- `search`
- `ads`
- `crawler`
- `feed`
- `scraper`
- `validator`
- `monitor`

### `vendor`

The name of the device vendor.

### `device`

The name of device.

### `model`

The device model number.

### `build`

The build number of the device software.

### `ram`

The amount of RAM in the device in megabytes, as reported by the `Device-Memory` client hint.

### `processor`

The vendor name of the processor manufacturer.

### `architecture`

The system architecture, possible values are:

- `x86`
- `itanium`
- `arm`
- `Sun`
- `Spark V9`

### `bits`

The number of bits, either `32` or `64`.

### `cpu`

The CPU model identifier as reported in the UA string.

### `cpuclock`

The CPU clock speed in MHz as reported in the UA string.

### `kernel`

The name of the kernel, e.g. `Linux`

### `platform`

The platform name

### `platformversion`

The platform version number

### `engine`

The name of the rendering engine, possible values are:

- `Gecko`
- `Blink`
- `WebKit`
- `Presto`
- `Trident`
- `Goanna`

### `engineversion`

The version number of the rendering engine

### `browser`

The name of the browser, e.g. `Firefox` or `Chrome`

### `browserversion`

The browser version number

### `browserreleased`

The date the browser version was released.

### `browserstatus`

The current status of the browser:

- `nightly`: A nightly build (3 major versions ahead of latest)
- `canary`: A canary build (2 major versions ahead of latest)
- `beta`: A beta build (1 major version ahead of latest)
- `current`: The browser is the current version
- `previous`: The browser is a previous version
- `outdated`: The browser was released 2 or more years ago
- `legacy`: The browser was released more than 5 years ago

Requires `versionscache` to be set in `$config`. Returns `null` if version data is unavailable.

### `browserlatest`

The version number of the latest browser from this vendor.

### `language`

The language code, e.g. `en` or `en-GB`, this will be normalised with lowercase, dash, uppercase format

### `app`

The name of the app (Normalised), e.g. `Facebook` or `YaSearchBrowser`. For robots it will be the name of the robot, e.g. `GoogleBot`

### `appname`

The name of the app or robot as it is written in the User-Agent string

### `appversion`

The version number of the application

### `framework`

The app framework used to build the app

### `frameworkversion`

The version of tthe app framework

### `url`

The URL of the robot.

### `nettype`

The network connection type as reported by the `ECT` client hint, e.g. `4g`, `3g`, `2g`, `slow-2g`.

### `proxy`

If the browser session is routed through a proxy, it will be here, e.g. `googleweblight`

### `width`

The width of the device screen.

### `height`

The height of the device screen.

### `density`

The pixel density of the device screen.

### `dpi`

The dots per inch of the device screen.

### `darkmode`

`true` if the device is in dark mode, as reported in the UA string. `null` if unknown.

## Dynamic Properties

The following read-only properties are calculated on access via `__get()` and return `int|null`:

| Property | Returns |
|---|---|
| `browsermajorversion` | Integer major version of `browserversion` |
| `enginemajorversion` | Integer major version of `engineversion` |
| `platformmajorversion` | Integer major version of `platformversion` |
| `appmajorversion` | Integer major version of `appversion` |
| `host` | Hostname from `url`, with any `www.` prefix stripped. Returns `null` if `url` is `null`. |

## Client Hints

Use `agentzero::getHints(?array $headers = null) : array` to extract relevant client hint headers. Pass `null` (or omit the argument) to read from `$_SERVER`, or pass an associative array of HTTP header name → value pairs for testing or non-`$_SERVER` environments. Header names are matched case-insensitively.

Recognised hint headers: `Sec-CH-UA-Mobile`, `Sec-CH-UA-Full-Version-List`, `Sec-CH-UA-Platform`, `Sec-CH-UA-Platform-Version`, `Sec-CH-UA-Model`, `Device-Memory`, `Width`, `ECT`.

## Configuration

The `$config` array passed to `parse()` supports the following keys:

| Key | Type | Default | Description |
|---|---|---|---|
| `versionscache` | `string\|null` | `null` | Absolute path to the local JSON cache file for browser version data. Version properties (`browserstatus`, `browserreleased`, `browserlatest`) are `null` unless this is set. |
| `versionssource` | `string` | GitHub URL | URL of the remote versions JSON file. Only fetched when the cache is missing or stale. |
| `versionscachelife` | `int` | `604800` | Cache TTL in seconds (default: 7 days). |
| `currentdate` | `\DateTime\|null` | `null` | Pin the "current date" used when calculating `browserstatus`. Useful for reproducible tests or historical analysis. |