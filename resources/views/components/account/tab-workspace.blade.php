<div class="tab-pane fade" id="tab-workspace" role="tabpanel" aria-labelledby="tab-workspace">
    <div class="mt-4">
        @form(['route' => route('account.update.workspace'), 'method' => 'PUT'])
            @field([
                'name' => 'name',
                'label' => trans('Workspace name'),
                'type' => 'text',
                'required' => true,
                'value' => auth()->user()->workspace->name
            ])
            @endfield

            @formfooter(['text' => trans('Update workspace')])
            @endformfooter
        @endform
    </div>
</div>

