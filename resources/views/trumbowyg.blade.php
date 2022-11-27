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
    <div wire:ignore x-data="{
        state: $wire.entangle('{{ $getStatePath() }}').defer,
    }">
        <textarea @input.window="(e) => state = e.detail.text" id="trumbowyg"></textarea>
    </div>
</x-dynamic-component>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('#trumbowyg').trumbowyg();
        $('#trumbowyg').trumbowyg('html', window.livewire.data.data.content);

        if (window.jQuery && window.Alpine) {
            $('#trumbowyg').on('tbwchange', function (e) {
                e.target.dispatchEvent(new CustomEvent('input', {bubbles: true, detail: {text: e.target.value }}))
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
