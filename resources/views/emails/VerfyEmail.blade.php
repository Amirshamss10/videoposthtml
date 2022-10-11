@component('mail::message')
# Welcome to the SilkRoad 
Your order has been shipped!
 
@component('mail::button', ['url' => $url])
View Order
@endcomponent
 
Thanks,<br>
Admin
@endcomponent