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

            const options = {
                resetCss: true,
            }

            @if (!is_null($getButtons()))
                options.btns = @json($getButtons())
            @endif

            @if (
                is_null($getButtons()) &&
                !is_null(config('filament-trumbowyg.buttons')) &&
                !empty(config('filament-trumbowyg.buttons'))
            )
                options.btns = @json(config('filament-trumbowyg.buttons'));
            @endif

            @if (!is_null($getTagClasses()))
                options.tagClasses = @json($getTagClasses());
            @endif

            @if (
                is_null($getTagClasses()) &&
                !is_null(config('filament-trumbowyg.tag_classes')) &&
                !empty(config('filament-trumbowyg.tag_classes'))
            )
                options.tagClasses = @json(config('filament-trumbowyg.tag_classes'));
            @endif

            @if (!is_null($getChangeActiveDropdownIcon()))
                options.changeActiveDropdownIcon = @json($getChangeActiveDropdownIcon());
            @endif

            @if (
                is_null($getChangeActiveDropdownIcon()) &&
                !is_null(config('filament-trumbowyg.change_active_dropdown_icon'))
            )
                options.changeActiveDropdownIcon = @json(config('filament-trumbowyg.change_active_dropdown_icon'));
            @endif

            @if (!is_null($getSemantic()))
                options.semantic = @json($getSemantic());
            @endif

            @if (
                is_null($getSemantic()) &&
                !is_null(config('filament-trumbowyg.semantic'))
            )
                options.semantic = @json(config('filament-trumbowyg.semantic'))
            @endif

            @if (!is_null($getRemoveFormatPasted()))
                options.removeformatPasted = @json($getRemoveFormatPasted());
            @endif

                @if (
                    is_null($getRemoveFormatPasted()) &&
                    !is_null(config('filament-trumbowyg.remove_format_pasted'))
                )
                options.removeformatPasted = @json(config('filament-trumbowyg.remove_format_pasted'))
            @endif

            $(id).trumbowyg(options);

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
