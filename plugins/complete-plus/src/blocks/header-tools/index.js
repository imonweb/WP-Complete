import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import icons from '../../icons.js'
import './main.css'

registerBlockType('complete-plus/header-tools', {
  icon: {
    src: icons.primary
  },
  edit({ attributes, setAttributes }) {
    const blockProps = useBlockProps();

    return (
      <>
        <InspectorControls>
          <PanelBody title={ __('General', 'complete-plus') }>
            Panel Body Content
          </PanelBody>
        </InspectorControls>
        <div { ...blockProps }>
          <a className="signin-link open-modal" href="#">
            <div className="signin-icon">
              <i className="bi bi-person-circle"></i>
            </div>
            <div className="signin-text">
              <small>Hello, Sign in</small>
              My Account
            </div>
          </a>
        </div>
      </>
    );
  }
});