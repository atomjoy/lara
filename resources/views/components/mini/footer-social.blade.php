{{-- Facebook --}}
@if (config('mail.email.social.facebook'))
<a href="{{ config('mail.email.social.facebook') }}" target="_blank" style="display: inline-block;">
<img src="https://raw.githubusercontent.com/atomjoy/lara/refs/heads/main/public/email/social/facebook-48.png" class="email-logo" alt="Logo">
</a>
@endif

{{-- Twitter --}}
@if (config('mail.email.social.x'))
<a href="{{ config('mail.email.social.x') }}" target="_blank" style="display: inline-block;">
<img src="https://raw.githubusercontent.com/atomjoy/lara/refs/heads/main/public/email/social/x-48.png" class="email-logo" alt="Logo">
</a>
@endif

{{-- Youtube --}}
@if (config('mail.email.social.youtube'))
<a href="{{ config('mail.email.social.youtube') }}" target="_blank" style="display: inline-block;">
<img src="https://raw.githubusercontent.com/atomjoy/lara/refs/heads/main/public/email/social/youtube-48.png" class="email-logo" alt="Logo">
</a>
@endif

{{-- Instagram --}}
@if (config('mail.email.social.instagram'))
<a href="{{ config('mail.email.social.instagram') }}" target="_blank" style="display: inline-block;">
<img src="https://raw.githubusercontent.com/atomjoy/lara/refs/heads/main/public/email/social/instagram-48.png" class="email-logo" alt="Logo">
</a>
@endif

{{-- TikTok --}}
@if (config('mail.email.social.tiktok'))
<a href="{{ config('mail.email.social.tiktok') }}" target="_blank" style="display: inline-block;">
<img src="https://raw.githubusercontent.com/atomjoy/lara/refs/heads/main/public/email/social/tiktok-48.png" class="email-logo" alt="Logo">
</a>
@endif
