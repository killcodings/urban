import { useBlockProps, RichText } from '@wordpress/block-editor';
import './editor.scss';

export default function Edit({attributes, setAttributes}) {
	const {text} = attributes; // {text: text} = attributes
	return (
		<div className="cg-description" style={{"--color": "#101828", "--text-align": "left", "--max-width": "754px"}}>
			<RichText
				{ ...useBlockProps() }
				onChange={(value)=> setAttributes({text: value})}
				// onChange={(text)=> console.log(text)}
				value={text}
				// placeholder={"Your text"}
				tagName="p"
				// allowedFormats={['core/bold']}
				allowedFormats={[]}
			/>
		</div>
	);
}
