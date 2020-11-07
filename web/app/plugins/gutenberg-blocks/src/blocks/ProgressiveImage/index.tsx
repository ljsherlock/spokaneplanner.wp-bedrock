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
  progressiveImageFull: {
    type: 'string',
    required: false,
    default: 'https://develop.anomalous.react/app/uploads/2019/03/Visuals-Service-page-image-1-1985-3-1920x1280.jpg'
  },
  imageSizes: {
    type: 'object',
    required: false,
    default: {}
  },
}

interface getImageButtonProps {
  onClick: () => void
  progressiveImageFull: string
  progressiveImageTiny: string
  imageSizes: null | {any: string}
  className: string
  blockId: string
}

const GetImageButton: FunctionComponent<getImageButtonProps> = ({
  onClick,
  progressiveImageFull,
  progressiveImageTiny,
  imageSizes,
  className,
  blockId,
}: getImageButtonProps) => (
  <ProgressiveImage
    progressiveImageFull={progressiveImageFull}
    progressiveImageTiny={progressiveImageTiny}
    progressiveImageRatio='4x3' 
    imageSizes={imageSizes}
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
    progressiveImageFull: string
    progressiveImageTiny: string
    imageSizes: null | {any: string}
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
    progressiveImageFull,
    progressiveImageTiny,
    imageSizes,
  }: editProps['attributes'] = attributes
  
  const setBlockId = (blockId: string) => setAttributes({ blockId })
  const setprogressiveImageFull = (progressiveImageFull: string) => setAttributes({ progressiveImageFull })
  const setProgressiveImageTiny = (progressiveImageTiny: string) => setAttributes({ progressiveImageTiny })
  const setClassName = (className: string) => setAttributes({ className })
  const setImageSizes = (imageSizes: {any: any}) => setAttributes({ imageSizes })

  if (clientId !== blockId) {
    setBlockId(clientId)
  }

  return (
    <Render
      setprogressiveImageFull={setprogressiveImageFull}
      setProgressiveImageTiny={setProgressiveImageTiny}
      setImageSizes={setImageSizes}
      progressiveImageFull={progressiveImageFull}
      progressiveImageTiny={progressiveImageTiny}
      imageSizes={imageSizes}
      className={className}
      blockId={blockId}
    />
  )
}

const Render = ({
  setprogressiveImageFull,
  setProgressiveImageTiny,
  setImageSizes,
  progressiveImageFull,
  progressiveImageTiny,
  imageSizes,
  className,
  blockId,
}) => (
  <MediaUploadCheck>
    <MediaUpload
      onSelect={(media) => {
        console.log('media', media)
        setprogressiveImageFull(media.sizes.fullWidthMedium.url)
        setProgressiveImageTiny(media.sizes.tiny.url)
        setImageSizes(media.sizes)
      }}
      allowedTypes="image"
      type="image"
      render={
        ({ open }) => (
          <GetImageButton
            onClick={open}
            progressiveImageFull={progressiveImageFull}
            progressiveImageTiny={progressiveImageTiny}
            imageSizes={imageSizes}
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
  icon: 'image',
  attributes,
  save,
  edit,
  Render
}