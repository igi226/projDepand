@props([
    'url',
    'color' => 'primary',
])
{{-- <table class="action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="center">
<table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="center">
<table border="0" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td>
<a href="{{ $url }}" class="button button-{{ $color }}" target="_blank" rel="noopener">{{ $slot }}</a>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table> --}}




			
			<p style="text-align: center;">
                <a href="{{ $url }}"  target="_blank" rel="noopener" style="height: 50px; width: 300px; background: rgb(253,179,2);
                background: linear-gradient(0deg, rgba(253,179,2,1) 0%, rgba(244,77,9,1) 100%);
                text-align: center;
                font-size: 18px;
                color: #fff;
                border-radius: 12px;
                display: inline-block;
                line-height: 50px;
                text-decoration: none;
                text-transform: uppercase;
                font-weight: 600;">{{ $slot }}</a></p>

    
          
	

