<!-- Simplicity is an acquired taste. - Katharine Gerould -->

<!-- inputs -->
<div @class(['form-group md:grid grid-cols-2 gap-2 mt-4'])>
    @foreach ($fields as $attr => $value)
        @php
            $fill = $item->{$attr};
        @endphp

        <div @class(['m-2', 'col-span-2' => isset($value['colspan'])])>

            <x-input-label for="{{ $attr }}" value="{!! $value['title'] !!}"></x-input-label>

            @if ($value['field'] === 'richtext' || $value['field'] === 'textarea')
                <textarea class="block mt-1 w-full border-2 p-2 rounded outline-0" rows="8" readonly>{!! old($attr) ?? $fill !!}</textarea>
            @elseif ($value['field'] === 'model' || $value['field'] === 'multiple-select')
                <x-text-input class="block mt-1 w-full border-2 p-2 rounded outline-0"
                    value="{{ $item->name }}" readonly />
            @else
                <x-text-input class="block mt-1 w-full border-2 p-2 rounded outline-0" value="{{ old($attr) ?? $fill }}"
                    readonly />
            @endif

        </div>
    @endforeach
    <div class="flex items-center justify-start mt-4">
        <a href="{{ url()->previous() }}">
            <x-primary-button class="ml-4">
                {{ __('Retour') }}
            </x-primary-button>
        </a>

        @if (request()->routeIs('temptation.show'))
            <a href="{{ route('temptation_back.create') }}">
                <x-danger-button class="ml-4">
                    {{ __('Répondre') }}
                </x-danger-button>
            </a>
        @endif
    </div>
</div>
