@row
<x-form.text-input name="name" type="text" :value="$bank->name" labelClass="required" label="Name" placeholder="name" />
@endrow
<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
</div>
