@extends('apis.docs.layouts.default') 
@section('content')
<div class="docs-section">
  <h1 class="docs-header">Using the Branding API</h1>
  
  <h2 class="docs-sub-header">Endpoint</h2>
  All API URLs listed in this documentation are relative to <code>http://host.com/api/v1</code>
  
  <h2 class="docs-sub-header">HTTP Verbs</h2>
  Use standard HTTP verbs to indicate intent of a request:
  <ul>
    <li><kbd>GET</kbd> To retrieve a resource or a collection of resources</li>
    <li><kbd>POST</kbd> To create a resource</li>
    <li><kbd>PUT/PATCH</kbd> To modify a resource</li>
    <li><kbd>DELETE</kbd> To delete a resource </li>
  </ul>
  
  <h2 class="docs-sub-header">Output Formats</h2>
  <ul>
    <li>json (default)</li>
    <li>xml (coming soon)</li>
  </ul>
  
  <h2 class="docs-sub-header">HTTP Status Codes</h2>
  <p>We use HTTP status codes to indicate success or failure of a request.</p>
  <table class="table table-striped table-bordered table-hover docs-table">
	<thead>
	<tr>
	  <th></th>
	  <th></th>
	</tr>
	</thead>
	<tbody>
	<tr>
      <td>200 OK</td>
	  <td>Request succeeded. Response included</td>
	</tr>
    <tr>
      <td>400 Bad Request</td>
	  <td>Could not parse request. Invalid or missing argument</td>
	</tr>
	<tr>
      <td>404 Not Found</td>
	  <td>Resource not found</td>
	</tr>
	</tbody>
  </table>

  <h2 class="docs-sub-header">Responses</h2>
  <p>All response bodies are <a href="http://en.wikipedia.org/wiki/JSON">JSON</a> encoded.</p>
  <p>A single resource is represented as a JSON object:</p>
  <pre>{
  "data": {
    "field1": "value",
    "field2": true,
  }
}</pre>
  <p>A collection of resources is represented as a JSON array of objects:</p>
    <pre>{
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
}</pre>
  <p>Branding API use both an error message and an error code. The message is in a human-readable format; 
	 the code is something that API consumers can use to check if certain things happened and react to them in a proper way</p>
<pre>{
  "error": {
    "code": 200,
    "message": "detail error message",
  }
}</pre>
</div>

<div class="docs-section">
  <h2 class="docs-sub-header" id="field-filtering">Field Filtering</h2>
  <p>The Branding API consumer the ability choose the fields you want returned. Just pass in a <code>fields</code> query parameter with a comma separated list of fields you need</p>
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

<h2 class="docs-sub-header" id="sorting">Sorting</h2>
  <p>Some endpoints offer result sorting, triggered using the <code>sorts</code> query parameter.</p>
  <p>The value of sort is a comma separated list of fields to sort by. 
     Ascending is apply by default, but you can specify descending sort by prepending <code>-</code> to a field.</p>
  <p>For example, to get recently updated cars, sorted in descending order of updated_at:</p>
  <pre><kbd>GET</kbd> /api/v1/cars?<span class="field">sorts=-updated_at</span></pre>
  <blockquote>
    <p>Not all fields can be sorted on. The endpoint documentation will list supported sort options.</p>
  </blockquote>

<h2 class="docs-sub-header" id="counting">Counting</h2>
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
  <blockquote>
    <p>The count represents the total amount of available results, not the amount returned as part of the current response.</p>
  </blockquote>
  
<h2 class="docs-sub-header" id="pagination">Pagination</h2>
  <p>Requests for collections can return limited results, controlled using the <code>limit</code> and <code>offset</code> query parameters.</p>
  <p>For example:</p>
  <pre><kbd>GET</kbd> /api/v1/cars?<span class="field">limit=20&offset=100</span></pre>
  <blockquote>
    <p>All end points support pagination are limited to 10 and offset to 0 by default.</p>
  </blockquote>
  
<h2 class="docs-sub-header" id="embedding">Embedding</h2>
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