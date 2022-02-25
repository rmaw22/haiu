<div class="modal modal-blur fade" id="searchModal" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Search</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                        <div class="ms-md-auto ps-md-2 py-2 py-md-0 me-md-2 order-first order-md-last flex-grow-1 w-100">
                           <form action="{{ route('search') }}" method="get" class="searchbox">
                              @csrf
                                    <div class="input-group mb-3">
                                       <input type="text"  class="w-75 @error('key') is-invalid @enderror text search-input" name="key" value="{{old('key', app('request')->input('key'))}}" type="search" placeholder="{{ __('main.nav_search') }}" aria-label="Search in website" autocomplete="off" id="cekCari" autofocus>
                                       <div class="input-group-append">
                                                <button class="btn btn-primary search-link" type="submit"><i class="ri-search-line" ></i></button>
                                       </div>                                      
                                    </div>                                     
                                 
                                    <span id="selectionsModal">

                                    </span>
                                    @error('key')
                                    <span class="invalid-feedback" role="alert" style="line-height: 0px !important;">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                 
                           </form>
                        </div>
            </div>
            
        </div>
    </div>
</div>