import './editor.scss';
import { TextControl } from '@wordpress/components';
import { useBlockProps } from '@wordpress/block-editor';

export default function Edit( { attributes, ...props } ) {
	return (
		<div { ...useBlockProps() }>
			{ /* <CheckFirstPosition clientId={ props.clientId } /> */ }
			<TextControl
				label="One field"
				value={ attributes.some_string }
				onChange={ ( vval ) =>
					props.setAttributes( { some_string: vval } )
				}
			/>
		</div>
	);
}
