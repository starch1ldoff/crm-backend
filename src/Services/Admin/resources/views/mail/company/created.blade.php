@component('mail::message')
    New company was created
    Company:{{$company->name}}

    Thanks,
    {{ config('app.name') }}
@endcomponent
