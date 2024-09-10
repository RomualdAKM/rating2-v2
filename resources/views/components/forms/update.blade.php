<!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
<form method="POST" action="{{ route($type . '.update', [$type => $item]) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <!-- inputs -->
    <div @class(['form-group md:grid grid-cols-2 gap-2 mt-4'])>
        @foreach ($fields as $attr => $value)
            <div @class(['m-2', 'col-span-2' => isset($value['colspan'])])>
                @php
                    $component = 'inputs.' . $value['field'];
                    $fill = $item->{$attr};
                @endphp

                <x-input-label for="{{ $attr }}" value="{!! $value['title'] !!}"></x-input-label>

                @if ($value['field'] === 'model')
                    <x-dynamic-component :component="$component" id="{{ $attr }}" name="{{ $attr }}"
                        class="block mt-2 w-full border-2 p-2 rounded outline-0">
                        <option value="">Cliquer pour sélectionner</option>
                        @foreach ($value['options'] as $data)
                            <option value="{{ $data->id }}" @selected(old($attr) ?? $fill === $data->name)>
                                {{ $fill->name }}
                            </option>
                        @endforeach
                    </x-dynamic-component>
                    @error($attr)
                        <x-input-error messages="{{ $message }}" class="mt-2" />
                    @enderror
                @elseif ($value['field'] === 'select')
                    <x-dynamic-component :component="$component" id="{{ $attr }}" name="{{ $attr }}"
                        class="block mt-1 w-full border-2 p-2 rounded outline-0">
                        <option value="">Sélectionner</option>
                        @foreach ($value['options'] as $key => $value)
                            <option value="{{ $key }}" @selected(old($attr) ? old($attr) === $key : $fill == $key)> {{ $value }}
                            </option>
                        @endforeach
                    </x-dynamic-component>
                    @error($attr)
                        <p class="text-red-500 text-sm pl-2 pt-2">
                            {{ $message }}
                        </p>
                    @enderror
                @elseif ($value['field'] === 'multiple-select')
                    <x-dynamic-component :component="$component" id="{{ $attr }}" name="{{ $attr }}[]"
                        class="block mt-1 w-full border-2 p-2 rounded outline-0">
                        @foreach ($value['options'] as $item)
                            <option value="{{ $item->id }}" @selected(old($attr))>
                                {{ $item->name ?? $item->task }}
                            </option>
                        @endforeach
                    </x-dynamic-component>
                    @error($attr)
                        <p class="text-red-500 text-sm pl-2 pt-2">
                            {{ $message }}
                        </p>
                    @enderror
                @elseif ($value['field'] === 'textarea')
                    <x-dynamic-component :component="$component" id="{{ $attr }}" name="{{ $attr }}"
                        type="{{ $value['field'] }}" class="block mt-1 w-full border-2 p-2 rounded outline-0">
                        {{ old($attr) ?? $fill }}</x-dynamic-component>
                    @error($attr)
                        <p class="text-red-500 text-sm pl-2 pt-2">
                            {{ $message }}
                        </p>
                    @enderror
                @elseif ($value['field'] === 'richtext')
                    <x-dynamic-component :component="$component" name="{{ $attr }}" type="{{ $value['field'] }}"
                        class="block mt-1 w-full border-2 p-2 rounded outline-0">
                        {!! old($attr) ?? $fill !!}</x-dynamic-component>
                    @error($attr)
                        <p class="text-red-500 text-sm pl-2 pt-2">
                            {{ $message }}
                        </p>
                    @enderror
                @elseif ($value['field'] === 'checkbox')
                    <div class="flex items-center">
                        <x-dynamic-component :component="$component" id="{{ $attr }}" name="{{ $attr }}"
                            type="{{ $value['field'] }}" class="mt-1 border-2 p-2 rounded outline-0" />

                        <x-input-label for="{{ $attr }}" value="{!! $value['title'] !!}" class="ml-3">
                        </x-input-label>
                    </div>
                @elseif ($value['field'] === 'multiple-file')
                    <input type="file" name="{{ $attr }}[]" id="{{ $attr }}"
                        class="block mt-1 w-full border-2 p-2 rounded outline-0" multiple>

                    @error($attr)
                        <p class="text-red-500 text-sm pl-2 pt-2">
                            {{ $message }}
                        </p>
                    @enderror
                @elseif ($value['field'] === 'date')
                    <input type="date" name="{{ $attr }}" id="{{ $attr }}"
                        value="{{ old($attr) ?? $fill->format('Y-m-d') }}" class="block mt-1 w-full border-2 p-2 rounded outline-0">
                        {{-- @php
                            dd($fill->format('Y-m-d'))
                        @endphp --}}
                    @error($attr)
                        <p class="text-red-500 text-sm pl-2 pt-2">
                            {{ $message }}
                        </p>
                    @enderror
                @else
                    @if ($value['field'] == 'file')
                        <div class="w-1/2 p-1 md:p-2">
                            <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                                src="{{ asset('storage/' . $fill) }}" />
                        </div>
                    @endif

                    <x-dynamic-component :component="$component" id="{{ $attr }}"
                        class="block mt-1 w-full border-2 p-2 rounded outline-0" type="{{ $value['field'] }}"
                        name="{{ $attr }}" value="{{ old($attr) ?? $fill }}"
                        autocomplete="{{ $attr }}" />

                    @error($attr)
                        <x-input-error messages="{{ $message }}" class="mt-2" />
                    @enderror
                @endif
            </div>
        @endforeach
    </div>

    <div class="flex items-center justify-start mt-4">
        <x-primary-button class="ml-4">
            {{ __('Modifier') }}
        </x-primary-button>

        <a href="{{ url()->previous() }}">
            <x-danger-button type="button" class="ml-4">
                {{ __('Annuler') }}
            </x-danger-button>
        </a>
    </div>
</form>
