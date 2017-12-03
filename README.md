# givip
Microservice for raw, JSON, JSONP &amp; XML endpoints for request information

**Base URL:** `https://givip.eu`

## Available endpoints
The following endpoints are available:

### /
Information about the microservice and endpoints in JSON format.

### /ip
Returns the IP address of the request.

**Available formats:**
 - Raw format: `/ip` 
 - JSON format: `/ip/json`
    - _If you need a CORS header in your response, please pass `?cors=1` as query parameter._
 - JSONP format: `/ip/jsonp?q=callbackName`
 - XML format: `/ip/xml`
 
### /useragent
Returns the used useragent of the request.

**Available formats:**
 - Raw format: `/useragent` 
 - JSON format: `/useragent/json`
    - _If you need a CORS header in your response, please pass `?cors=1` as query parameter._
 - JSONP format: `/useragent/jsonp?q=callbackName`
 - XML format: `/useragent/xml`
 
### /content_length
Returns the exact content length of the request.

**Available formats:**
 - Raw format: `/content_length` 
 - JSON format: `/content_length/json`
    - _If you need a CORS header in your response, please pass `?cors=1` as query parameter._
 - JSONP format: `/content_length/jsonp?q=callbackName`
 - XML format: `/content_length/xml`
 
### /content_type
Returns the requested content type of the request.

**Available formats:**
 - Raw format: `/content_type` 
 - JSON format: `/content_type/json`
    - _If you need a CORS header in your response, please pass `?cors=1` as query parameter._
 - JSONP format: `/content_type/jsonp?q=callbackName`
 - XML format: `/content_type/xml`
 
### /referer
Returns the specified referrer (referer header) of the request.

**Available formats:**
 - Raw format: `/referer` 
 - JSON format: `/referer/json`
    - _If you need a CORS header in your response, please pass `?cors=1` as query parameter._
 - JSONP format: `/referer/jsonp?q=callbackName`
 - XML format: `/referer/xml`
 
### /request_method
Returns the used method of the request.

**Available formats:**
 - Raw format: `/request_method` 
 - JSON format: `/request_method/json`
    - _If you need a CORS header in your response, please pass `?cors=1` as query parameter._
 - JSONP format: `/request_method/jsonp?q=callbackName`
 - XML format: `/request_method/xml`
