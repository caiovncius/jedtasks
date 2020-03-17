<div class="tab-pane fade" id="tab-settings" role="tabpanel" aria-labelledby="tab-settings">
    <div class="mt-4">
        @form(['route' => route('account.update.settings'), 'method' => 'PUT'])
            @select([
                'name' => 'language',
                'label' => trans('Language'),
                'required' => true,
                'value' => setting('language'),
                'options' => $languages
            ])
            @endselect

            @select([
                'name' => 'timezone',
                'label' => trans('Timezone'),
                'required' => true,
                'value' => setting('timezone'),
                'options' => $timezones
            ])
            @endselect

            @formfooter(['text' => trans('Update settings')])
            @endformfooter
        @endform
    </div>
</div>

