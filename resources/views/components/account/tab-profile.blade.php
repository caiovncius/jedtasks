<div class="tab-pane fade show active" id="tab-profile" role="tabpanel" aria-labelledby="tab-profile">
    <div class="mt-4">
        @form(['route' => route('account.update.profile'), 'method' => 'PUT'])

            <div class="d-none">
                @file([
                    'name' => 'avatar',
                    'label' => false,
                ])
                @endfile
            </div>
            @field([
                'name' => 'name',
                'label' => trans('Name'),
                'type' => 'text',
                'required' => true,
                'value' => auth()->user()->name
            ])
            @endfield

            @field([
                'name' => 'email',
                'label' => trans('E-mail'),
                'type' => 'email',
                'required' => true,
                'value' => auth()->user()->email
                ])
            @endfield

            @textarea([
                'name' => 'bio',
                'label' => trans('Write about you...'),
                'value' => auth()->user()->bio
            ])
            @endfield

            @formfooter(['text' => trans('Update my profile')])
            @endformfooter

        @endform

        <div class="dropdown-divider"></div>
        <h5 class="text-muted mt-5 mb-4">
            {{ __('Update your password') }}
        </h5>

        @form(['route' => route('account.update.password'), 'method' => 'PUT'])

            @field([
                'name' => 'current_password',
                'label' => trans('Your current password'),
                'type' => 'password',
                'required' => true,
            ])
            @endfield

            @field([
                'name' => 'password',
                'label' => trans('Create a new password'),
                'type' => 'password',
                'required' => true,
            ])
            @endfield

            @field([
                'name' => 'password_confirmation',
                'label' => trans('Confirme your new password'),
                'type' => 'password',
                'required' => true,
            ])
            @endfield



            @formfooter(['text' => trans('Update my password')])
            @endformfooter

        @endform
    </div>
</div>
