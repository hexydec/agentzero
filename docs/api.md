# AgentZero API Documentation

User agents can be parsed using the following static function:

## `agentzero::parse(string $ua) : agentzero|false`

Parses a User Agent string, and returns a `\hexydec\agentzero\agentzero` object with the following properties:

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

The number of bit, either `32` or `64`

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

The URL of the robot

### `proxy`

If the browser session is routed through a proxy, it will be here, e.g. `googleweblight`

### `width`

The width of the device screen.

### `height`

The height of the device screen.

### `density`

The density of the device screen.
### `dpi`

The dots per inch of the device screen.

### Dynamic Properties

You can also access the following dynamic properties:

- `platformmajorversion` Returns the major version of the platform
- `enginemajorversion` Returns the major version of the rendering engine
- `browsermajorversion` Returns the major version of the browser
- `appmajorversion` Returns the major version of the app
- `host` The hostname extracted from the `url` properties