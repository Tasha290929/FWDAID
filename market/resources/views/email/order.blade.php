@component('mail::message')
# Thank you for your order, {{ $user->name }}

You ordered:

@foreach ($items as $item)
- **{{ $item->product->name }}** — {{ $item->quantity }} шт. по {{ $item->price }} $ = {{ $item->price * $item->quantity }} $
@endforeach

**Total amount:** {{ $total }} $

Sincerely,
Cat’s Company
@endcomponent
