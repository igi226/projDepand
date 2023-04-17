<?php
 $logo = DB::table('site_infos')->select('logo_image')->first();
?>
@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'DEPENDABLE STAFFING')
<img src="{{ asset('storage/SiteImages/'. $logo->logo_image ) }}" width="100%"  alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
