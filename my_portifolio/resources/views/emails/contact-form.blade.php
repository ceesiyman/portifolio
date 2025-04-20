@component('mail::message')
# New Contact Form Message

You have received a new message from your portfolio website.

**From:** {{ $name }}  
**Email:** {{ $email }}

**Message:**  
{{ $message }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent 