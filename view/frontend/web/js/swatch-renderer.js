define([
    'jquery',
    'jquery/ui',
    'magento-swatch.renderer'
], function ($) {

    $.widget('dynamicProductDescription.SwatchRenderer', $.mage.SwatchRenderer, {

        /**
         * Event for swatch options
         *
         * @param {Object} $this
         * @param {Object} $widget
         * @private
         */
        _OnClick: function ($this, $widget) {
            var $parent = $this.parents('.' + $widget.options.classes.attributeClass),
                $wrapper = $this.parents('.' + $widget.options.classes.attributeOptionsWrapper),
                $label = $parent.find('.' + $widget.options.classes.attributeSelectedOptionLabelClass),
                attributeId = $parent.attr('attribute-id'),
                $input = $parent.find('.' + $widget.options.classes.attributeInput);

            if ($widget.inProductList) {
                $input = $widget.productForm.find(
                    '.' + $widget.options.classes.attributeInput + '[name="super_attribute[' + attributeId + ']"]'
                );
            }

            if ($this.hasClass('disabled')) {
                return;
            }

            if ($this.hasClass('selected')) {
                $parent.removeAttr('option-selected').find('.selected').removeClass('selected');
                $input.val('');
                $label.text('');
                $this.attr('aria-checked', false);
            } else {
                $parent.attr('option-selected', $this.attr('option-id')).find('.selected').removeClass('selected');
                $label.text($this.attr('option-label'));
                $input.val($this.attr('option-id'));
                $input.attr('data-attr-name', this._getAttributeCodeById(attributeId));
                $this.addClass('selected');
                $widget._toggleCheckedAttributes($this, $wrapper);
            }

            $widget._Rebuild();

            // Custom Code starts
            var moduleDynamicProductDescriptionIsEnable = window.globalConfigData['module_enable']
            if (moduleDynamicProductDescriptionIsEnable) {
                var name = $widget.options.jsonConfig.name[this.getProduct()];
                var description = $widget.options.jsonConfig.description[this.getProduct()];
                var short_description = $widget.options.jsonConfig.short_description[this.getProduct()];
                var element_name = window.globalConfigData['element_name'];
                var element_name_enable = window.globalConfigData['element_name_enable'];
                var element_description = window.globalConfigData['element_description'];
                var element_description_enable = window.globalConfigData['element_description_enable'];
                var element_short_description = window.globalConfigData['element_short_description'];
                var element_short_description_enable = window.globalConfigData['element_short_description_enable'];

                if (element_name_enable && name != '' && element_name != '') {
                    $(element_name).html(name);
                }

                if (element_description_enable && description != '' && element_description != '') {
                    $(element_description).html(description);
                }

                if (element_short_description_enable && short_description != '' && element_short_description != '') {
                    $(element_short_description).html(short_description);
                }
            }
            // Custom code ends

            if ($widget.element.parents($widget.options.selectorProduct)
                .find(this.options.selectorProductPrice).is(':data(mage-priceBox)')
            ) {
                $widget._UpdatePrice();
            }

            $widget._loadMedia();
            $input.trigger('change');
        }

    });

    return $.dynamicProductDescription.SwatchRenderer;
});
