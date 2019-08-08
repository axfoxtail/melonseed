@if(Auth::check() && !Auth::user()->email_verified_at)
  <section class="bg-accent text-center notification-section position-relative" style="top: 68px;">
    <div class="container">
      <div class="row">
        <div class="notification-message">
              
          <div class="alert-title">{{ __('Verify Your Email Address') }}</div>

          {{ __('Before proceeding, please check your email for a verification link.') }}
          {{ __('If you did not receive the email') }}, <a class="link-resend" href="{{ route('verification.resend') }}">{{ __('click here to request another') }}.</a>

        </div>
      </div>
    </div>
  </section>

  @if (session('resent'))
    <!-- Scripts -->
    @push('contentJs')
    <script type="text/javascript">
      toastr.info('A fresh verification link has been sent to your email address.');
    </script>
    @endpush
  @endif
@endif