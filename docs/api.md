# AgentZero API Documentation

User agents can be parsed using the following static function:

## `agentzero::parse(string $ua) : agentzero|false`

Parses a User Agent string, and returns a `\hexydec\agentzero\agentzero` object with the following properties:

- `type` Indicates whether the UA string is a `human` or a `robot`
- `category` The category of device, e.g. `desktop` or `mobile`. For robots you will get values like `search` or `crawler`
- `vendor` The device vendor
- `device` The name of device
- `model` The device model
- `build` The build number of the device software
- `processor` The vendor name of the processor manufacturer
- `architecture` The system architecture
- `bits` The number of bit, either `32` or `64`
- `kernel` The name of the kernel, e.g. `Linux`
- `platform` The platform name
- `platformversion` The platform version number
- `engine` The name of the rendering engine, e.g. `Blink` or `WebKit`
- `engineversion` The version number of the rendering engine
- `browser` The name of the browser, e.g. `Firefox` or `Chrome`
- `browserversion` The browser version number
- `language` The language code, e.g. `en` or `en-GB`
- `app` The name of the app, e.g. `Facebook` or `YaSearchBrowser`. For robots it will be the name of the robot, e.g. `GoogleBot`
- `appversion` The version number of the application
- `url` The URL of the robot
- `proxy` If the browser session is routed through a proxy, it will be here, e.g. `googleweblight`

You can also access the following dynamic properties:

- `platformmajorversion` Returns the major version of the platform
- `enginemajorversion` Returns the major version of the rendering engine
- `browsermajorversion` Returns the major version of the browser
- `appmajorversion` Returns the major version of the app
- `host` The hostname extracted from the `url` properties