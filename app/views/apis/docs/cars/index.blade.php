@extends('apis.docs.layouts.default') 
@section('content')
<div class="docs-section">
  <h1 class="docs-header">/cars</h1>
  Show all cars
  
  <h2 class="docs-sub-header">Endpoint</h2>
  <pre><kbd>GET</kbd> /api/v1/cars</pre>
  
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
		  <td><span class="field">fields</span></td>
		  <td>One or more of the set of valid fields, See <a href="{{ url('docs/branding-api/v1/using-branding-api#field-filtering') }}" target="_blank">Field Filtering</a></td>
		  <td>One of: <span class="field">maker</span>, 
		              <span class="field">model</span>, 
		              <span class="field">price</span>, 
			          <span class="field">year</span>
		  </td>
		</tr>
		<tr>
		  <td><span class="field">sorts</span></td>
		  <td>Result sorting, See <a href="{{ url('docs/branding-api/v1/using-branding-api#sorting') }}" target="_blank">Sorting</a></td>
		  <td>One of: <span class="field">id</span>, 
		              <span class="field">maker</span>,
		  </td>
		</tr>
		<tr>
		  <td><span class="field">count</span></td>
		  <td>return will include specifies the total number of cars to retrieve, See <a href="{{ url('docs/branding-api/v1/using-branding-api#counting') }}" target="_blank">Counting</a></td>
		  <td><span class="type">enum(true, 1)</span></td>
		</tr>
		<tr>
		  <td><span class="field">limit</span></td>
		  <td>limited results, See <a href="{{ url('docs/branding-api/v1/using-branding-api#pagination') }}" target="_blank">Pagination</a></td>
		  <td>int</td>
		<tr>
		<tr>
		  <td><span class="field">offset</span></td>
		  <td>offseted results, See <a href="{{ url('docs/branding-api/v1/using-branding-api#pagination') }}" target="_blank">Pagination</a></td>
		  <td>int</td>
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
	<pre></pre>
</div>
@stop