<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://s3.cointelegraph.com/storage/uploads/view/fb51b8923091297b3616326756e52270.png" class="logo" alt="website Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
