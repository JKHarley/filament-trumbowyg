@php
    $editorId = strtolower(str_replace('.', '-', $getId()));
@endphp

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-color="$getHintColor()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    <div
        wire:ignore
        x-data="{ state: $wire.entangle('{{ $getStatePath() }}')}"
    >
        <textarea
            x-on:{{ $editorId }}.window="(e) => state = e.detail.text"
            id="{{ $editorId }}"
            @if (!is_null($getPlaceholder()))
                placeholder="{{ $getPlaceholder() }}"
            @endif
        ></textarea>
    </div>
</x-dynamic-component>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        if (window.jQuery && window.Alpine) {
            const id = '#{{ $editorId }}';
            const options = {}

            const resetCss = @json(config('filament-trumbowyg.reset_css'));

            const buttons = @json($getButtons());
            const buttonsConfig = @json(config('filament-trumbowyg.buttons'));

            const tagClasses = @json($getTagClasses());
            const tagClassesConfig = @json(config('filament-trumbowyg.tag_classes'));

            const changeActiveDropdownIcon = @json($getChangeActiveDropdownIcon());
            const changeActiveDropdownIconConfig = @json(config('filament-trumbowyg.change_active_dropdown_icon'));

            const semantic = @json($getSemantic());
            const semanticConfig = @json(config('filament-trumbowyg.semantic'));

            const removeFormatPasted = @json($getRemoveFormatPasted());
            const removeFormatPastedConfig = @json(config('filament-trumbowyg.remove_format_pasted'));

            const tagsToRemove = @json($getTagsToRemove());
            const tagsToRemoveConfig = @json(config('filament-trumbowyg.tags_to_remove'));

            const tagsToKeep = @json($getTagsToKeep());
            const tagsToKeepConfig = @json(config('filament-trumbowyg.tags_to_keep'));

            const urlProtocol = @json($getUrlProtocol());
            const urlProtocolConfig = @json(config('filament-trumbowyg.url_protocol'));

            const minimalLinks = @json($getMinimalLinks());
            const minimalLinksConfig = @json(config('filament-trumbowyg.minimal_links'));

            const linkTargets = @json($getLinkTargets());
            const linkTargetsConfig = @json(config('filament-trumbowyg.link_targets'));

            const imageWidthModalEdit = @json($getImageWidthModalEdit());
            const imageWidthModalEditConfig = @json(config('filament-trumbowyg.image_width_modal_edit'));

            if (buttons) {
                options.btns = buttons;
            }

            if (!buttons && buttonsConfig && buttonsConfig.length > 0) {
                options.btns = buttonsConfig;
            }

            if (tagClasses) {
                options.tagClasses = tagClasses;
            }

            if (!tagClasses && tagClassesConfig) {
                options.tagClasses = tagClassesConfig;
            }

            if (changeActiveDropdownIcon) {
                options.changeActiveDropdownIcon = changeActiveDropdownIcon;
            }

            if (!changeActiveDropdownIcon && changeActiveDropdownIconConfig) {
                options.changeActiveDropdownIcon = changeActiveDropdownIconConfig;
            }

            if (semantic) {
                options.semantic = semantic;
            }

            if (!semantic && semanticConfig) {
                options.semantic = semanticConfig;
            }

            if (removeFormatPasted) {
                options.removeformatPasted = removeFormatPasted;
            }

            if (!removeFormatPasted &&removeFormatPastedConfig) {
                options.removeformatPasted =removeFormatPastedConfig;
            }

            if (tagsToRemove) {
                options.tagsToRemove = tagsToRemove;
            }

            if (!tagsToRemove && tagsToRemoveConfig && tagsToRemoveConfig.length > 0) {
                options.tagsToRemove = @json(config('filament-trumbowyg.tags_to_remove'));
            }

            if (tagsToKeep) {
                options.tagsToKeep = tagsToKeep;
            }

            if (!tagsToKeep && tagsToKeepConfig && tagsToKeepConfig.length > 0) {
                options.tagsToKeep = tagsToKeepConfig;
            }

            if (urlProtocol) {
                options.urlProtocol = urlProtocol;
            }

            if (!urlProtocol && urlProtocolConfig && urlProtocolConfig.length > 0) {
                options.urlProtocol = urlProtocolConfig;
            }

            if (minimalLinks) {
                options.minimalLinks = minimalLinks;
            }

            if (!minimalLinks && minimalLinksConfig && minimalLinksConfig.length > 0) {
                options.minimalLinks = minimalLinksConfig;
            }

            if (!linkTargets && linkTargetsConfig && linkTargetsConfig.length > 0) {
                options.linkTargets = linkTargetsConfig;
            }

            if (linkTargets) {
                options.linkTargets = linkTargets;
            }

            if (!imageWidthModalEdit && imageWidthModalEditConfig) {
                options.imageWidthModalEdit = imageWidthModalEditConfig;
            }

            if (imageWidthModalEdit) {
                options.imageWidthModalEdit = imageWidthModalEdit;
            }

            if (window.Livewire) {
                $(id).trumbowyg(options);
                $(id).trumbowyg('html', '{!! data_get($this, $getStatePath()) !!}');
            }

            if (!resetCss) {
                $('.trumbowyg-textarea').css('background-color', 'black');
            }

            $(id).on('tbwchange', function (e) {
                e.target.dispatchEvent(new CustomEvent('{{ $editorId }}', {
                    bubbles: true,
                    detail: {text: e.target.value}
                }))
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
