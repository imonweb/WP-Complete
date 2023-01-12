import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { useEntityProp } from '@wordpress/core-data';
import { useSelect } from '@wordpress/data'
import { Spinner } from '@wordpress/components'
import Rating from '@mui/material/Rating/index.js'
import icons from '../../icons.js';
import './main.css';

registerBlockType('complete-plus/recipe-summary', {
  icon: {
    src: icons.primary
  },
  edit({ attributes, setAttributes, context }) {
    const { prepTime, cookTime, course } = attributes;
    const blockProps = useBlockProps();
    const { postId } = context 

    const [termIDs] = useEntityProp('postType', 'recipe', 'cuisine', postId)

    const {cuisines, isLoading} = useSelect( (select) => {
      const { getEntityRecords, isResolving } = select('core')

      const taxonomyArgs = [
        'taxonomy',
        'cuisine', {
          include: termIDs
        }
      ]

      return {
        cuisines: getEntityRecords(...taxonomyArgs),
        isLoading: isResolving('getEntityRecords', taxonomyArgs)
      }
    }, [termIDs])

    const { rating } = useSelect(select => {
      const { getCurrentPostAttribute } = select('core/editor')

      return { 
        rating: getCurrentPostAttribute('meta').recipe_rating
      }
    })

    console.log(rating);


    return (
      <>
        <div {...blockProps}>
          <i className="bi bi-alarm"></i>
          <div className="recipe-columns-2">
            <div className="recipe-metadata">
              <div className="recipe-title">{__('Prep Time', 'complete-plus')}</div>
              <div className="recipe-data recipe-prep-time">
                <RichText
                  tagName="span"
                  value={ prepTime } 
                  onChange={ prepTime => setAttributes({ prepTime }) }
                  placeholder={ __('Prep time', 'complete-plus') }
                />
              </div>
            </div>
            <div className="recipe-metadata">
              <div className="recipe-title">{__('Cook Time', 'complete-plus')}</div>
              <div className="recipe-data recipe-cook-time">
                <RichText
                  tagName="span"
                  value={ cookTime } 
                  onChange={ cookTime => setAttributes({ cookTime }) }
                  placeholder={ __('Cook time', 'complete-plus') }
                />
              </div>
            </div>
          </div>
          <div className="recipe-columns-2-alt">
            <div className="recipe-columns-2">
              <div className="recipe-metadata">
                <div className="recipe-title">{__('Course', 'complete-plus')}</div>
                <div className="recipe-data recipe-course">
                  <RichText
                    tagName="span"
                    value={ course } 
                    onChange={ course => setAttributes({ course }) }
                    placeholder={ __('Course', 'complete-plus') }
                  />
                </div>
              </div>
              <div className="recipe-metadata">
                <div className="recipe-title">{__('Cuisine', 'complete-plus')}</div>
                <div className="recipe-data recipe-cuisine">
                  {
                    isLoading && 
                    <Spinner />
                  }
                  {
                    !isLoading && cuisines && cuisines.map((item, index) => {
                      const comma = cuisines[index + 1] ? ',' : ''

                      return(
                        <>
                          <a href={item.meta.more_info_url}>
                            {item.name}
                          </a> {comma}
                        </>
                      )
                    })
                  }
                </div>
              </div>
              <i className="bi bi-egg-fried"></i>
            </div>
            <div className="recipe-metadata">
              <div className="recipe-title">{__('Rating', 'complete-plus')}</div>
              <div className="recipe-data">
                <Rating 
                  value={rating}
                  read
                />
              </div>
              <i className="bi bi-hand-thumbs-up"></i>
            </div>
          </div>
        </div>
      </>
    );
  }
});