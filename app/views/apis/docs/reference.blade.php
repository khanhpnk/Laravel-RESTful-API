@extends('apis.docs.layouts.default') 
@section('content')
<div class="docs-section">
  <h1 class="docs-header">Branding API V1 Reference</h1>
  This is a full list of root nodes of the Graph API, with links to the reference docs for each. 
  <h2 class="docs-sub-header">Root Nodes</h2>
	<table class="table table-striped table-bordered table-hover docs-table">
	  <thead>
		<tr>
		  <th>Endpoint</th>
		  <th>Represents</th>
		</tr>
	  </thead>
	  <tbody>
		<tr>
		  <td><a href="{{ url('docs/branding-api/v1/reference/cars') }}"><span class="resource">/cars</span></a></td>
		  <td>A car.</td>
		</tr>
		<tr>
		  <td><a href="{{ url('docs/branding-api/v1/reference/makers') }}"><span class="resource">/makers</span></a></td>
		  <td>A maker.</td>
		</tr>
	  </tbody>
	</table>
</div>
@stop