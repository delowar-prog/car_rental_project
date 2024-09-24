@row
<x-form.text-input name="name" type="text" :value="$car->name" labelClass="required" label="Name" placeholder="name" />
<x-form.text-input name="brand" type="text" :value="$car->brand" labelClass="required" label="brand" placeholder="brand" />
<x-form.text-input name="model" type="text" :value="$car->model" label="model" placeholder="model" />
<x-form.text-input name="year" type="number" :value="$car->year" labelClass="required" label="year" placeholder="year" />
<x-form.text-input name="car_type" type="text" :value="$car->car_type" label="Car type" placeholder="Car type" />
<x-form.text-input name="daily_rent_price" type="text" :value="$car->daily_rent_price" labelClass="required" label="daily rent price" placeholder="daily rent price" />
<x-form.text-input name="availability" type="text" :value="$car->availability" label="availability" placeholder="availability" />
<x-form.text-input name="image" type="file" :value="$car->image" labelClass="required" label="image"/>
@endrow
<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
</div>
