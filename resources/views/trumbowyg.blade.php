@php
// Label is used to assign an id to the editor as $getId() causes issues
$editorId = strtolower(str_replace(' ', '-', $getLabel()));
@endphp

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-action="$getHintAction()"
    :hint-color="$getHintColor()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    <div
        wire:ignore
        x-data="{ state: $wire.entangle('{{ $getStatePath() }}').defer }"
    >
        <textarea
            x-on:{{ $editorId }}.window="(e) => state = e.detail.text"
            id="{{ $editorId }}"
            @if (!is_null($getPlaceholder()))
                placeholder="{{ $getPlaceholder() }}";
            @endif
        ></textarea>
    </div>
</x-dynamic-component>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (window.jQuery && window.Alpine) {
            const id = '#{{ $editorId }}';

            @if(!is_null($getButtons()))
                $(id).trumbowyg({
                    resetCss: true,
                    btns: @json($getButtons())
                })
            @else
                $(id).trumbowyg({
                    resetCss: true,
                    @if(!is_null(config('filament-trumbowyg.buttons')) && !empty(config('filament-trumbowyg.buttons')))
                        btns: @json(config('filament-trumbowyg.buttons'))
                    @endif
                });
            @endif

            if (window.livewire.data) {
                $(id).trumbowyg('html', window.livewire.data.data['{{ $editorId }}']);
            }

            if (!window.livewire.data) {
                $(id).trumbowyg('html', @this.data['{{ $editorId }}']);
            }

            $(id).on('tbwchange', function (e) {
                e.target.dispatchEvent(new CustomEvent('{{ $editorId }}', {bubbles: true, detail: {text: e.target.value }}))
            });
        } else {
            if (!window.jQuery) {
                console.error('jQuery is not loaded');
            }

            if (!window.Alpine) {
                console.error('Alpine is not loaded');
            }
        }
    });
</script>
