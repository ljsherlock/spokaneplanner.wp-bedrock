# Gutenberg Common Blocks Library

This is the library for common Gutenberg blocks, which will be primarily, if not solely, used inside the plugin for development and production use.

## During Development
Clone this directory into 'src/' and add it to .gitignore. The plugin will then import and register them as below.

## Production
IE when using this library directly, the import will simpy change to that of this repo's NPM package name.

Importing during development 
```js
import * as blocks from './blocks'

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
```

The change in production
```js
  import * as blocks from 'common-gutenberg-blocks'
```