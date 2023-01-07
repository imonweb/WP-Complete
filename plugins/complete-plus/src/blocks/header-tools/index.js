import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl, CheckboxControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import icons from '../../icons.js'
import './main.css'

registerBlockType('complete-plus/header-tools', {
  icon: {
    src: icons.primary
  },
  edit({ attributes, setAttributes }) {
    const { showAuth } = attributes
    const blockProps = useBlockProps();

    return (
      <>
        <InspectorControls>
          <PanelBody title={ __('General', 'complete-plus') }>
            <SelectControl 
              label = {__('Show Login/Register link', 'complete-plus')}
              value={showAuth}
              options={[
                { label: __('No', 'complete-plus'), value: false },
                { label: __('Yes', 'complete-plus'), value: true }
              ]}
              onChange={newVal => setAttributes({showAuth: typeof (newVal === "true")})}
            />
            <CheckboxControl 
              label={__('Show Login/Register Link', 'complete-plus')}
              help={
                showAuth ?
                __('Showing Link', 'complete-plus') :
                __('Hiding Link', 'complete-plus')
              }
              checked={showAuth}
              onChange={showAuth => setAttributes({ showAuth })}
            />
          </PanelBody>
        </InspectorControls>
        <div { ...blockProps }>
          {
            showAuth &&
            <a className="signin-link open-modal" href="#">
              <div className="signin-icon">
                <i className="bi bi-person-circle"></i>
              </div>
              <div className="signin-text">
                <small>Hello, Sign in</small>
                My Account
              </div>
            </a> 
          }
        </div>
      </>
    );
  }
});