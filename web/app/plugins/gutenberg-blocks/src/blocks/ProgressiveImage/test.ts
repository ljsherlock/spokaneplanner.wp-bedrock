import TestRenderer from 'react-test-renderer'
import { createElement } from '@wordpress/element'
import '../jest/matchMedia.mock.js'
import ProgressiveImage from '.'

test('Block edit callback', () => {
  //Props with sample data
  const props = {
    attributes: {
      defaultValue: 'Faces',
      blockId: '',
    },
    className: 'wp-blocks-tooths',
    clientId: 'something',
    setAttributes: jest.fn(),
  }

  const component = TestRenderer.create(createElement(ProgressiveImage.edit, props))
  expect(component.toJSON()).toMatchSnapshot()
})

test('Block save callback', () => {
  //Props with sample data
  const props = {
    attributes: {
      defaultValue: 'Faces',
      blockId: ''
    },
    className: 'wp-blocks-tooths',
    clientId: 'something'
  }

  const component = TestRenderer.create(createElement(ProgressiveImage.save, props))
  expect(component.toJSON()).toMatchSnapshot()
})

