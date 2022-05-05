<div class="modal-info">
    <i class="fas fa-times"></i>
    <div class="modal-top">
        <p class="modal-title">{{ $vacancy->langs->firstWhere('lang',app()->getLocale())->title }}</p>
        <div class="modal-mail">
            <span>{{ __('lang.apply_mail') }}:</span>
            <a href="mailto: {{ $vacancy->email }}">{{ $vacancy->email }}</a>
        </div>
    </div>
    <div class="modal-bottom">
        {!! $vacancy->langs->firstWhere('lang',app()->getLocale())->description !!}
    </div>
</div>