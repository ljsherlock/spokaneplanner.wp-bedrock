# Gutenberg Plugin Template
This plugin creates Gutenberg blocks by combining my external [React UI library](https://github.com/ljsherlock/ljsherlock.ui) (also used by my [React WP Consumer App](https://github.com/ljsherlock/react-wordpress-consumer)) with core WordPress blocks (to fill content). This allows not only an abstracted library, but one that is **exactly** the same between Gutenberg and the front-end application ([React WP Consumer App](https://github.com/ljsherlock/react-wordpress-consumer)).

## WordPress is a major dependancy
Because a WordPress install is needed, the blocks developed for this plugin need to be developed inside of this plugin to be able to see them working in the browser.

Note: At the time of writing I'm storing [common gutenberg blocks](https://github.com/ljsherlock/common-gutenberg-blocks) seperately, and they can be unit tested.

## Development
Clone this repository to the plugins folder of your WordPress install and 'activate' the plugin. 

I use Trellis and Bedrock.

Develop blocks inside of src/blocks.

import blocks during development (inside src/index.tsx)
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

## Production

Your blocks should be published the an NPM package and imported as below

```js
  import * as blocks from 'common-gutenberg-blocks'
```

Remove src/blocks now and create a dedicate repository for this plugin.