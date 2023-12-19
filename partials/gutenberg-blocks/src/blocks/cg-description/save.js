import {RichText, useBlockProps} from '@wordpress/block-editor';
export default function save({attributes}) {
	const {text} = attributes;
	const {ColorText} = attributes;
	const {maxWidth} = attributes;
	const {textAlign} = attributes;

	let componentStyles = {
		'--colorText': ColorText,
		'--text-align': textAlign
		// '--max-width': maxWidth
		// padding: `${ padding.top } ${ padding.right } ${ padding.bottom } ${ padding.left }`,
		// borderRadius: `${ radius }px`,
		// fontSize: `${ fontSize }px`,
	};

	if ( !! maxWidth ) {
		componentStyles[ '--max-width' ] = `${ maxWidth }px`;
	}

	const useBlockPropsAttrs = {
		style: componentStyles,
	};

	return (
		<div
			className="cg-description"
			// style={{"--color": "#101828", "--text-align": "left", "--max-width": "754px"}}
			{ ...useBlockPropsAttrs }
		>
			<RichText.Content
				{ ...useBlockProps.save() }
				tagName ="p"
				value = {text}
			/>
		</div>
	);
}
