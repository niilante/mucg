@if($message = \Session::get("message"))

<script>
   (function($) {
  showToast = function(title, message) {
    'use strict';
    var loaderBgs = {'success' : '#f96868', 'info' : '#46c35f', 'warning' : '#57c7d4', 'error' : '#f2a654'}
    resetToastPosition();
    $.toast({
      heading: title.toUpperCase(),
      text: message,
      showHideTransition: 'slide',
      icon: title,
      hideAfter : 120000,
      loaderBg: loaderBgs[title],
      position: 'top-right'
    })
  };
  showToastPosition = function(position) {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Positioning',
      text: 'Specify the custom position object or use one of the predefined ones',
      position: String(position),
      icon: 'success',
      stack: false,
      loaderBg: '#f96868'
    })
  }
  showToastInCustomPosition = function() {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Custom positioning',
      text: 'Specify the custom position object or use one of the predefined ones',
      icon: 'success',
      position: {
        left: 120,
        top: 120
      },
      stack: false,
      loaderBg: '#f96868'
    })
  }
  resetToastPosition = function() {
    $('.jq-toast-wrap').removeClass('bottom-left bottom-right top-left top-right mid-center'); // to remove previous position class
    $(".jq-toast-wrap").css({
      "top": "",
      "left": "",
      "bottom": "",
      "right": ""
    }); //to remove previous position style
  }

  <?php

  $titles = ["info", "success", "warning", "error"];

  $message_title = "info";

  if($message_title = \Session::get("message_title")) {
       if(!in_array(strtolower($message_title), $titles)) {
         $message_title = "info";

       }
  }

   // if($message_title = \Session::get("message_title") && !in_array(strtolower($message_title), $titles)) {
   //    $message_title = "info";
   // }

  ?>

  title = "{{  strtolower($message_title) }}";
  message = "{{  $message }}";
  showToast(title, message);
})(jQuery);



</script>


@endif