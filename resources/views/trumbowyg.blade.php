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
            x-on:{{ $getLabel() }}.window="(e) => state = e.detail.text"
            id="{{ $getLabel() }}"
        ></textarea>
    </div>
</x-dynamic-component>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (window.jQuery && window.Alpine) {
            $('#{{ $getLabel() }}').trumbowyg();
            $('#{{ $getLabel() }}').trumbowyg('html', window.livewire.data.data['{{ strtolower($getLabel()) }}']);

            $('#{{ $getLabel() }}').on('tbwchange', function (e) {
                e.target.dispatchEvent(new CustomEvent('{{ strtolower($getLabel()) }}', {bubbles: true, detail: {text: e.target.value }}))
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
