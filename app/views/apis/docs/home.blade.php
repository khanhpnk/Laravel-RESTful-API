@extends('apis.docs.layouts.default') 
@section('content')
<div class="docs-section">
  <h1 class="docs-header">Branding API V1</h1>

  <div class="row marketing">
        <div class="col-md-6">
          <h4><a href="{{ url('docs/branding-api/v1/using-branding-api') }}">Using the Branding API</a></h4>
          <p>Learn how to publish to and retrieve data from Dolphinet using the Branding API.</p>
          
          <h4>Developer Branding API Explorer</h4>
          <p>Learn how to using tool for develop the Branding API.</p>
        </div>

        <div class="col-md-6">
          <h4><a href="{{ url('docs/branding-api/v1/reference') }}">Reference</a></h4>
          <p>Get the full details of all the nodes and fields in the Branding API.</p>

          <h4>Branding API and SDKs</h4>
          <p>Learn how to use our PHP SDKs with the Branding API.</p>

          <h4><a href="{{ url('docs/branding-api/v1/changelog') }}">Changelog</a></h4>
          <p>See what has changed in APIs and SDKs.</p>
        </div>
      </div>

</div>
@stop