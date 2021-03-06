{namespace k=EBT\ExtensionBuilder\ViewHelpers}<f:for each="{extension.plugins}" as="plugin">

#page count
lib.calc = TEXT
lib.calc {
  current = 1
  prioriCalc = 1
}

plugin.{extension.shortExtensionKey}_{plugin.key} {
    view {
        templateRootPaths.0 = EXT:{extension.extensionKey}/Resources/Private/Templates/
        templateRootPaths.1 = <k:curlyBrackets>$plugin.{extension.shortExtensionKey}_{plugin.key}.view.templateRootPath</k:curlyBrackets>
        partialRootPaths.0 = EXT:{extension.extensionKey}/Resources/Private/Partials/
        partialRootPaths.1 = <k:curlyBrackets>$plugin.{extension.shortExtensionKey}_{plugin.key}.view.partialRootPath</k:curlyBrackets>
        layoutRootPaths.0 = EXT:{extension.extensionKey}/Resources/Private/Layouts/
        layoutRootPaths.1 = <k:curlyBrackets>$plugin.{extension.shortExtensionKey}_{plugin.key}.view.layoutRootPath</k:curlyBrackets>
        widget.TYPO3\CMS\Fluid\ViewHelpers\Widget\PaginateViewHelper.templateRootPaths {
            10 = EXT:erp_management_system_extension/Resources/Private/Templates/
        }
    }
    persistence {
        storagePid = <k:curlyBrackets>$plugin.{extension.shortExtensionKey}_{plugin.key}.persistence.storagePid</k:curlyBrackets>
        #recursive = 1
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 1
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
    settings {
        paginate {
            itemsPerPage = 10
            insertAbove = 0
            insertBelow = 1
            prevNextHeaderTags = 8
            maximumNumberOfLinks = 10
        }
    }
}
</f:for>

<f:if condition="{extension.plugins}">
# these classes are only used in auto-generated templates
plugin.{extension.shortExtensionKey}._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }
    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)
</f:if>

<f:for each="{extension.backendModules}" as="backendModule">
# Module configuration
module.{extension.shortExtensionKey}_{backendModule.mainModule}_{extension.unprefixedShortExtensionKey}{backendModule.key} {
    persistence {
        storagePid = <k:curlyBrackets>$module.{extension.shortExtensionKey}_{backendModule.key}.persistence.storagePid</k:curlyBrackets>
    }
    view {
        templateRootPaths.0 = EXT:{extension.extensionKey}/Resources/Private/Backend/Templates/
        templateRootPaths.1 = <k:curlyBrackets>$module.{extension.shortExtensionKey}_{backendModule.key}.view.templateRootPath</k:curlyBrackets>
        partialRootPaths.0 = EXT:{extension.extensionKey}/Resources/Private/Backend/Partials/
        partialRootPaths.1 = <k:curlyBrackets>$module.{extension.shortExtensionKey}_{backendModule.key}.view.partialRootPath</k:curlyBrackets>
        layoutRootPaths.0 = EXT:{extension.extensionKey}/Resources/Private/Backend/Layouts/
        layoutRootPaths.1 = <k:curlyBrackets>$module.{extension.shortExtensionKey}_{backendModule.key}.view.layoutRootPath</k:curlyBrackets>
    }
}
</f:for>
