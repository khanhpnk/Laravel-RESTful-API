@extends('apis.docs.layouts.default') 
@section('content')
<div class="docs-section">
  <h1 class="docs-header">Using the Branding API</h1>
  
  <h2 class="docs-sub-header">Requests</h2>
  The base URL of the API is 
  <code>http://host.com/api/v1</code>
  
  <h2 class="docs-sub-header">HTTP Verbs</h2>
  We use standard HTTP verbs to indicate intent of a request:
  <ul>
    <li><kbd>GET</kbd> To retrieve a resource or a collection of resources</li>
    <li><kbd>POST</kbd> To create a resource</li>
    <li><kbd>PUT / PATCH</kbd> To modify a resource</li>
    <li><kbd>DELETE</kbd> To delete a resource </li>
  </ul>
  
  <h2 class="docs-sub-header">HTTP Status Codes</h2>
  We use HTTP status codes to indicate success or failure of a request.
  Success codes:
    200 OK - Request succeeded. Response included
    201 Created - Resource created. URL to new resource in Location header
    204 No Content - Request succeeded, but no response body

  Error codes:
    400 Bad Request - Could not parse request
    401 Unauthorized - No authentication credentials provided or authentication failed
    403 Forbidden - Authenticated user does not have access
    404 Not Found - Resource not found
    415 Unsupported Media Type - POST/PUT/PATCH request occurred without a application/json content type
    422 Unprocessable Entry - A request to modify or create a resource failed due to a validation error
    429 Too Many Requests - Request rejected due to rate limiting
    500, 501, 502, 503, etc - An internal server error occured
  
  <h2 class="docs-sub-header">Responses</h2>
  <p>All response bodies are <a href="http://en.wikipedia.org/wiki/JSON">JSON</a> encoded.</p>
  <p>A single resource is represented as a JSON object:</p>
  <pre>
{
  "data": {
    "field1": "value",
    "field2": true,
  }
}
  </pre>
  <p>A collection of resources is represented as a JSON array of objects:</p>
    <pre>
{
  "data": [
    {
      "field1": "value",
      "field2": true,
    },
    {
      "field1": "value",
      "field2": true,
    }
  ]  	
}
  </pre>
  <p>All 400 & 500 series errors, the JSON response body will include an array of error messages:</p>
<pre>
{
  "error": {
    "code": 200,
    "message": "detail error message",
  }
}
  </pre>
</div>

<div class="docs-section">
  <h2 class="docs-sub-header" id="field-filtering">Field Filtering</h2>
  <p>By default, not all the fields are returned when you make a query. You can choose the fields you want returned. Just pass in a <code>fields</code> query parameter with a comma separated list of fields you need</p>
  <p>This is really useful for making your API calls more efficient and fast.</p>
  <p>For example, the following Braning API call will only return the id, and maker in cars:</p>
  <pre><kbd>GET</kbd> /api/v1/cars?<span class="field">fields=id,maker</span></pre>
  <p>Would have the following response body:</p>
  <pre>{
  "data": [
    {
      "id": 1231003,
      "maker": "TOYOTA",
    },
    {
      "id": 1231004,
      "maker": "HONDA",
    }
  ]  	
}</pre>

<h2 class="docs-sub-header">Counting</h2>
  <p>Endpoints that return a collection can provide a count of the total number of results.</p>
  <p>To request a count, just include a <code>count=true</code> or <code>count=1</code> as a query parameter.</p>
  <p>For example:</p>
  <pre><kbd>GET</kbd> /api/v1/cars?<span class="field">count=true</span></pre>
  <p>Would have the following response body:</p>
  <pre>{
  "data": [
    {
      "id": 1231003,
      "maker": "TOYOTA",
    },
    {
      "id": 1231004,
      "maker": "HONDA",
    }
  ],
  "total": 4000  	
}</pre>
  <p>Note that the count represents the total amount of available results, not the amount returned as part of the current response.</p>

<h2 class="docs-sub-header">Pagination</h2>
  <p>Requests for collections can return limited results, controlled using the <code>limit</code> and <code>offset</code> query parameters.</p>
  <p>All end points support pagination are limited to 10 results by default.</p>
  <p>For example:</p>
  <pre><kbd>GET</kbd> /api/v1/cars?<span class="field">limit=20&offset=100</span></pre>

<h2 class="docs-sub-header">Sorting</h2>
  <p>Some endpoints offer result sorting, triggered using the <code>sort</code> query parameter.</p>
  <p>The value of sort is a comma separated list of fields to sort by. You can specify descending sort by prepending <code>-</code> to a field.</p>
  <p>For example, to get recently updated cars, sorted in descending order of updated_at:</p>
  <pre><kbd>GET</kbd> /api/v1/cars?<span class="field">sort=-updated_at</span></pre>
  <p>Not all fields can be sorted on. The endpoint documentation will list supported sort options.</p>
  
<h2 class="docs-sub-header">Embedding</h2>
  <p>Many endpoints support embedding related resources to minimize the number of required API round trips.</p>
  <p>Embedding is triggered by passing in an <code>embed</code> query parameter.</p>
  <p>For example:</p>
  <pre><kbd>GET</kbd> /api/v1/cars/1231003?<span class="field">embed=images</span></pre>
  <p>Would have the following response body:</p>
  <pre>{
  "data": {
    "id": 1231003,
    "maker": "TOYOTA",
    "images": [
      {
        "path": "100/1231003IN001.JPG" 
      },
      {
        "path": "100/1231003RR001.JPG" 
      }
    ] 
  }
}</pre>
</div>
@stop