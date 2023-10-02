<?php

// [START translate_translate_text]
use Google\Cloud\Translate\TranslateClient;

/** Uncomment and populate these variables in your code */
// $text = 'The text to translate.';
// $targetLanguage = 'ja';  // Language to translate to

$translate = new TranslateClient();

$results = $translate->detectLanguageBatch([
  'Hello World!',
  'My name is David.'
]);

foreach ($results as $result) {
  echo $result['languageCode'];
}
