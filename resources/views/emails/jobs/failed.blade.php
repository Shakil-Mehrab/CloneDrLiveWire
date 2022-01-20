@component('mail::message')
## Job Failed

### {{ $responses['resolveName'] }}

```bash
  {{ $responses['message'] }}
```


Thanks,<br>
{{ config('app.name') }}
@endcomponent
