@extends('layouts.app2')
@section('content')
<div id="content-page" class="content-page" style="padding-top:115px !important;">
    <div class="container">
        <!-- Row -->
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card">
                    
                    <div class="card-header bg-primary">
                        <h2 class="card-title text-white">
                            {{ $page->title }}
                        </h2>
                    </div>
                    
                    <div class="card-body">
                        
                        {!! clean($page->body) !!}
                        
                    </div>
                </div>
            </div>
            
        </div>
        <!-- end Row -->
    </div>
</div>
@endsection('content')