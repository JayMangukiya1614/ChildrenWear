<ul>
    <li>
        <p style="display:contents "> Product image:-</p>
        <span class="text-wrap "style="max-width:100px;"><img width="100px"
                height="100px"
                src="{{ !empty($data->productimage) ? url('ProductImages/' . $data->productimage) : url('images/default.jpeg') }}">
        </span>
    </li>
    <li class="mt-3">
        <p style="display:contents "> Product Name:-</p>
        <span class="d-inline-block">{{ $data->productname }}</span>
    </li>

    <li class="mt-3">
        <p style="display:contents "> Product Color:-</p>
        <span class="d-inline-block">{{ $data->color }}</span>
    </li>
    <li class="mt-3">
        <p style="display:contents ">Product Size:-</p>
        <span class="d-inline-block">{{ $data->size }}</span>
    </li>
    <li class="mt-3">
        <p style="display:contents "> Age:-</p>
        <span class="d-inline-block">{{ $data->age }}</span>
    </li>

    <li class="mt-3">
        <p style="display:contents "> Description :-</p>
        <span class="d-inline-block">{{ $data->description }}</span>
    </li>

    <li class="mt-3">
        <p style="display:contents "> Long Description :-</p>
        <span class="d-inline-block">{{ $data->Ldescription }}</span>
    </li>
</ul>