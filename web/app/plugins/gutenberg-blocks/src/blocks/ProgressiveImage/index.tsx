import React, { FunctionComponent } from 'react'
import { MediaUpload, MediaUploadCheck } from "@wordpress/block-editor"

import ProgressiveImage from 'ljsherlock-progressive-image'

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
}

interface getImageButtonProps {
  onClick: () => void
  progressiveImageDesktop: string
  progressiveImageTiny: string
  className: string
  blockId: string
}

const GetImageButton: FunctionComponent<getImageButtonProps> = ({
  onClick,
  progressiveImageDesktop,
  progressiveImageTiny,
  className,
  blockId,
}: getImageButtonProps) => (
  <ProgressiveImage
    progressiveImageDesktop={progressiveImageDesktop}
    progressiveImageTiny={progressiveImageTiny}
    progressiveImageRatio='4x3' 
    //slide-in-image
    id={blockId}
    className={`${className} z-1 text-block-image-1 progressive-image-background`}
    onClick={onClick}
    cursor="pointer"
  />
)

/**s
 * Edit callback for block
 */

interface editProps {
  attributes: {
    blockId: string
    progressiveImageDesktop: string
    progressiveImageTiny: string
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
  }: editProps['attributes'] = attributes
  
  const setBlockId = (blockId: string) => setAttributes({ blockId })
  const setProgressiveImageDesktop = (progressiveImageDesktop: string) => setAttributes({ progressiveImageDesktop })
  const setProgressiveImageTiny = (progressiveImageTiny: string) => setAttributes({ progressiveImageTiny })
  const setClassName = (className: string) => setAttributes({ className })

  if (clientId !== blockId) {
    setBlockId(clientId)
  }

  return (
    <Render
      setProgressiveImageDesktop={setProgressiveImageDesktop}
      setProgressiveImageTiny={setProgressiveImageTiny}
      progressiveImageDesktop={progressiveImageDesktop}
      progressiveImageTiny={progressiveImageTiny}
      className={className}
      blockId={blockId}
    />
  )
}

const Render = ({
  setProgressiveImageDesktop,
  setProgressiveImageTiny,
  progressiveImageDesktop,
  progressiveImageTiny,
  className,
  blockId,
}) => (
  <MediaUploadCheck>
    <MediaUpload
      onSelect={(media) => {
        setProgressiveImageDesktop(media.sizes.desktop.url)
        setProgressiveImageTiny(media.sizes.tiny.url)
      }}
      allowedTypes="image"
      type="image"
      render={
        ({ open }) => (
          <GetImageButton
            onClick={open}
            progressiveImageDesktop={progressiveImageDesktop}
            progressiveImageTiny={progressiveImageTiny}
            className={className}
            blockId={blockId}
          />
        )
      }
    />
  </MediaUploadCheck>
)

/**
 * Save callback for block
 */
const save = props => {
  return null
}

export default {
  name: 'ljsherlock/progressive-image',
  title: 'Progressive Image',
  category: 'common',
  attributes,
  save,
  edit,
  Render
}