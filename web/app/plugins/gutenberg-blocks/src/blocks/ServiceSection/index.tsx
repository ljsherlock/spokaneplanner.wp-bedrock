import React, { FunctionComponent } from 'react'
import { RichText } from "@wordpress/block-editor"

import ServiceContent from '../components/ServiceContent'
import { Copy, Heading } from 'primitive-components'

import progressiveImageBlock from '../ProgressiveImage'

import 'tachyons/css/tachyons.min.css'
import 'flexboxgrid/css/flexboxgrid.min.css'

const attributes = {
  blockId: {
    type: 'string'
  },
  progressiveImageTiny: {
    type: 'string',
    required: false,
    default: 'https://develop.anomalous.react/app/uploads/2019/03/Visuals-Service-page-image-1-1985-3-32x21.jpg'
  },
  progressiveImageDesktop: {
    type: 'string',
    required: false,
    default: 'https://develop.anomalous.react/app/uploads/2019/03/Visuals-Service-page-image-1-1985-3-1920x1280.jpg'
  },
  header: {
    type: 'string',
    selector: 'js-service-header',
  },
  content: {
    type: 'string',
    selector: 'js-service-content',
    multiline: 'p'
  }
}

/**s
 * Edit callback for block
 */

interface editProps {
  attributes: {
    blockId: string
    progressiveImageDesktop: string
    progressiveImageTiny: string
    header: string
    content: string
  }
  setAttributes: ({}) => void
  className: string
  clientId: string
}

const edit: FunctionComponent<editProps> = ({
  attributes,
  setAttributes,
  className,
  clientId
}: editProps) => {
  const {
    blockId,
    progressiveImageDesktop,
    progressiveImageTiny,
    header,
    content 
  }: editProps['attributes'] = attributes
  
  const setBlockId = (blockId: string) => setAttributes({ blockId })
  const setProgressiveImageDesktop = (progressiveImageDesktop: string) => setAttributes({ progressiveImageDesktop })
  const setProgressiveImageTiny = (progressiveImageTiny: string) => setAttributes({ progressiveImageTiny })
  const setClassName = (className: string) => setAttributes({ className })
  const setHeader = (header: string) => setAttributes({ header })
  const setContent = (content: string) => setAttributes({ content })
  const setInnerBlocks = (innerBlocks: string) => setAttributes({ innerBlocks })

  if (clientId !== blockId) {
    setBlockId(clientId)
  }

  return (
    <ServiceContent>

      <React.Fragment>

        <Heading>
          <RichText 
            tagName="span"
            value={ header }
            onChange={ (value: string) => setHeader(value) }
            placeholder="Start writing"
            keepPlaceholderOnFocus={true}
            preserveWhiteSpace={true}
          />
        </Heading>

        <Copy>
          <RichText 
            tagName="span"
            value={ content }
            onChange={ (value) => setContent(value) }
            placeholder="I'm pickle Ri-----ck!"
            keepPlaceholderOnFocus={true}
            preserveWhiteSpace={true}
          />
        </Copy>

      </React.Fragment>

      <React.Fragment>

        {/* 
          Deconstructed the render (return UI) so that the block can 
          be used in this way.
        */}
        <progressiveImageBlock.Render
          setProgressiveImageDesktop={setProgressiveImageDesktop}
          setProgressiveImageTiny={setProgressiveImageTiny}
          progressiveImageDesktop={progressiveImageDesktop}
          progressiveImageTiny={progressiveImageTiny}
          className={className}
          blockId={blockId}
        />

      </React.Fragment>

    </ServiceContent>
  )
}

/**
 * Save callback for block
 */
const save = props => {
  return null
}

export default {
  name: 'ljsherlock/test',
  title: 'Serivce Section (top)',
  category: 'common',
  attributes,
  save,
  edit,
}
