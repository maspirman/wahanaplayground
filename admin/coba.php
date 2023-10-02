<?php
// //whether ip is from share internet
// if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//   $ip_address = $_SERVER['HTTP_CLIENT_IP'];
// }
// //whether ip is from proxy
// elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//   $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
// }
// //whether ip is from remote address
// else {
//   $ip_address = $_SERVER['REMOTE_ADDR'];
// }
// echo 'Your IP: ' . $ip_address;
?>
<!DOCTYPE html>
<html lang="en-US">

<body>

  <h1>My Web Page</h1>

  <p>Hello everybody!</p>

  <p>Translate this page:</p>


  <div id="google_translate_element"></div>

  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'id',
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE
      }, 'google_translate_element');
    }
  </script>

  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

  <p>You can translate the content of this page by selecting a language in the select box.</p>

</body>

</html>