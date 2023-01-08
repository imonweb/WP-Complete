import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import icons from '../../icons.js'
import './main.css'

registerBlockType('complete-plus/auth-modal', {
  icon: {
    src: icons.primary
  },
  edit({ attributes, setAttributes }) {
    const { showRegister } = attributes;
    const blockProps = useBlockProps();

    return (
      <>
        <InspectorControls>
          <PanelBody title={ __('General', 'complete-plus') }>
            <ToggleControl
              label={__('Show Register', 'complete-plus')}
              help={
                showRegister ?
                __('Show registration form', 'complete-plus') :
                __('Hiding registration form', 'complete-plus')
              }
              checked={showRegister}
              onChange={showRegister => setAttributes({ showRegister })}
            />
          </PanelBody>
        </InspectorControls>
        <div { ...blockProps }>
          {__('This block is not previewable from the editor. View your site for a live demo.', 'complete-plus')}
        </div>
      </>
    );
  }
});