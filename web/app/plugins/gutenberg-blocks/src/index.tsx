import { registerBlockType } from "@wordpress/blocks"
import './css/editor.css'

// Local development
import * as blocks from './blocks'

// Production
// import * as blocks from 'common-gutenberg-blocks'

for (const [name, component] of Object.entries(blocks)) {
  registerBlockType(
    component.name, {
      title: component.title,
      attributes: component.attributes,
      category: component.category,
      edit: component.edit,
      save: component.save,
    },
  )
}