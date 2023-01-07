import { registerBlockType } from '@wordpress/blocks';
import { 
  useBlockProps, RichText, InspectorControls
} from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components'
import { __ } from '@wordpress/i18n'
import icons from '../../icons.js'
import './main.css'

registerBlockType('complete-plus/page-header', {
  icon: icons.primary,
	edit({ attributes, setAttributes }) {
    const { content, showCategory } = attributes
    const blockProps = useBlockProps();

    return (
      <>
      <InspectorControls>
        <PanelBody title={__('General', 'complete-plus')}>
          <ToggleControl 
            label={__('Show Category', 'complete-plus')}
            checked={showCategory}
            onChange={showCategory => setAttributes({ showCategory})}
            help={
              showCategory ? 
              __('Category Shown', 'complete-plus') :
              __('Custom Content Shown', 'complete-plus')
            }
          />
        </PanelBody>
      </InspectorControls>
        <div {...blockProps}>
          <div className="inner-page-header">
            {
              showCategory ? 
              <h1>{__('Category: Some Category', 'complete-plus')}</h1> :  
              <RichText 
                tagName="h1"
                placeholder={__("Heading", "complete-plus")}
                value={content}
                onChange={content => setAttributes({ content })}
              />
            }
          </div>
        </div>
      </>
    );
  }
});

