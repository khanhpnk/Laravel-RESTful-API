@extends('apis.docs.layouts.default') 
@section('content')
<div class="docs-section">
  <h1 class="docs-header">/cars/:id</h1>
  Show detail car
  <h2 class="docs-sub-header">Request</h2>
  <span class="method">GET</span> /api/v1/cars/:id
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
		<tr>
		  <td><span class="field">images</span></td>
		  <td>List images of the car</td>
		  <td><span class="type">array</span> containing the <span class="field">images</span></td>
		</tr>
	  </tbody>
	</table>
</div>
@stop