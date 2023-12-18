import {RichText, useBlockProps} from '@wordpress/block-editor';
export default function save({attributes}) {
	const {text} = attributes;
	return (
		<div className="cg-description" style={{"--color": "#101828", "--text-align": "left", "--max-width": "754px"}}>
			<RichText.Content
				{ ...useBlockProps.save() }
				tagName ="p"
				value = {text}
			/>
		</div>
	);
}
