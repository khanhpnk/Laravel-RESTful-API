@extends('apis.docs.layouts.default') 
@section('content')
<div class="docs-section">
  <h1 class="docs-header">/cars</h1>
  Show all cars
  
  <h2 class="docs-sub-header">Resource URL</h2>
  <span class="method">GET</span> /api/v1/cars
  
  <h2 class="docs-sub-header">Resource Information</h2>
  <blockquote>
  	<p>Response formats: JSON</p>
  	<p>Requires authentication?: NO</p>
  	<p>Rate limited?: NO</p>
  </blockquote>
  
  <h2 class="docs-sub-header">Params</h2>
	<table class="table table-striped table-bordered table-hover docs-table">
	  <thead>
		<tr>
		  <th>Name</th>
		  <th>Description</th>
		  <th>Validate</th>
		</tr>
	  </thead>
	  <tbody>
	    <tr>
		  <td><span class="field">count</span></td>
		  <td>When set to either true or 1, retur will include specifies the total number of cars to retrieve</td>
		  <td><span class="type">enum(true, 1)</span></td>
		</tr>
	  	<tr>
		  <td>
		    <span class="field">fields</span>
		  </td>
		  <td>One or more of the set of valid fields, See <a href="{{ url('docs/branding-api/v1/using-branding-api#field-filtering') }}" target="_blank">Field Filtering</a></td>
		  <td>
		    <span class="type">string[]</span>
		    <span class="badge pull-right docs-collapse" data-toggle="collapse" data-target="#fields">Show/Hide</span>
			<div id="fields" class="collapse">
			  One of: <span class="field">maker</span>, <span class="field">model</span>, <span class="field">price</span>, 
			  <span class="field">year</span>
			</div>
		  </td>
		</tr>
		<tr>
		  <td><span class="field">maker</span></td>
		  <td>Maker of the car</td>
		  <td><span class="type">string</span></td>
		</tr>
		<tr>
		  <td><span class="field">model</span></td>
		  <td>Model of the car</td>
		  <td><span class="type">string</span></td>
		</tr>
		<tr>
		  <td><span class="field">end-price</span></td>
		  <td>Returns results with an price less than or equal to the specified price.</td>
		  <td><span class="type">enum(1000,2000,3000)</span></td>
		</tr>
	  </tbody>
	</table>
  <h2 class="docs-sub-header">Response</h2>
	<table class="table table-striped table-bordered table-hover docs-table">
	  <thead>
		<tr>
		  <th>Name</th>
		  <th>Description</th>
		  <th>Type</th>
		</tr>
	  </thead>
	  <tbody>
		<tr>
		  <td><span class="resource">id</span></td>
		  <td>ID of the car</td>
		  <td><span class="type">int</span></td>
		</tr>
		<tr>
		  <td><span class="field">maker</span></td>
		  <td>Maker of the car</td>
		  <td><span class="type">string</span></td>
		</tr>
		<tr>
		  <td><span class="field">model</span></td>
		  <td>Model of the car</td>
		  <td><span class="type">string</span></td>
		</tr>
		<tr>
		  <td><span class="field">year</span></td>
		  <td>Year of the car</td>
		  <td><span class="type">int</span></td>
		</tr>
	  </tbody>
	</table>
	
	<h2 class="docs-sub-header">Example Result</h2>
	<pre>{
  "data": [
    {
      "mention_count": 736602, 
      "location_results": [
        {
          "city": "Chicago", 
          "region": "Illinois", 
          "country": "US", 
          "continent": "north_america", 
          "mentions": 12500, 
        }, 
        {
          "city": "Los Angeles", 
          "region": "California", 
          "country": "US", 
          "continent": "north_america", 
          "mentions": 11950, 
        }, 
        {
          "city": "New York", 
          "region": "New York", 
          "country": "US", 
          "continent": "north_america", 
          "mentions": 11500, 
        }
      ]
    }
  ]
}
	</pre>
</div>
@stop