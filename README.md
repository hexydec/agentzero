# AgentZero: Fast User-Agent Detection

Most User-Agent detection libraries rely on lists of regular expressions to match user agent string patterns and extract information. 

With lots of patterns you can do an ok job of getting this info, but it is not dynamic enough, which leads to minor variations or new versions not being captured, and they tend to be quite slow.

AgentZero is a simple string matching library that splits the user agent strings up into tokens to extract information from each part, leading to more complete information, more flexibility in capturing new user agent strings, and better performance.
