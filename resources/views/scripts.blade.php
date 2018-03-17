{{-- Global configuration object --}}
@php
  $config = [
      'i18n' => [
          'defaultLocale' => config('app.defaultLocale'),
          'current' => $locale = app()->getLocale(),
          'locales' => config('app.locales'),
          'translations' => [$locale => \App\Translation::getTranslationsForLocale($locale)]
      ]
  ];
$polyfills = [
  'Promise',
  'Object.assign',
  'Object.values',
  'Array.prototype.find',
  'Array.prototype.findIndex',
  'Array.prototype.includes',
  'String.prototype.includes',
  'String.prototype.startsWith',
  'String.prototype.endsWith',
];
@endphp
<script src="https://cdn.polyfill.io/v2/polyfill.min.js?features={{ implode(',', $polyfills) }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
<script>WebFont.load({google:{families: ['Roboto:300,400,500,700', 'Material+Icons']}});</script>
<script>window.config = @json($config);</script>
<script>window.__state__ = @json($state);</script>
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>
