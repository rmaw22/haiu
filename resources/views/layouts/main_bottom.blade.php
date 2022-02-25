       <!-- jQuery first, then Popper.js, then Bootstrap JS -->
       <script src="{{ asset('resources/views/assets/clean/js/jquery.min.js') }}"></script>
       <script src="{{ asset('resources/views/assets/clean/js/popper.min.js') }}"></script>
       <script src="{{ asset('resources/views/assets/clean/js/bootstrap.min.js') }}"></script>
       <!-- Appear JavaScript -->
       <script src="{{ asset('resources/views/assets/clean/js/jquery.appear.js') }}"></script>
       <!-- Countdown JavaScript -->
       <script src="{{ asset('resources/views/assets/clean/js/countdown.min.js') }}"></script>
       <!-- Counterup JavaScript -->
       <script src="{{ asset('resources/views/assets/clean/js/waypoints.min.js') }}"></script>
       <script src="{{ asset('resources/views/assets/clean/js/jquery.counterup.min.js') }}"></script>
       <!-- Wow JavaScript -->
       <script src="{{ asset('resources/views/assets/clean/js/wow.min.js') }}"></script>
       <!-- Apexcharts JavaScript -->
       <script src="{{ asset('resources/views/assets/clean/js/apexcharts.js') }}"></script>
       <!-- lottie JavaScript -->
       <script src="{{ asset('resources/views/assets/clean/js/lottie.js') }}"></script>
       <!-- Slick JavaScript -->
       <script src="{{ asset('resources/views/assets/clean/js/slick.min.js') }}"></script>
       <!-- Select2 JavaScript -->
       <script src="{{ asset('resources/views/assets/clean/js/select2.min.js') }}"></script>
       <!-- Owl Carousel JavaScript -->
       <script src="{{ asset('resources/views/assets/clean/js/owl.carousel.min.js') }}"></script>
       <!-- Magnific Popup JavaScript -->
       <script src="{{ asset('resources/views/assets/clean/js/jquery.magnific-popup.min.js') }}"></script>
       <!-- Smooth Scrollbar JavaScript -->
       <script src="{{ asset('resources/views/assets/clean/js/smooth-scrollbar.js') }}"></script>
       <!-- Chart Custom JavaScript -->
       <script src="{{ asset('resources/views/assets/clean/js/chart-custom.js') }}"></script>
       <!-- Custom JavaScript -->
       <script src="{{ asset('resources/views/assets/clean/js/custom.js') }}"></script>
       <script src="{{ asset('resources/views/assets/js/extra.js') }}"></script>
       <!-- Optional JavaScript -->
       <!-- Scripts -->
       <script src="{{ asset('resources/views/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}" defer></script>
       <script src="{{ asset('resources/views/assets/js/tabler.min.js') }}" defer></script>
       <script src="{{ asset('resources/views/assets/js/masonry.pkgd.min.js') }}"></script>
       <script src="{{ asset('resources/views/assets/js/toastr.min.js') }}"></script>
       <script src="{{ asset('resources/views/assets/js/extra.js') }}"></script>
       <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
     
       @toastr_js
       @toastr_render
       @if(count($errors->write->all()) > 0)
       <script type="text/javascript">
         jQuery(document).ready(function() {
           jQuery("#post-modal").modal("show");
         });
       </script>
       @endif
       <?php

        use \App\Http\Controllers\HomeController;
        ?>
       <script type="text/javascript" src="{{ asset('resources/views/assets/js/please-wait.min.js') }}"></script>
       <script>
         $(document).ready(function() {
           @if(count($errors->write->all()) > 0)
            $("#post-modal").modal("show");
           @endif
           var minLength = parseInt('{{HomeController::getMinCharPosting()}}');
           var maxLength = parseInt('{{HomeController::getMaxCharPosting()}}');

           $("#story").on("keydown keyup change", function() {
             var value = $(this).val();
             if (value.length < minLength)
               $("#min_lenght").text("*Text is short");
             else if (value.length > maxLength)
               $("#min_lenght").text("Text is long");
             else
               $("#min_lenght").text("");
           });
         });
       </script>
        <script type="text/javascript">
         $(document).ready(function() {
           $("#search").autocomplete({
             source: "{{ url('/nav/autocomplete') }}",
             appendTo: "#selections",
             focus: function(event, ui) {
               $( "#search" ).val( ui.item.name ); // uncomment this line if you want to select value to search box  
               return false;
             },
             select: function(event, ui) {
               window.location.href = ui.item.url;
             }
           }).data("ui-autocomplete")._renderItem = function(ul, item) {
             var inner_html = '<a href="' + item.url + '" ><div class="list_item_container"><div class="image"><img src="' + item.image + '" class="img-fluid"></div><div class="labelItem mt-2 pt-2"><h4>' + item.title + '</h4></div></div></a>';
             return $("<li></li>")
               .data("item.autocomplete", item)
               .append(inner_html)
               .appendTo(ul);
           };

           $("#cekCari").autocomplete({
             source: "{{ url('/nav/autocomplete') }}",
             appendTo: "#selectionsModal",
             focus: function(event, ui) {
               $( "#cekCari" ).val( ui.item.name ); // uncomment this line if you want to select value to search box  
               return false;
             },
             select: function(event, ui) {
               window.location.href = ui.item.url;
             }
           }).data("ui-autocomplete")._renderItem = function(ul, item) {
             var inner_html = '<a href="' + item.url + '" ><div class="list_item_container"><div class="image"><img src="' + item.image + '" class="img-fluid"></div><div class="labelItem mt-2 pt-2"><h4>' + item.title + '</h4></div></div></a>';
             return $("<li></li>")
               .data("item.autocomplete", item)
               .append(inner_html)
               .appendTo(ul);
           };
         });
       </script>
       @stack('js')
       <script>
         function confirmDialog(message, handler){
          $(`<div class="modal fade" id="myModal" role="dialog"> 
            <div class="modal-dialog"> 
              <!-- Modal content--> 
                <div class="modal-content"> 
                  <div class="modal-body" style="padding:10px;"> 
                    <h4 class="text-center">${message}</h4> 
                    <div class="text-center"> 
                      <a class="btn btn-danger btn-yes">yes</a> 
                      <a class="btn btn-default btn-no">no</a> 
                    </div> 
                  </div> 
              </div> 
            </div> 
          </div>`).appendTo('body');
        
          //Trigger the modal
          $("#myModal").modal({
            backdrop: 'static',
            keyboard: false
          });
          
          //Pass true to a callback function
          $(".btn-yes").click(function () {
              handler(true);
              $("#myModal").modal("hide");
          });
            
          //Pass false to callback function
          $(".btn-no").click(function () {
              handler(false);
              $("#myModal").modal("hide");
          });

          //Remove the modal once it is closed.
          $("#myModal").on('hidden.bs.modal', function () {
              $("#myModal").remove();
          });
        }
       </script>
       </body>

       </html>